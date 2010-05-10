<?php 
	js_include_tag('right');
	$catename=$db->query('SELECT id,name FROM fb_category where id='.$cid); 
	$category = new category_class('news');
?>
		<div id=bread><?php echo $catename[0]->name; ?></div>
		<div id=bread_line></div>
		<div id=l>
		 <div id=common_head>	
			<div id=common_head_title ><?php $pos_name = $pos.'hl'; show_page_href();?></div>
			<div id=common_head_title_pic>
				<?php show_page_img()?>
			</div>
			<div id=common_head_r>
				<div id=common_head_description <?php show_page_pos($pos_name,'base_img_withoutime');?>><?php show_page_desc()?></div>
				<div id=common_head_list>
					<?php for($i=0; $i<2;$i++){ $pos_name = $pos_name.'_r'.$i?>
						<div class=common_head_list <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
					<?php } ?>
				</div>
			</div>
		 </div>	
			
			<div class=common_box>
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>热点</div>
				</div>
				<?php for($i=0;$i<6;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis1 <?php #show_page_pos($pos_name,'base')?>><?php show_page_href();?></div>
					<div class=common_article_description1><?php show_page_desc();?></div>
				<? }?>
				<?php  for($i=6;$i<15;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis2 <?php #show_page_pos($pos_name,'link')?>><?php show_page_href();?></div>
				<?php } ?>
			</div>
			
			<div id=common_dash></div>
			
			<div class=common_box2 >
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>专题</div>
				</div>
				<?php for($i=0;$i<2;$i++){ $pos_name = $pos."them".$i;?>
				<div class=common_subject <?php #show_page_pos($pos_name,'base_img')?>>
					<div class=common_subject_pic><?php show_page_img();?></div>
					<div class=common_subject_list><?php show_page_href();?></div>
					<div class=common_subject_description><?php show_page_desc();?></div>
				</div>
					<?php for($j=0;$j<2;$j++){ $pos_name = $pos."them".$i.$j;?>
						<div class=common_article_lis2 <?php show_page_pos($pos_name,'link')?>><?php show_page_href()?></div>
					<?php }?>
				<?php }?>

				
				<div class=caption style="height:40px; margin-top:20px;">
					<div class=captions><?php echo $catename[0]->name; ?>专栏</div>
					<div class=line>|</div>
					<a href="/column/category/<?php echo $catename[0]->id?>" class=more target="_blank"></a>
				</div>
				<?php for($i=0;$i<3;$i++){ $pos_name = $pos."column".$i;?>
				<div class=column_container<?php show_page_pos($pos_name,'column_full')?>>
					<?php show_page_img(null,null,0,'image1',null,'reserve');?>
					<div class=article>
						<div class=common_list3 ><?php show_page_href()?></div>
						<div class=common_description3><?php show_page_desc(null,null)?></div>
						<div class=common_writer><?php if($pos_items->$pos_name->alias != ''){ echo "——".$pos_items->$pos_name->alias; }else echo "&nbsp;";?></div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		
		
		<div id=right>
				<div id="right_inc">
		  		<?php include dirname(__FILE__)."/right/ad.php";?>
		  		<?php include dirname(__FILE__)."/right/investment_list.php"?>
		  		<?php include dirname(__FILE__)."/right/favor.php"?>
		  		<?php include dirname(__FILE__)."/right/activities.php"?>
		  		<?php include dirname(__FILE__)."/right/article.php";?>
		  		
		  		
		 	</div>
			
		</div>
