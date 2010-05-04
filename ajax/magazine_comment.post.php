<?php
include "../frame.php";
if(!is_ajax()){
	die();
}
parse_str($_SERVER['QUERY_STRING']);
//check_login
//echo "alert('{$co}');";
if(strlen($co) > 2000){
	?>
	alert('评论内容过长!');
<?php 
	die();
}
if(strlen($n) > 50){
	?>
	alert('用户名过长!');
<?php 
	die();
}
if(strlen($p) > 50){
	?>
	alert('密码过长!');
<?php
	die(); 
}
if(strlen($em) > 50){
	?>
	alert('email过长!');
<?php 
	die();
}
if(strlen($mo) > 50){
	?>
	alert('手机过长!');
<?php 
	die();
}
if($n && $p){
	$db = get_db();
	$password = md5($p);
	$db->query("select id,name from fb_yh where name='{$n}' and password='{$password}'");
	if($db->record_count <=0){ ?>
		alert('用户名或密码不正确!');
		$('#p').focus();
	<?php 	
		die();
	}
	$db->move_first();
	$user_id = $db->field_by_name('id');
	$name = $db->field_by_name('name');
}else if(!$_COOKIE['login_name']){ ?>
	alert('请先登录！');
<?php 
	die();	
}else{
	$db->query("select id,name from fb_yh where name = '{$_COOKIE['login_name']}'");
	if($db->record_count <= 0){?>
		alert('请先登录！');
	<?php 
		die();	
	}
	$db->move_first();
	$user_id = $db->field_by_name('id'); 
	$name = $db->field_by_name('name');
}
$comment = new table_class('fb_comment');
$comment->resource_type = "magazine";
$comment->comment = htmlspecialchars($co);
$comment->title = htmlspecialchars($t);
$comment->magzine_number = htmlspecialchars($o);
$comment->mobile = htmlspecialchars($mo);
$comment->email = htmlspecialchars($em);
$comment->created_at = now();
$comment->nick_name = $name;
$comment->ip = $_SERVER['REMOTE_ADDR'];
$comment->user_id = intval($user_id);
if($comment->save()){ ?>
	alert('评论成功，请等待管理员审核!');
	parent.$.fn.colorbox.close();
<?php }
