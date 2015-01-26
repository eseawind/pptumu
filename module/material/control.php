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
	public function index($typeid = 0, $recTotal = 0, $recPerPage = 100, $pageID = 1)
	{
		$materials = $this->material->getList($typeid);

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
	public function types()
	{
		$materialTypes = $this->material->getMaterialTypes();
		$this->view->materialTypes = $materialTypes;

		$this->display();
	}

}
