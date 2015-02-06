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
	<!-- target='hiddenwin' -->
	<form class='form-condensed' method='post' id='dataform'>
		<h4>人工</h4>
		<table class='table table-form'>
		<tbody>
			<tr>
				<th class='w-90px'>公司员工:</th>
				<td class='w-p25-f'><?php echo html::input('staff_qty', $report->staff_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>外雇人员:</th>
				<td><?php echo html::input('extternal_qty', $report->extternal_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>午饭人员:</th>
				<td><?php echo html::input('lunch_qty', $report->lunch_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>晚饭人员:</th>
				<td><?php echo html::input('supper_qty', $report->supper_qty, "class='form-control'");?></td>
				<td>人</td>
			</tr>
		</tbody>
		</table>

		<h4>材料</h4>
		<table class='table table-form'>
		<thead>
			<tr>
				<th>进场数量</th>
				<th>实际用量</th>
				<th>剩余用量</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-100px"><?php echo $app->material_name; ?>: </span>
						<?php echo html::hidden('material[ids][]', $app->material_id);
						echo html::input('material[existing_qty][]', $app->qty, 'class="form-control"'); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<td><?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-100px"><?php echo $app->material_name; ?>: </span>
						<?php echo html::input('material[used_qty][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<td><?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-100px"><?php echo $app->material_name; ?>: </span>
						<?php echo html::input('material[remaining_qty][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?></td>
			</tr>
		</tbody>
		</table>

		<h4>机械</h4>
		<table class='table table-form'>
		<thead>
			<tr>
				<th>公司机械</th>
				<th>外雇机械</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php foreach ($machineDists As $dist) { ?>
					<div class="input-group">
						<span class="input-group-addon w-180px"><?php echo $dist->type_name . '/' . $dist->machine_name; ?>: </span>
						<?php echo html::hidden('machine[ids][]', $dist->machine_id);
						echo html::input('machine[used_hours][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
				<td><?php foreach ($machineDists As $dist) { ?>
					<div class="input-group">
						<span class="input-group-addon w-180px"><?php echo $dist->type_name . '/' . $dist->machine_name; ?>: </span>
						<?php  echo html::hidden('machine[ids][]', $dist->machine_id);
						echo html::input('machine[used_hours][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
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
				<td class='col-xs-2'>
					<div class="input-group date form-date" data-link-format="yyyy-mm-dd" data-link-field="report_date" data-date-format="dd MM yyyy" data-date="">
						<?php echo html::input('report_date', $report->report_date, "readonly='readonly' class='form-control' placeholder='报告日期'"); ?>
						<span class="input-group-addon">
							<span class="icon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="icon-calendar"></span>
						</span>
					</div>
				</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td colspan='2' class='text-center'>
					<?php echo html::hidden('type', $reportType);  ?>
					<?php echo html::hidden('project_id', $projectID); ?>
					<?php echo html::submitButton() . html::backButton(); ?>
				</td>
			</tr>
		</tbody>
		</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
