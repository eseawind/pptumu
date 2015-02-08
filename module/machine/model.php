<?php
/**
 *
 */

class machineModel extends model
{

	/**
	 *
	 */
	public function getList($isRent = 0, $typeId = 0, $deleted = 0, $pager = null)
	{
		if ($deleted > 1) $deleted = 1;
		if ($isRent > 1) {
			$isRent = 1;
		} else if ($isRent < 0) {
			$isRent = 0;
		}

		$this->dao->select('machine.*, mtype.name AS type_name')->from(TABLE_MACHINE)->alias('machine');
		$this->dao->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id');
		$this->dao->where(1)->eq(1)
			->andWhere('deleted')->eq($deleted)
			->andWhere('is_rent')->eq($isRent);
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
		$distribution = fixer::input('post')->get();
		$distribution->verified = 0;
		$distribution->verified_by = $app->user->account;
		$distribution->created_by = $app->user->account;
		$distribution->deleted = 0;
		$distribution->created = $dt;
		$distribution->modified = $dt;

		$this->dao->insert(TABLE_MACHINEDISTRIBUTIION)->data($distribution)
			->exec();

		if (!dao::isError()) {
			$distributionID = $this->dao->lastInsertId();

			return $distributionID;
		}

		return false;
	}

	/**
	 * machine distributions for a project
	 * @param $projectID
	 * @param array $mConds conditions for machine
	 * @return mixed
	 */
	public function getProjectDistribution($projectID, $mconds = array())
	{
		$dt = date('Y-m-d H:i:s');

		$distributions = $this->dao->select('distribution.id, distribution.machine_id, machine.code AS machine_code, machine.name AS machine_name, machine.type_id, mtype.name AS type_name')
			->from(TABLE_MACHINEDISTRIBUTIION)->alias('distribution')
			->leftJoin(TABLE_MACHINE)->alias('machine')
			->on('machine.id = distribution.machine_id')
			->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id')
			->where('distribution.verified')->eq(1)
			->andWhere('distribution.deleted')->eq(0)
			->andWhere('distribution.begin')->lt($dt)
			->andWhere('distribution.end')->gt($dt)
			->orderBy('distribution.id DESC')
			->fetchAll();

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

}
