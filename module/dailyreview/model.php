<?php
/**
 * The model file of dailyreview module.
 */

class dailyreviewModel extends model
{
	public function getDailyList($conds = array(), $pager = null)
	{
		$fields = 'daily.*';
		$fields .= ', project.code AS project_code, project.name AS project_name';

		$this->dao->select($fields)->from(TABLE_DAILY)->alias('daily')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('project.id = daily.project_id')
			->where(1);
		foreach ($conds As $field => $val) {
			$this->dao->andWhere($field)->eq($val);
		}
		$this->dao->page($pager);

		$dailies = $this->dao->fetchAll('id');

		// ****************
		foreach ($dailies As $id => $daily) {
			$dailies[$id]->today_report = $this->getDailyReport($id, 'today');
			$dailies[$id]->tomorrow_report = $this->getDailyReport($id, 'tomorrow');
			$dailies[$id]->testation = $this->getDailyTestation($id);
			$dailies[$id]->problem = $this->getDailyProblem($id);
		}

		return $dailies;
	}

	/**
	 *
	 */
	public function getDailyReport($dailyID, $type = 'today')
	{
		$this->dao->select('*')->from(TABLE_REPORT)
			->where('daily_id')->eq($dailyID)
			->andWhere('type')->eq($type)
			->orderBy('id_desc')
			->limit(1);
		$report = $this->dao->fetch();

		return $report;
	}

	/**
	 *
	 */
	public function getDailyTestation($dailyID)
	{
		$this->dao->select('*')->from(TABLE_TESTATION)
			->where('daily_id')->eq($dailyID)
			->orderBy('id_desc')
			->limit(1);
		$testation = $this->dao->fetch();

		return $testation;
	}

	/**
	 *
	 */
	public function getDailyProblem($dailyID)
	{
		$this->dao->select('*')->from(TABLE_PROBLEM)
			->where('daily_id')->eq($dailyID)
			->orderBy('id_desc')
			->limit(1);
		$problem = $this->dao->fetch();

		return $problem;
	}

	/**
	 *
	 */
	public function getVerifyStatusVal($statusKey)
	{
		if (!array_key_exists($statusKey, $this->config->dailyreview->status)) {
			return 0;
		}

		return $this->config->dailyreview->status[$statusKey];
	}

	/**
	 *
	 */
	public function getVerifyStatusKey($statusVal)
	{
		$statusKey = '';

		if (!in_array($statusVal, $this->config->dailyreview->status)) {
			return 'pending';
		}
		foreach ($this->config->dailyreview->status As $k => $v) {
			if ($v === $statusVal) {
				$statusKey = $k;
				break;
			}
		}

		return $statusKey;
	}

	/**
	 * 日报、签证、问题审核
	 */
	public function verify()
	{
		global $app;

		$verifiedData = fixer::input('post')->get();

		$dt = date('Y-m-d H:i:s');
		$verifiedData->verified_by = $app->user->account;
		$verifiedData->modified = $dt;
		$verifiedData->verified_date = $dt;

		$objectType = $verifiedData->object_type;
		$objectID = $verifiedData->object_id;

		unset($verifiedData->object_id, $verifiedData->object_type);

		$table = '';
		switch ($objectType) {
			case 'report': $table = TABLE_REPORT; break;
			case 'testation': $table = TABLE_TESTATION; break;
			case 'problem': $table = TABLE_PROBLEM;
		}
		if (!$table) return false;

		$this->dao->update($table)->data($verifiedData)
			->where('id')->eq($objectID)
			->limit(1)
			->exec();

		if (!dao::isError()) {
			return $objectID;
		}

		return false;
	}

}
