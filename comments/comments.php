<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>读者高见_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min','comment','right');
		css_include_tag('public','comments','right_inc','colorbox');
		$db = get_db();
		$items = $db->paginate("select a.resource_type,a.title,a.magzine_number,a.nick_name,a.comment,a.created_at,b.title as news_title from fb_comment a left join fb_news b on a.resource_id = b.id where is_approve=1 order by a.id desc",10);
		$len = count($items);
	?>
</head>

<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread>读者高见</div>
		<div id="hr_top"></div>
		<div id="left">
			<div class=news_caption>
				<?php $count=$db->query("select count(*) as num from fb_comment a left join fb_news b on a.resource_id = b.id where is_approve=1 order by a.id desc") ?>
				<div class=captions>感言<span>共<?php echo $count[0]->num;?>篇</span></div>
			</div>
			<?php
				for($i=0;$i<$len;$i++){
					if($items[$i]->resource_type == 'magazine'){
						$is_magazine = true;
						$title = $items[$i]->magzine_number ." ". $items[$i]->title;
					}else{
						$title = $items[$i]->news_title;
					}
					
			?>
			<div id="c_join_a">
				
				<div class="join_top">
					<div class="title"><?php echo $items[$i]->nick_name;?></div>
					<div class="issues" title="<?php echo $title?>">评论：<?php echo $title?></div>
					<div class="time"><?php echo $items[$i]->created_at;?></div>
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
				<?php include_right("ad")?>
				<?php include_right("favor")?>
				<?php include_right("four")?>
				<?php include_right("rich")?>
				<?php include_right("magazine")?>
		</div>
		<?php include_bottom();?>
		
	</div>
	
	
</body>