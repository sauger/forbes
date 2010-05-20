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
	$c[] = "stime <= '$end'";
}
$sql = "select * from fb_subscription";
if($c){
	$sql .= " where " .implode(' and ',$c);
}
$db = get_db();
$record = $db->query($sql);
$count = count($record);
$out_str = "读者编号,姓名,出生地,性别,工作单位,部门,职位,省/直辖市,邮编,单位地址,电话,手机,传真,电子邮件,学历,学位,行业类型,职工人数,公司类型,是否上市,产品,年营业额,年收入\n";

for($i=0;$i<$count;$i++){
	$out_str .= '"'. $record[$i]->ReaderNo ."\",";
	$out_str .= '"'.$record[$i]->RealName."\",";
	$out_str .= '"'.$record[$i]->BirthPlace."\",";
	$out_str .= '"'.$record[$i]->Sex."\",";
	$out_str .= '"'.$record[$i]->Company."\",";
	$out_str .= '"'.$record[$i]->Department."\",";
	$out_str .= '"'.$record[$i]->Position2."\",";
	$out_str .= '"'.$record[$i]->Province."\",";
	$out_str .= '"'.$record[$i]->zipcode."\",";
	$out_str .= '"'.$record[$i]->CompanyAddress."\",";
	$out_str .= '"'.$record[$i]->Tel."\",";
	$out_str .= '"'.$record[$i]->Mobile."\",";
	$out_str .= '"'.$record[$i]->Fax."\",";
	$out_str .= '"'.$record[$i]->Email."\",";
	$out_str .= '"'.$record[$i]->Degree."\",";
	$out_str .= '"'.$record[$i]->Position."\",";
	$out_str .= '"'.$record[$i]->Industry."\",";
	$out_str .= '"'.$record[$i]->Employeeamount."\",";
	$out_str .= '"'.$record[$i]->CompanyType."\",";
	$out_str .= ($record[$i]->StockCompany == 1 ? "\"是": "\"否") ."\",";
	$out_str .= '"'.$record[$i]->Product."\",";
	$out_str .= '"'.$record[$i]->turnove."\",";
	$out_str .= '"'.$record[$i]->Earning .'"';
	$out_str .= "\n";
	
}
$out_str = iconv('utf-8','gbk',$out_str);

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($out_str)); 

Header("Content-Disposition: attachment; filename=magazine_order".date('Ymd').".csv"); 
echo $out_str;