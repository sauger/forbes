<?php
include "../frame.php";
if(!is_ajax()){
	die('here');
}
if(empty($_COOKIE['cache_name'])) die('alert("登陆后才能收藏专栏，请先登录");');
$db = get_db();
$column_id = $_GET['column_id'];
if(is_numeric($column_id)=== false) die();
$user_id = front_user_id();
if(empty($user_id))die('alert("登陆后才能收藏专栏，请先登录");');
$db->query("select id from fb_collection where resource_type='column' and resource_id={$column_id} and user_id={$user_id}");
if($db->record_count > 0){
	die("alert('您已收藏过该专栏，请不要重复收藏');");
}
if($db->execute("insert into fb_collection (resource_type,resource_id,user_id,created_at) values('column',{$column_id},{$user_id},now())")){
	echo "alert('收藏专栏成功')";	
}else{
	echo "alert('系统繁忙，请稍候再试')";
}
