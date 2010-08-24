<?php
$db = get_db();
$role = "column_writer";
unset($ids);
unset($items);
$ids[] = 72;
for($i=0;$i<4;$i++){
	$nid = '('.implode(',',$ids).')';
	$item = $db->query("select publisher,b.name,b.nick_name,b.column_name,image_src,b.role_name from fb_news a left join fb_user b on a.publisher = b.id where role_name = '$role' and a.is_adopt=1 and b.id not in {$nid}  order by created_at desc limit 1");
	if($item){
		$items[]= $item[0];
		$ids[]=$item[0]->publisher;
	}
}
//$items = $db->query("select publisher,b.name,b.nick_name,b.column_name,image_src,b.role_name from fb_news a left join fb_user b on a.publisher = b.id where role_name = '$role' and b.id != 72  group by publisher order by created_at desc limit 4");
$len = count($items);
$table = new table_class("fb_page_pos");
$selected_news = array();
for($i=0;$i< $len;$i++){
	$news = $db->query("select a.title,a.id,a.created_at,a.description,b.name from fb_news a left join fb_user b on a.publisher = b.id where publisher = {$items[$i]->publisher} and a.is_adopt=1 group by a.title order by created_at desc limit 3");
	$pos = 'column_recommend_top_l_'.$i;
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	#if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
	#	continue;
	#}
	$table->name = $pos;
	$table->display = $news[0]->title;
	$table->description = $news[0]->description;
	$table->image1 = $items[$i]->image_src;
	$table->alias = $items[$i]->column_name ? $items[$i]->column_name : $items[$i]->nick_name;
	$table->reserve = "/column/{$items[$i]->name}";
	$table->href = dynamic_news_url($news[0]);
	$table->static_href = column_article_url($news[0]->name,$news[0],'static');
	$table->save();
	$selected_news[] = $news[0]->id;
	for($j=1;$j<3;$j++){
		$pos = 'column_recommend_b_'.$i.'_'.$j;
		$table->find('first',array("conditions" => "name = '{$pos}'"));
		#if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
		#	continue;
		#}
		$table->name = $pos;
		$table->display = $news[$j]->title;
		$table->href = dynamic_news_url($news[$j]);
		$table->static_href = column_article_url($news[$j]->name,$news[$j],'static');
		$table->save();
		if($news[$j]->id){
			$selected_news[] = $news[$j]->id;	
		}
	}
}

$selected_news = implode(',',$selected_news);
$news = $db->query("select a.title,a.id,a.created_at,a.description,b.nick_name,b.name from fb_news a left join fb_user b on a.publisher = b.id where b.role_name='$role' and a.is_adopt=1  and a.id not in ({$selected_news}) group by a.title order by created_at desc limit 11");
$len = count($news);
for($i=0;$i<$len;$i++){
	$pos = 'column_edit_t'.$i;	
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	#if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
	#	continue;
	#}
	$table->name = $pos;
	$table->display = $news[$i]->title;
	$table->description = $news[$i]->description;
	$table->alias = $news[$i]->nick_name;
	$table->reserve =  "/column/{$news[$i]->name}";
	$table->href = dynamic_news_url($news[$i]);
	$table->static_href = column_article_url($news[$i]->name,$news[$i],'static');
	$table->save();
}


$role = "column_editor";
unset($ids);
unset($items);
$ids[] = 72;
for($i=0;$i<4;$i++){
	$nid = '('.implode(',',$ids).')';
	$item = $db->query("select publisher,b.name,b.nick_name,b.column_name,image_src,b.role_name from fb_news a left join fb_user b on a.publisher = b.id where role_name = '$role'  and a.is_adopt=1 and b.id not in {$nid}  order by created_at desc limit 1");
	if($item){
		$items[]= $item[0];
		$ids[]=$item[0]->publisher;
	}
}

#$items = $db->query("select publisher,b.name,b.nick_name,b.column_name,image_src,b.role_name from fb_news a left join fb_user b on a.publisher = b.id where role_name = '$role'  group by publisher order by created_at desc limit 4");
$len = count($items);
$table = new table_class("fb_page_pos");
$selected_news = array();
for($i=0;$i< $len;$i++){
	$news = $db->query("select a.title,a.id,a.created_at,a.description,b.name from fb_news a left join fb_user b on a.publisher = b.id where publisher = {$items[$i]->publisher} and a.is_adopt=1 group by a.title order by created_at desc limit 3");
	$pos = 'column_r_t_l'.$i;
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	#if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
	#	continue;
	#}
	$table->name = $pos;
	$table->display = $news[0]->title;
	$table->description = $news[0]->description;
	$table->image1 = $items[$i]->image_src;
	$table->alias = $items[$i]->column_name ? $items[$i]->column_name : $items[$i]->nick_name;
	$table->reserve = "/column/{$items[$i]->name}";
	$table->href = dynamic_news_url($news[0]);
	$table->static_href = column_article_url($news[0]->name,$news[0],'static');
	$table->save();
	$selected_news[] = $news[0]->id;
	for($j=1;$j<3;$j++){
		$pos = 'column_recommend_top_r_t2_'.$i.'_'.$j;
		$table->find('first',array("conditions" => "name = '{$pos}'"));
		#if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
		#	continue;
		#}
		$table->name = $pos;
		$table->display = $news[$j]->title;
		$table->href = dynamic_news_url($news[$j]);
		$table->static_href = column_article_url($news[$j]->name,$news[$j],'static');
		$table->save();
		if($news[$j]->id){
			$selected_news[] = $news[$j]->id;	
		}
	}
}

$selected_news = implode(',',$selected_news);
$news = $db->query("select a.title,a.id,a.created_at,a.description,b.nick_name,b.name from fb_news a left join fb_user b on a.publisher = b.id where b.role_name='$role' and a.is_adopt=1  and a.id not in ({$selected_news}) group by a.title order by created_at desc limit 11");
$len = count($news);
for($i=0;$i<$len;$i++){
	$pos = 'column_edit_edit_t2_'.$i;	
	$table->find('first',array("conditions" => "name = '{$pos}'"));
	if(strtotime($table->end_time) && strtotime($table->end_time) >= time()){
		continue;
	}
	$table->name = $pos;
	$table->display = $news[$i]->title;
	$table->description = $news[$i]->description;
	$table->alias = $news[$i]->nick_name;
	$table->reserve =  "/column/{$news[$i]->name}";
	$table->href = dynamic_news_url($news[$i]);
	$table->static_href = column_article_url($news[$i]->name,$news[$i],'static');
	$table->save();
}