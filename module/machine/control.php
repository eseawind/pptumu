<?php

/**
 * Machine module controller
 */
class machine extends control
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 */
	public function index($isRent = 0, $typeId = 0, $pageID = 1)
	{
		// pagination
		$recPerPage = 20;
		$this->app->loadClass('pager', $static = true);
		$pager = new pager(0, $recPerPage, $pageID);

		$machines = $this->machine->getList($isRent, $typeId, 0, $pager);

		$machineTypes = $this->machine->getMachineTypes();

		$createParams = helper::genParamstr(array('isRent' => $isRent));
		$typeParams = helper::genParamstr(array('isRent' => $isRent, 'typeId' => '%s'));
		$editParams = helper::genParamstr(array('isRent' => $isRent, 'machineId' => '%s'));

		$this->view->machines = $machines;
		$this->view->machineTypes = $machineTypes;
		$this->view->pager = $pager;
		$this->view->recTotal = $pager->recTotal;
		$this->view->recPerPage = $pager->recPerPage;
		$this->view->createParams = $createParams;
		$this->view->typeParams = $typeParams;
		$this->view->editParams = $editParams;

		$this->display();
	}

	/**
	 *
	 */
	public function create($isRent = 0)
	{
		if (!empty($_POST)) {
			$redirectParams = helper::genParamstr(array('isRent' => $isRent));

			$machineID = $this->machine->create();
			if (dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('machine', $machineID, 'created');

			die(js::locate($this->createLink('machine', 'index', $redirectParams), 'parent'));
		}

		$machineTypes = $this->machine->getMachineTypes();

		$machine = new stdClass();
		$machine->owner = '--';

		$this->view->machine = $machine;
		$this->view->isRent = $isRent;
		$this->view->machineTypes = array('' => '请选择') + $machineTypes;

		$this->display();
	}

	/**
	 *
	 */
	public function edit($isRent = 0, $machineId)
	{
		if (!empty($_POST)) {
			$redirectParams = helper::genParamstr(array('isRent' => $isRent));

			$changes = $this->machine->update($machineId);
			if (dao::isError()) die(js::error(dao::getError()));
			if ($changes) {
				$actionID = $this->loadModel('action')->create('machine', $machineId, 'edited');
				$this->action->logHistory($actionID, $changes);
			}
			die(js::locate($this->createLink('machine', 'index', $redirectParams), 'parent'));
		}

		$machine = $this->machine->getById($machineId);

		$machineTypes = $this->machine->getMachineTypes();

		$this->view->machineTypes = array('' => '请选择') + $machineTypes;
		$this->view->machine = $machine;
		$this->view->isRent = $isRent;

		$this->display();
	}

	/**
	 *
	 */
	public function delete($isRent = 0, $machineId)
	{

	}

	/**
	 *
	 */
	public function distribute($machineID)
	{
		if (!empty($_POST)) {
			$distributionID = $this->machine->distribute();
			if (dao::isError()) die(js::error(dao::getError()));

			$this->loadModel('action')->create('machine distributiion', $distributionID, 'created');

			die(js::locate($this->createLink('machine', 'index'), 'parent'));
		}
		$this->loadModel('project');
		$projects = $this->project->getPairs();

		$this->view->projects = array('' => '选择项目') + $projects;
		$this->view->machineID = $machineID;

		$this->display();
	}

}
