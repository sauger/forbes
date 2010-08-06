<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$content = $_REQUEST['content'];
	$sql = "select * from fb_lcs where 1=1";
	if($content!=''){
		$sql .= " and name='$content'";
	}
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
  <div id=title>投资人管理</div>
	<a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="content" type="text" value="<? echo $_REQUEST['content']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="15%">姓名</td><td width="25%">年龄</td><td width="15%">性别</td><td width="30%">所属赛区</td><td width="15%">操作</td>
		</tr>
		<?php
			foreach($record as $lcs){
		?>
				<tr class=tr3 id=<?php echo $lcs->id;?>>
					<td><?php echo $lcs->name;?></td>
					<td>
						<?php echo $lcs->age;?>
					</td>
					<td>
						<?php echo $lcs->sex;?>
					</td>
					<td>
						<?php echo $lcs->ccq;?>
					</td>
					<td>
						<a href="edit.php?id=<?php echo $lcs->id;?>" class="edit" name="<?php echo $lcs->id;?>" title="查看"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer" class="del" name="<?php echo $lcs->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
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