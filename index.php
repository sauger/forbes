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
		js_include_tag('index_two','public','jquery.colorbox-min.js');
		css_include_tag('index_two','public','colorbox');
		global $pos_items;
		init_page_items();
		$category = new category_class('news');
	?>
</head>
<body>
	<div id=ibody>
	<?php
		include_top();
	?>
		<div id="content">
			<div id="content_left">
				<div id="content_banner_left">
					<div id="qie_img" class="edit_pri">
						<?php for($i=0;$i<5;$i++){
							$pos_name = 'index_hl_'.$i;
						?>
						<div class="top_img" <?if($i!=0){?>style="display:none;"<?php }?>>
							<?php show_page_img();?>
						</div>
						<div class="top_box" <?if($i!=0){?>style="display:none;"<?php }?>>
							<div class="top_title" <?php show_page_pos($pos_name,'base_img_withoutime');?>><?php show_page_href();?></div>
							<div class="top_desc"><?php show_page_desc();?></div>
							<?php for($j=0;$j<2;$j++){$pos_name = "index_hl".$j."_r".$i;?>
							<div class="top_news" <?php show_page_pos($pos_name,'link_withouttime');?>><?php show_page_href();?></div>
							<?php }?>
						</div>
						<?php }?>
						<div id="top_num">
							<div class="select_top_num">1</div>
							<div class="normal_top_num">2</div>
							<div class="normal_top_num">3</div>
							<div class="normal_top_num">4</div>
							<div class="normal_top_num">5</div>
						</div>
					</div>
					<div id="qie_menu" class="edit_pri">
						<a id="zt_prev" href=""><img id="qie_img_left" src="/images/index_two/btn_l.jpg"/></a>
						<div id="qie_banner">
							<?php for($i = 0 ; $i < 7 ; $i++){ $pos_name = "index_sub".$i;?>
							<div <?php show_page_pos($pos_name,'index_subject');?> class="qie_banner">
								<div class="qie_banner_top"><?php echo "<a href='{$pos_items->$pos_name->reserve}' title='{$pos_items->$pos_name->alias}' target='_blank'>{$pos_items->$pos_name->alias}</a>";?></div>
								<div class="qie_banner_img"><?php show_page_img();?></div>
								<div class="qie_banner_value"><?php show_page_href();?></div>
							</div>
							<?php }?>
						</div>
						<a id="zt_next" href=""><img id="qie_img_right" src="/images/index_two/btn_r.jpg"/></a>
					</div>
				</div>
				<div id="content_banner_right">
					<div class="ljz">
						<div class="ljz_title"><a target="_blank" href="review/list/146">陆家嘴早餐<img class="ljz_icon" src="/images/index_two/ljz_icon.gif"></a></div>
						<?php for($i=0;$i<2;$i++){$pos_name = "index_zczx_".$i;?>
						<div class="guide_hr_val2" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
						<div class="ljz_news" <?php $pos_name = "index_jjjl0";show_page_pos($pos_name,'link_withouttime')?>>
							<a class="ljz_cate" href="review/list/145">基金经理看市<img class="ljz_icon" src="/images/index_two/ljz_icon.gif"></a>
							<a class="ljz_ntitle" title="<?php echo $pos_items->$pos_name->title;?>" target="_blank" href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a>
						</div>
						<div class="ljz_news" <?php $pos_name = "index_gpzx0";show_page_pos($pos_name,'link_withouttime')?>>
							<a class="ljz_cate" href="review/list/147">股票之选<img class="ljz_icon" src="/images/index_two/ljz_icon.gif"></a>
							<a class="ljz_ntitle" title="<?php echo $pos_items->$pos_name->title;?>" target="_blank" href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a>
						</div>
					</div>
					<div class="ljz" style="margin-top:8px;">
						<div class="ljz_title">精华导读</div>
						<?php for($i=1;$i<6;$i++){$pos_name = "index_jhdd_".$i;?>
						<div class="guide_hr_val2" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
					</div>
				</div>
				<div id="content_left_c">
					<div class="normal_box"  style="margin-top:0;">
						<div class="normal_title"><div>富豪</div><a href="/billionaires/">[...更多]</a>
						</div>
						<?php $pos_name = 'index_rich1';?>
						<div class="li_top" <?php show_page_pos($pos_name);?>>
							<div class="li_img_pg"><?php show_page_img();?></div>
							<div class="rich_right">
								<div class="li_img_title"><?php show_page_href();?></div>	
								<div class="li_img_value">
									<?php
										if(mb_strlen($pos_items->$pos_name->display,'utf-8')>13){
									?>
										<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),37);?></a>
									<?php }else{?>
										<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),50);?></a>
									<?php 	
										}
									?>
								</div>
							</div>
						</div>
						<?php
							$c_id = $category->children_map(42);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 2");
							foreach($news as $v){
						?>
						<div class="guide_hr_val2">
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="normal_box">
						<div class="normal_title"><div>CEO</div><a href="/review/list/151">[...更多]</a>
						</div>
						<?php $pos_name = 'index_ceo1';?>
						<div class="li_top" <?php show_page_pos($pos_name);?>>
							<div class="li_img_pg"><?php show_page_img();?></div>
							<div class="rich_right">
								<div class="li_img_title"><?php show_page_href();?></div>	
								<div class="li_img_value">
									<?php
										if(mb_strlen($pos_items->$pos_name->display,'utf-8')>13){
									?>
										<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),37);?></a>
									<?php }else{?>
										<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),50);?></a>
									<?php 	
										}
									?>
								</div>
							</div>
						</div>
						<?php
							$c_id = $category->children_map(151);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 2");
							!$news && $news = array();
							foreach($news as $v){
						?>
						<div class="guide_hr_val2">
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="normal_box">
						<div class="normal_title"><div>创业</div><a href="/entrepreneur/">[...更多]</a></div>
						<?php 
							$c_id = $category->children_map(2,false);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 7");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 6){ echo 'style="margin-bottom:15px;"';}?>>
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<div class="normal_title"><div>投资</div><a href="/investment/">[...更多]</a></div>
						<?php 
							$c_id = $category->children_map(5,false);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 7");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 6){ echo 'style="margin-bottom:15px;"';}?>>
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<div class="normal_title"><div>商业</div><a href="/business/">[...更多]</a></div>
						<?php 
							$c_id = $category->children_map(3,false);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 5");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2">
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<?php 
							for($i=1;$i<3;$i++){
								$pos_name = 'index_business'.$i;
						?>
						<div class="guide_hr_val2" <?php show_page_pos($pos_name,'link_withouttime')?> <?php if($i == 2){ echo 'style="margin-bottom:15px;"';}?>>
							<a target="_blank" href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->$pos_name->title;?>"><?php echo $pos_items->$pos_name->title;?></a>
						</div>
						<?php }?>
						<div class="normal_title"><div>科技</div><a href="/tech/">[...更多]</a></div>
						<?php 
							$c_id = $category->children_map(4,false);
							$c_id = implode(',',$c_id);
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 7");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2">
							<a target="_blank" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="normal_box">
						<div class="normal_title"><div>最受欢迎文章</div></div>
						<div id="day">
						<div id="_day" style="border-left:0px solid #A4A4A4; color:#A50203;">一天</div>
						<div id="_week">一周</div>
						<div id="_month">一月</div>
					</div>
					<?php 
						$day = $db->query("select id,title,created_at from fb_news where date(created_at) = date_sub(curdate(), interval 1 day) and is_adopt=1 group by title order by click_count desc limit 10");
						$week = $db->query("select id,title,created_at from fb_news where DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_at) and is_adopt=1 group by title order by click_count desc limit 10");
						$month = $db->query("select id,title,created_at from fb_news where DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= date(created_at) and is_adopt=1 group by title order by click_count desc limit 10");
						!$day && $day = array();
						!$week && $week = array();
						!$month && $month = array();
						foreach($day as $k => $v){
					?> 
					<div class="day_banner favor_day">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h2"></div>
						<?php }?>
					</div>
					<?php }?>
					<?php foreach($week as $k => $v){
					?> 
					<div class="day_banner favor_week" style="display:none;">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h2"></div>
						<?php }?>
					</div>
					<?php }?>
					<?php foreach($month as $k => $v){
					?> 
					<div class="day_banner favor_month" style="display:none;">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h2"></div>
						<?php }?>
					</div>
					<?php }?>
					</div>
					<div class="normal_box">
						<div class="normal_title"><div>广告链接</div></div>
						<?php for($i=1;$i<9;$i++){ $pos_name = 'index_ad_'.$i;?>
							<div class="bottom_kdiv" <?php show_page_pos($pos_name,'link');?>>
							<?php show_page_href();?>
							</div>
						<?php }?>
					</div>
				</div>
				<div id="content_right">
					<div class="center_box">
						<div class="normal_title"><div>观点</div><a target="_blank" href="/column/">[...更多]</a></div>
						<?php 
						$ids = array();
						for($i=0;$i<3;$i++){
						$nid = '('.implode(',',$ids).')';
						if($ids){
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t1.publisher not in $nid and t2.role_name='column_writer' and (t1.copy_from is null or t1.copy_from=0) and t1.is_adopt=1 order by t1.created_at desc");
						}else{
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t2.role_name='column_writer' and (t1.copy_from is null or t1.copy_from=0) and t1.is_adopt=1 order by t1.created_at desc");
						}
						$ids[]=$item[0]->publisher;
						?>
						<div class="column_box">
							<div class="column_photo"><a target="_blank" href="<?php echo "/column/".$item[0]->name;?>"><img src="<?php echo $item[0]->image_src;?>"></a></div>
							<div class="column_title">
								<a target="_blank" style="color:#057FE4" href="<?php echo "/column/".$item[0]->name;?>"><?php echo $item[0]->author;?></a>
								<a target="_blank" title="<?php echo strip_tags($item[0]->title);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo $item[0]->title;?></a>
							</div>
							<div class="colum_desc">
								<?php 
									if((mb_strlen($item[0]->name,'utf-8')+mb_strlen($item[0]->author,'utf-8'))>14){
								?>
								<a target="_blank" title="<?php echo strip_tags($item[0]->description);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo mb_string(strip_tags($item[0]->description),25);?></a>
								<?php }else{?>
								<a target="_blank" title="<?php echo strip_tags($item[0]->description);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo mb_string(strip_tags($item[0]->description),40);?></a>
								<?php }?>
							</div>
						</div>
						<?php }?>
						<?php 
						for($i=0;$i<5;$i++){
							$nid = '('.implode(',',$ids).')';
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t1.publisher not in $nid and t2.role_name='column_writer' order by t1.created_at desc;");
							$ids[]=$item[0]->publisher;
						?>
						<div class="guide_hr_val2">
							<a target="_blank" style="color:#057FE4" href="<?php echo "/column/".$item[0]->name;?>"><?php echo $item[0]->author;?></a>
							<a target="_blank" style="margin:0;" title="<?php echo strip_tags($item[0]->title);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo $item[0]->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="center_box">
						<div id="lift_left"><div>生活</div><a target="_blank" href="/life/">[...更多]</a></div>
						<div id="index_little" class="ad_banner"></div>
						<div class="pho_banner" <?php $pos_name = 'index_life1';show_page_pos($pos_name,'base_img_withoutime');?>>
							<div class="pho_pg"><?php show_page_img();?></div>
							<div class="pho_title">
								<?php show_page_href();?>
							</div>
							<div class="pho_value">
								<?php
									if(mb_strlen($pos_items->$pos_name->display,'utf-8')>13){
								?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),24);?></a>
								<?php }else{?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),38);?></a>
								<?php 	
									}
								?>
							</div>
						</div>
						<div class="h_h"></div>
						<div class="pho_banner" <?php $pos_name = 'index_life2';show_page_pos($pos_name,'base_img_withoutime');?>>
						<div id="life_box">
							<div class="pho_title">
								<?php show_page_href();?>
							</div>
							<div class="pho_value">
								<?php
									if(mb_strlen($pos_items->$pos_name->display,'utf-8')>13){
								?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),24);?></a>
								<?php }else{?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),34);?></a>
								<?php 	
									}
								?>
							</div>
						</div>	
							<div class="pho_pg"><?php show_page_img();?></div>
						</div>
						<div class="h_h"></div>
						<div class="pho_banner" <?php $pos_name = 'index_life3';show_page_pos($pos_name,'base_img_withoutime');?>>
							<div class="pho_pg"><?php show_page_img();?></div>
							<div class="pho_title">
								<?php show_page_href();?>
							</div>
							<div class="pho_value">
								<?php
									if(mb_strlen($pos_items->$pos_name->display,'utf-8')>13){
								?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),24);?></a>
								<?php }else{?>
									<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),34);?></a>
								<?php 	
									}
								?>
							</div>
						</div>
						<div class="h_h"></div>
						<?php
							$c_ids = $category->children_map(81);
							$c_id = implode(',',$c_ids);
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) and is_adopt=1 group by title order by created_at desc limit 3");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val" <?php if($i==0){?>style="margin-top:15px;"<?php }?>><a href="<?php echo get_news_url($v);?>"><?php echo $v->title;?></a></div>
						<?php }?>
					</div>
					<div id=dictionary>
						<div id="dictionary_t"><a href="<?php echo get_newslist_url($category->find_by_name('财经词典')->id);?>" target="_blank">财经词典</a></div>
						<div id=dictionary_r>
							<div id=content2 <?php $pos_name ="dictionary_r_content1"; show_page_pos($pos_name,'dictionary');?>><?php show_page_href()?></div>
							<div id=content3 <?php #$pos_name ="dictionary_r_content2"; #show_page_pos($pos_name,'dictionary');?>><?php show_page_desc()?></div>
						</div>
					</div>
					<div class="center_box">
						<div class="normal_title"><div>采编空间</div><a target="_blank" href="/column/journalist">[...更多]</a></div>
						<?php 
						$ids = array();
						for($i=0;$i<3;$i++){
						$nid = '('.implode(',',$ids).')';
						if($ids){
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t1.publisher not in $nid and t2.role_name='column_editor' and (t1.copy_from is null or t1.copy_from=0) and t1.is_adopt=1 order by t1.created_at desc;");
						}else{
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t2.role_name='column_editor' and (t1.copy_from is null or t1.copy_from=0) and t1.is_adopt=1 order by t1.created_at desc;");
						}
						if($item){
							$ids[]=$item[0]->publisher;
						}
						?>
						<div class="column_box">
							<div class="column_photo"><a target="_blank" href="<?php echo "/column/".$item[0]->name;?>"><img src="<?php echo $item[0]->image_src;?>"></a></div>
							<div class="column_title">
								<a target="_blank" style="color:#057FE4" href="<?php echo "/column/".$item[0]->name;?>"><?php echo $item[0]->author;?></a>
								<a target="_blank" title="<?php echo strip_tags($item[0]->title);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo $item[0]->title;?></a>
							</div>
							<div class="colum_desc">
								<?php 
									if((mb_strlen($item[0]->name,'utf-8')+mb_strlen($item[0]->author,'utf-8'))>14){
								?>
								<a target="_blank" title="<?php echo strip_tags($item[0]->description);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo mb_string(strip_tags($item[0]->description),25);?></a>
								<?php }else{?>
								<a target="_blank" title="<?php echo strip_tags($item[0]->description);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo mb_string(strip_tags($item[0]->description),40);?></a>
								<?php }?>
							</div>
						</div>
						<?php }?>
						<?php 
						for($i=0;$i<5;$i++){
							$nid = '('.implode(',',$ids).')';
							$item = $db->query("select t1.*,t2.name,t2.image_src from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t1.publisher not in $nid and t2.role_name='column_editor' order by t1.created_at desc;");
							$ids[]=$item[0]->publisher;
						?>
						<div class="guide_hr_val2">
							<a target="_blank" style="color:#057FE4" href="<?php echo "/column/".$item[0]->name;?>"><?php echo $item[0]->author;?></a>
							<a target="_blank" style="margin:0;" title="<?php echo strip_tags($item[0]->title);?>" href="<?php echo column_article_url($item[0]->name,$item[0],'static')?>"><?php echo $item[0]->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="center_box">
						<div class="normal_title"><div>读者高见</div></div>
						<?php 
							$comments = $db->query("select * from fb_comment where resource_type='news' and is_approve=1 order by priority asc,created_at desc limit 4");
							$news = new table_class('fb_news');
							for($i=0;$i<4;$i++){
								$news->find($comments[$i]->resource_id);
						?>
						<div class="con_ban_title">
							<a target="_blank" href="http://www.forbeschina.com<?php echo static_news_url($news) ."/comments/{$comments[$i]->id}"?>"><?php echo mb_string(htmlspecialchars($comments[$i]->comment),35);?></a>
						</div>
						<div class="con_ban_value">
							<?php echo $comments[$i]->nick_name;?>　|　<a href="<?php echo get_news_url($news);?>" target="_blank" title="<?php echo $news->title;?>"><?php echo $news->short_title;?></a>
						</div>
						<?php if($i != 3){?>
						<div class="h_h"></div>
						<?php }}?>
					</div>
				</div>
			</div>
			
				
			<div id="contentc_right">
				<div class="right_box edit_pri" style="margin:0;" id="forbes_trt">
					<div class="normal_title"><div>精华榜单推荐</div><a target="_blank" href="/list/">[...更多]</a></div>
					<div class="content_right_banner">
						<div id="recommend_banner">
							<div class="recommend_title" id="recommend_left" <?php $pos_name = "index_right_list1";show_page_pos($pos_name,'link_img');?>><?php show_page_href();?></div>	
							<div class="recommend_title recommend_center" <?php $pos_name = "index_right_list2";show_page_pos($pos_name,'link_img');?>><?php show_page_href();?></div>
							<div class="recommend_title recommend_center" <?php $pos_name = "index_right_list3";show_page_pos($pos_name,'link_img');?>><?php show_page_href();?></div>
							<div class="recommend_title" id="recommend_right" <?php $pos_name = "index_right_list4";show_page_pos($pos_name,'link_img');?>><?php show_page_href();?></div>	
						</div>
						<div id="recommend_btn">
							<?php for($i=1;$i<5;$i++){$pos_name = "index_right_list".$i;?>
							<a <?php if($i==1){?>style="display:inline;"<?php }?> href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->title;?></a>
							<?php }?>
						</div>
						<?php for($i=1;$i<5;$i++){$pos_name = "index_right_list".$i;?>
						<div class="rt_tab" <?php if($i==1){?>style="display:block;"<?php }?>><?php show_page_img();?></div>
						<?php }?>
						<div class="normal_title" style="margin-top:10px;"><div>阳光财富观察</div><a target="_blank" href="/review/list/121">[...更多]</a></div>
						<?php for($i=1;$i<3;$i++){
							$pos_name = "index_dyn_list{$i}"; 
							?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
						<?php }?>
					</div>
				</div>
				<div id="both_button">
					<a href="/images/register/email.jpg" class="colorbox"><img src="/images/index_two/index_yl.jpg"></a>
					<a href="/user/user_order.php"><img style="margin-left:2px;" src="/images/index_two/index_dy.jpg"></a>
				</div>
				<div id="right_img" class="ad_banner">
				</div>
				<div class="right_box">
					<div class="normal_title"><div>理财师园地</div></div>
					<?php $pos_name="index_lcs";?>
					<div class="photo_banner">
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
					</div>
					<div class="photo_value_s"<?php show_page_pos($pos_name,'index_subject');?>>
						<div class="photo_title"><?php show_page_href();?></div>	
						<div class="photo_value_v"><?php show_page_desc();?></div>
					</div>
					<div class="h_h"></div>
					<div class="teacher_btn1"><a target="_blank" href="http://www.forbeschina.com/event/lcs/list_1.html">更多理财师&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a target="_blank" href="http://www.forbeschina.com/event/lcs/">更多咨询&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a target="_blank" href="http://www.forbeschina.com/event/lcs/EntryForm.php">报名理财师&nbsp;&nbsp;</a></div>
				</div>
				<div class="right_box">
					<div class="normal_title"><div>增长会</div></div>
					<?php $pos_name="index_zzh";?>
					<div class="photo_banner">
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
					</div>
					<div class="photo_value_s"<?php show_page_pos($pos_name,'index_subject');?>>
						<div class="photo_title"><?php show_page_href();?></div>	
						<div class="photo_value_v"><?php show_page_desc();?></div>
					</div>
					<div class="h_h"></div>
					<div class="teacher_btn1"><a href="">理事风采&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a href="">会员互动&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a href="">加入增长会&nbsp;&nbsp;</a></div>
				</div>
				
				<div id="right_m_img" class="ad_banner"></div>
				<div class="right_box">
					<div class="normal_title"><div>城市</div><a target="_blank" href="/city/">[...更多]</a></div>
					<?php $pos_name = "index_city0"; ?>
					<div class="city">
						<?php show_page_href();?>
					</div>
					<div class="city_desc">
						<a href='<?php echo $pos_items->$pos_name->href;?>' title='<?php echo strip_tags($pos_items->$pos_name->description)?>' target='_blank'><?php echo mb_string(strip_tags($pos_items->$pos_name->description),34);?></a>
					</div>
					<div class="h_h"></div>
					<?php for($i=1;$i<3;$i++){$pos_name = "index_city{$i}";?>
					<div class="guide_hr_val2 "><?php show_page_href();?></div>
					<?php }?>
					
					<?php for($i = 3 ; $i < 5 ; $i++){$pos_name = "index_city{$i}";?>
					<div class="pp_4_banner" <?php if($i == 4)echo 'style="margin-left:30px;"'; show_page_pos($pos_name,'link_img');?>>
						<div class="pp_4_pg">
							<?php show_page_img();?>
						</div>
						<div class="pp_4_value">
							<?php show_page_href();?>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="right_box">
					<div class="normal_title"><div>在线调查</div><a target="_blank" href="/survey/">[...更多]</a></div>
					<?php $pos_name = "index_survey_0"?>
					<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
					<?php $pos_name = "index_survey_1"?>
					<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
				</div>
				
				<div id="lang_ad" class="ad_banner">
				</div>
			</div>
		</div>
		
		
		
		<?php include_bottom();?>
	</div>
</body>
</html>