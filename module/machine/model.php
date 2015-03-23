<?php
/**
 * 机械 Model
 */

class machineModel extends model
{

	/**
	 *
	 */
	public function getList($isRent = '', $typeId = 0, $deleted = 0, $pager = null)
	{
		if ($deleted > 1) $deleted = 1;
		if ($isRent !== '') {
			if ($isRent > 1) {
				$isRent = 1;
			} else if ($isRent < 0) {
				$isRent = 0;
			}
		}
		$fields = 'machine.*, mtype.name AS type_name';
		$this->dao->select($fields)->from(TABLE_MACHINE)->alias('machine');
		$this->dao->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id');
		$this->dao->where(1)
			->andWhere('deleted')->eq($deleted);
		if ($isRent !== '') {
			$this->dao->andWhere('is_rent')->eq($isRent);
		}
		if ($typeId) {
			$this->dao->andWhere('machine.type_id')->eq($typeId);
		}
		$this->dao->orderBy('machine.id');
		$this->dao->page($pager);

		$machines = $this->dao->fetchAll();

		foreach ($machines As $i => $machine) {
			$machines[$i]->distribution = $this->getMachineDistribution($machine->id);
		}

		return $machines;
	}

	/**
	 * @return int | bool
	 */
	public function create()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$machine = fixer::input('post')->get();
		$machine->created = $dt;
		$machine->modified = $dt;
		$machine->deleted = 0;
		$machine->created_by = $app->user->account;

		$this->dao->insert(TABLE_MACHINE)->data($machine)
			->check('code', 'unique')
			->exec();

		if (!dao::isError()) {
			$machineID = $this->dao->lastInsertId();

			return $machineID;
		}

		return false;
	}

	/**
	 * @return int | bool
	 */
	public function update($machineId)
	{
		global $app;

		$oldMachine = $this->getById($machineId);

		$dt = date('Y-m-d H:i:s');
		$machine = fixer::input('post')->get();
		$machine->code = $oldMachine->code;
		$machine->modified = $dt;
		$machine->deleted = 0;
		$machine->created_by = $app->user->account;

		$this->dao->update(TABLE_MACHINE)->data($machine)
			->check('code', 'unique', "id != {$machineId}")
			->where('id')->eq($machineId)
			->limit(1)
			->exec();

		if (!dao::isError()) {
			return $machineId;
		}

		return false;
	}

	/**
	 * Get machine by id.
	 *
	 * @param  int $projectID
	 * @access public
	 * @return void
	 */
	public function getById($machineID)
	{
		$fields = 'machine.*, mtype.name AS type_name';
		$machine = $this->dao->select($fields)->from(TABLE_MACHINE)->alias('machine')
			->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id')
			->where('machine.id')->eq($machineID)
			->fetch();

		return $machine;
	}

	/**
	 * Get Machine type.
	 *
	 * @access public
	 * @return array
	 */
	public function getMachineTypes()
	{
		return $this->dao->select('machinetype.id, machinetype.name')
			->from(TABLE_MACHINETYPE)->alias('machinetype')
			->where(1)->eq(1)
			->fetchPairs();
	}

	/**
	 *
	 */
	public function distribute()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$distributions = fixer::input('post')->get();

		$distributionID = array();
		foreach ($distributions->project_id As $i => $project_id) {
			if (!empty($project_id)) {
				$distribution = new stdClass();
				$distribution->project_id = $project_id;
				$distribution->machine_id = $distributions->machine_id;
				$distribution->begin = $distributions->begin[$i];
				$distribution->end = $distributions->end[$i];
				$distribution->verified = 1;
				$distribution->verified_by = $app->user->account;
				$distribution->created_by = $app->user->account;
				$distribution->deleted = 0;
				$distribution->created = $dt;
				$distribution->modified = $dt;

				$this->dao->insert(TABLE_MACHINEDISTRIBUTIION)->data($distribution)
					->check('project_id', 'notempty')
					->check('project_id', 'int')
					->check('begin', 'datetime')
					->check('end', 'datetime')
					->exec();
				if (!dao::isError()) {
					$distributionID[] = $this->dao->lastInsertId();
				} else {
					$distributionID[] = dao::getError();
				}
			}
		}

		return $distributionID;
	}

	/**
	 * machine distributions for a project
	 * @param $projectID
	 * @param array $mConds conditions for machine
	 * @return mixed
	 */
	public function getProjectDistribution($projectID, $reportDate = '', $mconds = array())
	{
		if ($reportDate === '') {
			$reportDate = date('Y-m-d');
		}

		$this->dao->select('distribution.id, distribution.project_id, distribution.begin, distribution.end, distribution.machine_id, machine.code AS machine_code, machine.name AS machine_name, machine.is_rent, machine.type_id, mtype.name AS type_name')
			->from(TABLE_MACHINEDISTRIBUTIION)->alias('distribution')
			->leftJoin(TABLE_MACHINE)->alias('machine')
			->on('machine.id = distribution.machine_id')
			->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id')
			->where('distribution.verified')->eq(1)
			->andWhere('distribution.project_id')->eq($projectID)
			->andWhere('distribution.deleted')->eq(0)
			->andWhere("(DATE(distribution.begin) >= '{$reportDate}' OR DATE(distribution.end) <= '{$reportDate}')")
			->orderBy('distribution.id DESC');

		$list = $this->dao->fetchAll('id');

		$distributions = new stdClass();
		$distributions->self = array();
		$distributions->rent = array();
		foreach ($list As $id => $distribution) {
			if ($distribution->is_rent == 1) {
				$distributions->rent[$id] = $distribution;
			} else {
				$distributions->self[$id] = $distribution;
			}
		}

		return $distributions;
	}

	/**
	 * machine distributions for a project
	 * @param $projectID
	 * @param array $mConds conditions for machine
	 * @return mixed
	 */
	public function getMachineDistribution($machineID, $endDate = '', $mconds = array())
	{
		if (!$endDate || validater::checkDate($endDate)) $endDate = date('Y-m-d H:i:s');

		$fields = 'distribution.*, project.code AS project_code, project.name AS project_name';
		$distributions = $this->dao->select($fields)
			->from(TABLE_MACHINEDISTRIBUTIION)->alias('distribution')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('project.id = distribution.project_id')
			->where('distribution.verified')->eq(1)
			->andWhere('distribution.machine_id')->eq($machineID)
			->andWhere('distribution.deleted')->eq(0)
			->andWhere('distribution.end')->gt($endDate)
			->orderBy('distribution.id DESC')
			->limit(1)
			->fetch();

		return $distributions;
	}

	/**
	 * @param $machineID
	 * @param null $pager
	 * @return mixed | array
	 */
	public function getAllDistributions($machineID, $pager = null)
	{
		$fields = 'distribution.*, project.code AS project_code, project.name AS project_name';
		$this->dao->select($fields)
			->from(TABLE_MACHINEDISTRIBUTIION)->alias('distribution')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('project.id = distribution.project_id')
			->where(1)
			->andWhere('distribution.machine_id')->eq($machineID)
			->andWhere('distribution.deleted')->eq(0);

		$distributions = $this->dao->orderBy('distribution.id DESC')
			->page($pager)
			->fetchAll();

		return $distributions;
	}

	/**
	 * 解析机械分配的状态
	 * @param $begin
	 * @param $end
	 */
	public static function parseDistributionStatus($begin, $end)
	{
		if (!(validater::checkDatetime($begin) && validater::checkDatetime($end))) return '--';

		$currentDt = mktime();

		$status = '';
		if (strtotime($begin) > $currentDt) {
			$status = 'wait';
		} else if ((strtotime($begin) <= $currentDt) && (strtotime($end) > $currentDt)) {
			$status = 'doing';
		} else if (strtotime($end)  <= $currentDt) {
			$status = 'done';
		} else {
			$status = '--';
		}

		return $status;
	}

	/**
	 * @param $begin
	 * @param $end
	 */
	public static function parseMachineDistributeExpire($begin, $end, $currentDate)
	{
		$expireDiff = date_diff($end, $begin);
	}

}
