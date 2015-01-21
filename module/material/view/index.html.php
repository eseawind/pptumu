<?php include '../../common/view/header.html.php';?>

<div id='featurebar'>
  <div class='actions'>
    <?php echo html::a($this->createLink('material', 'create'), "<i class='icon-plus'></i> " . $lang->material->create,'', "class='btn'") ?>
  </div>
  <ul class='nav'>
   
  </ul>
</div>

<ul>
<?php foreach ($materialTypes As $id => $name) { ?>
	<li><?php echo $name; ?></li>
<?php } ?>
</ul>
<table class='table table-fixed tablesorter'>
  <thead>
    <tr>
      <th class='w-id'><?php common::printOrderLink('id', '', '', $lang->idAB);?></th>
      <th><?php common::printOrderLink('code', '', '', $lang->material->code);?></th>
	  <th class='w-200px'><?php common::printOrderLink('name', '', '', $lang->material->name);?></th>
      <th><?php common::printOrderLink('unit', '', '', $lang->material->unit);?></th>
      <th class='w-140px {sorter:false}'><?php echo $lang->actions;?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($materials As $i => $material) { ?>
    <tr>
	  <td><?php echo $material->id; ?></td>
	  <td><?php echo $material->code; ?></td>
	  <td><?php echo $material->name; ?></td>
	  <td><?php echo $material->unit; ?></td>
	  <td>编辑|删除</td>
	</tr>
  <?php } ?>
  </tbody>
</table>

<?php include '../../common/view/footer.html.php';?>
