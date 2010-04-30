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
			<div id=magazine_pic <?php show_page_pos($pos_name)?>><?php show_page_img(72,93,0,'image1','top_magazine')?></div>
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
  <script>
	  /* top select */
	  var selects = document.getElementsByName('selsearch');
	  var isIE = (document.all && window.ActiveXObject && !window.opera) ? true : false;
	  function gebid(id) {	return document.getElementById(id);}
	  function stopBubbling (ev) {		ev.stopPropagation();}
	  function rSelects() {
	  	for (i=0;i<selects.length;i++){
	  		selects[i].style.display = 'none';
	  		select_tag = document.createElement('div');
	  			select_tag.id = 'select_' + selects[i].name;
	  			select_tag.className = 'select_box';
	  		selects[i].parentNode.insertBefore(select_tag,selects[i]);
	
	  		select_info = document.createElement('div');	
	  			select_info.id = 'select_info_' + selects[i].name;
	  			select_info.className='tag_select';
	  			select_info.style.cursor='pointer';
	  		select_tag.appendChild(select_info);
	
	  		select_ul = document.createElement('ul');	
	  			select_ul.id = 'options_' + selects[i].name;
	  			select_ul.className = 'tag_options';
	  			select_ul.style.position='absolute';
	  			select_ul.style.display='none';
	  			select_ul.style.zIndex='999';
	  		select_tag.appendChild(select_ul);
	
	  		rOptions(i,selects[i].name);
	  		mouseSelects(selects[i].name);
	
	  		if (isIE){
	  			selects[i].onclick = new Function("clickLabels3('"+selects[i].name+"');window.event.cancelBubble = true;");
	  		}
	  		else if(!isIE){
	  			selects[i].onclick = new Function("clickLabels3('"+selects[i].name+"')");
	  			selects[i].addEventListener("click", stopBubbling, false);
	  		}		
	  	}
	  }
	
	
	  function rOptions(i, name) {
	  	var options = selects[i].getElementsByTagName('option');
	  	var options_ul = 'options_' + name;
	  	for (n=0;n<selects[i].options.length;n++){	
	  		option_li = document.createElement('li');
	  			option_li.style.cursor='pointer';
	  			option_li.className='open';
	  		gebid(options_ul).appendChild(option_li);
	
	  		option_text = document.createTextNode(selects[i].options[n].text);
	  		option_li.appendChild(option_text);
	
	  		option_selected = selects[i].options[n].selected;
	
	  		if(option_selected){
	  			option_li.className='open_selected';
	  			option_li.id='selected_' + name;
	  			gebid('select_info_' + name).appendChild(document.createTextNode(option_li.innerHTML));
	  		}
	  		
	  		option_li.onmouseover = function(){	this.className='open_hover';}
	  		option_li.onmouseout = function(){
	  			if(this.id=='selected_' + name){
	  				this.className='open_selected';
	  			}
	  			else {
	  				this.className='open';
	  			}
	  		} 
	  	
	  		option_li.onclick = new Function("clickOptions("+i+","+n+",'"+selects[i].name+"')");
	  	}
	  }
	
	  function mouseSelects(name){
	  	var sincn = 'select_info_' + name;
	
	  	gebid(sincn).onmouseover = function(){ if(this.className=='tag_select') this.className='tag_select_hover'; }
	  	gebid(sincn).onmouseout = function(){ if(this.className=='tag_select_hover') this.className='tag_select'; }
	
	  	if (isIE){
	  		gebid(sincn).onclick = new Function("clickSelects('"+name+"');window.event.cancelBubble = true;");
	  	}
	  	else if(!isIE){
	  		gebid(sincn).onclick = new Function("clickSelects('"+name+"');");
	  		gebid('select_info_' +name).addEventListener("click", stopBubbling, false);
	  	}
	
	  }
	
	  function clickSelects(name){
	  	var sincn = 'select_info_' + name;
	  	var sinul = 'options_' + name;	
	
	  	for (i=0;i<selects.length;i++){	
	  		if(selects[i].name == name){				
	  			if( gebid(sincn).className =='tag_select_hover'){
	  				gebid(sincn).className ='tag_select_open';
	  				gebid(sinul).style.display = '';
	  			}
	  			else if( gebid(sincn).className =='tag_select_open'){
	  				gebid(sincn).className = 'tag_select_hover';
	  				gebid(sinul).style.display = 'none';
	  			}
	  		}
	  		else{
	  			gebid('select_info_' + selects[i].name).className = 'tag_select';
	  			gebid('options_' + selects[i].name).style.display = 'none';
	  		}
	  	}
	
	  }
	
	  function clickOptions(i, n, name){		
	  	var li = gebid('options_' + name).getElementsByTagName('li');
	
	  	gebid('selected_' + name).className='open';
	  	gebid('selected_' + name).id='';
	  	li[n].id='selected_' + name;
	  	li[n].className='open_hover';
	  	gebid('select_' + name).removeChild(gebid('select_info_' + name));
	
	  	select_info = document.createElement('div');
	  		select_info.id = 'select_info_' + name;
	  		select_info.className='tag_select';
	  		select_info.style.cursor='pointer';
	  	gebid('options_' + name).parentNode.insertBefore(select_info,gebid('options_' + name));
	
	  	mouseSelects(name);
	
	  	gebid('select_info_' + name).appendChild(document.createTextNode(li[n].innerHTML));
	  	gebid( 'options_' + name ).style.display = 'none' ;
	  	gebid( 'select_info_' + name ).className = 'tag_select';
	  	selects[i].options[n].selected = 'selected';
	
	  }
	
	  window.onload = function(e) {
	  	bodyclick = document.getElementsByTagName('body').item(0);
	  	rSelects();
	  	bodyclick.onclick = function(){
	  		for (i=0;i<selects.length;i++){	
	  			gebid('select_info_' + selects[i].name).className = 'tag_select';
	  			gebid('options_' + selects[i].name).style.display = 'none';
	  		}
	  	}
	  }
	
	  /* top select */ 
 </script>
	
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
				<a href="#" id=magazine></a>
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
						$except = array("picindex","piclists","picbillionaires","piclife","piccolumn");
						for($j=0;$j<count($navigation2);$j++){ 
						$url = !in_array($countnav[$i]->id_name,$except) ? get_newslist_url($category->find_by_name($navigation2[$j]->name)->id) : $navigation2[$j]->href;
					?>
						<a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $url; ?>"><?php echo $navigation2[$j]->name; ?></a><?php if($j<(count($navigation2)-1)){ ?>　|　<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
	</div>
</div>		
		