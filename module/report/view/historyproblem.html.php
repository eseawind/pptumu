<?php include '../../common/view/header.html.php'; ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['report-file']); ?></span>
		<strong><?php echo $title; ?></strong>
	</div>
</div>

<div class='main'>
	<ul>
		<?php foreach ($problems As $id => $problem) { ?>
		<li>
			<?php echo $problem->date; ?> 问题:

			<?php echo html::a($this->createLink('report', 'showproblem', "problemID={$problem->problem_id}"), '点击查看', '', 'class="btn"'); ?>
			<?php if (empty($problem->application_id)) {
				echo html::a("javascript: orderModificationApplication(\"application_{$testation->testation_id}\");", '申请修改', '', "objecttype='problem' action='edit' objecttypename='问题' objectid='{$problem->testationid}' objectname='{$problem->date}签证' id='application_{$problem->id}' class='btn'");
			} ?>
			<?php if ($problem->application_id && $problem->application_verified) {
				echo html::a($this->createLink('report', 'editproblem', "problemID={$problem->problem_id}"), '修改', '', 'class="btn"');
			} ?>
		</li>
		<?php } ?>
	</ul>

	<p><div class='text-right'><?php $pager->show(); ?></div></p>
</div>

<?php include '../../common/view/application.html.php'; // 申请修改 ?>
<?php include '../../common/view/footer.html.php'; ?>
