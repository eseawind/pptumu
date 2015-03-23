<?php

class report extends control
{

	public function __construct()
	{
		parent::__construct();

		$this->loadModel('project');
		$this->loadModel('material');
		$this->loadModel('machine');
	}

	/**
	 * The index of report, goto project deviation.
	 *
	 * @access public
	 * @return void
	 */
	public function index($pageID = 1)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 5;
		$pager = new pager(0, $recPerPage, $pageID);

		$projectConds = array('status' => 'doing');
		if ($this->app->user->role == 'pm') {
			$projectConds['pm'] = $this->app->user->account;
		}
		$projects = $this->project->getList($projectConds, $pager);

		$this->view->projects = $projects;
		$this->view->pager = $pager;
		// $this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed');
		$this->view->title = $this->lang->report->common;
		$this->view->position[] = $this->view->title;

		$this->display();
	}

	/**
	 * 添加日报
	 */
	public function create($projectID = 0, $reportType = 'today', $step = 1, $dailyID = 0)
	{
		if ($step == 1) {
			if (!empty($_POST)) {
				$daily = fixer::input('post')
					->get();

				$dailyID = $this->report->getDailyId($projectID, $daily->report_date);
				if (dao::isError()) die(js::error(dao::getError()));

				$this->loadModel('action')->create('report', $dailyID, 'created');
				// 检查是否存在
				$exists = $this->report->getList($projectID, $reportType, array('daily_id' => $dailyID));
				if ($exists) {
					$errorMsg = "{$daily->report_date}";
					$errorMsg .= ($reportType == 'today' ? '当日日报' : '明日计划') . "已经添加，不可以重复添加，如果想要修改请去历史记录申请修改";
					die(js::error($errorMsg));
				} else {
					die(js::locate($this->createLink('report', 'create', "projectID={$projectID}&reportType={$reportType}&step=2&daily_id={$dailyID}"), 'parent'));
				}
			}

			$report = new stdClass();
			$report->report_date = date('Y-m-d');
		} else {
			if (!empty($_POST)) {
				$reportID = $this->report->create();
				if (dao::isError()) die(js::error(dao::getError()));

				$this->loadModel('action')->create('report', $reportID, 'created');
				die(js::locate($this->createLink('report', 'history', "projectID={$projectID}&reportType={$reportType}"), 'parent'));
			}

			$daily = $this->report->getDailyById($dailyID);

			$materialApps = $this->report->getProjectMaterialRemaining($projectID);

			$machineDists = $this->machine->getProjectDistribution($projectID, $daily->date);

			$this->view->materialApps = $materialApps;
			$this->view->machineDists = $machineDists;
			$this->view->rentMachineDists = $rentMachineDists;
			$this->view->daily = $daily;
			$this->view->dailyID = $dailyID;
		}

		$project = $this->project->getById($projectID);
		$this->view->project = $project;
		$this->view->report = $report;
		$this->view->reportType = $reportType;
		$this->view->projectID = $projectID;
		$this->view->step = $step;

		$this->display();
	}

	/**
	 * 项目日报历史记录
	 */
	public function history($projectID, $reportType = 'today')
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);
		$reports = $this->report->getProjectReports($projectID, array('type' => $reportType), $pager);

		$project = $this->project->getById($projectID);

		$this->view->project = $project;
		$this->view->reports = $reports;
		$this->view->pager = $pager;

		$this->view->title = $project->name . ' > ' . ($reportType == 'today' ? '当日日报' : '明日计划') . '列表';
		$this->view->position[] = $project->name;
		$this->view->position[] = ($reportType == 'today' ? '当日日报' : '明日计划') . '列表';

		$this->display();
	}

	/**
	 * 日报修改
	 * @param $reportID
	 */
	public function edit($reportID)
	{
		if (!empty($_POST)) {
			$changes = $this->report->update($reportID);

			if (dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('report', $reportID, 'Edit');
			die(js::locate($this->createLink('report', 'index'), 'parent'));
		}

		$report = $this->report->getReportById($reportID);

		$project = $this->project->getById($report->project_id);

		$this->view->report = $report;
		$this->view->project = $project;
		$this->view->title = $project->name . ' > ' . $report->date . ($report->report_type == 'today' ? '当日日报' : '明日计划');
		$this->view->positiion[] = $project->name;
		$this->view->position[] = $report->date . ($report->report_type == 'today' ? '当日日报' : '明日计划');

		$this->display();
	}

	/**
	 * show report detail
	 */
	public function show($reportID)
	{
		$report = $this->report->getReportById($reportID);

		$project = $this->project->getById($report->project_id);

		$this->view->report = $report;
		$this->view->project = $project;
		$this->view->title = $project->name . ' > ' . $report->date . ($report->report_type == 'today' ? '当日日报' : '明日计划');
		$this->view->positiion[] = $project->name;
		$this->view->position[] = $report->date . ($report->report_type == 'today' ? '当日日报' : '明日计划');

		$this->display();
	}

	/**
	 * 添加项目签证
	 */
	public function createtestation($projectID = 0)
	{
		if(!empty($_POST)) {
			$result = $this->report->createTestation();
			if(dao::isError()) die(js::error(dao::getError()));

			if ($result['error'] === 0) {
				$this->loadModel('action')->create('report testation', $result['testation_id'], 'created');
				die(js::locate($this->createLink('report', 'index'), 'parent'));
			} else {
				die(js::error($result['errormsg']));
			}
		}

		$testation = new stdClass();
		$testation->report_date = date('Y-m-d');

		$this->view->testation = $testation;
		$this->view->projectID = $projectID;

		$this->display();
	}

	/**
	 * 项目签证历史记录
	 */
	public function historytestation($projectID = 0)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$testations = $this->report->getProjectTestations($projectID, array(), $pager);

		$this->view->testations = $testations;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 * 显示签证详细内容
	 * @param $testationID
	 */
	public function showtestation($testationID)
	{
		$testation = $this->report->getTestationById($testationID);

		$this->view->testation = $testation;

		$this->display();
	}

	/**
	 * 添加项目问题
	 */
	public function createproblem($projectID = 0)
	{
		if(!empty($_POST)) {
			$result = $this->report->createProblem();
			if(dao::isError()) die(js::error(dao::getError()));
			if ($result['error'] === 0) {
				$this->loadModel('action')->create('report problem', $result['problem_id'], 'created');
				die(js::locate($this->createLink('report', 'index'), 'parent'));
			} else {
				die(js::error($result['errormsg']));
			}
		}

		$problem = new stdClass();
		$problem->report_date = date('Y-m-d');

		$this->view->problem = $problem;
		$this->view->projectID = $projectID;

		$this->display();
	}

	/**
	 * 项目问题历史记录
	 */
	public function historyproblem($projectID = 0)
	{
		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$problems = $this->report->getProjectProblems($projectID, array(), $pager);

		$this->view->problems = $problems;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 * 显示问题详细内容
	 * @param $problemID
	 */
	public function showproblem($problemID)
	{
		$problem = $this->report->getProblemById($problemID);

		$this->view->problem = $problem;

		$this->display();
	}

}
