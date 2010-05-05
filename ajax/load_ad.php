<?php
include_once "../frame.php";
$channel = $_GET['channel'];
$banner = $_GET['banner'];
if(!is_ajax()) die();
$banners = array('top_banner','index_middle_banner','right_banner','rich_banner2','rich_banner1','news_banner','list_banner','magazine_banner1','magazine_banner2','login_banner','club_banner');
$channels = array('billionaires','business','city','club','column','entrepreneur','index','investment','investor','life','list','magazine','news','search','survey','tech');
if(!in_array($_GET['channel'],$channels) || !in_array($_GET['banner'],$banners)){
	die();
}
$db = get_db();
$db->query("select id from forbes_ad.fb_channel where parttern='$channel'");
if($db->record_count <= 0) die();
$db->move_first();
$channel_id = $db->field_by_name('id');
$db->query("select id from forbes_ad.fb_banner where code='$banner'");
if($db->record_count <= 0) die();
$db->move_first();
$channel_id = $db->field_by_name('id');
$ads = $db->query("select * from forbes_ad.fb_ad where channel_id={$channel_id} and banner_id={$banner_id}");
if ($db->record_count <= 0) die();

?>
