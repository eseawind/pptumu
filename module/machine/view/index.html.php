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
            <li><?php echo html::a($this->createLink('machine', 'index', sprintf($typeParams, $mtid)), $mtname);?></li>
        <?php } ?>
        </ul>
    </div>
</div>

<div class='main'>
    <table class='table table-condensed table-hover table-striped tablesorter table-fixed'>
    <thead>
        <tr>
            <th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
            <th class='w-80px'><?php common::printOrderLink('code', $orderBy, '', $lang->machine->code);?></th>
            <th class='w-100px'><?php common::printOrderLink('name', $orderBy, '', $lang->machine->name);?></th>
            <th class='w-100px'><?php echo $lang->machine->type; ?></th>
            <th>是否分配</th>
            <th>所在项目</th>
            <th>项目编号</th>
            <th>分配日期</th>
            <th class='w-150px'><?php echo $lang->actions; ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($machines as $machine) { ?>
        <tr>
            <td class='text-center'><?php echo html::a($this->createLink('material', 'edit', 'id=' . $machine->id), sprintf('%03d', $machine->id));?> </td>
            <td class='text-center'><?php echo $machine->code;?></td>
            <td class='text-center'><?php echo html::a($this->createLink('machine', 'edit', sprintf($editParams, $machine->id)), $machine->name);?></td>
            <td class='text-center'><?php echo $machine->type_name;?></td>
            <td><?php echo (!empty($machine->distribution)) ? '已分配' : '未分配'; ?></td>
            <td><?php echo (!empty($machine->distribution)) ? $machine->distribution->project_name : ''; ?></td>
            <td><?php echo (!empty($machine->distribution)) ? $machine->distribution->project_code : ''; ?></td>
            <td><?php echo (!empty($machine->distribution)) ? $machine->distribution->begin . '<br />' . $machine->distribution->end : ''; ?></td>
            <td class='text-center'>
                <?php echo html::a($this->createLink('machine', 'edit', sprintf($editParams, $machine->id)), $lang->edit); ?>
                |&nbsp;
                <?php echo html::a($this->createLink('machine', 'distribute', "machineID={$machine->id}"), '分配'); ?>
                |&nbsp;
                <?php echo html::a($this->createLink('machine', 'delete', sprintf($editParams, $machine->id)), $lang->delete); ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan='9'><div class='text-right'><?php $pager->show();?></div></td>
        </tr>
    </tfoot>
    </table>
</div>

<script>$("#<?php echo $status; ?>Tab").addClass('active');</script>

<?php include '../../common/view/footer.html.php';?>
