<?php include '../../extension/view/header.html.php'; ?>

<table class='w-p100'>
  <tr>
    <td class='w-200px'>
      <div class='panel panel-sm with-list'>
        <div class='panel-heading'><i class='icon-list'></i> <strong><?php echo $lang->editor->moduleList ?></strong>
        </div>
        <?php echo $moduleList ?>
      </div>
    </td>
    <td class='w-300px'>
      <iframe frameborder='0' name='extendWin' id='extendWin' width='100%'></iframe>
    </td>
    <td>
      <iframe frameborder='0' name='editWin' id='editWin' width='100%'></iframe>
    </td>
  </tr>
</table>

<?php include '../../common/view/footer.html.php'; ?>
