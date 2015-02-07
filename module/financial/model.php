<?php
/**
 * Financial Model
 */

class financialModel extends model
{

	/**
	 *
	 */
	public function getList($conds = array(), $pager = null)
	{
		$financials = $this->dao->select('financial.id, financial.project_id, financial.material_id, financial.application_id, financial.applicationdetail_id, financial.price, financial.remark, project.name AS project_name, material.code AS material_code, material.name AS material_name, material.unit AS material_unit, mtype.name AS material_type_name')
			->from(TABLE_FINANCIAL)->alias('financial')
			->leftJoin(TABLE_PROJECT)->alias('project')
			->on('financial.project_id = project.id')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('financial.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('financial.deleted')->eq(0)
			->page($pager)
			->fetchAll('id');

		return $financials;
	}

	/**
	 * Create material financial for a project
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

		$this->dao->insert(TABLE_financial)->data($archase)
			->check('price', 'float')
			->check('price', 'gt', 0)
			->exec();
		if (!dao::isError()) {
			$financialID = $this->dao->lastInsertId();

			return $financialID;
		}

		return false;
	}

}
