<?php
/**
 * Created by PhpStorm.
 */

class statistics extends control
{

	public function __construct()
	{
		parent::__construct();

		$this->loadModel('project');
		$this->loadModel('report');
	}

	/**
	 *
	 */
	public function index($pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$projects = $this->project->getList(array(), $pager);

		$this->view->projects = $projects;
		$this->view->pager = $pager;
		$this->view->title = '项目列表';
		$this->view->position[] = $this->view->title;

		$this->display();
	}

	/**
	 *
	 */
	public function reportlist($projectID, $pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);
		$reports = $this->report->getProjectReports($projectID, array(), $pager);

		$project = $this->project->getById($projectID);

		$this->view->reports = $reports;
		$this->view->project = $project;
		$this->view->pager = $pager;
		$this->view->title = '日报列表';
		$this->view->position[] = $project->name;
		$this->view->position[] = $this->view->title;

		$this->display();
	}

}
