<?php
	session_start();
    include_once('../frame.php');
	
	$id = intval($_POST['vote_id']);
	if($_SESSION['survey'.$id]!=$_POST['verify']||$_SESSION['survey'.$id]==''){
		redirect('/error/');
		die();
	}
	if(!is_post()){
		redirect('/error/');
		die();
	}
	foreach($_POST['record_id'] as $k){
		if(!is_numeric($k)){
			redirect('/error/');
			die();
		}else{
			foreach($_POST[$k] as $v){
				if(!is_numeric($v)){
					redirect('/error/');
					die();
				}
			}
		}
	}
	#var_dump($_SERVER['REMOTE_ADDR']);
	#die();
	$vote = new table_class('fb_vote');
	$vote->find($id);
	if($vote->limit_type=='user_id'){
		require_login();
		$source = $_COOKIE['name'];
	}else{
		$source = $_SERVER['REMOTE_ADDR'];
	}
	if($vote->max_vote_count){
		$limit = $vote->max_vote_count;
		$db = get_db();
		$has = $db->query("select count(id) as num from fb_survey_record where vote_id=$id and source='$source'");
		close_db();
		if($has[0]->num>=$limit){
			alert('您已经做过该调查表了，请不要重复提交！');
			redirect('/survey/');
			die();
		}
	}
	$record = new table_class("fb_survey_record");
	$record->source = $source;
	$record->vote_id = $id;
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