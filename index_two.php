<?php
	include_once( dirname(__FILE__) .'/frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $seo[0]->title ?></title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<?php
		use_jquery();
		js_include_tag('index_two','top2');
		css_include_tag('index_two','top2');
		init_page_items();
		$db = get_db();
	?>
</head>
<body>
	<div id=ibody>
	<?php include_once(dirname(__FILE__).'/inc/top2.inc.php');?>
	<?php 
	if($page_type == 'static'){
		function get_news_url($news){
			return static_news_url($news);
		}
	}else{
		function get_news_url($news){
			return dynamic_news_url($news);
		}
	}?>
		<div id="content">
			<div id="content_left">
				<div id="content_banner_left">
					<div id="qie_img">
						<?php for($i=0;$i<5;$i++){
							$pos_name = 'index_hl_'.$i;
						?>
						<div class="top_img" <?if($i!=0){?>style="display:none;"<?php }?>>
							<?php show_page_img();?>
						</div>
						<div class="top_box" <?if($i!=0){?>style="display:none;"<?php }?>>
							<div class="top_title" <?php show_page_pos($pos_name,'base_img_withoutime')?>><?php show_page_href();?></div>
							<div class="top_desc"><?php show_page_desc();?></div>
							<?php for($j=0;$j<2;$j++){$pos_name = "index_hl".$j."_r".$i;?>
							<div class="top_news" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
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
					<div id="qie_menu">
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
					<div id="content_qie_left">陆家嘴早餐<img style="display:none;" src="/images/index_two/x.jpg"/></div>
					<div id="content_qie_right">精华导读<img src="/images/index_two/x.jpg"/></div>
					
					<div class="guide" id="ljzzc" style="display:none">
						<?php $pos_name = 'index_jjjl_0';?>
						<div class="guide_title">基金经理看市</div>
						<div class="guide_hr"></div>
						<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"/></a>
						<div class="gg_banner" <?php show_page_pos($pos_name,'base_img')?>>
							<div class="g_pg"><?php show_page_img();?></div>
							<div class="g_pg_title"><?php show_page_href();?></div>
							<div class="g_pg_value"><?php show_page_desc();?></div>
						</div>
						<div class="gg_title">早餐资讯</div>
						<div class="guide_hr" style="width:150px; margin-top:5px;"></div>
						<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:0px;"/></a>
						<?php for($i=1;$i<3;$i++){$pos_name = "index_zczx_".$i;?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
						<div class="gg_title" style="margin-top:10px;">投票之选</div>
						<div class="guide_hr" style="width:150px; margin-top:15px;"></div>
						<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
						<?php for($i=1;$i<3;$i++){$pos_name = "index_tpzx_".$i;?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
						<div class="gg_title" style="margin-top:10px;">环球一周前瞻</div>
						<div class="guide_hr" style="width:120px; margin-top:15px;"></div>
						<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
						<?php for($i=1;$i<3;$i++){$pos_name = "index_hqyz_".$i;?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
					</div>
					<div class="guide" id="jhdd">
						<?php $pos_name = 'index_jhdd_0';?>
						<div class="gg_banner" style="height:90px;" <?php show_page_pos($pos_name,'base_img')?>>
							<div class="g_pg"><?php show_page_img();?></div>
							<div class="g_pg_title"><?php show_page_href();?></div>
							<div class="g_pg_value"><?php show_page_desc();?></div>
						</div>
						<?php for($i=1;$i<4;$i++){$pos_name = "index_jhdd_".$i;?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
						<?php }?>
						<div class="guide_hr" style="width:240px; margin-top:15px;"></div>
						<?php $pos_name = 'index_jhdd_4';?>
						<div class="gg_banner" style="height:90px;" <?php show_page_pos($pos_name,'base_img')?>>
							<div class="g_pg"><?php show_page_img();?></div>
							<div class="g_pg_title"><?php show_page_href();?></div>
							<div class="g_pg_value"><?php show_page_desc();?></div>
						</div>
						<?php for($i=5;$i<8;$i++){$pos_name = "index_jhdd_".$i;?>
						<div class="guide_hr_val" <?php show_page_pos($pos_name,'link')?>><?php show_page_href();?></div>
						<?php }?>
					</div>
				</div>
				<div id="content_left_c">
					<div class="li">
						<div class="li_banner">富豪</div>
						<div class="li_value">
							<?php $pos_name = 'index_rich1';?>
							<div class="li_top" <?php show_page_pos($pos_name);?>>
								<div class="li_img_pg"><?php show_page_img();?></div>
								<div class="li_img_title"><?php show_page_href();?></div>	
								<div class="li_img_value"><?php show_page_desc();?></div>
							</div>
							<div class="li_title"><div style="margin-left:40px;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="font-weight:bold; color:#004276;"><?php echo $pos_items->$pos_name->alias?></a></div><div style="margin-right:10px; float:right;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="color:#BA2636;">[详细]</a></div></div>
							<div class="guide_hr" style="WIDTH:320PX; margin-top:5px;"></div>
							<?php
								$c_id = $category->children_map(42);
								$c_id = implode(',',$c_id);
								$news = $db->query("select id,created_at,title from fb_news where category_id in ($c_id) order by created_at desc limit 2");
								foreach($news as $v){
							?>
							<div class="guide_hr_val2">
								<a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
							</div>
							<?php }?>
							<div class="li_hr_g" style="width:310px;"><a href="/billionaires/">...查看更多</a></div>
						</div>
					</div>
					<div class="pg">
						<font>创业</font>
						<a href="/entrepreneur/">更多</a>
					</div>
					
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_id = $category->children_map(2,false);
									$c_id = implode(',',$c_id);
									$key_array = get_keywords($c_id);
									foreach($key_array as $keyword){
								?>
								<li><a href="/search/news/key/<?php echo $keyword;?>"><?php echo $keyword;?></a></li>
								<?php }?>
							</ul>
						</div>
						<?php
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) order by created_at desc limit 9");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 0){ echo 'style="margin-top:15px;"';}?>>
							<a class="cate_a" href="/review/list/<?php echo $v->category_id;?>">[<?php echo $category->find_name_by_id($v->category_id);?>]</a><a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="pg">
						<font>投资</font>
						<a href="/investment/">更多</a>
					</div>
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_id = $category->children_map(5,false);
									$c_id = implode(',',$c_id);
									$key_array = get_keywords($c_id);
									foreach($key_array as $keyword){
								?>
								<li><a href="/search/news/key/<?php echo $keyword;?>"><?php echo $keyword;?></a></li>
								<?php }?>
							</ul>
						</div>
						<?php
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) order by created_at desc limit 9");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 0){ echo 'style="margin-top:15px;"';}?>>
							<a class="cate_a" href="/review/list/<?php echo $v->category_id;?>">[<?php echo $category->find_name_by_id($v->category_id);?>]</a><a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
					</div>
					<div class="pg">
						<font>商业</font>
						<a href="/business/">更多</a>
					</div>
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_ids = $category->children_map(3,false);
									$c_id = implode(',',$c_ids);
									$key_array = get_keywords($c_id);
									foreach($key_array as $keyword){
								?>
								<li><a href="/search/news/key/<?php echo $keyword;?>"><?php echo $keyword;?></a></li>
								<?php }?>
							</ul>
						</div>
						<?php
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) order by created_at desc limit 7");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 0){ echo 'style="margin-top:15px;"';}?>>
							<a class="cate_a" href="/review/list/<?php echo $v->category_id;?>">[<?php echo $category->find_name_by_id($v->category_id);?>]</a><a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<?php 
							for($i=1;$i<3;$i++){
								$pos_name = 'index_business'.$i;
						?>
						<div class="guide_hr_val2" <?php show_page_pos($pos_name,'index_cate_news')?>>
							<font>[<a class="cate_a" href="<?php echo $pos_items->$pos_name->reserve;?>"><?php echo $pos_items->$pos_name->alias?></a>]</font><a href="<?php echo $pos_items->$pos_name->href;?>" class="news_a" title="<?php echo $pos_items->$pos_name->title;?>"><?php echo $pos_items->$pos_name->title;?></a>
						</div>
						<?php }?>
						<div id="pos">
						<?php 
							foreach($c_ids as $cid){
						?>
							<a href="/review/list/<?php echo $cid;?>">【<?php echo $category->find_name_by_id($cid);?>】</a>
						<?php }?>
						</div>
					</div>
					<div class="li" style="margin-top:10px;">
						<div class="li_banner">CEO</div>
						<div class="li_value">
							<?php $pos_name = 'index_ceo1';?>
							<div class="li_top" <?php show_page_pos($pos_name);?>>
								<div class="li_img_pg"><?php show_page_img();?></div>
								<div class="li_img_title"><?php show_page_href();?></div>	
								<div class="li_img_value"><?php show_page_desc();?></div>
							</div>
							<div class="li_title"><div style="margin-left:40px;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="font-weight:bold; color:#004276;"><?php echo $pos_items->$pos_name->alias?></a></div><div style="margin-right:10px; float:right;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="color:#BA2636;">[详细]</a></div></div>
							<div class="guide_hr" style="WIDTH:320PX; margin-top:5px;"></div>
							<?php
								$c_id = $category->children_map(143);
								$c_id = implode(',',$c_id);
								$news = $db->query("select id,created_at,title from fb_news where category_id in ($c_id) order by created_at desc limit 2");
								foreach($news as $v){
							?>
							<div class="guide_hr_val2">
								<a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
							</div>
							<?php }?>
							<div class="li_hr_g" style="width:310px;"><a href="/review/list/143">...查看更多</a></div>
						</div>
					</div>
					<div class="pg">
						<font>科技</font>
						<a href="/tech/">更多</a>
					</div>
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_ids = $category->children_map(4,false);
									$c_id = implode(',',$c_ids);
									$key_array = get_keywords($c_id);
									foreach($key_array as $keyword){
								?>
								<li><a href="/search/news/key/<?php echo $keyword;?>"><?php echo $keyword;?></a></li>
								<?php }?>
							</ul>
						</div>
						<?php
							$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) order by created_at desc limit 9");
							foreach($news as $i => $v){
						?>
						<div class="guide_hr_val2" <?php if($i == 0){ echo 'style="margin-top:15px;"';}?>>
							<a class="cate_a" href="/review/list/<?php echo $v->category_id;?>">[<?php echo $category->find_name_by_id($v->category_id);?>]</a><a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<div id="pos">
						<?php 
							foreach($c_ids as $cid){
						?>
							<a href="/review/list/<?php echo $cid;?>">【<?php echo $category->find_name_by_id($cid);?>】</a>
						<?php }?>
						</div>
					</div>
					<div class="keysword_banner">
						<div id="topkeyword">
							<?php for($i=1;$i<3;$i++){ $pos_name = 'index_ad_'.$i;?>
							<div class="top_kdiv" <?php show_page_pos($pos_name,'link');?>>
							<?php show_page_href();?>
							</div>
							<?php }?>
						</div>
						<div id="bottomkeyword">
							<?php for($i=3;$i<19;$i++){$pos_name = 'index_ad_'.$i;?>
							<div  class="bottom_kdiv" <?php show_page_pos($pos_name,'link')?>>
							<?php show_page_href();?>
							</div>
							<?php }?>
						</div>
					</div>
				</div>
				<div id="content_right">
					<div class="content_pg_title">观点<a href="/column/">更多</a></div>
					<div class="pg_hr">
						<div class="content_pg_hr"></div>
						<div class="dian_hr"></div>
					</div>
					<?php 
					for($i=1;$i<=4;$i++){
						$pos_name = 'index_column'.$i
					?>
					<div class="photo_banner" <?php show_page_pos($pos_name,'column_full')?>>
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
						<div class="photo_font">
							<a href="<?php echo $pos_items->$pos_name->reserve?>"><?php echo $pos_items->$pos_name->alias;?></a>
						</div>
					</div>
					<div class="photo_value_s">
						<div class="photo_title"><?php show_page_href(); ?></div>	
						<div class="photo_value_v"><?php show_page_desc(); ?></div>
						<div class="photo_geng"><a href="<?php echo $pos_items->$pos_name->reserve?>">[...更多观点]</a></div>
					</div>
						<?php if($i<4){?>
						<div class="h_h"></div>
						<?php }?>
					<?php }?>
					<div class="gg_pg" style="height:90px;">
						<div class="gg_containt">
							<div class="gg_title">更多专栏</div>
							<div class="guide_hr" style="margin-top:7px; width:235px;"></div>
							<a href="/column/expert/"><img src="/images/index_two/g4.jpg"/></a>
						</div>
						<div class="gg_containt_value">
							<?php
								$column = $db->query("select name,nick_name from fb_user where role_name='column_writer'");
								foreach($column as $v){
							?>
							<a class="column_a" href="/column/<?php echo $v->name;?>"><?php echo $v->nick_name;?></a>	
							<?php }?>
						</div>
					</div>
					<div id="life_div">
					<div class="content_pg_title">生活</div>	
					<div class="pg_hr" style="margin-left:8px;">
						<div class="content_pg_hr"></div>
						<div class="dian_hr"></div>
					</div>
					</div>
					<div id="index_little" class="ad_banner"></div>
					<?php 
						for($i=1;$i<3;$i++){
							$pos_name = 'index_life'.$i;
					?>
					<div class="pho_banner" <?php show_page_pos($pos_name,'base_img_withoutime');?>>
						<div class="pho_pg"><?php show_page_img();?></div>
						<div class="pho_title">
							<?php show_page_href();?>
						</div>
						<div class="pho_value">
							<?php show_page_desc();?>
						</div>
						<div class="photo_geng" style="width:230px; margin-top:4px;"><a href="<?php echo $pos_items->$pos_name->herf;?>">...[阅读全文]</a></div>
					</div>
					<div class="h_h"></div>
					<?php }?>
					<?php
						$c_ids = $category->children_map(81);
						$c_id = implode(',',$c_ids);
						$news = $db->query("select id,created_at,title,category_id from fb_news where category_id in ($c_id) order by created_at desc limit 2");
						foreach($news as $i => $v){
					?>
					<div class="guide_hr_val" style="width:320px;<?php if($i==0){?>margin-top:11px;<?php }?>"><a href="<?php echo get_news_url($v);?>">[<?php echo $category->find_name_by_id($v->category_id);?>] <?php echo $v->title;?></a></div>
					<?php }?>
					<div class="content_pg_title">采编空间<a href="/column/journalist/" style="margin-left:235px;">更多</a></div>	
					<div class="pg_hr" style="margin-left:8px;">
						<div class="content_pg_hr"></div>
						<div class="dian_hr"></div>
					</div>
					<?php 
					for($i=1;$i<=4;$i++){
						$pos_name = 'index_editor'.$i
					?>
					<div class="photo_banner" <?php show_page_pos($pos_name,'column_full')?>>
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
						<div class="photo_font">
							<a href="<?php echo $pos_items->$pos_name->reserve?>"><?php echo $pos_items->$pos_name->alias;?></a>
						</div>
					</div>
					<div class="photo_value_s">
						<div class="photo_title"><?php show_page_href(); ?></div>	
						<div class="photo_value_v"><?php show_page_desc(); ?></div>
						<div class="photo_geng"><a href="<?php echo $pos_items->$pos_name->reserve?>">[...更多观点]</a></div>
					</div>
						<?php if($i<4){?>
						<div class="h_h"></div>
						<?php }?>
					<?php }?>
					<div class="gg_pg" style="height:90px;">
						<div class="gg_containt">
							<div class="gg_title">更多专栏</div>
							<div class="guide_hr" style="margin-top:7px; width:235px;"></div>
							<a href="/column/journalist/"><img src="/images/index_two/g4.jpg"/></a>
						</div>
						<div class="gg_containt_value">
							<?php
								$column = $db->query("select name,nick_name from fb_user where role_name='column_editor'");
								foreach($column as $v){
							?>
							<a class="column_a" href="/column/<?php echo $v->name;?>"><?php echo $v->nick_name;?></a>	
							<?php }?>
						</div>
					</div>
					<div class="content_pg_title"><div>读者高见</div><div class="hidden_more"></div></div>
					<div class="pg_hr">
								<div class="content_pg_hr"></div>
								<div class="dian_hr"></div>
					</div>
					<?php 
						$comments = $db->query("select * from fb_comment where resource_type='news' and is_approve=1 order by priority asc,created_at desc limit 4");
						$news = new table_class('fb_news');
						for($i=0;$i<4;$i++){
							$news->find($comments[$i]->resource_id);
					?>
					<div class="con_ban_title">
						<a href="http://www.forbeschina.com<?php echo static_news_url($news) ."/comments/{$comments[$i]->id}"?>"><?php echo $comments[$i]->comment?></a>
					</div>
					<div class="con_ban_value">
						<?php echo $comments[$i]->nick_name;?>　|　<a href="<?php echo get_news_url($news);?>" target="_blank" title="<?php echo $news->title;?>"><?php echo $news->short_title;?></a>
					</div>
					<?php if($i != 3){?>
					<div class="h_h" style="margin-top: 8px;"></div>
					<?php }}?>
					<div class="content_pg_title"><div>最受欢迎文章</div><div class="hidden_more"></div></div>
					<div class="pg_hr">
					<div class="content_pg_hr"></div>
					<div class="dian_hr"></div>
					</div>
					<div id="day">
						<div id="_day" style="border-left:0px solid #A4A4A4; color:#A50203;">一天</div>
						<div id="_week">一周</div>
						<div id="_month">一月</div>
					</div>
					<?php 
						$day = $db->query("select id,title,created_at from fb_news where date(created_at) = date_sub(curdate(), interval 1 day) group by title order by click_count desc limit 10");
						$week = $db->query("select id,title,created_at from fb_news where DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_at) group by title order by click_count desc limit 10");
						$month = $db->query("select id,title,created_at from fb_news where DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= date(created_at) group by title order by click_count desc limit 10");
						!$day && $day = array();
						!$week && $week = array();
						!$month && $month = array();
						foreach($day as $k => $v){
					?> 
					<div class="day_banner favor_day">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h" style=" width:325px;"></div>
						<?php }?>
					</div>
					<?php }?>
					<?php foreach($week as $k => $v){
					?> 
					<div class="day_banner favor_week" style="display:none;">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h" style=" width:325px;"></div>
						<?php }?>
					</div>
					<?php }?>
					<?php foreach($month as $k => $v){
					?> 
					<div class="day_banner favor_month" style="display:none;">
						<div class="day_banner_number" style="<?php if($k == 0){ echo 'color:#ffffff; background:url(/images/index_two/news.gif) no-repeat;';}else{ echo 'background:url(/images/index_two/pg_2.jpg) no-repeat;';}?>"><?php echo $k+1;?></div>
						<div class="day_banner_value"><a href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a></div>
						<?php if($k != 9 ){?> 
						<div class="h_h" style=" width:325px;"></div>
						<?php }?>
					</div>
					<?php }?>
				</div>
			</div>
			
				
			<div id="contentc_right">
				<div class="content_right_top"></div>
				<div class="content_right_banner">
					<div class="c_r_title" <?php $pos_name = "index_right_list0";show_page_pos($pos_name,'link');?>>
						<div><?php echo $pos_items->$pos_name->display;?></div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div></div>	
					</div>
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
					<div class="c_r_title" style="margin-top:14px;">
						<div>阳光财富观察</div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div style="width:80px;"></div>	
					</div>
					<?php for($i=1;$i<3;$i++){
						$pos_name = "index_dyn_list{$i}"; 
						?>
					<div class="guide_hr_val3" <?php show_page_pos($pos_name,'link');if($i==1){?>style="margin-top:10px;"<?php }?>><?php show_page_href();?></div>
					<?php }?>
				</div>
				<div class="content_right_bottom"></div>
				<div id="both_button">
					<a href=""><img src="/images/index_two/index_yl.jpg"></a>
					<a href=""><img style="margin-left:2px;" src="/images/index_two/index_dy.jpg"></a>
				</div>
				<div id="right_img" class="ad_banner">
				</div>
				
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
					<div class="c_r_title" style="margin-top:5px;">
						<div>理财师园地</div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div style="width:80px;"></div>	
					</div>
					<?php $pos_name="index_lcs";?>
					<div class="photo_banner">
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
						<div class="photo_font"><a href="<?php echo $pos_items->$pos_name->href;?>"><?php  echo $pos_items->$pos_name->alias;?></a></div>
					</div>
					<div class="photo_value_s" style="overflow:Hidden; width:225px;"  <?php show_page_pos($pos_name,'index_subject');?>>
						<div class="photo_title" style="width:225px; overflow:hidden;"><?php show_page_href();?></div>	
						<div class="photo_value_v" style="width:225px; overflow:hidden;"><?php show_page_desc();?></div>
						<div class="photo_geng" style=" width:220px;"><a href="<?php echo $pos_items->$pos_name->href;?>">...[阅读全文]</a></div>
					</div>
					<div class="h_h" style="width:285px;"></div>
					<div class="teacher_btn1"><a href="http://www.forbeschina.com/event/lcs/list_1.html">更多理财师&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a href="http://www.forbeschina.com/event/lcs/">更多咨询&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a href="http://www.forbeschina.com/event/lcs/EntryForm.php">报名理财师&nbsp;&nbsp;</a></div>
				</div>
				<div class="content_right_bottom"></div>
				
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
					<div class="c_r_title" style="margin-top:5px;">
						<div>增张会</div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div style="width:80px;"></div>	
					</div>
					<?php $pos_name="index_zzh";?>
					<div class="photo_banner">
						<div class="photo_pg">
							<?php show_page_img();?>
						</div>
						<div class="photo_font"><a href="<?php echo $pos_items->$pos_name->href;?>"><?php  echo $pos_items->$pos_name->alias;?></a></div>
					</div>
					<div class="photo_value_s" style="overflow:Hidden; width:225px;"  <?php show_page_pos($pos_name,'index_subject');?>>
						<div class="photo_title" style="width:225px; overflow:hidden;"><?php show_page_href();?></div>	
						<div class="photo_value_v" style="width:225px; overflow:hidden;"><?php show_page_desc();?></div>
						<div class="photo_geng" style=" width:220px;"><a href="<?php echo $pos_items->$pos_name->href;?>">...[阅读全文]</a></div>
					</div>
					<div class="h_h" style="width:285px;"></div>
					<div class="teacher_btn1"><a href="">理事风采&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a href="">会员互动&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a href="">加入增长会&nbsp;&nbsp;</a></div>
				</div>
				<div class="content_right_bottom"></div>
				<div id="right_m_img" class="ad_banner">
				</div>
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
					<div class="c_r_title" style="margin-top:5px;">
						<div>城  市</div>
						<a href="/city/"><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div style="width:35px;"></div>	
					</div>
					<?php $pos_name = "index_city0"; ?>
					<div class="city" <?php show_page_pos($pos_name,'base');?>>
						<?php show_page_href();?>
					</div>
					<div class="city_desc">
						<?php show_page_desc();?>
					</div>
					<?php for($i=1;$i<3;$i++){$pos_name = "index_city{$i}";?>
					<div class="guide_hr_val3 city_title" <?php show_page_pos($pos_name,'link');if($i==1){?>style="margin-top:5px;"<?php }?>><?php show_page_href();?></div>
					<?php }?>
					<div class="h_h" style="width: 285px;"></div>
					<?php for($i = 3 ; $i < 5 ; $i++){$pos_name = "index_city{$i}";?>
					<div class="pp_4_banner" <?php if($i == 3)echo 'style="margin-left:30px;"'; show_page_pos($pos_name,'link_img');?>>
						<div class="pp_4_pg">
							<?php show_page_img();?>
						</div>
						<div class="pp_4_value">
							<?php show_page_href();?>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="content_right_bottom"></div>
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
						<div class="c_r_title" style="margin-top:5px;">
							<div>在线调查</div>
							<a href="/survey/"><img src="/images/index_two/g4.jpg"/></a>
						</div>
						<div class="con_r_hr">
							<div style="width:55px;"></div>	
						</div>
						<?php $pos_name = "index_survey_0"?>
						<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
						<div class="survey_submit"><a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank">...进入调查</a></div>
						<div class="h_h" style="width: 285px; margin-top:8px;"></div>
						<?php $pos_name = "index_survey_1"?>
						<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
						<div class="survey_submit"><a href="<?php echo $pos_items->$pos_name->href;?>" target="_blank">...进入调查</a></div>
				</div>
				<div class="content_right_bottom"></div>
				
				<div id="lang_ad" class="ad_banner">
				</div>
			</div>
		</div>
		
		
		
		<?php include 'include.php';?>
	</div>
</body>
</html>