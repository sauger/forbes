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
  		 	 <div id=lujiazui_caption <?php show_page_pos('lujiazui','only_link')?>><a href="<?php echo $pos_items->lujiazui->href;?>" title="<?php echo $pos_items->lujiazui->title;?>" target="_blank">陆家嘴早餐</a><span>Lujiazui Breakfast</span></div>
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
			<div class="title selected">10全球富豪</div>
			<div class=title>09城市榜</div>	
			<div class=title>10慈善榜</div>	
			<div class=title>潜力企业榜</div>
			<div id=phb>
				<div id="rt_tab1" class="rt_tab" style="display:inline;">
					<table cellspacing="0" style="table-layout:auto;">
						<tr>
							<th width="10%" nowrap>排名</th>
							<th width="40%" nowrap>姓名</th>
							<th width="20%" nowrap>国家</th>
							<th width="30%" nowrap>资产(亿美元)</th>
						</tr>
						<?php 
							$list_id = 228;
							$list = $db->query("select table_name from fb_custom_list_type where id=$list_id");
							$table_name = $list[0]->table_name;
							$items = $db->query("select * from {$table_name} limit 10");
							
							for($i=0;$i < 10; $i++){
						?>
							<tr>
								<?php for($j=1;$j<4;$j++){
									$field = "field_{$j}";
								?>
								<td style="color:<?php if($j==2){ echo "#1649A2";}else if($j==3){echo "#000000";} ?>" align="center" nowrap><?php echo $items[$i]->$field;?></td>
								<?php }?>
								<td align="center" nowrap><?php echo $items[$i]->field_5;?></td>
							</tr>						
						<?php }?>
					</table>
				</div>
				<?php $pos_name = "index_ipo"?>
				<div id="rt_tab2" class="rt_tab" <?php show_page_pos($pos_name,'base_img')?>>
					<table cellspacing="0" style="table-layout:auto;">
						<tr>
							<th  nowrap>排名</th>
							<th  nowrap>城市</th>
							<th  nowrap>行政级别</th>
							<th  nowrap>省份</th>
							<th  nowrap>人才指数</th>
							<th  nowrap>R1</th>
						</tr>
						<?php 
							$list_id = 44;
							$list = $db->query("select table_name from fb_custom_list_type where id=$list_id");
							$table_name = $list[0]->table_name;
							$items = $db->query("select * from {$table_name} limit 10");
							
							for($i=0;$i < 10; $i++){
						?>
							<tr>
								<?php for($j=2;$j<8;$j++){
									$field = "field_{$j}";
								?>
								<td style="color:<?php if($j==3){ echo "#1649A2";}else if($j==6){echo "#000000";} ?>" align="center" nowrap><?php echo $items[$i]->$field;?></td>
								<?php }?>
							</tr>						
						<?php }?>
					</table>
				</div>
				<div id="rt_tab3" class="rt_tab">
				<table cellspacing="0">
						<tr>
							<th  nowrap>排名</th>
							<th  nowrap>企业名</th>
							<th  nowrap>董事长</th>
							<th  nowrap>捐款(万元)</th>
							<th  nowrap>总部</th>
						</tr>
						<?php 
							$list_id = 215;
							$list = $db->query("select table_name from fb_custom_list_type where id=$list_id");
							$table_name = $list[0]->table_name;
							$items = $db->query("select * from {$table_name} limit 10");
							
							for($i=0;$i < 10; $i++){
						?>
							<tr>
								<?php for($j=1;$j<6;$j++){
									$field = "field_{$j}";
								?>
								<td style="color:<?php if($j==2){ echo "#1649A2";}else if($j==4){echo "#000000";} ?>" align="center" nowrap><?php echo $items[$i]->$field;?></td>
								<?php }?>
							</tr>						
						<?php }?>
					</table>
				</div>
				<div id="rt_tab4" class="rt_tab">
					<table cellspacing="0">
						<tr>
							<th width="10%" nowrap>排名</th>
							<th width="60%" nowrap>公司名称</th>
							<th width="20%" nowrap>所在地(省)</th>
						</tr>
						<?php 
							$list_id = 147;
							$list = $db->query("select table_name from fb_custom_list_type where id=$list_id");
							$table_name = $list[0]->table_name;
							$items = $db->query("select * from {$table_name} limit 10");
							
							for($i=0;$i < 10; $i++){
						?>
							<tr>
								<td align="center" nowrap><?php echo $i + 1;?></td>
								<td style="color:#1649A2" align="center" nowrap><?php echo $items[$i]->field_4;?></td>
								<td align="center" nowrap><?php echo $items[$i]->field_5;?></td>
							</tr>						
						<?php }?>
					</table>
				</div>
				<div id=bottom>
					<div id=title>榜单动态</div>
					<?php for($i=0;$i<2;$i++){
						$pos_name = "index_dyn_list{$i}"; 
						?>
						<div class=bottom_list<?php show_page_pos($pos_name,'link');?>><?php show_page_href()?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	
		<div class=forbes_l>
			<div class=caption>
				<div class=captions>创业<span>Enterpreneurs</span></div>
				<div class=line>|</div>
				<a href="/investment/" class=more target="_blank"></a>
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
				<div class=captions>科技<span>Tech</span></div>
				<div class=line>|</div>
				<a href="/tech/" class=more target="_blank"></a>
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
				<div class=captions>商业<span>Business</span></div>
				<div class=line>|</div>
				<a href="/business/" class=more target="_blank"></a>
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
				<div class=captions>专栏<span>Columns</span></div>
				<div class=line>|</div>
				<a href="/column/" class=more target="_blank"></a>
			</div>
			<div class=forbes_l_content>
				<div id=column_btnl style="background:none; cursor:auto;"></div>
				<div id="column_box">
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
				<div class=captions>读者高见<span>Readers Say</span></div>
				<div class=line>|</div>
				<a href="/comments/comments.php" class=more target="_blank"></a>
			</div>
			<?php 
				$comments = $db->query("select * from fb_comment where resource_type='news' and is_approve=1 order by priority asc,created_at desc limit 4");
				$news = new table_class('fb_news');
				for($i=0;$i<4;$i++){
					$news->find($comments[$i]->resource_id);
			?>
			<div class=context style="overflow: hidden;"><a href="#"><?php echo $comments[$i]->comment?></a></div>
			<div class=context1><a href="#"><?php echo $comments[$i]->nick_name;?></a>　|　<a href="<?php echo get_news_url($news);?>" target="_blank" title="<?php echo $news->title;?>"><?php echo $news->short_title;?></a></div>
			<?php }?>
		</div>
		
		<div class=forbes_l style="margin-left:25px;">
			<div class=caption>
				<div class=captions>投资<span>Money & Investment</span></div>
				<div class=line>|</div>
				<a href="/investment/" class=more target="_blank"></a>
			</div>
			<div id=forbes_l_content>
			 	<div class=list1 >
					<div class=list1_title <?php $pos_name ="index_invest0"; show_page_pos($pos_name,'base_img')?>><?php show_page_href();?></div>
					<div class=list1_description2>
						<a class=list1_pic href="<?php echo $pos_items->index_invest0->href;?>" target="_blank"><img border=0 width=70 height=70 src="<?php echo $pos_items->index_invest0->image1;?>"></a><p style="width:10px; height:51px; float:left;"></p><?php show_page_desc('index_invest0');?></a>
					</div>
					<?php for($i=1;$i<=5;$i++){ $pos_name = "index_invest".$i;?>
						<div class=list2 style="margin-left:3px;" <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
					<?php } ?>
				</div>
			</div>	
			<div class=dashed style="height:15px;"></div>

	  	<div class=caption>
				<div class=captions>生活<span>Life</span></div>
				<div class=line>|</div>
				<a href="/life/" class=more target="_blank"></a>
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
		</div>
		
		
		<div class=forbes_r>
			<div id=dictionary>
				<div id=dictionary_l <?php $pos_name ="dictionary_l_content1"; show_page_pos($pos_name,'dictionary');?>><?php show_page_href()?></div>
				<div id=dictionary_r>
					<div class=content <?php $pos_name ="dictionary_r_content1"; show_page_pos($pos_name,'dictionary');?>><?php show_page_href()?></div>
					<div class=content <?php $pos_name ="dictionary_r_content2"; show_page_pos($pos_name,'dictionary');?>><?php show_page_href()?></div>
					<div class=content></div>
				</div>
			</div>

			<div id=activity>
				<div class=public_top1>
					<div class=public_caption1>论坛活动<span>Conferences</span></div>
					<a href="/event" target=_blank class=public_more1></a>
				</div>
				<?php $pos_name = 'index_event';?>
				<div class=public_box1 <?php show_page_pos($pos_name,'index_event');?>>
					<div id=images><img src="<?php echo $pos_items->$pos_name->image1;?>" width="260" height="90"/></div>
					<div id=context>
						<span style="font-size:13px; font-weight:bold; color:#333385"><?php echo $pos_items->$pos_name->display;?></span><br>举办日期：<?php echo $pos_items->$pos_name->reserve;?><br>地点：<?php echo $pos_items->$pos_name->title;?></div>
						<div id=info><a target="_blank" href="<?php echo $pos_items->$pos_name->href;?>" target="_blank">查看详细</a></div>	
				</div>
				<div class=public_bottom1></div>
			</div>
			
			<div id=club>
					<div class=club_caption1>增长会<span>Up</span></div>
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
						<div class=bottom_l><a href='/investor/sign.php'>我要报名</a></div>
						<div class=bottom_r>
							<a href='/search/investor.php'>VC/PE/天使人投资人数据库</a>
						</div>	
					</div>
			</div>
			
			
			
			<div id=city>
					<div class=city_caption1>城市<span>Best Cities</span></div>
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
						<div class=bottom_l><a href="">城市榜</a></div>
						<?php $pos_name = 'index_city2';?>
						<div class=bottom_r <?php show_page_pos($pos_name,'link');?>>
							<?php show_page_href();?>
						</div>	
					</div>
			</div>
		</div>
		
		
		<div class="c_r_img ad_banner" id="index_middle_banner">
			<a href="" target="_blank"><img border=0 src="images/other/bannwe-for.jpg"></a>
		</div>
		
		
		<div class=forbes_l style="margin-left:25px;">
    	<div class=caption>
				<div class="caption_base captions caption_selected" id="cls_cpt1">最受欢迎<span>Most Popular</span></div>
				<div class=line>|</div>
				<div class="caption_base" id="cls_cpt2">编辑推荐<span>Reference</span></div>
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
					<div class=public_caption1 style="color:#4990B9;">在线调查<span>Survey</span></div>
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
					<div class=captions>采编空间<span>Bloggers</span></div>
					<div class=line>|</div>
					<a href="/column/" class=more target="_blank"></a>
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
					<div class=public_caption1 style="color:#4990B9;">福布斯杂志<span>Magazine Archive</span></div>
					<a href="/magazine/" class=public_more1 target="_blank"></a>
				</div>
				<?php $pos_name='index_magazine';?>
				<div id=mag_content  <?php show_page_pos($pos_name,'magazine');?>>
						<div class=pic><?php show_page_img()?></div>
						<div class=pictitle><?php show_page_href()?></div>
						<div class=context><?php show_page_desc()?></div>	

			 			 <div id=mag_dash></div>

						<div id=search>往期杂志查阅</div>
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
						<a id="sq"></a>
						<div id=ck><a href="/magazine/" target="_blank">查看杂志列表>></a></div>

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
