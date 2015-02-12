<?php

/**
 * The control file of dailyreview module.
 */
class dailyreview extends control
{
	/**
	 * Construct function, load project, product.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->loadModel('project');
		$this->loadModel('material');
		$this->loadModel('report');
		$this->loadModel('financial');
	}

	/**
	 * The index page of dailyreview module.
	 *
	 * @access public
	 * @return void
	 */
	public function index($projectID = 0, $verified = 'pending', $pageID = 1)
	{
		$verifiedVal = $this->dailyreview->getVerifyStatusVal($verified);

		if (!empty($_POST)) {
			$search = fixer::input('post')->get();
			$projectID = $search->search['project_id'];
		}

		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$conds = array('project_id' => $projectID);
		$conds['verified'] = $verifiedVal;
		$dailies = $this->dailyreview->getDailyList($conds, $pager);

		//
		$projects = $this->project->getPairs();

		$verifiedParams = helper::genParamstr(array('projectID' => $projectID));

		$this->view->dailies = $dailies;
		$this->view->projects = array('' => '选择项目') + $projects;
		$this->view->projectID = $projectID;
		$this->view->verified = $verified;
		$this->view->verifiedVal = $verifiedVal;
		$this->view->verifiedParams = $verifiedParams;
		$this->view->pager = $pager;

		$this->display();
	}

	public function showreport($reportID)
	{

	}

	public function showtestation($testationID)
	{

	}

	public function showproblem($problemID)
	{

	}

	/**
	 * Just test the extension engine.
	 *
	 * @access public
	 * @return void
	 */
	public function testext()
	{
		echo $this->fetch('misc', 'getsid');
	}
}
