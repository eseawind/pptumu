<?php include '../../common/view/header.html.php';?>

<div class='main'>
	<?php foreach ($projects As $project) { ?>
	<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
		<tbody>
		<tr class="a-center">
			<td><?php echo $project->name; ?></td>
			<td>项目编号: <?php echo $project->code; ?></td>
			<td>项目进行中</td>
		</tr>
		<tr>
			<td colspan="3">
				<ul>
					<?php foreach ($project->appdetails As $ad) { ?>
					<li>
						<?php echo $ad->material_type_name . ' / ' . $ad->material_name; ?>
						<?php echo html::a($this->createLink('parchase', 'create', "projectID={$project->id}&applicationID={$ad->id}&applicationdetailID={$ad->applicationdetail_id}"), '采购', '', 'class="btn"'); ?>
					</li>
					<?php } ?>
				</ul>
			</td>
		</tr>
		</tbody>
	</table>
	<?php } ?>

	<div class='text-right'><?php $pager->show(); ?></div>
</div>

<?php include '../../common/view/footer.html.php';?>
