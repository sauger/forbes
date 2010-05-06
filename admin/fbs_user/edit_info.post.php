<?php 
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	
	$yh_id = intval($_POST['id']);
	
	$db = get_db();
	$info = $db->query("select id from fb_yh_xx where yh_id=$yh_id");
	if($db->record_count==1){
		$id = $info[0]->id;
	}else{
		$id = 0;
	}
	
	$info = new table_class('fb_yh_xx');
	if($id!=0){
		$info->find($id);
	}
	$info->update_attributes($_POST['info'],false);
	if($_FILES['tx']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/user/";
		$img = $upload->handle('tx','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$info->tx = "/upload/user/{$img}";
	}
	$info->yh_id = $yh_id;
	$info->save();
	redirect('index.php');
?>