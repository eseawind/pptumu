<?php include '../../common/view/header.html.php';?>

<div id='featurebar'>
<form method="post" taget="" class="form-condensed">
	<div class="input-group w-600px">
		<span class="input-group-addon">按照项目筛查询申请记录：</span>
		<?php echo html::select('search[project_id]', $projects, $projectID, 'class="form-control"'); ?>
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">搜索</button>
		</span>
	</div>
</form>
</div>

<div class='main'>
	<ul id="financial_tab" class="nav nav-primary nav-justified">
		<li class="<?php echo ($verified == 'pending') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('financial', 'index', "{$verifiedParams}&verified=pending"), '待审批'); ?>
		</li>
		<li class="<?php echo ($verified == 'passed') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('financial', 'index', "{$verifiedParams}&verified=passed"), '已审批'); ?>
		</li>
		<li class="<?php echo ($verified == 'distributed') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('financial', 'index', "{$verifiedParams}&verified=distributed"), '已发放'); ?>
		</li>
		<li class="<?php echo ($verified == 'refused') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('financial', 'index', "{$verifiedParams}&verified=refused"), '已拒绝'); ?>
		</li>
	</ul>
	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled'>
		<thead>
		<tr class="a-center">
			<th class="w-id">序号</th>
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
			<td class='text-center'><?php echo $i + 1; ?></td>
			<td class='text-center'><?php echo $application->code; ?></td>
			<td><?php echo $application->project_name; ?></td>
			<td><?php foreach ($application->details As $detail) { ?>
				<p><?php echo $detail->material_name, ' / ', $detail->qty, $detail->material_unit; ?></p>
			<?php } ?></td>
			<td class='text-center'><?php echo date('Y-m-d', strtotime($application->created)); ?></td>
			<td class='text-center'><?php echo $application->created_by; ?></td>
			<td class='text-center'><?php if ($application->verified == 1) {
					echo "<span class=\"label label-badge label-success\">已通过</span>";
				} else if ($application->verified == 2) {
					echo "<span class=\"label label-badge label-success\">已采购到位并发放到工地</span>";
				} else {
					echo "<span class=\"label label-badge label-warning\">未通过</span>";
				} ?></td>
			<td class='text-center'><?php echo html::a($this->createLink('financial', 'verify', "machineID={$application->id}"), '点击审批'); ?></td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
			<td colspan="8"><div class='text-right'><?php $pager->show(); ?></div></td>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php';?>
