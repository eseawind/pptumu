<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/sparkline.html.php';?>
<div id='featurebar'>
    <div class='actions'>
        <?php echo html::a($this->createLink('machine', 'create', $createParams), "<i class='icon-plus'></i> " . $lang->machine->create,'', "class='btn'") ?>
    </div>
</div>

<div class='side' id='taskTree'>
    <a class='side-handle' data-id='projectTree'><i class='icon-caret-left'></i></a>
    <div class='side-body'>
        <ul class="panel panel-sm">
        <?php foreach ($machineTypes As $mtid => $mtname) { ?>
            <li><?php echo html::a($this->createLink('machine', 'index', 'mtype=' . $mtid), $mtname);?></li>
        <?php } ?>
        </ul>
    </div>
</div>

<div class='main'>
    <table class='table table-fixed tablesorter'>
        <thead>
        <tr>
            <th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
            <th><?php common::printOrderLink('code', $orderBy, '', $lang->machine->code);?></th>
            <th class='w-200px'><?php common::printOrderLink('name', $orderBy, '', $lang->machine->name);?></th>
            <th><?php echo $lang->machine->type; ?></th>
            <th class='w-100px'><?php echo $lang->actions; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($machines as $machine) { ?>
            <tr class='text-center'>
                <td><?php echo html::a($this->createLink('material', 'edit', 'id=' . $machine->id), sprintf('%03d', $machine->id));?> </td>
                <td class='text-left'><?php echo $machine->code;?></td>
                <td class='text-left'><?php echo html::a($this->createLink('machine', 'edit', 'id=' . $machine->id), $machine->name);?></td>
                <td class='text-left'><?php echo $machine->type_name;?></td>
                <td class='projectline text-left'>编辑|删除</td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan='11'>
                <div class='table-actions clearfix'>

                </div>
                <div class='text-right'><?php $pager->show();?></div>
            </td>
        </tr>
        </tfoot>
    </table>
</div>

<script>$("#<?php echo $status;?>Tab").addClass('active');</script>

<?php include '../../common/view/footer.html.php';?>
