<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/sparkline.html.php'; ?>

<div id='featurebar'>
	<div class='actions'>
		<?php echo html::a($this->createLink('project', 'create'), "<i class='icon-plus'></i> " . $lang->project->create, '', "class='btn'") ?>
	</div>
	<?php if (false) { ?>
	<ul class='nav'>
		<?php echo "<li id='undoneTab'>" . html::a(inlink("index", "locate=no&status=undone&projectID=$project->id"), $lang->project->undone) . '</li>'; ?>
		<?php echo "<li id='allTab'>" . html::a(inlink("index", "locate=no&status=all&projectID=$project->id"), $lang->project->all) . '</li>'; ?>
		<?php echo "<li id='waitTab'>" . html::a(inlink("index", "locate=no&status=wait&projectID=$project->id"), $lang->project->statusList['wait']) . '</li>'; ?>
		<?php echo "<li id='doingTab'>" . html::a(inlink("index", "locate=no&status=doing&projectID=$project->id"), $lang->project->statusList['doing']) . '</li>'; ?>
		<?php echo "<li id='suspendedTab'>" . html::a(inlink("index", "locate=no&status=suspended&projectID=$project->id"), $lang->project->statusList['suspended']) . '</li>'; ?>
		<?php echo "<li id='doneTab'>" . html::a(inlink("index", "locate=no&status=done&projectID=$project->id"), $lang->project->statusList['done']) . '</li>'; ?>
	</ul>
	<?php } ?>
</div>

<div class='main'>
	<table class='table tablesorter'>
		<?php $vars = "locate=no&status=$status&projectID=$projectID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}"; ?>
		<thead>
		<tr>
			<th class='w-id'><?php common::printOrderLink('id', $orderBy, $vars, $lang->idAB); ?></th>
			<th><?php common::printOrderLink('code', $orderBy, $vars, $lang->project->code); ?></th>
			<th class='w-200px'><?php common::printOrderLink('name', $orderBy, $vars, $lang->project->name); ?></th>
			<th><?php common::printOrderLink('pm', $orderBy, $vars, $lang->project->pm); ?></th>
			<th><?php common::printOrderLink('begin', $orderBy, $vars, $lang->project->begin); ?></th>
			<th><?php common::printOrderLink('end', $orderBy, $vars, $lang->project->espected_completion); ?></th>
			<th><?php echo $lang->project->actual_completion; ?></th>
			<th><?php common::printOrderLink('status', $orderBy, $vars, $lang->project->status); ?></th>
			<th class='w-150px'>项目维护</th>
		</tr>
		</thead>
		<?php foreach ($projectStats as $project) { ?>
			<tr class='text-center'>
				<td>
					<?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), sprintf('%03d', $project->id)); ?>
				</td>
				<td class='text-left'><?php echo $project->code; ?></td>
				<td class='text-left'><?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), $project->name); ?></td>
				<td><?php echo $users[$project->pm]; ?></td>
				<td><?php echo $project->begin; ?></td>
				<td><?php echo $project->espected_completion; ?></td>
				<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
				<td class='projectline text-left' values='<?php echo join(',', $project->burns); ?>'></td>
				<td>
					<?php echo html::a($this->createLink('project', 'edit', "projectID={$project->id}"), '编辑'); ?>
					|
					申请修改
					|
					<?php echo html::a($this->createLink('project', 'delete', "projectID={$project->id}"), '删除'); ?></td>
			</tr>
		<?php } ?>
		<tfoot>
		<tr>
			<td colspan='11'>
				<div class='table-actions clearfix'></div>
				<div class='text-right'><?php $pager->show(); ?></div>
			</td>
		</tr>
		</tfoot>
	</table>
</div>
<script>$("#<?php echo $status;?>Tab").addClass('active');</script>

<?php include '../../common/view/footer.html.php'; ?>
