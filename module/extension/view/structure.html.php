<?php include '../../common/view/header.lite.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix' title='EXTENSION'><?php echo html::icon($lang->icons['extension']);?></span>
    <strong><?php echo $extension->name . '[' . $extension->code . '] ' .$lang->extension->structure . ':';?></strong>
  </div>
</div>
<div class='main with-padding'>
  <pre><?php
  $appRoot = $this->app->getAppRoot();
  $files   = json_decode($extension->files);
  foreach($files as $file => $md5) echo $appRoot . $file . "\n";
  ?></pre>  
</div>
<?php include '../../common/view/footer.lite.html.php';?>
