<?php
	include '../frame.php';
	$user = $_GET['user'];
	$key = $_GET['key'];
	$db = get_db();
	$db->query("select name,id,password,authenticated from fb_yh where name='{$user}' and authenticate_string='{$key}'");
	
	if(!$db->move_first()){
		$str = '对不起，您的验证码不正确，无法完成激活！';
	}else{
		$name = $db->field_by_name('name');
		$user_id = $db->field_by_name('id');
		$password = $db->field_by_name('password');
		$authenticated = $db->field_by_name('authenticated');
		if($authenticated==1){
			$db->execute("update fb_yh set authenticated=1 where id={$user_id}");
			adjust_user_score($user_id,50,"用户激活");
		}
		$str = '恭喜您，激活成功，感谢您注册成为福布斯中文网会员！';
		$cache_name = sprintf('%06s',$user_id) .rand_str(24);
		setcookie("name",$name,0,'/');
		setcookie("cache_name",$cache_name,0,'/');
		setcookie("password",$password,0,'/');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯中文网-用户激活</title>
</head>
<?php
alert($str);
redirect('/');
?>
