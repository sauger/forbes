<?php 
include_once( dirname(__FILE__) .'/../../frame.php');

$date = $_GET['date'];
?>
<?php 
	$db = get_db();
	$today = $db->query("select * from zzh_activity where TO_DAYS('$date') = TO_DAYS(time)");
	if(!empty($today)){
?>
<p>活动名称：</p>
<p>　　　<?php echo $today[0]->name;?></p>
<p>活动日期：</p>
<p>　　　<?php echo substr($today[0]->time,0,10);?></p>
<p><a href="<?php echo $today[0]->link;?>">点击了解活动详情</a></p>
<?php
	}
?>