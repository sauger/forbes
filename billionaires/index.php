<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="富豪"');
	$nav=$nav[0]->id;	
	$seo=$db->query('select * from fb_seo where name="富豪首页"');	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-富豪首页</title>
	<?php
		use_jquery();
		js_include_tag('public','right','search/rich');
		css_include_tag('public','billionaires','right_inc');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
	<? include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="#">富豪</a></div>
		<div id=bread_line></div>
		<div id=billionaires_left>
			<div id=billionaires_head_left></div>
			<?php 
					$pos_name = "richindex_head";
							
			?>
			<div id=billionaires_head <?php show_page_pos($pos_name); ?>>
				<div id=pic>
					<img border=0 src="<?php echo $pos_items->$pos_name->image1;?>" alt="<?php echo $pos_items->$pos_name->title;?>"/>
					<div id=flash></div>
					<div id=flash_t>
						<div id=flash_t_l></div>
						<div id=flash_t_r><?php show_page_href('index_hl_0');?></div>
					</div>
					<div id=flash_b>
						<div id=content>
							 <?php show_page_desc();?>	
						</div>	
					</div>
				</div>
			</div>	

			<div id=billionaires_head_right></div>
			<div id=billionaires_ranking>
				<div class=ranking_top_title><?php $url = ($page_type == 'static')? '/billionaires/top': 'top.php' ?><a href="<?php echo $url;?>" target="_blank">动态富豪榜-富豪个人财富价值排名 <?php echo date('n月j日',strtotime("-1 day"))?></a></div>
				<div class=ranking_top_content>
					<div id=c_title>
						<div class=pm>排名</div><div class="sx"></div><div class=name>姓名</div><div class="sx"></div><div class=cfs>财富（亿）</div><div class="sx"></div><div class=sex>性别</div><div class="sx"></div><div class=age>年龄</div><div class="sx"></div><div class=cmpname>公司名</div>
					</div>
					<div class=c_content>
						<?php
						$db = get_db();
						$gender = array("女","男","未知");
						$items = $db->query("select a.richer_id,a.fortune,a.name,b.gender,b.birthday,d.company_id,group_concat(c.name SEPARATOR '、') as company from fb_dynamic_fortune_list a left join fb_rich b on a.richer_id = b.id left join fb_rich_company d on a.richer_id=d.rich_id left join fb_company c on d.company_id = c.id group by a.richer_id order by current_index asc limit 4");
						for($i=0;$i<$db->record_count;$i++){
							$year = intval(substr($items[$i]->birthday,0,4));
							$age = $year > 0 ? date('Y') - $year : '未知';
						?>
						<div class=pm><?php echo $i+1;?>.</div><div class="sx"></div><div class=name><?php echo $items[$i]->name;?></div><div class="sx"></div><div class=cfs><?php echo $items[$i]->fortune;?></div><div class="sx"></div><div class=sex><?php echo $gender[$items[$i]->gender]?></div><div class="sx"></div><div class=age><?php echo $age;?></div><div class="sx"></div><div class=cmpname><?php echo $items[$i]->company?></div>
						<div class=dash></div>
						<?php }?>
					</div>
					<div id=moreinfo>
						<a href="<?php echo $url;?>" target="_blank"><button></button></a>
					</div>
					<div class=ranking_dash></div>
					<div class=caption>
						<div class=captions>图片富豪榜</div>
						<div class=line>|</div>
						<a href="" target="_blank" class=more></a>
					</div>
					<div class=ranking_bottom_left_content>
						<?php for($i=0;$i<3;$i++){
							$pos_name = "richindex_piclist_{$i}";
						?>
							<div class=context <?php show_page_pos($pos_name)?>>
								<div class=sj><img src="/images/fh/icon2.jpg"></div>
								<div class=l_m_l_context><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a></div>
							</div>
						<?php } ?>
					</div>
					<div class=ranking_bottom_right_content>
						<?php for($i=3;$i<6;$i++){ 
							$pos_name = "richindex_piclist_{$i}";
						?>
							<div class=context <?php show_page_pos($pos_name)?>>
								<div class=sj><img src="/images/fh/icon2.jpg"></div>
								<div class=l_m_l_context><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a></div>
							</div>
						<?php } ?>
					</div>
					<div class=ranking_dash></div>
					<div id=ranking_image>
						<?php for($i=0;$i<5;$i++){ 
							$pos_name = "richindex_picture_{$i}";
						?>
						<div class=ranking_image_content <?php show_page_pos($pos_name)?>>
							<div class=pic><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><img border=0 src="<?php echo $pos_items->$pos_name->image1?>"></a></div>
							<div class=piccontent>
								<a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><span style="font-weight:bold;"><?php echo $pos_items->$pos_name->display;?></span><br><?php echo $pos_items->$pos_name->description;?></a>	
							</div>
						</div>
						<?php } ?>	
					</div>
				</div>
			</div>
				<div id=billionaires_search>
					<div class="search_title">富豪检索</div>
					<div class=search_content_l></div>
					<div class="search_content_r">
						<div class=content>
							<div class=search_content_r_l>富豪姓名</div>
							<div class=search_content_r_r>
								<input type="text" id="name" />
							</div>
						</div>
						<div class=content>
							<div class=search_content_r_l>年 龄 段</div>
							<div class=search_content_r_r>
								<select id="year">
									<option value=""></option>
									<option value="1">20岁以下</option>
									<option value="2">20-30岁</option>
									<option value="3">30-40岁</option>
									<option value="4">40-50岁</option>
									<option value="5">50-60岁</option>
									<option value="6">60-80岁</option>
									<option value="7">80岁以上</option>
								</select>
							</div>
						</div>
						<div class=content>
							<div class=search_content_r_l>资产规模</div>
							<div class=search_content_r_r>
									<select id="asset">
										<option value=""></option>
										<option value="1">5000万人民币以下</option>
										<option value="2">0.5-1亿人民币</option>
										<option value="3">1-10亿人民币</option>
										<option value="4">10-50亿人民币</option>
										<option value="5">50-100亿人民币</option>
										<option value="6">100亿人民币以上</option>
									</select>
							</div>
						</div>
						<div class=content>
							<div class=search_content_r_l>国　　籍</div>
							<div class=search_content_r_r>
								<select id="nationality">
									<option value=""></option>
									<?php 
										$country = $db->query("select country from fb_rich group by country");
										$count = $db->record_count;
										for($i=0;$i<$count;$i++){
									?>
									<option value="<?php echo $country[$i]->country;?>"><?php echo $country[$i]->country;?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class=content>
							<div class=search_content_r_l>行　　业</div>
							<div class=search_content_r_r>
								<select id="industry">
									<option value=""></option>
									<?php 
										$industry = $db->query("select * from fb_industry");
										$count = $db->record_count;
										for($i=0;$i<$count;$i++){
									?>
									<option value="<?php echo $industry[$i]->name;?>"><?php echo $industry[$i]->name;?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class=content><button id="search"></button></div>
					</div>
					<div id=search_pic2>
						<a href=""><img border=0 src="/images/fh/four.jpg"></a>	
					</div>
				</div>
			</div>
			<div id=billionaires_lists>
				<div id=billionaires_lists_top>
					<div class=title>
						<div class=wz>富豪榜单</div>
						<div class=more><a href="/list/list.php?id=1" target="_blank"><img border=0 src="/images/public/public_more1.jpg"></a></div>	
					</div>
					<div id=content>
						<?php for($i=0; $i<8; $i++){
							$pos_name = "richindex_richlist_{$i}"; 
						?>
						<div class=context <?php show_page_pos($pos_name)?>>
							<div class=point></div>
							<div class=cl><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id=billionaires_lists_bottom>
					<div class=title>
						<div class=wz>2008年度中国富豪榜</div>
						<div class=more><a href="/list/list.php?id=1" target="_blank"><img border=0 src="/images/public/public_more1.jpg"></a></div>	
					</div>
					<?php $pos_name = "richindex_list_0";?>
					<div class=content1 <?php show_page_pos($pos_name,'rich')?>>
						<div class=pic1>
							<?php show_page_img();?>
						</div>
						<div class=piccontent1 >
							<a href=""><span style="font-weight:bold; color:#333333;"><?php echo $pos_items->$pos_name->display?></span><br><?php echo $pos_items->$pos_name->description?><br><?php echo $pos_items->$pos_name->alias?></a>	
						</div>
						<div class=num1></div>
					</div>
					<?php for($i=2;$i<16;$i++){ 
						$pos_name = "richindex_list_{$i}";
					?>
					<div class=content2>
						<div class=name>
							<?php echo $pos_items->$pos_name->display?>
						</div>
						<div class=zc>
							<?php echo $pos_items->$pos_name->alias;?>
						</div>
						<div class=num<?php echo $i;?>></div>
					</div>
					<?php } ?>
					<div id=billionaires_inventory>富豪清单　<select></select></div>
					<div id=lists>
						<a href="" style="color:#0f78b0;">排名</a>　　<a href="">姓名</a>　　<a href="">名开头字母顺序</a>	
						<a href="">年龄</a>　　<a href="">资产规则</a>　　<a href="">城市区域</a>	
					</div>
				</div>
			</div>
			<div id=billionaires_m>
					<a href=""><img border=0 src="/images/fh/six.jpg"></a>
			</div>
			<div id=billionaires_report>
				<div class=caption>
					<div class=captions>财富报道</div>
				</div>
				<div id=billionaires_report_left>
					<?php 
					for($i=0;$i<3;$i++){
						$pos_name = "richindex_news_{$i}";
					?>
					<div class=content <?php show_page_pos($pos_name)?> <?php if($i>0) echo' style="margin-top:40px;"';?>>
							<div class=content_title><a href="<?php echo $pos_items->$pos_name->href?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a></div>
							<div class=content_jz>记者:<?php echo $pos_items->$pos_name->alias;?></div>
							<div class=content_content><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->description;?></a></div>
					</div>	
					<?php }?>
				</div>
				<div id=billionaires_report_right>
					<?php 
					for($i=3;$i<6;$i++){
						$pos_name = "richindex_news_{$i}";
					?>
					<div class=content <?php show_page_pos($pos_name)?> <?php if($i>3) echo' style="margin-top:40px;"';?>>
							<div class=content_title><a href="<?php echo $pos_items->$pos_name->href?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a></div>
							<div class=content_jz>记者:<?php echo $pos_items->$pos_name->alias;?></div>
							<div class=content_content><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->index_hl_0->title;?>" target="_blank"><?php echo $pos_items->$pos_name->description;?></a></div>
					</div>	
					<?php }?>
				</div>
			</div>
			<div id=billionaires_b_dash></div>
			<div id=billionaires_say>
				<div class=caption>
					<div class=captions>创富者说</div>
				</div>
				<?php for($i=0;$i<3;$i++){ 
					$pos_name = "richindex_news1_{$i}";
				?>
				<div class=billionaires_say_content <?php show_page_pos($pos_name)?>>
					<div class=pic><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1;?>"></a></div>
					<div class=pictitle><a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a></div>
					<div class=piccontent><a href="">　　<?php echo $pos_items->$pos_name->description;?></a></div>
				</div>
				<?php } ?>
				<div id=billionaires_say_dash></div>
				<div id="right_inc" style="margin-top:10px;">
				  		<?php include dirname(__FILE__)."/../right/article.php";?>
				 </div>
				
			</div>
			<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
		</div>
	</body>
</html>