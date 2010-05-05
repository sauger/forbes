<?php
    $db = get_db();
	
	$name = $db->query("select alias from fb_page_pos where name='magazine_index'");
	$name = $name[0]->alias;
	$magazine = $db->query("select * from fb_magazine where name<>'{$name}' order by publish_data desc");
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
					$news = $db->query("select t2.title,t2.id,t2.created_at from fb_magazine_relation t1 join fb_news t2 on t1.resource_id=t2.id where t1.magazine_id=".$magazine[$i]->id);
					$news_count = $db->record_count;
					for($m=0;$m<$news_count;$m++){
						for($k=0;$k<3;$k++){
							$pos_name = 'magazine_list'.$j.'_r'.$k;
							$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
							if($db->record_count==1){
								if($record[0]->end_time>now()){
								}else{
									$pos = new table_class('fb_page_pos');
									$pos->find($record[0]->id);
									$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
									$pos->end_time = $end_time;
									$pos->display = $news[$m]->title;
									$pos->title = $news[$m]->title;
									$pos->href = static_news_url($news[$m]);
									$pos->save();
									break;
								}
							}else{
								$pos = new table_class('fb_page_pos');
								$pos->name = $pos_name;
								$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
								$pos->end_time = $end_time;
								$pos->display = $news[$m]->title;
								$pos->title = $news[$m]->title;
								$pos->href = static_news_url($news[$m]);
								$pos->save();
								break;
							}
						}
						break;	
					}
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
				$news = $db->query("select t2.title,t2.id,t2.created_at from fb_magazine_relation t1 join fb_news t2 on t1.resource_id=t2.id where t1.magazine_id=".$magazine[$i]->id);
				$news_count = $db->record_count;
					for($m=0;$m<$news_count;$m++){
						for($k=0;$k<3;$k++){
							$pos_name = 'magazine_list'.$j.'_r'.$k;
							$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
							if($db->record_count==1){
								if($record[0]->end_time>now()){
								}else{
									$pos = new table_class('fb_page_pos');
									$pos->find($record[0]->id);
									$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
									$pos->end_time = $end_time;
									$pos->display = $news[$m]->title;
									$pos->title = $news[$m]->title;
									$pos->href = static_news_url($news[$m]);
									$pos->save();
									break;
								}
							}else{
								$pos = new table_class('fb_page_pos');
								$pos->name = $pos_name;
								$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
								$pos->end_time = $end_time;
								$pos->display = $news[$m]->title;
								$pos->title = $news[$m]->title;
								$pos->href = static_news_url($news[$m]);
								$pos->save();
								echo $m;
								break;
							}
						}
					}
				break;
			}
		}
	}
?>