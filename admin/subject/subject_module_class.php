<?php
	class fb_subject_module_class extends table_class{
		function __construct(){
			parent::__construct('fb_subject_modules');
		}
		
		function display($templet_file=null){
			if(!$templete_file) $templet_file = 'module_templet/' .$this->category_type .'_module.php';
			$pos_name = $this->pos_name;
			$name = $this->name;
			$height = $this->height;
			$width = $this->width;
			$element_height = $this->element_height;
			$elment_width = $this->element_width;
			$record_limit = $this->record_limit;
			$scroll_type = $this->scroll_type;
			$subject_id = $this->subject_id;
			$category_id = $this->category_id;
			$show_pic = $this->show_pic;
			$show_title = $this->show_title;
			$title = $this->name;
			$db = get_db();
			switch ($this->category_type) {
				case 'news':					
					$table = new table_class('fb_subject_items');
					$item= $table->find('first',array('conditions' => "subject_id=" .$subject_id ." and category_id=" .$category_id,'order' => 'priority asc, id desc'));
					$items = $db->query('select * from fb_news where id=' .$item->resource_id);
				break;
				case 'newslist':
					$subject_items = $db->query("select t.resource_id from fb_subject_items t where t.category_id = {$category_id} and t.is_adopt =1 and subject_id = $subject_id order by priority asc,id desc limit $record_limit");
					if($subject_items){
						$icount = count($subject_items);
						for($i=0;$i <$icount; $i++){
							$ids[] = $subject_items[$i]->resource_id;
						}
						$ids = implode(',',$ids);
						$items  = $db->query("select b.*, a.priority as apriority from fb_subject_items a left join fb_news b on a.resource_id = b.id where resource_id in ($ids) order by apriority asc, id desc");	
					}					
				break;
				case 'video':					
					$table = new table_class('fb_subject_items');
					$item= $table->find('first',array('conditions' => "subject_id=" .$subject_id ." and category_id=" .$category_id,'order' => 'priority asc, id desc'));
					$items = $db->query('select * from fb_video where id=' .$item->resource_id);
				break;
				case 'videolist':
					$subject_items = $db->query("select t.resource_id from fb_subject_items t where t.category_id = {$category_id} and t.is_adopt =1 and subject_id = $subject_id order by priority asc,id desc limit $record_limit");
					if($subject_items){
						$icount = count($subject_items);
						for($i=0;$i <$icount; $i++){
							$ids[] = $subject_items[$i]->resource_id;
						}
						$ids = implode(',',$ids);
						$items  = $db->query("select b.*, a.priority as apriority from fb_subject_items a left join fb_video b on a.resource_id = b.id where resource_id in ($ids) order by apriority asc, id desc");	
					}					
				break;
				case 'photo':					
					$table = new table_class('fb_subject_items');
					$item= $table->find('first',array('conditions' => "subject_id=" .$subject_id ." and category_id=" .$category_id,'order' => 'priority asc, id desc'));
					$items = $db->query('select * from fb_images where id=' .$item->resource_id);
				break;
				case 'photolist':
					$subject_items = $db->query("select t.resource_id from fb_subject_items t where t.category_id = {$category_id} and t.is_adopt =1 and subject_id = $subject_id order by priority asc,id desc limit $record_limit");
					if($subject_items){
						$icount = count($subject_items);
						for($i=0;$i <$icount; $i++){
							$ids[] = $subject_items[$i]->resource_id;
						}
						$ids = implode(',',$ids);
						$items  = $db->query("select b.*, a.priority as apriority from fb_subject_items a left join fb_images b on a.resource_id = b.id where resource_id in ($ids) order by apriority asc, id desc");	
					}					
				break;
				case 'commet':
					$subject_items = $db->query("select t.resource_id from fb_subject_items t where t.category_type ='commet' and subject_id = $subject_id order by priority asc,id desc limit $record_limit");
					if($subject_items){
						$icount = count($subject_items);
						for($i=0;$i <$icount; $i++){
							$ids[] = $subject_items[$i]->resource_id;
						}
						$ids = implode(',',$ids);
						$items  = $db->query("select b.*, a.priority as apriority from fb_subject_items a left join fb_comment b on a.resource_id = b.id where a.resource_id in ($ids) order by apriority asc, id desc");	
					}					
				break;
				default:
					;
				break;
			}
			include($templet_file);
		}
	}
?>