$(function() {
	/**
	 * 提交日报/签证/问题审核
	 * @param tagObj $(this)
	 */
	$('.btn_act_verify').bind('click', function() {
		var objectType = $(this).attr('objecttype');
		var objectId = $(this).attr('objectid'), objectName = $(this).attr('objectname');
		var verified = $(this).attr('verified');

		var veriiyAction = verified == 1 ? '通过' : '不通过';

		var url = '/dailyreview-verify.html';

		if (confirm('确认要' + veriiyAction + objectName + '的审核?')) {
			$.ajax({
				type: 'POST',
				url: url,
				data: {verified: verified, object_type: objectType, object_id: objectId},
				dataType: 'json',
				success: function (data) {
					if (data.result == 'success') {
						alert('已成功' + veriiyAction + objectName + '的审核!');

						document.location.reload();
					}
				}
			});
		}
	});
});
