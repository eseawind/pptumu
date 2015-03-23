<?php include '../../common/view/header.html.php'; ?>

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

	<p class='text-center'><?php echo html::backButton(); ?></p>
</div>

<?php include '../../common/view/footer.html.php'; ?>
