<?php
	session_start();
	@header('Content-type: text/html;charset=UTF-8');
	include_once('../../frame.php');
	
	if(!is_post()){
		redirect('/error/'); 
		die();
	}

	if($_SESSION['lcs']!=$_POST['session']||empty($_SESSION['lcs'])){
		redirect('/error/');
		die(); 
	}else{
		unset($_SESSION['lcs']);
	}
	
	foreach($_POST as $normal){
		if(is_array($normal)&&count($normal)==4){
			foreach($normal as $long){
				if(strlen($long)>600){
					redirect('/error/');
					die(); 
				}
			}
		}else if(is_array($normal)){
			foreach($normal as $short){
				if(strlen($short)>100){
					redirect('/error/');
					die(); 
				}
			}
		}else{
			if(strlen($normal)>100){
				redirect('/error/');
				die(); 
			}
		}
	}
	
	
	
	$lcs = new table_class('fb_lcs');
	
	$lcs->name = $_POST['name'];
	$lcs->sex = $_POST['sex'];
	$lcs->age = $_POST['age'];
	$lcs->email = $_POST['email'];
	$lcs->fix_phone = $_POST['fix_phone'];
	$lcs->phone = $_POST['phone'];
	$lcs->city = '已删除';
	$lcs->ccq = $_POST['ccq'];
	$lcs->education = $_POST['education'];
	$lcs->school = $_POST['school'];
	$lcs->specialty = $_POST['specialty'];
	$lcs->work_place = '已删除';
	$lcs->ssjg = '已删除';
	$lcs->work_space = $_POST['work_space1'].'&&'.$_POST['work_space2'];
	$lcs->work_year = $_POST['work_year'];
	$lcs->money_year = $_POST['money_year'];
	$lcs->role = $_POST['role'];
	$lcs->time_dealing = $_POST['time_dealing1'].'&&'.$_POST['time_dealing2'];
	$lcs->work_mode = $_POST['long']['work_mode'];
	$lcs->experience = $_POST['long']['experience'];
	$lcs->award = $_POST['long']['award'];
	$lcs->punish = $_POST['long']['punish'];

	$info_school = implode('+',$_POST['info_school']);
	$info_zy = implode('+',$_POST['info_zy']);
	$info_xw = implode('+',$_POST['info_xw']);
	$info_rq = implode('+',$_POST['info_rq']);
	$lcs->school_info = $info_school."&&".$info_zy."&&".$info_xw."&&".$info_rq;
	$certificate = implode('&&',$_POST['certificate']);
	$lcs->certificate = $certificate;
	$zm_name = implode('+',$_POST['zm_name']);
	$zm_zw = implode('+',$_POST['zm_zw']);
	$zm_phone = implode('+',$_POST['zm_phone']);
	$lcs->information_references = $zm_name."&&".$zm_zw."&&".$zm_phone;
	$lcs->money_time = implode('&&',$_POST['money_time']);
	
	$lcs->save();
	
	for($i=0;$i<3;$i++){
		$data = new table_class('fb_lcs_data');
		$data->lcs_id = $lcs->id;
		$data->year = 1998+$i;
		$data->khrs = '已删除';
		$data->nmzj = $_POST['nmzj'][$i];
		$data->npjzc = $_POST['npjzc'][$i];
		$data->nmzc = $_POST['nmzc'][$i];
		$data->nxc = $_POST['nxc'][$i];
		$data->qncp = $_POST['qncp'][$i];
		$data->qnbd = $_POST['qnbd'][$i];
		$data->dggm = $_POST['dggm'][$i];
		$data->pjgm = $_POST['pjgm'][$i];
		$data->nmgm = $_POST['nmgm'][$i];
		$data->save();
	}
	alert("报名成功");
	redirect('index.html');
?>