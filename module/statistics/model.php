<?php
/**
 * The model file of statistics module.
 */

class statisticsModel extends model
{

	public function projectStatistics($projectID, $expire = array())
	{
		$fields = "daily.date, report.id AS report_id, report.daily_id, report.staff_qty AS report_staff_qty, report.extternal_qty AS report_extternal_qty, report.lunch_qty AS report_lunch_qty, report.supper_qty AS report_supper_qty, report.planned_qty AS report_planned_qty, report.actual_qty AS report_actual_qty, report.type AS report_type, report.verified AS report_verified, report.verified_by AS report_verified_by, report.verified_date AS report_verified_date";

		$allReports = $this->dao->select($fields)->from(TABLE_DAILY)->alias('daily')
			->rightJoin(TABLE_REPORT)->alias('report')
			->on("report.daily_id = daily.id AND report.type = 'today' AND report.verified = 1")
			->where('daily.project_id')->eq($projectID)
			->orderBy('daily.date ASC')
			->fetchAll();

		if ($expire) {
			$this->dao->select($fields)->from(TABLE_DAILY)->alias('daily')
				->rightJoin(TABLE_REPORT)->alias('report')
				->on("report.daily_id = daily.id AND report.type = 'today' AND report.verified = 1")
				->where('daily.project_id')->eq($projectID);

			if (@$expire['begin'] && @$expire['end']) {
				$this->dao->andWhere("daily.date >= '{$expire['begin']}' AND daily.date <= '{$expire['end']}'");
			}
			$reports = $this->dao->orderBy('daily.date ASC')
				->fetchAll();
		} else {
			$reports = $allReports;
		}

		$projectTotal = new stdClass();
		foreach ($allReports As $report) {
			$projectTotal->reportDateList[$report->date] = $report->date;
		}

		foreach ($reports As $i => $report) {
			$materialUsed = $this->dao->select('used.id, used.material_id, used.existing_qty, used.used_qty, used.remaining_qty')
				->from(TABLE_MATERIALUSEDHISTORY)->alias('used')
				->where('used.report_id')->eq($report->report_id)
				->fetchAll('material_id');

			$machineUsed = $this->dao->select('used.id, used.project_id, used.machine_id, used.hours, machine.code AS machine_code, machine.name AS machine_name, machine.is_rent AS machine_is_rent, mtype.name AS machiine_type_name')->from(TABLE_MACHINEUSEDHISTORY)->alias('used')
				->leftJoin(TABLE_MACHINE)->alias('machine')
				->on('used.machine_id = machine.id')
				->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
				->on('machine.type_id = mtype.id')
				->where('used.report_id')->eq($report->report_id)
				->fetchAll('id');

			$reports[$i]->materialUsedHistory = $materialUsed;
			$reports[$i]->machineUsedHistory = $machineUsed;
		}

		if (empty($reports)) return false;

		$projectTotal->beginDate = '';
		$projectTotal->endDate = '';

		// 材料总用量
		$projectTotal->materialUsedTotal = array();
		// 机械总用时
		$projectTotal->machineSelfUsedTotal = array();
		$projectTotal->machineRentUsedTotal = array();
		$reportCount = count($reports);
		foreach ($reports As $i => $report) {
			if ($i == 0) $projectTotal->beginDate = $report->date;
			if ($i == $reportCount - 1) $projectTotal->endDate = $report->date;

			$projectTotal->staff_qty_total += $report->report_staff_qty;
			$projectTotal->extternal_qty_total += $report->report_extternal_qty;
			$projectTotal->lunch_qty_total += $report->report_lunch_qty;
			$projectTotal->supper_qty_total += $report->report_supper_qty;

			foreach ($report->materialUsedHistory As $h) {
				if (!isset($projectTotal->materialUsedTotal[$h->material_id])) {
					$projectTotal->materialUsedTotal[$h->material_id] = new stdClass();
					$projectTotal->materialUsedTotal[$h->material_id] = $h->used_qty;
				} else {
					$projectTotal->materialUsedTotal[$h->material_id] += $h->used_qty;
				}
			}

			// 机械总用时
			foreach ($report->machineUsedHistory As $h) {
				if ($h->machine_is_rent == 1) {
					if (!isset($projectTotal->machineRentUsedTotal[$h->machine_id])) {
						$projectTotal->machineRentUsedTotal[$h->machine_id] = new stdClass();
						$projectTotal->machineRentUsedTotal[$h->machine_id] = $h;
					} else {
						$projectTotal->machineRentUsedTotal[$h->machine_id]->hours += $h->hours;
					}
				} else {
					if (!isset($projectTotal->machineSelfUsedTotal[$h->machine_id])) {
						$projectTotal->machineSelfUsedTotal[$h->machine_id] = new stdClass();
						$projectTotal->machineSelfUsedTotal[$h->machine_id] = $h;
					} else {
						$projectTotal->machineSelfUsedTotal[$h->machine_id]->hours += $h->hours;
					}
				}
			}
		}

		return $projectTotal;
	}

	/**
	 * 获取项目材料进场总量及其总费用
	 * @param $projectID
	 */
	public function projectMaterialApplicationTotal($projectID)
	{
		/** project all applications and detail */
		$projectAllApplications = $this->dao->select('application.*')
			->from(TABLE_MATERIALAPPLICATION)->alias('application')
			->where('application.project_id')->eq($projectID)
			->andWhere('application.verified')->eq(2)
			->andWhere('application.deleted')->eq(0)
			->orderBy('application.id DESC')
			->fetchAll();

		// total fee and bid fee for all material
		$totalFee = 0;
		$totalBidFee = 0;
		$totalExisting = array();
		foreach ($projectAllApplications As &$application) {
			$application->details = $this->loadModel('material')->getApplicationDetails($application->id);
			foreach ($application->details As $detail) {
				// $detail->price = $detail->bid_price = 1;
				$totalFee += $detail->price * $detail->qty;
				$totalBidFee += $detail->bid_price * $detail->qty;

				if (!isset($totalExisting[$detail->material_id])) {
					$totalExisting[$detail->material_id] = new stdClass();
					$totalExisting[$detail->material_id]->totalQty = $detail->qty;
				} else {
					$totalExisting[$detail->material_id]->totalQty += $detail->qty;
				}
			}
		}

		$materialFields = 'material.name AS material_name, material.unit AS material_unit, material.type_id AS material_type_id, mtype.name AS material_type_name';
		foreach ($totalExisting As $material_id => $m) {
			$material = $this->dao->select($materialFields)->from(TABLE_MATERIAL)->alias('material')
				->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
				->on('mtype.id = material.type_id')
				->where('material.id')->eq($material_id)
				->fetch();
			$totalExisting[$material_id] = (object)array_merge((array)$m, (array)$material);
		}

		return (object)compact('projectAllApplications', 'totalFee', 'totalBidFee', 'totalExisting');
	}

	public function machineStatistics($machineID, $expire = array(), $pager = null)
	{
		$fields = "used.id AS used_id, used.machine_id, used.hours AS used_hours, daily.id AS daily_id, daily.date AS report_date, daily.project_id, report.id AS report_id, report.type AS report_type, report.verified AS report_verified";

		$allUsedItems = $this->dao->select($fields)->from(TABLE_MACHINEUSEDHISTORY)->alias('used')
			->leftJoin(TABLE_REPORT)->alias('report')
			->on('used.report_id = report.id')
			->leftJoin(TABLE_DAILY)->alias('daily')
			->on('report.daily_id = daily.id')
			->where(1)
			->andWhere('used.machine_id')->eq($machineID)
			->andWhere('report.verified')->eq(1)
			->orderBy('daily.id DESC')->fetchAll();

		if ($expire) {
			$this->dao->select($fields)->from(TABLE_MACHINEUSEDHISTORY)->alias('used')
				->leftJoin(TABLE_REPORT)->alias('report')
				->on('used.report_id = report.id')
				->leftJoin(TABLE_DAILY)->alias('daily')
				->on('report.daily_id = daily.id')
				->where(1)
				->andWhere('used.machine_id')->eq($machineID)
				->andWhere('report.verified')->eq(1);

			if (@$expire['begin'] && @$expire['end']) {
				$this->dao->andWhere("daily.date >= '{$expire['begin']}' AND daily.date <= '{$expire['end']}'");
			}
			$usedItems = $this->dao->orderBy('daily.id DESC')->fetchAll();
		} else {
			$usedItems = $allUsedItems;
		}

		$reportDateList = array();
		foreach ($allUsedItems As $i => $item) {
			$reportDateList[$item->report_date] = $item->report_date;
		}

		$reportBegin = '';
		$reportEnd = '';
		$totalCount = count($usedItems);
		foreach ($usedItems As $i => $item) {
			$usedHoursTotal += $item->used_hours;
			if ($i == 0) $reportBegin = $item->report_date;
			if ($i == $totalCount - 1) $reportEnd = $item->report_date;
		}

		$machineStatistics = new stdClass();
		$machineStatistics->totalHours = $usedHoursTotal;
		$machineStatistics->reportBegin = $reportBegin;
		$machineStatistics->reportEnd = $reportEnd;
		$machineStatistics->reportDateList = $reportDateList;
		$machineStatistics->totalCount = $totalCount;
		$machineStatistics->list = $this->machineUsedHistory($machineID, $pager);

		return $machineStatistics;
	}

	public function machineUsedHistory($machineID, $pager = null)
	{
		$fields = "used.id AS used_id, used.machine_id, used.hours AS used_hours, daily.id AS daily_id, daily.date AS report_date, daily.project_id, report.id AS report_id, report.type AS report_type, report.verified AS report_verified, project.name AS project_name, project.code AS project_code, project.type AS project_type, project.status AS project_status, machine.name AS machine_name, machine.code AS machine_code, machine.is_rent AS machine_is_rent, machinetype.name AS machine_type_name";
		$this->dao->select($fields)->from(TABLE_MACHINEUSEDHISTORY)->alias('used')
			->leftJoin(TABLE_REPORT)->alias('report')
			->on('used.report_id = report.id')
			->leftJoin(TABLE_DAILY)->alias('daily')
			->on('report.daily_id = daily.id')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('daily.project_id = project.id')
			->leftJoin(TABLE_MACHINE)->alias('machine')
			->on('used.machine_id = machine.id')
			->leftJoin(TABLE_MACHINETYPE)->alias('machinetype')
			->on('machine.type_id = machinetype.id')
			->where(1)
			->andWhere('used.machine_id')->eq($machineID)
			->andWhere('report.verified')->eq(1);
		$machineUsedList = $this->dao->orderBy('daily.id DESC')
			->page($pager)
			->fetchAll();

		return $machineUsedList;
	}

	public function buildExpireDate()
	{
		$expire = fixer::input('post')
			->get('expire');

		if (validater::checkGT($expire['begin'], $expire['end'])) {
			return array('error' => 1, 'errormsg' => '开始时间必须小于等于结束时间');
		}

		$this->session->set('begin', $expire['begin']);
		$this->session->set('end', $expire['end']);

		return array('error' => 0, 'query_id' => 'expiredate');
	}
}
