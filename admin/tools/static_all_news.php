<?php
include "../../frame.php";
$db = get_db();
$news_id = $db->query("select id from fb_news where is_adopt=1 and language_tag = 0");
if($db->record_count > 0 ){
	$len = $db->record_count;
	$news = new table_class('fb_news');
	for($i=0;$i< $len; $i++){
		$news->find($news_id[$i]->id);
		static_news($news);
	}
}