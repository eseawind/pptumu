<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
	<?php if ($reports) { ?>
	<ul>
		<?php foreach ($reports As $i => $report) { ?>
		<li>
			<?php echo $report->date; ?>
			<?php echo $report->report_type == 'today' ? '今日' : '明日'; ?>日报
			<?php echo html::a($this->createLink('report', 'show', "reportID={$report->report_id}") . '?onlybody=yes', '点击查看', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?>
		</li>
		<?php } ?>
	</ul>
	<p><div class='text-right'><?php $pager->show(); ?></div></p>
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
