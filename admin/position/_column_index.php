<?php
$db = get_db();

$items = $db->query("select publisher,b.nick_name,b.column_name,image_src from fb_news a left join fb_user b on a.publisher = b.id where b.role_name='column_editor' group by publisher order by created_at desc limit 4");
$len = count($items);
$table = new table_class("fb_page_pos");
$selected_news = array();
for($i=0;$i< $len;$i++){
	$news = $db->query("select title,id,created_at,description from fb_news where publisher = {$items[$i]->publisher} limit 3");
	$pos = 'column_recommend_top_l_'.$i;
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	$table->name = $pos;
	$table->display = $news[0]->title;
	$table->description = $news[0]->description;
	$table->image1 = $items[$i]->image_src;
	$table->alias = $items[$i]->column_name ? $items[$i]->column_name : $items[$i]->nick_name ."的";
	$table->reserve = $items[$i]->nick_name;
	$table->href = dynamic_news_url($news[0]);
	$table->static_href = static_news_url($news[0]);
	$table->save();
	$selected_news[] = $news[0]->id;
	for($j=1;$j<3;$j++){
		$pos = 'column_recommend_b_'.$i.'_'.$j;
		$table->find('first',array("conditions" => "name = '{$pos}'"));
		$table->name = $pos;
		$table->display = $news[$j]->title;
		$table->href = dynamic_news_url($news[$j]);
		$table->static_href = static_news_url($news[$j]);
		$table->save();
		$selected_news[] = $news[$j]->id;
	}
}

$selected_news = implode(',',$selected_news);
$news = $db->query("select title,a.id,a.created_at,a.description,b.nick_name from fb_news a left join fb_user b on a.publisher = b.id where author_type = 2 and a.id not in ({$selected_news}) order by created_at desc limit 11");
$len = count($news);
for($i=0;$i<$len;$i++){
	$pos = 'column_edit_t'.$i;	
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	$table->name = $pos;
	$table->display = $news[$i]->title;
	$table->description = $news[$i]->description;
	$table->reserve = $items[$i]->nick_name;
	$table->href = dynamic_news_url($news[$i]);
	$table->static_href = static_news_url($news[$i]);
	$table->save();
}



$items = $db->query("select publisher,b.nick_name,b.column_name,image_src from fb_news a left join fb_user b on a.publisher = b.id where author_type = 1 group by publisher order by created_at desc limit 4");
$len = count($items);
$table = new table_class("fb_page_pos");
$selected_news = array();
for($i=0;$i< $len;$i++){
	$db->echo_sql = true;
	$news = $db->query("select title,id,created_at,description from fb_news where publisher = {$items[$i]->publisher} limit 3");
	$db->echo_sql = false;
	$pos = 'column_r_t_l'.$i;
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	$table->name = $pos;
	$table->display = $news[0]->title;
	$table->description = $news[0]->description;
	$table->image1 = $items[$i]->image_src;
	$table->alias = $items[$i]->column_name ? $items[$i]->column_name : $items[$i]->nick_name ."的";
	$table->reserve = $items[$i]->nick_name;
	$table->href = dynamic_news_url($news[0]);
	$table->static_href = static_news_url($news[0]);
	$table->save();
	$selected_news[] = $news[0]->id;
	for($j=1;$j<3;$j++){
		$pos = 'column_recommend_top_r_t2_'.$i.'_'.$j;
		$table->find('first',array("conditions" => "name = '{$pos}'"));
		$table->name = $pos;
		$table->display = $news[$j]->title;
		$table->href = dynamic_news_url($news[$j]);
		$table->static_href = static_news_url($news[$j]);
		$table->save();
		$selected_news[] = $news[$j]->id;
	}
}

$selected_news = implode(',',$selected_news);
$news = $db->query("select title,a.id,a.created_at,a.description,b.nick_name from fb_news a left join fb_user b on a.publisher = b.id where author_type = 1 and a.id not in ({$selected_news}) order by created_at desc limit 11");
$len = count($news);
for($i=0;$i<$len;$i++){
	$pos = 'column_edit_edit_t2_'.$i;	
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	$table->name = $pos;
	$table->display = $news[$i]->title;
	$table->description = $news[$i]->description;
	$table->reserve = $items[$i]->nick_name;
	$table->href = dynamic_news_url($news[$i]);
	$table->static_href = static_news_url($news[$i]);
	$table->save();
}