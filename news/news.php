<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		$news = new table_class('fb_news');
		if(!$news->find($id)){
			redirect('error.html');
			die();
		}else{
			$db = get_db();
			$db->query("select group_concat(industry_id separator ',') as ids from fb_news_industry where news_id=$id");
			if($db->move_first()){
				$industry_id = $db->field_by_name('ids');
			}
		}
	}else{
		redirect('error.html');
		die();
	}
	$db->query("select english_news_id from fb_news_relationship where chinese_news_id={$id}");
	if($db->move_first()){
		$english_id = $db->field_by_name('english_news_id');
	}
	if(strtolower($_GET['lang']) == 'en' && $english_id){
		$english_news = new table_class('fb_news');
		$english_news->find($english_id);
		$title = $english_news->title;
		$content = $english_news->content;
	}else{
		$title = $news->title;
		$content = $news->content;
	}
	function get_news_en_url($news){
		global $page_type;
		if($page_type == 'static'){
			return get_news_en_static_url($news);
		}
		return "news.php?id={$news->id}&lang=en";o
	}
	
	$db->query("select text as words from fb_filte_words");
	if($db->move_first()){
		do{
			$content = str_replace($db->field_by_name('words'),'****',$content);
		}while($db->move_next());

	}
	$page_type= $_GET[page_type] ? $_GET[page_type] : $page_type;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>_福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('news/news','public','right','jquery.cookie');
		css_include_tag('public','news','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($news->category_id);
			?>
			<?php
				$len = count($parent_ids);
				for($i=$len-1;$i>=0;$i--){
					$item = $category->find($parent_ids[$i]);
					$curl = $page_type == 'static' ? "/review/list/{$parent_ids[$i]}/cid" :"news_list.php?cid={$parent_ids[$i]}";
			?>
				<a href="<?php echo get_newslist_url($parent_ids[$i]);?>"><?php echo $item->name;?></a> > 
			<?php }	?>
			<span style="color:#246BB0;"><?php echo strip_tags($news->title);?></span>				
		</div>
		<div id=bread_line></div>
		<div id=l>
			<div id=news_title><?php echo $title;?></div>
			<div id=news_info>作者：<?php echo $news->author ? $news->author : '福布斯中文网';?>　　发布于：<?php echo substr($news->created_at,0,10);?></div>
			<?php if(trim(strip_tags($news->description))!=''){?><div id="news_desc"><?php echo $news->description;?></div><?php }?>
			<div id=news_tools>
				<?php if(false){?>
					<div style="border-left:0" class=news_tools_btn><img src="/images/news/btn_cn.png"><span class=news_tools_span><a href="<?php echo get_news_url($news)?>">正文</a></span></div>
					<div class=top_title><img src="/images/news/btn_en.png"><span class=news_tools_span>English</span></div>
				<?php }else{?>
					<div style="border-left:0" class=news_tools_btn><img src="/images/news/btn_cn.png"><span class=news_tools_span>正文</span></div>
				<?php if(false){?>
					<div class=news_tools_btn><img src="/images/news/btn_en.png"><span class=news_tools_span><a href=<?php echo get_news_en_url($news)?>>English</a></span></div>
				<?php }?>
				<?php }?>
					<div class=news_tools_btn><img src="/images/news/btn_share.png"><span class=news_tools_span><a href="<?php echo $static_site?>/review/<?php echo $id;?>/share">分享</a></span></div>
					<div class=news_tools_btn><img src="/images/news/btn_print.png"><span class=news_tools_span><a href="javascript:window.print();">打印</a></span></div>
					<div class=news_tools_btn><img id=font_down src="/images/news/font3.gif" class=news_tools_span style="margin:0"><span class=news_tools_span><a>字体大小</a></span><img id=font_up src="/images/news/font2.gif" class=news_tools_span></div>
					<?php if($news->pdf_src!=''){?>
					<div class=news_tools_btn><!-- <img src="/images/news/btn_donwload.png"> --><span class=news_tools_span><a target="_blank" href="<?php echo $news->pdf_src;?>">下载PDF格式</a></span></div>
					<?php }?>
					<div class=news_tools_btn style="border-right:0"><img src="/images/news/btn_collection.png"><span class=news_tools_span><a href="<?php echo $news->id;?>" id=a_collect>加入收藏</a></span></div>
					<div class=news_tools_btn2></div>
			</div>
	
			<div id=news_text>
				<div id=news_text_info>
						<div class=info_title style="width:180px;">来源于：<?php if(strpos($news->top_info,'http://www') ===false){?>福布斯中文网<?php }?></div>
						<?php 
							if($news->top_info!=''){?>
								<div id=info_resource><?php echo $news->top_info;?></div>
						<?php }
							if($news->author!='' && $news->author != '福布斯中文网'){
								$record = $db->query("select id,created_at,short_title,title from fb_news where author='{$news->author}' and is_adopt=1 and title!='{$title}' group by title limit 3");
								if(count($record)>0){
						?>
						<div class=info_title style="margin-top:15px;">该作者其他文章</div>
						<div class=info_more><a href="<?php echo "{$static_site}/review/list/{$id}/author"?>"><img src="/images/news/more.png" border=0></a></div>
						<div class=info_list>
							<ul>
								<?php for($i=0;$i<count($record);$i++){?>
								<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>"><?php echo $record[$i]->short_title?></a></li>	
								<?php }?>
							</ul>
						</div>
						<?php
								}
							}
							$related_count = 0;
							$related_max = 2;
							$record = array();
							if($news->related_news!=''){
								$record = $db->query("select id,created_at,title,short_title from fb_news where id in({$news->related_news})");
								$related_count += $db->record_count;
							}	
							if($related_count<$related_max){
								$industry = $db->query("select industry_id from fb_news_industry where news_id={$news->id}");
								if ($db->record_count > 0){
									foreach ($industry as $val){
										$inds[]=$val->industry_id;
									}
									$inds = implode(',',$inds);
									$ind_news = $db->query("select news_id,b.id,title,created_at,short_title from fb_news_industry a left join fb_news b on a.news_id=b.id where is_adopt=1 and industry_id in ($inds) and news_id != {$news->id} limit " .($related_max - $related_count));
									if ($db->record_count > 0 ){
										$related_count += $db->record_count;
										$record = array_merge($record,$ind_news);
									}
								}
							}
							if($related_count<$related_max){
								$ind_news = $db->query("select id,title,created_at,short_title from fb_news where is_adopt=1 and category_id ={$news->category_id} order by rand()  limit " .($related_max - $related_count));
								if ($db->record_count > 0 ){
									$related_count += $db->record_count;
									$record = array_merge($record,$ind_news);
								}
							}
							if($related_count > 0){
						?>
						<div class=info_title style="margin-top:15px;">推荐的评论文章</div>
						<div class=info_list>
							<ul>
								<?php for($i=0;$i<count($record);$i++){?>
								<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>"><?php echo $record[$i]->short_title?></a></li>	
								<?php }?>
							</ul>
						</div>
						<?php 
							}
						?>
						
						<div class=info_dash></div>
						<?php if($news->keywords!=''){?>
						<!-- 
						<div class=info_keywords>
						<?php 
								#$keywords = explode('||',$news->keywords);
									#for($i=0;$i<count($keywords);$i++){
									#	if (empty($keywords[$i])) continue;
										#$surl = get_news_serach_url($keywords[$i]);
									#	$out[]="<a href='{$surl}'>{$keywords[$i]}</a>";
									#}
								#echo implode('、',$out);
						?>
							</div>
							<div id=info_keywords_bottom>
								<div class=info_title>文章的关键字</div>
							</div>
							 -->
							<?php 
								$keywords = explode('||',$news->keywords);
								$len = count($keywords);
								$icount =0;
								for($k=0;$k<$len;$k++){
									if($icount >=4) break;
									$key_word = addslashes($keywords[$k]);
									$key_news = $db->query("select id,title,created_at from fb_news where is_adopt=1 and keywords like '%{$key_word}%' and id != {$news->id} and copy_from=0 order by created_at desc limit 2");
									if ($db->record_count <=0) continue;
									$icount++;
							?>
							<div class=info_title style="margin-top:15px;font-size:12px;">与“<?php echo $keywords[$k]?>”相关的文章 <span class="info_more"><a href="<?php echo get_news_serach_url($keywords[$k])?>"><img src="/images/news/more.png" border=0></a></span></div>
							<div class=info_list>
								<ul>
									<?php foreach ($key_news as $val){?>
									<li><a href="<?php echo get_news_url($val)?>" target="_blank"><?php echo $val->title;?></a></li>
									<?php }?>
								</ul>
							
							</div>
						<?php
								} 
						}
						?>
				</div>
									
				<?php if($news->ad_id){?>
				<div id=ad_roll></div>
				<div id="news_banner" class="ad_banner"><img src="/images/news/picture6.jpg"></div>
				<?php }?>								
		
				<div id=news_content><?php echo get_fck_content($content,'page');?></div>
				<div id=news_paginate><?php print_fck_pages2($content,'news.php?id='.$news->id."&lang={$_GET['lang']}",'page');?></div>
	    </div>
			<div id=news_comment></div>
			<input type="hidden" value="<?php echo $id;?>" id=newsid></input>
					
	</div>
		<div id="right_inc">
		 	<?php include_right("ad");?>
			<?php include_right("favor");?>
			<?php include_right("four");?>
			<?php include_right("forum");?>
			<?php include_right("magazine");?>
		</div>
		<?php include_bottom();?>
	</div>
</body>
<html>