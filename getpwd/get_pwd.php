<?php
	session_start();
	include_once('../frame.php');
	$db =get_db();
	$_SESSION['get_pwd'] = rand_str();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>福布斯-密码找回</title>
		<?php
			use_jquery();
			js_include_tag('public','get_pwd');
			css_include_tag('comlogin','public');
		?>
</head>
<body>
<div id=ibody>		
	 <?php include_top();?>
	 <div id=bread><a>密码找回</a></div>
	 <div id=bread_line></div>
	 <div id="left">
	 	<?php
	 	$verify = $_GET['verify'];
		if(empty($verify)){
			redirect('/error.html'); 
		}else{
			$db->query("select * from fb_get_pwd where verify='$verify' and now()<end_time");
			if(!$db->move_first()){
				echo "<div id='error'>您的申请不合法或者已经过期</div>";
			}else{
	 ?>
	  <form name="login" id="get_pwd" action="getpwd2.post.php" method="post">
	  	<div id="left_top">
	  		<div id="left_title">密码找回</div>
		</div>
		<div id="left_bottom">
	  		<div class="line_div" style="margin-top:30px;">
		  		 <div>新 密 码：</div>
		  		 <input type="password" class="required" name="password1"></input>
	  		</div>
	  		<div class="line_div">
	  		 <div>重复密码：</div>
	  		 <input type="password" class="required" name="password2"></input>
	  		</div>
	  		<div class="line_div"><input type="button" id="login2" value="提交"></button></div>
	  	</div>
		<input type="hidden" name="session" value="<?php echo $_SESSION['get_pwd'];?>">
		<input type="hidden" name="uid" value="<?php echo $db->field_by_name('user_id');?>">
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
	}
		}
		include_bottom();
	?>
</div>
</body>
</html>
