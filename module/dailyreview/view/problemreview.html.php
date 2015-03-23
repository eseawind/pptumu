<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<div id='titlebar'>
		<div id="crumbs">
			<?php commonModel::printBreadMenu($this->moduleName, isset($position) ? $position : ''); ?>
		</div>
	</div>

	<h4><?php echo $problem->date; ?>问题</h4>

	<p><?php echo $problem->problem_content; ?></p>

	<?php if (!empty($problem->files)) { ?>
		<?php echo $this->fetch('file', 'printFiles', array('files' => $problem->files, 'fieldset' => 'true'));?>
	<?php } ?>

	<p class='text-center'>
		<?php
		$objectName = $problem->date . '问题';
		if ($problem->problem_verified <= 0) {
			echo html::commonButton('通过审核', "verified=\"1\" objecttype=\"problem\" objectname=\"{$objectName}\" objectid=\"{$problem->problem_id}\" name=\"btn_pased\" id=\"btn_pased\"", 'btn-success btn_act_verify');
		}
		if ($problem->problem_verified >= 0) {
			echo html::commonButton('不通过审核', "verified=\"-1\" objecttype=\"problem\" objectname=\"{$objectName}\" objectid=\"{$problem->problem_id}\" name=\"btn_refused\" id=\"btn_refused\"", 'btn-warning btn_act_verify');
		}
		echo html::commonButton('打印', 'name="btn_parchased_distributed" id="btn_parchased_distributed"', 'btn-success');

		echo html::backButton();
		?>
	</p>
</div>

<?php include '../../common/view/footer.html.php'; ?>