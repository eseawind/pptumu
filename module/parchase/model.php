<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-2-7
 * Time: 下午3:54
 */

class parchaseModel extends model
{

	/**
	 *
	 */
	public function getList($conds = array(), $pager = null)
	{
		$parchases = $this->dao->select('parchase.id, parchase.project_id, parchase.material_id, parchase.application_id, parchase.applicationdetail_id, parchase.price, parchase.remark, project.name AS project_name, material.code AS material_code, material.name AS material_name, material.unit AS material_unit, mtype.name AS material_type_name')
			->from(TABLE_PARCHASE)->alias('parchase')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('parchase.project_id = project.id')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('parchase.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('parchase.deleted')->eq(0)
			->page($pager)
			->fetchAll('id');

		return $parchases;
	}

	/**
	 * Create material parchase for a project
	 */
	public function create()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$archase = fixer::input('post')->get();
		$archase->verified = 0;
		$archase->deleted = 0;
		$archase->created_by = $app->user->account;
		$archase->created = $dt;
		$archase->modified = $dt;

		$this->dao->insert(TABLE_PARCHASE)->data($archase)
			->check('price', 'float')
			->check('price', 'gt', 0)
			->exec();
		if (!dao::isError()) {
			$parchaseID = $this->dao->lastInsertId();

			return $parchaseID;
		}

		return false;
	}

}
