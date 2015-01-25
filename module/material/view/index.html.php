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
    <table class='table table-fixed tablesorter'>
        <thead>
        <tr>
            <th class='w-id'><?php common::printOrderLink('id', $orderBy, '', $lang->idAB);?></th>
            <th><?php common::printOrderLink('code', $orderBy, '', $lang->material->code);?></th>
            <th class='w-200px'><?php common::printOrderLink('name', $orderBy, '', $lang->material->name);?></th>
            <th><?php echo $lang->material->type; ?></th>
            <th><?php echo $lang->material->unit; ?></th>
            <th class='w-100px'><?php echo $lang->actions; ?></th>
        </tr>
        </thead>
        <?php $canBatchEdit = common::hasPriv('material', 'batchEdit'); ?>
        <?php foreach($materials as $material) { ?>
            <tr class='text-center'>
                <td>
                    <?php if($canBatchEdit):?>
                        <input type='checkbox' name='materialIDList[<?php echo $material->id;?>]' value='<?php echo $material->id;?>' />
                    <?php endif;?>
                    <?php echo html::a($this->createLink('material', 'edit', 'id=' . $material->id), sprintf('%03d', $material->id));?>
                </td>
                <td class='text-left'><?php echo $material->code;?></td>
                <td class='text-left'><?php echo html::a($this->createLink('material', 'edit', 'id=' . $material->id), $material->name);?></td>
                <td class='text-left'><?php echo $material->type_name;?></td>
                <td class='text-left'><?php echo $material->unit;?></td>
                <td class='projectline text-left'>编辑|删除</td>
            </tr>
        <?php } ?>
        <?php if($canBatchEdit) { ?>
        <tfoot>
        <tr>
            <td colspan='11'>
                <div class='table-actions clearfix'>
                    <?php echo "<div class='btn-group'>" . html::selectButton() . '</div>';?>
                    <?php echo html::submitButton($lang->project->batchEdit);?>
                </div>
                <div class='text-right'><?php $pager->show();?></div>
            </td>
        </tr>
        </tfoot>
        <?php } ?>
    </table>
</form>
</div>

<script>$("#<?php echo $status;?>Tab").addClass('active');</script>

<?php include '../../common/view/footer.html.php';?>
