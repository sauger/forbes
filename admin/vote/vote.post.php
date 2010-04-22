<?php
	require_once "../../frame.php";
	if("del"==$_POST['post_type'])
	{
		$post = new table_class($_POST['db_table']);
		$post -> delete($_POST['del_id']);
		$db = get_db();
		$sql = 'delete from smg_vote_item where vote_id='.$_POST['del_id'];
		$db->execute($sql);
		echo $_POST['del_id'];
	}else{
		$vote = new table_class('fb_vote');
		if($_POST['type']=='edit'){
			$vote->find($_POST['vote_id']);
		}
		if($_FILES['image']['name']!=null){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('image','filter_pic');
			if($img === false){
					alert('上传文件失败 !');				
					redirect($_SERVER['HTTP_REFERER']);
					die();
			}
			$vote->photo_url = "/upload/images/" .$img;
		}//如果投票上传图片，做处理
		
		$vote->update_attributes($_POST['vote'],false);
		if($_POST['started_at']){
			$vote->started_at = $_POST['started_at'];
		}else{
			$vote->started_at = null;
		}
		if($_POST['ended_at']){
			$vote->ended_at = $_POST['ended_at'];
		}else{
			$vote->ended_at = null;
		}
		$vote->created_at = now();
		$vote->save();
		
		
		$count = count($_POST['vote_item']['title']);
		$old_count = count($_POST['old_item']['title']);
		$vote_count = count($_POST['vote_vote']['title']);
		$old_vote_count = count($_POST['old_vote_vote']['title']);
		
		$item = new table_class("fb_vote_item");
		if($_POST['vote']['vote_type']=='image_vote'){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('vote_item','filter_pic');
			$old_img = $upload->handle('old_item','filter_pic');
		}
		for($i=0;$i<$count;$i++){
			$item->id=0;
			$item->vote_id = $vote->id;
			if($_POST['vote']['vote_type']=='image_vote'){
				if($img[$i]['result']){
					$item->photo_url = "/upload/images/" .$img[$i]['name'];
				}else{
					$item->photo_url = "";
				}//投票项目图片处理
			}
			if($_POST['vote_item']['title'][$i]!=''){
				$item->title = $_POST['vote_item']['title'][$i];
				$item -> save();
			}
		}
		for($i=0;$i<$vote_count;$i++){
			$item->id=0;
			$item->vote_id = $vote->id;
			$item->title = $_POST['vote_vote']['title'][$i];
			$item->sub_vote_id = $_POST['vote_vote']['id'][$i];
			$item->save();
		}
		redirect('index.php');
	}
?>