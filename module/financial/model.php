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
				$detail->price = $details['price'][$i];
				$detail->bid_price = $details['bid_price'][$i];

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
		if (!array_key_exists($statusKey, $this->config->financial->status)) {
			return 0;
		}

		return $this->config->financial->status[$statusKey];
	}

	/**
	 *
	 */
	public function getVerifyStatusKey($statusVal)
	{
		$statusKey = '';

		if (!in_array($statusVal, $this->config->financial->status)) {
			return 'pending';
		}
		foreach ($this->config->financial->status As $k => $v) {
			if ($v === $statusVal) {
				$statusKey = $k;
				break;
			}
		}

		return $statusKey;
	}

}
