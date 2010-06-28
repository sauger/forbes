$(function(){
	var keys = new Array();
	var a1 = $('#span_key').html().split(' ');
	for(var i=0;i < a1.length;i++){
		keys = keys.concat(a1[i].split('　'));
	}
	var len = keys.length;
	$('.info').each(function(){
		var str = $(this).html();
		for(var i=0;i<len;i++){
			var pattern = "/("+keys[i]+")\s*/g";
			str = str.replace(eval(pattern),"<span style='background-color:yellow';>$1</span>");
		}
		$(this).html(str);
	});
});