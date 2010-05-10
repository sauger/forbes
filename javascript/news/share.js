$(function(){
	var count = 4;
	$("#add").click(function(){
		if(count<10){
			$(this).parent().before('<div class="share_line"><div class="share_mail"><span>好友邮件'+count+':</span><input name="mail[]" class="input1" type="text"></div><div class="share_name"><span>好友昵称'+count+'：</span><input name="name[]" class="input2" type="text"></div></div>')
			count++;
		}
	});
	
	$("#share_submit").click(function(){
		
		
		var input_array = new Array();
		var input_size = $(".input1").size();
		for(var i=0;i<input_size;i++){
			if(isEmail($(".input1").eq(i).val())&&$(".input2").eq(i).val()!=''){
				
			}
		}
		return false;
		var input1 = false;
		var input2 = false;
		
		$(".input1").each(function(){
			if($(this).val().length>30){
				alert("邮件名太长！");
				return false;
			}else{
				if($(this).val()!=''){
					if(!isEmail($(this).val())){
						alert("邮件格式有误！");
						return false;
					}else{
						input1 = true;
					}
				}
			}
		});
		alert(input1);
		$(".input2").each(function(){
			if($(this).val().length>20){
				alert("昵称太长！");
				return false;
			}else{
				if($(this).val()!=''){
					input2 = true;
				}
			}
		});
		
		if(input1&&input2){
			//$("form").submit();
			$.getScript('/php/share.post.php?'+ $('#share_form').serialize());
			return false;
		}
	});
});

function isEmail( str ){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 
