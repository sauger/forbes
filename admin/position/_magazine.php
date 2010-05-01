<?php
    $db = get_db();
	
	$name = $db->query("select alias from fb_page_pos where name='magazine_index'");
	$name = $name[0]->alias;
	$magazine = $db->query("select * from fb_magazine where name<>'{$name}' order by publish_data desc");
	$news = 
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<8;$j++){
			$pos_name = 'magazine_list'.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $magazine[$i]->name;
					$pos->title = $magazine[$i]->name;
					$pos->image1 = $magazine[$i]->img_src;
					$pos->href = '/magazine/magazine.php?id='.$magazine[$i]->id;
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $magazine[$i]->name;
				$pos->title = $magazine[$i]->name;
				$pos->image1 = $magazine[$i]->img_src;
				$pos->href = '/magazine/magazine.php?id='.$magazine[$i]->id;
				$pos->save();
				break;
			}
		}
	}
?>