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
			<td>了解项目情况</td>
		</tr>
		<tr>
			<td colspan="4">
				本日情况:
				<?php echo html::a($this->createLink('report', 'create', "reportType=today&projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'history', "reportType=today&projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
				明日计划:
				<?php echo html::a($this->createLink('report', 'create', "reportType=tomorrow&projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'history', "reportType=tomorrow&projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
				<br />
				填写签证:
				<?php echo html::a($this->createLink('report', 'createTestatioin', "projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'historyTestation', "projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
				存在问题:
				<?php echo html::a($this->createLink('report', 'createProblem', "projectID={$project->id}"), $lang->report->create, '',  'class="btn"');?>
				<?php echo html::a($this->createLink('report', 'historyProblem', "projectID={$project->id}"), $lang->report->history, '', 'class="btn"');?>
			</td>
		</tr>
	</tbody>
	</table>
	<?php } ?>

	<div class='text-right'><?php $pager->show();?></div>
</div>

<?php include '../../common/view/footer.html.php';?>
