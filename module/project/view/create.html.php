<?php if (isset($tips)) { ?>
	<?php $defaultURL = $this->createLink('project', 'task', 'projectID=' . $projectID); ?>
	<?php include '../../common/view/header.lite.html.php'; ?>
<body style='background: #e5e5e5'>
  <div class='modal-dialog mw-500px' id='tipsModal'>
    <div class='modal-header'>
      <a href='<?php echo $defaultURL; ?>' class='close'>&times;</a>
      <h4 class='modal-title' id='myModalLabel'><?php echo $lang->project->tips; ?></h4>
    </div>
    <div class='modal-body'>
    <?php echo $tips; ?>
    </div>
  </div>
</body>
</html>
<?php exit; ?>
<?php } ?>

<?php include '../../common/view/header.html.php'; ?>
<?php include '../../common/view/datepicker.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php'; ?>
<?php js::import($jsRoot . 'misc/date.js'); ?>
<?php js::set('holders', $lang->project->placeholder); ?>
<div class='container mw-1400px'>
	<div id='titlebar'>
		<div class='heading'>
			<span class='prefix'><?php echo html::icon($lang->icons['project']); ?></span>
			<strong>
				<small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->project->create; ?>
			</strong>
		</div>
		<div class='actions'>
			<button class='btn' id='cpmBtn'><?php echo html::icon($lang->icons['copy']) . ' ' . $lang->project->copy; ?></button>
		</div>
	</div>
	<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
	<table class='table table-form'>
		<tr>
			<th class='w-90px'><?php echo $lang->project->code; ?></th>
			<td class='w-p25-f'><?php echo html::input('code', $code, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->name; ?></th>
			<td><?php echo html::input('name', $name, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->client; ?></th>
			<td><?php echo html::input('client', $client, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->address; ?></th>
			<td><?php echo html::input('address', $address, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->type; ?></th>
			<td><?php echo html::input('type', $type, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->dateRange; ?></th>
			<td>
			<div class='input-group'>
				<?php echo html::input('begin', date('Y-m-d'), "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->begin . "'"); ?>
				<span class='input-group-addon'><?php echo $lang->project->to; ?></span>
				<?php echo html::input('espected_completion', '', "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->espected_completion . "'"); ?>
			</div>
			</td>
			<td>
				&nbsp; &nbsp;
				<?php echo html::radio('delta', $lang->project->endList, '', "onclick='computeEndDate(this.value)'"); ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $lang->project->actual_completion; ?></th>
			<td><?php echo html::input('actual_completion', $actual_completion, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->actual_completion . "'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->pm; ?></th>
			<td><?php echo html::select('pm', $poUsers, $project->pm, "class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr>
			<th><?php echo $lang->project->desc; ?></th>
			<td colspan='2'><?php echo html::textarea('desc', '', "rows='6' class='form-control'"); ?></td>
			<td></td>
		</tr>
		<tr id='whitelistBox' <?php if ($acl != 'custom') echo "class='hidden'"; ?>>
			<th><?php echo $lang->project->whitelist; ?></th>
			<td colspan='2'><?php echo html::checkbox('whitelist', $groups, $whitelist); ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='2' class='text-center'>
				<?php echo html::submitButton() . html::backButton(); ?>
			</td>
		</tr>
	</table>
	</form>
</div>
<div class='modal fade' id='copyProjectModal'>
	<div class='modal-dialog mw-800px'>
		<div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal'>&times;</button>
			<h4 class='modal-title' id='myModalLabel'><?php echo $lang->project->copyTitle; ?></h4>
		</div>
		<div class='modal-body'>
		<?php if (count($projects) == 1): ?>
			<div class='alert alert-warning'>
				<i class='icon-info-sign'></i>

				<div class='content'>
					<p><?php echo $lang->project->copyNoProject; ?></p>
				</div>
			</div>
		<?php else: ?>
			<div id='copyProjects' class='row'>
				<?php foreach ($projects as $id => $name): ?>
				<?php if (empty($id)): ?>
				<?php if ($copyProjectID != 0): ?>
				<div class='col-md-4 col-sm-6'>
					<a href='javascript:;' data-id='' class='cancel'><?php echo html::icon($lang->icons['cancel']) . ' ' . $lang->project->cancelCopy; ?></a>
				</div>
				<?php endif; ?>
				<?php else: ?>
				<div class='col-md-4 col-sm-6'><a href='javascript:;' data-id='<?php echo $id; ?>' class='nobr <?php echo ($copyProjectID == $id) ? ' active' : ''; ?>'><?php echo html::icon($lang->icons['project'], 'text-muted') . ' ' . $name; ?></a>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
