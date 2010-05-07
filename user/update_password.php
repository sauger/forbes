<?php
     include_once('../frame.php');
	 if(!is_ajax()){
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