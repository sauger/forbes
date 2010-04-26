<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯登陆</title>
	<?php
	include_once('../frame.php');
	?>
	﻿<script type="text/javascript" language="javascript" src="../javascript/jquery-1.3.2.min.js"></script><link href="../css/admin.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div id=main>
		<div id=login >
			<div id=title>福布斯登陆</div>
			<form method="post" id="login" name="login" action="login.post.php">
			<div id=box>
				<div id=name>用户名　　<input type="text" id=login_text name=login_text style="width:145px; height:17px;" class="required"></div>
				<div id=pwd>密　码　　<input type="password" id=password_text name=password_text style="width:145px; height:17px;"></div>
				<div id=btn><input id="login_btn" type="submit" value="登录" class="botton"></div>	
			</div>
			</form>
		</div>
	</div>
	
</body>
</form>
<script>
$(function(){
		$('#password_text').keypress(function(e){
			if(e.keyCode == 13){$('#login').submit();}
		});
		
		$("#login_btn").click(function(){
			var login_text=$("#login_text").val();
			var password_text=$("#password_text").val();
			if(login_text==""||password_text=="")
			{
				alert("用户名或密码不能为空!");
				return false;
			}
		});
		
		
});
</script>

</html>
