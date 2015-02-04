<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/datepicker.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>
<div class='container mw-1400px'> <!-- target='hiddenwin' -->
<form class='form-condensed' method='post' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id', $projects, '', "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td><div class="input-group date form-datetime" data-link-field="begin" data-date-format="yyyy-MM-dd HH:ii" data-date="">
				<?php echo html::input('begin', '', 'class="form-control" readonly="readonly"'); ?>
				<span class="input-group-addon">
					<span class="icon-remove"></span>
				</span>
				<span class="input-group-addon">
					<span class="icon-th"></span>
				</span>
			</div></td>
			<td></td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td><div class="input-group date form-datetime" data-link-field="end" data-date-format="yyyy-MM-dd HH:ii" data-date="">
				<?php echo html::input('end', '', 'class="form-control" readonly="readonly"'); ?>
				<span class="input-group-addon">
					<span class="icon-remove"></span>
				</span>
				<span class="input-group-addon">
					<span class="icon-th"></span>
				</span>
			</div></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2" class='text-center'>
				<?php echo html::hidden('machine_id', $machineID); ?>
				<?php echo html::submitButton() . html::backButton(); ?>
			</td>
		</tr>
	</table>
</form>
</div>

<?php include '../../common/view/footer.html.php';?>
