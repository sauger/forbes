<?php
function get_news_by_pos($pos,$page='') {
	$db = get_db();
	$pos = addslashes($pos);
	$sql ="select * from fb_position where name='{$pos}'";
	if($page){
		$page = $db->query("select id from fb_position where name='{$page}' and page_id=0");
		$page_id = $page[0]->id;
		$sql .= " and page_id=$page_id";
		if($db->record_count==0) return false;
	}
	$record = $db->query($sql);
	if($record === false) return false;
	
	switch ($record[0]->type) {
		case 'category':
			$category = new category_class('news');
			$category_id=$record[0]->category_id;
			$all_category_ids = $category->children_map($category_id);
			$all_category_ids = implode(',',$all_category_ids);
			$sql = 'select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.category_id from fb_news n left join fb_category c on n.category_id=c.id where n.is_adopt=1 and c.id in('.$all_category_ids.') and c.category_type="news" order by n.created_at desc limit '.$record[0]->position_limit;;
			break;
		case 'news':
			$sql='select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.author_id from fb_position_relation f left join fb_news n on f.news_id=n.id where n.is_adopt=1 and f.type="news" and f.position_id='.$record[0]->id.' order by f.priority limit '.$record[0]->position_limit;			
			break;
		case 'list':
			$sql = "select n.id,n.name,n.image_src,n.comment from fb_position_relation f join fb_custom_list_type n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='list' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'image':
			$sql = "select n.* from fb_position_relation f join fb_images n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='image' and n.is_adopt=1 order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'column':
			$sql = "select n.* from fb_position_relation f join fb_user n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='column' and n.role_name='column' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'journalist':
			$sql = "select n.* from fb_position_relation f join fb_user n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='journalist' and n.role_name='journalist' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'magazine':
			$sql = "select n.* from fb_position_relation f join fb_magazine n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='magazine' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'activity':
			$sql = "select n.* from fb_position_relation f join fb_event n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='activity' order by f.priority limit {$record[0]->position_limit}";
			break;
		default:
			return false;
		break;
	}
	return $db->query($sql); 
} 


function dynamic_news_url($news){
	return "/news/news.php?id={$news->id}";
}

function static_news_url($news,$index = 1){
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "/review/{$date}";
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	if($index > 1){
		$file = $dir ."/{$news_id}_{$index}.shtml";
	}else{
		$file = $dir ."/{$news_id}.shtml";	
	}
	
	return $file;
}

function column_article_url($writer,$news,$page_type=null){
	$news_id = is_object($news) ? $news->id : $news;
	if(empty($page_type))
		global $page_type;
	if($page_type == "static"){
		return "/column/{$writer}/{$news_id}";	
	}else{
		return "/news/news.php?id={$news_id}";
	}
	
}

function get_news_en_static_url($news,$index = 1) {
		$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
		$date = date('Ym',strtotime($news->created_at));
		$dir  = "/review/{$date}";
		if($index > 1){
			$file = $dir ."/{$news_id}_en_{$index}.shtml";
		}else{
			$file = $dir ."/{$news_id}_en.shtml";	
		}	
		
		return $file;;
}


function static_index() {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/index.php?page_type=static");
	return write_to_file("{$static_dir}/review/index.shtml",$content,'w');
}

function static_sub_index($name) {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/{$name}/index.php?page_type=static");
	return write_to_file("{$static_dir}/review/{$name}/index.shtml",$content,'w');
}

function static_top(){
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/inc/top.inc.php?page_type=static");
	return write_to_file("{$static_dir}/review/inc/top.inc.shtml",$content,'w');
}

function static_bottom() {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/inc/bottom.inc.php?page_type=static");
	return write_to_file("{$static_dir}/review/inc/bottom.inc.shtml",$content,'w');
}

function static_right($name){
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/right/{$name}.php?page_type=static");
	return write_to_file("{$static_dir}/review/inc/right_{$name}.inc.shtml",$content,'w');
}

function static_contact($name){
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/contact/contact.php?page_type=static&name={$name}");
	return write_to_file("{$static_dir}/review/contact/{$name}.shtml",$content,'w');
}

function static_news($news,$symbol='fck_pageindex',$en = false){
	if(!$news){
		return false;
	};
	global $static_dir;
	global $static_url;
	$url = "{$static_url}/news/news.php?id={$news->id}&page_type=static";
	if($en) $url .= "&lang=en";
	$content = file_get_contents($url);
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "{$static_dir}/review/{$date}";
	if(!is_dir($dir)){
		mkdir($dir);
	}
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	if($en) $news_id .= "_en";
	$file = $dir ."/{$news_id}.shtml";
	if(!write_to_file($file,$content,'w')){
		return false;
	}
	$page_count = get_fck_page_count($news->content);
	if ($page_count > 1){
		for($i=2;$i<= $page_count;$i++){
			$url = "{$static_url}/news/news.php?id={$news->id}&{$symbol}={$i}&page_type=static";
			if($en) $url .= "&lang=en";
			$content = file_get_contents($url);
			$file = "$dir/{$news_id}_{$i}.shtml";
			if(!write_to_file($file,$content,'w')){
				return false;
			}
		}
	}
	
	//handle the english article
	if(!$en){
		$db = get_db();
		$db->query("select * from fb_news_relationship where chinese_news_id = {$news->id}");
		if($db->move_first()){
			$news->find($news->id);
			return static_news($news,$symbol,true);
				
		}	
	}
	
	return true;
}

function include_top(){
	global $page_type;
	global $page_items;
	if($page_type == 'static'){
		function get_news_url($news){
			return static_news_url($news);
		}
		echo '<!--#include virtual="/review/inc/top.inc.shtml"  -->';
	}else{
		function get_news_url($news){
			return dynamic_news_url($news);
		}
		include_once(dirname(__FILE__).'/top.inc.php');
	}
}

function include_bottom(){
	global $page_type;
	global $pos_items;
	if($page_type == 'static'){
		echo '<!--#include  virtual="/review/inc/bottom.inc.shtml"  -->';
	}else{
		include_once(dirname(__FILE__).'/bottom.inc.php');
	}
}

function include_right($name){
	global $page_type;
	global $pos_items;
	if($page_type == 'static'){
		echo '<!--#include  virtual="/review/inc/right_'.$name .'.inc.shtml"  -->';
	}else{
		include_once(dirname(__FILE__)."/../right/{$name}.php");
	}	
}

class PosItemClass{

}

function get_page_items(){
	$pos_items = new PosItemClass();
	$pos = new table_class('fb_page_pos');
	$pos = $pos->find('all');
	if(empty($pos)) $pos = array();
	foreach ($pos as $v){
		$key = $v->name;
		$pos_items->$key = $v;
	}
	return $pos_items;
}

function init_page_items(){
	global $pos_items;
	if($pos_items) return;
	$pos_items = get_page_items();
	global $page_type;
	$page_type = $page_type ? $page_type : $_REQUEST['page_type'];
	if(empty($page_type)){
		$page_type= 'dynamic';
	}
	if($page_type == 'static'){
		foreach($pos_items as $val){
			if($val->static_href)
				$val->href = $val->static_href;
		}
	}
	if($page_type == 'admin'){
		js_include_tag('jquery.colorbox-min');
		css_include_tag('colorbox');
		js_include_tag('admin/page_admin');	
	}
}

function show_page_pos($pos,$name='default'){
	global $page_type;
	$page_type = $page_type ? $page_type : $_REQUEST['page_type'];
	if($page_type == 'admin'){
		echo " pos=\"{$pos}\" pos_tag='{$name}'";
	}	
};

function show_page_href($pos=null,$title=null,$target=null,$max_len = 0){
	global $pos_items;
	if(empty($pos)){
		global $pos_name;
		$pos = $pos_name;
	}
	if(is_null($title)) $title = 'title';
	if(is_null($target)) $target = '_blank';
	$_title = $title ? strip_tags($pos_items->$pos->$title ? $pos_items->$pos->$title : $pos_items->$pos->display) : '';
	if($max_len > 0){
		$len = mb_strlen($pos_items->$pos->display,'utf-8');
		if($len > $max_len){
			$display = mb_substr($pos_items->$pos->display,0,$max_len-1,'utf-8')  ."...";
		}else{
			$display = $pos_items->$pos->display;
		}
	}else{
		$display = $pos_items->$pos->display;
	}
	echo "<a href='{$pos_items->$pos->href}'" .($title ? " title='{$_title}'" : ""). ($target ? " target='{$target}'":"") .">{$display}</a>";
}


function show_page_desc($pos=null,$link="href",$title='description',$target="_blank"){
	global $pos_items;
	if(empty($pos)){
		global $pos_name;
		$pos = $pos_name;
	}
	if($link){
		$_title = $title ? strip_tags($pos_items->$pos->$title) : '';
		echo "<a href='{$pos_items->$pos->$link}'" .($title ? " title='{$_title}'" : ""). ($target ? " target='{$target}'":"") .">".strip_tags($pos_items->$pos->description)."</a>";
	}else{
		echo strip_tags($pos_items->$pos->description);
	}
}

function show_page_img($width=null,$height=null,$border=0,$src="image1",$pos=null,$link="href",$title='title',$target="_blank"){
	global $pos_items;
	if(empty($pos)){
		global $pos_name;
		$pos = $pos_name;
	}
	$attr = " src=\"{$pos_items->$pos->$src}\"";
	if(intval($width)>0) $attr .=" width=\"{$width}\"";
	if(intval($height)>0) $attr .=" height=\"{$height}\"";
	if(intval($border)>=0 && !is_null($border)) $attr .=" border=\"{$border}\"";
	if($link){
		$_title = $title ? strip_tags($pos_items->$pos->$title) : '';
		echo "<a href='{$pos_items->$pos->$link}'" .($title ? " title='{$_title}'" : ""). ($target ? " target='{$target}'":"") ."><img {$attr} /></a>";
	}else{
		echo "<img {$attr} />";
	}
}
/*
function show_page_href($pos_items,$pos_name,$show_title=true,$target=null){
	if($show_title){
		echo '<a  href="'.$pos_items->$pos_name->href.'" title="'.$pos_items->$pos_name->title.'" '. ($target ? "target='$target'" : ''). '>'.$pos_items->$pos_name->display.'</a>';
	}else{
		echo '<a href="'.$pos_items->$pos_name->href.'" '. ($target ? "target='$target'" : ''). '>'.$pos_items->$pos_name->display.'</a>';
	}
	
}
function show_page_desc($pos_items,$pos_name,$show_title=false){
	if($show_title){
		echo '<a href="'.$pos_items->$pos_name->href.'" title="'.$pos_items->$pos_name->description.'">'.$pos_items->$pos_name->description.'</a>';
	}else{
		echo '<a href="'.$pos_items->$pos_name->href.'">'.$pos_items->$pos_name->description.'</a>';
	}
function show_page_img($pos_items,$pos_name,$index='1',$width='',$height=''){
	$image = 'image'.$index;
	echo '<a href="'.$pos_items->$pos_name->href.'"><img border=0 src="'.($pos_items->$pos_name->$image ? $pos_items->$pos_name->$image : '\\').'"';
	
	if($width) echo 'width="'.$width.'"';
	if($height) echo 'height="'.$height.'"';
	echo '></a>';
	
}	
	
}
*/

function get_page_display(){
	
}

function adjust_user_score($user_id,$score,$reason){
	$db = get_db();
	$db->execute("update fb_yh set score=score + {$score} where id = {$user_id}");
	$table = new table_class("fb_user_score_history");
	$table->user_id = $user_id;
	$table->score = $score;
	$table->reason = $reason;
	$table->created_at = "now()";
	$table->save();
}

function front_user_id(){
	$db = get_db();
	if(empty($_COOKIE['cache_name'])) return false;
	$db->query("select id from fb_yh where cache_name='{$_COOKIE['cache_name']}'");
	if($db->record_count <= 0 ) return false;
	return $db->field_by_name('id');	
}

function get_newslist_url($cid){
	global $page_type;
	if($page_type == 'static'){
		return "/review/list/{$cid}";
	}else{
		return "/news/news_list.php?cid={$cid}";
	}
}

function get_news_serach_url($key){
	global $page_type;
	$key = urlencode($key);
	if($page_type == 'static'){
		return "/search/news/key/{$key}";
	}else{
		return "/search/news.php?key={$key}";
	}
}

function insert_ad_record($ad,$type='show'){
	if(is_int($ad)){
		$table = new table_class('forbes_ad.fb_ad');
		$table->find($ad);
		$ad = $table;
	}
	$list = new table_class("forbes_ad.fb_ad_{$type}_list");
	$list->ad_id = $ad->id;
	$list->ad_name = $ad->name;
	$list->channel_id = $ad->channel_id;
	$list->banner_id = $ad->banner_id;
	$list->create_at = now();
	$list->show_page = $_POST['url'];
	$list->remote_ip = $_SERVER['REMOTE_ADDR'];
	$list->save();
}

function die_error(){
	die(redirect('error.html'));
	
}

function front_login($name,$password){
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}' and authenticated=1";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		$user_id = $db->field_by_name('id');
		$cache_name = sprintf('%06s',$user_id) .rand_str(24);
		$db->execute("update fb_yh set cache_name='{$cache_name}' where id={$user_id}");
		if($_POST['time']!='')
		{
			$limit=time()+$_POST['time']*3600*24;
			if(empty($_POST['time'])){
				$limit = 0;
			}
			setcookie("name",$name,$limit,'/');
			setcookie("cache_name",$cache_name,0,'/');
			setcookie("password",$_POST['password'],$limit,'/');
			
		}else{
			setcookie("name",$name,0,'/');
			setcookie("cache_name",$cache_name,0,'/');
			
		}
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$user_id},now())");
		return $cache_name;
	}else{
		return false;
	}
}
?>