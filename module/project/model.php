<?php

/**
 * Class projectModel
 */

class projectModel extends model
{
	/* The members every linking. */
	const LINK_MEMBERS_ONE_TIME = 20;

	/**
	 * Check the privilege.
	 *
	 * @param  object $project
	 * @access public
	 * @return bool
	 */
	public function checkPriv($project)
	{
		/* If is admin, return true. */
		$account = ',' . $this->app->user->account . ',';
		if (strpos($this->app->company->admins, $account) !== false) return true;

		/* If project is open, return true. */
		if ($project->acl == 'open') return true;

		/* Get all teams of all projects and group by projects, save it as static. */
		static $teams;
		if (empty($teams)) $teams = $this->dao->select('project, account')->from(TABLE_TEAM)->fetchGroup('project', 'account');
		$currentTeam = isset($teams[$project->id]) ? $teams[$project->id] : array();

		/* If project is private, only members can access. */
		if ($project->acl == 'private') {
			return isset($currentTeam[$this->app->user->account]);
		}

		/* Project's acl is custom, check the groups. */
		if ($project->acl == 'custom') {
			if (isset($currentTeam[$this->app->user->account])) return true;
			$userGroups = $this->app->user->groups;
			$projectGroups = explode(',', $project->whitelist);
			foreach ($userGroups as $groupID) {
				if (in_array($groupID, $projectGroups)) return true;
			}
			return false;
		}
	}

	/**
	 * Set menu.
	 *
	 * @param  array $projects
	 * @param  int $projectID
	 * @param  string $extra
	 * @access public
	 * @return void
	 */
	public function setMenu($projects, $projectID, $extra = '')
	{
		/* Check the privilege. */
		$project = $this->getById($projectID);

		/* Unset story, bug, build and testtask if type is ops. */
		if ($project and $project->type == 'ops') {
			unset($this->lang->project->menu->story);
			unset($this->lang->project->menu->bug);
			unset($this->lang->project->menu->build);
			unset($this->lang->project->menu->testtask);
		}

		if ($projects and !isset($projects[$projectID]) and !$this->checkPriv($project)) {
			echo(js::alert($this->lang->project->accessDenied));
			die(js::locate('back'));
		}

		$moduleName = $this->app->getModuleName();
		$methodName = $this->app->getMethodName();

		if ($this->cookie->projectMode == 'noclosed' and $project->status == 'done') {
			setcookie('projectMode', 'all');
			$this->cookie->projectMode = 'all';
		}

		$selectHtml = $this->select($projects, $projectID, $moduleName, $methodName, $extra);
		foreach ($this->lang->project->menu as $key => $menu) {
			$replace = $key == 'list' ? $selectHtml : $projectID;
			common::setMenuVars($this->lang->project->menu, $key, $replace);
		}
	}

	/**
	 * Create the select code of projects.
	 *
	 * @param  array $projects
	 * @param  int $projectID
	 * @param  string $currentModule
	 * @param  string $currentMethod
	 * @param  string $extra
	 * @access public
	 * @return string
	 */
	public function select($projects, $projectID, $currentModule, $currentMethod, $extra = '')
	{
		if (!$projectID) return;

		setCookie("lastProject", $projectID, $this->config->cookieLife, $this->config->webRoot);
		$currentProject = $this->getById($projectID);
		$output = "<a id='currentItem' href=\"javascript:showDropMenu('project', '$projectID', '$currentModule', '$currentMethod', '$extra')\">{$currentProject->name} <span class='icon-caret-down'></span></a><div id='dropMenu'></div>";
		return $output;
	}

	/**
	 * Get project tree menu.
	 *
	 * @access public
	 * @return void
	 */
	public function tree()
	{
		$products = $this->loadModel('product')->getPairs('nocode');
		$productGroup = $this->getProductGroupList();
		$projectTree = "<ul class='tree'>";
		foreach ($productGroup as $productID => $projects) {
			if (!isset($products[$productID]) and $productID != '') continue;
			if (!isset($products[$productID]) and !count($projects)) continue;

			$productName = isset($products[$productID]) ? $products[$productID] : $this->lang->project->noProduct;

			$projectTree .= "<li>$productName<ul>";

			foreach ($projects as $project) {
				if ($project->status != 'done') {
					$projectTree .= "<li>" . html::a(inlink('task', "projectID=$project->id"), $project->name, '', "id='project$project->id'") . "</li>";
				}
			}


			$hasDone = false;
			foreach ($projects as $project) {
				if ($project->status == 'done') {
					$hasDone = true;
					break;
				}
			}
			if ($hasDone) {
				$projectTree .= "<li>{$this->lang->project->selectGroup->done}<ul>";
				foreach ($projects as $project) {
					if ($project->status == 'done') {
						$projectTree .= "<li>" . html::a(inlink('task', "projectID=$project->id"), $project->name, '', "id='project$project->id'") . "</li>";
					}
				}
				$projectTree .= "</ul></li>";
			}

			$projectTree .= "</ul></li>";
		}

		$projectTree .= "</ul>";

		return $projectTree;
	}

	/**
	 * Save the project id user last visited to session.
	 *
	 * @param  int $projectID
	 * @param  array $projects
	 * @access public
	 * @return int
	 */
	public function saveState($projectID, $projects)
	{
		if ($projectID > 0) $this->session->set('project', (int)$projectID);
		if ($projectID == 0 and $this->cookie->lastProject) $this->session->set('project', (int)$this->cookie->lastProject);
		if ($projectID == 0 and $this->session->project == '') $this->session->set('project', $projects[0]);
		if (!in_array($this->session->project, $projects)) $this->session->set('project', $projects[0]);
		return $this->session->project;
	}

	/**
	 * Create a project.
	 *
	 * @access public
	 * @return void
	 */
	public function create()
	{
		$project = fixer::input('post')
			->stripTags($this->config->project->editor->create['id'], $this->config->allowedTags)
			->remove('files, labels')
			->remove('delta')
			->get();
		$this->dao->insert(TABLE_PROJECT)->data($project)
			->autoCheck($skipFields = 'begin,espected_completion')
			->batchcheck($this->config->project->create->requiredFields, 'notempty')
			->checkIF($project->begin != '', 'begin', 'date')
			->checkIF($project->espected_completion != '', 'espected_completion', 'date')
			->checkIF($project->espected_completion != '', 'espected_completion', 'gt', $project->begin)
			->checkIF($project->actual_completion != '', 'actual_completion', 'date')
			->checkIF($project->actual_completion != '', 'actual_completion', 'gt', $project->begin)
			->check('code', 'unique')
			->check('name', 'unique')
			->exec();

		if (!dao::isError()) {
			$projectID = $this->dao->lastInsertID();

			// update project document
			$this->loadModel('file')->saveUpload('project', $projectID);

			return $projectID;
		}

		return false;
	}

	/**
	 * Update a project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return array
	 */
	public function update($projectID)
	{
		$oldProject = $this->getById($projectID);
		$projectID = (int)$projectID;

		$project = fixer::input('post')
			->setIF($this->post->begin == '0000-00-00', 'begin', '')
			->setIF($this->post->espected_completion == '0000-00-00', 'espected_completion', '')
			->setIF($this->post->espected_completion == '0000-00-00', 'actual_completion', '')
			->stripTags($this->config->project->editor->edit['id'], $this->config->allowedTags)
			->remove('files, labels')
			->remove('delta')
			->get();
		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck($skipFields = 'begin,espected_completion,actual_completion')
			->batchcheck($this->config->project->edit->requiredFields, 'notempty')
			->checkIF($project->begin != '', 'begin', 'date')
			->checkIF($project->espected_completion != '', 'espected_completion', 'date')
			->checkIF($project->espected_completion != '', 'espected_completion', 'gt', $project->begin)
			->checkIF($project->actual_completion != '', 'actual_completion', 'date')
			->checkIF($project->actual_completion != '', 'actual_completion', 'gt', $project->begin)
			->check('code', 'unique', "id != $projectID")
			->check('name', 'unique', "id != $projectID")
			->where('id')->eq($projectID)
			->limit(1)
			->exec();

		if (!dao::isError()) {
			// update project document
			$this->loadModel('file')->saveUpload('project', $projectID);

			return $projectID;
		}

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Start project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function start($projectID)
	{
		$oldProject = $this->getById($projectID);
		$now = helper::now();
		$project = fixer::input('post')
			->setDefault('status', 'doing')
			->remove('comment')->get();

		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck()
			->where('id')->eq((int)$projectID)
			->exec();

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Put project off.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function putoff($projectID)
	{
		$oldProject = $this->getById($projectID);
		$now = helper::now();
		$project = fixer::input('post')->remove('comment')->get();

		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck()
			->where('id')->eq((int)$projectID)
			->exec();

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Suspend project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function suspend($projectID)
	{
		$oldProject = $this->getById($projectID);
		$now = helper::now();
		$project = fixer::input('post')
			->setDefault('status', 'suspended')
			->remove('comment')->get();

		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck()
			->where('id')->eq((int)$projectID)
			->exec();

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Activate project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function activate($projectID)
	{
		$oldProject = $this->getById($projectID);
		$now = helper::now();
		$project = fixer::input('post')
			->setDefault('status', 'doing')
			->remove('comment')->get();

		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck()
			->where('id')->eq((int)$projectID)
			->exec();

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Close project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function close($projectID)
	{
		$oldProject = $this->getById($projectID);
		$now = helper::now();
		$project = fixer::input('post')
			->setDefault('status', 'done')
			->remove('comment')->get();

		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck()
			->where('id')->eq((int)$projectID)
			->exec();

		if (!dao::isError()) return common::createChanges($oldProject, $project);
	}

	/**
	 * Get project pairs.
	 *
	 * @param  string $mode all|noclosed or empty
	 * @access public
	 * @return array
	 */
	public function getPairs($mode = '')
	{
		$orderBy = !empty($this->config->project->orderBy) ? $this->config->project->orderBy : 'modified, created';
		$mode .= $this->cookie->projectMode;
		/* Order by status's content whether or not done */
		$projects = $this->dao->select('*')->from(TABLE_PROJECT)
			->where('1')->eq(1)
			->andWhere('deleted')->eq(0)
			->orderBy($orderBy)
			->fetchAll();
		$pairs = array();
		foreach ($projects as $project) {
			if (strpos($mode, 'noclosed') !== false and $project->status == 'done') continue;
			if ($this->checkPriv($project)) {
				if (strpos($mode, 'nocode') === false and $project->code) {
					$firstChar = strtoupper(substr($project->code, 0, 1));
					if (ord($firstChar) < 127) $project->name = $firstChar . ':' . $project->name;
				}
				$pairs[$project->id] = $project->name;
			}
		}

		/* If the pairs is empty, to make sure there's an project in the pairs. */
		if (empty($pairs) and isset($projects[0]) and $this->checkPriv($projects[0])) {
			$firstProject = $projects[0];
			$pairs[$firstProject->id] = $firstProject->name;
		}
		return $pairs;
	}

	/**
	 * Get project lists.
	 *
	 * @param  array $conditions the filter conditioins
	 * @param  int $limit
	 * @param  int $productID
	 * @access public
	 * @return array
	 */
	public function getList($conds = array(), $pager = null)
	{
		$this->dao->select('project.*, application.id AS application_id, application.verified AS application_verified')->from(TABLE_PROJECT)->alias('project')
			->leftJoin(TABLE_APPLICATION)->alias('application')
			->on("application.object_id = project.id AND application.object_type = 'project' AND application.finished = 0")
			->where(1)
			->andWhere('project.deleted')->eq(0);
		if (@$conds['status']) $this->dao->andWhere('project.status')->eq($conds['status']);

		$this->dao->orderBy('project.id DESC');
		if (is_object($pager) && is_a($pager, 'pager')) {
			$this->dao->page($pager);
		}

		$projects = $this->dao->fetchAll('id');

		return $projects;
	}

	/**
	 * Get project stats.
	 *
	 * @param  string $status
	 * @param  int $productID
	 * @param  int $itemCounts
	 * @param  string $orderBy
	 * @param  int $pager
	 * @access public
	 * @return void
	 */
	public function getProjectStats($status = 'undone', $productID = 0, $itemCounts = 30, $orderBy = 'code', $pager = null)
	{
		/* Init vars. */
		$projects = $this->getList($status, 0, $productID);
		foreach ($projects as $projectID => $project) {
			if (!$this->checkPriv($project)) unset($projects[$projectID]);
		}
		$projects = $this->dao->select('*')->from(TABLE_PROJECT)
			->where('id')->in(array_keys($projects))
			->orderBy($orderBy)
			->page($pager)
			->fetchAll('id');

		$projectKeys = array_keys($projects);
		$stats = array();
		$hours = array();
		$emptyHour = array('totalEstimate' => 0, 'totalConsumed' => 0, 'totalLeft' => 0, 'progress' => 0);

		/* Get all tasks and compute totalEstimate, totalConsumed, totalLeft, progress according to them. */
		$tasks = $this->dao->select('id, project, estimate, consumed, `left`, status, closedReason')
			->from(TABLE_TASK)
			->where('project')->in($projectKeys)
			->andWhere('deleted')->eq(0)
			->fetchGroup('project', 'id');

		/* Compute totalEstimate, totalConsumed, totalLeft. */
		foreach ($tasks as $projectID => $projectTasks) {
			$hour = (object)$emptyHour;
			foreach ($projectTasks as $task) {
				$hour->totalEstimate += $task->estimate;
				$hour->totalConsumed += $task->consumed;
				$hour->totalLeft += ($task->status != 'cancel' and $task->closedReason != 'cancel') ? $task->left : 0;
			}
			$hours[$projectID] = $hour;
		}

		/* Compute totalReal and progress. */
		foreach ($hours as $hour) {
			$hour->totalEstimate = round($hour->totalEstimate, 1);
			$hour->totalConsumed = round($hour->totalConsumed, 1);
			$hour->totalLeft = round($hour->totalLeft, 1);
			$hour->totalReal = $hour->totalConsumed + $hour->totalLeft;
			$hour->progress = $hour->totalReal ? round($hour->totalConsumed / $hour->totalReal, 3) * 100 : 0;
		}

		/* Process projects. */
		foreach ($projects as $key => $project) {
			// Process the end time.
			$project->end = date("Y-m-d", strtotime($project->end));

			/* Process the hours. */
			$project->hours = isset($hours[$project->id]) ? $hours[$project->id] : (object)$emptyHour;

			$stats[] = $project;
		}

		return $stats;
	}

	/**
	 * Get project by id.
	 *
	 * @param  int $projectID
	 * @param  bool $setImgSize
	 * @access public
	 * @return void
	 */
	public function getById($projectID, $setImgSize = false)
	{
		$project = $this->dao->findById((int)$projectID)->from(TABLE_PROJECT)->fetch();
		if (!$project) return false;

		$project->files = $this->loadModel('file')->getByObject('project', $projectID);

		return $project;
	}

	/**
	 * Get the default managers for a project from it's related products.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return object
	 */
	public function getDefaultManagers($projectID)
	{
		$managers = $this->dao->select('PO,QD,RD')->from(TABLE_PRODUCT)->alias('t1')
			->leftJoin(TABLE_PROJECTPRODUCT)->alias('t2')->on('t1.id = t2.product')
			->where('t2.project')->eq($projectID)
			->fetch();
		if ($managers) return $managers;

		$managers = new stdclass();
		$managers->PO = '';
		$managers->QD = '';
		$managers->RD = '';
		return $managers;
	}

	/**
	 * Get projects to import
	 *
	 * @access public
	 * @return void
	 */
	public function getProjectsToImport()
	{
		$projects = $this->dao->select('distinct t1.*')->from(TABLE_PROJECT)->alias('t1')
			->leftJoin(TABLE_TASK)->alias('t2')->on('t1.id=t2.project')
			->where('t2.status')->notIN('done,closed')
			->andWhere('t2.deleted')->eq(0)
			->andWhere('t1.deleted')->eq(0)
			->orderBy('id desc')
			->fetchAll('id');

		$pairs = array();
		$now = date('Y-m-d');
		foreach ($projects as $id => $project) {
			if ($this->checkPriv($project) and ($project->status == 'done' or $project->end < $now)) $pairs[$id] = ucfirst(substr($project->code, 0, 1)) . ':' . $project->name;
		}
		return $pairs;
	}

	/**
	 * Judge an action is clickable or not.
	 *
	 * @param  object $project
	 * @param  string $action
	 * @access public
	 * @return bool
	 */
	public static function isClickable($project, $action)
	{
		$action = strtolower($action);

		if ($action == 'start') return $project->status == 'wait';
		if ($action == 'close') return $project->status != 'done';
		if ($action == 'suspend') return $project->status == 'wait' or $project->status == 'doing';
		if ($action == 'putoff') return $project->status == 'wait' or $project->status == 'doing';
		if ($action == 'activate') return $project->status == 'suspended' or $project->status == 'done';

		return true;
	}

	/**
	 * Create the link from module,method,extra
	 *
	 * @param  string $module
	 * @param  string $method
	 * @param  mix $extra
	 * @access public
	 * @return void
	 */
	public function getProjectLink($module, $method, $extra)
	{
		$link = '';
		if ($module == 'task' && ($method == 'view' || $method == 'edit' || $method == 'batchedit')) {
			$module = 'project';
			$method = 'task';
		}
		if ($module == 'build' && $method == 'edit') {
			$module = 'project';
			$method = 'build';
		}

		if ($module == 'project' && $method == 'create') return;
		if ($extra != '') {
			$link = helper::createLink($module, $method, "projectID=%s&type=$extra");
		} elseif ($module == 'project' && $method == 'index') {
			$link = helper::createLink($module, $method, "locate=no&status=undone&projectID=%s");
		} else {
			$link = helper::createLink($module, $method, "projectID=%s");
		}
		return $link;
	}

	/**
	 * Get no weekend date
	 *
	 * @param  string $begin
	 * @param  string $end
	 * @param  string $type
	 * @param  string|int $interval
	 * @access public
	 * @return array
	 */
	public function getDateList($begin, $end, $type, $interval = '')
	{
		$begin = strtotime($begin);
		$end = strtotime($end);

		$days = ($end - $begin) / 3600 / 24;
		if ($type == 'noweekend') {
			$mod = $days % 7;
			$days = $days - floor($days / 7) * 2;
			$days = $mod == 6 ? $days - 1 : $days;
		}

		if (!$interval) $interval = floor($days / $this->config->project->maxBurnDay);

		$dateList = array();
		$date = $begin;
		$spaces = (int)$interval;
		$counter = $spaces;
		while ($date <= $end) {
			/* Remove weekend when type is noweekend.*/
			if ($type == 'noweekend') {
				$weekDay = date('w', $date);
				if ($weekDay == 6 or $weekDay == 0) {
					$date += 24 * 3600;
					continue;
				}
			}

			$counter++;
			if ($counter <= $spaces) {
				$date += 24 * 3600;
				continue;
			}

			$counter = 0;
			$dateList[] = date('m/d/Y', $date);
			$date += 24 * 3600;
		}

		return array($dateList, $interval);
	}

}
