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
	?>
</head>

<?php
	$db = get_db();
	$text = $db->query("select * from fb_page_pos where name='register'");
	if(!$text){
		$db->execute("insert into fb_page_pos (name) values ('register')");
		$text = $db->query("select * from fb_page_pos where name='register'");
	}
?>

<body>
	<div id=icaption>
    <div id=title>注册成功页内容显示</div>
</div>
<div id=itable>
	<form action="post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width=15%>显示内容</td>
			<td width="85%" align="left"><textarea name="description"><?php echo $text[0]->description;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>