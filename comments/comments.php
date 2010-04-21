<?php 
	require_once('../frame.php');
		$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min','comment','right');
		css_include_tag('public','comments','right_inc','colorbox');
		$db = get_db();
		$items = $db->paginate("select a.resource_type,a.title,a.magzine_number,a.nick_name,a.comment,a.created_at,b.title as news_title from fb_comment a left join fb_news b on a.resource_id = b.id where is_approve=1 order by a.id desc",30);
		$len = count($items);
	?>
</head>

<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<span>读者高见</span>
		</div>
		<div id="hr_top"></div>
		<div id="left">
			<div id="comments_top">
				<div id="title_pg_l"></div>
				<div id="title_pg">共有<?php echo $page_record_count;?>条&nbsp;&nbsp;&nbsp;感言</div>
				<DIV ID="title_pg_r"></div>
			</div>
			<?php
				for($i=0;$i<$len;$i++){
					if($items[$i]->resource_type == 'magazine'){
						$is_magazine = true;
						$title = $items[$i]->magzine_number . $items[$i]->title;
					}else{
						$title = $items[$i]->news_title;
					}
					
			?>
			<div id="c_join_a">
				
				<div class="join_top">
					<div class="title"><?php echo $items[$i]->nick_name;?></div>
					<div class="time"><?php echo $items[$i]->created_at;?></div>
					<div class="issues">评论：<?php echo $title?></div>
				</div>
				
				<div class="content">
					<div class="content_lable"><?php echo $items[$i]->comment;?></div>
				</div>
				
			</div>
			<div class="hr_dashed"></div>
			<div id="hr"></div>			
			
			<?php 
				}
			?>	
				<div><?php paginate();?></div>
				<div id="content_bottom">
					<div id="z_bottom">
					<div id="z"><img src="../images/comments/comment.jpg"></div>
				</div>
				
				</div>
			</div>
			<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<?php include "../right/favor.php";?>
		 		<?php include "../right/four.php";?>
		 		<?php include "../right/rich.php";?>
		 		<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
		
	</div>
	
	
</body>