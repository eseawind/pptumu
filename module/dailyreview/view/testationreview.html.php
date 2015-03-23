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
		</tbody>
	</table>

	<p class='text-center'>
		<?php
		$objectName = $testation->date . '签证';
		if ($testation->testation_verified <= 0) {
			echo html::commonButton('通过审核', "verified=\"1\" objecttype=\"testation\" objectname=\"{$objectName}\" objectid=\"{$testation->testation_id}\" name=\"btn_pased\" id=\"btn_pased\"", 'btn-success btn_act_verify');
		}
		if ($testation->testation_verified >= 0) {
			echo html::commonButton('不通过审核', "verified=\"-1\" objecttype=\"testation\" objectname=\"{$objectName}\" objectid=\"{$testation->testation_id}\" name=\"btn_refused\" id=\"btn_refused\"", 'btn-warning btn_act_verify');
		}
		echo html::commonButton('打印', 'name="btn_parchased_distributed" id="btn_parchased_distributed"', 'btn-success');

		echo html::backButton();
		?>
	</p>
</div>

<?php include '../../common/view/footer.html.php'; ?>
