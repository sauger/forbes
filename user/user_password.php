<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
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
	<title>用户中心_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('user/user','public','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_top();?>
			 <div id=bread>用户中心 > 修改登录密码</div>
	 	 <div id=bread_line></div>
		<div id=left>
			<div id=left_top>
				用户中心
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c3a.gif">
					<img style="display:none" src="/images/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c2a.gif">
					<img style="display:none" src="/images/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c1a.gif">
					<img style="display:none" src="/images/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人信息</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/user/c4a.gif">
					<img style="display:inline" src="/images/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改密码</a></div>
				<div class="icon2" style="display:inline"><img src="/images/user/coin.gif"></div>
				
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<div id="r_title1"><?php echo $uname;?> 的个人中心</div>
				<?php $score = $db->query("select score from fb_yh where id=$uid");?>
				<div id="r_title2">个人积分：<?php echo $score[0]->score;?></div>
			</div>
			<div class="right_text2">
				<div style="margin-top:40px;" class="p_list"><label for="old_pass">原密码</label><input id="old_pass"  maxlength=20 type="password"></div>
				<div class="p_list"><label for="new_pass">新密码</label><input id="new_pass" maxlength=20 type="password"></div>
				<div class="p_list"><label for="rnew_pass">确认新密码</label><input id="rnew_pass" maxlength=20 type="password"></div>
				<button class="user_b" id="pass_b" type="button">设定</button>
			</div>
		</div>
		<?php include_bottom();?>
	</div>
</body>