<?php
   	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	$db = get_db();
	$id = intval($_POST['id']);
	if($id){
		$db->execute("delete from fb_yh_xx where yh_id=$id");
		$db->execute("delete from fb_yh_dy where yh_id=$id");
		$db->execute("delete from fb_yh_log where yh_id=$id");
		$db->execute("delete from fb_yh where id=$id");
	}
?>