$(function(){
	var keys = new Array();
	var a1 = $('#span_key').html().split(' ');
	for(var i=0;i < a1.length;i++){
		keys = keys.concat(a1[i].split('　'));
	}
	//var str = "中国人abc民万岁中国人民万岁！";
	//var pattern = "/(中国)\s*(万岁)\s*/g";
	alert(str.replace(eval(pattern),"$1(china)"));
	$('.description').each(function(){
		
	});
});