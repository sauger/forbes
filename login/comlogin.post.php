<?php
session_start();
if($_SESSION['login']!=$_POST['session']){
		die();
	}
	$name=$_POST['name'];
	$password=$_POST['password'];
	include("../frame.php");
	$suess_url =   $_POST['last_url'] ? $_POST['last_url'] :'/user/user_info.php';
	$fail_url = $_POST['last_url'] ?"index.php?last_url=" .$_POST['last_url'] :"index.php";
	if(strlen($name)>20 || strlen($password)>20){
		$err = "用户名或密码错误";
		$last_url = $fail_url;
	}
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}'";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		if($_POST['time']!='')
		{
			$limit=$_POST['time']*3600*24;
			setcookie("name",$name,time()+$limit,'/');
			setcookie("login_name",$name,time()+$limit,'/');
			setcookie("password",$_POST['password'],time()+$limit,'/');
		}
		$_SESSION['user_id']=$record[0]->id;
		$_SESSION['name']=$name;
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$_SESSION['user_id']},now())");
		$last_url = $suess_url;
	}
	else
	{
		$err = "用户名或密码错误";
		$last_url = $fail_url;
	}
	
	if($err){
		 	alert($err);
	 }
	 redirect($last_url);
?>