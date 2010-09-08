<?php 
include_once( dirname(__FILE__) .'/../../frame.php');

$month = $_POST['month'];
$year = $_POST['year'];

$db = get_db();
$activity = $db->query("select day(time) as day from zzh_activity where month(time)=$month and year(time)=$year");
!$activity && $activity=array();

$time = array();
foreach($activity as $v){
	array_push($time,$v->day);
}
echo implode('|',$time);