<?php
include_once "../frame.php";
$ref = $_SERVER['HTTP_REFERER']; 
if(strpos($ref,$site_domain) !== 0){
	//die(1);
	//die_error();
}
$target_url = $_GET['target_url'];
$code = $_GET['code'];
$db= get_db();
$ad = $db->query("select * from forbes_ad.fb_ad where id = '{$_GET['code']}'");
if(empty($ad)) die(2);
insert_ad_record($ad[0],'click');
redirect($ad[0]->target_url ? $ad[0]->target_url : $site_domain,'header');
