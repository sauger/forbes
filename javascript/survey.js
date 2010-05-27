$(function(){
	$(".limit_item input[type=checkbox]").click(function(e){
		var num = 0;
		var limit = $(this).parent().parent().parent().parent().attr('limit');
		$(this).parent().parent().parent().find("input[type=checkbox]").each(function(){
			if($(this).attr("checked")){
				num++;
			}
		});
		if(num>limit){
			e.preventDefault();
			alert('只能选择'+limit+'个选项');
		}
	});
	
	$("input[type=submit]").click(function(){
		var all = true;
		$(".s2_content").each(function(){
			var flag = false;
			$(this).find("input[type=checkbox]").each(function(){
				if($(this).attr("checked")){
					flag = true;
				}
			});
			if(!flag) all = false;
		});
		if(!all){
			alert('请将调查表填写完全!');
			return false;
		}
	});
});
