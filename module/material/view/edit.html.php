<?php include '../../common/view/header.html.php';?>

<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['project']);?></span>
      <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->material->create;?></strong>
    </div>
    <div class='actions'></div>
  </div>
  <!-- <form class='form-condensed' method='post' target='hiddenwin' id='dataform'> -->
  <form class='form-condensed' method='post' id='dataform'>
    <table class='table table-form'>
	  <tr>
        <th class='w-90px'><?php echo $lang->material->code;?></th>
        <td class='w-p25-f'><?php echo html::input('code', $material->code, "class='form-control' readonly");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->material->name;?></th>
        <td><?php echo html::input('name', $material->name, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <th><?php echo $lang->material->type;?></th>
        <td><?php echo html::select('type_id', $materialTypes, $material->type_id, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <th><?php echo $lang->material->unit;?></th>
        <td><?php echo html::select('unit', $units, $material->unit, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <td></td>
		<td cols="2" class='text-center'>
			<?php echo html::submitButton() . html::backButton();?>
		</td>
      </tr>
	</table>
  </form>
</div>

<?php include '../../common/view/footer.html.php';?>
