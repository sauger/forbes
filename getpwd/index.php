<?php
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>福布斯-密码找回</title>
		<?php
			use_jquery();
			js_include_tag('public');
			css_include_tag('comlogin','public');
			js_include_tag('get_pwd');
			validate_form('form_login');
		?>
</head>
<body>
<div id=ibody>		
	 <?php include_top();?>
	 <div id=bread><a>密码找回</a></div>
	 <div id=bread_line></div>
	 <div id="left">
	 	<div id="left_top">
	  		<div id="left_title">密码找回</div>
		</div>
		<div id="left_bottom">
	  	<form name="login" id="form_login" action="getpwd.post.php" method="post">
	  		<div class="line_div">
	  		 <div>用户名：</div>
	  		 <input type="text"class="required" name="u_name"></input>
	  		</div>
	  		<div class="line_div">
	  		 <div >邮　箱：</div>
	  		 <input type="text" class="required" name="email"></input>
	  		</div>
	  		<div class="line_div">
	  		 <div>验证码：</div>
			 <input type="text" id="verify_text" name="yzm">
			 <img id="yz_img" src="yz.php">
			 <div id="change_pic">看不清楚？换张图片</div>
	  		</div>
	  		<div class="line_div"><input type="submit"  id="login" value="提交"></button></div>
	  	</div>
	  </form>
	</div>
	<div id="right">
	    <div id="login_banner" class="ad_banner"><img src="../images/comlogin/4.jpg"></div>
	    <div id="right_bottom">
			 <div id="right_title">欢迎您登陆福布斯中文网！</div>
			 <div id="right_word">《福布斯》杂志的前瞻性报道为企业高层决策者引导投资方向，提供商业机会，被誉为“美国经济的晴雨表”。</div>
	    </div>
	</div>
	<?php 
		include_bottom();
	?>
</div>
</body>
</html>
