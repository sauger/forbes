<?php
   	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$id = $_POST['id'];
	$intestor = new table_class("fb_investor");
	if($id!=''){
		$intestor->find($id);
	}
	$intestor->update_file_attributes('post');
	$intestor->update_attributes($_POST['post'],false);
	if($_POST['post']['is_show']=='on'){
		$db = get_db();
		$db->execute("update fb_investor set is_show=0");
		$intestor->is_show = 1;
	}else{
		$intestor->is_show = 0;
	}
	$intestor->save();
	/*
	$db = get_db();
	$db->execute("update fb_invest_industry set investor_count=investor_count+1 where id in ({$_POST['industry_id']})");
	close_db();
	*/
	
	redirect('index.php');
?>