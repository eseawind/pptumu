<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/datepicker.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>
<div class='container mw-1400px'>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
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
			<td><?php echo $machine->type_name; ?></td>
			<td></td>
		</tr>
		<tr>
			<th>选择项目</th>
			<td><?php echo html::select('project_id', $projects, '', "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td class='col-xs-2'>
				<div class="input-group date form-datetime" data-link-format="yyyy-MM-dd H:i:s" data-link-field="begin" data-date-format="yyyy-MM-dd H:i:s" data-date="">
					<?php echo html::input('begin', '', "readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-MM-dd H:i:s" data-link-field="end" data-date-format="yyyy-MM-dd H:i:s" data-date="">
					<?php echo html::input('end', '', "readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
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
