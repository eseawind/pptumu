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
	public function getList($typeId = 0, $deleted = 0, $pager = null)
	{
		if ($deleted > 1) $deleted = 1;

		$this->dao->select('material.*, mtype.name AS type_name')->from(TABLE_MATERIAL)->alias('material');
		$this->dao->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id');
		$this->dao->where(1)
			->andWhere('material.deleted')->eq($deleted);
		if ($typeId) {
			$this->dao->andWhere('material.type_id')->eq($typeId);
		}

		$this->dao->orderBy('material.code');
		$this->dao->page($pager);

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
			return $materialId;
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
			->where(1)
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

		// application code
		$codeExist = false;
		do {
			$code = helper::genRandCode();
			$checkRes = $this->dao->select('COUNT(code) AS count')->from(TABLE_MATERIALAPPLICATION)
				->where('code')->eq($code)->fetch();
		} while ($codeExist);
		$application->code = $code;

		$this->dao->insert(TABLE_MATERIALAPPLICATION)->data($application)
			->exec();

		if (!dao::isError()) {
			$applicationID = $this->dao->lastInsertId();

			return $applicationID;
		}

		return false;
	}

	/**
	 * 更新材料申请，填充期望到场时间等
	 * @param $id
	 */
	public function updateApplication($applicationId, $application)
	{
		$oldApplication = $this->getApplicationById($applicationId);

		$dt = date('Y-m-d H:i:s');
		$application->modified = $dt;

		$this->dao->update(TABLE_MATERIALAPPLICATION)->data($application)
			->check('expect_arrival_date', 'date')
			->where('id')->eq($applicationId)
			->exec();

		if (!dao::isError()) return common::createChanges($oldApplication, $application);

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
	public function updateApplicationDetail($applicationId, $detailId, $detail)
	{
		$oldDetail = $this->getApplicationdetailById($applicationId, $detailId);

		$this->dao->update(TABLE_MATERIALAPPLICATIONDETAIL)->data($detail)
			->where('id')->eq($detailId)
			->exec();

		if (!dao::isError()) return common::createChanges($oldDetail, $detail);

		return false;
	}

	/**
	 * @param $conds array('project_id' => 0, 'verified' => 0)
	 * @raturn
	 */
	public function getApplicationList($conds = array(), $pager = null)
	{
		$fields = 'application.*, project.code AS project_code, project.name AS project_name';
		$this->dao->select($fields)
			->from(TABLE_MATERIALAPPLICATION)->alias('application')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('application.project_id = project.id')
			->where(1);
		if (@$conds['project_id']) {
			$this->dao->andWhere('application.project_id')->eq($conds['project_id']);
		}
		// verified = 0 情况
		if (isset($conds['verified'])) {
			$this->dao->andWhere('application.verified')->eq($conds['verified']);
		}
		$applications = $this->dao->orderBy('application.id DESC')
			->page($pager)
			->fetchAll();

		foreach ($applications As $i => $application) {
			$applications[$i]->details = $this->getApplicationDetails($application->id);
		}

		return $applications;
	}

	/**
	 * @param $applicationID
	 */
	public function getApplicationById($applicationID)
	{
		$fields = 'application.*, project.code AS project_code, project.name AS project_name';
		$this->dao->select($fields)
			->from(TABLE_MATERIALAPPLICATION)->alias('application')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('application.project_id = project.id')
			->where('application.id')->eq($applicationID);

		$application = $this->dao->fetch();

		$application->details = $this->getApplicationDetails($application->id);

		return $application;
	}

	/**
	 *
	 */
	public function getApplicationDetails($applicationID)
	{
		$details = $this->dao->select('detail.*, material.name AS material_name, material.unit AS material_unit, mtype.name AS material_type_name')
			->from(TABLE_MATERIALAPPLICATIONDETAIL)->alias('detail')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('detail.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('detail.application_id')->eq($applicationID)
			->orderBy('id ASC')
			->fetchAll('id');

		return $details;
	}

	/**
	 * @param $projectID
	 * @param array $conds array('verified' => 2, ....)
	 * @return mixed
	 */
	public function getProjectApplications($projectID, $conds = array())
	{
		$this->dao->select('application.id AS application_id, detail.id AS detail_id, detail.material_id, detail.qty,  material.code AS material_code, material.name AS material_name, material.unit AS material_unit, mtype.name AS material_type_name')
			->from(TABLE_MATERIALAPPLICATION)->alias('application')
			->rightJoin(TABLE_MATERIALAPPLICATIONDETAIL)->alias('detail')
			->on('detail.application_id = application.id')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('detail.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('application.project_id')->eq($projectID);
		if (isset($conds['verified'])) {
			$this->dao->andWhere('application.verified')->eq((int)$conds['verified']);
		}
		$this->dao->andWhere('application.deleted')->eq(0)
				->orderBy('application.id DESC');

		$materialApps = $this->dao->fetchAll();

		$proAppQtys = array();
		foreach ($materialApps As $app) {
			if (!isset($proAppQtys[$app->material_id])) {
				$proAppQtys[$app->material_id] = $app;
			} else {
				$proAppQtys[$app->material_id]->qty += floatval($app->qty);
			}
		}

		return $proAppQtys;
	}

	public function getApplicationdetailById($applicationID, $applicationdetailID)
	{
		$detail = $this->dao->select('detail.id, detail.qty, detail.material_id, application.id AS applicatioin_id, material.name AS material_name, material.unit AS material_unit, material.type_id AS material_type_id, mtype.name AS material_type_name')
			->from(TABLE_MATERIALAPPLICATIONDETAIL)->alias('detail')
			->leftJoin(TABLE_MATERIALAPPLICATION)->alias('application')
			->on('detail.application_id = application.id')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('detail.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('detail.id')->eq($applicationdetailID)
			->andWhere('detail.application_id')->eq($applicationID)
			->fetch();

		return $detail;
	}

}
