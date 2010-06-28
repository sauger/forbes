function send_search(){
	if($('#sort_text').val() == ""){
		alert("请输入关键字");
		return false;
	}
	var url = "/search/list/key/" + encodeURI($('#sort_text').val());
	location.href  = url;
}
$(function(){
	
	$('#sort_button').click(function(){
		send_search();
	});
	$('#sort_text').keypress(function(e){
		if(e.keyCode == 13){
			send_search();
		}
	});
});