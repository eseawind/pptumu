<?php include '../../common/view/header.html.php'; ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['report-file']); ?></span>
		<strong><?php echo $title; ?></strong>
	</div>
</div>

<div class='main'>
<?php if ($reports) { ?>
	<ul>
		<?php foreach ($reports As $id => $report) { ?>
		<li>
			<?php echo $report->date; ?> 日报:

			<?php echo html::a($this->createLink('report', 'show', "reportID={$report->report_id}"), '点击查看', '', 'class="btn"'); ?>
			<?php if (empty($report->application_id)) {
				echo html::a("javascript: orderModificationApplication(\"application_{$report->report_id}\");", '申请修改', '', "objecttype='report' action='edit' objecttypename='日报表' objectid='{$report->report_id}' objectname='{$report->date}日报' id='application_{$report->report_id}' class='btn'");
			} ?>
			<?php if ($report->application_id && $report->application_verified) {
				echo html::a($this->createLink('report', 'edit', "reportID={$report->report_id}"), '修改', '', 'class="btn"');
			} ?>
		</li>
		<?php } ?>
	</ul>

	<p><div class='text-right'><?php $pager->show(); ?></div></p>
<?php } else { ?>
	暂时没有报告
<?php } ?>
</div>

<?php include '../../common/view/application.html.php'; // 申请修改 ?>
<?php include '../../common/view/footer.html.php'; ?>
