<?php
    include_once('../../frame.php');
	set_time_limit(600);
	$db = get_db();
	$date = date("Y-m-d");
	
	$record = $db->query("select count(id) as num,ad_id,ad_name from forbes_ad.fb_ad_show_list where substring(created_at,1,10)='$date' group by ad_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->ad_id;
		$num = $record[$i]->num;
		$name = $record[$i]->ad_name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'ad','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,channel_id from forbes_ad.fb_ad_show_list where substring(created_at,1,10)='$date' group by channel_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->channel_id;
		$num = $record[$i]->num;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count) values ($id,'channel','$date',$num) ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,banner_id from forbes_ad.fb_ad_show_list where substring(created_at,1,10)='$date' group by banner_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->banner_id;
		$num = $record[$i]->num;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count) values ($id,'banner','$date',$num) ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,ad_id,ad_name from forbes_ad.fb_ad_click_list where substring(created_at,1,10)='$date' group by ad_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->ad_id;
		$num = $record[$i]->num;
		$name = $record[$i]->ad_name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'ad_click','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,channel_id from forbes_ad.fb_ad_click_list where substring(created_at,1,10)='$date' group by channel_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->channel_id;
		$num = $record[$i]->num;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count) values ($id,'channel_click','$date',$num) ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,banner_id from forbes_ad.fb_ad_click_list where substring(created_at,1,10)='$date' group by banner_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->banner_id;
		$num = $record[$i]->num;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count) values ($id,'banner_click','$date',$num) ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
?>