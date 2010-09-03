<?php 
$db = get_db();
$role = "column_writer";

$ids[] = 72;
for($i=0;$i<5;$i++){
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
	$pos = 'index_column'.$i;
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



$role = "column_editor";
unset($ids);
unset($items);
$ids[] = 72;
for($i=0;$i<5;$i++){
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
	$pos = 'index_editor'.$i;
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

#update_pos("城市",3,"index_city",true,true);
update_pos("早餐资讯",3,"index_zczx_",true,true);
update_pos("基金经理看市",1,"index_jjjl",true,true);
update_pos("股票之选",1,"index_gpzx",true,true);
update_pos("阳光财富观察",2,"index_dyn_list",true,true);
?>