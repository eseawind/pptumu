<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/sparkline.html.php';?>

<?php if ($step == 'project') { ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
		<strong>
			<small class='text-muted'><i class='icon icon-plus'></i></small>
			申请材料 &gt; 选择项目
		</strong>
	</div>
</div>
<div class='container mw-1400px'>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-150px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id', $projects, '', "class='form-control'");?></td><td></td>
		</tr>
		<tr>
			<th></th>
			<td colspan="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton();?>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php } else if ($step == 'material') { ?>

<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
		<strong>
			<small class='text-muted'><i class='icon icon-plus'></i></small>
			申请材料 &gt; 选择材料
		</strong>
	</div>
</div>
<div class='container mw-1400px'>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form table-striped'>
	<tbody>
	<?php foreach ($materials As $index => $mt) { ?>
		<tr>
			<th class='w-150px'><?php echo $mt['name'];?></th>
			<td>
			<ul class="apply-cl-list clearfix">
				<?php foreach ($mt['materials'] As $mid => $mname) { ?>
				<li><label><input type="checkbox" name="material_id[]" id="material_id_<?php echo $mid; ?>" value="<?php echo $mid; ?>" /><?php echo $mname; ?> </label></li>
				<?php } ?>
			</ul>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<td colspan="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton();?>
			</td>
		</tr>
	</tfoot>
	</table>
	</form>
</div>

<?php } else if ($step == 'qty') { ?>

<?php include '../../common/view/kindeditor.html.php'; ?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<div id='titlebar'>
	<div class='heading'>
		<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
		<strong>
			<small class='text-muted'><i class='icon icon-plus'></i></small>
			申请材料 &gt; 申请数量
		</strong>
	</div>
</div>
<div class='container mw-1400px'>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
	<tbody>
		<?php foreach ($details As $did => $detail) { ?>
		<tr>
			<th class='w-150px'>
				<?php echo $detail->material_name; ?>
				<?php echo html::hidden('id[]', $did); ?>
			</th>
			<td class="row">
				<?php echo html::input('qty[]', '', 'class="form-control"'); ?>
			</td>
			<td><?php echo $detail->material_unit; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>材料到达时间</th>
			<td class="row col-xs-2">
				<div class="input-group date form-date" data-link-format="yyyy-mm-dd" data-link-field="expect_arrival_date" data-date-format="yyyy-mm-dd" data-date="">
					<?php echo html::input('expect_arrival_date', '', "readonly='readonly' class='form-control' placeholder='材料到达时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
			<td></td>
		</tr>
		<tr>
			<th>备注</th>
			<td colspan="2"><?php echo html::textarea('remark', '', 'rows="6" class="form-control"'); ?></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<td colspan="2" class='text-center'>
				<?php echo html::submitButton() . html::backButton(); ?>
			</td>
		</tr>
	</tfoot>
	</table>
	</form>
</div>

<?php } ?>

<?php include '../../common/view/footer.html.php'; ?>
