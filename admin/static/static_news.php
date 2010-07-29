<?php
$id = intval($_GET['id']);
$type = $_GET['type'];
include '../../frame.php';
if(empty($id)){
	die('alert("非法访问！");');
}
$news = new table_class('fb_news');
$news->find($id);
if($type=='publish'){
	$result = static_news($news,'page');
	if($result){
		$news->is_adopt = 1;
		$news->save();
		echo 'location.reload()';
	}else{
		echo 'alert("发布新闻失败")';
	}	
}else{
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "{$static_dir}/review/{$date}";
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	$file = $dir ."/{$news_id}.shtml";
	@unlink($file);
	$news->is_adopt = 0;
	$news->save();
	echo 'location.reload()';
}
