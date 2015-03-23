<?php include '../../common/view/header.html.php';?>

<div class='main'>
<?php if ($problems) { ?>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>统计周期:</th>
			<td><?php echo $problems[0]->date, ' 至 ', $problems[count($problems) - 1]->date; ?></td>
		</tr>
		<tr>
			<th class='w-100px'>项目状态:</th>
			<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
		</tr>
		</tbody>
	</table>

	<table class='table table-form'>
		<tbody>
		<?php foreach ($problems As $problem) { ?>
		<tr>
			<td>
				<h5><?php echo $problem->date; ?>提交</h5>
				<p>计划工作量: <?php echo $problem->content; ?></p>
				<?php if (!empty($problem->files)) { ?>
				<?php echo $this->fetch('file', 'printFiles', array('files' => $problem->files, 'fieldset' => 'true'));?>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	暂无记录
<?php } ?>
	<table class="table">
		<tbody>
		<tr>
			<td class='text-center'>
				<?php echo html::a($this->createLink('statistics', 'tomorrowreportlist', "projectID={$project->id}"), '查看明日计划记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projectplans', "projectID={$project->id}"), '查看计划记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projecttestations', "projectID={$project->id}"), '查看签证记录', '', 'class="btn"');?>
				<?php echo html::a($this->createLink('statistics', 'projectproblems', "projectID={$project->id}"), '查看问题记录', '', 'class="btn"');?>

				<?php echo html::backButton(); ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>