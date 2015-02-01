<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>

<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>

<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']);?></span>
			<strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->project->create;?></strong>
		</div>
		<div class='actions'>
			<button class='btn' id='cpmBtn'><?php echo html::icon($lang->icons['copy']) . ' ' . $lang->project->copy;?></button>
		</div>
	</div>

	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
		<h4>人工</h4>
		<table class='table table-form'>
		<tbody>
			<tr>
				<th class='w-90px'>公司员工:</th>
				<td class='w-p25-f'><?php echo html::input('staff_qty', $report->staff_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th class='w-90px'>外雇人员:</th>
				<td class='w-p25-f'><?php echo html::input('extternal_qty', $report->extternal_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th class='w-90px'>午饭人员:</th>
				<td class='w-p25-f'><?php echo html::input('lunch_qty', $report->lunch_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th class='w-90px'>晚饭人员:</th>
				<td class='w-p25-f'><?php echo html::input('supper_qty', $report->supper_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
		</tbody>
		</table>

		<h4>材料</h4>
		<table class='table table-form'>
		<tbody>
			<tr>
				<td></td>
			</tr>
		</tbody>
		</table>

		<h4>计划</h4>
		<table class='table table-form'>
		<tbody>
			<tr>
				<th class='w-90px'>计划工程量:</th>
				<td colspan="2"><?php echo html::textarea('planned_qty', $report->planned_qty, "class='form-control'");?></td>
			</tr>
			<tr>
				<th>实际工程量:</th>
				<td colspan="2"><?php echo html::textarea('actual_qty', $report->actual_qty, "rows='6' class='form-control'");?></td>
			</tr>
			<tr>
				<th>日期:</th>
				<td class='w-p25-f'><?php echo html::input('report_date', $report->report_date, "rows='6' class='form-control form-date' onchange='computeWorkDays()' placeholder='报告日期'");?></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td colspan='2' class='text-center'>
					<?php echo html::hidden('type', $reportType);  ?>
					<?php echo html::submitButton() . html::backButton(); ?>
				</td>
			</tr>
		</tbody>
		</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
