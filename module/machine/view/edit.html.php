<?php include '../../common/view/header.html.php';?>

<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['machine']);?></span>
      <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->machine->create;?></strong>
    </div>
    <div class='actions'></div>
  </div>
  <!-- <form class='form-condensed' method='post' target='hiddenwin' id='dataform'> -->
  <form class='form-condensed' method='post' id='dataform'>
    <table class='table table-form'>
	  <tr>
        <th class='w-90px'><?php echo $lang->machine->code;?></th>
        <td class='w-p25-f'><?php echo html::input('code', $machine->code, "class='form-control' readonly");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->machine->name;?></th>
        <td><?php echo html::input('name', $machine->name, "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $machine->is_rent ? $lang->machine->ownerRent : $lang->machine->owner;?></th>
        <td><?php echo html::input('owner', $machine->owner, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <th><?php echo $lang->machine->type;?></th>
        <td><?php echo html::select('type_id', $machineTypes, $machine->type_id, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <td></td>
		<td cols="2" class='text-center'>
          <?php echo html::hidden('is_rent', $machine->is_rent); ?>
		  <?php echo html::submitButton() . html::backButton();?>
		</td>
      </tr>
	</table>
  </form>
</div>

<?php include '../../common/view/footer.html.php';?>
