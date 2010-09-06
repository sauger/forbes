<?php 
	session_start();
	include_once( dirname(__FILE__) .'/../../frame.php');
	
	#var_dump($_POST);
	if(!is_post()){
		redirect('/error/'); 
		die();
	}
	if($_SESSION['zzh']!=$_POST['session']||empty($_SESSION['zzh'])){
		echo $_SESSION['zzh'];echo $_POST['session'];
		redirect('/error/');
		die(); 
	}else{
		unset($_SESSION['zzh']);
	}
	$user = new table_class("zzh_member");
	
	foreach($_POST['post'] as $v){
		if(empty($v)){
			redirect('/error/'); 
			die();
		}else{
			if(strlen($v)>90){
				redirect('/error/'); 
				die();
			}
		}
	}
	
	$user->update_attributes($_POST['post'],false);
	$user->created_at = now();
	$user->email = $_POST['email'];
	$user->save();
	alert('提交成功');
	redirect('on-line.php');
?>