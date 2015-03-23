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
		$this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed');
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
		$reports = $this->report->getProjectReports($projectID, array('type' => 'today', 'verified' => 1), $pager);

		$project = $this->project->getById($projectID);

		$this->view->reports = $reports;
		$this->view->project = $project;
		$this->view->pager = $pager;
		$this->view->title = '当日日报列表';
		$this->view->position[] = $project->name;
		$this->view->position[] = $this->view->title;

		$this->display();
	}

	/**
	 * 明日计划列表
	 * @param $projectID
	 * @param int $pageID
	 */
	public function tomorrowreportlist($projectID, $pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);
		$reports = $this->report->getProjectReports($projectID, array('type' => 'tomorrow', 'verified' => 1), $pager);

		$project = $this->project->getById($projectID);

		$this->view->reports = $reports;
		$this->view->project = $project;
		$this->view->pager = $pager;
		$this->view->title = '明日计划列表';
		$this->view->position[] = $project->name;
		$this->view->position[] = $this->view->title;

		$this->display();
	}

	/**
	 * 项目工程量统计
	 * @param $projectID
	 */
	public function viewtotal($projectID, $queryID = 0)
	{
		if ($_POST) {
			$res = $this->statistics->buildExpireDate();
			if ($res['error'] === 0) {
				die(js::locate($this->createLink('statistics', 'viewtotal', "projectID={$projectID}&param={$res['query_id']}"), 'parent'));
			} else {
				die(js::error($res['errormsg']));
			}
		}
		$expire = array();
		if ($queryID) {
			$expire = array('begin' => $this->session->begin, 'end' => $this->session->end);
		}
		$statistics = $this->statistics->projectStatistics($projectID, $expire);

		$materialTotal = $this->statistics->projectMaterialApplicationTotal($projectID);

		$project = $this->project->getById($projectID);

		$this->view->statistics = $statistics;
		$this->view->materialTotal = $materialTotal;
		$this->view->project = $project;

		$this->display();
	}

	/**
	 *
	 */
	public function projectplans($projectID)
	{
		$reports = $this->report->getProjectReports($projectID, array('verified' => 1));

		$project = $this->project->getById($projectID);

		$this->view->reports = $reports;
		$this->view->project = $project;

		$this->display();
	}

	public function projecttestations($projectID)
	{
		$testations = $this->report->getProjectTestations($projectID, array('verified' => 1));

		$project = $this->project->getById($projectID);

		$this->view->testations = $testations;
		$this->view->project = $project;

		$this->display();
	}

	public function projectproblems($projectID)
	{
		$problems = $this->report->getProjectProblems($projectID, array('verified' => 1));

		$project = $this->project->getById($projectID);

		$this->view->problems = $problems;
		$this->view->project = $project;

		$this->display();
	}

	/**
	 * 机械统计
	 */
	public function machineindex($pageID = 1)
	{
		$this->loadModel('machine');

		// pagination
		$recPerPage = 20;
		$this->app->loadClass('pager', $static = true);
		$pager = new pager(0, $recPerPage, $pageID);

		$machines = $this->machine->getList('', 0, 0, $pager);

		$machineTypes = $this->machine->getMachineTypes();

		$typeParams = helper::genParamstr(array('typeId' => '%s'));

		$this->view->machines = $machines;
		$this->view->machineTypes = $machineTypes;
		$this->view->pager = $pager;
		$this->view->recTotal = $pager->recTotal;
		$this->view->recPerPage = $pager->recPerPage;
		$this->view->typeParams = $typeParams;

		$this->display();
	}

	public function machinestatistics($machineID, $param = 0, $pageID = 1)
	{
		if ($_POST) {
			$res = $this->statistics->buildExpireDate();
			if ($res['error'] === 0) {
				die(js::locate($this->createLink('statistics', 'machinestatistics', "projectID={$projectID}&param={$res['query_id']}"), 'parent'));
			} else {
				die(js::error($res['errormsg']));
			}
		}

		// pagination
		$recPerPage = 20;
		$this->app->loadClass('pager', $static = true);
		$pager = new pager(0, $recPerPage, $pageID);

		$expire = array();
		if ($queryID) {
			$expire = array('begin' => $this->session->begin, 'end' => $this->session->end);
		}
		$machineStatistics = $this->statistics->machineStatistics($machineID, $expire, $pager);

		$this->view->machineStatistics = $machineStatistics;
		$this->view->pager = $pager;

		$this->display();
	}

}
