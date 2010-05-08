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
	if(strlen($_POST['post']['item_name'])>90){
		alert("项目名称过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['industry'])>20){
		alert("所属行业过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['item_type'])>2){
		alert("希望的投资类型过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['item_money'])>60){
		alert("融资金额过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['item_description'])>6000){
		alert("项目简介过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['item_url'])>150){
		alert("项目网址过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['company_name'])>60){
		alert("公司名称过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['company_size'])>90){
		alert("公司规模过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['income1'])>300){
		alert("公司历史收入过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['income2'])>300){
		alert("公司预期收入入过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['company_created'])>60){
		alert("公司成立时间过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['company_location'])>150){
		alert("公司总部所在地过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['zip'])>20){
		alert("邮编过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['capital'])>10){
		alert("公司注册资金单位过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['name'])>60){
		alert("联系人姓名过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['mobile'])>20){
		alert("联系人手机过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['phone1'])>4){
		alert("固定电话过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['phone2'])>8){
		alert("固定电话过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['phone3'])>10){
		alert("固定电话过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['email'])>40){
		alert("联系人邮件过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['qq'])>10){
		alert("联系人QQ过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['post'])>60){
		alert("联系人职位信息过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['msn'])>40){
		alert("联系人MSN过长！请重新输入！");
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	$filter = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document','');
	
	
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