<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
	
	$id = intval($_POST['id']);
	$db = get_db();
	$db->execute("delete from fb_invest_items where id=$id");
	close_db();
?>