<?php
include_once dirname(__FILE__) ."/../../frame.php"; 


$values = array();
$count = count($_POST);
foreach($_POST as $k => $v){
	if($v>$count||$v<1){
		echo 'wrong';
		die();
	}
	array_push($values,$v);
}
if(array_unique($values)!=$values){
	echo 'wrong';
}else{
	$db = get_db();
	if($count==5){
		foreach($_POST as $k => $v){
			if(substr($k,9)!=($v-1)){
				$h = substr($k,0,9).($v-1).'*';
				$db->execute("update fb_page_pos set name='{$h}' where name='{$k}'");
				$r = substr($k,0,8).($v-1);
				$or = substr($k,0,8).substr($k,9,1);
				$db->execute("update fb_page_pos set name='{$r}_r0*' where name='{$or}_r0'");
				$db->execute("update fb_page_pos set name='{$r}_r1*' where name='{$or}_r1'");
			}
		}
		foreach($_POST as $k => $v){
			if(substr($k,9)!=($v-1)){
				$h = substr($k,0,9).($v-1).'*';
				$db->execute("update fb_page_pos set name=substring(name,1,10) where name='{$h}'");
				$r = substr($k,0,8).($v-1);
				$db->execute("update fb_page_pos set name=substring(name,1,12) where name='{$r}_r0*'");
				$db->execute("update fb_page_pos set name=substring(name,1,12) where name='{$r}_r1*'");
			}
		}
	}else{
		foreach($_POST as $k => $v){
			if(substr($k,16)!=($v)){
				$h = substr($k,0,16).($v).'*';
				$db->execute("update fb_page_pos set name='{$h}' where name='{$k}'");
			}
		}
		foreach($_POST as $k => $v){
			if(substr($k,16)!=($v)){
				$h = substr($k,0,16).($v).'*';
				$db->execute("update fb_page_pos set name=substring(name,1,17) where name='{$h}'");
			}
		}
	}
	close_db();
}

