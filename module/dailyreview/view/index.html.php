<?php include '../../common/view/header.html.php';?>

<div id='featurebar'>
	<form method="post" taget="" class="form-condensed">
		<div class="input-group">
			<span class="input-group-addon">按照项目筛查询申请记录：</span>
			<?php echo html::select('search[project_id]', $projects, $projectID, 'class="form-control"'); ?>
			<span class="input-group-btn">
			<button class="btn btn-default" type="submit">搜索</button>
		</span>
		</div>
	</form>
</div>

<div class="main">
	<ul id="financial_tab" class="nav nav-primary nav-justified">
		<li class="<?php echo ($verified == 'pending') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('dailyreview', 'index', "{$verifiedParams}&verified=pending"), '未审核'); ?>
		</li>
		<li class="<?php echo ($verified == 'passed') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('dailyreview', 'index', "{$verifiedParams}&verified=passed"), '已审核'); ?>
		</li>
		<li class="<?php echo ($verified == 'refused') ? 'active' : ''; ?>">
			<?php echo html::a($this->createLink('dailyreview', 'index', "{$verifiedParams}&verified=refused"), '已拒绝'); ?>
		</li>
	</ul>

	<div>
		<?php foreach ($dailies As $id => $daily) { ?>
		<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
			<tbody>
			<tr class="a-center">
				<th><?php echo $daily->project_name; ?></th>
				<th>项目编号: <?php echo $daily->project_code; ?></th>
				<th>日期: <?php echo $daily->date; ?></th>
			</tr>
			<tr>
				<td colspan="3">
				<?php if ($daily->today_report) { ?>
					本日情况:
					<?php echo html::a(helper::createLink('report', 'show', "reportID={$daily->today_report->id}") . '?onlybody=yes', '查看', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?>
					<?php if ($daily->today_report->verified) { ?>
						已审核
					<?php } else { ?>
						未审核
					<?php } ?>
					&nbsp;&nbsp;
				<?php } ?>
				<?php if ($daily->tomorrow_report) { ?>
					明日计划:
					<?php echo html::a(helper::createLink('report', 'show', "reportID={$daily->tomorrow_report->id}") . '?onlybody=yes', '查看', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?>
					<?php if ($daily->tomorrow_report->verified) { ?>
						已审核
					<?php } else { ?>
						未审核
					<?php } ?>
					&nbsp;&nbsp;
				<?php } ?>
				<?php if ($daily->testation) { ?>
					签证:
					<?php echo html::a(helper::createLink('report', 'showtestation', "testationID={$daily->testation->id}") . '?onlybody=yes', '查看', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?>
					<?php if ($daily->testation->verified) { ?>
						已审核
					<?php } else { ?>
						未审核
					<?php } ?>
					&nbsp;&nbsp;
				<?php } ?>
				<?php if ($daily->problem) { ?>
					存在问题:
					<?php echo html::a(helper::createLink('report', 'showproblem', "problemID={$daily->problem->id}") . '?onlybody=yes', '查看', '', "class='about iframe' data-width='900' data-headerless='true' data-class='modal-about'"); ?>
					<?php if ($daily->problem->verified) { ?>
						已审核
					<?php } else { ?>
						未审核
					<?php } ?>
					&nbsp;&nbsp;
				<?php } ?>
				</td>
			</tr>
			</tbody>
		</table>
		<?php } ?>

		<table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='bugAssign'>
			<tfoot>
			<tr>
				<td><div class='text-right'><?php $pager->show();?></div></td>
			</tr>
			</tfoot>
		</table>
	</div>
</div>

<?php include '../../common/view/footer.html.php';?>
