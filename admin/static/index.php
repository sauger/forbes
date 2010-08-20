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
		if(static_news($news,'page')){
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
			echo '静态化底部成功!';
		}else{
			echo '静态化底部失败!';
		}
		break;
	case 'right':
		$a = array('activities','ad','article','column_c','column','favor','forum','four','investment_list','magazine','rich','right_list','comment','pic_list');
		foreach($a as $v){
			if(!static_right($v)){
				die("静态化右侧'{$v}'失败");
			}	
		}
		echo '静态化右侧成功!';
		break;
	case 'contact':
		$a = array('about'=>'关于福布斯中文网', 'news' =>'新闻动态','ad'=>'广告服务','job'=>'诚聘英才','links'=>'友情链接','activity'=>'会员活动','declare'=>'隐私声明','sitedeclare'=>'网站声明','contactus'=>'联系我们','sitemap'=>'网站地图');
		foreach($a as $key => $v){
			if(!static_contact($key)){
				die("静态联系我们'{$v}'失败");
			}	
		}
		echo '静态化联系我们成功!';
		break;
	case 'sub_index':
		$a = array('investment','business','entrepreneur','tech','city','list','billionaires','life','column','club');
		foreach($a as $v){
			if(!static_sub_index($v)){
				die("静态化二级首页'{$v}'失败");
			}	
		}
		echo '静态化二级首页成功!';
		break;
	case 'index2':
		if(static_index2()){
			echo '静态化首页成功!';
		}else{
			echo '静态化首页失败!';
		}
		if(static_top2()){
			echo '静态化顶部成功!';
		}else{
			echo '静态化顶部失败!';
		}
		if(static_bottom2()){
			echo '静态化底部成功!';
		}else{
			echo '静态化底部失败!';
		}
		break;
	default:
		;
	break;
}