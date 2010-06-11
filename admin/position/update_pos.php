<?php
include_once "../../frame.php";
$category = new category_class('news');
$pos_table = new table_class('fb_page_pos');

function update_pos($category_name,$count=1,$pos_name,$has_children=true,$ignore_time = false){
	global $category;
	global $pos_table;
	$db = get_db();
	$category_id = $category->find_by_name($category_name)->id;
	if(!$category_id){
		return false;
	}
	$ids = $has_children ? implode(',',$category->children_map($category_id)) : $category_id ;
	$sql = "select distinct(title) as title,id,short_title,created_at,description,video_photo_src,author from fb_news where is_adopt=1 and (block_endtime = '0000-00-00 00:00:00' or block_endtime is null or block_endtime <= now()) and category_id in ($ids) and copy_from=0 order by created_at desc limit {$count}";
	$news = $db->query($sql);
	$news_count = $db->record_count;
	if($news_count <= 0 ) return false;
	#$positions = $pos_table->find("all",array("conditions" => " name like '{$pos_name}%' and (end_time <= now() or end_time is null)","limit" => $count));
	#$pos_count = count($positions);
	$fill_count = 0;
	for($i=0;$i<$news_count;$i++){
		$pos = $count == 1 ? $pos_name : $pos_name .$i;
		$pos_table->find("first",array("conditions" => "name = '$pos'"));
		if($pos_table->id && $pos_table->end_time > date(now()) && !$ignore_time){
			continue;
		}
		$pos_table->name = $pos;
		$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
		$pos_table->end_time = $end_time;
		$pos_table->display = $news[$fill_count]->title;
		$pos_table->title = $news[$fill_count]->title;
		$pos_table->alias = $news[$fill_count]->author;
		$pos_table->image1 = $news[$fill_count]->video_photo_src;
		$pos_table->description = $news[$fill_count]->description;
		$pos_table->href = dynamic_news_url($news[$fill_count]);
		$pos_table->reserve = $news[$fill_count]->short_title;
		$pos_table->static_href = static_news_url($news[$fill_count]);
		$pos_table->save();
		$fill_count++;
	}
}
/*
function update_pos($category_name,$limit,$position_name,$is_parent=false,$flag=true){
	$db = get_db();
	$category = new category_class();
	if($is_parent){
		$category_id = $category->find_by_name($category_name)->id;
		if(!$category_id){
			return false;
		}
		$ids = $category->children_map($category_id);
		$ids = implode(",",$ids);
		$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where is_adopt=1 and (block_endtime = '0000-00-00 00:00:00' or block_endtime is null or block_endtime <= now()) and category_id in ($ids) order by created_at desc";
	}else{
		$category_id = $category->find_by_name($category_name)->id;
		if(!$category_id){
			return false;
		}
		$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where is_adopt=1 and (block_endtime = '0000-00-00 00:00:00' or block_endtime is null or block_endtime <= now()) and category_id={$category_id} order by created_at desc";
	}
	//echo $sql;
	$news = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<$limit;$j++){
			if($flag){
				$pos_name = $position_name.$j;
			}else{
				$pos_name = $position_name;
			}
			
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = static_news_url($news[$i]);
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $news[$i]->short_title;
				$pos->title = $news[$i]->title;
				$pos->image1 = $news[$i]->video_photo_src;
				$pos->description = $news[$i]->description;
				$pos->href = dynamic_news_url($news[$i]);
				$pos->static_href = static_news_url($news[$i]);
				$pos->comment = $category_name.$i;
				$pos->save();
				break;
			}
		}
	}
}
*/

function update_column($type,$limit,$position_name,$news_limit='',$news_position='',$flag=true){
	$db = get_db();
	$sql = "select t1.* from fb_user t1 join (select * from fb_news order by created_at desc) t2 on t1.id=t2.publisher where t1.role_name='{$type}' group by t1.id order by t2.created_at limit {$limit}";
	$column = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					if(!$column[$i]->column_name){
						$pos->display = $column[$i]->nick_name;
					}else{
						$pos->display = $column[$i]->column_name;
					}
					$pos->title = $column[$i]->nick_name;
					$pos->image1 = $column[$i]->image_src;
					$pos->description = $column[$i]->description;
					$pos->href = "/column/{$column[$i]->name}";
					$pos->static_href = "/column/{$column[$i]->name}";
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				if(!$column[$i]->column_name){
					$pos->display = $column[$i]->nick_name;
				}else{
					$pos->display = $column[$i]->column_name;
				}
				$pos->title = $column[$i]->nick_name;
				$pos->image1 = $column[$i]->image_src;
				$pos->description = $column[$i]->description;
				$pos->href = '/column/column.php?id='.$column[$i]->id;
				$pos->static_href = '/column/column.php?id='.$column[$i]->id;
				$pos->save();
				break;
			}
		}
	}
	
	if($news_limit!=''&&$news_position!=''){
		for($k=0;$k<$count;$k++){
			$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where publisher={$column[$k]->id} order by created_at desc limit {$news_limit}";
			$news = $db->query($sql);
			$news_count = $db->record_count;
			for($i=0;$i<$news_count;$i++){
				for($j=0;$j<$news_limit;$j++){
					if($flag){
						$pos_name = $position_name.$k.$news_position.$j;
					}else{
						$pos_name = $news_position.$k;
					}
					
					$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
					if($db->record_count==1){
						if($record[0]->end_time>now()){
						}else{
							$pos = new table_class('fb_page_pos');
							$pos->find($record[0]->id);
							$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
							$pos->end_time = $end_time;
							$pos->display = $news[$i]->title;
							$pos->title = $news[$i]->title;
							$pos->image1 = $news[$i]->video_photo_src;
							$pos->description = $news[$i]->description;
							$pos->href = dynamic_news_url($news[$i]);
							$pos->static_href = static_news_url($news[$i]);
							$pos->save();
							break;
						}
					}else{
						$pos = new table_class('fb_page_pos');
						$pos->name = $pos_name;
						$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
						$pos->end_time = $end_time;
						$pos->display = $news[$i]->title;
						$pos->title = $news[$i]->title;
						$pos->image1 = $news[$i]->video_photo_src;
						$pos->description = $news[$i]->description;
						$pos->href = dynamic_news_url($news[$i]);
						$pos->static_href = static_news_url($news[$i]);
						$pos->comment = $category_name.$i;
						$pos->save();
						break;
					}
				}
			}
		}
	}
}

function update_column2($type,$limit,$position_name,$news_limit,$news_position,$flag=true){
	$db = get_db();
	for($k=0;$k<$limit;$k++){
		$pos_name = $position_name.$k;
		$column = $db->query("select t2.id,t2.name from fb_page_pos t1 join fb_user t2 on t1.alias=t2.name where t1.name='{$pos_name}' ");
		if($db->record_count==1){
			$sql = "select title,id,short_title,created_at,description,video_photo_src from fb_news where publisher={$column[0]->id} and is_adopt=1 group by title order by created_at desc limit {$news_limit}";
			$news = $db->query($sql);
			$news_count = $db->record_count;
		}else{
			$news_count = 0;
		}
		
		for($i=0;$i<4;$i++){
			$pos_name = $position_name.$k.$news_position.$i;
				$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
				if($db->record_count==1){
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = column_article_url($column[0]->name,$news[$i]->id,'static');
					$pos->save();
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->name = $pos_name;
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = column_article_url($column[0]->name,$news[$i]->id,'static');
					$pos->save();
				}
		}
	}
}

function update_click($limit,$position_name){
	$db = get_db();
	$date = dt_increase(-30,'d');
	$sql = "select distinct(title) as title,id,short_title,created_at,description,video_photo_src from fb_news where 1=1 and is_adopt=1 and created_at > '{$date}' order by click_count desc,created_at desc limit {$limit}";
	$news = $db->query($sql);
	$news_count = $db->record_count;
	for($i=0;$i<$news_count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = static_news_url($news[$i]);
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $news[$i]->title;
				$pos->title = $news[$i]->title;
				$pos->image1 = $news[$i]->video_photo_src;
				$pos->description = $news[$i]->description;
				$pos->href = dynamic_news_url($news[$i]);
				$pos->static_href = static_news_url($news[$i]);
				$pos->comment = $category_name.$i;
				$pos->save();
				break;
			}
		}
	}
}

function update_news_column($category_name,$limit,$type,$position_name){
	if($type=='author'){
		$author_type = 2;
	}else if($type == 'journalist'){
		$author_type = 1;
	}
	$db = get_db();
	$category = new category_class();
	$category_id = $category->find_by_name($category_name)->id;
	if(!$category_id){
		return false;
	}
	$ids = $category->children_map($category_id);
	$ids = implode(",",$ids);
	$sql = "select t1.id,t1.title,t1.short_title,t1.created_at,t1.description,t1.video_photo_src,t2.nick_name,t2.image_src,t2.column_name from fb_news t1 join fb_user t2 on t1.author_id=t2.id where 1=1 and t1.is_adopt=1 and t1.author_type={$author_type} and t1.category_id in ($ids) and t2.role_name='{$type}' order by t1.created_at desc";
	$news = $db->query($sql);
	$news_count = $db->record_count;
	for($i=0;$i<$news_count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->image2 = $news[$i]->image_src;
					if(!$news[$i]->column_name){
						$pos->alias = $news[$i]->nick_name;
					}else{
						$pos->alias = $news[$i]->column_name;
					}
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = static_news_url($news[$i]);
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $news[$i]->title;
				$pos->title = $news[$i]->title;
				$pos->image1 = $news[$i]->video_photo_src;
				$pos->image2 = $news[$i]->image_src;
				if(!$news[$i]->column_name){
					$pos->alias = $news[$i]->nick_name;
				}else{
					$pos->alias = $news[$i]->column_name;
				}
				$pos->description = $news[$i]->description;
				$pos->href = dynamic_news_url($news[$i]);
				$pos->static_href = static_news_url($news[$i]);
				$pos->comment = $category_name.$i;
				$pos->save();
				break;
			}
		}
	}
}

include "./_index.php";
include "_listindex.php";
include "_richindex.php";
include "./_fiveindex.php";
include "./_right.php";
#include "./_life.php";
include "./_column_index.php";
#include "./_magazine.php";
#static the pages
echo "更新位置完成!<br/>";
if(static_top()){
	echo '静态化顶部成功!<br/>';
}else{
	echo '静态化顶部失败!<br/>';
}

if(static_bottom()){
	echo '静态化底部成功!<br/>';
}else{
	echo '静态化底部失败!<br/>';
}
$a = array('activities','ad','article','column_c','column','favor','forum','four','investment_list','magazine','rich','right_list');
foreach($a as $v){
	if(!static_right($v)){
		echo("静态化右侧'{$v}'失败<br/>");
	}	
}
echo '静态化右侧成功!<br/>';
$a = array('investment','business','entrepreneur','tech','city','list','billionaires','life','column','club');
foreach($a as $v){
	if(!static_sub_index($v)){
		echo ("静态化二级首页'{$v}'失败<br/>");
	}	
}
if(static_index()){
	echo '静态化首页成功!<br/>';
}else{
	echo '静态化首页失败!<br/>';
}
