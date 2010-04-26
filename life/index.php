<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="生活"');
	$nav=$nav[0]->id;		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-奢侈品</title>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','right','life');
		init_page_items();
		$category = new category_class('news');
	?>
</head>
<body>
<div id=ibody>
<? include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
<div id=life_top>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="540">
       <param name="movie" value="life1.swf">
       <param name="quality" value="high">
       <param name="wmode" value="transparent" />
       <embed src="life1.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="540"></embed>
	</object>
</div>
<div id=life_middle>
	<div id="life_middle_flash">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="525" height="140">
            <param name="movie" value="life2.swf">
            <param name="quality" value="high">
            <param name="wmode" value="transparent" />
            <embed src="life2.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="525" height="140"></embed>
			</object>
	</div>
	<div id=life_middle_bg></div>
	<?php $pos_name = "lifeindex_column"?>
	<div id=life_middle_column <?php show_page_pos($pos_name)?>>
		<div id=picture><?php show_page_img(120,120,0);?></div>
		<div id=title><?php show_page_href()?></div>
		<div id=text><?php echo $pos_items->$pos_name->description;?></div>
		<div id=link><a href="<?php echo $pos_items->$pos_name->reserve;?>" target="_blank">进入专栏</a></div>
	</div>
</div>	

<div id=life_bottom>
  <div id=life_bottom_left>
  		<div class=life_caption>
				<div class=captions>奢华<span>推荐</span></div>
			</div>
			<div id=life_bottom_flash>
			  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="660" height="210">
             <param name="movie" value="life3.swf">
              <param name="quality" value="high">
              <param name="wmode" value="transparent" />
              <embed src="life3.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="660" height="210"></embed>
			   </object>
			</div>
      
      <div class=life_box>
 				<div class=life_caption>
					<div class=captions>服饰钟表</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("服饰钟表")->id?>" class=more target="_blank"></a>
				</div>
				
				<?php $pos_name = "liftindex_news_1";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>豪车</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("豪车")->id?>" class=more></a>      	
				</div>	
				
				<?php $pos_name = "liftindex_news_2";?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>游艇飞机</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("游艇飞机")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "liftindex_news_3";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>				
      </div>            


			<div id=life_ml>
  			<div class=life_caption>
					<div class=captions>名利场</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo  $category->find_by_name("名利场")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "lifeindex_news_mlc"?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(500,200)?>
				</div>
				<div id=content <?php show_page_pos($pos_name)?>>
						<div id=content_title>
							<?php show_page_href()?>
						</div>
						<div id=content_description>
							<?php show_page_desc()?>
						</div>
				</div>
			</div>
				

      <div class=life_box>
 				<div class=life_caption>
					<div class=captions>美酒美食</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("美酒美食")->id?>" class=more></a> 
				</div>
				
				<?php $pos_name = "liftindex_news_4";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>体面</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("体面")->id?>" class=more></a>     	
				</div>	
				
				<?php $pos_name = "liftindex_news_5";?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>文化娱乐</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("文化娱乐")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "liftindex_news_6";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(210,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
				<div class=description><?php show_page_desc()?></div>			
      </div>      
  </div>

  <div id=life_bottom_right>
      <div class=life_box2>
  			<div class=life_caption>
					<div class=captions>旅游</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("旅游")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "lifeindex_ly";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(246,160)?>
				</div>
      </div>
      
      <div class=life_box2>
  			<div class=life_caption>
					<div class=captions>豪宅</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("豪宅")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "lifeindex_hz";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(246,160)?>
				</div>
      </div>     	
			
			<div class=life_box2>
  			<div class=life_caption>
					<div class=captions>关注</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("关注")->id?>" class=more></a> 
				</div>
				<div id=line></div>

				<?php 
					for($i=0;$i<3;$i++ ){
						$pos_name = "lifeindex".$i;
				?>
				<div id=list <?php show_page_pos($pos_name);?>>
					<?php show_page_href()?>
				</div>
				<?php }?>
			</div>
				

      <div class=life_box2>
  			<div class=life_caption>
					<div class=captions>奢华专题</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("生活")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "lifeindex_zt";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(246,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
      </div>  

      <div class=life_box2>
  			<div class=life_caption>
					<div class=captions>慈善</div>
					<div class=line>|</div>
					<a href="/news/news_list.php?cid=<?php echo $category->find_by_name("慈善")->id?>" class=more></a> 
				</div>	
				<?php $pos_name = "lifeindex_cs";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
					<?php show_page_img(246,160)?>
				</div>
				<div class=title><?php show_page_href()?></div>
      </div>  
			
  </div>			
</div>
<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
</div>
</body>