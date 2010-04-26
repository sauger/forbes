<?php
include "../../frame.php";
$gift = new table_class('fb_gift');
$id = intval($_POST['id']);
if($id){
	$gift->find($id);
}
$gift->update_attributes($_POST['gift'],false);
if($_POST['total_count'] != $gift->total_count){
	$gift->remain_count = intval($gift->remain_count) + intval($_POST['total_count']) - intval($gift->total_count);
	if($gift->remain_count < 0){
		$gift->remain_count = 0;
	} 
}
$gift->total_count = $_POST['total_count'];
$gift->update_file_attributes('gift');
$gift->save();
redirect('index.php');