<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<script language="javascript">
/**
 * 提交修改申请
 * @param tagObj $(this)
 * @param replaceID
 */
function orderModificationApplication(tagObj, replaceID)
{
	var objectType = $('#' + tagObj).attr('objecttype');
	var objectTypeName = $('#' + tagObj).attr('objecttypename');
	var objectId = $('#' + tagObj).attr('objectid');
	var objectName = $('#' + tagObj).attr('objectname');

	var url = '<?php echo $this->createLink('my', 'ordermodification'); ?>';

	if (confirm('确认需要修改' + objectTypeName + '[' + objectName + ']?')) {
		$.ajax(
			{
				type: 'POST',
				url: url,
				data: {object_type: objectType, object_id: objectId},
				dataType: 'json',
				success: function (data) {
					if (data.result == 'success') {
						$('#' + replaceID).wrap("<div id='tmpDiv'></div>");
						$('#tmpDiv').load(document.location.href + ' #' + replaceID, function () {
							$('#tmpDiv').replaceWith($('#tmpDiv').html());
							if (typeof sortTable == 'function') {
								sortTable();
							}
							$('#' + replaceID).find('[data-toggle=modal], a.iframe').modalTrigger();
						});
					}
				}
			}
		);
	}
}
</script>