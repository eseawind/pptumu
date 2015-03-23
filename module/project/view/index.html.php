<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/sparkline.html.php'; ?>

<div id='featurebar'>
	<div class='actions'></div>
</div>

<div class="main">
	<table class='table table-condensed table-hover table-striped tablesorter active-disabled' id="projectList">
		<?php $vars = "status=$status&orderBy=%s&pageID={$pager->pageID}"; ?>
		<thead>
		<tr>
			<th class='w-id'><?php common::printOrderLink('id', $orderBy, $vars, $lang->idAB); ?></th>
			<th><?php common::printOrderLink('code', $orderBy, $vars, $lang->project->code); ?></th>
			<th class='w-200px'><?php common::printOrderLink('name', $orderBy, $vars, $lang->project->name); ?></th>
			<th><?php echo $lang->project->type; ?></th>
			<th><?php common::printOrderLink('pm', $orderBy, $vars, $lang->project->pm); ?></th>
			<th><?php common::printOrderLink('begin', $orderBy, $vars, $lang->project->begin); ?></th>
			<th><?php common::printOrderLink('end', $orderBy, $vars, $lang->project->espected_completion); ?></th>
			<th><?php echo $lang->project->actual_completion; ?></th>
			<th><?php echo $lang->project->status; ?></th>
			<th class='w-150px'>项目维护</th>
		</tr>
		</thead>
		<?php foreach ($projects as $project) { ?>
			<tr class='text-center'>
				<td>
					<?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), sprintf('%03d', $project->id)); ?>
				</td>
				<td class='text-left'><?php echo $project->code; ?></td>
				<td class='text-left'><?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), $project->name); ?></td>
				<td><?php echo $lang->project->typeList[$project->type]; ?></td>
				<td><?php echo $users[$project->pm]; ?></td>
				<td><?php echo Helper::validate($project->begin, 'date'); ?></td>
				<td><?php echo Helper::validate($project->espected_completion, 'date'); ?></td>
				<td><?php echo Helper::validate($project->actual_completion, 'date'); ?></td>
				<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
				<td>
					<?php echo html::a($this->createLink('project', 'edit', "projectID={$project->id}"), '编辑'); ?>&nbsp;|
					<?php common::printLink('project', 'delete',  "projectID=$projectID&confirm=no", $lang->delete, 'hiddenwin');?>
				</td>
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
