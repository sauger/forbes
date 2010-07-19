<?php
	include_once('../frame.php');
	
	$db = get_db();
	
	if($_POST['type']=='comment'){
		if(is_numeric($_POST['news_id'])===false) die();
		$comment = new table_class('fb_comment');
		$comment->resource_type = "news";
		$comment->resource_id = intval($_POST['news_id']);
		$comment->comment = htmlspecialchars($_POST['content']);
		$comment->created_at = now();
		$comment->nick_name = $_POST['nick_name'];
		$comment->ip = $_SERVER['REMOTE_ADDR'];
		if(!empty($_COOKIE['cache_name'])){
			$comment->user_id = intval(front_user_id());
		}
		$comment->save();
		echo $comment->id;
	}else if($_POST['type']=='up'){
		if(is_numeric($_POST['id'])===false) die();
		$db->execute("insert into fb_comment_dig (comment_id,up) values ({$_POST['id']},1) ON DUPLICATE KEY update up=up+1");
	}else if($_POST['type']=='down'){
		if(is_numeric($_POST['id'])===false) die();
		$db->execute("insert into fb_comment_dig (comment_id,down) values ({$_POST['id']},1) ON DUPLICATE KEY update down=down+1");
	}	
?>
