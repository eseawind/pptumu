<?php

/**
 * The model file of dashboard module of System.
 */

class myModel extends model
{
	/**
	 * Set menu.
	 *
	 * @access public
	 * @return void
	 */
	public function setMenu()
	{
		$this->lang->my->menu->account = sprintf($this->lang->my->menu->account, $this->app->user->realname);

		/* Adjust the menu order according to the user role. */
		$role = $this->app->user->role;
		if ($role == 'qa') {
			unset($this->lang->my->menuOrder[20]);
			$this->lang->my->menuOrder[32] = 'task';
		} elseif ($role == 'po') {
			unset($this->lang->my->menuOrder[35]);
			unset($this->lang->my->menuOrder[20]);
			$this->lang->my->menuOrder[17] = 'story';
			$this->lang->my->menuOrder[42] = 'task';
		} elseif ($role == 'pm') {
			unset($this->lang->my->menuOrder[40]);
			$this->lang->my->menuOrder[17] = 'myProject';
		}
	}

	/**
	 * order a modification application
	 * @param $objectType
	 * @param $objectID
	 */
	public function orderApplication()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');

		$application = fixer::input('post')->get();
		$application->applicant = $app->user->account;
		$application->verified = 0;
		$application->finished = 0;
		$application->created = $dt;
		$application->modified = $dt;

		// 判断是否已经存在相应的申请
		$existed = $this->dao->select('id')->from(TABLE_APPLICATION)
			->where('verified')->eq(0)
			->andWhere('finished')->eq(0)
			->andWhere('object_type')->eq($application->object_type)
			->andWhere('object_id')->eq($application->object_id)
			->fetch();

		$applicationID = null;
		if (!$existed) {
			$this->dao->insert(TABLE_APPLICATION)->data($application)
				->autoCheck()
				->check('object_type', 'notempty')
				->check('object_id', 'notempty')
				->checkIF($application->object_id != '', 'object_id', 'int')
				->exec();

			if (!dao::isError()) {
				$applicationID = $this->dao->lastInsertID();
			}
		} else {
			$applicationID = $existed->id;
		}

		return $applicationID;
	}

}
