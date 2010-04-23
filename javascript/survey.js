$(function(){
	var num = 0;
	$(".limit_item input[type=checkbox]").click(function(e){
		e.preventDefault();
		var limit = $(this).parent().parent().parent().parent().attr('limit');
		$(this).parent().find("input[type=checkbox]").each(function(){
			if($(this).attr("checked")){
				num++;
				alert($(this).attr("checked"));
				alert(num);
			}
			if(num==limit){
				alert('abc');
			}
		});
	});
});
