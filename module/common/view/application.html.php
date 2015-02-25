<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<script language="javascript">
/**
 * 提交修改申请
 * @param tagObj $(this)
 */
function orderModificationApplication(tagObj)
{
	var objectType = $('#' + tagObj).attr('objecttype');
	var objectTypeName = $('#' + tagObj).attr('objecttypename');
	var objectId = $('#' + tagObj).attr('objectid');
	var objectName = $('#' + tagObj).attr('objectname');
	var action = $('#' + tagObj).attr('action');

	var url = '<?php echo $this->createLink('my', 'ordermodification'); ?>';

	if (confirm('确认需要修改' + objectTypeName + '[' + objectName + ']?')) {
		$.ajax({
			type: 'POST',
			url: url,
			data: {object_type: objectType, object_id: objectId, action: (action ? action : 'edit')},
			dataType: 'json',
			success: function (data) {
				if (data.result == 'success') {
					alert('已成功申请修改' + objectTypeName + '[' + objectName + ']');

					document.location.reload();
				}
			}
		});
	}
}

/**
 * 提交修改申请
 * @param tagObj $(this)
 */
function verifyApplication(tagObj)
{
	var verified = $('#' + tagObj).attr('verified');
	var applicationID = tagObj.split('_')[1]; // $('#' + tagObj).attr('applicationid');

	var veriiyAction = verified == 1 ? '通过' : '拒绝';

	var url = '<?php echo $this->createLink('my', 'verifyapplication'); ?>';

	if (confirm('确认要' + veriiyAction + '修改申请?')) {
		$.ajax({
			type: 'POST',
			url: url,
			data: {verified: verified, id: applicationID},
			dataType: 'json',
			success: function (data) {
				if (data.result == 'success') {
					alert('已成功' + veriiyAction + '申请!');

					document.location.reload();
				}
			}
		});
	}
}
</script>
