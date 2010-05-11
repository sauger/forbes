<?php 
	include_once('../frame.php');
	$cid = intval($_GET['cid']);  //normal category list;can work with author_type to find the column articles;
	$news_id = intval($_GET['news_id']); //find the news with the same author by giving the news id;
	$author_type = $_GET['author_type'];
	if(empty($cid) && empty($news_id) && empty($author_type)){
		redirect('error.html');
		die();
	}
	$db = get_db();
	if($news_id){
		$db->query("select author as name from fb_news where id={$news_id}");
		if($db->record_count <= 0){
			redirect('/error/');
			die();
		}
		$author = $db->field_by_name('name');
		$conditions[]="author='{$author}'";
		$title = "作者:{$author}";
	}else{
		if(empty($cid)) $cid = 0;
		$category = new category_class('news');
		$c_id = $category->children_map($cid);
		$c_id = implode(',',$c_id);
		$conditions[] = "a.category_id in ({$c_id})";
		$title = $category->find($cid)->name;
	}
	
	
	if($author_type == 'column_writer' || $author_type == 'column_editor'){
		$conditions[] = "b.role_name = '{$author_type}'";
	}elseif($author_type == 'column'){
		$conditions[] = "b.role_name like '{$author_type}%'";
	}else{
		$author_type = "";
		$conditions[] = "is_adopt = 1";
	}
	$sql = "select a.id,video_photo_src,a.author,a.created_at,a.title,a.content,a.description from fb_news a left join fb_user b on a.publisher=b.id where ";
	if($cid && $author_type == "" && (!$_REQUEST['page'] || $_REQUEST['page']==1)){
		//normal category,find the top image;
		$condition = implode(' and ',$conditions) . " and video_photo_src!='' and set_up=1";
		$order = " order by priority asc,created_at";
		$top_news = $db->query($sql.$condition.$order ." limit 1");
	}
	if($top_news){
		$conditions[]=" a.id != {$top_news[0]->id}";
	}
	$condition = implode(' and ',$conditions);
	$record = $db->paginate($sql.$condition. " order by created_at desc",10);
	$totle_count = $top_news ? $page_record_count + 1 : $page_record_count;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>新闻列表_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('news','public','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
<div id=ibody>
		<?php include_top();?>
		<div id=bread>
			<?php
			if($cid || $cid===0	){
				$parent_ids = $category->tree_map($cid);
				$len = count($parent_ids);
				$itemp = 0;
				for($i=$len-1;$i>0;$i--){
					$itemp++;
					$item = $category->find($parent_ids[$i]);
			?>
			<a href="<?php echo get_newslist_url($parent_ids[$i]);?>"><?php echo $item->name;?></a>
			<?php
				}
				$item = $category->find($parent_ids[0]);
				$condition .= " and category_id in ({$c_id})";
				if($itemp > 0 ) echo ">";
				
			?>
			<span style=" margin-left:8px;"><?php echo $item->name;?></span>
			<?php }else{
				$item = $db->query("select author as name from fb_news where id={$news_id}");
				if(empty($item)) die();
				$item = $item[0];
				$condition .= " and author = '{$item->name}'";
			 }
			 
			 ?>		
		</div>
		<div id=bread_line></div>
		
		<div id=l>
			<div class=news_caption>
					<div class=captions><?php echo $title;?><span>共<?php echo $totle_count;?>篇</span></div>
			</div>
			<?php
					if($top_news){
				?>
			<div id=list_top>
					<div id=picture><img width="300" height="200"  src="<?php echo $top_news[0]->video_photo_src?>"></div>
					<div id=title><a href="<?php echo get_news_url($top_news[0]);?>"><?php echo $top_news[0]->title;?></a></div>
					<div id=description><?php echo strip_tags($top_news[0]->description);?></div>
					<div id=info>作者：<?php echo $top_news[0]->author;?>　发布于：<?php echo substr($top_news[0]->created_at,0,10);?></div>
			</div>
			<?php }?>
			
			<div id=list_content>
					<?php
					$count = count($record);
					for($i=0;$i<$count;$i++){
					?>
					<div class=list_box>
							<div class=title><a title="<?php echo $record[$i]->title;?>" href="<?php echo get_news_url($record[$i]);?>"><?php echo $record[$i]->title?></a></div>
							<div class=info>作者：<?php echo $record[$i]->author;?>　发布于：<?php echo substr($record[$i]->created_at,0,10);?></div>
							<div class=description ><?php echo mb_substr(strip_tags($record[$i]->content),0,200,'utf8');?></div>
					</div>
					<?php }?>
					<div id=page><?php paginate(); ?></div>
			</div>
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