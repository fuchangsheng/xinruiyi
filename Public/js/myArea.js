/**
 * AJAX三级联动获取城市 区域列表
 * @
 * @return list
 */

$(document).ready(function(){
	$("#province").change(function(){
		var pid = $(this).val();
		var href = "__APP__/Area/getCityList";
		jQuery.ajax({ 
			type:'GET', 
			url:href, 
			data:encodeURI('type=ajax&pid='+pid),
			dataType:'json', 
			success:function(data){
				alert(data.info);
			}
		});
	});
  
	

});