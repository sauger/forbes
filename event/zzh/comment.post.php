<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
if(!is_ajax()){
	redirect("/");
	die();
}

$db = get_db();
$id = intval($_POST['id']);
$comment = $_POST['comment'];
if(empty($comment)){
	die("留言内容不能为空");
}if(mb_strlen($comment,'utf-8')>500){
	die("留言内容不能超过500字");
}
$no_name = $_POST['no_name'];
$uid = front_user_id();
if(empty($uid)){
	die("请先登录");
}

$member = $db->query("select * from zzh_member where user_id=$uid");

$zzh_c = new table_class("zzh_comment");
$zzh_c->created_at = now();
$zzh_c->member_id = $member[0]->id;
$zzh_c->comment = $comment;
$zzh_c->investor_id = $id;
$zzh_c->nick_name = ($no_name=='true')?'匿名用户':$member[0]->name;
$zzh_c->save();
echo 'ok';
?>