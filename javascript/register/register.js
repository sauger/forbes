$(function(){
	$(".colorbox").colorbox();
	
	$("#info_text").colorbox({width:"80%", inline:true, href:"#register_info"});
	
	$("#user_year").datepicker({
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd',
		yearRange: 'c-100,c'
	});
	
	$("#province").change(function(){
		$.post("/user/show_city.php",{'id':$(this).val()},function(data){
			$("#city").html(data);
		});
	});
	
	$("#user_name").blur(function(){
		check_name();
	});
	
	$("#user_email").blur(function(){
		check_email();
	});
	
	$("#user_pass").blur(function(){
		userPassword();
	});
	
	$("#password2").blur(function(){
		userPassword2();
	});
	
	$("#year").blur(function(){
		if($("#year").val()!=''){
			check_year();
		}else{
			$('.year_check').hide();
			$("#year1").show();
		}
	});
	
	$("#order1").click(function(){
		if($(this).attr('checked')==true){
			$("#order2").attr('checked',false);
		}
	});
	
	$("#order2").click(function(){
		if($(this).attr('checked')==true){
			$("#order1").attr('checked',false);
		}
	});
	
	$("#order9").click(function(){
		if($(this).attr('checked')==true){
			$(".n_order").attr('checked',false);
		}
	});
	
	$(".n_order").click(function(){
		if($(this).attr('checked')==true){
			$("#order9").attr('checked',false);
		}
	});
	
	$("#chang_pic").click(function(){
		$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	})
	
	$("#tj").click(function(){
		
		if($("#user_name").val()=='') {
			alert('请输入用户名');
			$("#user_name").focus();
			return false;
		}else{
			if(!userName()){
				$("#user_name").focus();
				return false;
			}
		}
		if($("#user_email").val()=='') {
			alert('请输入邮箱地址');
			$("#user_email").focus();
			return false;
		}else{
			if(!userEmail()){
				$("#user_email").focus();
				return false;
			}
		}
		if($("#user_pass").val()==''){
			alert('请输入密码');
			$("#user_pass").focus();
			return false;
		}else{
			if(!userPassword()){
				$("#user_pass").focus();
				return false;
			}
		}
		if($("#password2").val()==''){
			alert('请输入确认密码');
			$("#password2").focus();
			return false;
		}else{
			if(!userPassword2()){
				$("#password2").focus();
				return false;
			}
		}
		if($("#nick_name").val()==''){
			alert("请输入姓名");
			$("#nick_name").focus();
			return false;
		}else{
			if(isChinese($("#nick_name").val())){
				if($("#nick_name").val().length>5||$("#nick_name").val().length==1){
					alert("请输入真实姓名");
					$("#nick_name").focus();
					return false;
				}
			}else{
				if($("#nick_name").val().length>20||$("#nick_name").val().length==1){
					alert("请输入真实姓名");
					$("#nick_name").focus();
					return false;
				}
			}
		}
		
		if($("#gender1").attr('checked')==false&&$("#gender2").attr('checked')==false){
			alert("请选择性别");
			$("#gender1").focus();
			return false;
		}
		
		if($("#user_year").val()==''){
			alert("请输入出生年月");
			$("#user_year").focus();
			return false;
		}else{
			if($("#user_year").val().length!=10){
				alert("请正确输入出生年月");
				$("#user_year").focus();
				return false;
			}
		}
		
		if($("#edu").val==""){
			alert("请选择教育程度");
			$("#edu").focus();
			return false;
		}
		
		if($("#province").val==""){
			alert("请选择省份");
			$("#province").focus();
			return false;
		}
		
		if($("#city").val==""){
			alert("请选择城市");
			$("#city").focus();
			return false;
		}
		
		if($("#post").val==""){
			alert("请选择职位");
			$("#post").focus();
			return false;
		}
		
		if($("#company").val==""){
			alert("请选择公司类型");
			$("#company").focus();
			return false;
		}
		
		if($("#industry").val==""){
			alert("请选择所处行业");
			$("#industry").focus();
			return false;
		}

		if(!($("#order1").attr('checked')||$("#order2").attr('checked'))){
			alert('请选择是否愿意订阅福布斯精华推荐');
			$("#order1").focus();
			return false;
		}
		if($("#rvcode").val()==''){
			alert('请输入验证码');
			$("#rvcode").focus();
			return false;
		}else{
			$.post('check_session.php',{'rvcode':$("#rvcode").val()},function(data){
				if(data == '0'){
					alert('验证码错误！');
					return false;
				}else{
					$.post('check_name.php',{'name':$("#user_name").val()},function(data){
						if(data==1){
							$(".name_check").css('display','none');
							$("#user3").css('display','inline');
							$("#user_name").focus();
						}else if(data==0){
							$.post('check_email.php',{'email':$("#user_email").val()},function(data){
								if(data==1){
									$(".email_check").css('display','none');
									$("#email4").css('display','inline');
									$("#user_email").focus();
								}else if(data=='0'){
									$("#re_form").submit();
								}
							});
						}
					});
				}
			});
		}
	});
	//var checked = $("#sure_check").attr('checked');
	//$("#tj").attr('disabled',!checked);
	//$("#sure_check").click(function(){
	//	var checked = $("#sure_check").attr('checked');
	//	$("#tj").attr('disabled',!checked);
	//});
});

function userName(){
	if($("#user_name").val()!=''){
		if($("#user_name").val().length<4||$("#user_name").val().length>20){
			$(".name_check").css('display','none');
			$("#user4").css('display','inline');
			return false;
		}else{
			if(!isNumberOrLetter($("#user_name").val())){
				$(".name_check").css('display','none');
				$("#user5").css('display','inline');
				return false;
			}else{
				$(".name_check").css('display','none');
				$("#user2").css('display','inline');
				return true;
			}
		}
	}else{
		$(".name_check").css('display','none');
		$("#user1").css('display','inline');
		return false;
	}
}

function check_name(){
	$.post('check_name.php',{'name':$("#user_name").val()},function(data){
		if(data==1){
			$(".name_check").css('display','none');
			$("#user3").css('display','inline');
			return false;
		}else if(data==0){
			userName()
			return true;
		}
	});
}
function check_email(){
	$.post('check_email.php',{'email':$("#user_email").val()},function(data){
		if(data==1){
			$(".email_check").css('display','none');
			$("#email4").css('display','inline');
			return false;
		}else if(data=='0'){
			userEmail()
			return true;
		}
	});
}

function userEmail(){
	if($("#user_email").val()!=''){
		if(!isEmail($("#user_email").val())){
			$(".email_check").css('display','none');
			$("#email3").css('display','inline');
			return false;
		}else{
			$(".email_check").css('display','none');
			$("#email2").css('display','inline');
			return true;
		}
	}else{
		$(".email_check").css('display','none');
		$("#email1").css('display','inline');
		return false;
	}
}

function userPassword(){
	if($("#user_pass").val()!=''){
		if($("#user_pass").val().length<4||$("#user_pass").val().length>20){
			$(".pass_check").css('display','none');
			$("#pass4").css('display','inline');
			return false;
		}
		
		if(!isNumberOrLetter2($("#user_pass").val())){
			$(".pass_check").css('display','none');
			$("#pass3").css('display','inline');
			return false;
		}else{
			$(".pass_check").css('display','none');
			$("#pass2").css('display','inline');
			return true;
		}
	}else{
		$(".pass_check").css('display','none');
		$("#pass1").css('display','inline');
	}
	if($("#password2").val()!=''&&$("#user_pass").val()!=''){
		if($("#password2").val()==$("#user_pass").val()){
			$(".pass_check2").css('display','none');
			$("#check_pass1").css('display','inline');
			return true;
		}else{
			$(".pass_check2").css('display','none');
			$("#check_pass2").css('display','inline');
			return false;
		}
	}else{
		$(".pass_check2").css('display','none');
	}
}

function userPassword2(){
	if($("#password2").val()!=''&&$("#user_pass").val()!=''){
		if($("#password2").val()==$("#user_pass").val()){
			$(".pass_check2").css('display','none');
			$("#check_pass1").css('display','inline');
			return true;
		}else{
			$(".pass_check2").css('display','none');
			$("#check_pass2").css('display','inline');
			return false;
		}
	}else{
		$(".pass_check2").css('display','none');
	}
}


function isNumberOrLetter(s){//判断是否是数字或字母 
	var regu = "^[0-9a-zA-Z]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}

function isNumberOrLetter2(s){//判断是否是数字或字母及少量特殊符号
	var regu = "^[0-9a-zA-Z.!@#$%^&*]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}


function isEmail( str ){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 

function isChinese(temp)
{
	var re = /[^\u4e00-\u9fa5]/;
	if(re.test(temp)) return false;
	return true;
} 