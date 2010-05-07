<?php
session_start();

include("../frame.php");
if(!is_post()){
	redirect('/error/'); 
	die();
}

if($_SESSION['login']!=$_POST['session']){
		redirect('/error/'); 
		die();
	}else{
		unset($_SESSION['login']);
	}
	$name=$_POST['name'];
	$password=$_POST['password'];
	$suess_url =   $_POST['last_url'] ? $_POST['last_url'] :'/';
	$fail_url = $_POST['last_url'] ?"index.php?last_url=" .$_POST['last_url'] :"/login/";
	if(strlen($name)>20 || strlen($password)>20){
		$err = "用户名或密码错误";
		$last_url = $fail_url;
	}
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}' and authenticated=1";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		$user_id = $db->field_by_name('id');
		$cache_name = sprintf('%06s',$user_id) .rand_str(24);
		$db->execute("update fb_yh set cache_name='{$cache_name}' where id={$user_id}");
		if($_POST['time']!='')
		{
			$limit=time()+$_POST['time']*3600*24;
			if(empty($_POST['time'])){
				$limit = 0;
			}
			setcookie("name",$name,$limit,'/');
			setcookie("cache_name",$cache_name,0,'/');
			setcookie("password",$_POST['password'],$limit,'/');
			
		}else{
			setcookie("cache_name",$cache_name,0,'/');
			setcookie("login_name",$cache_name,time()+3600*24,'/');
		}
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$user_id},now())");
		$last_url = $suess_url;
	}
	else
	{
		$err = "用户名或密码错误";
		$last_url = $fail_url;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
	</head>
	<body>
	<?
	if($err){
		 	alert($err);
	 }
	 #echo $_COOKIE['cache_name'];
	 redirect($last_url);
	?>
	</body>
</html>
