<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>

<?php js::import($jsRoot . 'misc/date.js');?>

<?php if ($step == 1) { ?>
<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
			<strong>
				<small class='text-muted'><i class='icon icon-plus'></i></small>
				<?php echo $project->name, ' &gt; 工程上报 &gt 选择日期'; ?>
			</strong>
		</div>
	</div>

	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>选择日期:</th>
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
<?php } else if($step == 2) { ?>
<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
			<strong>
				<small class='text-muted'><i class='icon icon-plus'></i></small>
				<?php echo $project->name, ' &gt; 工程上报 &gt ', $daily->date, ($reportType == 'today' ? '当日日报' : '明日计划'); ?>
			</strong>
		</div>
	</div>

	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
		<h4>人工</h4>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>公司员工:</th>
				<td class='w-p25-f'><?php echo html::input('staff_qty', $report->staff_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>外雇人员:</th>
				<td><?php echo html::input('extternal_qty', $report->extternal_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>午饭人员:</th>
				<td><?php echo html::input('lunch_qty', $report->lunch_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
			<tr>
				<th>晚饭人员:</th>
				<td><?php echo html::input('supper_qty', $report->supper_qty, 'class="form-control"');?></td>
				<td>人</td>
			</tr>
		</tbody>
		</table>

		<h4>材料</h4>
		<table class='table table-form'>
			<thead>
			<tr>
				<?php if ($reportType == 'today') { ?><th>进场数量</th><?php } ?>
				<th colspan="<?php echo ($reportType == 'tomorrow') ? 2 : 1; ?>"><?php echo $reportType == 'today' ? '实际用量' : '计划用量'; ?></th>
				<?php if ($reportType == 'today') { ?><th>剩余用量</th><?php } ?>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php if ($reportType == 'today') { ?>
				<td><?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $app->material_type_name . ' / ' . $app->material_name; ?>: </span>
						<?php echo html::input('material[existing_qty][]', $app->qty, "materialid=\"{$app->material_id}\" class=\"form-control\" readonly=\"readonly\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<?php } ?>
				<td colspan="<?php echo ($reportType == 'tomorrow') ? 2 : 1; ?>">
				<?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $app->material_type_name . ' / ' . $app->material_name; ?>: </span>
						<?php echo html::hidden('material[ids][]', $app->material_id); ?>
						<?php echo html::input('material[used_qty][]', '', "materialid=\"{$app->material_id}\" class=\"form-control\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?>
				</td>
				<?php if ($reportType == 'today') { ?>
				<td><?php foreach ($materialApps As $app) { ?>
					<div class="input-group">
						<span class="input-group-addon w-200px"><?php echo $app->material_type_name . ' / ' . $app->material_name; ?>: </span>
						<?php echo html::input('material[remaining_qty][]', '0', "materialid=\"{$app->material_id}\" class=\"form-control\" readonly=\"readonly\""); ?>
						<span class="input-group-addon fix-border w-50px"><?php echo $app->material_unit; ?></span>
					</div>
				<?php } ?></td>
				<?php } ?>
			</tr>
			<?php if ($reportType == 'tomorrow') { ?>
			<tr>
				<th class='w-90px'>备注:</th>
				<td><?php echo html::textarea('material_remark', $report->report_material_remark, "class='form-control'");?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>

		<h4>机械</h4>
		<?php if ($reportType == 'today') { ?>
		<table class='table table-form'>
		<thead>
			<tr>
				<th class="w-p50">公司机械</th>
				<th class="w-p50">外雇机械</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="w-p50"><?php foreach ($machineDists->self As $dist) { ?>
					<div class="input-group">
						<span class="input-group-addon w-160px"><?php echo $dist->type_name , ' / ', $dist->machine_name, " / ", "{$dist->machine_code}"; ?></span>
						<span class="input-group-addon w-300px">
							<?php echo $dist->begin, " &gt; ", $dist->end; ?>
						</span>
						<?php echo html::hidden('machine[ids][]', $dist->machine_id);
						echo html::input('machine[used_hours][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
				<td class="w-p50"><?php foreach ($machineDists->rent As $dist) { ?>
					<?php // machineModel::parseMachineDistributeExpire($dist->begin, $dist->end, $daily->date); ?>
					<div class="input-group">
						<span class="input-group-addon w-160px"><?php echo $dist->type_name , ' / ', $dist->machine_name, " / ", "{$dist->machine_code}"; ?></span>
						<span class="input-group-addon w-300px">
							<?php echo $dist->begin, " &gt; ", $dist->end; ?>
						</span>
						<?php  echo html::hidden('machine[ids][]', $dist->machine_id);
						echo html::input('machine[used_hours][]', '', 'class="form-control"'); ?>
						<span class="input-group-addon w-50px">时</span>
					</div>
				<?php } ?></td>
			</tr>
		</tbody>
		</table>
		<?php } else { ?>
		<table class='table table-form'>
			<tbody>
			<tr>
				<th class='w-90px'>备注:</th>
				<td colspan="2"><?php echo html::textarea('machine_remark', $report->machine_remark, "class='form-control'");?></td>
			</tr>
			</tbody>
		</table>
		<?php } ?>

		<h4>计划</h4>
		<table class='table table-form'>
		<tbody>
			<tr>
				<th class='w-90px'>计划工程量:</th>
				<td colspan="2"><?php echo html::textarea('planned_qty', $report->planned_qty, "class='form-control'");?></td>
			</tr>
			<?php if ($reportType == 'today') { ?>
			<tr>
				<th>实际工程量:</th>
				<td colspan="2"><?php echo html::textarea('actual_qty', $report->actual_qty, "rows='6' class='form-control'");?></td>
			</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td colspan='2' class='text-center'>
					<?php echo html::hidden('daily_id', $dailyID); ?>
					<?php echo html::hidden('report_date', $daily->date); ?>
					<?php echo html::hidden('type', $reportType);  ?>
					<?php echo html::hidden('project_id', $projectID); ?>

					<?php echo html::submitButton() . html::backButton(); ?>
				</td>
			</tr>
		</tbody>
		</table>
	</form>
</div>
<?php if ($reportType == 'today') { ?>
<script language="javascript">
$(function() {
	$('input[name="material[used_qty][]"]').bind('change', function () {
		var material_id = $(this).attr('materialid');

		var existing_qty = $('input[name="material[existing_qty][]"][materialid="' + material_id + '"]').val();
		var remaining_qty = existing_qty - $(this).val();
		if (remaining_qty >= 0) {
			$('input[name="material[remaining_qty][]"][materialid="' + material_id + '"]').val(remaining_qty);
		} else {
			alert('实际用量不能大于进场数量');
			$(this).val(existing_qty);
		}

		return true;
	});
});
</script>
<?php } ?>
<?php } ?>

<?php include '../../common/view/footer.html.php'; ?>
