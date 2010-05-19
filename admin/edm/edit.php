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
		js_include_tag('admin/edm/edit');
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_edm');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo '编辑EDM';}else{echo '添加EDM';}?></div>
	  <a href="index.php" id=btn_back></a>
	</div>
	<form enctype="multipart/form-data" action="edit.post.php" method="post"> 
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>EDM名称</td>
			<td width=85%>
				<input type="text" name="post[name]" value="<?php echo $record->name;?>">
			</td>
		</tr>
		<!--
		<tr class=tr4>
			<td class=td1>首页封面缩略图</td>
			<td><input type="file" name="post[img_src3]"></input><?php if($record->img_src3){?> <a href="<?php echo $record->img_src3;?>" title="首页封面缩略图" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		-->
		<tr class=tr4>
			<td class=td1>EDM类型</td>
			<td>
				<?php 
				$type['marrow'] = '新闻订阅';
				$type['edm'] = '精华导读';
				?>
				<select name="post[edm_type]" id="sel_type">
					<?php foreach ($type as $k => $v) { ?>
					<option value="<?php echo $k?>"><?php echo $v;?></option>
					<?php }?>
				</select>
				<script type="text/javascript">$('#sel_type').val("<?php echo $record->edm_type;?>");</script>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</body>
</html>