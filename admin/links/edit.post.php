<?php
    include_once('../../frame.php');
    #var_dump($_POST);
   
    $link = new table_class('fb_links');
	$id = intval($_POST['id']);
    if($id!=''){
   		$link->find($id);
    }
	
	$link->update_attributes($_POST['post'],false);
	$link->update_file_attributes('post');
	$link->save();
	
	redirect('index.php');
?>