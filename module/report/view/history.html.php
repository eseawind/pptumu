<?php include '../../common/view/header.html.php'; ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['report-file']); ?></span>
		<strong><?php echo $title; ?></strong>
	</div>
</div>

<div class='main'>
<ul>
	<?php foreach ($reports As $id => $report) { ?>
	<li>
		<?php echo $report->report_date; ?> 日报:
		<?php echo html::a($this->createLink('report', 'show', "reportID={$report->id}"), '点击查看', '', 'class="btn"'); ?>
		<?php echo html::a($this->createLink('report', 'verify', "reportID={$report->id}"), '审核', '', 'class="btn"'); ?>
		<?php echo html::a($this->createLink('report', 'modificationrequest', "reportID={$report->id}"), '申请修改', '', 'class="btn"'); ?>
	</li>
	<?php } ?>
</ul>

<p><div class='text-right'><?php $pager->show(); ?></div></p>
</div>

<?php include '../../common/view/footer.html.php'; ?>
