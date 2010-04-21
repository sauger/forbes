$(function(){
	var name = $.cookie('name');
	if(name){
		var str = '<button id="submit">提交</button>';
	}else{
		var str = '<span><label>用户名</label></span><input type="text" name="n" />' 
				+ '		<span><label>密　码</label></span><input type="text" name="p" />'
				+ '		<a href="/register/">注册</a>'
				+ '		<button id="submit">提交</button>';
	}
	$('#submit_div').html(str);
});