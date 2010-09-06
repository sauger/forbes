<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
   
    $partner = new table_class("zzh_partner");
	$id = intval($_POST['id']);
    if($id!=''){
   		$partner->find($id);
    }else{
    	$partner->created_at = now();
    }
	
	$partner->update_attributes($_POST['post'],false);
	$partner->update_file_attributes('post');
	$partner->save();
	
	redirect('partner.php');
?>