<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/sparkline.html.php';?>
<div id='featurebar'>
    <div class='actions'>
        <?php echo html::a($this->createLink('material', 'create'), "<i class='icon-plus'></i> " . $lang->material->create,'', "class='btn'") ?>
    </div>
</div>

<div class='side' id='taskTree'>
    <a class='side-handle' data-id='projectTree'><i class='icon-caret-left'></i></a>
    <div class='side-body'>
        <ul class="panel panel-sm">
        <?php foreach ($materialTypes As $mtid => $mtname) { ?>
            <li><?php echo html::a($this->createLink('material', 'index', 'mtype=' . $mtid), $mtname);?></li>
        <?php } ?>
        </ul>
    </div>
</div>
<div class='main'>
<form class='form-condensed' method='post' action='<?php echo inLink('batchEdit', "projectID=$projectID");?>'>
    <table class='table table-condensed table-hover table-striped tablesorter'>
    <thead>
        <tr>
            <th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
            <th><?php common::printOrderLink('code', $orderBy, '', $lang->material->code);?></th>
            <th><?php common::printOrderLink('name', $orderBy, '', $lang->material->name);?></th>
            <th><?php echo $lang->material->type; ?></th>
            <th><?php echo $lang->material->unit; ?></th>
            <th class='w-150px'><?php echo $lang->actions; ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($materials as $material) { ?>
        <tr class='text-center'>
            <td>
                <?php echo html::a($this->createLink('material', 'edit', 'id=' . $material->id), sprintf('%03d', $material->id));?>
            </td>
            <td class='text-center'><?php echo $material->code;?></td>
            <td class='text-center'><?php echo html::a($this->createLink('material', 'edit', 'id=' . $material->id), $material->name);?></td>
            <td class='text-center'><?php echo $material->type_name;?></td>
            <td class='text-center'><?php echo $material->unit;?></td>
            <td class='text-center'>
                <?php echo html::a($this->createLink('material', 'edit', 'id=' . $material->id), $lang->edit);?>
                |&nbsp;
                <?php echo html::a($this->createLink('material', 'delete', 'id=' . $material->id), $lang->delete);?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan='11'>
                <div class='text-right'><?php $pager->show();?></div>
            </td>
        </tr>
    </tfoot>
    </table>
</form>
</div>

<script>$("#<?php echo $status;?>Tab").addClass('active');</script>

<?php include '../../common/view/footer.html.php';?>
