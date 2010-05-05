<?php
    include_once('../../frame.php');
	
	$db = get_db();
	$date = date("Y-m-d");
	
	$record = $db->query("select count(id) from forbes_ad.fb_ad_show_list where substring(created_at,1,10)='$date' group by ad_id");
	$count = $db->record_count;
	for($i=0;$i<$ount;$i++){
		
	}
?>