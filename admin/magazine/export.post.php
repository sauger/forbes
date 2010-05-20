<?php
include_once '../../frame.php';
$start = $_POST['start_time'];
$end = $_POST['end_time'];
$start = strtotime($start) === false ? null : $start;
$end = strtotime($end) === false ? null : $end;
if($start){
	$c[] = "stime >= '$start'";
}
if($end){
	$c[] = "stime >= '$end'";
}
$sql = "select * from fb_subscription";
if($c){
	$sql .= " where " .implode(' and ',$c);
}
$db = get_db();
$record = $db->query($sql);

$out_str = "读者编号,email|fh|cy|sy|kj|tz|sy\n";

for($i=0;$i<$count;$i++){
	$str = $recrod[$i]->name."|".$recrod[$i]->email."|";
	$flag = false;
	if($recrod[$i]->fh){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	if($recrod[$i]->cy){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	if($recrod[$i]->sy){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	if($recrod[$i]->kj){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	if($recrod[$i]->tz){
		$str .= "1|";
		$flag = true;
	}else{
		$str .= "0|";
	}
	if($recrod[$i]->sy){
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

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str2)); 

Header("Content-Disposition: attachment; filename=order1_".date('Ymd').".csv"); 
echo $str2;