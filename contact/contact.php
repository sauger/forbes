<?php 
	include_once('../frame.php');

		$db = get_db();
		$id = intval($_GET['id']);
		if($id==0)
		{
				$id=1;	
		}
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title;?>_福布斯中文网</title>
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
							<?php 
							$news_count = $db->query("SELECT ni.content FROM forbes.fb_category c inner join fb_news ni on c.id=ni.category_id where c.name='".$name."'");?>
									<div id="left_text_a"><b><a href="contact.php?id=1">关于福布斯中文网</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=2">新闻动态</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=3">广告服务</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=4">诚聘英才</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=5">友情链接</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=6">会员活动</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=7">隐私声明</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=8">网站声明</a></b></div>
									<div class="left_text"><b><a href="contact.php?id=9">联系我们</a></b></div>
									<div id="left_text_b"><b><a href="contact.php?id=10">网站地图</a></b></div>
						</div>						
						<div id="menu_b">
						</div>						
				</div>
			
		</div>
		
		<div id="right">
			
			<div id="right_t"></div>
			
			<div id="right_title">
			
					
					<div id="title"><b><?php echo $title;?></b></div>
					
					<div id="right_hr"></div>
					
					<div id="right_conntent">

						<?php echo $news_count[0]->content;?>
						
					</div>
					
						
				
				
			</div>
			
			<div id="right_b"></div>
		
		</div>
		
		</div>
	
		<?php include_bottom();?>
		
	</div>
</body>
<html>