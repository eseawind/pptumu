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
	 * @param  int $deleted  0|1
	 * @param  int	$limit 
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
			->andWhere('deleted')->eq($deleted);
		if ($typeId) {
			$this->dao->andWhere('material.type_id')->eq($typeId);
		}
		$this->dao->orderBy('material.code')
			->beginIF($limit)->limit($limit)->fi();

		return $this->dao->fetchAll('id');
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

		if(!dao::isError())
		{
			$materialID	 = $this->dao->lastInsertId();
	
			return $materialID;
		}

		return false;
	}
	
	/**
	 * Update material.
	 * 
	 * @param  int	$projectID 
	 * @access public
	 * @return array
	 */
	public function update($projectID)
	{

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
}
