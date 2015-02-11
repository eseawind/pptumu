<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed'>
		<thead>
		<tr>
			<th class='w-100px'>编号</th>
			<th>项目名称</th>
			<th class='w-80px'>项目类型</th>
			<th class='w-100px'>项目经理</th>
			<th class='w-200px'>项目周期</th>
			<th class='w-80px'>项目状态</th>
			<th class='w-150px'><?php echo $lang->actions; ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($projects As $i => $project) { ?>
		<tr>
			<td class='text-center'><?php echo $project->code; ?></td>
			<td><?php echo $project->name; ?></td>
			<td class='text-center'><?php echo $project->type; ?></td>
			<td class='text-center'><?php echo $users[$project->pm]; ?></td>
			<td class='text-center'><?php echo $project->begin . ' -> ' . $project->espected_completion; ?></td>
			<td class='text-center'><?php echo '进行中'; ?></td>
			<td class='text-center'>
				<?php echo html::a($this->createLink('statistics', 'reportlist', "projectID={$project->id}"), '日报表'); ?>|&nbsp;
				工程量统计</td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan='7'><div class='text-right'><?php $pager->show(); ?></div></td>
		</tr>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
