<?php 
include('../frame.php');
$db=get_db();
$StrSql='select * from subject_user where loginname="'.$_POST['login_text'].'" and password="'.$_POST['password_text'].'"'; 
$record=$db -> query($StrSql);
if(count($record)==1)
{
	session_start(); 
	$_SESSION["fbsadmin"] = $_POST['login_text'];
	redirect('admin.php');
}
else
{
	alert('用户名密码错误！');
	redirect('index.php');
}

?>
