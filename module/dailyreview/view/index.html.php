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

</div>

<?php include '../../common/view/footer.html.php';?>
