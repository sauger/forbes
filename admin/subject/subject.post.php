<?php
	require_once "../../frame.php";
	$subject = new table_class('fb_subject');
	$subject->update_attributes($_POST['subject'],false);
	$subject->update_file_attributes('subject');
	$subject->identity = strtolower($subject->identity);
	$subject_id = $_POST['subject']['id'] ? $_POST['subject']['id'] : 0;
	if ($subject_id == 0){
		$optype = 'add';
		$redirect_url = 'subject_add.php';
		$subject->created_at = date("Y-m-d H:i:s");
		$subject->templet_name = 'new_temp';
	}else{
		$optype = 'edit';
		$redirect_url = 'subject_edit.php?id=' .$subject_id;
	}
		
	if(!$subject->name){
		alert('专题名称不能为空!');	
		redirect($redirect_url);
		return;
	}
	if($subject_id == 0 && !$subject->identity ){
		alert('专题标识不能为空!');
		redirect($redirect_url);
		return;
	}
	if($subject_id == 0){
		if(is_dir('../../subject/' .$subject->identity)){
			alert('专题标识已存在,请重新制定!');
			redirect($redirect_url);
			return;
		}else{
			if(!mkdir('../../subject/' .$subject->identity)){
				alert('创建专题目录失败!');
				redirect($redirect_url);
				return;
			}
		}
	}
	if(!$subject->save()){
		alert('创建专题失败!');
		redirect($redirect_url);
		return;
	};
	
	if($optype == 'add'){
		//copy templet files
		copy_dir('../../subject_templet/' .$subject->templet_name,'../../subject/' .$subject->identity,true);
	}
	$redirect_url = 'subject_edit.php?id=' .$subject->id;
	/*
	 * 处理分类

	$cate = new table_class('fb_subject_category');
	foreach ($_POST['cate_id'] as $k => $v) {
		$cate->id = $v;
		$cate->subject_id = $subject->id;
		$cate->pos = $_POST['pos'][$k];
		$cate->name = $_POST['name'][$k];
		$cate->category_type = $_POST['category_type'][$k];
		$cate->description = $_POST['description'][$k];
		$cate->record_limit = $_POST['record_limit'][$k];
		$cate->height = $_POST['height'][$k];
		$cate->element_height = $_POST['eheight'][$k];
		$cate->element_width = $_POST['ewidth'][$k];
		$cate->scroll_type = $_POST['scroll_type'][$k];
		$cate->priority = $k;
		$cate->save();
	}
	*/
	redirect($redirect_url);
	
?>