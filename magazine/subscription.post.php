<?php
	session_start();
	include_once('../frame.php');
	$subscript=new table_class('fb_subscription');
	$subscript->update_attributes($_POST['sub'],false);
	$subscript->stime=date('Y-m-d H:m:s');
	$subscript->save();
	alert('申请成功！');
	redirect('/magazine/subscription.php');
?>