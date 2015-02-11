<?php include '../../common/view/header.lite.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix' title='EXTENSION'><?php echo html::icon($lang->icons['extension']);?></span>
  </div>
</div>
<div class='with-padding'>
    <h3 class='mgb-20 text-center'><?php echo $title;?></h3>
    <?php if($removeCommands):?>
    <div class='container mw-500px'>
      <p><strong><?php echo $lang->extension->unremovedFiles;?></strong></p>
      <code><?php echo join($removeCommands, '<br />');?></code>
    </div>
    <?php endif;?>
    <hr>
    <p><?php echo html::commonButton($lang->extension->viewDeactivated, 'onclick=parent.location.href="' . inlink('browse', 'type=deactivated') . '"');?></p>
</div>
</body>
</html>
