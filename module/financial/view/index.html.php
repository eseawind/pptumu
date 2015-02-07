<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
		<thead>
		<tr class="a-center">
			<th>序号</th>
			<th>申请编号</th>
			<th>项目名称</th>
			<th>材料名称 / 申请数量</th>
			<th>申请日期</th>
			<th>申请人</th>
			<th>申请状态</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($applications As $i => $application) { ?>
		<tr>
			<td><?php echo $i + 1; ?></td>
			<td><?php echo $application->code; ?></td>
			<td><?php echo $application->project_name; ?></td>
			<td><?php foreach ($application->details As $detail) { ?>
				<p><?php echo $detail->material_name, ' / ', $detail->qty, $detail->material_unit; ?></p>
			<?php } ?></td>
			<td><?php echo date('Y-m-d', strtotime($application->created)); ?></td>
			<td><?php echo $application->created_by; ?></td>
			<td><?php echo $application->verified; ?></td>
			<td>
				<?php echo html::a($this->createLink('financial', 'distribute', "machineID={$machine->id}"), '点击审批'); ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
			<td colspan="8"><div class='text-right'><?php $pager->show(); ?></div></td>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php';?>
