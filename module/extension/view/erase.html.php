<?php include '../../common/view/header.lite.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix' title='EXTENSION'><?php echo html::icon($lang->icons['extension']);?></span>
    <strong><?php echo $title;?></strong>
    <small class='text-danger'><?php echo $lang->extension->erase;?> <?php echo html::icon('trash');?></small>
  </div>
</div>
<div class='alert alert-success with-icon'>
  <i class='icon-ok-sign'></i>
  <div class='content'>
    <h3><?php echo $title;?></h3>
    <?php if($removeCommands):?>
    <p><strong><?php echo $lang->extension->unremovedFiles;?></strong></p>
    <p><?php echo join($removeCommands, '<br />');?></p>
    <?php endif;?>
    <p class='text-center'><?php echo html::commonButton($lang->extension->viewAvailable, 'onclick=parent.location.href="' . inlink('browse', 'type=available') . '"');?></p>
  </div>
</div>
</body>
</html>
