<?php
		include_once(dirname(__FILE__).'/../frame.php');
		$db=get_db();
		global $pos_items;
		init_page_items();
?>
	<div id=top_>
		<div id=top_banner>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="778" height="90">
        <param name="movie" value="/flash/banner.swf">
        <param name="quality" value="high">
        <PARAM NAME="WMode" VALUE="Opaque">
        <embed src="/flash/banner.swf" quality="high" WMode="Opaque" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="778" height="90"></embed>
     </object>
	</div>
	<div id=top_function>
			<div class=user_btn>
			</div>
			<?php js_include_tag('jquery.cookie')?>
			<script>
				if($.cookie('cache_name') && $.cookie('name')){
					var str = '<div id="uname_span">'+$.cookie('name')+',你好</div>'
							+ '<a href="javascript:void(0)" id="logout">登出</a>'
							+ '<a href="/user">会员中心</a>';
					$('.user_btn').html(str);
				}else{
					$('.user_btn').html('<a href="/login">登陆</a>　<a href="/register/">注册</a>');
				}
				$(function(){
					$("#logout").click(function(){
						$.cookie('cache_name','');
						location.reload();
					});
				});
			</script>
			<div class=user_btn><a href="javascript:void(0)" onclick="myhomepage()" name="homepage">设为首页</a>　<a href="javascript:void(0)" onclick="addfavorite()">收藏本站</a></div>
			<div id=magazine_title>本期杂志介绍</div>
			<div id=magazine_title_more><a href="/magazine">更多杂志</a></div>
			<?php 
				$pos_name = "top_magazine";
			?>
			<div id=magazine_pic <?php show_page_pos($pos_name)?>><?php show_page_img(72,93,1,'image1','top_magazine')?></div>
			<div id=magazine_description><a href="<?php echo $pos_items->$pos_name->href?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a><br><?php echo $pos_items->$pos_name->description;?></div>
			<div id=magazine_btn><a href="<?php echo $pos_items->$pos_name->href?>"><img src="/images/public/magazine_btn.jpg" border=0></a></div>

	</div>
  <div id=top_logo>
			<div id=border></div>
			<div id=logo></div>
			<div class=forbes_search>
					<select name="selsearch" class="iselect">
						<option value="list">榜单</option>
						<option value="rich">富豪</option>
						<option value="author">作者</option>
						<option value="news">文章</option>
					</select>
			</div>
			<input id="search_text" class="input">
			<button class=search>查 询</button>			
  </div>	
	
	<?php
		if($nav==""){	$nav=3;	}
		$countnav=$db->query("select * from fb_navigation where parent_id=0 order by priority asc");
		$navigation=$db->query('select name,id from fb_navigation where id='.$nav);
	?>
  <div id=navigation>
			<div class="menu" <?php if($navigation[0]->name=="首页"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[0]->href; ?>"><div class="nav" param1="<?php echo $countnav[0]->id; ?>" id=picindex></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="榜单"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[1]->href; ?>"><div class="nav" param1="<?php echo $countnav[1]->id; ?>" id=piclists></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="富豪"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[2]->href; ?>"><div class="nav" param1="<?php echo $countnav[2]->id; ?>" id=picbillionaires></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu" <?php if($navigation[0]->name=="投资"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[3]->href; ?>"><div class="nav" param1="<?php echo $countnav[3]->id; ?>" id=picinvestment></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="商业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[4]->href; ?>"><div class="nav" param1="<?php echo $countnav[4]->id; ?>" id=picbusiness></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="创业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[5]->href; ?>"><div class="nav" param1="<?php echo $countnav[5]->id; ?>" id=picentrepreneur></div></a>
			</div>

			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="科技"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[6]->href; ?>"><div class="nav" param1="<?php echo $countnav[6]->id; ?>" id=pictech></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="城市"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[7]->href; ?>"><div class="nav" param1="<?php echo $countnav[7]->id; ?>" id=piccity></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="生活"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[8]->href; ?>"><div class="nav" param1="<?php echo $countnav[8]->id; ?>" id=piclife></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="专栏"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[9]->href; ?>"><div class="nav" param1="<?php echo $countnav[9]->id; ?>" id=piccolumn></div></a>
			</div>
			<div id=top_function2>
				<a href="/club" id=member></a>
				<a href="#" id=magazine></a>
			</div>
	</div>
	<div id=navigation2>
			<?php for($i=0;$i<count($countnav);$i++){ 
				$navigation2=$db->query('select name,target,href from fb_navigation where parent_id='.$countnav[$i]->id.' order by priority asc'); ?>	
				<div class="nav2" <?php if($countnav[$i]->id==$nav){?>style="display:inline;"<?php }?> id="nav<?php echo $countnav[$i]->id; ?>">
					<?php for($j=0;$j<count($navigation2);$j++){ ?><a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $navigation2[$i]->href; ?>"><?php echo $navigation2[$j]->name; ?></a><?php if($j<(count($navigation2)-1)){ ?>　|　<?php }} ?>
				</div>
			<?php } ?>
	</div>
</div>		
		