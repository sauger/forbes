<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
   
    $activity = new table_class("zzh_activity");
	$id = intval($_POST['id']);
    if($id!=''){
   		$activity->find($id);
    }else{
    	$activity->created_at = now();
    }
	
	$activity->update_attributes($_POST['post'],false);
	$activity->update_file_attributes('post');
	if($_POST['is_old']=='on'){
		$activity->is_old = 1;
	}else{
		$activity->is_old = 0;
	}
	$activity->save();
	
	redirect('activity.php');
?>