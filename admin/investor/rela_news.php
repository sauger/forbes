<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
	
	$rela = new table_class('fb_investor_news');
	if($_POST['type']=='publish'){
		$rela->investor_id = $_POST['investor_id'];
		$rela->news_id = $_POST['news_id'];
		$rela->save();
	}else{
		$rela->delete($_POST['id']);
	}
	
?>