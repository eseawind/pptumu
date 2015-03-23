<?php

class project extends control
{
	public $projects;

	/**
	 * Construct function, Set projects.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * The index page.
	 *
	 * @param  string $locate yes|no locate to the browse page or not.
	 * @param  string $status the projects status, if locate is no, then get projects by the $status.
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function index($status = 'doing', $orderBy = 'code_asc', $pageID = 1)
	{
		/* Load pager and get tasks. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 10;
		$pager = new pager(0, $recPerPage, $pageID);

		$projectConds = array();
		if ($this->app->user->role == 'pm') {
			$projectConds['pm'] = $this->app->user->account;
		}

		$this->app->loadLang('my');
		$this->view->title = $this->lang->project->allProject;
		$this->view->position[] = $this->lang->project->allProject;
		$this->view->projects = $this->project->getList($projectConds, $pager);
		$this->view->pager = $pager;
		$this->view->recTotal = $pager->recTotal;
		$this->view->recPerPage = $pager->recPerPage;
		$this->view->orderBy = $orderBy;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->view->status = $status;

		$this->display();
	}

	/**
	 * Browse a project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function browse($projectID = 0)
	{
		$this->locate($this->createLink($this->moduleName, 'task', "projectID=$projectID"));
	}

	/**
	 * Common actions.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return object current object
	 */
	private function commonAction($projectID = 0, $extra = '')
	{
		$projects = $this->project->getPairs('nocode');

		if (!$projects and $this->methodName != 'create' and $this->app->getViewType() != 'mhtml') $this->locate($this->createLink('project', 'create'));

		$actions = $this->loadModel('action')->getList('project', $project->id);

		/* Assign. */
		$this->view->projects = $projects;
		$this->view->actions = $actions;

		return true;
	}

	/**
	 * Create a project.
	 *
	 * @access public
	 * @return void
	 */
	public function create()
	{
		if (!empty($_POST)) {
			$projectID = $this->project->create();
			if (dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('project', $projectID, 'opened');
			die(js::locate($this->createLink('project', 'index', "projectID=$projectID"), 'parent'));
		}

		$name = '';
		$code = helper::genRandCode();

		$this->view->name = $name;
		$this->view->code = $code;
		$this->view->pmUsers = $this->loadModel('user')->getPairs('noclosed,nodeleted,pmfirst', '', 'pm');
		$this->view->title = $this->lang->project->create;
		$this->view->position[] = $this->view->title;

		$this->display();
	}

	/**
	 * Edit a project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function edit($projectID)
	{
		$browseProjectLink = $this->createLink('project', 'browse', "projectID=$projectID");
		if (!empty($_POST)) {
			$changes = $this->project->update($projectID);
			if (dao::isError()) die(js::error(dao::getError()));
			if ($changes) {
				$actionID = $this->loadModel('action')->create('project', $projectID, 'edited');
				$this->action->logHistory($actionID, $changes);
			}
			die(js::locate($this->createLink('project', 'view', "projectID=$projectID"), 'parent'));
		}

		/* Set menu. */
		$this->project->setMenu($this->projects, $projectID);

		$this->projects = $this->project->getPairs('nocode');

		$projects = array('' => '') + $this->projects;
		$project = $this->project->getById($projectID);
		$managers = $this->project->getDefaultManagers($projectID);

		/* Remove current project from the projects. */
		unset($projects[$projectID]);

		$title = $this->lang->project->edit . $this->lang->colon . $project->name;

		$this->view->projects = $projects;
		$this->view->project = $project;
		$this->view->pmUsers = $this->loadModel('user')->getPairs('noclosed,nodeleted,pmfirst', $project->pm, 'pm');
		$this->view->title = $title;
		$this->view->position[] = html::a($browseProjectLink, $project->name);
		$this->view->position[] = $this->lang->project->edit;

		$this->display();
	}

	/**
	 * Batch edit.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function batchEdit($projectID = 0)
	{
		if ($this->post->names) {
			$allChanges = $this->project->batchUpdate();
			if (!empty($allChanges)) {
				foreach ($allChanges as $projectID => $changes) {
					if (empty($changes)) continue;

					$actionID = $this->loadModel('action')->create('project', $projectID, 'Edited');
					$this->action->logHistory($actionID, $changes);
				}
			}
			die(js::locate($this->session->projectList, 'parent'));
		}

		$this->project->setMenu($this->projects, $projectID);

		$projectIDList = $this->post->projectIDList ? $this->post->projectIDList : die(js::locate($this->session->projectList, 'parent'));

		$this->view->title = $this->lang->project->batchEdit;
		$this->view->position[] = $this->lang->project->batchEdit;
		$this->view->projectIDList = $projectIDList;
		$this->view->projects = $this->dao->select('*')->from(TABLE_PROJECT)->where('id')->in($projectIDList)->fetchAll('id');
		$this->view->pmUsers = $this->loadModel('user')->getPairs('noclosed,nodeleted,pmfirst');
		$this->display();
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
		$this->commonAction($projectID);

		if (!empty($_POST)) {
			$this->loadModel('action');
			$changes = $this->project->start($projectID);
			if (dao::isError()) die(js::error(dao::getError()));

			if ($this->post->comment != '' or !empty($changes)) {
				$actionID = $this->action->create('project', $projectID, 'Started', $this->post->comment);
				$this->action->logHistory($actionID, $changes);
			}
			die(js::reload('parent.parent'));
		}

		$this->view->title = $this->view->project->name . $this->lang->colon . $this->lang->project->start;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $this->view->project->name);
		$this->view->position[] = $this->lang->project->start;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');

		$this->display();
	}

	/**
	 * Delay project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function putoff($projectID)
	{
		$this->commonAction($projectID);

		if (!empty($_POST)) {
			$this->loadModel('action');
			$changes = $this->project->putoff($projectID);
			if (dao::isError()) die(js::error(dao::getError()));

			if ($this->post->comment != '' or !empty($changes)) {
				$actionID = $this->action->create('project', $projectID, 'Delayed', $this->post->comment);
				$this->action->logHistory($actionID, $changes);
			}
			die(js::reload('parent.parent'));
		}

		$this->view->title = $this->view->project->name . $this->lang->colon . $this->lang->project->putoff;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $this->view->project->name);
		$this->view->position[] = $this->lang->project->putoff;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->display();
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
		$this->commonAction($projectID);

		if (!empty($_POST)) {
			$this->loadModel('action');
			$changes = $this->project->suspend($projectID);
			if (dao::isError()) die(js::error(dao::getError()));

			if ($this->post->comment != '' or !empty($changes)) {
				$actionID = $this->action->create('project', $projectID, 'Suspended', $this->post->comment);
				$this->action->logHistory($actionID, $changes);
			}
			die(js::reload('parent.parent'));
		}

		$this->view->title = $this->view->project->name . $this->lang->colon . $this->lang->project->suspend;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $this->view->project->name);
		$this->view->position[] = $this->lang->project->suspend;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->display();
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
		$this->commonAction($projectID);

		if (!empty($_POST)) {
			$this->loadModel('action');
			$changes = $this->project->activate($projectID);
			if (dao::isError()) die(js::error(dao::getError()));

			if ($this->post->comment != '' or !empty($changes)) {
				$actionID = $this->action->create('project', $projectID, 'Activated', $this->post->comment);
				$this->action->logHistory($actionID, $changes);
			}
			die(js::reload('parent.parent'));
		}

		$this->view->title = $this->view->project->name . $this->lang->colon . $this->lang->project->activate;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $this->view->project->name);
		$this->view->position[] = $this->lang->project->activate;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->display();
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
		$this->commonAction($projectID);

		if (!empty($_POST)) {
			$this->loadModel('action');
			$changes = $this->project->close($projectID);
			if (dao::isError()) die(js::error(dao::getError()));

			if ($this->post->comment != '' or !empty($changes)) {
				$actionID = $this->action->create('project', $projectID, 'Closed', $this->post->comment);
				$this->action->logHistory($actionID, $changes);
			}
			die(js::reload('parent.parent'));
		}

		$this->view->title = $this->view->project->name . $this->lang->colon . $this->lang->project->close;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $this->view->project->name);
		$this->view->position[] = $this->lang->project->close;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->display();
	}

	/**
	 * View a project.
	 *
	 * @param  int $projectID
	 * @param $nobody 浮动显示
	 * @access public
	 * @return void
	 */
	public function view($projectID)
	{
		$project = $this->project->getById($projectID, true);
		if (!$project) die(js::error($this->lang->notFound) . js::locate('back'));

		$this->view->title = $this->lang->project->view;

		$this->view->position[] = $this->view->title;
		$this->view->project = $project;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');

		$this->display();
	}

	/**
	 * Delete a project.
	 *
	 * @param  int $projectID
	 * @param  string $confirm yes|no
	 * @access public
	 * @return void
	 */
	public function delete($projectID, $confirm = 'no')
	{
		if ($confirm == 'no') {
			echo js::confirm(sprintf($this->lang->project->confirmDelete, $this->projects[$projectID]), $this->createLink('project', 'delete', "projectID=$projectID&confirm=yes"));
			exit;
		} else {
			$this->project->delete(TABLE_PROJECT, $projectID);
			$this->session->set('project', '');
			die(js::locate(inlink('index'), 'parent'));
		}
	}

	/**
	 * Send email.
	 *
	 * @param  int $taskID
	 * @param  int $actionID
	 * @access public
	 * @return void
	 */
	public function sendmail($taskID, $actionID)
	{
		/* Reset $this->output. */
		$this->clear();

		/* Set toList and ccList. */
		$task = $this->loadModel('task')->getById($taskID);
		$projectName = $this->project->getById($task->project)->name;
		$toList = $task->assignedTo;
		$ccList = trim($task->mailto, ',');

		if ($toList == '') {
			if ($ccList == '') return;
			if (strpos($ccList, ',') === false) {
				$toList = $ccList;
				$ccList = '';
			} else {
				$commaPos = strpos($ccList, ',');
				$toList = substr($ccList, 0, $commaPos);
				$ccList = substr($ccList, $commaPos + 1);
			}
		} elseif (strtolower($toList) == 'closed') {
			$toList = $task->finishedBy;
		}

		/* Get action info. */
		$action = $this->loadModel('action')->getById($actionID);
		$history = $this->action->getHistory($actionID);
		$action->history = isset($history[$actionID]) ? $history[$actionID] : array();

		/* Create the email content. */
		$this->view->task = $task;
		$this->view->action = $action;

		$mailContent = $this->parse($this->moduleName, 'sendmail');

		/* Send emails. */
		$this->loadModel('mail')->send($toList, $projectName . ':' . 'TASK#' . $task->id . $this->lang->colon . $task->name, $mailContent, $ccList);
		if ($this->mail->isError()) trigger_error(join("\n", $this->mail->getError()));
	}

	/**
	 * Manage products.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function manageProducts($projectID)
	{
		/* use first project if projectID does not exist. */
		if (!isset($this->projects[$projectID])) $projectID = key($this->projects);

		$browseProjectLink = $this->createLink('project', 'browse', "projectID=$projectID");
		if (!empty($_POST)) {
			$this->project->updateProducts($projectID);
			if (dao::isError()) dis(js::error(dao::getError()));
			die(js::locate($browseProjectLink));
		}

		$this->loadModel('product');
		$project = $this->project->getById($projectID);

		/* Set menu. */
		$this->project->setMenu($this->projects, $project->id);

		/* Title and position. */
		$title = $this->lang->project->manageProducts . $this->lang->colon . $project->name;
		$position[] = html::a($browseProjectLink, $project->name);
		$position[] = $this->lang->project->manageProducts;

		$allProducts = $this->product->getPairs();
		$linkedProducts = $this->project->getProducts($project->id);
		$linkedProducts = join(',', array_keys($linkedProducts));

		/* Assign. */
		$this->view->title = $title;
		$this->view->position = $position;
		$this->view->allProducts = $allProducts;
		$this->view->linkedProducts = $linkedProducts;

		$this->display();
	}

	/**
	 * Manage childs projects.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function manageChilds($projectID)
	{
		$browseProjectLink = $this->createLink('project', 'browse', "projectID=$projectID");
		if (!empty($_POST)) {
			$this->project->updateChilds($projectID);
			die(js::locate($browseProjectLink));
		}
		$project = $this->project->getById($projectID);
		$projects = $this->projects;
		unset($projects[$projectID]);
		unset($projects[$project->parent]);
		if (empty($projects)) $this->locate($browseProjectLink);

		/* Header and position. */
		$title = $this->lang->project->manageChilds . $this->lang->colon . $project->name;
		$position[] = html::a($browseProjectLink, $project->name);
		$position[] = $this->lang->project->manageChilds;

		$childProjects = $this->project->getChildProjects($project->id);
		$childProjects = join(",", array_keys($childProjects));

		/* Set menu. */
		$this->project->setMenu($this->projects, $project->id);

		/* Assign. */
		$this->view->title = $title;
		$this->view->position = $position;
		$this->view->projects = $projects;
		$this->view->childProjects = $childProjects;

		$this->display();
	}

	/**
	 * Manage members of the project.
	 *
	 * @param  int $projectID
	 * @param  int $team2Import the team to import.
	 * @access public
	 * @return void
	 */
	public function manageMembers($projectID = 0, $team2Import = 0)
	{
		if (!empty($_POST)) {
			$this->project->manageMembers($projectID);
			$this->locate($this->createLink('project', 'team', "projectID=$projectID"));
			exit;
		}
		$this->loadModel('user');

		$project = $this->project->getById($projectID);
		$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
		$roles = $this->user->getUserRoles(array_keys($users));
		$currentMembers = $this->project->getTeamMembers($projectID);
		$members2Import = $this->project->getMembers2Import($team2Import, array_keys($currentMembers));
		$teams2Import = $this->project->getTeams2Import($this->app->user->account, $projectID);
		$teams2Import = array($this->lang->project->copyTeam) + $teams2Import;

		/* The deleted members. */
		foreach ($currentMembers as $account => $member) {
			if (!isset($users[$member->account])) $member->account .= $this->lang->user->deleted;
		}

		/* Set menu. */
		$this->project->setMenu($this->projects, $project->id);

		$title = $this->lang->project->manageMembers . $this->lang->colon . $project->name;
		$position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $project->name);
		$position[] = $this->lang->project->manageMembers;

		$this->view->title = $title;
		$this->view->position = $position;
		$this->view->project = $project;
		$this->view->users = $users;
		$this->view->roles = $roles;
		$this->view->currentMembers = $currentMembers;
		$this->view->members2Import = $members2Import;
		$this->view->teams2Import = $teams2Import;
		$this->view->team2Import = $team2Import;
		$this->display();
	}

	/**
	 * Unlink a memeber.
	 *
	 * @param  int $projectID
	 * @param  string $account
	 * @param  string $confirm yes|no
	 * @access public
	 * @return void
	 */
	public function unlinkMember($projectID, $account, $confirm = 'no')
	{
		if ($confirm == 'no') {
			die(js::confirm($this->lang->project->confirmUnlinkMember, $this->inlink('unlinkMember', "projectID=$projectID&account=$account&confirm=yes")));
		} else {
			$this->project->unlinkMember($projectID, $account);

			/* if ajax request, send result. */
			if ($this->server->ajax) {
				if (dao::isError()) {
					$response['result'] = 'fail';
					$response['message'] = dao::getError();
				} else {
					$response['result'] = 'success';
					$response['message'] = '';
				}
				$this->send($response);
			}
			die(js::locate($this->inlink('team', "projectID=$projectID"), 'parent'));
		}
	}

	/**
	 * Link stories to a project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function linkStory($projectID = 0, $browseType = '', $param = 0)
	{
		$this->loadModel('story');
		$this->loadModel('product');

		/* Get projects and products. */
		$project = $this->project->getById($projectID);
		$products = $this->project->getProducts($projectID);
		$browseLink = $this->createLink('project', 'story', "projectID=$projectID");

		$this->session->set('storyList', $this->app->getURI(true)); // Save session.
		$this->project->setMenu($this->projects, $project->id);     // Set menu.

		if (empty($products)) {
			echo js::alert($this->lang->project->errorNoLinkedProducts);
			die(js::locate($this->createLink('project', 'manageproducts', "projectID=$projectID")));
		}

		if (!empty($_POST)) {
			$this->project->linkStory($projectID);
			die(js::locate($browseLink));
		}

		$queryID = ($browseType == 'bySearch') ? (int)$param : 0;

		/* Build search form. */
		unset($this->config->product->search['fields']['module']);
		$this->config->product->search['actionURL'] = $this->createLink('project', 'linkStory', "projectID=$projectID&browseType=bySearch&queryID=myQueryID");
		$this->config->product->search['queryID'] = $queryID;
		$this->config->product->search['params']['product']['values'] = $products + array('all' => $this->lang->product->allProductsOfProject);
		$this->config->product->search['params']['plan']['values'] = $this->loadModel('productplan')->getForProducts($products);
		unset($this->lang->story->statusList['draft']);
		$this->config->product->search['params']['status'] = array('operator' => '=', 'control' => 'select', 'values' => $this->lang->story->statusList);
		$this->loadModel('search')->setSearchParams($this->config->product->search);

		$title = $project->name . $this->lang->colon . $this->lang->project->linkStory;
		$position[] = html::a($browseLink, $project->name);
		$position[] = $this->lang->project->linkStory;

		if ($browseType == 'bySearch') {
			$allStories = $this->story->getBySearch('', $queryID, 'id', null, $projectID);
		} else {
			$allStories = $this->story->getProductStories(array_keys($products), $moduleID = '0', $status = 'active');
		}
		$prjStories = $this->story->getProjectStoryPairs($projectID);

		$this->view->title = $title;
		$this->view->position = $position;
		$this->view->project = $project;
		$this->view->products = $products;
		$this->view->allStories = $allStories;
		$this->view->prjStories = $prjStories;
		$this->view->browseType = $browseType;
		$this->view->users = $this->loadModel('user')->getPairs('noletter');
		$this->display();
	}

	/**
	 * Unlink a story.
	 *
	 * @param  int $projectID
	 * @param  int $storyID
	 * @param  string $confirm yes|no
	 * @access public
	 * @return void
	 */
	public function unlinkStory($projectID, $storyID, $confirm = 'no')
	{
		if ($confirm == 'no') {
			echo js::confirm($this->lang->project->confirmUnlinkStory, $this->createLink('project', 'unlinkstory', "projectID=$projectID&storyID=$storyID&confirm=yes"));
			exit;
		} else {
			$this->project->unlinkStory($projectID, $storyID);

			/* if ajax request, send result. */
			if ($this->server->ajax) {
				if (dao::isError()) {
					$response['result'] = 'fail';
					$response['message'] = dao::getError();
				} else {
					$response['result'] = 'success';
					$response['message'] = '';
				}
				$this->send($response);
			}
			echo js::locate($this->app->session->storyList, 'parent');
			exit;
		}
	}

	/**
	 * batch unlink story.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function batchUnlinkStory($projectID)
	{
		if (isset($_POST['storyIDList'])) {
			foreach ($this->post->storyIDList as $storyID) {
				$this->project->unlinkStory($projectID, $storyID);
			}
		}
		die(js::locate($this->createLink('project', 'story', "projectID=$projectID")));
	}

	/**
	 * Project dynamic.
	 *
	 * @param  string $type
	 * @param  string $orderBy
	 * @param  int $recTotal
	 * @param  int $recPerPage
	 * @param  int $pageID
	 * @access public
	 * @return void
	 */
	public function dynamic($projectID = 0, $type = 'today', $param = '', $orderBy = 'date_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
	{
		/* Save session. */
		$uri = $this->app->getURI(true);
		$this->session->set('productList', $uri);
		$this->session->set('productPlanList', $uri);
		$this->session->set('releaseList', $uri);
		$this->session->set('storyList', $uri);
		$this->session->set('projectList', $uri);
		$this->session->set('taskList', $uri);
		$this->session->set('buildList', $uri);
		$this->session->set('bugList', $uri);
		$this->session->set('caseList', $uri);
		$this->session->set('testtaskList', $uri);

		/* use first project if projectID does not exist. */
		if (!isset($this->projects[$projectID])) $projectID = key($this->projects);

		/* Append id for secend sort. */
		$sort = $this->loadModel('common')->appendOrder($orderBy);

		/* Set the menu. If the projectID = 0, use the indexMenu instead. */
		$this->project->setMenu($this->projects, $projectID);
		if ($projectID == 0) {
			$this->projects = array('0' => $this->lang->project->selectProject) + $this->projects;
			unset($this->lang->project->menu);
			$this->lang->project->menu = $this->lang->project->indexMenu;
			$this->lang->project->menu->list = $this->project->select($this->projects, 0, 'project', 'dynamic');
		}

		/* Set the pager. */
		$this->app->loadClass('pager', $static = true);
		$pager = pager::init($recTotal, $recPerPage, $pageID);

		/* Set the user and type. */
		$account = $type == 'account' ? $param : 'all';
		$period = $type == 'account' ? 'all' : $type;

		/* The header and position. */
		$project = $this->project->getByID($projectID);
		$this->view->title = $project->name . $this->lang->colon . $this->lang->project->dynamic;
		$this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $project->name);
		$this->view->position[] = $this->lang->project->dynamic;

		/* Assign. */
		$this->view->projectID = $projectID;
		$this->view->type = $type;
		$this->view->users = $this->loadModel('user')->getPairs('nodeleted|noletter');
		$this->view->account = $account;
		$this->view->orderBy = $orderBy;
		$this->view->pager = $pager;
		$this->view->param = $param;
		$this->view->actions = $this->loadModel('action')->getDynamic($account, $period, $sort, $pager, 'all', $projectID);
		$this->display();
	}

	/**
	 * AJAX: get products of a project in html select.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function ajaxGetProducts($projectID)
	{
		$products = $this->project->getProducts($projectID);
		die(html::select('product', $products, '', 'class="form-control"'));
	}

	/**
	 * AJAX: get team members of the project.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function ajaxGetMembers($projectID)
	{
		$users = $this->project->getTeamMemberPairs($projectID);
		die(html::select('assignedTo', $users, '', "class='form-control'"));
	}

	/**
	 * When create a project, help the user.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function tips($projectID)
	{
		$this->view->projectID = $projectID;
		$this->display('project', 'tips');
	}

	/**
	 * Drop menu page.
	 *
	 * @param  int $projectID
	 * @param  int $module
	 * @param  int $method
	 * @param  int $extra
	 * @access public
	 * @return void
	 */
	public function ajaxGetDropMenu($projectID, $module, $method, $extra)
	{
		$this->view->link = $this->project->getProjectLink($module, $method, $extra);
		$this->view->projectID = $projectID;
		$this->view->module = $module;
		$this->view->method = $method;
		$this->view->extra = $extra;
		$this->view->projects = $this->dao->select('*')->from(TABLE_PROJECT)->where('id')->in(array_keys($this->projects))->orderBy('code')->fetchAll();
		$this->display();
	}

	/**
	 * The results page of search.
	 *
	 * @param  string $keywords
	 * @param  string $module
	 * @param  string $method
	 * @param  mix $extra
	 * @access public
	 * @return void
	 */
	public function ajaxGetMatchedItems($keywords, $module, $method, $extra)
	{
		$projects = $this->dao->select('*')->from(TABLE_PROJECT)->where('deleted')->eq(0)->andWhere('name')->like("%$keywords%")->orderBy('code')->fetchAll();
		foreach ($projects as $key => $project) {
			if (!$this->project->checkPriv($project)) unset($projects[$key]);
		}

		$this->view->link = $this->project->getProjectLink($module, $method, $extra);
		$this->view->projects = $projects;
		$this->view->keywords = $keywords;
		$this->display();
	}
}
