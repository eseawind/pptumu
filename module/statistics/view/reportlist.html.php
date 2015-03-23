<?php include '../../common/view/header.html.php'; ?>

<div class='main'>
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
</div>

<?php include '../../common/view/footer.html.php'; ?>
