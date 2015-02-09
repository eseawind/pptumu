<?php include '../../common/view/header.html.php';?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['report-file']);?></span>
		<strong><?php echo $title;?></strong>
	</div>
</div>

<div class='main'>
	<?php foreach ($projects As $project) { ?>
	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
	<tbody>
		<tr class="a-center">
			<td><?php echo $project->name; ?></td>
			<td>项目编号: <?php echo $project->code; ?></td>
			<td>项目进行中</td>
			<td><?php echo html::a(helper::createLink('project', 'view', "projectrID={$project->id}") . '?onlybody=yes', '了解项目情况', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?></td>
		</tr>
		<tr>
			<td colspan="4">
				本日情况:
				<?php echo html::a($this->createLink('report', 'create', "projectID={$project->id}&reportType=today"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'history', "projectID={$project->id}&reportType=today"), $lang->report->history, '', 'class="btn"');?>
				明日计划:
				<?php echo html::a($this->createLink('report', 'create', "projectID={$project->id}&reportType=tomorrow"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'history', "projectID={$project->id}&reportType=tomorrow"), $lang->report->history, '', 'class="btn"');?>
				<br />
				填写签证:
				<?php echo html::a($this->createLink('report', 'createtestation', "projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'historytestation', "projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
				存在问题:
				<?php echo html::a($this->createLink('report', 'createproblem', "projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'historyproblem', "projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
			</td>
		</tr>
	</tbody>
	</table>
	<?php } ?>

	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
		<tfoot>
		<tr>
			<td><div class='text-right'><?php $pager->show();?></div></td>
		</tr>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php';?>
