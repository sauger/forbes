$(function(){
	$("#change_pic").click(function(){
		$("#yz_img").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	});
	
	$("#login2").click(function(){
		var flag = true;
		if($(".required").eq(0).val()!=$(".required").eq(1).val()){
			alert('2次密码不一致！');
			flag = false;
			return false;
		}
		
		$(".required").each(function(){
			if($(this).val()==''){
				alert('密码不能为空！');
				$(this).focus();
				flag = false;
				return false;
			}else if($(this).val().length>20||$(this).val().length<4){
				alert('密码为4-20个字符');
				$(this).focus();
				flag = false;
				return false;
			}else if(!isNumberOrLetter2($(this).val())){
				alert('密码只能包含英文大小写字母、数字和部分标点符号！');
				$(this).focus();
				flag = false;
				return false;
			}
		});
		
		if(flag){
			$("#get_pwd").submit();
		}
	});
});


function isNumberOrLetter2(s){//判断是否是数字或字母及少量特殊符号
	var regu = "^[0-9a-zA-Z.!@#$%^&*]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}