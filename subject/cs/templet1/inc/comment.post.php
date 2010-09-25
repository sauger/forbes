<?php
	require_once('../../../frame.php');
	$comment = new table_class('fb_comment');
	$comment ->update_attributes($_POST['post'],false);
	$comment->created_at = date("Y-m-d H-i-s");
	if($comment->nick_name==''){
		$comment->nick_name = '匿名用户';
	}
	$comment->ip=$_SERVER['REMOTE_ADDR'];
	$comment->save();
	$item = new table_class('fb_subject_items');
	$item->subject_id = $_POST['subject_id'];
	$item->category_type = 'commet';
	$item->resource_id = $comment->id;
	$item->save();
	redirect($_SERVER['HTTP_REFERER']);
?>