<?
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="榜单"');
	$nav=$nav[0]->id;	
	$seo=$db->query('select * from fb_seo where name="榜单首页"');	
	
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/Tr/1999/rEC-html401-19991224/loose.dtd">
<html>
<head>
	<title><?php echo $seo[0]->title ?></title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $seo[0]->keywords ?>" />
	<meta name="description" content="<?php echo $seo[0]->description ?>" />
	<?php
		use_jquery();
		js_include_tag('public','index','right');
		css_include_tag('list','public','right_inc');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
		<? include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="#">榜单</a></div>
		<div id=bread_line></div>
		<div id="list_left">
			<div id=lists_headline>
				<div id=headline>
					<div class=headline_pic id=headline_pic_0><?php $pos_name = "listindex_hl_0";show_page_img(300,200)?></div>
					<div class=headline_pic id=headline_pic_1 style="display:none;"><?php $pos_name = "listindex_hl_1";show_page_img(300,200)?></div>
					<div class=headline_pic id=headline_pic_2 style="display:none;"><?php $pos_name = "listindex_hl_2";show_page_img(300,200)?></div>
					<div id=headline_content>
						<div class=headline_title id=headline_title_0 <?php show_page_pos('listindex_hl_0','list_head')?>><?php show_page_href('listindex_hl_0')?></div>
						<div class=headline_title id=headline_title_1 style="display:none;" <?php show_page_pos('listindex_hl_1','list_head')?>><?php show_page_href('listindex_hl_1')?></div>
						<div class=headline_title id=headline_title_2 style="display:none;" <?php show_page_pos('listindex_hl_2','list_head')?>><?php show_page_href('listindex_hl_2')?></div>
						<div class=headline_description id=headline_description_0><?php echo $pos_items->listindex_hl_0->description; ?></div>
						<div class=headline_description id=headline_description_1 style="display:none;"><?php echo $pos_items->listindex_hl_1->description; ?></div>
						<div class=headline_description id=headline_description_2 style="display:none;"><?php echo $pos_items->listindex_hl_2->description; ?></div>
						
					<?php for($j=0;$j<=2;$j++){?>	
						<div class="headline_related" id="headline_related_<?php echo $j?>" <?php if($j<>0){echo "style='display:none'";}?> >
						<?php				
							//if($record_show[$j]->id!=''){
							//	$rela_list = $db->query("select t1.* from fb_custom_list_type t1 join fb_list_relation t2 on t1.id=t2.rela_id where t2.list_id={$record_show[$j]->id} order by t2.priority limit 3");
								for($i=0;$i<2;$i++)
								{
							//		  if(count($rela_list)<1){break;}
								$pos_name = "listindex_hl_{$j}_{$i}";
								?>
									<div class=list <?php show_page_pos($pos_name,'list_head')?>><?php show_page_href()?></div>
							<?php 	}
							//}
						?>				
						</div>
					<? }?>	
		
						<div id=btn>
						<div class=headline_btn1 id=l param=l style="background:url(/images/index/slideshow_back.gif) no-repeat;"></div>
						<div class=headline_btn2 id=b0 param=0 style="background:url(/images/index/slideshow_active.gif) no-repeat"></div>
						<div class=headline_btn2 id=b1 param=1 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=b2 param=2 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn1 id=r param=r  style="background:url(/images/index/slideshow_next.gif) no-repeat"></div>
						</div>
					</div>
				</div>
			</div>

			<div class=caption>
					<div class=captions>榜单推荐</div>
					<div class=line>|</div>
					<a href="/list/list.php" class=more  target="_blank"></a>
			</div>
			<div id=recommend>

					<?php 
					for($i=0;$i<5;$i++){
						$pos_name = "listindex_recommend_{$i}";
					?>
					<div class="recommend_p" <?php show_page_pos($pos_name,'list_head')?>>
						<div class=recommend_pic><img width="94" height="94" src="<?php echo $pos_items->$pos_name->image1;?>"></div>
						<div class="recommend_list"><?php show_page_href();?></div>
					</div>
					<?php }?>
			</div>
			<div class="recommend_dash"></div>

			<div class=caption>
					<div class=captions>常规榜单</div>
					<div class=line>|</div>
					<a href="/list/list.php" class=more target="_blank"></a>
			</div>

			<div id="normal_list">
				<div class="list_list">
				<?php 							
					$type = array('rich' => '富豪','company' => '公司','famous' => '名人','tech' => '生活');
					$j=1;
					foreach($type as $key => $val){
				?>
					<div class="list_box">
						<div class="list_title">
							<div class="title"><?php echo $val;?></div>
							<div class="title_line1"></div>
							<div class="title_line2"><a href="list.php?id=<?php echo $j;?>">更多>></a></div>
							<div class="title_line3"></div>
						</div>
						<div class="list_li_box">
							<?php for($i=0;$i<4;$i++){
								$pos_name = "listindex_{$key}_{$i}"; 
							?>
								<li <?php show_page_pos($pos_name,'list_common')?>><?php show_page_href();?></li>
							<?php } ?>
						</div>
					</div>
					<?php $j=$j+2;}?>
				</div>
				<div id=list_dash></div>
				<div class="list_list">
					<?php $type= array('invest' => '投资','city' => '城市','sport' => '体育','edu' => '教育')?>
					<?php
					$j=2;			
					foreach($type as $key => $val){
					?>
					<div class="list_box">
						<div class="list_title">
							<div class="title"><?php echo $val;?></div>
							<div class="title_line1"></div>
							<div class="title_line2"><a href="list.php?id=<?php echo $j;?>">更多>></a></div>
							<div class="title_line3"></div>
						</div>
						<div class="list_li_box">
							<?php for($i=0;$i<4;$i++){
								$pos_name = "listindex_{$key}_{$i}"; 
							?>
								<li <?php show_page_pos($pos_name)?>><?php show_page_href();?></li>
							<?php } ?>
						</div>
					</div>
					<?php $j=$j+2;}?>
				</div>
			</div>
		</div>
		<div id="right_inc" style="margin-top:10px;">
		  		<?php include dirname(__FILE__)."/../right/ad.php";?>
		  		<?php include dirname(__FILE__)."/../right/right_list.php"?>
		  		<?php include dirname(__FILE__)."/../right/article.php";?>
		 </div>
		
		<? include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>
</html>