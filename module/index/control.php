<?php

/**
 * The control file of index module of ZenTaoPMS.
 *
 * When requests the root of a website, this index module will be called.
 *
 */
class index extends control
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
	}

	/**
	 * The index page of whole zentao system.
	 *
	 * @access public
	 * @return void
	 */
	public function index()
	{
		if ($this->app->getViewType() == 'mhtml') $this->locate($this->createLink($this->config->locate->module, $this->config->locate->method, $this->config->locate->params));
		$this->locate($this->createLink('my', 'index'));
	}

	/**
	 * Just test the extension engine.
	 *
	 * @access public
	 * @return void
	 */
	public function testext()
	{
		echo $this->fetch('misc', 'getsid');
	}
}
