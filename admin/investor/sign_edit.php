<?php
	session_start();
  	include_once('../../frame.php');
	judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		css_include_tag('admin');
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_investor_sign');

	

	if(isset($_REQUEST['id']))
	{
		$record->find($id);

		$recvalue=$db->query("select * from fb_investor_sign_income where sign_id=".$id);
		$record_count = $db->record_count;
	}
?>
<body>
	<div id=icaption>
    <div id=title>投资人报名详细信息</div>
	<a href="sign_list.php" id=btn_back></a>
	</div>
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4>	
			<td class=td1 width=15%>姓名</td>
			<td width=85%>
				<?php echo $record->name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>公司名称</td>
			<td>
				<?php echo $record->company_name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>电话</td>
			<td>
				<?php echo $record->phone;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>项目名称</td>
			<td>
				<?php echo $record->item_name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>项目金额</td>
			<td>
				<?php echo $record->item_money;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>项目类型</td>
			<td>
				<?php if($record->item_type==1) echo '风险投资'; else if($record->item_type==2) echo '出售企业'; else if($record->item_type) echo '天使投资';?>
			</td>
		</tr>
	
		<tr class=tr4>
			<td  class=td1>邮箱</td>
			<td>
				<?php echo $record->email;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>手机</td>
			<td>
				<?php echo $record->moblie;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>邮编</td>
			<td>
				<?php echo $record->post;?>
			</td>
		</tr>	<tr class=tr4>
			<td  class=td1>qq</td>
			<td>
				<?php echo $record->qq;?>
			</td>
		</tr>	<tr class=tr4>
			<td  class=td1>msn</td>
			<td>
				<?php echo $record->msn;?>
			</td>
		</tr>	<tr class=tr4>
			<td  class=td1>行业</td>
			<td>
				<?php echo $record->industry;?>
			</td>
		</tr>	<tr class=tr4>
			<td  class=td1>项目简介</td>
			<td>
				<?php echo $record->item_description;?>
			</td>
		</tr>	<tr class=tr4>
			<td  class=td1>项目网址</td>
			<td>
				<?php echo $record->item_url;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>项目计划</td>
			<td>
				<?php echo $record->item_doc;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>公司规模</td>
			<td>
				<?php echo $record->company_size;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>公司成立时间</td>
			<td>
				<?php echo $record->company_created;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>公司总部所在地</td>
			<td>
				<?php echo $record->company_location;?>
			</td>
		</tr>
			<tr class=tr4>
			<td  class=td1>邮编地址</td>
			<td>
				<?php echo $record->zip;?>
			</td>
		</tr>
		</tr>
			<tr class=tr4>
			<td  class=td1>公司历史收入</td>
			<td>
				<select multiple="multiple" id="sel_keywords">
				<?php for($i=0;$i<$record_count;$i++){?>
				<option value="<?php echo $recvalue[$i]->year;?>">
				<?php echo $recvalue[$i]->year;?>年<?php echo $recvalue[$i]->income;?>万人民币
				</option>
				<?php }?> 	
				</select>
					
				<?php echo $rec;?>
			</td>
		</tr>
	</table>
</body>
</html>