<?php require_once('../../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("data_upload");
	?>
</head>
<?php
	$db = get_db();
	$id = intval($_GET['id']);
	$table = $db->query("select * from fb_custom_list_type where id=$id");
	if($db->record_count==1){
		$table_name = $table[0]->table_name;
	}else{
		alert("error id");
		die();
	}
	
?>
<body>
<div id=icaption>
    <div id=title>榜单：<?php echo $table[0]->name?></div>
	  <a href="list_list.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="data_upload" enctype="multipart/form-data" action="upload.post.php" method="post"> 
	<table cellspacing=1 border="0">

		<tr class="tr4 add">
			<td width="30%" class=td1>上传XLS</td>
			<td width="70">
				<input type="file" name="xls">
			</td>
		</tr>
		<tr class="tr4 add">
			<td colspan="10">　　字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
		</tr>
		<?php
			if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
				$table_fields = $db->query("show full fields FROM ".$table_name." where Comment not like '%id%'");
			}else{
				$table_fields = $db->query("show full fields FROM ".$table_name);
			}
			for($i=1;$i<count($table_fields);$i++){
		?>
		<tr class="tr4 add">
			<td class=td1><?php echo $table_fields[$i]->Comment?></td>
			<td><input type="text"  class="number" name="<?php echo $table_fields[$i]->Field?>"></td>
		</tr>
		<?php
			}
		?>
		<tr class=btools>
			<td colspan="10">
				<input id="submit" type="submit" value="发布">
				<input type="hidden" name="list_id" value="<?php echo $id;?>">
			</td>
		</tr>
	</table>
	</form>
</div>	
</body>
</html>