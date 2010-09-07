<?php

include_once( dirname(__FILE__) .'/frame.php');
$db = get_db();

$channel = $db->query("select * from forbes_ad.fb_channel where id!=3");

foreach($channel as $v){
	$db->execute("insert into forbes_ad.fb_channel_banner (channer_id, banner_id) values ({$v->id},20)");
	$db->execute("insert into forbes_ad.fb_channel_banner (channer_id, banner_id) values ({$v->id},21)");
}