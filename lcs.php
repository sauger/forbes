<?php
include "frame.php";
$db = get_db();
$record = $db->query("select * from fb_lcs");
$count  = $db->record_count;
$str2 = "姓名,性别,年龄,电子邮箱,手机,工作地点,所在单位,理财工作中担任角色,参与理财工作年限,已获得最高学历,毕业院校,获得的资格认证,客户数08,客户数09,客户数10,产总量08,产总量09,产总量10,产品销售08,产品销售09,产品销售10,资产规模08,资产规模09,资产规模10,平均资产规模08,平均资产规模09,平均资产规模10,客户关系管理,专业理财服务,列举实际工作中常用的开发和维护客户关系方式,理财工作心得,何时何地受过何等奖励,是否受到过处罚,信息证明人姓名,信息证明人单位,信息证明人电话\n";

for($i=0;$i<$count;$i++){
	$info = $db->query("select * from fb_lcs_data where lcs_id={$record[$i]->id} order by year");
	$str = $record[$i]->name.",".$record[$i]->sex.",";
	$str .= $record[$i]->age.",".$record[$i]->email.",".$record[$i]->phone.",".$record[$i]->ccq.",";
	$wp = explode('&&',$record[$i]->work_space);
	$str .= $wp[0].",".$record[$i]->role.",".$record[$i]->money_year.",";
	$str .= $record[$i]->education.",".$record[$i]->school.",".$record[$i]->certificate.",";
	$str .= $info[0]->nmzj.",".$info[1]->nmzj.",".$info[2]->nmzj.",";
	$str .= $info[0]->npjzc.",".$info[1]->npjzc.",".$info[2]->npjzc.",";
	$str .= $info[0]->nxc.",".$info[1]->nxc.",".$info[2]->nxc.",";
	$str .= $info[0]->dggm.",".$info[1]->dggm.",".$info[2]->dggm.",";
	$str .= $info[0]->pjgm.",".$info[1]->pjgm.",".$info[2]->pjgm.",";
	$time = explode('&&',$record[$i]->time_dealing);
	$str .= $time[0].",";
	$str .= $time[1].",";
	$work_mode = $record[$i]->work_mode;
	$work_mode = str_replace(",",'，',$work_mode);
	$str .= $work_mode.",";
	$experience = $record[$i]->experience;
	$experience = str_replace(",",'，',$experience);
	$str .= $experience.",";
	$award = $record[$i]->award;
	$award = str_replace(",",'，',$award);
	$str .= $award.",";
	$punish = $record[$i]->punish;
	$punish = str_replace(",",'，',$punish);
	$str .= $punish.",";
	$refer = $record[$i]->information_references;
	$refer = explode('&&',$refer);
	$str .= $refer[0].",";
	$str .= $refer[1].",";
	$str .= $refer[2].",";
	
	$str = str_replace("\r",'',$str);
	$str = str_replace("\n",'',$str);
	$str = str_replace("\t",'',$str);
	$str2 .= $str."\n";
}


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str2)); 

Header("Content-Disposition: attachment; filename=lcs_".date('Ymd').".csv"); 
echo $str2;
