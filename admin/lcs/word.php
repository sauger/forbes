<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$content = $_REQUEST['content'];
	$sql = "select * from lcs_word where 1=1";
	$db = get_db();
	$record = $db->paginate($sql,20);
	$count = $db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
  <div id=title>理财师文档下载</div>
	<a href="edit.php" id=btn_add></a>
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td>上传时间</td><td>操作</td>
		</tr>
		<?php
			foreach($record as $lcs){
		?>
				<tr class=tr3 id=<?php echo $lcs->id;?>>
					<td><?php echo substr($lcs->created_at,0,10);?></td>
					<td>
						<a href="<?php echo $lcs->url;?>" target="_blank">点击下载</a>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?><input type="hidden" id="db_table" value="fb_lcs"></td>
		</tr>
	</table>
</body>
</html>