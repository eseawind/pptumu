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

		$conds = array();
		$conds['verified'] = $verifiedVal;
		$projectID && $conds['project_id'] = $projectID;

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
	 * 修改申请
	 */
	public function application($action = 'edit', $status = 'all', $projectID = 0, $pageID = 1)
	{
		/* Load pager and get tasks. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$conds = array('object_type' => 'report', 'action' => $action);
		$status != 'all' && $conds['status'] = $status;
		$projectID && $conds['object_id'] = $projectID;
		$applications = $this->loadModel('my')->getApplicationList($conds, $pager);

		$this->view->applications = $applications;
		$this->view->pager = $pager;

		$this->display();
	}

}
