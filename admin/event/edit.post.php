<?php
    include_once('../../frame.php');
    #var_dump($_POST);
   
    $activity = new table_class("fb_event");
	$id = intval($_POST['id']);
    if($id!=''){
   		$activity->find($id);
    }
	
	$activity->update_attributes($_POST['post'],false);
	$activity->update_file_attributes('post');
	if($_POST['post']['priority']=="")
	{
		$activity->priority=100;
	}
	$activity->save();
	
	redirect('index.php');
?>