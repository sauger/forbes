<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$key = $_GET['key'];
	$key1 = $key;
	$db = get_db();
	if(strlen($key)>100){
		redirect('error.html');
		die();
	}
	if(empty($key)){
		$count = 0;
		$page_record_count = 0;
	}else{
		#$sql = "select * from fb_news where title like '%$key%' or short_title like '%$key%' or description like '%$key%' or keywords like '%$key%' order by created_at desc";
		#$record = $db->paginate($sql,10);
		#$count = $db->record_count;
		if($key){
			$change = array('('=>'\(',')' => '\)');
			strtr($key,$change);
			$key = str_replace('　', ' ', $key);
			$key = str_replace(',', ' ', $key);
			$key = explode(' ',$key);	
			$len = count($key);
			for($i=0;$i<$len;$i++){
				if(!$key[$i]) continue;
				$key[$i] = "({$key[$i]})+";
			}
			$key = implode('|',$key);
		}
		$sql = "select * from fb_news where language_tag = 0 ";
		if($key){
			$sql .= " and (author regexp '{$key}')";
		}
		$record = $db->paginate($sql);
		$count = count($record);
	}
	$key = $key1;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>新闻检索_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right','search/news_author_highlight.js');
		css_include_tag('news','public','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
<div id=ibody>
		<?php include_top();?>
		<div id=bread>新闻检索</div>
		<div id=bread_line></div>
		
		<div id=l>
			<div class=news_caption>
					<div class=captions>搜索作者"<span id="span_key"><?php echo $key;?></span>"的新闻<span>共<?php echo $page_record_count;?>篇</span></div>
			</div>
			<div id=list_content>
				<?php
					for($i=0;$i<$count;$i++){
				?>
				<div class=list_box>
						<div class="head_line">
							<div class=title><a title="<?php echo $record[$i]->title;?>" href="<?php echo static_news_url($record[$i]);?>"><?php echo $record[$i]->title?></a></div>
							<div class=info>作者：<?php echo $record[$i]->author;?>　发布于：<?php echo substr($record[$i]->created_at,0,10);?></div>
						</div>
						<div class=description ><?php echo strip_tags($record[$i]->description);?></div>
				</div>
				<?php }?>
				<div id=page><?php paginate();?></div>
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