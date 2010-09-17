<?php
	include_once( dirname(__FILE__) .'/../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
	$yh_xx = $db->query("select id from fb_yh_xx where yh_id=$uid");
	$user = new table_class('fb_yh_xx');
	$user->find($yh_xx[0]->id);
	$user2 = new table_class('fb_yh');
	$user2->find($uid);
	if(isset($_COOKIE['name'])){
		$uname = $_COOKIE['name'];
	}else{
		$uname = $_COOKIE['login_name'];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min.js','user/user2');
		css_include_tag('complete_info','public','colorbox');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>
	<div id=bread>用户中心 > 修改登录密码</div>
	<div id=bread_line></div>
	<div id=register>
		<div id="info">
			<div id="content">
				<div id="content_left">
					<div class="context"><a href="user_favorites.php">我的收藏</a></div>
					<div class="context"><a href="user_order.php">订阅信息</a></div>
					<div class="context"><a href="user_info.php">个人信息</a></div>
					<div class="context select" style="margin-bottom:0px;"><a href="user_password.php">修改密码</a></div>
				</div>
				<div id="content_right">
					<div style="margin-top:40px;" class="p_list"><label for="old_pass">原密码</label><input id="old_pass"  maxlength=20 type="password"></div>
					<div class="p_list"><label for="new_pass">新密码</label><input id="new_pass" maxlength=20 type="password"></div>
					<div class="p_list"><label for="rnew_pass">确认新密码</label><input id="rnew_pass" maxlength=20 type="password"></div>
					<button class="user_b" id="pass_b" type="button">设定</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>