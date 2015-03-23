<?php include '../../common/view/header.html.php'; ?>

<div id='featurebar'>
	<div class='actions'></div>
</div>

<div class='side' id='taskTree'>
	<a class='side-handle' data-id='projectTree'><i class='icon-caret-left'></i></a>
	<div class='side-body'>
		<ul class="panel panel-sm">
		<?php foreach ($machineTypes As $mtid => $mtname) { ?>
			<li><?php echo html::a($this->createLink('statistics', 'machineindex', sprintf($typeParams, $mtid)), $mtname);?></li>
		<?php } ?>
		</ul>
	</div>
</div>

<div class='main'>
	<table class='table table-condensed table-hover table-striped tablesorter table-fixed active-disabled' id="machine_list">
		<thead>
		<tr>
			<th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
			<th class='w-80px'><?php common::printOrderLink('code', $orderBy, '', $lang->machine->code);?></th>
			<th><?php common::printOrderLink('name', $orderBy, '', $lang->machine->name);?></th>
			<th class='w-100px'><?php echo $lang->machine->type; ?></th>
			<th>自有/租赁</th>
			<th class='w-200px'><?php echo $lang->actions; ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($machines as $machine) { ?>
		<tr>
			<td class='text-center'><?php echo html::a($this->createLink('statistics', 'machinestatistics', "machineID={$machine->id}"), sprintf('%03d', $machine->id));?> </td>
			<td class='text-center'><?php echo $machine->code;?></td>
			<td><?php echo html::a($this->createLink('statistics', 'machinestatistics', "machineID={$machine->id}"), $machine->name);?></td>
			<td class='text-center'><?php echo $machine->type_name;?></td>
			<td class='text-center'><?php echo $machine->is_rent ? '租赁' : '自有'; ?></td>
			<td class='text-center'>
				<?php echo html::a($this->createLink('statistics', 'machinestatistics', "machineID={$machine->id}"), '查看'); ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan='6'><div class='text-right'><?php $pager->show(); ?></div></td>
		</tr>
		</tfoot>
	</table>
</div>

<?php include '../../common/view/footer.html.php'; ?>
