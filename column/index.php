<?php
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="专栏"');
	$nav=$nav[0]->id;	
	$seo=$db->query('select * from fb_seo where name="专栏首页"');	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $seo[0]->title ?></title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $seo[0]->keywords ?>" />
	<meta name="description" content="<?php echo $seo[0]->description ?>" />
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('column','right_inc','public');
		init_page_items();
		#var_dump($pos_items);
	?>
</head>
<body>
<div id=ibody>
		<? include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread>专栏</div>
		<div id=bread_line></div>
		<div id=column_left>
			<div class=column_left_top>
				<div class=column_special>
					<div class=captions>特约专栏</div>
					<div class=line>|</div>
					<a href="http://www.forbeschina.com/column/expert" target="_blank" class=more></a>
					<?php $pos_name = "column_special_t";?>
					<div class=column_special_top <?php show_page_pos($pos_name,'base_ntime');?>>
						<div class=t1 >
							<?php show_page_href(); ?>
						</div>
						<div class=t2 >
							<?php show_page_desc(); ?>
						</div>
					</div>
					<?php
						for($i=0;$i<4;$i++){
						$pos_name = 'column_recommend_top_l_'.$i;	
					?>
					<div class=column_recommend>
						<div class=column_recommend_top <?php #show_page_pos($pos_name,'column_full');?>>
							<div class=column_recommend_top_l>
								<div class=picture>
									<a href="<?php echo $pos_items->$pos_name->reserve?>"><? show_page_img(null,null,0,"image1",null,"reserve"); ?></a>
								</div>
							</div>
							<div class=column_recommend_top_r>
								<div class=t1>
									<a href="<?php echo $pos_items->$pos_name->reserve?>"><?php echo $pos_items->$pos_name->alias;?></a>
								</div>
								<div class=t2>
									<?php show_page_href(); ?>
								</div>
								<div class=t3>
									<?php show_page_desc(); ?>
								</div>
							</div>
						</div>
						<?php
							for($j=1;$j<3;$j++){
								$pos_name = 'column_recommend_b_'.$i.'_'.$j;
						?>
						<div class=column_recommend_b <?php #show_page_pos($pos_name,'link'); ?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				
				<div id=steven>
				<?php $db=get_db();
					$news=$db->query('select n.id, n.title,n.description,u.name,u.image_src from fb_news n left join fb_user u on n.publisher=u.id where u.id=72 and n.is_adopt=1 order by n.priority asc, n.created_at desc limit 5');
				 ?>
					<div id=pic>
						<div id=picimg><a href="<?php echo "{$static_site}/column/".$news[0]->name;?>"><img border=0 src="<?php echo $news[0]->image_src; ?>" /></a></div>
					</div>
					<div id=pictitle>
						<div><a href="<?php echo "{$static_site}/column/".$news[0]->name;?>">事实与评论</a></div>
						<div id="steven_name"><a href="<?php echo "{$static_site}/column/".$news[0]->name;?>">史蒂夫·福布斯</a></div>
					</div>
					<div id=piccontent>
						<div id=title><a href="<?php echo column_article_url($news[0]->name,$news[0]->id,'static');?>" title="<?php echo $news[2]->title; ?>"><?php echo $news[0]->title; ?></a></div>
						<div id=content title="<?php echo strip_tags($news[0]->description); ?>"><?php echo $news[0]->description; ?></div>
					</div>
					<?php for($i=1;$i<5;$i++){?>
					<div class="title" ><a href="<?php echo column_article_url($news[$i]->name,$news[$i]->id,'static');?>" title="<?php echo $news[$i]->title; ?>"><?php echo $news[$i]->title; ?></a></div>
					<?php }?>
				</div>
				<div class=column_edit>
					<div class=captions>专栏文章推荐</div>
					<div class=line>|</div>
					<a href="http://www.forbeschina.com/column/category/writer" target="_blank" class=more></a>
					<?php
						for($i=0;$i<3;$i++){
							$pos_name = 'column_edit_t'.$i;
					?>
					<div class=column_edit_t <?php #show_page_pos($pos_name,"column_with_author"); ?>>
						<div class=t1>
							<div class=t2>
								<?php show_page_href();?>
							</div>
							<div class=t3>
								——<?php echo $pos_items->$pos_name->alias;?>
							</div>
						</div>
						<div class=t4>
							<?php show_page_desc();?>
						</div>
					</div>
					<?php }?>
					<div class=column_edit_recommend >
						<?php
							for($i=3;$i<6;$i++){
								$pos_name = 'column_edit_t'.$i;
						?>
						<div class=t1<?php #show_page_pos($pos_name,'column_simple'); ?>>
							<div class=t2>
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								—<?php echo $pos_items->$pos_name->alias;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div class=column_edit_b>
						<div class=caption>
							<div class=captions>专栏列表</div>
							<div class=line>|</div>
							<a href="http://www.forbeschina.com/column/expert" target="_blank" class=more></a>
						</div>
						<?php
							for($i=0;$i<10;$i++){
								$pos_name = 'column_edit_b_t2_'.$i;
						?>
						<div class=t2 <? show_page_pos($pos_name,'column_author_ntime'); ?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="dash1"></div>
			<div class=column_left_top style="margin-top:30px;border:0px; ">
				<div class=column_special>
					<div class=captions>采编空间</div>
					<div class=line>|</div>
					<a href="http://www.forbeschina.com/column/journalist" target="_blank" class=more></a>
					<div class=column_special_top>
						<?php $pos_name = 'column_c_b_zk_'.$i ?>
						<div class=t1 <?php show_page_pos($pos_name,'base_ntime');?>>
							<?php show_page_href(); ?>
						</div>
						<div class=t2>
							<?php show_page_desc();?>
						</div>
					</div>
					<?php
						for($i=0;$i<4;$i++){
							$pos_name = 'column_r_t_l'.$i;
					?>
					<div class=column_recommend>
						<div class=column_recommend_top <?php #show_page_pos($pos_name); ?>>
							<div class=column_recommend_top_l>
								<div class=picture>
									<?php show_page_img(null,null,0,"image1",null,"reserve"); ?>
								</div>
							</div>
							<div class=column_recommend_top_r<?php #show_page_pos($pos_name,'column_full');?>>
								<div class=t1>
									<a href="<?php echo $pos_items->$pos_name->reserve?>" title="<?php echo $pos_items->$pos_name->alias?>" target="_blank"><?php echo $pos_items->$pos_name->alias;?></a>
								</div>
								<div class=t2>
									<?php echo show_page_href(); ?>
								</div>
								<div class=t3>
									<?php show_page_desc();?>
								</div>
							</div>
						</div>
						<?php
							for($j=1;$j<3;$j++){
								$pos_name = "column_recommend_top_r_t2_{$i}_{$j}";
						?>
						<div class=column_recommend_b <?php #show_page_pos($pos_name,'link');?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				<div class=column_edit>
					<div class=captions>采编空间文章推荐</div>
					<div class=line>|</div>
					<a href="http://www.forbeschina.com/column/category/editor" target="_blank" class=more></a>
					<?php
						for($i=0;$i<3;$i++){
							$pos_name = "column_edit_edit_t2_{$i}";
					?>
					<div class=column_edit_t <?php #show_page_pos($pos_name,"column_with_author"); ?>>
						<div class=t1>
							<div class=t2 >
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								——<?php echo $pos_items->$pos_name->alias;?>
							</div>
						</div>
						<div class=t4>
							<?php show_page_desc();?>
						</div>
					</div>
					<?php }?>
					<div class=column_edit_recommend>
						<?php
							for($i=3;$i<6;$i++){
								$pos_name = "column_edit_edit_t2_{$i}";
						?>
						<div class=t1<?php #show_page_pos($pos_name,'column_simple'); ?>>
							<div class=t2>
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								—<?php echo $pos_items->$pos_name->alias;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div class=column_edit_b>
						<div class=caption>
							<div class=captions>专栏列表</div>
							<div class=line>|</div>
							<a href="http://www.forbeschina.com/column/journalist" target="_blank" class=more></a>
						</div>
						<?php
							for($i=0;$i<10;$i++){
								$pos_name = 'column_list_'.$i;
						?>
						<div class=t2 <?php show_page_pos($pos_name,'column_author_ntime') ?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div id="right_inc">
			<?php include_once(dirname(__FILE__)."/../right/ad.php");?>
			<?php include_once(dirname(__FILE__)."/../right/column_c.php");?>
			<?php include_once(dirname(__FILE__)."/../right/column.php");?>
			<?php include_once(dirname(__FILE__)."/../right/forum.php");?>
			<?php include_once(dirname(__FILE__)."/../right/magazine.php");?>
		</div>
		<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>