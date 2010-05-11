<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>杂志_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('magazine/index','public','right_inc');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
	<?php include_top();?>
		<div id=bread>
			杂志
		</div>
		<div id=bread_line></div>
		<div id=zzleft>
			<div class=l_t_top></div>
			<div id=l_t_content>
				<?php
					$db = get_db();
					$magazine = $db->query("select * from fb_magazine order by publish_data desc limit 9");
					$count = $db->record_count;
				?>
				<div class=l_title>
					<div class=wz>杂志展示</div>
				</div>
				<div class=l_pic>
					<img src="<?php echo $magazine[0]->img_src;?>">
				</div>
				<div id=r_t>
					<div id=title><?php echo $magazine[0]->name;?></div>
					<div id=content><a href="">出版日期：<?php echo substr($magazine[0]->publish_data,0,10);?><br>封面专题</a></div>
				</div>
				<?php
					$news = $db->query("select t1.title,t1.id,t1.created_at,t1.description from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where t2.magazine_id={$magazine[0]->id} order by t2.priority limit 3");
					$news_count = $db->record_count;
					for($i=0;$i<$news_count;$i++){$pos_name = 'magazine_index_news'.$i;
				?>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz><a href="<?php echo static_news_url($news[$i]);?>" title="<?php echo $news[$i]->title;?>"><?php echo $news[$i]->title;?></a></div>
					</div>
					<div class=content>
						<?php echo $news[$i]->description;?>
					</div>
					<div class=r_b_dash></div>
				</div>
				<?php }?>
				<div class="l_b">
					<div class="btn_ck"><a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>"><img border="0" src="/images/magazine/btn_ck.jpg"></a></div>
					<div class="btn_readonline"><a href="<?php echo $magazine[0]->url;?>"><img border="0" src="/images/magazine/btn_readonline.jpg"></a></div>
				</div>
			</div>
			<div class=l_t_bottom></div>
			<div id="magazine_banner1" class="ad_banner"><a href=""><img border=0 src="/images/magazine/one.jpg"></a></div>
			<div class=l_t_top></div>
			<div id=l_b_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>	
				</div>
				<?php 
					for($i=1;$i<$count;$i++){
				?>
				<div class=imgandtitle>
					<div class=pic>
						<img src="<?php echo $magazine[$i]->img_src;?>">
					</div>
					<div class=pictitle><a href="<?php echo "{$static_site}/magazine/{$magazine[$i]->id}";?>" title="<?php echo $magazine[$i]->name;?>"><?php echo $magazine[$i]->name;?></a></div>
					<?php
						$news = $db->query("select t1.title,t1.id,t1.created_at,t1.description from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where t2.magazine_id={$magazine[$i]->id} order by t2.priority limit 3");
						$news_count = $db->record_count;
						for($j=0;$j<$news_count;$j++){
					?>
					<div class=piccontent>
						<a href="<?php echo static_news_url($news[$j]);?>" title="<?php echo $news[$j]->title;?>"><?php echo $news[$j]->title;?></a>
					</div>
					<?php
						}
					?>
				</div>
				<?php } ?>
			</div>
			<div class=l_t_bottom></div>
		</div>
		<div id="right_inc">
			<?php include_right("ad")?>
			<?php include_right("magazine")?>
			<?php include_right("comment")?>
		</div>
	<?php include_bottom();?>
	</div>
</body>
</html>