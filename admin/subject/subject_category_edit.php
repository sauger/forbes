<?php
	require_once('../../frame.php');
	$role = judge_role();
	$subject_id=$_REQUEST['subject_id'];
	$category = new table_class('smg_subject_category');
	if($_REQUEST['id'])	{
		$category->find($_REQUEST['id']);
	}else{
		$category->category_type=$_REQUEST['type'];
		$category->subject_id = $_REQUEST['subject_id'];
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin');
		validate_form("category_form");
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="category_form" method="post" action="subject_category.post.php">
		<tr class=tr1>
			<td colspan="2">　<?php echo $category->category_type;?>类别</td>
		</tr>
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="category[name]"  class="required" value="<?php echo $category->name;?>"></td>
		</tr>
		
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
		<input type="hidden" name="category[category_type]" value="<?php echo $category->category_type;?>">
		<input type="hidden" name="category[subject_id]" value="<?php echo $category->subject_id;?>">
	</form>
	<table>
</body>
</html>