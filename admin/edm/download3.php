<?php
include "../../frame.php";
$db = get_db();
$recrod = $db->query("select t1.name,t1.email,t2.* from fb_yh t1 join fb_yh_dy t2 on t1.id=t2.yh_id");
$count  = $db->record_count;
$str2 = "name|email|order\n";

for($i=0;$i<$count;$i++){
	$str = $recrod[$i]->name."|".$recrod[$i]->email."|";
	$flag = false;
	if($recrod[$i]->jhtj){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	$str = str_replace("\n",'',$str);
	$str = str_replace("\t",'',$str);
	if($flag){
		$str2 .= $str."\n";
	}
}
echo $str2;die();

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str2)); 

Header("Content-Disposition: attachment; filename=order2_".date('Ymd').".csv"); 
echo $str2;
