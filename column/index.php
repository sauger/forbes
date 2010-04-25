<?php
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="专栏"');
	$nav=$nav[0]->id;	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-专栏</title>
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
		<div id=bread><a href="#">专栏</a></div>
		<div id=bread_line></div>
		<div id=column_left>
			<div class=column_left_top>
				<div class=column_special>
					<div class="t">
						<div class="t_title">特约专栏</div><a href="#" class=more></a>
					</div>
					<?php $pos_name = "column_special_t";?>
					<div class=column_special_top <?php show_page_pos($pos_name,'base');?>>
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
						<div class=column_recommend_top <?php show_page_pos($pos_name,'column_full');?>>
							<div class=column_recommend_top_l>
								<div class=picture>
									<a href="<?php echo $pos_items->$pos_name->reserve?>"><? show_page_img(null,null,0,"image1",null,"reserve"); ?></a>
								</div>
								<div class=n>
									<a href="<?php echo $pos_items->$pos_name->reserve?>" title="<?php echo $pos_items->$pos_name->alias?>" target="_blank"><? echo $pos_items->$pos_name->alias; ?></a>
								</div>
							</div>
							<div class=column_recommend_top_r>
								<div class=t1>
									<?php echo $pos_items->$pos_name->alias;?>的专栏
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
						<div class=column_recommend_b <?php show_page_pos($pos_name,'link'); ?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				<div id=column_edit>
					<div class="t">
						<div style="width:120px;float:left; display:inline;">专栏文章推荐</div><a class=more></a>
					</div>
					<?php
						for($i=0;$i<3;$i++){
							$pos_name = 'column_edit_t'.$i;
					?>
					<div class=column_edit_t <?php show_page_pos($pos_name,column_with_author); ?>>
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
					<div id=column_edit_recommend <?php show_page_pos($pos_name); ?>>
						<?php
							for($i=3;$i<11;$i++){
								$pos_name = 'column_edit_t'.$i;
						?>
						<div class=t1>
							<div class=t2>
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								—<?php echo $pos_items->$pos_name->reserve;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div id=column_edit_b>
						<div class=t>
							<div class="t_title">专栏列表</div><a class=more></a>
						</div>
						<?php
							for($i=0;$i<14;$i++){
								$pos_name = 'column_edit_b_t2_'.$i;
						?>
						<div class=t2 <? show_page_pos($pos_name); ?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="dash1"></div>
			<div class=column_left_top style="margin-top:30px;border:0px; ">
				<div class=column_special>
					<div class="t">
						<div class="t_title">采编智库</div><a class=more href=""></a>
					</div>
					<div class=column_special_top>
						<?php $pos_name = 'column_c_b_zk_'.$i ?>
						<div class=t1 <? show_page_pos($pos_name); ?>>
							<a href="<?php echo $pos_items->$pos_name->reserve?>"><?php show_page_href(); ?></a>
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
						<div class=column_recommend_top <?php show_page_pos($pos_name); ?>>
							<div class=column_recommend_top_l>
								<div class=picture>
									<?php show_page_img($pos_item,$pos_name); ?>
								</div>
								<div class=n>
									<?php echo $pos_items->$pos_name->alias;?>
								</div>
							</div>
							<div class=column_recommend_top_r>
								<div class=t1>
									<?php echo $pos_items->$pos_name->alias;?>专栏
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
						<div class=column_recommend_b <?php show_page_pos($pos_name);?>>
							<?php show_page_href(); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				<div id=column_edit>
					<div class="t">
						<div style="width:150px;float:left; display:inline;">采编智库文章推荐</div><a class=more></a>
					</div>
					<?php
						for($i=0;$i<3;$i++){
							$pos_name = "column_edit_edit_t2_{$i}";
					?>
					<div class=column_edit_t <?php show_page_pos($pos_name); ?>>
						<div class=t1>
							<div class=t2 >
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								—<?php echo $pos_items->$pos_name->alias;?>
							</div>
						</div>
						<div class=t4>
							<?php show_page_desc();?>
						</div>
					</div>
					<?php }?>
					<div id=column_edit_recommend>
						<?php
							for($i=3;$i<11;$i++){
								$pos_name = "column_edit_edit_t2_{$i}";
						?>
						<div class=t1>
							<div class=t2>
								<?php show_page_href(); ?>
							</div>
							<div class=t3>
								—<?php echo $pos_items->$pos_name->reserve;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div id=column_edit_b>
						<div class=t>
							<div class="t_title">专栏列表</div><a class=more></a>
						</div>
						<?php
							for($i=0;$i<14;$i++){
								$pos_name = 'column_list_'.$i;
						?>
						<div class=t2 <?php show_page_pos($pos_name) ?>>
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
		</div>
		<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>