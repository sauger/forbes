$(function(){
	var count = 4;
	$("#add").click(function(){
		if(count<10){
			$(this).parent().before('<div class="share_line"><div class="share_mail"><span>好友邮件'+count+':</span><input name="mail[]" class="input1" type="text"></div><div class="share_name"><span>好友昵称'+count+'：</span><input name="name[]" class="input2" type="text"></div></div>')
			count++;
		}
	});
	
	$("#share_submit").click(function(){
		
		var input_size = $(".input1").size();
		var error_info = '';
		var run_time = true;
		for(var i=0;i<input_size;i++){
			if($(".input1").eq(i).val().length>40){
				error_info = "您填写的邮箱格式有误，无法分享！";
				run_time = false;
				break;
			}
			if(!isEmail($(".input1").eq(i).val())&&$(".input1").eq(i).val()!=''){
				error_info = "您填写的邮箱格式有误，无法分享！";
				run_time = false;
				break;
			}
			if(isEmail($(".input1").eq(i).val())&&$(".input2").eq(i).val()==''){
				error_info = "您的好友昵称未填写，无法分享！";
				run_time = false;
				break;
			}
		}	
		if(error_info){
			alert(error_info);
		}
		if(run_time){
			$.getScript('/php/share.post.php?'+ $('#l').serialize());
		}
	});
});

function isEmail( str ){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 
