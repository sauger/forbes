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
	if($category_type=='link'){
		$item = new table_class('fb_subject_link');
		$item->subject_id = $_POST['subject_id'];
		$item->module_id = $_POST['module_id'];
		$item->title = $_POST['title'];
		$item->priority = $_POST['priority'];
		$item->href = $_POST['href'];
		$item->save();
	}else if($category_type=='word'){
		
	}else{
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
	}
}else if($_POST['type']=='del'){
	if($_POST['s_type']=='link'){
		$table = 'fb_subject_link';
	}else if($_POST['s_type'] = 'word'){
		$table = 'fb_subject_word';
	}else{
		$table = 'fb_subject_items';
	}
	$item = new table_class($table);
	$item->delete($_POST['id']);
}else if($_POST['type']=='unpub'){
	if($_POST['s_type']=='link'){
		$table = 'fb_subject_link';
	}else if($_POST['s_type'] = 'word'){
		$table = 'fb_subject_word';
	}else{
		$table = 'fb_subject_items';
	}
	$item = new table_class($table);
	$item->find($_POST['id']);
	$item->is_adopt=0;
	$item->save();
}else if($_POST['type']=='pub'){
	if($_POST['s_type']=='link'){
		$table = 'fb_subject_link';
	}else if($_POST['s_type'] = 'word'){
		$table = 'fb_subject_word';
	}else{
		$table = 'fb_subject_items';
	}
	$item = new table_class($table);
	$item->find($_POST['id']);
	$item->is_adopt=1;
	$item->save();
}else if($_POST['type']=='priority'){
	if($_POST['s_type']=='link'){
		$table = 'fb_subject_link';
	}else if($_POST['s_type'] = 'word'){
		$table = 'fb_subject_word';
	}else{
		$table = 'fb_subject_items';
	}
	$item = new table_class($table);
	$item->find($_POST['id']);
	$item->priority = $_POST['priority'];
	$item->save();
}else if($_POST['type']=='link_title'){
	$item = new table_class('fb_subject_link');
	$item->find($_POST['id']);
	$item->title = $_POST['title'];
	$item->save();
}else if($_POST['type']=='link_href'){
	$item = new table_class('fb_subject_link');
	$item->find($_POST['id']);
	$item->href = $_POST['href'];
	$item->save();
}
else if($_POST['type']=='word'){
	$item = new table_class('fb_subject_word');
	if(!empty($_POST['id'])){
		$item->find($_POST['id']);
	}
	$item->title = $_POST['title'];
	$item->href = $_POST['href'];
	$item->text = $_POST['text'];
	$item->module_id = $_POST['module_id'];
	$item->create_at = now();
	$item->save();
}