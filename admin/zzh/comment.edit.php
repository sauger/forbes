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
		use_jquery();
		validate_form("industry");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('zzh_comment');
	if ($id != '')
	{
		$record->find($id);
	}
?>

<body>
	<div id=icaption>
    <div id=title><?php if($id!='')echo "回复留言";?></div>
	  <a href="comment.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="industry" enctype="multipart/form-data" action="comment.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width=15%>留言内容</td>
			<td width="85%" align="left"><?php echo $record->comment;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>留言人</td>
			<td width="85%" align="left"><?php echo $record->nick_name;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>回复内容</td>
			<td width="85%" align="left"><textarea name="reply"><?php echo $record->reply;?></textarea></td>
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