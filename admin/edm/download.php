<?php
include "../../frame.php";
$db = get_db();
$recrod = $db->query("select t1.name,t1.email,t2.* from fb_yh t1 join fb_yh_dy t2 on t1.id=t2.yh_id where t2.fh is not null or t2.cy is not null or t2.sy is not null or t2.kj is not null or t2.tz is not null or t2.sh is not null");
$count  = $db->record_count;
$str2 = "name|email|fh|cy|sy|kj|tz|sy\n";
$doman = "http://www.forbeschina.com";
#$doman = "http://localhost:8081";

for($i=0;$i<$count;$i++){
	$str = $recrod[$i]->name."|".$recrod[$i]->email."|";
	if($recrod[$i]->fh){
		$str .= file_get_contents("/admin/edm/fh.php")."|";
	}else{
		$str .= "|";
	}
	if($recrod[$i]->cy){
		$str .= file_get_contents("$doman/admin/edm/cy.php")."|";
	}else{
		$str .= "|";
	}
	if($recrod[$i]->sy){
		$str .= file_get_contents("$doman/admin/edm/sy.php")."|";
	}else{
		$str .= "|";
	}
	if($recrod[$i]->kj){
		$str .= file_get_contents("$doman/admin/edm/kj.php")."|";
	}else{
		$str .= "|";
	}
	if($recrod[$i]->tz){
		$str .= file_get_contents("$doman/admin/edm/tz.php")."|";
	}else{
		$str .= "|";
	}
	if($recrod[$i]->sy){
		$str .= file_get_contents("$doman/admin/edm/sy.php")."|";
	}else{
		$str .= "|";
	}
	$str = str_replace("\n",'',$str);
	$str = str_replace("\t",'',$str);
	$str2 .= $str."\n";
}

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str2)); 

Header("Content-Disposition: attachment; filename=email.csv"); 
echo $str2;
