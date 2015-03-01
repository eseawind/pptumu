<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<div id='titlebar'>
		<div id="crumbs">
			<?php commonModel::printBreadMenu($this->moduleName, isset($position) ? $position : ''); ?>
		</div>
	</div>

	<h4><?php echo $testation->date; ?>签证</h4>
	<table class='table table-form'>
		<tbody>
		<tr>
			<td><h2><?php echo $testation->testation_title; ?></h2></td>
		</tr>
		<tr>
			<td><?php echo $testation->testation_content; ?></td>
		</tr>
		<tr>
			<td class='text-center'>
				<?php echo html::backButton(); ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
