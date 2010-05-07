<?php
	include_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-会员俱乐部</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('club_index','public');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
		<? include_top();?>
		<div id=bread><a href="#">会员俱乐部</a></div>
		<div id=bread_line></div>
		<div id=club_left>
			<div id=club_img <?php $pos_name='club_img'; show_page_pos($pos_name,'base_img_withoutime'); ?>>
				<div id=club_l_t>
					<img src="<?php echo $pos_items->$pos_name->image1;?>">
					<div id=fd>
					</div>
					<div id=fd_l ><?php echo $pos_items->$pos_name->description; ?></div>
					<div id=fd_r><a href="<?php echo $pos_items->$pos_name->href; ?>">了解详情>></a></div>
				</div>
			</div>
			<div class=survey_title_left></div>
			<div class=survey_title_center>
				<div class=wz>读者调查</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=survey_title_right></div>
			<div id="survey_content_left"></div>
			<div id="survey_content_center">
			<?php for($i=0;$i<2;$i++){ ?>
				<div class=content <?php $pos_name='club_survey_'.$i; show_page_pos($pos_name,'survey'); ?>>
					<div class=content_l>
						<?php show_page_img(); ?>	
					</div>
					<div class=content_r>
						<div class=title><?php show_page_href(); ?></div>
						<div class=context><?php show_page_desc(); ?></div>
						<div class=dc><a href="<?php echo $pos_items->$pos_name->href; ?>">开始调查>></a></div>
					</div>
				</div>
			<?php } ?>
				
			</div>
			<div id="survey_content_right"></div>
			<div class=survey_title_left></div>
			<div class=survey_title_center>
				<div class=wz>礼品兑换</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=survey_title_right></div>
			<div id="gift_content_left"></div>
			<div id="gift_content_center">
				<?php for($i=0;$i<8;$i++){ ?>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/club/three.jpg"></a></div>
					<div class=pictitle><a href="">积分兑换</a></div>	
				</div>
				<?php } ?>
			</div>
			<div id="gift_content_right"></div>
			<div id="club_banner" class="ad_banner"><a href=""><img border=0 src="/images/club/four.jpg"></a></div>
		</div>
		<div id=club_right>
			<div class=club_right_title_top></div>
			<div id=Bulletin>
				<div class=Bulletin_t>
					<div class=wz>会员公告</div>
				</div>
				<div id=Bulletin_c  <?php $pos_name='club_post'; show_page_pos($pos_name,'base_img_withoutime'); ?>>
					<div id=pic><a href="<?php echo $pos_items->$pos_name->href; ?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1; ?>"></a></div>
					<div id=pictitle><?php show_page_href(); ?></div>
					<div id=piccontent><?php show_page_desc(); ?></div>
				</div>
				<div class="club_dash"></div>
				<div id=Bulletin_b>
				<?php for($i=0; $i<3; $i++){?>
					<div class=cl <?php $pos_name='club_post_'.$i; show_page_pos($pos_name,'link_withouttime'); ?>>
						<div class=cl_l></div>
						<div class=cl_r>
							<?php show_page_href(); ?>	
						</div>	
					</div>
				<?php } ?>
				</div>
			</div>
			<div class=club_right_content_bottom></div>
			<div id=zy>
				<div id=btn><a href="/magazine/subscription.php"><button></button></a></div>	
			</div>
			<div class=club_right_title_top></div>
			<div id="idea">
				<div class=Bulletin_t>
					<div class=wz>获奖名单</div>
				</div>
				<div id="idea_t">
					<?php for($i=0;$i<3;$i++){ 
						$pos_name = "club_huojiang_$i";
					?>
					<div class=content <?php show_page_pos($pos_name,'base_img_withoutime')?>>
						<div class=pic>
							<?php show_page_img()?>	
						</div>
						<div class=pictitle>
							<?php show_page_href();?>	
						</div>
						<div class=piccontent>
							<?php show_page_desc();?>	
						</div>
					</div>
					<?php } ?>
				</div>
				<div class=club_right_title_top2></div>
				<div class=Bulletin_t>
					<div class=wz>读者高见</div>
				</div>
				<div class=Bulletin_c>
					<?php
						$db = get_db();
						$comments = $db->query("select * from fb_comment where resource_type='news' order by created_at desc limit 4");
						$news = new table_class('fb_news');
						for($i=0;$i<4;$i++){
						$news->find($comments[$i]->resource_id);
					?>
						<div class=idea_c>
							<div class=idea_c_t><a href=""><?php echo $comments[$i]->comment?></a></div>
							<div class=idea_c_b><a href="">--<?php echo $comments[$i]->nick_name;?></a></div>
						</div>
						<?php if($i<3){ ?>
						<div class="idea_dash"></div>
					<?php }}?>
				</div>
			</div>
			<div class=club_right_content_bottom></div>
			<div id=customize_title>
				<div id=wz>福布斯精华文章定制</div>
				<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
			</div>
			<div id=customize_left></div>
			<div id=customize_center>
				<div id=content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻　<input id="order_news" type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button disabled="disabled" id="news_order">定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=customize_b_l>
							<span style="font-size:14px; color:#11579e; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input class="order_article" name="rich" type="checkbox">富豪　<input class="order_article" name="create" type="checkbox">创业　<input class="order_article" name="business" type="checkbox">商业</div>
							<div class=cl><input class="order_article" name="invest" type="checkbox">投资　<input class="order_article" name="life" type="checkbox">生活</div><input class="order_article" type="hidden" name="type" value="article">
						</div>
						<div id=customize_b_r>
							<button id="article_order" disabled="disabled" >定制</button>	
						</div>
					</div>	
				</div>	
			</div>	
			<div id=customize_right></div>
		</div>
		<? include_bottom();?>
	</div>
</body>
</html>