<?php
	session_start();
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>用户注册</title>
</head>
<?php 
	if(!is_post()){
		redirect('/error');
		die();
	}
	if($_POST['rvcode']!=$_SESSION['register_pic']||empty($_SESSION['register_pic'])){
		alert('验证码错误!');
		redirect('/register/');
		die();
	}
	if(strlen($_POST['user']['name']) > 20){
		alert('用户名过长！请重新输入！');
		redirect('/register/');
		die();
	}
	if(strlen($_POST['user']['name']) < 4){
		alert('用户名过短！请重新输入！');
		redirect('/register/');
		die();
	}
	if(preg_match("/^\w+$/", $_POST['user']['name'])==0){
		alert('用户名包含特殊字符！请重新输入！');
		redirect('/register/');
		die();
	}
	if(strlen($_POST['user']['password']) > 20){
		alert('密码过长！请重新输入！');
		redirect('/register/');
		die();
	}
	if(strlen($_POST['user']['password']) < 4){
		alert('密码过短！请重新输入！');
		redirect('/register/');
		die();
	}
	if(preg_match("/^[\w.!@#$%^&*]+$/", $_POST['user']['password'])==0){
		alert('密码包含特殊字符！请重新输入！');
		redirect('/register/');
		die();
	}
	if(strlen($_POST['user']['email']) > 40){
		alert('邮箱过长！请重新输入！');
		redirect('/register/');
		die();
	}
	$user = new table_class('fb_yh');
	$user->update_attributes($_POST['user'],false);
	$user->password = md5($user->password);
	$user->authenticate_string = rand_str(10);
	$user->authenticated = 0;
	#$user->created_at = now();
	$user->save();
	//echo $user->id;
	
	$order = new table_class('fb_yh_dy');
	$order->yh_id = $user->id;
	
	if($_POST['jhtj']=='on'){
		$order->jhtj=1;
	}else{
		$order->jhtj=0;
	}
	
	if($_POST['fh']=='on'){
		$order->fh=1;
	}else{
		$order->fh=0;
	}
	if($_POST['cy']=='on'){
		$order->cy=1;
	}else{
		$order->cy=0;
	}
	if($_POST['sy']=='on'){
		$order->sy=1;
	}else{
		$order->sy=0;
	}
	if($_POST['kj']=='on'){
		$order->kj=1;
	}else{
		$order->kj=0;
	}
	if($_POST['tz']=='on'){
		$order->tz=1;
	}else{
		$order->tz=0;
	}
	if($_POST['sh']=='on'){
		$order->sh=1;
	}else{
		$order->sh=0;
	}
	if($order->save()){
		$mail = $user->email;
		$content = "{$user->name}，你好：<br/><br/>　　感谢您注册福布斯中文网(<a href='http://www.forbeschina.com/'>http://www.forbeschina.com/</a>)！<br/><br/>　　请点击以下确认链接，以完成身份验证：<br/>　　<a href=\"http://www.forbeschina.com/register/active.php?user={$user->name}&key={$user->authenticate_string}\">http://www.forbeschina.com/register/active.php?user={$user->name}&key={$user->authenticate_string}</a><br/>　　(如果不能点击该链接地址，请复制并粘贴到浏览器的地址输入框)";
		send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$mail,'福布斯中文网(Forbeschina.com)注册确认邮件',$content);
		alert('注册成功，系统已经将激活链接发送到您的注册邮箱中，请查收邮件并激活您的账号');
	};
	/*
	#$_SESSION['user_id']=$user->id;
	#$_SESSION['name']=$user->name;
	$name = $user->name;
	$user_id = $user->id;
	$password = $user->password;
	$cache_name = sprintf('%06s',$user_id) .rand_str(24);
	$limit=3600*24;
	setcookie("name",$name,time()+$limit,'/');
	setcookie("cache_name",$cache_name,time()+$limit,'/');
	setcookie("password",$password,time()+$limit,'/');
	*/
	redirect('/');
?>
</html>