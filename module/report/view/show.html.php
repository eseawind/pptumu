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
			<td class='w-p25-f'><?php echo $report->staff_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>外雇人员:</th>
			<td><?php echo $report->extternal_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>午饭人员:</th>
			<td><?php echo $report->lunch_qty; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>晚饭人员:</th>
			<td><?php echo $report->supper_qty; ?></td>
			<td>人</td>
		</tr>
		</tbody>
	</table>

	<h4>材料</h4>
	<table class='table table-form'>
		<thead>
		<tr>
			<th>实际用量</th>
			<th>剩余用量</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php foreach ($report->material_used_history As $materialUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $materialUsed->material_type_name . ' / ' . $materialUsed->material_name; ?>: </span>
					<?php echo $materialUsed->used_qty; ?>
					<span class=""><?php echo $materialUsed->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<td></td>
		</tr>
		</tbody>
	</table>

	<h4>机械</h4>
	<table class='table table-form'>
		<thead>
		<tr>
			<th>公司机械</th>
			<th>外雇机械</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php foreach ($report->machine_used_history As $machineUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $machineUsed->machiine_type_name . ' / ' . $machineUsed->machine_name; ?>: </span>
					<?php echo $machineUsed->hours; ?>
					<span class="">时</span>
				</div>
			<?php } ?></td>
			<td><?php foreach ($report->machine_used_history As $machineUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $machineUsed->machiine_type_name . ' / ' . $machineUsed->machine_name; ?>: </span>
					<?php echo $machineUsed->hours; ?>
					<span class="">时</span>
				</div>
			<?php } ?></td>
		</tr>
		</tbody>
	</table>

	<h4>计划</h4>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>计划工程量:</th>
			<td colspan="2"><?php echo $report->planned_qty; ?></td>
		</tr>
		<tr>
			<th>实际工程量:</th>
			<td colspan="2"><?php echo $report->actual_qty; ?></td>
		</tr>
		<tr>
			<th>报告日期:</th>
			<td><?php echo $report->report_date; ?></td>
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
