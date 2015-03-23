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
	public function index($projectID = 0, $pageID = 1)
	{
		if (!empty($_POST)) {
			$search = fixer::input('post')->get();
			$projectID = $search->search['project_id'];
		}

		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$conds = array();
		$projectID && $conds['project_id'] = $projectID;

		$dailies = $this->dailyreview->getDailyList($conds, $pager);

		//
		$projects = $this->project->getPairs();

		$this->view->dailies = $dailies;
		$this->view->projects = array('' => '选择项目') + $projects;
		$this->view->projectID = $projectID;
		$this->view->pager = $pager;

		$this->display();
	}

	/**
	 * 审核日报
	 * @param $reportID
	 */
	public function reportreview($reportID)
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
	 * 签证审核
	 * @param $testationID
	 */
	public function testationreview($testationID)
	{
		$testation = $this->report->getTestationById($testationID);

		$this->view->testation = $testation;

		$this->display();
	}

	/**
	 * 存在问题审核
	 * @param $problemID
	 */
	public function problemreview($problemID)
	{
		$problem = $this->report->getProblemById($problemID);

		$this->view->problem = $problem;

		$this->display();
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

	public function verify()
	{
		$this->dailyreview->verify();

		if (dao::isError()) {
			$this->send(dao::getError(), 'json');
		} else {
			$this->send(array('result' => 'success'), 'json');
		}
	}

}
