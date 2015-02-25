<table class='table table-fixed table-condensed table-hover table-striped' align='center' id='application_List'>
	<thead>
	<tr class='colhead'>
		<th class='w-id'><?php echo $lang->idAB; ?></th>
		<th>申请操作</th>
		<th>申请时间</th>
		<th>申请人</th>
		<th>状态</th>
		<th>审核人</th>
		<th>审核时间</th>
		<th class='w-100px {sorter:false}'><?php echo $lang->actions; ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($applications as $id => $application) { ?>
		<tr class='text-center'>
			<td><?php echo $application->id; ?></td>
			<td><?php echo $lang->application->object[$application->object_type] . ' / ' . $lang->application->action[$application->action]; ?></td>
			<td><?php echo $application->created; ?></td>
			<td><?php echo $application->applicant_name ? $application->applicant_name : $application->applicant; ?></td>
			<td><?php echo $lang->application->status[$application->verified]; ?></td>
			<td><?php echo $application->verified_name ? $application->verified_name : $application->verified_by; ?></td>
			<td><?php echo $application->verified_date; ?></td>
			<td>
				<?php if (true || !$application->verified) {
					echo html::a("javascript: verifyApplication(\"passed_{$application->id}\");", '通过', '', "verified='1' id='passed_{$application->id}'");
					echo '&nbsp;|';
					echo html::a("javascript: verifyApplication(\"refused_{$application->id}\");", '拒绝', '', "verified='-1' id='refused_{$application->id}'");
				} ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
	<tr>
		<td colspan='8'>
			<div class='table-actions clearfix'></div>
			<div class='text-right'><?php $pager->show(); ?></div>
		</td>
	</tr>
	</tfoot>
</table>
<?php include '../../common/view/application.html.php'; // 申请/审核修改等操作 ?>