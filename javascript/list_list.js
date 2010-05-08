$(function(){
	$('#sort_button').click(function(){
		if($('#sort_text').val() == ""){
			alert("请输入关键字");
			return false;
		}
		var url = "/search/list/key/" + encodeURI($('#sort_text').val());
		location.href  = url;
	});
});