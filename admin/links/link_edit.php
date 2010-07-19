<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		include_once('../../frame.php');
		judge_role();
		css_include_tag('jquery_ui','colorbox','admin');
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min.js');
		validate_form("link");
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_links');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
<div id=icaption>
    <div id=title>发布友情链接</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
	<form enctype="multipart/form-data" action="edit.post.php" method="post" id="link"> 
	<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>名称</td>
			<td width=85%>
				<input type="text" name="post[title]" class="required" value="<?php echo $record->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>链接网址</td>
			<td>
				<input type="text"  name="post[link]" class="required" value="<?php echo $record->link;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td>
				<input type="text"  name="post[priority]" class="number" value="<?php if($record->priority!=100)echo $record->priority;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>链接图片</td>
			<td><input type="file" class="required" name="post[img_url]"></input>（请上传150*70的图片）<?php if($record->img_url){?> <a href="<?php echo $record->img_url;?>" title="链接图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class="btools">
			<td colspan="10">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</div>
</body>
</html>
<script>
	$(function(){
		$(".colorbox").colorbox();
	});
</script>