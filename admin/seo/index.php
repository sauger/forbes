<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$news = new table_class('fb_seo');
	$record = $news->paginate('all','',30);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布seo</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');		
	?>
</head>
<body>
<div id=icaption>
    <div id=title>seo管理</div>
	  <a href="seo_edit.php" id=btn_add></a>
</div>

<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width=20%>名称</td>><td width="20%">标题</td><td width="20%">关键词</td><td width="20%">说明</td><td width="20%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td><?php echo strip_tags($record[$i]->name);?></td>
			<td><?php echo strip_tags($record[$i]->title);?></td>
			<td><?php echo $record[$i]->keywords;?></td>
			<td><?php echo $record[$i]->description;?></td>
			<td>
				<a href="seo_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
				<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_seo">
			</td>
		</tr>
  </table>
</div>	
</body>
</html>
