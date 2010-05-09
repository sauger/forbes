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
			<td  class=td1>读者编号</td>
			<td>
				<?php echo $record->ReaderNo;?>
			</td>
		</tr>
	</table>
</body>
</html>