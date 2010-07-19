<?php
     include_once('../frame.php');
	 if(!is_ajax()){
	 	die();
	 }
	 if(strlen($_POST['o_p'])>20||strlen($_POST['o_p'])<4){
	 	alert('密码过长或过短！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	 }
	  if(strlen($_POST['n_p'])>20||strlen($_POST['n_p'])<4){
	 	alert('密码过长或过短！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	 }
     $uid = front_user_id();
	 $user = new table_class("fb_yh");
	 $user->find($uid);
	 if($user->password==md5($_POST['o_p'])){
	 	$user->password = md5($_POST['n_p']);
		$user->save();
		echo "ok";
	 }else{
	 	echo "wrong";
	 }
?>