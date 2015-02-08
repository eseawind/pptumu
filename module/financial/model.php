<?php
/**
 * Financial Model
 */

class financialModel extends model
{

	/**
	 * 审批材料分配
	 */
	public function verifyMaterialApplicatioin($applicationID)
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$application = fixer::input('post')
			->stripTags($this->config->financial->editor->verify['id'], $this->config->allowedTags)
			->get();

		$application->modified = $dt;
		$application->verified_by = $app->user->account;
		$application->verified_date = $dt;

		$details = $application->detail;
		unset($application->detail);

		$this->dao->update(TABLE_MATERIALAPPLICATION)->data($application)
			->where('id')->eq($applicationID)
			->exec();

		if ($application->verified > 0 && !dao::isError()) {
			// update application detail item
			foreach ($details['id'] As $i => $did) {
				$detail = array('price' => $application->detail['price'][$i]);

				$this->dao->update(TABLE_MATERIALAPPLICATIONDETAIL)->data($detail)
					->where('id')->eq($did)
					->exec();
			}

			return true;
		}

		return false;
	}

	/**
	 *
	 */
	public function getVerifyStatusVal($statusKey)
	{
		if (!array_key_exists($statusKey, $this->config->financial->verificationStatus)) {
			return 0;
		}

		return $this->config->financial->verificationStatus[$statusKey];
	}

	/**
	 *
	 */
	public function getVerifyStatusKey($statusVal)
	{
		$statusKey = '';

		if (!in_array($statusVal, $this->config->financial->verificationStatus)) {
			return 'pending';
		}
		foreach ($this->config->financial->verificationStatus As $k => $v) {
			if ($v === $statusVal) {
				$statusKey = $k;
				break;
			}
		}

		return $statusKey;
	}

}
