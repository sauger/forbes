<?php 
	include "../../frame.php";
	$news  = new table_class('fb_news');
	if($_POST['id']){
		//edit
		$news = $news->find($_POST['id']);
		$news->update_attributes($_POST['news'],false);
		$news->last_edited_at = now();
		if($_FILES['video_src']['name'] != ''){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/video/';
			$upload_name = $upload->handle('video_src','filter_video');
			$news->video_src = '/upload/video/' .$upload_name;
			$news->video_photo_src = '/upload/video/' .$upload->handle('video_pic','filter_pic');
			$news->video_flag = 1;		
		}
		if($_FILES['file_name']['name'] != ''){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/file/';
			$upload_name = $upload->handle('file_name');
			$news->file_name = '/upload/file/' .$upload_name;	
		}
		$pos = strpos(strtolower($news->content), '<img ');
		if($pos !== false){
			$pos_end = strpos(strtolower($news->content), '>',$pos);
			$imgstr = substr($news->content, $pos,$pos_end -$pos +1);
			#alert($pos_end .';'.$imgstr);
			$imgstr = str_replace('\"', '"', $imgstr);
			$pos = strpos($imgstr, 'src="');
			$pos_end = strpos($imgstr, '"',$pos + 5);
			$src = substr($imgstr, $pos+5,$pos_end - $pos - 5);
			$news->photo_src = $src;
			$news->is_photo_news = 1;
		}else{
			$news->is_photo_news = 0;
			$news->photo_src = "";
		}
		$news->save();
		$item = new table_class('fb_subject_items');
		$item = $item->find($_POST['item_id']);
		$item->category_id = $_POST['category_id'];
		$item->priority = $_POST['priority'];
		$item->save();
	}else{
		//create
		$news->category_id = 0;
		$news->update_attributes($_POST['news'],false);
		$news->category_id = 0;
		$news->dept_category_id = 0;
		$news->created_at = now();
		$news->is_adopt = 1;
		$news->last_edited_at = now();
		if($_FILES['video_src']['name'] != ''){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/video/';
			$upload_name = $upload->handle('video_src','filter_video');
			$news->video_src = '/upload/video/' .$upload_name;
			$news->video_photo_src = '/upload/video/' .$upload->handle('video_pic','filter_pic');
			$news->video_flag = 1;		
		}
		
		if($_FILES['file_name']['name'] != ''){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/file/';
			$upload_name = $upload->handle('file_name');
			$news->file_name = '/upload/file/' .$upload_name;	
		}
		$pos = strpos(strtolower($news->content), '<img ');
		if($pos !== false){
			$pos_end = strpos(strtolower($news->content), '>',$pos);
			$imgstr = substr($news->content, $pos,$pos_end -$pos +1);
			#alert($pos_end .';'.$imgstr);
			$imgstr = str_replace('\"', '"', $imgstr);
			$pos = strpos($imgstr, 'src="');
			$pos_end = strpos($imgstr, '"',$pos + 5);
			$src = substr($imgstr, $pos+5,$pos_end - $pos - 5);
			$news->photo_src = $src;
			$news->is_photo_news = 1;
		}else{
			$news->is_photo_news = 0;
			$news->photo_src = "";
		}
		$news->save();
		$item = new table_class('fb_subject_items');
		$item->subject_id = $_POST['subject_id'];
		$item->category_id = $_POST['category_id'];
		$item->category_type='news';
		$item->resource_id = $news->id;
		$item->priority = $_POST['priority'];
		$item->save();
	}
	#var_dump($_FILES);
	redirect("subject_content.php?subject_id={$_POST['subject_id']}&content_type=news&category_id={$item->category_id}");
?>