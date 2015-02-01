<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>

<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>

<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']);?></span>
			<strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->project->create;?></strong>
		</div>
		<div class='actions'>
			<button class='btn' id='cpmBtn'><?php echo html::icon($lang->icons['copy']) . ' ' . $lang->project->copy;?></button>
		</div>
	</div>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
		<table class='table table-form'>
			<tr>
				<th class='w-90px'><?php echo $lang->project->code;?></th>
				<td class='w-p25-f'><?php echo html::input('code', $code, "class='form-control'");?></td><td></td>
			</tr>
		</table>
	</form>
</div>

<?php include '../../common/view/footer.html.php'; ?>
