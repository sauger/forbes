<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$subject_id=$_REQUEST['subject_id'];
	$category = new table_class('fb_subject_category');
	if($_REQUEST['id'])	{
		$category->find($_REQUEST['id']);
	}else{
		$category->subject_id = $_REQUEST['subject_id'];
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php
		css_include_tag('admin');
		validate_form("category_form");
	?>
</head>
<body>
<div id=icaption>
    <div id=title>编辑类别</div>
	<a href="subject_category.php?id=<?php echo $category->subject_id;?>" id=btn_back></a>
</div>
<div id=itable>
<form id="category_form" method="post" action="subject_category.post.php">
	<table width="795" border="0" id="list">
		<tr class=tr4>
			<td class=td1 width=15%>类别名称</td>
			<td width=85%>
				<input type="text" name="category[name]" class="required" value="<?php echo $category->name;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>类型</td>
			<td>
				<select name="category[category_type]" class="required">
					<option value="">请选择</option>
					<option value="news" <?php if($category->category_type=='news'){?>selected="selected"<?php }?>>新闻</option>
					<option value="image" <?php if($category->category_type=='image'){?>selected="selected"<?php }?>>图片</option>
				</select>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10">
				<input id="submit" type="submit" value="完成">
				<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
				<input type="hidden" name="category[subject_id]" value="<?php echo $category->subject_id;?>">
			</td>
		</tr>
	</table>
</form>
</div>
</body>
</html>