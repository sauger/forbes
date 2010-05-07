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
	
	if($_POST['session']!=$_SESSION['get_pwd']){
		die();
	}
	if(!is_post()){
		die();
	}
	if($_POST['password1']!=$_POST['password2']){
		alert("2次密码输入不一致!");
		redirect($_SERVER['HTTP_REFERER']);
	}elseif(strlen($_POST['password1'])>20||strlen($_POST['password1'])<4){
		alert("密码长度不正确!");
		redirect($_SERVER['HTTP_REFERER']);
	}else{
		$db = get_db();
		$password = md5($_POST['password1']);
		$uid = $_POST['uid'];
		$db->execute("update fb_yh set password='$password' where id=$uid");
		$db->execute("update fb_get_pwd set end_time=now() where user_id=$uid");
		alert('修改成功!');
		redirect('/login');
	}

?>
</body>
</html>