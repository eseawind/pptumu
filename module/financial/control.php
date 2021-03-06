<?php
/**
 * 财务管理
 */
class financial extends control
{

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();

		$this->loadModel('project');
		$this->loadModel('material');
		$this->loadModel('report');
	}

	/**
	 *
	 */
	public function index($projectID = 0, $verified = 'pending', $pageID = 1)
	{
		$verifiedVal = $this->financial->getVerifyStatusVal($verified);

		if (!empty($_POST)) {
			$search = fixer::input('post')->get();
			$projectID = $search->search['project_id'];
		}

		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 5;
		$pager = new pager(0, $recPerPage, $pageID);

		$conds = array('project_id' => $projectID);
		$conds['verified'] = $verifiedVal;
		$applications = $this->material->getApplicationList($conds, $pager);

		//
		$projects = $this->project->getPairs();

		$verifiedParams = helper::genParamstr(array('projectID' => $projectID));

		$this->view->applications = $applications;
		$this->view->projects = array('' => '选择项目') + $projects;
		$this->view->projectID = $projectID;
		$this->view->verified = $verified;
		$this->view->verifiedVal = $verifiedVal;
		$this->view->verifiedParams = $verifiedParams;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 *
	 */
	public function verify($applicationID)
	{
		if (!empty($_POST)) {
			$applicationID = $this->financial->verifyMaterialApplicatioin($applicationID);
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('parchase', $parchaseID, 'created');
			die(js::locate($this->createLink('financial', 'index'), 'parent'));
		}

		$application = $this->material->getApplicationById($applicationID);
		// $project = $this->project->getById($projectID);
		// $appdetail = $this->material->getApplicationdetailById($applicationID, $applicationdetailID);

		$this->view->application = $application;
		$this->view->applicationID = $applicationID;

		$this->display();
	}

}
