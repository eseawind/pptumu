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
	public function index($typeId = 0, $recTotal = 0, $recPerPage = 100, $pageID = 1)
	{
		$materials = $this->material->getList($typeId);

		// pagination
		$this->app->loadClass('pager', $static = true);
		$pager = new pager($recTotal, $recPerPage, $pageID);

		$materialTypes = $this->material->getMaterialTypes();

		$this->view->materialTypes = $materialTypes;
		$this->view->materials = $materials;
		$this->view->pager	   = $pager;
		$this->view->recTotal	= $pager->recTotal;
		$this->view->recPerPage  = $pager->recPerPage;

		$this->display();
	}

	/**
	 *
	 */
	public function create()
	{
		if(!empty($_POST))
		{
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
		if(!empty($_POST))
		{
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
	public function delete()
	{

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
			$projects = $this->project->getPairs();

			$this->view->projects = array('' => '请选择') + $projects;
		} else if ($step == 'material') {
			if (!empty($_POST)) {

			}
			$materials = $this->material->getPeirsByType();

			$this->view->materials = $materials;
		} else if ($step == 'qty') {

		}

		$this->view->step = $step;

		$this->display();
	}
}
