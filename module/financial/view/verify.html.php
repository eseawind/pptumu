<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>

<div class='container mw-1400px'>
	<form id="application_vefried_form" target='hiddenwin' class='form-condensed' method='post'>
	<table class='table table-form'>
		<tr>
			<th class='w-180px'><?php echo '申请编号'; ?></th>
			<td><?php echo $application->code;?></td>
		</tr>
		<tr>
			<th class='w-180px'><?php echo '申请日期'; ?></th>
			<td><?php echo $application->created;?></td>
		</tr>
		<tr>
			<th class='w-180px'><?php echo '所属项目'; ?></th>
			<td><?php echo $application->project_name;?></td>
		</tr>
		<tr>
			<th><?php echo '材料到达时间'; ?></th>
			<td><?php echo helper::validate($application->expect_arrival_date, 'date');?></td>
		</tr>
		<tr>
			<th><?php echo '备注'; ?></th>
			<td><?php echo $application->remark; ?></td>
		</tr>
		<tr>
			<th><?php echo '材料名称 / 申请数量 / 单价'; ?></th>
			<td><?php foreach ($application->details As $detail) { ?>
				<div class="input-group">
					<span class="input-group-addon w-400px">
						<?php echo $detail->material_type_name . ' / ' . $detail->material_name . ' / ' . $detail->qty . ' / ' . $detail->material_unit; ?>
					</span>
					<?php echo html::hidden('detail[id][]', $detail->id); ?>

					<span class="input-group-addon">竞标价</span>
					<?php echo html::input('detail[bid_price][]', ($detail->bid_price > 0 ? $detail->bid_price : ''), 'class="form-control" placeholder="竞标价"'); ?>

					<span class="input-group-addon">采购价</span>
					<?php echo html::input('detail[price][]', ($detail->price > 0 ? $detail->price : ''), 'class="form-control" placeholder="采购价"'); ?>

					<span class="input-group-addon fix-border w-80px"><?php echo "元/{$detail->material_unit}"; ?></span>
				</div>
			<?php } ?></td>
		</tr>
		<tr>
			<th><?php echo '审核说明'; ?></th>
			<td><?php echo html::textarea('verified_remark', $application->remark, "class='form-control' rows='6'");?></td>
		</tr>
		<tr>
			<td></td>
			<td class='text-center'>
				<?php
				echo html::hidden('verified', $application->verified);

				if ($application->verified <= 0) {
					echo html::commonButton('通过审批', 'name="btn_verified" id="btn_verified""', 'btn-success');
				}
				if ($application->verified >= 0) {
					echo html::commonButton('不通过审批', 'name="btn_unverified" id="btn_unverified"', 'btn-warning');
				}
				if ($application->verified <= 0 || $application->verified == 1) {
					echo html::commonButton('采购到位，发放到工程', 'name="btn_parchased_distributed" id="btn_parchased_distributed"', 'btn-success');
				}
				echo html::backButton();
				?>
			</td>
		</tr>
	</table>
	</form>
</div>

<script language="javascript">
$(function () {
<?php //if ($application->verified <= 0) { ?>
	$('#btn_verified').bind('click', function () {
		$('#verified').val('1');

		$('#application_vefried_form').submit();
	});

	$('#btn_parchased_distributed').bind('click', function () {
		$('#verified').val('2');

		$('#application_vefried_form').submit();
	});
<?php //} ?>
<?php //if ($application->verified >= 0) { ?>
	$('#btn_unverified').bind('click', function () {
		$('#verified').val('-1');

		$('#application_vefried_form').submit();
	});
<?php //} ?>
});
</script>

<?php include '../../common/view/footer.html.php'; ?>
