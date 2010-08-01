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
		js_include_tag('index_two');
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
					<div id="qie_img"></div>
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
					<div id="content_qie_left">陆家嘴早餐</div>
					<div id="content_qie_right">精华导读<a href=""><img src="/images/index_two/x.jpg"/></a></div>
					<div id="guide">
						<div class="guide_title">基金经理看市</div>
						<div class="guide_hr"></div>
						<a href="#"><img src="/images/index_two/g4.jpg"/></a>
						<div id="gg_banner">
							<div id="g_pg"><img src="/images/index_two/g.jpg"/></div>
							<div id="g_pg_title"><a href="">asfasdfasfas</a></div>
							<div id="g_pg_value"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						</div>
						<div class="gg_title">早餐资讯</div>
						<div class="guide_hr" style="width:150px; margin-top:5px;"></div>
						<a href="#"><img src="/images/index_two/g4.jpg"  style="margin-top:0px;"/></a>
						<div class="guide_hr_val"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						<div class="guide_hr_val" style="margin-top:2px;"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						<div class="gg_title" style="margin-top:10px;">投票之选</div>
						<div class="guide_hr" style="width:150px; margin-top:15px;"></div>
						<a href="#"><img src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
						<div class="guide_hr_val"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						<div class="guide_hr_val" style="margin-top:2px;"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						<div class="gg_title" style="margin-top:10px;">环球一周前瞻</div>
						<div class="guide_hr" style="width:120px; margin-top:15px;"></div>
						<a href="#"><img src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
						<div class="guide_hr_val"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
						<div class="guide_hr_val" style="margin-top:2px;"><a href="">基金经理看市基金经理看市基金经理看市金经理看市基金经理看市金经理看市基金经理看市</a></div>
					</div>
				</div>
				<div id="content_left_c">
					<div id="li">
						<div id="li_banner">富豪</div>
						<div id="li_value">
							<?php $pos_name = 'index_rich1';?>
							<div id="li_top" <?php show_page_pos($pos_name);?>>
								<div id="li_img_pg"><?php show_page_img();?></div>
								<div id="li_img_title"><?php show_page_href();?></div>	
								<div id="li_img_value"><?php show_page_desc();?></div>
							</div>
							<div id="li_title"><div style="margin-left:40px;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="font-weight:bold; color:#004276;"><?php echo $pos_items->$pos_name->alias?></a></div><div style="margin-right:10px; float:right;"><a href="<?php echo $pos_items->$pos_name->href;?>" style="color:#BA2636;">[详细]</a></div></div>
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
									$c_id = $category->children_map(2);
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
						<div class="guide_hr_val2" style="<?php if($i == 0){ echo 'margin-top:15px;';}?>">
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
									$c_id = $category->children_map(5);
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
						<div class="guide_hr_val2" style="<?php if($i == 0){ echo 'margin-top:15px;';}?>">
							<a class="cate_a" href="/review/list/<?php echo $v->category_id;?>">[<?php echo $category->find_name_by_id($v->category_id);?>]</a><a class="news_a" href="<?php echo get_news_url($v);?>" title="<?php echo $v->title;?>"><?php echo $v->title;?></a>
						</div>
						<?php }?>
						<div class="guide_hr" style="width:315px; margin-top:10px;"></div>
						<div id="dictionary">
							<div id="dict_1"><a href="">Shadow Banking System</a></div>
							<div id="dict_2"><a href="">哈哈银行</a></div>
						</div>
					</div>
					<div class="pg">
						<font>商业</font>
						<a href="/business/">更多</a>
					</div>
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_ids = $category->children_map(3);
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
						<div class="guide_hr_val2" style="<?php if($i == 0){ echo 'margin-top:15px;';}?>">
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
					<div class="pg">
						<font>科技</font>
						<a href="/tech/">更多</a>
					</div>
					<div class="keysword_banner">
						<div class="keysword_value">
							<ul>
								<?php
									$c_ids = $category->children_map(4);
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
						<div class="guide_hr_val2" style="<?php if($i == 0){ echo 'margin-top:15px;';}?>">
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
					<div class="content_pg_title">生活<a href="/life/">更多</a></div>	
					<div class="pg_hr" style="margin-left:8px;">
						<div class="content_pg_hr"></div>
						<div class="dian_hr"></div>
					</div>
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
					<div class="guide_hr_val" style="width:320px; margin-top:11px;"><a href="">[全球] 阿斯发阿斯发发发阿斯发发发阿斯阿斯发阿斯发发发阿斯发发发阿斯发发发阿斯发发发发发发发发阿斯发发发发发</a></div>
					<div class="guide_hr_val" style="width:320px; margin-top:0px;"><a href="">[全球] 阿斯发阿斯发发发阿斯发发发阿斯阿斯发阿斯发发发阿斯发发发阿斯发发发阿斯发发发发发发发发阿斯发发发发发</a></div>
					<div class="content_pg_title">采编空间<a href="#" style="margin-left:235px;">更多</a></div>	
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
					<div class="content_pg_title">读者高见</div>
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
					<div class="content_pg_title">最受欢迎文章</div>
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
						$day = $db->query("select id,title,created_at from fb_news where  to_days(created_at) = to_days(now()) order by click_count limit 10");
						$week = $db->query("select id,title,created_at from fb_news where  week(created_at) = week(now()) order by click_count limit 10");
						$month = $db->query("select id,title,created_at from fb_news where  month(created_at) = month(now()) order by click_count limit 10");
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
					<div class="c_r_title">
						<div>汇丰福布斯精华榜单推荐</div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div></div>	
					</div>
					<div id="recommend_banner">
						<div class="recommend_title" style="width:68px; font-weight:bold; background:url(/images/index_two/11.jpg) no-repeat;">女继承人</div>	
						<div class="recommend_title" style="width:70px; background:url(/images/index_two/12.jpg) no-repeat;">城  市</div>	
						<div class="recommend_title" style="width:77px; background:url(/images/index_two/13.jpg) no-repeat;">最佳CEO</div>	
						<div class="recommend_title" style="width:83px; background:url(/images/index_two/14.jpg) no-repeat;">CEO薪酬榜</div>	
					</div>
					<div id="recommend_btn"><a href="">女继承人排行榜</a></div>
					<div class="recommend_menu">
						<font style="margin-left:10px;">排名</font>
						<font style="margin-left:30px;">姓名</font>
						<font style="margin-left:80px;">净资产(亿美元)</font>	
					</div>
					<div class="recommend_menu_hr"></div>
					<?php for($i = 0 ; $i < 10 ; $i++){?>
					<div class="recommend_menu_pg" style="<?php if($i % 2 !=1){ echo 'height:26px; background:url(/images/index_two/re_1.jpg) repeat-x;';}else{ echo 'height:25px; background:Url(/images/index_two/re_2.jpg) repeat-x;';} if($i == 9){ echo 'height:32px; background:Url(/images/index_two/re_3.jpg) no-repeat;';}?> ">
						<div class="recommend_ranking" style="<?php if($i < 3){echo ' color:#B20000;';}else{ echo 'color:#000000;';}?>"><?php echo $i+1;?></div>
						<div class="recommend_name">asdf</div>
						<div class="recommend_money">23423</div>
					</div>
					<?php }?>
					<div class="c_r_title" style="margin-top:14px;">
						<div>眼光财富观察</div>
						<a href=""><img src="/images/index_two/g4.jpg"/></a>
					</div>
					<div class="con_r_hr">
						<div style="width:80px;"></div>	
					</div>
					<div class="guide_hr_val" style="width:270px;">啊沙发上发生发生法撒旦发射发生艾弗森的发烧地方</div>
					<div class="guide_hr_val" style="margin-top:0px; width:270px;">啊沙发上发生发生法撒旦发射发生艾弗森的发烧地方</div>
				</div>
				<div class="content_right_bottom"></div>
				<div id="right_img">
					<a href=""><img src="/images/index_two/ao.jpg"></a>
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
					<div class="photo_banner">
						<div class="photo_pg">
							<img src="/images/index_two/32.jpg"/>
						</div>
						<div class="photo_font"><a href="">观点观</a></div>
					</div>
					<div class="photo_value_s" style="overflow:Hidden; width:225px;">
						<div class="photo_title" style="width:225px; overflow:hidden;"><a href="#">斯蒂芬撒旦发斯蒂芬撒旦发射斯蒂芬撒旦发射斯蒂芬撒旦发射射</a></div>	
						<div class="photo_value_v" style="width:225px; overflow:hidden;"><a href="#">啊啊是的发生的发生分爱迪生法守法啊是的发生的发生分爱迪生法守法发生分爱迪生法守法</a></div>
						<div class="photo_geng" style=" width:220px;"><a href="#">...[阅读全文]</a></div>
					</div>
					<div class="h_h" style="width:285px;"></div>
					<div class="teacher_btn1"><a href="">更多理财师&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a href="">更多咨询&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a href="">报名理财师&nbsp;&nbsp;</a></div>
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
					<div class="photo_banner">
						<div class="photo_pg">
							<img src="/images/index_two/32.jpg"/>
						</div>
						<div class="photo_font"><a href="">观点观</a></div>
					</div>
					<div class="photo_value_s" style="overflow:Hidden; width:225px;">
						<div class="photo_title" style="width:225px; overflow:hidden;"><a href="#">斯蒂芬撒旦发斯蒂芬撒旦发射斯蒂芬撒旦发射斯蒂芬撒旦发射射</a></div>	
						<div class="photo_value_v" style="width:225px; overflow:hidden;"><a href="#">啊啊是的发生的发生分爱迪生法守法啊是的发生的发生分爱迪生法守法发生分爱迪生法守法</a></div>
						<div class="photo_geng" style=" width:220px;"><a href="#">...[阅读全文]</a></div>
					</div>
					<div class="h_h" style="width:285px;"></div>
					<div class="teacher_btn1"><a href="">更多理财师&nbsp;&nbsp;</a></div>
					<div class="teacher_btn2"><a href="">更多咨询&nbsp;&nbsp;</a></div>
					<div class="teacher_btn3"><a href="">报名理财师&nbsp;&nbsp;</a></div>
				</div>
				<div class="content_right_bottom"></div>
				<div id="right_m_img">
					<a href=""><img src="/images/index_two/ao.jpg"/></a>	
				</div>
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
						<div class="c_r_title" style="margin-top:5px;">
							<div>城  市</div>
							<a href=""><img src="/images/index_two/g4.jpg"/></a>
						</div>
						<div class="con_r_hr">
							<div style="width:35px;"></div>	
						</div>
					<div class="city">
						<a href="" style="font-weight:bold; color:#004276;">撒旦发射点撒旦发射点发散发杀死撒旦发射点发散发杀死发散发杀死</a>
					</div>
					<div class="city" style="margin-top:5px;">
						<a href="" style="font-weight:none;">撒旦发射点发散撒旦发射点发散发杀死撒旦发射点发散发杀死撒旦发射点发散发杀死发杀死</a>
					</div>
					<div class="guide_hr_val" style="width:270px; margin-left:10px; font-weight:bold;">啊沙发上发生发生法撒旦发射发生艾弗森的发烧地方</div>
					<div class="guide_hr_val" style="width:270px; margin-top:0px; margin-left:10px; font-weight:bold;">啊沙发上发生发生法撒旦发射发生艾弗森的发烧地方</div>
					<div class="h_h" style="width: 285px;"></div>
					<?php for($i = 0 ; $i < 2 ; $i++){?>
					<div class="pp_4_banner" style="<?php if($i == 1){echo 'margin-left:30px;;';} ?>">
						<div class="pp_4_pg">
							<a href=""><img src="/images/index_two/t.jpg"/></a>	
						</div>
						<div class="pp_4_value">
							<a href="">阿斯顿法阿斯顿阿斯顿阿斯顿阿斯顿阿斯顿阿斯顿</a>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="content_right_bottom"></div>
				<div class="content_right_top" style="margin-top:15px;"></div>
				<div class="content_right_banner">
						<div class="c_r_title" style="margin-top:5px;">
							<div>在线调查</div>
							<a href=""><img src="/images/index_two/g4.jpg"/></a>
						</div>
						<div class="con_r_hr">
							<div style="width:55px;"></div>	
						</div>
						<div class="survey">
							<a href="">阿斯顿法守法说法阿阿斯顿法守法说法阿斯顿法守法说法大萨芬斯顿法守法说法大萨芬</a>
						</div>
						<div class="survey_submit"><a href="">...进入调查</a></div>
						<div class="h_h" style="width: 285px; margin-top:8px;"></div>
						<div class="survey">
							<a href="">阿斯顿法守法说法阿阿斯顿法守法说法阿斯顿法守法说法大萨芬斯顿法守法说法大萨芬</a>
						</div>
						<div class="survey_submit"><a href="">...进入调查</a></div>
				</div>
				<div class="content_right_bottom"></div>
			</div>
		</div>
		
		
		
		<div id="bottom_banner">
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
			<div class="bottom_value" id="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<?php for($i = 0 ; $i < 7 ; $i++){?>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<?php }?>					
				</ul>
			</div>
		</div>
		<div id="bottom">
			<a href="">关于福布斯</a> - 
			<a href="">动态新闻</a> - 
			<a href="">广告服务</a> - 
			<a href="">诚聘英才</a> - 
			<a href="">友情链接</a> - 
			<a href="">会员活动</a> - 
			<a href="">隐私声明</a> - 
			<a href="">网站声明</a>
		</div>
	</div>
</body>
</html>