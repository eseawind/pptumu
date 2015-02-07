<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/datepicker.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>

<?php js::import($jsRoot . 'misc/date.js'); ?>
<?php js::set('holders', $lang->project->placeholder); ?>

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
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>存在问题:</th>
			<td colspan="2"><?php echo html::textarea('content', '', "rows='6' class='form-control'"); ?></td>
		</tr>
		<tr>
			<th>日期:</th>
			<td class='w-p25-f'>
				<div class="input-group date form-date" data-link-format="yyyy-mm-dd" data-link-field="report_date" data-date-format="dd MM yyyy" data-date="">
					<?php echo html::input('report_date', $problem->report_date, "readonly='readonly' class='form-control' placeholder='报告日期'"); ?>
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
			<td colspan="2" class='text-center'>
				<?php echo html::hidden('project_id', $projectID); ?>
				<?php echo html::submitButton() . html::backButton(); ?>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
