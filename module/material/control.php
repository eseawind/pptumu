<?php
/**
 * material module
 */
class material extends control
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 */
	public function index($typeId = 0, $pageID = 1)
	{
		// pagination
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 20;
		$pager = new pager(0, $recPerPage, $pageID);

		$materials = $this->material->getList($typeId, 0, $pager);

		$materialTypes = $this->material->getMaterialTypes();

		$this->view->materialTypes = $materialTypes;
		$this->view->materials = $materials;
		$this->view->pager	   = $pager;

		$this->display();
	}

	/**
	 *
	 */
	public function create()
	{
		if(!empty($_POST)) {
			$materialID = $this->material->create();
			if(dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('material', $materialID, 'opened');
			die(js::locate($this->createLink('material', 'index'), 'parent'));
		}
		
		$materialTypes = $this->material->getMaterialTypes();
		
		$this->view->materialTypes = array('' => '请选择') + $materialTypes;
		$this->view->units = array_merge(array('' => '请选择'), $this->config->material->units);

		$this->display();
	}

	/**
	 *
	 */
	public function edit($materialId)
	{
		if(!empty($_POST)) {
			$changes = $this->material->update($materialId);
			if(dao::isError()) die(js::error(dao::getError()));

			if ($changes) {
				$actionID = $this->loadModel('action')->create('material', $materialId, 'edited');
				$this->action->logHistory($actionID, $changes);
			}
			die(js::locate($this->createLink('material', 'index'), 'parent'));
		}

		$material = $this->material->getById($materialId);

		$materialTypes = $this->material->getMaterialTypes();

		$this->view->material = $material;
		$this->view->materialTypes = array('' => '请选择') + $materialTypes;
		$this->view->units = array_merge(array('' => '请选择'), $this->config->material->units);

		$this->display();
	}

	/**
	 *
	 */
	public function delete($materialID, $confirm = 'no')
	{
		if ($confirm == 'no') {
			echo js::confirm('确认要删除？', $this->createLink('material', 'delete', "materialID={$materialID}&confirm=yes"));
			exit;
		} else {
			$this->material->delete(TABLE_MATERIAL, $materialID);
			die(js::locate(inlink('index'), 'parent'));
		}
	}

	/**
	 * 材料分配
	 */
	public function apply($step = 'project', $applicationID = 0)
	{
		if ($step == 'project') {
			if (!empty($_POST)) {
				$applicationID = $this->material->createApplication();
				if(dao::isError()) die(js::error(dao::getError()));

				$this->loadModel('action')->create('material application', $applicationID, 'created');
				die(js::locate($this->createLink('material', 'apply', "step=material&applicationID={$applicationID}"), 'parent'));
			}

			$this->loadModel('project');
			$projects = $this->project->getPairs('', ($this->app->user->role == 'pm' ? $this->app->user->account : ''));

			$this->view->projects = array('' => '请选择') + $projects;
		} else if ($step == 'material') {
			if (!empty($_POST)) {
				$details = fixer::input('post')->get();
				foreach ($details->material_id As $materialID) {
					$detail = new stdClass();
					$detail->application_id = $applicationID;
					$detail->material_id = $materialID;

					$detailID = $this->material->createApplicationDetail($detail);
					if(dao::isError()) die(js::error(dao::getError()));

					$this->loadModel('action')->create('material application detail', $detailID, 'created');
					unset($detail);
				}
				die(js::locate($this->createLink('material', 'apply', "step=qty&applicationID={$applicationID}"), 'parent'));
			}
			$materials = $this->material->getPeirsByType();

			$this->view->materials = $materials;
		} else if ($step == 'qty') {
			if (!empty($_POST)) {
				$details = fixer::input('post')
					->stripTags($this->config->material->editor->apply['id'], $this->config->allowedTags)
					->get();

				foreach ($details->id As $index => $id) {
					$detail = new stdClass();
					$detail->qty = $details->qty[$index];

					$changes = $this->material->updateApplicationDetail($applicationID, $id, $detail);

					if(dao::isError()) die(js::error(dao::getError()));
					if ($changes) {
						$actionID = $this->loadModel('action')->create('material application detail', $id, 'edited');
						$this->action->logHistory($actionID, $changes);
					}
					unset($detail);
				}

				$application = new stdClass();
				$application->expect_arrival_date = $details->expect_arrival_date;
				$application->remark = $details->remark;
				$changes = $this->material->updateApplication($applicationID, $application);

				if(dao::isError()) die(js::error(dao::getError()));
				if ($changes) {
					$actionID = $this->loadModel('action')->create('material application', $id, 'edited');
					$this->action->logHistory($actionID, $changes);
				}

				die(js::locate($this->createLink('material', 'applicationindex'), 'parent'));
			}

			$details = $this->material->getApplicationDetails($applicationID);

			$this->view->details = $details;
		}

		$this->view->step = $step;

		$this->display();
	}

	/**
	 * 材料申请列表
	 * @param int $pageID
	 */
	public function applicationindex($projectID = 0, $pageID = 1)
	{
		$this->loadModel('financial');
		// $verifiedVal = $this->financial->getVerifyStatusVal($verified);

		if (!empty($_POST)) {
			$search = fixer::input('post')->get();
			$projectID = $search->search['project_id'];
		}

		/* Load and initial pager. */
		$this->app->loadClass('pager', $static = true);
		$recPerPage = 5;
		$pager = new pager(0, $recPerPage, $pageID);

		$conds = array('project_id' => $projectID);
		$applications = $this->material->getApplicationList($conds, $pager);

		//
		$this->loadModel('project');
		$projects = $this->project->getPairs();

		$this->view->applications = $applications;
		$this->view->projects = array('' => '选择项目') + $projects;
		$this->view->projectID = $projectID;
		$this->view->pager = $pager;

		$this->display();
	}

}
