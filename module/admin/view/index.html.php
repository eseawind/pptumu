<?php include '../../common/view/header.html.php'; ?>

<div id='titlebar'>
	<div class='heading'>
		<?php
		echo sprintf($lang->admin->info->version, $config->version);
		if ($bind) echo sprintf($lang->admin->info->account, '<span class="red">' . $account . '</span>');
		echo $lang->admin->info->links;
		?>
	</div>
</div>
<?php include '../../misc/view/links.html.php'; ?>
<?php include '../../common/view/footer.html.php'; ?>
