<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	global $page_type;
	global $page_items;
	if($page_type == 'static'){
		function get_news_url($news){
			return static_news_url($news);
		}
	}else{
		function get_news_url($news){
			return dynamic_news_url($news);
		}
	}
?>
<div class=right_title>
	<div class=title_con>读者高见</div>
	<div class=more><a href="http://www.forbeschina.com/comments/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div class="right_box">
	<?php
		$db = get_db();
		$comments = $db->query("select * from fb_comment where resource_type='news' and is_approve=1 order by priority asc,created_at desc limit 8");
		$count = $db->record_count;
		$news = new table_class('fb_news');
		for($i=0;$i<$count;$i++){
			$news->find($comments[$i]->resource_id);
	?>
	<div class=context><a href="http://www.forbeschina.com<?php echo static_news_url($news) ."/comments/{$comments[$i]->id}"?>"><?php echo $comments[$i]->comment?></a></div>
	<div class=context1><?php echo $comments[$i]->nick_name;?>　|　<a href="<?php echo get_news_url($news);?>" target="_blank" title="<?php echo $news->title;?>"><?php echo $news->short_title;?></a></div>
	<?php }?>
</div>
<div class=bottom_line></div>
