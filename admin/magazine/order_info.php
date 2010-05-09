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
	$record = new table_class('fb_subscription');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
	<div id=icaption>
    <div id=title>杂志订阅查看</div>
	<a href="magazine_order_index.php" id=btn_back></a>
	</div>
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>出生地</td>
			<td width=85%>
				<?php echo $record->BirthPlace;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>读者编号</td>
			<td>
				<?php echo $record->ReaderNo;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>姓名</td>
			<td>
				<?php echo $record->RealName;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>性别</td>
			<td>
				<?php echo $record->Sex;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>工作单位</td>
			<td>
				<?php echo $record->Company;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>部门</td>
			<td>
				<?php echo $record->Department;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>职位</td>
			<td>
				<?php echo $record->Position2;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1> 省/直辖市</td>
			<td>
				<?php echo $record->Province;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>邮编</td>
			<td>
				<?php echo $record->zipcode;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>单位地址</td>
			<td>
				<?php echo $record->CompanyAddress;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>电话</td>
			<td>
				<?php echo $record->Tel;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>手机</td>
			<td>
				<?php echo $record->Mobile;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>传真</td>
			<td>
				<?php echo $record->Fax;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>电子邮件</td>
			<td>
				<?php echo $record->Email;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>您的学历是</td>
			<td>
				<?php echo $record->Degree;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>职位</td>
			<td>
				<?php echo $record->Position;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司的行业类型</td>
			<td>
				<?php echo $record->Industry;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司的职工人数是</td>
			<td>
				<?php echo $record->Employeeamount;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司的类型是</td>
			<td>
				<?php echo $record->CompanyType;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司是否是上市公司</td>
			<td>
				<?php if($record->StockCompany==1)echo '是';else echo '否';?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司所制造的产品</td>
			<td>
				<?php echo $record->Product;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>贵公司年营业额</td>
			<td>
				<?php echo $record->turnove;?>
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>您的年收入</td>
			<td>
				<?php echo $record->Earning;?>
			</td>
		</tr>
	</table>
</body>
</html>