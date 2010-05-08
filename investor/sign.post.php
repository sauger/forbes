<?php
	session_start();
   	include_once('../frame.php');
	
	#var_dump($_POST);
	if(!is_post()){
		redirect('/error/');
		die("非法访问!");
	}
	if($_SESSION['sign']!=$_POST['session']||$_SESSION['sign']==''){
		redirect('/error/');
		die("非法访问!");
	}else{
		unset($_SESSION['sign']);
	}
	
	$sign = new table_class("fb_investor_sign");
	$sign->update_file_attributes('post');
	$sign->update_attributes($_POST['post'],false);
	$sign->phone = $_POST['phone1'].'-'.$_POST['phone2'].'-'.$_POST['phone3'];
	$sign->save();
	
	$income = new table_class("fb_investor_sign_income");
	if($_POST['income1']!=''){
		$income1 = explode('|', $_POST["income1"]);
		foreach($income1 as $v){
			$param = explode(',', $v);
			$income->id=0;
			$income->sign_id = $sign->id;
			$income->year = $param[0];
			$income->income = $param[1];
			$income->type = '1';
			$income->save();
		}
	}
	if($_POST['income1']!=''){
		$income2 = explode('|', $_POST["income2"]);
		foreach($income2 as $v){
			$param = explode(',', $v);
			$income->id=0;
			$income->sign_id = $sign->id;
			$income->year = $param[0];
			$income->income = $param[1];
			$income->type = '2';
			$income->save();
		}
	}
	alert("提交成功!");
	redirect('/investor/sign.php');
?>