<?php
update_pos("创业",4,'index_bus',true,true);
update_pos("商业",5,"index_business",true,true);
update_pos("科技",5,"index_tech",true,true);
update_pos("投资",6,"index_invest",true,true);
update_click(6,'index_pop');
#update_column('column_editor',8,'index_jour');
#update_column2('column_editor',8,'index_author',4,'_r');
update_pos("财经词典",1,'dictionary_r_content1',true,true);

$db = get_db();
$sql = "select t1.* from fb_user t1 join (select * from fb_news where is_adopt=1 order by created_at desc) t2 on t1.id=t2.publisher where t1.role_name='column_writer' and t1.image_src is not null group by t1.id order by t2.created_at desc limit 9";
$column = $db->query($sql);
$count = $db->record_count;
for($i=0;$i<$count;$i++){
	$pos_name = 'index_author'.$i;
	$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
	if($db->record_count==1){
		$pos = new table_class('fb_page_pos');
		$pos->find($record[0]->id);
		$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
		$pos->end_time = $end_time;
		$pos->display = $column[$i]->nick_name;
		$pos->title = $column[$i]->nick_name;
		$pos->image1 = $column[$i]->image_src;
		$pos->href = "/column/{$column[$i]->name}";
		$pos->static_href = "/column/{$column[$i]->name}";
		$pos->alias = $column[$i]->name;
		$pos->save();
	}else{
		$pos = new table_class('fb_page_pos');
		$pos->name = $pos_name;
		$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
		$pos->end_time = $end_time;
		$pos->display = $column[$i]->nick_name;
		$pos->title = $column[$i]->nick_name;
		$pos->image1 = $column[$i]->image_src;
		$pos->href = "/column/{$column[$i]->name}";
		$pos->static_href = "/column/{$column[$i]->name}";
		$pos->alias = $column[$i]->name;
		$pos->save();
	}
}
update_column2('column_writer',9,'index_author',4,'_r');
?>
