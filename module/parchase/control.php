<?php
/**
 * 财务管理
 */
class parchase extends control
{

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();

		$this->loadModel('project');
		$this->loadModel('material');
		$this->loadModel('report');
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
	public function history()
	{
		$this->display();
	}

	/**
	 *
	 */
	public function create()
	{
		$this->display();
	}

	/**
	 *
	 */
	public function edit()
	{
		$this->display();
	}

}
