<?php include '../../common/view/header.html.php';?>

<div class='main'>
<?php if ($testations) { ?>
	<table class='table table-form'>
		<tbody>
		<tr>
			<th class='w-100px'>统计周期:</th>
			<td><?php echo $testations[0]->date, ' 至 ', $testations[count($testations) - 1]->date; ?></td>
		</tr>
		<tr>
			<th class='w-100px'>项目状态:</th>
			<td class='status-<?php echo $project->status ?>'><?php echo $lang->project->statusList[$project->status]; ?></td>
		</tr>
		</tbody>
	</table>

	<table class='table table-form'>
		<tbody>
		<?php foreach ($testations As $testation) { ?>
		<tr>
			<td>
				<h5><?php echo $testation->date; ?>提交</h5>
				<h6><?php echo $testation->title; ?></h6>
				<p><?php echo $testation->content; ?></p>
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
			<td></td>
			<td colspan='2' class='text-center'>
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
