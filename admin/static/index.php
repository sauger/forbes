<?php
session_start();
include_once('../../frame.php');
judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
</head>
<?php 
$type = $_GET['type'];
switch ($type) {
	case 'news':
		$id = intval($_GET['id']);
		$news = new table_class('fb_news');
		if(empty($id)){
			return false;
		}
		$news->find($id);
		if($news->id <=0 ) return false;
		if(static_news($news)){
			echo '静态化新闻成功';
		}else{
			echo '静态化新闻失败';
		};
		break;
	case 'index':
		if(static_index()){
			echo '静态化首页成功!';
		}else{
			echo '静态化首页失败!';
		}
		break;
	case 'top':
		if(static_top()){
			echo '静态化顶部成功!';
		}else{
			echo '静态化顶部失败!';
		}
		break;
	case 'bottom':
		if(static_bottom()){
			echo '静态化顶部成功!';
		}else{
			echo '静态化顶部失败!';
		}
		break;
	default:
		;
	break;
}