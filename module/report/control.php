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

		$projects = $this->project->getList(array('status' => 'doing'), $pager);

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
				die(js::locate($this->createLink('report', 'create', "projectID&{$projectID}&reportType=[$reportType]&step=2&daily_id={$dailyID}"), 'parent'));
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

			$materialApps = $this->material->getProjectApplications($projectID);

			$machineDists = $this->machine->getProjectDistribution($projectID);

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

		$this->view->title = $project->name . ' > ' . ($reportType == 'today' ? '今日' : '明日') . '列表';
		$this->view->position[] = $project->name;
		$this->view->position[] = ($reportType == 'today' ? '今日' : '明日') . '列表';

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
		$this->view->title = $project->name . ' > ' . $report->report_date . '日报';
		$this->view->positiion[] = $project->name;
		$this->view->position[] = $report->report_date . '日报';

		$this->display();
	}

	/**
	 * 修改申请
	 */
	public function modificationrequest($reportID)
	{

	}

	/**
	 * 修改申请审查
	 */
	public function modificationcheck($reportID)
	{

	}

	/**
	 * 日报审核操作
	 */
	public function verify($reportID)
	{

	}

	/**
	 * 添加项目签证
	 */
	public function createtestation($projectID = 0)
	{
		if(!empty($_POST)) {
			$testationID = $this->report->createTestation();
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('report testation', $testationID, 'created');
			die(js::locate($this->createLink('report', 'index'), 'parent'));
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
		$this->display();
	}

	/**
	 * 添加项目问题
	 */
	public function createproblem($projectID = 0)
	{
		if(!empty($_POST)) {
			$problemID = $this->report->createProblem();
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('report problem', $problemID, 'created');
			die(js::locate($this->createLink('report', 'index'), 'parent'));
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
		$this->display();
	}

	/**
	 * Project deviation report.
	 *
	 * @access public
	 * @return void
	 */
	public function projectDeviation()
	{
		$this->view->title = $this->lang->report->projectDeviation;
		$this->view->position[] = $this->lang->report->projectDeviation;
		$this->view->projects = $this->report->getProjects();
		$this->view->submenu = 'project';

		$this->display();
	}

	/**
	 * Product information report.
	 *
	 * @access public
	 * @return void
	 */
	public function productInfo()
	{
		$this->app->loadLang('product');
		$this->app->loadLang('productplan');
		$this->app->loadLang('story');
		$this->view->title = $this->lang->report->productInfo;
		$this->view->position[] = $this->lang->report->productInfo;
		$this->view->products = $this->report->getProducts();
		$this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed');
		$this->view->submenu = 'product';
		$this->display();
	}

	/**
	 * Bug summary report.
	 *
	 * @param  int $begin
	 * @param  int $end
	 * @access public
	 * @return void
	 */
	public function bugSummary($begin = 0, $end = 0)
	{
		$this->app->loadLang('bug');
		if ($begin == 0) {
			$begin = date('Y-m-d', strtotime('last month'));
		} else {
			$begin = date('Y-m-d', strtotime($begin));
		}
		if ($end == 0) {
			$end = date('Y-m-d', strtotime('now'));
		} else {
			$end = date('Y-m-d', strtotime($end));
		}
		$this->view->title = $this->lang->report->bugSummary;
		$this->view->position[] = $this->lang->report->bugSummary;
		$this->view->begin = $begin;
		$this->view->end = $end;
		$this->view->bugs = $this->report->getBugs($begin, $end);
		$this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed|nodeleted');
		$this->view->submenu = 'test';
		$this->display();
	}

	/**
	 * Bug assign report.
	 *
	 * @access public
	 * @return void
	 */
	public function bugAssign()
	{
		$this->view->title = $this->lang->report->bugAssign;
		$this->view->position[] = $this->lang->report->bugAssign;
		$this->view->submenu = 'test';
		$this->view->assigns = $this->report->getBugAssign();
		$this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed|nodeleted');

		$this->display();
	}

	/**
	 * Workload report.
	 *
	 * @access public
	 * @return void
	 */
	public function workload()
	{
		$this->view->title = $this->lang->report->workload;
		$this->view->position[] = $this->lang->report->workload;
		$this->view->workload = $this->report->getWorkload();
		$this->view->users = $this->loadModel('user')->getPairs('noletter|noclosed|nodeleted');
		$this->view->submenu = 'staff';

		$this->display();
	}

	/**
	 * Send daily reminder mail.
	 *
	 * @access public
	 * @return void
	 */
	public function remind()
	{
		if ($this->config->report->dailyreminder->bug) $bugs = $this->report->getUserBugs();
		if ($this->config->report->dailyreminder->task) $tasks = $this->report->getUserTasks();
		if ($this->config->report->dailyreminder->todo) $todos = $this->report->getUserTodos();

		$reminder = array();

		$users = array_unique(array_merge(array_keys($bugs), array_keys($tasks), array_keys($todos)));
		if (!empty($users)) foreach ($users as $user) $reminder[$user] = new stdclass();

		if (!empty($bugs)) foreach ($bugs as $user => $bug) $reminder[$user]->bugs = $bug;
		if (!empty($tasks)) foreach ($tasks as $user => $task) $reminder[$user]->tasks = $task;
		if (!empty($todos)) foreach ($todos as $user => $todo) $reminder[$user]->todos = $todo;

		$this->loadModel('mail');

		/* Check mail turnon.*/
		if (!$this->config->mail->turnon) die("You should turn on the Email feature first.\n");

		foreach ($reminder as $user => $mail) {
			/* Reset $this->output. */
			$this->clear();

			/* Get email content and title.*/
			$this->view->mail = $mail;
			$mailContent = $this->parse('report', 'dailyreminder');
			$mailTitle = $this->lang->report->mailtitle->begin;
			$mailTitle .= isset($mail->bugs) ? sprintf($this->lang->report->mailtitle->bug, count($mail->bugs)) : '';
			$mailTitle .= isset($mail->tasks) ? sprintf($this->lang->report->mailtitle->task, count($mail->tasks)) : '';
			$mailTitle .= isset($mail->todos) ? sprintf($this->lang->report->mailtitle->todo, count($mail->todos)) : '';
			$mailTitle = rtrim($mailTitle, ',');

			/* Send email.*/
			echo date('Y-m-d H:i:s') . " sending to $user, ";
			$this->mail->send($user, $mailTitle, $mailContent, '', true);
			if ($this->mail->isError()) {
				echo "fail: \n";
				a($this->mail->getError());
			}
			echo "ok\n";
		}
	}

}
