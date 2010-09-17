$(function(){
	$("#info_submit").click(function(){
		if($("#rvcode").val()==''){
			alert('请输入验证码！');
		}else{
			$.post('/user/check_session.php',{'verify':$("#rvcode").val()},function(data){
				if(data=='success'){
					$('form').submit();
				}else{
					alert('验证码错误！');
				}
			});
		}
	});
	
	$("#province").change(function(){
		$.post("show_city.php",{'id':$(this).val()},function(data){
			$("#city").html(data);
		});
	});
	
	$("#chang_pic").click(function(){
		$("#pic").attr('src','/user/yz.php?reload='+Math.round(Math.random()*10000));
	});
	
	$("#info_skip").click(function(){
		location.href='reg_success.php';
	});
	
	$("#pass_b").click(function(){
		var flag = true;
		$("#content_right").find('input').each(function(){
			if($(this).val()==''){
				alert('请输入密码');
				$(this).focus();
				flag = false;
				return false;
			}else{
				if($(this).val().length<4||$(this).val().length>20){
					alert("请输入合法密码");
					$(this).focus();
					flag = false;
					return false;
				}
			}
		});
		if(!flag) return false;
		if($("#new_pass").val()!=$("#rnew_pass").val()){
			alert("确认密码和新密码不一致！");
			$("#rnew_pass").focus();
			return false;
		}else if(!isNumberOrLetter2($("#new_pass").val())){
			alert("密码只能包含数字或字母及少量特殊符号！");
			$("#rnew_pass").focus();
			return false;
		}else if($("#new_pass").val().length<4){
			alert("密码过短！");
			$("#rnew_pass").focus();
			return false;
		}else{
			$.post('update_password.php',{'o_p':$("#old_pass").val(),'n_p':$("#new_pass").val()},function(data){
				if(data=='ok'){
					alert('修改成功');
					window.location.reload();
				}else if(data=='wrong'){
					alert("原密码输入错误，请重新输入");
					$("#old_pass").focus();
				}
			})
		}
	});
	
	$("#order_b").click(function(){
		$.post('set_order.php',$('input:checkbox').serializeArray(),function(data){
			alert('修改成功！');
			window.location.reload();
		});
	});
	
	$("#checkbox1").click(function(){
		if($(this).attr('checked')==true){
			$("#checkbox2").attr('checked',false);
		}
	});
	
	$("#checkbox2").click(function(){
		if($(this).attr('checked')==true){
			$("#checkbox1").attr('checked',false);
		}
	});
	
	$(".right_title4").hover(function(){
		$(".right_title4").css('background','');
		$(".right_title4").css('color','#fff');
		$(this).css('background','url(/images/user/right_title.jpg)');
		$(this).css('color','#055C99');
		$(".right_text").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
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