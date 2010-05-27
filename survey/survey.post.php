<?php
	session_start();
    include_once('../frame.php');
	
	$id = intval($_POST['vote_id']);
	if($_SESSION['survey'.$id]!=$_POST['verify']||$_SESSION['survey'.$id]==''){
		die("非法访问");
	}
	if(!is_post()){
		die("非法访问");
	}
	
	#var_dump($_POST);
	#die();
	$record = new table_class("fb_survey_record");
	if(isset($_SESSION['user_id'])){
		$record->source = $_SESSION['user_id'];
	}else{
		$record->source = $_SERVER['REMOTE_ADDR'];
	}
	$record->vote_id = intval($_POST['vote_id']);
	$record->created_at = now();
	$record->save();
	
	$count = count($_POST['record_id']);
	
	$record2 = new table_class("fb_survey_record2");
	
	foreach($_POST['record_id'] as $k){
		if(isset($_POST[$k])){
			foreach($_POST[$k] as $v){
				$record2->id=0;
				$record2->record_id = $record->id;
				$record2->vote_id = $k;
				$record2->item_id = $v;
				$record2->save();
			}
		}
	}
	
	alert("感谢您的参与!");
	redirect("/survey/");
?>