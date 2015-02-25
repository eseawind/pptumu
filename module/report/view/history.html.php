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
		<?php if (empty($report->application_id)) {
			echo html::a("javascript: orderModificationApplication(\"application_{$report->id}\");", '申请修改', '', "objecttype='report' action='edit' objecttypename='日报表' objectid='{$report->id}' objectname='{$report->report_date}日报' id='application_{$report->id}' class='btn'");
		} ?>
		<?php if ($report->application_id && $report->application_verified) {
			echo html::a($this->createLink('report', 'edit', "reportID={$report->id}"), '修改', '', 'class="btn"');
		} ?>
	</li>
	<?php } ?>
</ul>

<p><div class='text-right'><?php $pager->show(); ?></div></p>
</div>

<?php include '../../common/view/application.html.php'; // 申请修改 ?>
<?php include '../../common/view/footer.html.php'; ?>
