<?php 
	include "../../frame.php";
	$id = $_POST['id'];
	$item_id = $_POST['item_id'];
	$subject_item = new table_class('smg_subject_items');
	$video = new table_class('smg_video');
	if($id){
		$video = $video->find($id);
		$subject_item = $subject_item->find($item_id);		
	}
	$video->update_attributes($_POST['video'],false);
	$subject_item->update_attributes($_POST['item'],false);
	$upload = new upload_file_class();
	if($_FILES['image']['name']!=null){
		
		$upload->save_dir = "/upload/images/";
		$img = $upload->handle('image','filter_pic');
		if($img === false){
			alert('上传图片失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$video->photo_url = "/upload/images/" .$img;
	}
	if($_FILES['video']['name']!=null){
		$upload->save_dir = "/upload/video/";
		$vid = $upload->handle('video','filter_video');
		if($vid === false){
			alert('上传视频失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$video->video_url = "/upload/video/" .$vid;
	}
	if(!$id){
		$video->id = 0;
		$subject_item->id = 0 ;
		$video->created_at = now();
		$video->is_adopt = true;
		$video->publisher = $_COOKIE['smg_user_nickname'];			
	}
	$video->save();	
	$subject_item->resource_id = $video->id;
	$subject_item->save();
	redirect("subject_content.php?subject_id={$subject_item->subject_id}&content_type=video&category_id={$subject_item->category_id}");
?>