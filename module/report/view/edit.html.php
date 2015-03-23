<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>

<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
			<strong>
				<small class='text-muted'><i class='icon icon-plus'></i></small>
				<?php echo '工程上报'; ?>
			</strong>
		</div>
	</div>

	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>选择日期:</th>
				<td class='w-p25-f'>
					<?php echo html::input('report_date', $report->date, "readonly='readonly' class='form-control'"); ?>
				</td>
				<td></td>
			</tr>
			</tbody>
		</table>
		<h4>人工</h4>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>公司员工:</th>
				<td class='w-p25-f'><?php echo html::input('staff_qty', $report->report_staff_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>外雇人员:</th>
				<td><?php echo html::input('extternal_qty', $report->report_extternal_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>午饭人员:</th>
				<td><?php echo html::input('lunch_qty', $report->report_lunch_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>晚饭人员:</th>
				<td><?php echo html::input('supper_qty', $report->report_supper_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
		</tbody>
		</table>

		<h4>材料</h4>
		<table class='table table-form'>
			<thead>
			<tr>
				<?php if ($report->report_type == 'today') { ?><th>进场数量</th><?php } ?>
				<th colspan="<?php echo ($report->report_type == 'tomorrow') ? 2 : 1; ?>"><?php echo $report->report_type == 'today' ? '实际用量' : '计划用量'; ?></th>
				<?php if ($report->report_type == 'today') { ?><th>剩余用量</th><?php } ?>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php if ($report->report_type == 'today') { ?>
				<td><?php foreach ($report->materialUsed As $muh) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $muh->material_type_name . ' / ' . $muh->material_name; ?>: </span>
						<?php echo html::input('material[existing_qty][]', $muh->existing_qty, "materialid=\"{$muh->material_id}\" class=\"form-control\" readonly=\"readonly\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $muh->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<?php } ?>
				<td colspan="<?php echo ($report->report_type == 'tomorrow') ? 2 : 1; ?>">
				<?php foreach ($report->materialUsed As $muh) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $muh->material_type_name . ' / ' . $muh->material_name; ?>: </span>
						<?php echo html::hidden('material[ids][]', $muh->material_id);
						echo html::hidden('material[materialusedhistoryids][]', $muh->id); ?>
						<?php echo html::input('material[used_qty][]', $muh->used_qty, "materialid=\"{$muh->material_id}\" class=\"form-control\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $muh->material_unit; ?></span>
					</div>
				<?php } ?>
				</td>
				<?php if ($report->report_type == 'today') { ?>
				<td><?php foreach ($report->materialUsed As $muh) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $muh->material_type_name . ' / ' . $muh->material_name; ?>: </span>
						<?php echo html::input('material[remaining_qty][]', $muh->remaining_qty, "materialid=\"{$muh->material_id}\" class=\"form-control\" readonly=\"readonly\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $muh->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<?php } ?>
			</tr>
			<?php if ($report->report_type == 'tomorrow') { ?>
			<tr>
				<th class='w-90px'>备注:</th>
				<td><?php echo html::textarea('material_remark', $report->report_material_remark, "class='form-control'");?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>

		<h4>机械</h4>
		<?php if ($report->report_type == 'today') { ?>
		<table class='table table-form'>
			<thead>
			<tr>
				<th class="w-p50">公司机械</th>
				<th class="w-p50">外雇机械</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?php foreach ($report->machineSelfUsed As $msu) { ?>
					<div class="input-group">
						<span class="input-group-addon w-180px"><?php echo $msu->type_name . ' / ' . $msu->machine_name; ?>: </span>
						<?php echo html::hidden('machine[ids][]', $msu->machine_id);
						echo html::hidden('material[materialusedhistoryids][]', $msu->id);
						echo html::input('machine[used_hours][]', $msu->hours, 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
				<td><?php foreach ($report->machineRentUsed As $mru) { ?>
					<div class="input-group">
						<span class="input-group-addon w-180px"><?php echo $mru->type_name . ' / ' . $mru->machine_name; ?>: </span>
						<?php  echo html::hidden('machine[ids][]', $mru->machine_id);
						echo html::hidden('machine[machineusedhistoryids][]', $mru->id);
						echo html::input('machine[used_hours][]', $mru->hours, 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
			</tr>
			</tbody>
		</table>
		<?php } else { ?>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>备注:</th>
				<td colspan="2"><?php echo html::textarea('machine_remark', $report->report_machine_remark, "class='form-control'");?></td>
			</tr>
			</tbody>
		</table>
		<?php } ?>

		<h4>计划</h4>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>计划工程量:</th>
				<td colspan="2"><?php echo html::textarea('planned_qty', $report->report_planned_qty, "class='form-control'");?></td>
			</tr>
			<?php if ($report->report_type == 'today') { ?>
			<tr>
				<th>实际工程量:</th>
				<td colspan="2"><?php echo html::textarea('actual_qty', $report->report_actual_qty, "rows='6' class='form-control'");?></td>
			</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td colspan='2' class='text-center'>
					<?php echo html::hidden('id', $report->id); ?>

					<?php echo html::submitButton() . html::backButton(); ?>
				</td>
			</tr>
			</tbody>
		</table>
	</form>
</div>
<?php if ($report->report_type == 'today') { ?>
<script language="javascript">
$(function() {
	$('input[name="material[used_qty][]"]').bind('change', function () {
		var material_id = $(this).attr('materialid');

		var existing_qty = $('input[name="material[existing_qty][]"][materialid="' + material_id + '"]').val();
		var remaining_qty = existing_qty - $(this).val();
		if (remaining_qty >= 0) {
			$('input[name="material[remaining_qty][]"][materialid="' + material_id + '"]').val(remaining_qty);
		} else {
			alert('实际用量不能大于进场数量');
			$(this).val(existing_qty);
		}

		return true;
	});
});
</script>
<?php } ?>
<?php include '../../common/view/footer.html.php'; ?>
