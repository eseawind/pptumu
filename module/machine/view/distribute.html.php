<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/datepicker.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>
<div class='container mw-1400px'> <!-- target='hiddenwin' -->
<form class='form-condensed' method='post' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->code; ?></th>
			<td class='w-p25-f'><?php echo $machine->code; ?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->name; ?></th>
			<td class='w-p25-f'><?php echo $machine->name; ?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->name; ?></th>
			<td class='w-p25-f'><?php echo $machine->name; ?></td>
			<td></td>
		</tr>

		<tr>
			<th><?php echo $isRent ? $lang->machine->ownerRent : $lang->machine->owner; ?></th>
			<td><?php echo $machine->owner; ?></td><td></td>
		</tr>
		<tr>
			<th><?php echo $lang->machine->type; ?></th>
			<td><?php echo $machine->type_name; ?></td><td></td>
		</tr>

		<tr>
			<th>选择项目</th>
			<td><?php echo html::select('project_id', $projects, '', "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class='input-group'>
					<?php echo html::input('begin', date('Y-m-d H:i:s'), "class='form-control form-datetime' placeholder='开始时间' readonly='readonly'"); ?>
					<span class='input-group-addon'>至</span>
					<?php echo html::input('end', '', "class='form-control form-datetime' placeholder='结束时间' readonly='readonly'"); ?>
				</div>
			</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2" class='text-center'>
				<?php echo html::hidden('machine_id', $machineID); ?>
				<?php echo html::submitButton('分配') . html::backButton(); ?>
			</td>
		</tr>
	</table>
</form>
</div>

<?php include '../../common/view/footer.html.php';?>
