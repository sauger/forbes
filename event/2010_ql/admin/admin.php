<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯后台</title>
	<?php
		require_once('../frame.php');
		session_start();
		if($_SESSION["fbsadmin"]==""){redirect("../admin/");}
  ?>
 	﻿<script type="text/javascript" language="javascript" src="../javascript/jquery-1.3.2.min.js"></script><link href="../css/admin.css" rel="stylesheet" type="text/css">
 
</head>
<body style="background:url(../images/bg.jpg) repeat-x;">
<div id=admin_body>
		<div id=part1>
			<div id=nav style="width:160px;">欢迎  <?php echo $_SESSION["fbsadmin"] ?></div>
			<div id=title>福布斯后台</div>
			<div id=index><a href="/html/2010_ql/" target="_blank">专题主页</a></div>
		</div>
		<div id=part2>
			<div class="menu1"><a href="admin.php">报名情况</a></div>
		</div>
		
		<div id=part3>
		  <iframe id=admin_iframe name="admin_iframe" scrolling="yes" frameborder="0" src="list.php" width="99%" height="700"></iframe>
		</div>
		<div id=part4></div>	
</div>
</body>
</html>