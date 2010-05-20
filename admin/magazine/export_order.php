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
		css_include_tag('jquery_ui','colorbox','admin');
		use_jquery_ui();
		js_include_tag('admin/magazine/export');
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_magazine');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
	<div id=icaption>
    <div id=title>导出订阅列表</div>
	  <a href="magazine_order_index.php" id=btn_back></a>
	</div>
	<form action="export.post.php" method="post"> 
	<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>起始时间</td>
			<td width=85%>
				<input type="text" name="start_time" class="datepicker">
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>截止时间</td>
			<td>
				<input type="text" name="end_time" class="datepicker">
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center">
				<input id="submit" type="submit" value="完成">	
			</td>
		</tr>	
	</table>
	</div>
	</form>
</body>
</html>