<?php include '../../common/view/header.html.php';?>

<div id='featurebar'>
	<form method="post" taget="" class="form-condensed">
		<div class="input-group">
			<span class="input-group-addon">按照项目筛查询申请记录：</span>
			<?php echo html::select('search[project_id]', $projects, $projectID, 'class="form-control"'); ?>
			<span class="input-group-btn">
			<button class="btn btn-default" type="submit">搜索</button>
		</span>
		</div>
	</form>
</div>

<div class='main'>
	<table class='table table-condensed table-striped tablesorter active-disabled'>
		<thead>
		<tr class="a-center">
			<th>序号</th>
			<th>申请编号</th>
			<th>项目名称</th>
			<th>材料名称 / 申请数量</th>
			<th>申请日期</th>
			<th>申请人</th>
			<th>申请状态</th>
			<th>材料到达时间</th>
			<th>备注</th>
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
			<td><?php if ($application->verified == 1) {
				echo "<span class=\"label label-badge label-success\">已通过</span>";
			} else if ($application->verified == 2) {
				echo "<span class=\"label label-badge label-success\">已采购到位并发放到工地</span>";
			} else {
				echo "<span class=\"label label-badge label-warning\">未通过</span>";
			} ?></td>
			<td><?php echo Helper::validate($application->expect_arrival_date, 'date'); ?></td>
			<td><div class='content'><?php echo $application->remark; ?></div></td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<td colspan="8"><div class='text-right'><?php $pager->show(); ?></div></td>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php';?>
