<?php
	session_start();
	require_once('../../frame.php');
	$key = $_REQUEST['key'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
	<div id=title>专题管理</div>
	<a href="subject_add.php" id=btn_add></a>
</div>
<div id=isearch>
	<input id="search" type="text" value="<?php echo $search;?>">
	<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="40%">专题名称</td><td width="35%">发布时间</td><td width="25%">操作</td>
		</tr>
		<?php
			$db = get_db();
			$sql = "select * from fb_subject order by id desc";
			$record = $db->paginate($sql);
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td>
						<a href="subject_edit.php?id=<?php echo $record[$i]->id;?>">编辑</a>
						<a href="subject_category.php?id=<?php echo $record[$i]->id;?>">分类管理</a>
						<a href="subject_content.php?subject_id=<?php echo $record[$i]->id;?>">内容管理</a>
						<a class="del" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
	<tr class="btools">
		<td colspan=10>
			<?php paginate("",null,"page",true);?>
			<input type="hidden" id="db_table" value="fb_subject">
		</td>
	</tr>
	</table>
	</div>
</body>
</html>
