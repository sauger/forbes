<?php
    session_start();
	require_once('../../frame.php');
	judge_role();
    #var_dump($_POST);
   
    $seo = new table_class("fb_seo");
	$id = intval($_POST['id']);
    if($id!=''){
   		$seo->find($id);
    }
	
	$seo->update_attributes($_POST['seo'],false);
	$seo->save();
	
	redirect('index.php');
?>