<?php 
	require_once('../frame.php');
	
	$id = $_GET['id'];
	
	$magazine_now = new table_class("fb_magazine");
	$magazine_now->find($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-杂志</title>
	<?php
		use_jquery();
		js_include_tag('public','right','magazine');
		css_include_tag('magazine/magazine','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
	<?php require_once('../inc/top.inc.php');?>
		<div id=bread>
			<a href="/magazine/">杂志首页</a> > <span>杂志</span>		
		</div>
		<div id="top_hr"></div>
		<div id="magazine"></div>
		<div id="books_pic_top"></div>
		<div id="books_pic"></div>
		
	
	<?php require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>