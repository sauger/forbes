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