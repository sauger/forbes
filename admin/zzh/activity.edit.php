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
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery_ui();
		validate_form("industry");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('zzh_activity');
	if ($id != '')
	{
		$record->find($id);
	}
?>

<body>
	<div id=icaption>
    <div id=title><?php if($id!='')echo "编辑活动";else echo "添加活动";?></div>
	  <a href="activity.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="industry" enctype="multipart/form-data" action="activity.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width=15%>活动名称</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[name]" value="<?php echo $record->name;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动日期</td>
			<td width="85%" align="left"><input type="text" class="date_jquery required" readonly=readonly name="post[time]" value="<?php echo substr($record->time,0,10);?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动地点</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[place]" value="<?php echo $record->place;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>参会资格</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[status]" value="<?php echo $record->status;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>参会费用</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[fee]" value="<?php echo $record->fee;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动规模</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[extent]" value="<?php echo $record->extent;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>链接</td>
			<td width="85%" align="left"><input type="text" class="required" name="post[link]" value="<?php echo $record->link;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>显示优先级</td>
			<td width="85%" align="left"><input type="text" class="number" name="post[priority]" value="<?php if($record->priority!=100)echo $record->priority;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>图片</td>
			<td width="85%" align="left"><input type="file" name="post[image]"><?php if($record->image!=''){?><a target="_blank" href="<?php echo $record->image;?>">点击查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动简介</td>
			<td width="85%" align="left"><textarea class="required" name="post[description]"><?php echo $record->extent;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>是否为往届</td>
			<td width="85%" align="left"><input name="is_old" type="checkbox" <?php if($record->is_old==1)echo "checked='checked'";?>></td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</div>
</body>
</html>
<script>
$(".date_jquery").datepicker(
	{
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	}
);
</script>