$(function(){
	var name = $.cookie('name');
	if($.cookie('cache_name')){
		var str = '<div id="div_submit"><button id="submit">提交</button></div>';
	}else{
		var str = '<span><label>用户名</label></span><input type="text" maxlength="50" name="n" />' 
				+ '		<span><label>密　码</label></span><input type="password" maxlength="50" name="p" style="margin-right:0px" /><br>'
				+ '		<div id="div_submit"><button id="submit">提　　交</button></div>';
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