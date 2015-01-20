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
	public function index()
	{
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

}
