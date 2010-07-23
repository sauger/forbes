<?php
		if(!function_exists("get_config"))
			include_once(dirname(__FILE__).'/../frame.php');
		$db=get_db();
		global $pos_items;
		init_page_items();
?>
<div id="top_img_left">
	<img src="/images/index_two/top1.jpg"/>
</div>
<div id="top_img_right">
	<a href="#"><img src="/images/index_two/top2.jpg"/></a>
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
		<div id="top_login"><a href="">登录</a></div>
		<div class="top_login"><a href="">注册会员</a></div>
		<div class="top_login"><a href=""><font>会员专区</font></a></div>
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
<div id="top_menu2_banner">
	<div id="top_menu2_left"></div>
	<div id="top_menu2_content">
	<?php for($i = 0 ; $i < 4 ; $i++){?>
		<div class="t_content">
			<div></div>
			<a href="">阿桑</a>
		</div>
		<?php }?>
	</div>
	<div id="top_menu2_right"></div>
</div>