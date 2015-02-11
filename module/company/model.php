<?php
/**
 * The model file of company module.
 */

class companyModel extends model
{
    /**
     * Set menu.
     * 
     * @param  int    $dept 
     * @access public
     * @return void
     */
    public function setMenu($dept = 0)
    {
        common::setMenuVars($this->lang->company->menu, 'name', array($this->app->company->name));
        common::setMenuVars($this->lang->company->menu, 'addUser', array($dept));
        common::setMenuVars($this->lang->company->menu, 'batchAddUser', array($dept));
    }

    /**
     * Get company list.
     * 
     * @access public
     * @return void
     */
    public function getList()
    {
        return $this->dao->select('*')->from(TABLE_COMPANY)->fetchAll();
    }

    /**
     * Get the first company.
     * 
     * @access public
     * @return void
     */
    public function getFirst()
    {
        return $this->dao->select('*')->from(TABLE_COMPANY)->orderBy('id')->limit(1)->fetch();
    }
    
    /**
     * Get company info by id.
     * 
     * @param  int    $companyID 
     * @access public
     * @return object
     */
    public function getByID($companyID = '')
    {
        return $this->dao->findById((int)$companyID)->from(TABLE_COMPANY)->fetch();
    }

    /**
     * Update a company.
     * 
     * @access public
     * @return void
     */
    public function update()
    {
        $company   = fixer::input('post')->get();        
        if($company->website  == 'http://') $company->website  = '';
        if($company->backyard == 'http://') $company->backyard = '';
        $companyID = $this->app->company->id;
        $this->dao->update(TABLE_COMPANY)
            ->data($company)
            ->autoCheck()
            ->batchCheck($this->config->company->edit->requiredFields, 'notempty')
            ->batchCheck('name', 'unique', "id != '$companyID'")
            ->where('id')->eq($companyID)
            ->exec();
    }
}
