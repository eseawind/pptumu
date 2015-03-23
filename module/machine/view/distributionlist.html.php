<?php include '../../common/view/header.html.php'; ?>

<div id='featurebar'>
	<div class='actions'>
		<?php echo html::a($this->createLink('machine', 'distribute', "machineID={$machine->id}"), "<i class='icon-plus'></i> 分配",'', "class='btn'") ?>
	</div>
</div>

<div class='main'>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled' id="machine_distribution_list">
		<thead>
		<tr>
			<th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
			<th class='w-80px'>机械名称</th>
			<th class='w-100px'>项目编号</th>
			<th>项目名称</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>状态</th>
			<th class='w-200px'><?php echo $lang->actions; ?></th>
		</tr>
		</thead>
		<?php if ($distributions) { ?>
		<tbody>
		<?php foreach($distributions as $distribution) {
			$dBegin = $distribution->begin;
			$dEnd = $distribution->end;

			$dStatus = machineModel::parseDistributionStatus($dBegin, $dEnd);
			?>
			<tr>
				<td class='text-center'><?php echo $distribution->id; ?></td>
				<td class='text-center'><?php echo $machine->name;?></td>
				<td><?php echo $distribution->project_code; ?></td>
				<td class='text-left'><?php echo $distribution->project_name; ?></td>
				<td class='text-center'><?php echo helper::validate($dBegin, 'date'); ?></td>
				<td class='text-center'><?php echo helper::validate($dEnd, 'date'); ?></td>
				<td class='text-center'><?php echo $lang->machine->distributionStatusList[$dStatus]; ?></td>
				<td class='text-center'>
					<?php if ($dStatus == 'wait') {
						echo html::a($this->createLink('machine', 'delete', sprintf($editParams, $machine->id)), $lang->delete);
					} ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan='8'><div class='text-right'><?php $pager->show(); ?></div></td>
		</tr>
		</tfoot>
		<?php } else { ?>
		<tfoot>
		<tr>
			<td colspan='8'>暂无记录</td>
		</tr>
		</tfoot>
		<?php } ?>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
