<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
   
    $activity = new table_class("zzh_activity");
	$id = intval($_POST['id']);
    if($id!=''){
   		$activity->find($id);
    }
	
	$activity->update_attributes($_POST['post'],false);
	$activity->update_file_attributes('post');
	$activity->save();
	
	redirect('activity.php');
?>