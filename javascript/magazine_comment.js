$(function(){
	var name = $.cookie('login_name');
	if(name){
		var str = '<button id="submit">提交</button>';
	}else{
		var str = '<span><label>用户名</label></span><input type="text" name="n" />' 
				+ '		<span><label>密　码</label></span><input type="text" name="p" />'
				+ '		<button id="submit">提交</button>'
				+ '		<a href="/register/">注册</a>';				
	}
	$('#submit_div').html(str);
	
	$('#submit').click(function(){
		if($('#co').length > 2000){
			alert('评论内容过长，请分次提交！');
			return;
		}
	});
});