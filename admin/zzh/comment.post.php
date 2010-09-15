<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
   
    $comment = new table_class("zzh_comment");
	$id = intval($_POST['id']);
	$comment->find($id);
    if($comment->reply_time==''){
   		$comment->reply_time = now();
    }
	$comment->reply = $_POST['reply'];
    
	$comment->save();
	
	redirect('comment.php');
?>