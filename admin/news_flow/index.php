<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class','admin/pub/search','admin/news/news_list');
		$category = new category_class('news');
		$category->echo_jsdata();
	?>
</head>
<body>
<?php 
if($_SESSION['role_name']=='sys_admin'){
	include '_edit.php';
}elseif($_SESSION['role_name']=='column_writer'||$_SESSION['role_name']=='column_editor'){
	include '_column.php';
}
?>