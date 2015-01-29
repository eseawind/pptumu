<?php
/**
 *
 */
class machineModel extends model
{
	/* The members every linking. */
	const LINK_MEMBERS_ONE_TIME = 20;

	/**
	 *
	 */
	public function getList($isRent = 0, $deleted = 0, $typeId = 0, $limit = 0)
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
			->andWhere('deleted')->eq($deleted);
		if ($typeId) {
			$this->dao->andWhere('machine.type_id')->eq($typeId);
		}
		$this->dao->orderBy('machine.code')
			->beginIF($limit)->limit($limit)->fi();

		return $this->dao->fetchAll('id');
	}

	/**
	 * @return int | bool
	 */
	public function create()
	{
		$dt = date('Y-m-d H:i:s');
		$machine = fixer::input('post')->get();
		$machine->created = $dt;
		$machine->modified = $dt;
		$machine->deleted = 0;

		$this->dao->insert(TABLE_MACHINE)->data($machine)
			->check('name', 'unique')
			->exec();

		if(!dao::isError())
		{
			$materialID	 = $this->dao->lastInsertId();

			return $materialID;
		}

		return false;
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
}
