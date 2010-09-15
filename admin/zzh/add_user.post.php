<?php 
 	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$zid = intval($_POST['zid']);
	$uid = intval($_POST['uid']);
	
	$member = new table_class("zzh_member");
	$member->find($zid);
	$member->user_id = $uid;
	$member->save();
?>