$(function(){
	var name = $.cookie('login_name');
	if(name){
		var str = '<button id="submit">提交</button>';
	}else{
		var str = '<span><label>用户名</label></span><input type="text" maxlength="50" name="n" />' 
				+ '		<span><label>密　码</label></span><input type="password" maxlength="50" name="p" />'
				+ '		<button id="submit">提交</button>'
				+ '		<a href="/register/">注册</a>';				
	}
	$('#submit_div').html(str);
	
	$('#submit').click(function(){
		if($('#co').val().length > 2000){
			alert('评论内容过长，请分次提交！');
			$('#co').focus();
			return false;
		}
		if($('#co').val().length <= 0){
			alert('请输入评论内容！');
			$('#co').focus();
			return false;
		}
		if(!is_email($('#em').val())){
			alert('请输入有效的email地址');
			return false;
		}
		var param = $('#comment_form').serialize();
		$.getScript('/ajax/magazine_comment.post.php?'+ param);
		return false;
	});
});