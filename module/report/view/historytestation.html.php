<?php include '../../common/view/header.html.php'; ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['report-file']); ?></span>
		<strong><?php echo $title; ?></strong>
	</div>
</div>

<div class='main'>
<?php if ($testations) { ?>
	<ul>
		<?php foreach ($testations As $id => $testation) { ?>
		<li>
			<?php echo $testation->date; ?> 签证:

			<?php echo html::a($this->createLink('report', 'showtestation', "testationID={$testation->testation_id}"), '点击查看', '', 'class="btn"'); ?>
			<?php if (empty($testation->application_id)) {
				echo html::a("javascript: orderModificationApplication(\"application_{$testation->testation_id}\");", '申请修改', '', "objecttype='testation' action='edit' objecttypename='签证' objectid='{$testation->testation_id}' objectname='{$testation->date}签证' id='application_{$testation->testation_id}' class='btn'");
			} ?>
			<?php if ($testation->application_id && $testation->application_verified) {
				echo html::a($this->createLink('report', 'edittestation', "testationID={$testation->testation_id}"), '修改', '', 'class="btn"');
			} ?>
		</li>
		<?php } ?>
	</ul>

	<p><div class='text-right'><?php $pager->show(); ?></div></p>
<?php } else { ?>
	暂时没有报告
<?Php } ?>
</div>

<?php include '../../common/view/application.html.php'; // 申请修改 ?>
<?php include '../../common/view/footer.html.php'; ?>
