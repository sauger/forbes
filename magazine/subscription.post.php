<?php
	session_start();
	include_once('../frame.php');
	$subscript=new table_class('fb_subscription');
	$subscript->update_attributes($_POST['sub'],false);
	$subscript->stime=date('Y-m-d H:m:s');
	if($subscript->save()){
		$content = "感谢您订阅福布斯杂志。";
		send_mail('smtp.163.com','sauger','auden6666','sauger@163.com',$_POST['sub']['Email'],'福布斯中文网',$content);
		alert('申请成功！');
	};
	redirect('/magazine/subscription.php');
?>