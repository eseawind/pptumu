<?php include '../../common/view/header.lite.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon('upload');?></span>
    <strong><?php echo $lang->extension->upload;?></strong>
  </div>
</div>
<form method='post' enctype='multipart/form-data' style='padding: 5% 20%'>
  <div class='input-group'>
    <input type='file' name='file' class='form-control' />
    <span class='input-group-btn'><?php echo html::submitButton($lang->extension->install);?></span>
  </div>
</form>
</body>
</html>
