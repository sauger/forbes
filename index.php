<?php
	include_once( dirname(__FILE__) .'/frame.php');
	$db = get_db();
	$seo=$db->query('select * from fb_seo where name="网站首页"');
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
		js_include_tag('public','index');
		css_include_tag('public','index');
		$category = new category_class('news');
	?>
</head>
<body>
	<div id=ibody>
	<?php 
	init_page_items();
	include_top();
	
	?>
		<div id=forbes_tlt>
  		<div id=headline>
  				<?php $pos_name = "index_hl_0";?>
				<div class=headline_pic id=headline_pic_0><?php show_page_img(300,200,0)?></div>
				<?php for($i=1;$i<3;$i++){
					$pos_name = "index_hl_{$i}";
				?>
				<div class=headline_pic id="headline_pic_<?php echo $i;?>" style="display:none;"><?php show_page_img(300,200,0)?></div>
				<?php }?>
				<div id=headline_content>
					<div class=headline_title id=headline_title_0 <?php $pos_name ="index_hl_0"; show_page_pos($pos_name,'base_img_withoutime')?>><?php show_page_href();?></div>
					<div class=headline_title id=headline_title_1 style="display:none;" <?php $pos_name ="index_hl_1"; show_page_pos($pos_name,'base_img_withoutime')?>><?php show_page_href();?></div>
					<div class=headline_title id=headline_title_2 style="display:none;" <?php $pos_name ="index_hl_2"; show_page_pos($pos_name,'base_img_withoutime')?>><?php show_page_href();?></div>
					<div class=headline_description id=headline_description_0><?php echo $pos_items->index_hl_0->description; ?></div>
					<div class=headline_description id=headline_description_1 style="display:none;"><?php echo $pos_items->index_hl_1->description; ?></div>
					<div class=headline_description id=headline_description_2 style="display:none;"><?php echo $pos_items->index_hl_2->description; ?></div>
					  
			    <?php for($j=0;$j<3;$j++){?>
					<div class=headline_related id=headline_related_<?php echo $j?> <?php if($j<>0){echo "style='display:none'";}?> >
					<?php				
							for($i=0;$i<2;$i++)
							{$pos_name = "index_hl".$j."_r".$i;
					?>
					<div class=list <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
					<?php
							}
					?>				
					</div>
				  <? }?>	
	
					<div id=btn>
						<div class=headline_btn1 id=l param=l style="background:url(/images/index/slideshow_back.gif) no-repeat;"></div>
						<div class=headline_btn2 id=b0 param=0 style="background:url(/images/index/slideshow_active.gif) no-repeat"></div>
						<div class=headline_btn2 id=b1 param=1 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=b2 param=2 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn1 id=r param=r  style="background:url(/images/index/slideshow_next.gif) no-repeat"></div>
					</div>
				</div>
			</div>
			<? /* headline-end */?>
			
		 <div id=forbes_tltb>	
			 <div id=lujiazui>
  		 	 <div id=lujiazui_caption <?php show_page_pos('lujiazui','only_link')?>><a href="<?php echo $pos_items->lujiazui->href;?>" title="<?php echo $pos_items->lujiazui->title;?>" target="_blank">陆家嘴早餐</a></div>
			 	 <div id=lujiazui_coffee></div>
  		 	 	<?php for($i=0;$i<3;$i++){
  		 	 		$pos_name = "index_bf".$i;
  		 	 	?>
			 	 <div class=lujiazui_list <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
			 	 <?php }?>
			 </div>
			 <? /* lujiazui-end */?>
						 
			 <div id=subject>
			 	 <div id=subject_btnl></div>
				 <div id="subject_box">
			 	 <?php for($i=0;$i<4;$i++){ $pos_name = "index_sub".$i;?>
			 	 <div <?php show_page_pos($pos_name,'link_img_withouttime')?> class="subject_content">
			 			<div class=subject_pic><?php show_page_img();?></div>
			 			<div class=subject_list><?php show_page_href();?></div>
			 	 </div>
			 	 <?php } ?>
				 </div>
			 	 <div id=subject_btnr></div>
			 </div>
			 <? /* subject-end */?>
			 		
		 </div>
		</div> 
		 
		 
		<div id=forbes_trt>
			<?php for($i=1;$i<5;$i++){
				$pos_name = "index_right_list{$i}";
			?>
			<div class="title"  <?php show_page_pos($pos_name,'link_img	')?>  title="<?php echo $pos_items->$pos_name->title;?>"><?php show_page_href();?></div>
			<?php }?>
			<script>
				$('#forbes_trt .title:first').addClass("selected");
			</script>
			<div id=phb>
				<?php for($i=1;$i<5;$i++){
					$pos_name = "index_right_list{$i}";
				?>
				<div id="rt_tab<?php echo $i;?>" class="rt_tab">
					<a href="<?php echo $pos_items->$pos_name->static_href;?>"><img border="0" width="300" height="280" title="<?php echo $pos_items->$pos_name->title;?>" src="<?php echo $pos_items->$pos_name->image1?>" /></a>
				</div>
				<?php }?>
				<script>
					$('#rt_tab1').show();
				</script>
				<div id=bottom>
					<div id=title <?php $pos_name='cfgc'; show_page_pos($pos_name,'only_title')?>><?php show_page_href();?></div>
					<?php for($i=0;$i<3;$i++){
						$pos_name = "index_dyn_list{$i}"; 
						?>
						<div class=bottom_list<?php show_page_pos($pos_name,'link_withouttime');?>><?php show_page_href()?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	
		<div class=forbes_l>
			<div class=caption>
				<div class=captions><a href="/entrepreneur/" target="_blank">创业</a></div>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php show_page_pos("index_bus0",'base')?>><?php show_page_href("index_bus0");?></div>
					<div class=list1_description><?php show_page_desc("index_bus0");?></div>
				</div>
				<?php
				for($i=0;$i<3;$i++){ $pos_name = "index_bus".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
			
			<div class=caption>
				<div class=captions><a href="/tech/" target="_blank">科技</a></div>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php $pos_name = "index_tech0";show_page_pos($pos_name,'base');?>><?php show_page_href();?></div>
					<div class=list1_description><?php show_page_desc()?></div>
				</div>
				<?php for($i=0;$i<4;$i++){ $pos_name="index_tech".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>

			<div class=caption>
				<div class=captions><a href="/business/" target="_blank">商业</a></div>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php $pos_name ="index_business0"; show_page_pos($pos_name,'base')?>><?php show_page_href();?></div>
					<div class=list1_description><?php show_page_desc();?></div>
				</div>
				<?php for($i=0;$i<4;$i++){ $pos_name="index_business".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>

						
			
			<div class=caption>
				<div class=captions><a href="/column/" target="_blank">专栏</a></div>
			</div>
			<div class=forbes_l_content>
				<div id=column_btnl style="background:none; cursor:auto;"></div>
				<div id="column_box" >
				<?php 
					for($i=0;$i<8;$i++){ 
						$pos_name = "index_author".$i;
				?>
					<div class=content <?php show_page_pos($pos_name,'index_column');?> name="<?php echo 'author'.$i;?>">
						<div <?php if($i==0){?>style="filter:alpha(opacity=100); opacity:1;"<?php }?> class=cpic>
							<?php show_page_img();?>
						</div>
						<div class=ccl><?php show_page_href();?></div>
					</div>
				<?php } ?>
				</div>
				<div id=column_btnr></div>
				
				<?php 
					for($i=0;$i<8;$i++){
				?>
				<div name="<?php echo 'author'.$i;?>" <?php if($i==0){?>style="display:inline"<?php }?> class="cloumn_news_box">
					<div class=list1>
						<div class=list1_title <?php #show_page_pos('index_author'.$i.'_r0');?>><?php show_page_href('index_author'.$i.'_r0');?></div>
					</div>
					<?php 
						for($j=1;$j<4;$j++){
							$pos_name = 'index_author'.$i.'_r'.$j;
					?>
						<div class=list2 <?php #show_page_pos($pos_name);?>><?php show_page_href();?></div>
					<?php } ?>
				</div>
				<?php }?>
			</div>
			<div class=dashed></div>
			
			
			<div class=caption>
				<div class=captions><a href="http://www.forbeschina.com/comments" target="_blank">读者高见</a></div>
			</div>
			<?php 
				$comments = $db->query("select * from fb_comment where resource_type='news' and is_approve=1 order by priority asc,created_at desc limit 4");
				$news = new table_class('fb_news');
				for($i=0;$i<4;$i++){
					$news->find($comments[$i]->resource_id);
			?>
			<div class=context style="overflow: hidden;"><a href="http://www.forbeschina.com<?php echo static_news_url($news) ."/comments/{$comments[$i]->id}"?>"><?php echo $comments[$i]->comment?></a></div>
			<div class=context1><?php echo $comments[$i]->nick_name;?>　|　<a href="<?php echo get_news_url($news);?>" target="_blank" title="<?php echo $news->title;?>"><?php echo $news->short_title;?></a></div>
			<?php }?>
		</div>
		
		<div class=forbes_l style="margin-left:25px;">
			<div class=caption>
				<div class=captions><a href="/investment/" target="_blank">投资</a></div>
			</div>
			<div class=forbes_l_content>
			 	<div class=list1 >
					<div class=list1_title <?php $pos_name ="index_invest0"; show_page_pos($pos_name,'base_img')?>><?php show_page_href();?></div>
					<div class=list1_description2>
						<div class="list1_pic"><a href="<?php echo $pos_items->index_invest0->href;?>" target="_blank"><img border=0  src="<?php echo $pos_items->index_invest0->image1;?>"></a></div>
						<div class="list1_piccontent"><?php show_page_desc('index_invest0');?></a></div>
					</div>
					<?php for($i=1;$i<=5;$i++){ $pos_name = "index_invest".$i;?>
						<div class=list2 style="margin-left:3px;" <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
					<?php } ?>
				</div>
			</div>	
			<div class=dashed></div>

	  		<div class=caption>
				<div class=captions><a href="/life/" target="_blank">生活</a></div>
			</div>
			<div class=list1>
					<div <?php $pos_name ="index_luxu0"; show_page_pos($pos_name,'base_img_withoutime');?> class=image><?php show_page_img(150,130)?></div>
					<div class=image_content style="margin-left:15px;">
						<div class=image_list><?php show_page_href()?></div>
						<div class=image_description><?php show_page_desc()?></div>
					</div>
					<div  <?php $pos_name ="index_luxu1"; show_page_pos($pos_name,'base_img_withoutime');?> class=image_content style="margin-top:20px;">
						<div class=image_list><?php show_page_href()?></div>
						<div class=image_description><?php show_page_desc()?></div>
					</div>
					<div class=image style="margin-top:20px; margin-left:5px;"><?php show_page_img(150,130)?></div>
			</div>
			<div class=life_bottom>
				<?php for($i=0;$i<4;$i++){ ?>
					<div <?php $pos_name ="index_lifelist_".$i; show_page_pos($pos_name,'dictionary');?> class=lifelist><?php show_page_href();?></div>
				<?php }?>
			</div>
		</div>
		
		
		<div class=forbes_r>
			<div id=dictionary>
				<div id=dictionary_r>
					<div id=content1 <?php $pos_name ="dictionary_r_content1"; #show_page_pos($pos_name,'dictionary');?>><a href="<?php echo $pos_items->$pos_name->href?>" title="<?php echo $pos_items->$pos_name->reserve?>"><?php echo $pos_items->$pos_name->reserve?></a></div>
					<div id=more><a href="<?php echo get_newslist_url($category->find_by_name('财经词典')->id);?>">财经词典</a></div>
					<div id=content2 <?php $pos_name ="dictionary_r_content1"; show_page_pos($pos_name,'dictionary');?>><?php show_page_href()?></div>
					<div id=content3 <?php #$pos_name ="dictionary_r_content2"; #show_page_pos($pos_name,'dictionary');?>><?php show_page_desc()?></div>
				</div>
			</div>

			<div id=activity>
				<div class=public_top1>
					<div class=public_caption1>论坛活动</div>
					<a href="/event" target=_blank class=public_more1></a>
				</div>
				<?php $pos_name = 'index_event';?>
				<div class=public_box1 <?php show_page_pos($pos_name,'index_event');?>>
					<div id=images><a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank"><img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="260" height="90"/></a></div>
					<div id=title><a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a></div>
					<div id=context>
						举办日期：<?php echo $pos_items->$pos_name->reserve;?><br>地点：<?php echo $pos_items->$pos_name->title;?>
					</div>
					<div id=info><a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank">查看详细</a></div>	
				</div>
				<div class=public_bottom1></div>
			</div>
			
			<div id=club>
					<div class=club_caption1>增长会</div>
					<a href="/investor" class=club_more1 target="_blank"></a>
					<?php $pos_name = 'index_club0';?>
					<div class=content <?php show_page_pos("$pos_name",'base_img_withoutime');?>>
						<div class=pic>
							<?php show_page_img()?>
						</div>	
						<div class=pictitle>
							<?php show_page_href()?>
						</div>
						<div class=piccontent>
							<?php show_page_desc()?>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href='/investor/sign'>我要报名</a></div>
						<div class=bottom_r>
							<a href='/investor'>VC/PE/天使投资人数据库</a>
						</div>	
					</div>
			</div>
			
			
			
			<div id=city>
					<div class=city_caption1>城市</div>
					<a href="/city/" class=city_more1 target="_blank"></a>
					<?php $pos_name = 'index_city0';?>
					<div class=content <?php show_page_pos($pos_name,'base_img_withoutime');?>>
						<div class=pic>
							<?php show_page_img()?>
						</div>	
						<div class=pictitle>
							<?php show_page_href()?>
						</div>
						<div class=piccontent>
							<?php show_page_desc()?>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href="http://www.forbeschina.com/list/more/4">城市榜</a></div>
						<?php $pos_name = 'index_city2';?>
						<div class=bottom_r <?php show_page_pos($pos_name,'link');?>>
							<?php show_page_href();?>
						</div>	
					</div>
			</div>
		</div>
		
		
		<div class="c_r_img ad_banner" id="index_middle_banner">
		</div>
		
		
		<div class=forbes_l style="margin-left:25px;">
    	<div class=caption>
				<div class="caption_base captions caption_selected" id="cls_cpt1">最受欢迎</div>
				<div class=line style="margin-top:14px;">|</div>
				<div class="caption_base" id="cls_cpt2">编辑推荐</div>
		</div>
		<div id="div_caption1">
			<?php for($i=0;$i<6;$i++){ $pos_name = "index_pop".$i;?>
					<div class=list3 <?php show_page_pos($pos_name,'link')?>><?php show_page_href()?></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		<div id="div_caption2" style="display:none;">
			<?php for($i=0;$i<6;$i++){ $pos_name = "index_reco".$i;?>
					<div class=list3 <?php show_page_pos($pos_name,'link')?>><?php show_page_href()?></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		</div>
		
		<div class=forbes_r>
			
			<div id=inventory>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9;">在线调查</div>
					<a href="/survey/" class=public_more1 target="_blank"></a>
				</div>

				<div class=inventory_content>
					<?php $pos_name = "index_survey_0"?>
					<div class=inventory_title<?php show_page_pos($pos_name,'survey')?>><?php show_page_href();?></div>
					<div class=inventory_list>
						<?php show_page_desc(null,null);?>
					</div>
					<a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank" class=inventory_button></a>
					<div class=inventory_dash></div>

					<?php $pos_name = "index_survey_1"?>
					<div class=inventory_title<?php show_page_pos($pos_name,'survey')?>><?php show_page_href();?></div>
					<div class=inventory_list>
						<?php show_page_desc(null,null);?>
					</div>
					<a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank" class=inventory_button></a>
   			</div>



				<div class=public_bottom1></div>
			</div>
		</div>	
			
		<div class=forbes_l style="margin-top:0px; margin-left:25px;">
		  	<div class=caption>
					<div class=captions><a href="/column/" target="_blank">采编空间</a></div>
			</div>
				<?php 
				for($i=0;$i<8;$i++){ $pos_name = "index_jour".$i;?>
					<div class=writer>
						<div class=writer_pic<?php show_page_pos($pos_name,'index_column2')?>><?php show_page_img(null,null,0,'image1',null,'alias')?></div>
						<div class=writer_name>
							<a href="<?php echo $pos_items->$pos_name->alias;?>" target="_blank">
								<?php echo $pos_items->$pos_name->display;?>
							</a>	
						</div>	
						<?php for($j=0;$j<1;$j++){
							$pos_name= "index_column_article_{$i}_{$j}";
						?>
						<div class="writer_content" <?php show_page_pos($pos_name,'link_withouttime')?>>
							<?php show_page_href();?>
						</div>
						<?php }?>
					</div>
				<?php } ?>
		</div>
		

		<div class=forbes_r>
			
			<div id=mag>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9;">福布斯杂志</div>
					<a href="/magazine/" class=public_more1 target="_blank"></a>
				</div>
				<?php $pos_name='index_magazine';?>
				<div id=mag_content  <?php show_page_pos($pos_name,'magazine');?>>
						<div class=pic><?php show_page_img()?></div>
						<div class=pictitle><?php show_page_href()?></div>
						<div class=context><?php show_page_desc()?></div>	
			 			<div id=mag_dash></div>
						<div id=sel>
							<select id="old_magazine">
								<?php 
									$magazine = $db->query("SELECT substring(publish_data,1,4) as year FROM fb_magazine group by substring(publish_data,1,4)");
									$year_count = $db->record_count;
									for($i=0;$i<$year_count;$i++){
								?>
								<option value="<?php echo $magazine[$i]->year;?>"><?php echo $magazine[$i]->year;?>年</option>
								<?php }?>
							</select>
							<select id="show_magazine">
								<option value=""></option>
								<?php 
									$magazine = $db->query("select * from fb_magazine where publish_data like '%{$magazine[0]->year}%' order by publish_data");
									$count = $db->record_count;
									for($i=0;$i<$count;$i++){
								?>
									<option url="<?php echo $magazine[$i]->url;?>" value="<?php echo $magazine[$i]->id;?>"><?php echo $magazine[$i]->name;?></option>
								<?php
									}
								?>
							</select>
						</div>
						<a id="btnonline"></a>
						<a id="sq" href="http://www.forbeschina.com/magazine/subscription.php"></a>
						<a id="jr"></a>
				</div>
				<div class=public_bottom1></div>
			</div>
		</div>	
	<?php 
	 include_bottom();
	?>
	</div>
</body>
</html>
