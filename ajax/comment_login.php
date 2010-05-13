<?php
	$name=$_POST['user_name'];
	$password=$_POST['password'];
	include("../frame.php");
	$suess_url =   $_POST['last_url'] ? $_POST['last_url'] :'/user/';
	$fail_url = $_POST['last_url'] ?"index.php?last_url=" .$_POST['last_url'] :"index.php";
	if(strlen($name)>20 || strlen($password)>20){
		die("alert('用户名或密码错误');");
	}
	$cache_name = front_login($name,$password);
	if($cache_name ===false){
		echo "alert('用户名或密码错误');";
	}else{
		echo '$.cookie("cache_name","' .$cache_name .'",{path:"/"});';
		echo "refresh_login_box();";
	}
?>