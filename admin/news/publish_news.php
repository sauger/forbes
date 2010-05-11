<?php
	session_start();
	include_once('../../frame.php');
	if($_SERVER["REMOTE_ADDR"]!='127.0.0.1'){
		judge_role();
	}
	
	$db = get_db();
	$news = $db->query("select t2.id,t2.created_at,t2.content,t1.id as pid from fb_publish_schedule t1 join fb_news t2 on t1.resource_id=t2.id where t1.status=0 and t1.publish_date<=now()");
	$count = $db->record_count;
	
	$pid = array();
	$nid = array();
	$error_id = array();
	for($i=0;$i<$count;$i++){
		$result = static_news($news[$i],'page');
		if($result){
			array_push($pid,$news[$i]->pid);
			array_push($nid,$news[$i]->id);
		}else{
			array_push($error_id,$news[$i]->id);
		}
	}
	$pid = implode(',',$pid);
	$nid = implode(',',$nid);
	if($pid){
		$db->execute("delete from fb_publish_schedule where id in ($pid)");
		$db->execute("update fb_news set is_adopt=1 where id in ($nid)");
	}
	close_db();
?>