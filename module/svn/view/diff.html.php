<?php include '../../common/view/header.lite.html.php';?>
<?php $catLink = inlink('cat', 'url=' . helper::safe64Encode($url) . "&revision=$revision");?>
<div class='box-title'><?php echo html::a($catLink, "$url@$revision");?></div>
<div class='box-content'><xmp><?php echo $diff;?></xmp></div>
<?php include '../../common/view/footer.lite.html.php';?>
