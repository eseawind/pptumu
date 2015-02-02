<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/sparkline.html.php';?>

<div class='main'><!-- hiddenwin -->
<form class='form-condensed' method='post' target='_self' id='dataform'>
<?php if ($step == 'project') { ?>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id', $projects, '', "class='form-control'");?></td><td></td>
		</tr>
		<tr>
			<td></td>
			<td cols="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton();?>
			</td>
		</tr>
	</table>
<?php } else if ($step == 'material') { ?>
	<table class='table table-form'>
	<thead>
		<tr>
			<td colspan="2">选择材料</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($materials As $mtid => $mt) { ?>
		<tr>
			<th class='w-90px'><?php echo $mt['name'];?></th>
			<td><?php echo html::checkbox('material[]', $mt['materials']); ?></td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td cols="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton();?>
			</td>
		</tr>
	</tfoot>
	</table>
<?php } else if ($step == 'qty') { ?>

<?php } ?>
</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
