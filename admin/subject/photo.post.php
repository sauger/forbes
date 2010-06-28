<?php 
	include "../../frame.php";
	$id = $_POST['id'];
	$item_id = $_POST['item_id'];
	$subject_item = new table_class('smg_subject_items');
	$photo = new table_class('smg_images');
	if($id){
		$photo = $photo->find($id);
		$subject_item = $subject_item->find($item_id);		
	}
	$photo->update_attributes($_POST['photo'],false);
	$subject_item->update_attributes($_POST['item'],false);
	$upload = new upload_file_class();
	if($_FILES['image']['name']!=null){
		
		$upload->save_dir = "/upload/images/";
		$img = $upload->handle('image','filter_pic');
		if($img === false){
			alert('上传图片失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$photo->src = "/upload/images/" .$img;
	}	
	if(!$id){
		$photo->id = 0;
		$subject_item->id = 0 ;
		$photo->created_at = now();
		$photo->is_adopt = true;
		$photo->publisher = $_COOKIE['smg_user_nickname'];			
	}
	$photo->save();	
	$subject_item->resource_id = $photo->id;
	$subject_item->save();
	redirect("subject_content.php?subject_id={$subject_item->subject_id}&content_type=photo&category_id={$subject_item->category_id}");
?>