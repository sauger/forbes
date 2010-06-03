<?php 
	include_once('../frame.php');
		$a = array('about'=>'关于福布斯中文网', 'news' =>'新闻动态','ad'=>'广告服务','job'=>'诚聘英才','links'=>'友情链接','activity'=>'会员活动','declare'=>'隐私声明','sitedeclare'=>'网站声明','contactus'=>'联系我们','sitemap'=>'网站地图');
		$name = $_GET['name'];
		if(!key_exists($name,$a)) die('unknown type!');
		
		$db = get_db();
		$category = new category_class('news');
		function get_contact_url($name){
			global $category;
			$page_type = $_GET['page_type'];
			if($page_type == 'static'){
				return "/contact/{$name}.shtml";
			}else{
				return "contact.php?name={$name}";				
			}
			;
		}
		/*
	switch($id){
		case 1:
		$title = "关于福布斯中文网(ForbesChina.com)";
		$c_name = "(ForbesChina.com)";
		$name="关于福布斯中文";
		break;
		case 2:
		$title="新闻动态";
		$name="新闻动态";
		break;
		case 3;
		$title="广告服务";
		$name="广告服务";
		break;
		case 4:
		$title="诚聘英才";
		$name="诚聘英才";
		break;
		case 5:
		$title="友情链接";
		$name="友情链接";
		break;
		case 6:
		$title="会员活动";
		$name="会员活动";
		break;
		case 7:
		$title="隐私声明";
		$name="隐私声明";
		break;
		case 8:
		$title="网站声明";
		$name="网站声明";
		break;
		case 9:
		$title="联系我们";
		$name="联系我们";
		break;
		case 10:
		$title="网站地图";
		$name="网站地图";
		break;
	}
	*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $a[$name];;?>_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','contact');
	?>
</head>
<body>
	<div id=ibody>		
		<?php include_top();?>		
		<div id=bread>			
				<span>关于我们</span>				
		</div>
		<div id="hr_top"></div>		
		<div id="middle">			
			<div id="middle_left">				
				<div id="middle_menu">
						<div id="menu_t"></div>
						<div id="menu">
							<div id="left_text_a"><b><a href=<?php echo get_contact_url('about')?>><?php echo $a['about'];?></a></b></div>
							<?php foreach ($a as $key => $val){
								if($key == 'about' || $key == 'sitemap') continue;
							?>
							<div class="left_text"><b><a href="<?php echo get_contact_url($key)?>"><?php echo $val?></a></b></div>
							<?php }?>
							<div id="left_text_b"><b><a href=<?php echo get_contact_url('sitemap')?>><?php echo $a['sitemap'];?></a></b></div>
						</div>						
						<div id="menu_b">
						</div>						
				</div>
			
		</div>
		
		<div id="right">
			
			<div id="right_t"></div>
			
			<div id="right_title">
					<?php 
							$news_count = $db->query("SELECT ni.content FROM forbes.fb_category c inner join fb_news ni on c.id=ni.category_id where c.name='{$a[$name]}'");?>
					
					<div id="title"><b><?php echo $a[$name];?></b></div>
					
					<div id="right_hr"></div>
					
					<div id="right_content" style="">
					<?php 
						if($name!='links'){
							echo $news_count[0]->content;
						}else{
							$links = $db->query("select * from fb_links order by priority");
							foreach($links as $v){
					?>
					<div class="link">
						<div class="link_title"><a href="<?php echo $v->link;?>"><?php echo $v->title;?></a></div>
						<div class="link_img"><a href="<?php echo $v->link;?>"><img src="<?php echo $v->img_url;?>"></a></div>
					</div>
					<?php }}?>
					</div>
			</div>
			
			<div id="right_b"></div>
		
		</div>
		
		</div>
	
		<?php include_bottom();?>
		
	</div>
</body>
<html>