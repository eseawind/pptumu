<?php include '../../common/view/header.html.php';?>

<div class='container mw-1400px'>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id', $projects, '', "class='form-control'");?></td>
			<td></td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td><?php echo html::input('begin', '', "class='form-control form-date' onchange='computeWorkDays()' placeholder='开始时间'");?></td>
			<td></td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td><?php echo html::input('end', '', "class='form-control form-date' onchange='computeWorkDays()' placeholder='结束时间'");?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton();?>
			</td>
		</tr>
	</table>
</form>
</div>

<?php include '../../common/view/footer.html.php';?>
