<div class='panel panel-block' id='projectbox'>
<?php if (count($projectStats) == 0) { ?>
	<div class='panel-heading'>
		<i class='icon-folder-close-alt icon'></i> <strong><?php echo $lang->my->home->projects; ?></strong>
	</div>
	<div class='panel-body text-center'><br />
		<?php echo html::a($this->createLink('project', 'create'), "<i class='icon-plus'></i> " . $lang->my->home->createProject, '', "class='btn btn-primary'"); ?>
	</div>
<?php } else { ?>
	<table class='table table-condensed table-hover table-striped table-borderless table-fixed active-disabled'>
		<thead>
		<tr class='text-center'>
			<th class='w-100px'><?php echo $lang->project->code; ?></th>
			<th class='w-150px'>
				<div class='text-left'><i class="icon-folder-close-alt icon"></i> <?php echo $lang->project->name; ?></div>
			</th>
			<th><?php echo $lang->project->begin; ?></th>
			<th><?php echo $lang->project->espected_completion; ?></th>
			<th><?php echo $lang->project->actual_completion; ?></th>
			<th><?php echo $lang->statusAB; ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $id = 0; ?>
		<?php foreach ($projectStats as $project) { ?>
		<tr class='text-center'>
			<td><?php echo $project->code; ?></td>
			<td class='text-left'><?php echo html::a($this->createLink('project', 'view', 'projectID=' . $project->id), $project->name, '', "title=$project->name"); ?></td>
			<td><?php echo Helper::validate($project->begin, 'date'); ?></td>
			<td><?php echo Helper::validate($project->espected_completion, 'date'); ?></td>
			<td><?php echo Helper::validate($project->actual_completion, 'date'); ?></td>
			<td class='project-<?php echo $project->status ?>'>
				<?php echo $lang->project->statusList[$project->status]; ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
<?php } ?>
</div>
<script>
$(function () {
	var $projectbox = $('#projectbox');
	var $sparks = $projectbox.find('.spark');
	$sparks.filter(':lt(6)').addClass('sparked').projectLine();
	$sparks = $sparks.not(':lt(6)');
	var rowHeight = $sparks.first().closest('tr').outerHeight() - (window.browser.ie === 8 ? 0.3 : 0);

	var scrollFn = false, scrollStart, i, id, $spark;
	$projectbox.on('scroll.spark', function (e) {
		if (!$sparks.length) {
			$projectbox.off('scroll.spark');
			return;
		}
		if (scrollFn) clearTimeout(scrollFn);

		scrollFn = setTimeout(function () {
			scrollStart = Math.floor(($projectbox.scrollTop() - 30) / (rowHeight)) + 1;
			for (i = scrollStart; i <= scrollStart + 7; i++) {
				id = '#spark-' + i;
				$spark = $(id);
				if ($spark.hasClass('sparked')) continue;
				$spark.addClass('sparked').projectLine();
				$sparks = $sparks.not(id);
			}
		}, 100);
	});
});
</script>
