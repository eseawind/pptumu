<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
	<div id='titlebar'>
		<div id="crumbs">
			<?php commonModel::printBreadMenu($this->moduleName, isset($position) ? $position : ''); ?>
		</div>
	</div>

	<fieldset>
		<legend><?php echo $lang->project->basicInfo; ?></legend>
		<table class='table table-data table-condensed table-borderless'>
			<tr>
				<th class='w-100px text-right strong'><?php echo $lang->project->code; ?></th>
				<td><?php echo $project->code; ?></td>
			</tr>
			<tr>
				<th class='strong'><?php echo $lang->project->name; ?></th>
				<td><?php echo $project->name; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang->project->beginAndEnd; ?></th>
				<td><?php echo $project->begin . ' ~ ' . $project->espected_completion; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang->project->actual_completion; ?></th>
				<td><?php echo $project->actual_completion; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang->project->type; ?></th>
				<td><?php echo $project->type; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang->project->pm; ?></th>
				<td><?php echo zget($users, $project->pm, $project->pm); ?></td>
			</tr>
			<tr>
				<th><?php echo $lang->project->status; ?></th>
				<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
			</tr>
		</table>
	</fieldset>
	<fieldset>
		<legend><?php echo $lang->project->desc; ?></legend>
		<div class='content'><?php echo $project->desc; ?></div>
	</fieldset>
	<?php if (!empty($project->files)) { ?>
		<?php echo $this->fetch('file', 'printFiles', array('files' => $project->files, 'fieldset' => 'true'));?>
	<?php } ?>
	<?php // include '../../common/view/action.html.php'; ?>
	<div class='actions'> <?php if (!$project->deleted) echo $actionLinks; ?></div>
</div>

<?php include '../../common/view/footer.html.php'; ?>
