<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>

<div class='container mw-1400px'>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-180px'><?php echo '申请编号'; ?></th>
			<td class='w-p25-f'><?php echo $application->code;?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-180px'><?php echo '申请日期'; ?></th>
			<td class='w-p25-f'><?php echo $application->created;?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-180px'><?php echo '所属项目'; ?></th>
			<td class='w-p25-f'><?php echo $application->project_name;?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo '材料名称 / 申请数量 / 单价'; ?></th>
			<td><?php foreach ($application->details As $detail) { ?>
				<div class="input-group">
					<span class="input-group-addon w-150px">
						<?php echo $detail->material_type_name . ' / ' . $detail->material_name; ?>
					</span>
					<?php echo html::input('price', '', "class='form-control'"); ?>
					<span class="input-group-addon fix-border w-80px"><?php echo "元/{$detail->material_unit}"; ?></span>
				</div>
			<?php } ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo '备注'; ?></th>
			<td colspan="2"><?php echo html::textarea('remark', '', "class='form-control' rows='6'");?></td>
		</tr>
		<tr>
			<td></td>
			<td cols="2" class='text-center'>
				<?php echo html::hidden('project_id', $projectID); ?>
				<?php echo html::hidden('application_id', $applicationID); ?>
				<?php echo html::hidden('applicationdetail_id', $applicationdetailID); ?>
				<?php echo html::hidden('material_id', $appdetail->material_id); ?>
				<?php echo html::submitButton() . html::backButton(); ?>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
