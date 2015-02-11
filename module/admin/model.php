<?php
/**
 * The model file of admin module.
 */

class adminModel extends model
{
    /**
     * The api agent(use snoopy).
     * 
     * @var object   
     * @access public
     */
    public $agent;

    /**
     * The api root.
     * 
     * @var string
     * @access public
     */
    public $apiRoot;

    /**
     * The construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setAgent();
    }

    /**
     * Set the api agent.
     * 
     * @access public
     * @return void
     */
    public function setAgent()
    {
        $this->agent = $this->app->loadClass('snoopy');
    }

    /**
     * Post data form  API 
     * 
     * @param  string $url 
     * @param  string $formvars 
     * @access public
     * @return void
     */
    public function postAPI($url, $formvars = "")
    {
		$this->agent->cookies['lang'] = $this->cookie->lang;
    	$this->agent->submit($url, $formvars);
		return $this->agent->results;
    }

    /**
     * Get status of zentaopms.
     * 
     * @access public
     * @return void
     */
    public function getStatOfPMS()
    {
        $sql = "SHOW TABLE STATUS";
        $tables = $this->dbh->query($sql)->fetchALL();
    }

    /**
     * Get state of company.
     * 
     * @param  int    $companyID 
     * @access public
     * @return void
     */
    public function getStatOfCompany($companyID)
    {
    }

    /**
     * Get system info.
     * 
     * @access public
     * @return void
     */
    public function getStatOfSys()
    {

    }

	/**
	 * Register zentao by API. 
	 * 
	 * @access public
	 * @return void
	 */
	public function registerByAPI()
	{
		$apiURL = 'http://www.zentao.net/user-register.json';
		return $this->postAPI($apiURL, $_POST);
	}

	/**
	 * Login zentao by API.
	 * 
	 * @access public
	 * @return void
	 */
	public function bindByAPI()
	{
		$apiURL = 'http://www.zentao.net/user-login.json';
		return $this->postAPI($apiURL, $_POST);
	}

	/**
	 * Get register information. 
	 * 
	 * @access public
	 * @return object
	 */
	public function getRegisterInfo()
    {
        $register = new stdclass();
		$register->company = $this->app->company->name;
		$register->email   = $this->app->user->email;
		return $register;
	}
}
