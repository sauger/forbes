<?php
include "frame.php";
$db = get_db();
$recrod = $db->query("select * from fb_lcs");
$count  = $db->record_count;
$str2 = "姓名,性别,年龄,电子邮箱,固定电话,手机,工作地点,最高学历,毕业院校,所学专业,工作单位&&所属分类,工作年限,理财年限,担任角色\n";

for($i=0;$i<$count;$i++){
	$str = $recrod[$i]->name.",".$recrod[$i]->sex.",";
	$str .= $recrod[$i]->age.",".$recrod[$i]->email.",".$recrod[$i]->fix_phone.",".$recrod[$i]->phone.",";
	$str .= $recrod[$i]->ccq.",".$recrod[$i]->education.",".$recrod[$i]->school.",".$recrod[$i]->specialty.",";
	$str .= $recrod[$i]->work_space.",".$recrod[$i]->work_year.",".$recrod[$i]->money_year.",".$recrod[$i]->role;
	$str = str_replace("\n",'',$str);
	$str = str_replace("\t",'',$str);
	$str2 .= $str."\n";
}


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str2)); 

Header("Content-Disposition: attachment; filename=lcs_".date('Ymd').".csv"); 
echo $str2;
