<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<div id='titlebar'>
		<div id="crumbs">
			<?php commonModel::printBreadMenu($this->moduleName, isset($position) ? $position : ''); ?>
		</div>
	</div>

	<h4><?php echo $problem->date; ?>问题</h4>
	<table class='table table-form'>
		<tbody>
		<tr>
			<td colspan="2"><?php echo $problem->problem_content; ?></td>
		</tr>
		<tr>
			<td colspan='2' class='text-center'>
				<?php echo html::backButton(); ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
