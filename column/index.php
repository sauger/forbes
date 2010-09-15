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
		<?php
if(!function_exists("get_config"))
	include_once(dirname(__FILE__).'/../frame.php');
$db=get_db();
global $pos_items;
init_page_items();
global $category;
if(empty($category)){
	$category = new category_class('news');
}
global $pos_name;
?>
<div id="top_div">
<div id="top_img_left">
<script src="http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=rsb&c=28&pli=1767086&PluID=0&w=728&h=90&ord=[timestamp]&ucm=true&z=0"></script>
<noscript>
<a href="http://bs.serving-sys.com/BurstingPipe/BannerRedirect.asp?FlightID=1767086&Page=&PluID=0&Pos=8352" target="_blank"><img src="http://bs.serving-sys.com/BurstingPipe/BannerSource.asp?FlightID=1767086&Page=&PluID=0&Pos=8352" border=0 width=728 height=90></a>
</noscript>
</div>
<div id="top_img_right" class="ad_banner">
</div>
<div id="top_bg">
	<div id="top_logon"></div>
	<div id="top_banner">
		<div id="top_right_banner">
			<?php js_include_tag('jquery.cookie')?>
				<script>
					if($.cookie('cache_name') && $.cookie('name')){
						var str = '<div class="login_left">'+$.cookie('name')+',你好</div>'
								+ '<div class="login_left"><a href="javascript:void(0)" id="logout">退出</a></div>'
								+ '<div class="top_login"><a href="/user">会员中心</a></div>'
								+ '<div class="top_login"><a href="http://www.forbeschina.com/userclub/">会员专区</a></div>';
						$('#top_right_banner').html(str);
					}else{
						var str = '<div id="top_login"><a href="/login/">登录</a></div>'
								+ '<div class="top_login"><a href="/register/">注册会员</a></div>'
								+ '<div class="top_login"><a href="http://www.forbeschina.com/userclub/">会员专区</a></div>';
						$('#top_right_banner').html(str);
					}
					$(function(){
						$("#logout").click(function(){
							$.cookie('cache_name','',{path: '/'});
							location.reload();
						});
					});
				</script>
		</div>
		<div class=forbes_search>
				<select name="selsearch" class="iselect">
					<option value="list">榜单</option>
					<option value="rich">富豪</option>
					<option value="author_news">作者</option>
					<option value="news">文章</option>
				</select>
		</div>
		<input id="top_input" style="width:312px;" type="text"/>
		<input type="button" id="top_select" value="查  询"/>
	</div>
	<div id="magazine">
		<?php $pos_name = 'index_top_magazine';?>
		<div id="photo"><?php show_page_img();?></div>
		<div id="m_title" <?php show_page_pos($pos_name,'link_img');?>><?php show_page_href();?></div>
		<div id="m_bottom"><a href="/magazine/subscription"><img src="/images/index_two/magazine.jpg"></a></div>
	</div>
</div>
<div id="top_menu_banner">
	<div id="top_menu_left"></div>
	<div id="top_menu_content">
	<?php
		if($nav==""){	$nav=3;	}
		$countnav=$db->query("select * from fb_navigation where parent_id=0 order by priority asc");
		$navigation=$db->query('select name,id,parent_id from fb_navigation where id='.$nav);
	?>
	 <?php foreach($countnav as $k => $v){?>
  		<div>
			<a <?php if($k==0){?>style="border-left:0px;"<?php }elseif($k==10){?>style="border-right:0px;"<?php }?> href="<?php echo $v->href;?>" id="<?php echo $v->id; ?>"><?php echo $v->name;?></a>
		</div>
 	 <?php }?>
	</div>
	<div id="top_menu_right"></div>
</div>
<?php 
for($i=0;$i<count($countnav);$i++){ 
	$navigation2=$db->query('select name,target,href from fb_navigation where parent_id='.$countnav[$i]->id.' order by priority asc'); ?>	
	<div class="top_menu2_banner" <?php if($i!=0){?>style="display:none;"<?php }?> id="nav<?php echo $countnav[$i]->id; ?>">
		<?php if($navigation2){?>
		<div class="top_menu2_left"></div>
		<div class="top_menu2_content">
		<?php 
			$except = array("picindex","piclist","picbillionaires","piclife","piccolumn","life");
			for($j=0;$j<count($navigation2);$j++){ 
			$url = !in_array($countnav[$i]->id_name,$except) ? get_newslist_url($category->find_by_name($navigation2[$j]->name)->id) : $navigation2[$j]->href;
		?>
			<div class="t_content">
				<div></div>
				<a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $navigation2[$j]->href; ?>"><?php echo $navigation2[$j]->name; ?></a>
			</div>
		<?php } ?>
		</div>
		<div class="top_menu2_right"></div>
		<?php }else{echo "&nbsp;";}?>
	</div>
<?php } ?>
</div>
<script>
<?php 
global $page_type;
if($page_type == 'static'){?>
function top_search(){
	var type = $(".iselect").val();
	var text = $("#top_input").val();
	window.location.href="/search/" + type +"/key/"+encodeURI(text);
}
<?php }else{?>
function top_search(){
	var type = $(".iselect").val();
	var text = $("#top_input").val();
	
	if(type=='list'){
		window.location.href="/list/list.php?key="+encodeURI(text);
	}else if(type=='news'){
		window.location.href="/search/news.php?key="+encodeURI(text);
	}else if(type=='author_news'){
		window.location.href="/search/author_news.php?key="+encodeURI(text);
	}else if(type=='rich'){
		window.location.href="/search/rich.php?name="+encodeURI(text);
	}
}
<?php }?>
</script>
		<? #include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
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
						<div id=title><a href="<?php echo column_article_url($news[0]->name,$news[0]->id,'static');?>" title="<?php echo $news[0]->title; ?>"><?php echo $news[0]->title; ?></a></div>
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
						for($i=0;$i<4;$i++){
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
					
					<div class="dash2"></div>
					<div class=column_edit_b>
						<div class=caption>
							<div class=captions>专栏列表</div>
							<div class=line>|</div>
							<a href="http://www.forbeschina.com/column/expert" target="_blank" class=more></a>
						</div>
						<?php
							for($i=0;$i<15;$i++){
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
						for($i=0;$i<4;$i++){
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
					
					<div class="dash2"></div>
					<div class=column_edit_b>
						<div class=caption>
							<div class=captions>专栏列表</div>
							<div class=line>|</div>
							<a href="http://www.forbeschina.com/column/journalist" target="_blank" class=more></a>
						</div>
						<?php
							for($i=0;$i<15;$i++){
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
			<div id="right_banner">
				<script src="http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=rsb&c=28&pli=1767091&PluID=0&w=300&h=250&ord=[timestamp]&ucm=true&z=0"></script>
				<noscript>
				<a href="http://bs.serving-sys.com/BurstingPipe/BannerRedirect.asp?FlightID=1767091&Page=&PluID=0&Pos=206" target="_blank"><img src="http://bs.serving-sys.com/BurstingPipe/BannerSource.asp?FlightID=1767091&Page=&PluID=0&Pos=206" border=0 width=300 height=250></a>
				</noscript>
			</div>
			<?php #include_once(dirname(__FILE__)."/../right/ad.php");?>
			<?php include_once(dirname(__FILE__)."/../right/column_c.php");?>
			<?php include_once(dirname(__FILE__)."/../right/column.php");?>
			<?php include_once(dirname(__FILE__)."/../right/forum.php");?>
			<?php include_once(dirname(__FILE__)."/../right/magazine.php");?>
		</div>
		<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>