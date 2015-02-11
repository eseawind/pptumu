<?php include '../../common/view/header.lite.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix' title='EXTENSION'><?php echo html::icon($lang->icons['extension']);?></span>
    <strong><?php echo $title;?></strong>
  </div>
</div>
<?php if(isset($error) and $error):?>
<div class='alert alert-success with-icon'>
  <i class='icon-ok-sign'></i>
  <div class='content'>
    <h3><?php echo $lang->extension->needSorce;?></h3>
    <p><?php echo $error;?></p>
  </div>
</div>
<?php endif;?>
</body>
</html>
</body>
</html>
