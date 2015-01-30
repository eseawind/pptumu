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
	public function index($isRent = 0, $typeId = 0, $recTotal = 0, $recPerPage = 100, $pageID = 1)
	{
		$machines = $this->machine->getList($isRent, $typeId);

		$machineTypes = $this->machine->getMachineTypes();

		// pagination
		$this->app->loadClass('pager', $static = true);
		$pager = new pager($recTotal, $recPerPage, $pageID);

		$createParams = helper::genParamstr(array('isRent' => $isRent));
		$typeParams = helper::genParamstr(array('isRent' => $isRent, 'typeId' => '%s'));

		$this->view->machines = $machines;
		$this->view->machineTypes = $machineTypes;
		$this->view->pager = $pager;
		$this->view->recTotal = $pager->recTotal;
		$this->view->recPerPage = $pager->recPerPage;
		$this->view->createParams = $createParams;
		$this->view->typeParams = $typeParams;

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
	public function edit($machineId)
	{
		$this->display();
	}

}