<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
   
	$desc = $_POST['description'];
	$db = get_db();
	$db->execute("update fb_page_pos set description='{$desc}' where name='register'");
	
	redirect('index.php');
?>