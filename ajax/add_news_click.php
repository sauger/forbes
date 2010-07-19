<?php
include_once "../frame.php";
if(!is_ajax()) die();
$id = $_GET['id'];
if(!is_numeric($id)) die();
$db = get_db();
$db->execute("update fb_news set click_count=click_count + 1 where id=$id");