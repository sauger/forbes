<?php
		if(!function_exists("get_config"))
			include_once(dirname(__FILE__).'/../frame.php');
		$db=get_db();
		global $pos_items;
		init_page_items();
?>
	<div id=top_>
		<div id=top_banner class="ad_banner">
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
							+ '<a href="javascript:void(0)" id="logout">退出</a>'
							+ '<a href="/user">会员中心</a>';
					$('.user_btn').html(str);
				}else{
					$('.user_btn').html('<a href="/login">登录</a>　<a href="/register/">注册</a>');
				}
				$(function(){
					$("#logout").click(function(){
						$.cookie('cache_name','',{path: '/'});
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
			<div id=magazine_pic <?php show_page_pos($pos_name,'magazine')?>><?php show_page_img(72,93,0,'image1','top_magazine')?></div>
			<div id=magazine_description><a href="<?php echo $pos_items->$pos_name->href?>" target="_blank"><?php echo $pos_items->$pos_name->display;?></a><br><?php echo $pos_items->$pos_name->description;?></div>
			<div id=magazine_btn><a href="<?php echo $pos_items->$pos_name->href?>"><img src="/images/public/magazine_btn.jpg" border=0></a></div>
	</div>
  <div id=top_logo>
			<div id=border></div>
			<div id=logo><a href="http://www.forbeschina.com"><img border=0 src="/images/forbes_logo.png"></a></div>
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
		$navigation=$db->query('select name,id,parent_id from fb_navigation where id='.$nav);
	?>
  <div id=navigation>
  <?php foreach($countnav as $v){?>
  		<div class="menu">
			<a href="<?php echo $v->href; ?>" id="<?php echo $v->id; ?>"><div class="nav" id="<?php echo $v->id_name;?>"></div></a>
		</div>
  <?php }?>
			<div id=top_function2>
				<a href="/club" id=member></a>
				<a href="/magazine/subscription.php" id=magazine></a>
			</div>
			
	</div>
	<div id=navigation2>
			<?php
				global $category;
				if(empty($category)){
					$category = new category_class('news');
				} 
				for($i=0;$i<count($countnav);$i++){ 
				$navigation2=$db->query('select name,target,href from fb_navigation where parent_id='.$countnav[$i]->id.' order by priority asc'); ?>	
				<div class="nav2" id="nav<?php echo $countnav[$i]->id; ?>">
					<?php 
						$except = array("picindex","piclist","picbillionaires","piclife","piccolumn","life");
						for($j=0;$j<count($navigation2);$j++){ 
						$url = !in_array($countnav[$i]->id_name,$except) ? get_newslist_url($category->find_by_name($navigation2[$j]->name)->id) : $navigation2[$j]->href;
					?>
						<a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $url; ?>"><?php echo $navigation2[$j]->name; ?></a><?php if($j<(count($navigation2)-1)){ ?>　|　<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
	</div>
</div>
<script>
	var url_path = location.pathname.replace(/\/\s*/g,"");
	if(url_path == "") url_path = 'index';
	$(".nav").hover(function(){
		var num=$(this).parent().attr("id");
		
		$(".nav2").hide();
		$("#nav"+num).show();
		$(".nav").parent().parent().css("background","none");
		$(this).parent().parent().css('background',"url('/images/public/bg_menu.jpg') repeat-x");
	},function(){});
	
	$('#pic'+url_path).hover();
	<?php 
	global $page_type;
	if($page_type == 'static'){?>
	function top_search(){
		var type = $(".iselect").val();
		var text = $("#search_text").val();
		window.location.href="/search/" + type +"/key/"+encodeURI(text);
	}
	<?php }else{?>
	function top_search(){
		var type = $(".iselect").val();
		var text = $("#search_text").val();
		
		if(type=='list'){
			window.location.href="/list/list.php?key="+encodeURI(text);
		}else if(type=='news'){
			window.location.href="/search/news.php?key="+encodeURI(text);
		}else if(type=='author'){
			window.location.href="/search/author.php?key="+encodeURI(text);
		}else if(type=='rich'){
			window.location.href="/search/rich.php?name="+encodeURI(text);
		}
	}
	<?php }?>;
</script>	
		