<?php 
	js_include_tag('right');
	$catename=$db->query('SELECT name FROM fb_category where id='.$cid); 
?>
		<div id=bread><a href="#"><?php echo $catename[0]->name; ?></div>
		<div id=bread_line></div>
		<div id=l>
		 <div id=common_head>	
			<div id=common_head_title ><?php $pos_name = $pos.'hl'; show_page_href($pos_items,$pos_name);?></div>
			<div id=common_head_title_pic>
				<?php show_page_img($pos_items,$pos_name)?>
			</div>
			<div id=common_head_r>
				<div id=common_head_description <?php show_page_pos($pos_name);?>><?php show_page_desc($pos_items,$pos_name)?></div>
				<div id=common_head_list>
					<?php for($i=0; $i<2;$i++){ $pos_name = $pos_name.'_r'.$i?>
						<div class=common_head_list <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name);?></div>
					<?php } ?>
				</div>
			</div>
		 </div>	
			
			<div class=common_box>
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>热点</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<6;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis1 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name);?></div>
					<div class=common_article_description1><?php show_page_desc($pos_items,$pos_name);?></div>
				<? }?>
				<?php  for($i=6;$i<15;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis2 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name);?></div>
				<?php } ?>
			</div>
			
			<div id=common_dash></div>
			
			<div class=common_box2 >
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>专题</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<2;$i++){ $pos_name = $pos."them".$i;?>
				<div class=common_subject <?php show_page_pos($pos_name)?>>
					<div class=common_subject_pic><?php show_page_img($pos_items,$pos_name)?></div>
					<div class=common_subject_list><?php show_page_href($pos_items,$pos_name)?></div>
					<div class=common_subject_description><?php show_page_desc($pos_items,$pos_name)?></div>
				</div>
					<?php for($j=0;$j<2;$j++){ $pos_name = $pos."them".$i.$j;?>
						<div class=common_article_lis2 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></div>
					<?php }?>
				<?php }?>

				
				<div class=caption style="height:40px; margin-top:20px;">
					<div class=captions><?php echo $catename[0]->name; ?>专栏</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<3;$i++){ $pos_name = $pos."column".$i;?>
				<div class=column_container>
					<img src="<?php echo $pos_items->$pos_name->image1; ?>" />
					<div class=article>
						<div class=common_list3 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></div>
						<div class=common_description3><?php echo $pos_items->$pos_name->description;?></div>
						<div class=common_writer><?php if($pos_items->$pos_name->alias != ''){ echo "——".$pos_items->$pos_name->alias; }else echo "&nbsp;";?></div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		
		
		<div id=right>
				<div id="right_inc" style="margin-top:10px;">
		  		<?php include dirname(__FILE__)."/right/ad.php";?>
		  		<?php include dirname(__FILE__)."/right/investment_list.php"?>
		  		<?php include dirname(__FILE__)."/right/favor.php"?>
		  		<?php include dirname(__FILE__)."/right/activities.php"?>
		  		<?php include dirname(__FILE__)."/right/article.php";?>
		  		
		  		
		 	</div>
			
		</div>
