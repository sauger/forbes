<?php
	session_start();
    include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
</head>
<?php
	if(!is_post()){
		redirect('/error');
		die();
	}
	
	if($_POST['yzm']!=$_SESSION['user_info']){
		alert('验证码错误！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['xm'])>30){
		alert('姓名过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['xb'])>3){
		alert('性别过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['xl'])>40){
		alert('学历过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['hy'])>60){
		alert('行业过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['zw'])>70){
		alert('职位过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gzdw'])>90){
		alert('工作单位过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['szbm'])>60){
		alert('所在部门过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gsxz'])>40){
		alert('公司性质过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gsgm'])>20){
		alert('员工规模过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['sfss'])>2){
		alert('上市公司过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gscp'])>80){
		alert('制造的产品过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gsyye'])>45){
		alert('年营业额过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['grsr'])>45){
		alert('个人年收入过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['sf'])>20){
		alert('省份过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['cs'])>20){
		alert('城市过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['txdz'])>90){
		alert('通讯地址过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['yb'])>60){
		alert('邮编过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gddh1'])>4){
		alert('固定电话必须为数字！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gddh2'])>8){
		alert('固定电话必须为数字！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['gddh3'])>10){
		alert('固定电话必须为数字！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['sj'])>40){
		alert('手机过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['msn'])>40){
		alert('MSN过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	if(strlen($_POST['post']['qq'])>10){
		alert('QQ过长！请重新输入！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	
	
	$user_info = new table_class('fb_yh_xx');
	$db = get_db();
	$uid = front_user_id();
	$info = $db->query("select id from fb_yh_xx where yh_id={$uid}");
	if($db->record_count==1){
		$user_info->find($info[0]->id);
		$user_info->update_attributes($_POST['post'],false);
	}else{
		$user_info->update_attributes($_POST['post'],false);
		$user_info->yh_id = $uid;
	}
	
	if($_FILES['tx']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/user/";
		$img = $upload->handle('tx','filter_pic');
		if($img === false){
			alert('上传图片失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$user_info->tx = "/upload/user/" .$img;
	}
	
	$user_info->save();
	alert('修改成功！');
	redirect($_SERVER['HTTP_REFERER']);
?>