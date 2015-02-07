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
	public function index($pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 5;
		$pager = new pager(0, $recPerPage, $pageID);

		$applications = $this->material->getApplicationList(array(), $pager);

		$this->view->applications = $applications;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 *
	 */
	public function verify($applicationID)
	{
		if (!empty($_POST)) {
			$parchaseID = $this->parchase->create();
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('parchase', $parchaseID, 'created');
			die(js::locate($this->createLink('parchase', 'index'), 'parent'));
		}

		$application = $this->material->getApplicationById($applicationID);
		// $project = $this->project->getById($projectID);
		// $appdetail = $this->material->getApplicationdetailById($applicationID, $applicationdetailID);

		$this->view->application = $application;
		$this->view->applicationID = $applicationID;

		$this->display();
	}

	/**
	 *
	 */
	public function edit()
	{
		$this->display();
	}

}
