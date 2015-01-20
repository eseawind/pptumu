<?php
/**
 *
 */
class materialModel extends model
{
	/* The members every linking. */
	const LINK_MEMBERS_ONE_TIME = 20;
	
	/**
	 * Create material. 
	 * 
	 * @access public
	 * @return void
	 */
	public function create()
	{
		$dt = date('Y-m-d H:i:s');
		$material = fixer::input('post')->get();
		$material->created = $dt;
		$material->modified = $dt;
		// print_r($material); exit;
		$this->dao->insert(TABLE_MATERIAL)->data($material)
			->batchCheck($this->config->material->create->requiredFields, 'notempty')
			->check('name', 'unique')
			->exec();

		if(!dao::isError())
		{
			$materialID	 = $this->dao->lastInsertId();
	
			return $materialID;
		}
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
		$oldProject = $this->getById($projectID);
		$team = $this->getTeamMemberPairs($projectID);
		$this->lang->project->team = $this->lang->project->teamname;
		$projectID = (int)$projectID;
		$project = fixer::input('post')
			->setIF($this->post->begin == '0000-00-00', 'begin', '')
			->setIF($this->post->end   == '0000-00-00', 'end', '')
			->setIF($this->post->acl != 'custom', 'whitelist', '')
			->setDefault('team', $this->post->name)
			->join('whitelist', ',')
			->stripTags($this->config->project->editor->create['id'], $this->config->allowedTags)
			->remove('products')
			->get();
		$this->dao->update(TABLE_PROJECT)->data($project)
			->autoCheck($skipFields = 'begin,end')
			->batchcheck($this->config->project->edit->requiredFields, 'notempty')
			->checkIF($project->begin != '', 'begin', 'date')
			->checkIF($project->end != '', 'end', 'date')
			->checkIF($project->end != '', 'end', 'gt', $project->begin)
			->check('name', 'unique', "id!=$projectID")
			->check('code', 'unique', "id!=$projectID")
			->where('id')->eq($projectID)
			->limit(1)
			->exec();
		foreach($project as $fieldName => $value)
		{
			if($fieldName == 'PO' or $fieldName == 'PM' or $fieldName == 'QD' or $fieldName == 'RD' )
			{
				if(!empty($value) and !isset($team[$value]))
				{
					$member->project = (int)$projectID;
					$member->account = $value;
					$member->join	= helper::today();
					$member->role	= $this->lang->project->$fieldName;
					$member->days	= $project->days;
					$member->hours   = $this->config->project->defaultWorkhours;
					$this->dao->insert(TABLE_TEAM)->data($member)->exec();
				}
			}
		}
		if(!dao::isError()) return common::createChanges($oldProject, $project);
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
