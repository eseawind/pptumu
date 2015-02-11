<?php include '../../common/view/header.lite.html.php'; ?>
<?php include '../../common/view/treeview.html.php'; ?>

<div class='panel panel-sm'>
  <div class='panel-heading'><i class='icon-list-ul'></i> <strong><?php echo isset($lang->editor->modules[$module])? $lang->editor->modules[$module] : $module;?></strong></div>
  <div class='panel-body'>
  <?php echo $tree; ?>
  </div>
</div>
<script>
$(function () {
    $("#extendTree").treeview();
    $('.hitarea').click(function () {
        var $this = $(this);
        var parent = $this.parent();
        if (parent.hasClass('expandable')) {
            parent.removeClass('expandable').addClass('collapsable');
            $this.removeClass('expandable-hitarea').addClass('collapsable-hitarea');
        } else {
            parent.addClass('expandable').removeClass('collapsable');
            $this.addClass('expandable-hitarea').removeClass('collapsable-hitarea');
        }
    });
});
</script>

<iframe frameborder='0' name='hiddenwin' id='hiddenwin' scrolling='no' class='hidden'></iframe>

