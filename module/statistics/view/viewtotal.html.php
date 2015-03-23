<?php include '../../common/view/header.html.php';?>

<div class='main'>
<?php if ($statistics) { ?>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<tbody>
		<tr>
			<td colspan="2" class='text-left'>
			<form class='form-condensed' method='post' target='hiddenwin' id='expire_form'>
				<div class='input-group w-600px'>
					<span class='input-group-addon'>统计周期:</span>
					<?php echo html::select('expire[begin]', $statistics->reportDateList, $statistics->beginDate, 'class="form-control"'); ?>
					<span class='input-group-addon'><?php echo $lang->project->to; ?></span>
					<?php echo html::select('expire[end]', $statistics->reportDateList, $statistics->endDate, 'class="form-control"'); ?>
					<span class="input-group-btn">
						<?php echo html::submitButton('查看', 'class="btn btn-primary"'); ?>
					</span>
				</div>
			</form>
			</td>
		</tr>
		<tr>
			<th class='w-100px'>项目状态:</th>
			<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
		</tr>
		</tbody>
	</table>

	<h4>人工</h4>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<tbody>
		<tr>
			<th class='w-100px'>公司员工:</th>
			<td class='w-p25-f'><?php echo $statistics->staff_qty_total; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>外雇人员:</th>
			<td><?php echo $statistics->extternal_qty_total; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>午饭人员:</th>
			<td><?php echo $statistics->lunch_qty_total; ?></td>
			<td>人</td>
		</tr>
		<tr>
			<th>晚饭人员:</th>
			<td><?php echo $statistics->supper_qty_total; ?></td>
			<td>人</td>
		</tr>
		</tbody>
	</table>

	<?php if ($materialTotal->totalExisting) { ?>
	<h4>材料</h4>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<thead>
		<tr>
			<th>进场数量</th>
			<th>实际用量</th>
			<th>剩余数量</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php foreach ($materialTotal->totalExisting As $material_id => $material) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $material->material_type_name . ' / ' . $material->material_name; ?>: </span>
					<?php echo $material->totalQty; ?>
					<span class=""><?php echo $material->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<td><?php foreach ($materialTotal->totalExisting As $material_id => $material) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $material->material_type_name . ' / ' . $material->material_name; ?>: </span>
					<?php echo $statistics->materialUsedTotal[$material_id]; ?>
					<span class=""><?php echo $material->material_unit; ?></span>
				</div>
			<?php } ?></td>
			<td><?php foreach ($materialTotal->totalExisting As $material_id => $material) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $material->material_type_name . ' / ' . $material->material_name; ?>: </span>
					<?php echo $material->totalQty - $statistics->materialUsedTotal[$material_id]; ?>
					<span class=""><?php echo $material->material_unit; ?></span>
				</div>
			<?php } ?></td>
		</tr>
		</tbody>
	</table>
	<?php } ?>

	<?php if ($statistics->machineSelfUsedTotal || $statistics->machineRentUsedTotal) { ?>
	<h4>机械</h4>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<thead>
		<tr>
			<th>公司机械</th>
			<th>外雇机械</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php foreach ($statistics->machineSelfUsedTotal As $machineUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $machineUsed->machiine_type_name . ' / ' . $machineUsed->machine_name; ?>: </span>
					<?php echo $machineUsed->hours; ?>
					<span class="">时</span>
				</div>
			<?php } ?></td>
			<td><?php foreach ($statistics->machineRentUsedTotal As $machineUsed) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $machineUsed->machiine_type_name . ' / ' . $machineUsed->machine_name; ?>: </span>
					<?php echo $machineUsed->hours; ?>
					<span class="">时</span>
				</div>
			<?php } ?></td>
		</tr>
		</tbody>
	</table>
	<?php } ?>
<?php } else { ?>
	<div>暂无日报记录!!</div>
<?php } ?>

<?php if ($materialTotal) { ?>
	<?php if (!$statistics) { ?>
	<h4>材料进场总量</h4>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<tbody>
		<tr>
			<td colspan="2"><?php foreach ($materialTotal->totalExisting As $material) { ?>
				<div class="input-group">
					<span class="input-group-addon w-180px"><?php echo $material->material_type_name . ' / ' . $material->material_name; ?>: </span>
					<?php echo $material->totalQty; ?>
					<span class=""><?php echo $material->material_unit; ?></span>
				</div>
			<?php } ?></td>
		</tr>
		</tbody>
	</table>
	<?php } ?>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<tbody>
		<tr>
			<td class="w-100px">总费用(市场价)</td>
			<td><?php echo number_format($materialTotal->totalFee, 1); ?></td>
		</tr>
		<tr>
			<td class="w-100px">总费用(竞标价)</td>
			<td><?php echo number_format($materialTotal->totalBidFee, 1); ?></td>
		</tr>
		</tbody>
	</table>
<?php } ?>

	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<tbody>
		<tr>
			<td class='text-center'>
				<?php echo html::a($this->createLink('statistics', 'tomorrowreportlist', "projectID={$project->id}"), '查看明日计划记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projectplans', "projectID={$project->id}"), '查看计划记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projecttestations', "projectID={$project->id}"), '查看签证记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projectproblems', "projectID={$project->id}"), '查看问题记录', '', 'class="btn"');?>

				<?php echo html::backButton(); ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
