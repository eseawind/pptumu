<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
		<thead>
		<tr>
			<th>所属项目</th>
			<th>材料名称</th>
			<th>所属分类</th>
			<th>申请数量</th>
			<th>单价</th>
			<th>提交日期</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody>
		<tr class="a-center">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		</tbody>
	</table>

	<div class='text-right'><?php $pager->show(); ?></div>
</div>

<?php include '../../common/view/footer.html.php'; ?>
