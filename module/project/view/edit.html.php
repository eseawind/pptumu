<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/datepicker.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>
<?php js::import($jsRoot . 'misc/date.js'); ?>

<div id='titlebar'>
	<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']); ?>
				<strong><?php echo $project->id; ?></strong></span>
		<strong><?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), $project->name, '_blank'); ?></strong>
		<small class='text-muted'> <?php echo $lang->project->edit; ?> <?php echo html::icon($lang->icons['edit']); ?></small>
	</div>
</div>

<div class='container mw-1400px'>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform' enctype='multipart/form-data'>
	<table class='table table-form'>
		<tr>
			<th class='w-100px'><?php echo $lang->project->code; ?></th>
			<td class='w-p25-f'><?php echo html::input('code', $project->code, "class='form-control' readonly='readonly'"); ?></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->name; ?></th>
			<td><?php echo html::input('name', $project->name, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->client; ?></th>
			<td><?php echo html::input('client', $project->client, "class='form-control'"); ?></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->address; ?></th>
			<td><?php echo html::input('address', $project->address, "class='form-control'"); ?></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->type; ?></th>
			<td><?php echo html::input('type', $project->type, "class='form-control'"); ?></td>
		</tr>
		<tr>
			<th class='w-90px'><?php echo $lang->project->dateRange; ?></th>
			<td>
				<div class='input-group'>
					<?php echo html::input('begin', $project->begin, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->begin . "' readonly='readonly'"); ?>
					<span class='input-group-addon'><?php echo $lang->project->to; ?></span>
					<?php echo html::input('espected_completion', $project->espected_completion, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->espected_completion . "' readonly='readonly'"); ?>
				</div>
			</td>
		</tr>
		<tr>
			<th><?php echo $lang->project->actual_completion; ?></th>
			<td>
				<?php echo html::input('actual_completion', $project->actual_completion, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->actual_completion . "' readonly='readonly'"); ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $lang->project->pm; ?></th>
			<td>
				<?php echo html::select('pm', $pmUsers, $project->pm, "class='form-control'"); ?>
			</td>
		</tr>
		<tr>
			<th><?php echo '上传项目文件'; ?></th>
			<td colspan='2'><?php echo $this->fetch('file', 'buildform', 'fileCount=1');?></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->desc; ?></th>
			<td colspan='2'><?php echo html::textarea('desc', htmlspecialchars($project->desc), "rows='6' class='form-control'"); ?></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->status; ?></th>
			<td><?php echo html::select('status', $lang->project->statusList, $project->status, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='2'><?php echo html::submitButton() . html::backButton(); ?></td>
		</tr>
	</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
