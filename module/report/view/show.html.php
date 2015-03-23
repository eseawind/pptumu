<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<div id='titlebar'>
		<div id="crumbs">
			<?php commonModel::printBreadMenu($this->moduleName, isset($position) ? $position : ''); ?>
		</div>
	</div>

	<h4>人工</h4>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>公司员工:</th>
			<td class='w-20px'><?php echo $report->report_staff_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>外雇人员:</th>
			<td><?php echo $report->report_extternal_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>午饭人员:</th>
			<td><?php echo $report->report_lunch_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>晚饭人员:</th>
			<td><?php echo $report->report_supper_qty; ?></td>
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
			<td><?php foreach ($report->materialUsed As $materialUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $materialUsed->material_type_name . ' / ' . $materialUsed->material_name; ?>: </span>
					<?php echo $materialUsed->existing_qty; ?>
					<span class=""><?php echo $materialUsed->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<?php } ?>
			<td colspan="<?php echo ($report->report_type == 'tomorrow') ? 2 : 1; ?>"><?php foreach ($report->materialUsed As $materialUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $materialUsed->material_type_name . ' / ' . $materialUsed->material_name; ?>: </span>
					<?php echo $materialUsed->used_qty; ?>
					<span class=""><?php echo $materialUsed->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<?php if ($report->report_type == 'today') { ?>
			<td><?php foreach ($report->materialUsed As $materialUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $materialUsed->material_type_name . ' / ' . $materialUsed->material_name; ?>: </span>
					<?php echo $materialUsed->remaining_qty; ?>
					<span class=""><?php echo $materialUsed->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<?php } ?>
		</tr>
		<?php if ($report->report_type == 'tomorrow') { ?>
		<tr>
			<th class='w-90px'>备注:</th>
			<td><?php echo $report->report_material_remark; ?></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>

	<h4>机械</h4>
	<?php if ($report->report_type == 'today') { ?>
	<table class='table table-form'>
		<thead>
		<tr>
			<th>公司机械</th>
			<th>外雇机械</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php foreach ($report->machineSelfUsed As $msu) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $msu->machiine_type_name . ' / ' . $msu->machine_name; ?>: </span>
					<?php echo $msu->hours; ?>
					<span class="">时</span>
				</div>
			<?php } ?></td>
			<td><?php foreach ($report->machineRentUsed As $mru) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $mru->machiine_type_name . ' / ' . $mru->machine_name; ?>: </span>
					<?php echo $mru->hours; ?>
					<span class="">时</span>
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
			<td colspan="2"><?php echo $report->report_machine_remark; ?></td>
		</tr>
		</tbody>
	</table>
	<?php } ?>

	<h4>计划</h4>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>计划工程量:</th>
			<td colspan="2"><?php echo $report->report_planned_qty; ?></td>
		</tr>
		<?php if ($report->report_type == 'today') { ?>
		<tr>
			<th>实际工程量:</th>
			<td colspan="2"><?php echo $report->report_actual_qty; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>报告日期:</th>
			<td><?php echo $report->date; ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='2' class='text-center'>
				<?php echo html::backButton(); ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
