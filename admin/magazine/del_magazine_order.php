<?php
	session_start();
  	include_once('../../frame.php');
	judge_role();
	
	$id = $_POST['del_id'];
	$db = get_db();
	$db->execute('delete from fb_subscription where sid='.$id);
