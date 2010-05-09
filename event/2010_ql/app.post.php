<?php 
	require "frame.php";
	alert('活动已结束，感谢参与!');
	/*$news = new table_class('subject_application2');
	$news->update_attributes($_POST['app'],false);
	$news->created_at = date("Y-m-d H:i:s");
	$news->save();
	alert('success!');*/
	redirect('index.html');
?>