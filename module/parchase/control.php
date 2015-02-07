<?php
/**
 * 财务管理
 */
class parchase extends control
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

		$projects = $this->report->getProjectReports(array(), $pager);

		$this->view->projects = $projects;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 *
	 */
	public function history($pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 5;
		$pager = new pager(0, $recPerPage, $pageID);

		$parchases = $this->parchase->getList(array(), $pager);
// print_r($parchases); exit;
		$this->view->parchases = $parchases;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 *
	 */
	public function create($projectID, $applicationID, $applicationdetailID)
	{
		if (!empty($_POST)) {
			$parchaseID = $this->parchase->create();
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('parchase', $parchaseID, 'created');
			die(js::locate($this->createLink('parchase', 'index'), 'parent'));
		}

		$project = $this->project->getById($projectID);
		$appdetail = $this->material->getApplicationdetailById($applicationID, $applicationdetailID);

		$this->view->project = $project;
		$this->view->appdetail = $appdetail;
		$this->view->projectID = $projectID;
		$this->view->applicationID = $applicationID;
		$this->view->applicationdetailID = $applicationdetailID;

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
