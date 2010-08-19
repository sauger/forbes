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
?>
<div id="top_div">
<div id="top_img_left" class="ad_banner">
</div>
<div id="top_img_right" class="ad_banner">
</div>
<div id="top_bg">
	<div id="top_logon"></div>
	<div id="top_banner">
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
	<div id="top_right_banner">
		<?php js_include_tag('jquery.cookie')?>
			<script>
				if($.cookie('cache_name') && $.cookie('name')){
					var str = '<div class="login_left">'+$.cookie('name')+',你好</div>'
							+ '<div class="login_right"><a href="javascript:void(0)" id="logout">退出</a></div>'
							+ '<div class="login_left"><a href="/user">会员中心</a></div>'
							+ '<div class="login_right"><a href="http://www.forbeschina.com/userclub/">会员专区</a></div>';
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
  		<div <?php if($k==0){?>style="border-left:0px;"<?php }elseif($k==10){?>style="border-right:0px;"<?php }?>>
			<a href="<?php echo $v->href;?>" id="<?php echo $v->id; ?>"><?php echo $v->name;?></a>
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
