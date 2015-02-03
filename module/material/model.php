<?php

/**
 *
 */
class materialModel extends model
{
	/* The members every linking. */
	const LINK_MEMBERS_ONE_TIME = 20;

	/**
	 * Get material list.
	 *
	 * @param  int $deleted 0|1
	 * @param  int $limit
	 * @access public
	 * @return array
	 */
	public function getList($typeId = 0, $deleted = 0, $limit = 0)
	{
		if ($deleted > 1) $deleted = 1;

		$this->dao->select('material.*, mtype.name AS type_name')->from(TABLE_MATERIAL)->alias('material');
		$this->dao->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id');
		$this->dao->where(1)->eq(1)
			->andWhere('material.deleted')->eq($deleted);
		if ($typeId) {
			$this->dao->andWhere('material.type_id')->eq($typeId);
		}
		$this->dao->orderBy('material.code')
			->beginIF($limit)->limit($limit)->fi();

		return $this->dao->fetchAll('id');
	}

	/**
	 * get materials that sorted by type
	 */
	public function getPeirsByType($typeId = 0, $deleted = 0)
	{
		$materials = $this->dao->select('material.id, material.name, material.type_id, mtype.name AS type_name')
			->from(TABLE_MATERIAL)->alias('material')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where(1)->eq(1)
			->andWhere('material.deleted')->eq($deleted)
			->orderBy('mtype.name ASC')
			->fi()
			->fetchAll();

		$materialsByType = array();
		foreach ($materials As $material) {
			if (!isset($materialByType[$material->type_id])) {
				$materialsByType[$material->type_id]['name'] = $material->type_name;
			}
			$materialsByType[$material->type_id]['materials'][$material->id] = $material->name;
		}

		return $materialsByType;
	}

	/**
	 * Create material.
	 *
	 * @access public
	 * @return void
	 */
	public function create()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$material = fixer::input('post')->get();
		$material->created = $dt;
		$material->modified = $dt;
		$material->deleted = 0;
		$material->created_by = $app->user->account;

		$this->dao->insert(TABLE_MATERIAL)->data($material)
			->check('name', 'unique')
			->exec();

		if (!dao::isError()) {
			$materialID = $this->dao->lastInsertId();

			return $materialID;
		}

		return false;
	}

	/**
	 * @return int | bool
	 */
	public function update($materialId)
	{
		global $app;

		$oldMaterial = $this->getById($materialId);

		$dt = date('Y-m-d H:i:s');
		$material = fixer::input('post')->get();
		$material->code = $oldMaterial->code;
		$material->modified = $dt;
		$material->deleted = 0;
		$material->created_by = $app->user->account;

		$this->dao->update(TABLE_MATERIAL)->data($material)
			->check('code', 'unique', "id != {$materialId}")
			->where('id')->eq($materialId)
			->limit(1)
			->exec();

		if (!dao::isError()) {
			return $machineId;
		}

		return false;
	}

	/**
	 * Get material by id.
	 *
	 * @param  int $materialId
	 * @access public
	 * @return void
	 */
	public function getById($materialId)
	{
		$material = $this->dao->findById((int)$materialId)->from(TABLE_MATERIAL)->fetch();

		return $material;
	}

	/**
	 * Get material type.
	 *
	 * @access public
	 * @return array
	 */
	public function getMaterialTypes()
	{
		return $this->dao->select('materialtype.id, materialtype.name')
			->from(TABLE_MATERIALTYPE)->alias('materialtype')
			->where(1)->eq(1)
			->fetchPairs();
	}

	/**
	 * Create material application
	 */
	public function createApplication()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$application = fixer::input('post')->get();
		$application->created = $dt;
		$application->modified = $dt;
		$application->deleted = 0;
		$application->verified = 0;
		$application->created_by = $app->user->account;

		$this->dao->insert(TABLE_MATERIALAPPLICATION)->data($application)
			->exec();

		if (!dao::isError()) {
			$applicationID = $this->dao->lastInsertId();

			return $applicationID;
		}

		return false;
	}

	/**
	 * Create material application detail
	 */
	public function createApplicationDetail($detail)
	{
		$this->dao->insert(TABLE_MATERIALAPPLICATIONDETAIL)->data($detail)
			->exec();
		if (!dao::isError()) {
			$detailID = $this->dao->lastInsertId();

			return $detailID;
		}

		return false;
	}

	/**
	 *
	 */
	public function updateApplicationDetail($id, $detail)
	{
		$this->dao->update(TABLE_MATERIALAPPLICATIONDETAIL)->data($detail)
			->where('id')->eq($id)
			->exec();

		if (!dao::isError()) {
			return $id;
		}

		return false;
	}

	/**
	 *
	 */
	public function getApplicationDetails($applicationID)
	{
		$details = $this->dao->select('detail.id, detail.material_id, material.name AS material_name, material.unit AS material_unit')
			->from(TABLE_MATERIALAPPLICATIONDETAIL)->alias('detail')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('detail.material_id = material.id')
			->where('detail.application_id')->eq($applicationID)
			->orderBy('id ASC')
			->fetchAll('id');

		return $details;
	}

}
