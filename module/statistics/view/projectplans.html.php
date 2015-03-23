<?php include '../../common/view/header.html.php';?>

<div class='main'>
<?php if ($reports) { ?>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>统计周期:</th>
			<td><?php echo $reports[0]->date, ' 至 ', $reports[count($reports) - 1]->date; ?></td>
		</tr>
		<tr>
			<th class='w-100px'>项目状态:</th>
			<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
		</tr>
		</tbody>
	</table>

	<table class='table table-form'>
		<tbody>
		<?php foreach ($reports As $report) { ?>
		<tr>
			<td>
				<h5><?php echo $report->date; ?>提交</h5>
				<p>计划工作量: <?php echo $report->planned_qty; ?></p>
				<p>计划工作量: <?php echo $report->actual_qty; ?></p>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	暂无记录
<?php } ?>
	<table class='table table-form'>
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