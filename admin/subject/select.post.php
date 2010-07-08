<?php
#session_start();
include_once('../../frame.php');
#judge_role();

$type = $_POST['type'];
switch ($_POST['category_type']){
	case 'newslist':$category_type='news';break;
	case 'photolist':$category_type='image';break;
	default:$category_type=$_POST['category_type'];
}

if($_POST['type']=='add'){
	$item = new table_class('fb_subject_items');
	$item->subject_id = $_POST['subject_id'];
	switch ($category_type){
		case 'news':
			$item->category_id = $_POST['category_id'];
		break;
		case 'image':
			$item->category_id = $_POST['category_id'];
		break;
		default:
			$item->category_id = $_POST['module_id'];
	}
	$item->category_type = $category_type;
	$item->resource_id = $_POST['id'];
	$item->save();
}else if($_POST['type']=='del'){
	$item = new table_class('fb_subject_items');
	$item->delete($_POST['id']);
}else if($_POST['type']=='unpub'){
	$item = new table_class('fb_subject_items');
	$item->find($_POST['id']);
	$item->is_adopt=0;
	$item->save();
}else if($_POST['type']=='pub'){
	$item = new table_class('fb_subject_items');
	$item->find($_POST['id']);
	$item->is_adopt=1;
	$item->save();
}else if($_POST['type']=='priority'){
	$item = new table_class('fb_subject_items');
	$item->find($_POST['id']);
	$item->priority = $_POST['priority'];
	$item->save();
}