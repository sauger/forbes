<?php
	session_start();
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min.js');
		css_include_tag('complete_info','public','colorbox');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>

	<div id=register>
		<div class="title">
			<div class="title_left">新用户注册</div>
			<div class="title_right">
				<div class="content">注册流程</div>
				<div class="content">Step1: 填写个人基本信息</div>
				<div class="arrow"></div>
				<div class="content">Step2: 接收验证mail</div>
				<div class="arrow"></div>
				<div class="content select">Step3: 完善个人资料</div>
				<div class="arrow select"></div>
				<div class="content">注册成功</div>
			</div>
		</div>
		<div id="info">
			<div id="content">
				<div id="content_left">
					<div class="context">我的收藏</div>
					<div class="context">订阅信息</div>
					<div class="context select">个人信息</div>
					<div class="context" style="margin-bottom:0px;">修改密码</div>
				</div>
				<div id="content_right">
					<span>您已成功注册会员，现在完善您的个人信息后，您就可以获得《福布斯》中文杂志一期，我们会根据您填写的个人真实信息送至您手上</span>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>