<?php 
	require "frame.php";
	$news = new table_class('subject_application2');
	$news->update_attributes($_POST['app'],false);
	$news->created_at = date("Y-m-d H:i:s");
	$news->save();
	alert('success!');
	redirect('application.php');
?>