<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯中文网-用户激活</title>
	<?php
		include '../frame.php';
		use_jquery();
		$user = $_GET['user'];
		$key = $_GET['key'];
		$db = get_db();
		$db->query("select name,id from fb_yh where name='{$user}' and authenticate_string='{$key}'");
		
		if(!$db->move_first()){
			alert('对不起，您的验证码不正确，无法完成激活！');
			redirect('/');
			die();
		}else{
			$id = $db->field_by_name('id');
			$authenticated = $db->field_by_name('authenticated');
			if($authenticated==1){
				alert('您已经成功激活，请不要重复激活！');
				redirect('/login/');
				die();
			}
			$db->execute("update fb_yh set authenticated=1 where id={$id}");
			adjust_user_score($id,50,"用户激活");
			alert('恭喜您，激活成功，感谢您注册成为福布斯中文网会员！');
			redirect('/login/');
		}
	?>
</head>
<?php
