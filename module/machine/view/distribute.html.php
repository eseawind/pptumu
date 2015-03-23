<?php include '../../common/view/header.html.php';?>

<?php include '../../common/view/datepicker.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<?php js::set('holders', $lang->project->placeholder);?>
<div class='container mw-1400px'>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->code; ?></th>
			<td class='w-p25-f'><?php echo $machine->code; ?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->name; ?></th>
			<td class='w-p25-f'><?php echo $machine->name; ?></td>
			<td></td>
		</tr>
		<tr>
			<th class='w-90px'><?php echo $lang->machine->name; ?></th>
			<td class='w-p25-f'><?php echo $machine->name; ?></td>
			<td></td>
		</tr>

		<tr>
			<th><?php echo $isRent ? $lang->machine->ownerRent : $lang->machine->owner; ?></th>
			<td><?php echo $machine->owner; ?></td><td></td>
		</tr>
		<tr>
			<th><?php echo $lang->machine->type; ?></th>
			<td><?php echo $machine->type_name; ?></td>
			<td></td>
		</tr>
	</table>

	<div>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id[]', $projects, '', "id='project_id_1' class='form-control'"); ?></td>
			<td rowspan="3">
			</td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="begin_1" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('begin[]', '', "id='begin_1' readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="end_1" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('end[]', '', "id='end_1' readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
	</table>
	<hr />
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id[]', $projects, '', "id='project_id_2' class='form-control'"); ?></td>
			<td rowspan="3">
			</td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="begin_2" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('begin[]', '', "id='begin_2' readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
					<span class="icon-remove"></span>
				</span>
				<span class="input-group-addon">
					<span class="icon-calendar"></span>
				</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="end_2" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('end[]', '', "id='end_2' readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
					<span class="icon-remove"></span>
				</span>
				<span class="input-group-addon">
					<span class="icon-calendar"></span>
				</span>
				</div>
			</td>
		</tr>
	</table>
	<hr />
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id[]', $projects, '', "id='project_id_3' class='form-control'"); ?></td>
			<td rowspan="3">
			</td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="begin_3" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('begin[]', '', "id='begin_3' readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
				<span class="icon-remove"></span>
			</span>
			<span class="input-group-addon">
				<span class="icon-calendar"></span>
			</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="end_3" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('end[]', '', "id='end_3' readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
				<span class="icon-remove"></span>
			</span>
			<span class="input-group-addon">
				<span class="icon-calendar"></span>
			</span>
				</div>
			</td>
		</tr>
	</table>
	<hr />
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id[]', $projects, '', "id='project_id_4' class='form-control'"); ?></td>
			<td rowspan="3">
			</td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="begin_4" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('begin[]', '', "id='begin_4' readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="end_4" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('end[]', '', "id='end_4' readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
	</table>
	<hr />
	<table class='table table-form'>
		<tr>
			<th class='w-90px'>选择项目</th>
			<td class='w-p25-f'><?php echo html::select('project_id[]', $projects, '', "id='project_id_5' class='form-control'"); ?></td>
			<td rowspan="3">
			</td>
		</tr>
		<tr>
			<th>开始时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="begin_5" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('begin[]', '', "id='begin_5' readonly='readonly' class='form-control' placeholder='开始时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<th>结束时间</th>
			<td>
				<div class="input-group date form-datetime" data-link-format="yyyy-mm-dd H:i:s" data-link-field="end_5" data-date-format="yyyy-mm-dd H:i:s" data-date="">
					<?php echo html::input('end[]', '', "id='end_5' readonly='readonly' class='form-control' placeholder='结束时间'"); ?>
					<span class="input-group-addon">
						<span class="icon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="icon-calendar"></span>
					</span>
				</div>
			</td>
		</tr>
	</table>
	</div>

	<table class='table table-form'>
		<tr>
			<td class='text-center'>
				<?php echo html::hidden('machine_id', $machineID); ?>
				<?php echo html::submitButton('分配') . html::backButton(); ?>
			</td>
		</tr>
	</table>
</form>
</div>

<?php include '../../common/view/footer.html.php';?>
