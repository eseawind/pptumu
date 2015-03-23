<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled'>
		<thead>
		<tr>
			<th colspan="7" class='text-left'>
				<div class='input-group w-600px'>
					<span class='input-group-addon'>统计周期:</span>
					<?php echo html::select('expire[begin]', $machineStatistics->reportDateList, '', 'class="form-control"'); ?>
					<span class='input-group-addon'><?php echo $lang->project->to; ?></span>
					<?php echo html::select('expire[end]', $machineStatistics->reportDateList, '', 'class="form-control"'); ?>
					<span class="input-group-btn">
						<?php echo html::submitButton('查看', 'class="btn btn-primary"'); ?>
					</span>
				</div>
			</th>
		</tr>
		<tr>
			<th class='w-100px'>项目编号</th>
			<th>项目名称</th>
			<th class='w-80px'>项目类型</th>
			<th class='w-100px'>机械编号</th>
			<th class='w-100px'>机械名称</th>
			<th class='w-200px'>报告日期</th>
			<th class='w-80px'>用时</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($machineStatistics->list As $i => $ms) { ?>
		<tr>
			<td class='text-center'><?php echo $ms->project_code; ?></td>
			<td><?php echo $ms->project_name; ?></td>
			<td class='text-center'><?php echo $lang->project->typeList[$ms->project_type]; ?></td>
			<td class='text-center'><?php echo $ms->machine_code; ?></td>
			<td class='text-left'><?php echo $ms->machine_name; ?></td>
			<td class='text-center'><?php echo $ms->report_date; ?></td>
			<td class='text-center'><?php echo $ms->used_hours, ' 时'; ?></td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan='7'>总共用时：<?php echo $machineStatistics->totalHours, ' 时'; ?></td>
		</tr>
		<tr>
			<td colspan='7'><div class='text-right'><?php $pager->show(); ?></div></td>
		</tr>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
