<?php
	@header('Content-type: text/html;charset=UTF-8');
	session_start();
	include_once('../frame.php');
	if(!is_post())
	{
		redirect('/error/');
	}
	if($_POST['rvcode'] != $_SESSION['sub_pic'] || trim($_SESSION['sub_pic'])==""){
		alert('验证码错误!');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['ReaderNo']) > 50){
		alert('请正确输入您的读者编号！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['BirthPlace']) > 60 || trim($_POST['sub']['BirthPlace'])==""){
		alert('请正确输入您的出生地过长！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['RealName']) > 20 || trim($_POST['sub']['RealName'])==""){
		alert('请正确输入您的姓名过长！请重新输入！');
		redirect('subscription.php');
		die();
	}
	if(($_POST['sub']['ApplyType']!= "0" && $_POST['sub']['ApplyType']!= "1") || trim($_POST['sub']['ApplyType'])==""){
		alert('请正确选择赠阅方式！');
		redirect('subscription.php');
		die();
	}
	if(($_POST['sub']['Sex'] != '男' && $_POST['sub']['Sex']!= '女') || trim($_POST['sub']['Sex'])==""){
		alert('请正确选择性别！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Company']) > 60 || trim($_POST['sub']['Company'])==""){
		alert('请正确输入您的公司名！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Department']) > 60 || trim($_POST['sub']['Department'])==""){
		alert('请正确输入您的部门名！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Position2']) > 60 || trim($_POST['sub']['Position2'])==""){
		alert('请正确输入您的职位！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Province']) > 6 || trim($_POST['sub']['Province'])==""){
		alert('请正确选择省/直辖市！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['zipcode']) > 6  || trim($_POST['sub']['zipcode'])==""){
		alert('请正确输入您的邮编过长！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['CompanyAddress']) > 120  || trim($_POST['sub']['CompanyAddress'])==""){
		alert('请正确输入您的单位地址！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Tel']) > 14 || trim($_POST['sub']['Tel'])==""){
		alert('请正确输入您的手机号！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Fax']) > 13 || trim($_POST['sub']['Fax'])==""){
		alert('请正确输入您的传真号！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Email']) > 40 || trim($_POST['sub']['Email'])==""){
		alert('请正确输入您的电子邮件！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Degree']) > 30 || trim($_POST['sub']['Degree'])==""){
		alert('请正确选择您的学历！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Position']) > 70 || trim($_POST['sub']['Position'])==""){
		alert('请正确选择您的职位！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Industry']) > 70 || trim($_POST['sub']['Industry'])==""){
		alert('请正确选择您的行业类型！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Employeeamount']) > 20 || trim($_POST['sub']['Employeeamount'])==""){
		alert('请正确选择您的员工人数！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['CompanyType']) > 30 || trim($_POST['sub']['CompanyType'])==""){
		alert('请正确选择您的公司类型！');
		redirect('subscription.php');
		die();
	}
	if(($_POST['sub']['StockCompany'] != 1 && $_POST['sub']['StockCompany'] != 0) || trim($_POST['sub']['StockCompany'])==""){
		alert('请正确选择您的公司是否是上市公司！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Product']) > 70 || trim($_POST['sub']['Product'])==""){
		alert('请正确选择您的公司所制造的产品！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['turnover']) > 30){
		alert('请正确选择您的公司年营业额！');
		redirect('subscription.php');
		die();
	}
	if(strlen($_POST['sub']['Earning']) > 30){
		alert('请正确选择您的年收入！');
		redirect('subscription.php');
		die();
	}
	$subscript=new table_class('fb_subscription');
	$subscript->update_attributes($_POST['sub'],false);
	$subscript->stime=date('Y-m-d H:m:s');
	if($subscript->save()){
		alert('申请成功');
		$content = "感谢您订阅福布斯杂志。";
		send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$_POST['sub']['Email'],'福布斯中文网',$content);
	};
	
	//redirect('/magazine/subscription.php');
?>
