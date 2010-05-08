<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	</head>
<body>
<?php
    include_once('../frame.php');
	
	if(!is_post()){
		redirect('/error/'); 
		die();
	}
	
	if($_POST['yzm']!=$_SESSION['getpwd']||empty($_SESSION['getpwd'])){
		alert('验证码不正确！');
		redirect('/getpwd/'); 
		die();
	}
	if(strlen($_POST['u_name']) > 20){
		alert('用户名过长！请重新输入！');
		redirect('/getpwd/');
		die();
	}
	if(strlen($_POST['u_name']) < 4){
		alert('用户名过短！请重新输入！');
		redirect('/getpwd/');
		die();
	}
	if(preg_match("/^\w+$/", $_POST['u_name'])==0){
		alert('用户名包含特殊字符！请重新输入！');
		redirect('/getpwd/');
		die();
	}
	if(strlen($_POST['email']) > 40){
		alert('邮箱过长！请重新输入！');
		redirect('/getpwd/');
		die();
	}
	if(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $_POST['email'])==0){
		alert('邮箱格式不正确！请重新输入！');
		redirect('/getpwd/');
		die();
	}
	$name = $_POST['u_name'];
	$mail =  $_POST['email'];
	$db = get_db();
	
	$user = $db->query("select id from fb_yh where name='$name' and email='$mail'");
	if($db->record_count==1){
		$verify = rand_str();
		$gp = new table_class('fb_get_pwd');
		$gp->user_id = $user[0]->id;
		$gp->verify = $verify;
		$gp->end_time = dt_increase(2,'h');
		$gp->save();
		$content = "{$name},你好：<br/><br/>　　欢迎进行福布斯中文网密码重置过程，请在2小时内点击下面的链接：<br/>　　<a href='http://www.forbeschina.com/getpwd/get_pwd.php?verify=$verify'>http://www.forbeschina.com/getpwd/get_pwd.php?verify=$verify</a><br><br>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。如果您意外地收到此邮件，很可能是其他用户在尝试重设密码时，误输入了您的电子邮件地址。如果您没有提出此请求，则无需做进一步的操作，可以放心地忽略此电子邮件。";
		send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$mail,'福布斯中文网(Forbeschina.com)密码找回',$content);
		alert("请在2小时内登录到".$mail."完成剩余操作！");
		redirect('/');
	}else{
		alert('用户名和注册邮箱不匹配');
		redirect('/getpwd/');
		die();
	}
?>
</body>
</html>