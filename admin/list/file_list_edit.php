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
	<title>图片榜单编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/list/edit');
		validate_form("list_edit");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_custom_list_type');
	if ($id)
	{
		$record->find($id);
	}
?>

<body>
	<div id=icaption>
    <div id=title><?php if($id){echo '编辑榜单';}else{echo '添加榜单';}?></div>
	  <a href="file_list_list.php" id=btn_back></a>
	</div>
	<form id="list_edit" action="file_list_edit.post.php" enctype="multipart/form-data"  method="post"> 
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4 id="list_name">
			<td class=td1 width="15%">榜单名称</td>
			<td width="85%" align="left">
				<input type="text" name="mlist[name]" value="<?php echo $record->name;?>" class="required">
			</td>
		</tr>
		<!--
		<tr class=tr4>
			<td class=td1>优先级</td><td align="left"><input type="text" name="mlist[priority]"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>推荐优先级</td><td  align="left"><input type="text" name="mlist[recommend_priority]"></input></td>
		</tr>
		-->
		<tr class=tr4>
			<td class=td1>是否使用位置发布</td><td align="left"><input id="use_pos" type="checkbox" <?php if($record->use_pos)echo 'checked="checked"'?> name="use_pos"><label for="use_pos">开启</label></td>
		</tr>
		<tr class=tr4 id="position" <?php if(!$record->use_pos){?>style="display:none;"<?php }?>>
			<td class=td1>榜单位置</td>
			<td>
				<select name="mlist[position]" id="list_position" value="<?php echo $record->position;?>" style="width:155px;">
					<option value="1">富豪</option>
					<option value="2">投资</option>
					<option value="3">公司</option>
					<option value="4">城市</option>
					<option value="5">人物</option>
					<option value="6">体育</option>
					<option value="7">生活</option>
					<option value="8">教育</option>
				</select>
				<script type="text/javascript">$('#list_position').val('<?php echo $record->position;?>');</script>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>榜单图片</td>
			<td  align="left"><input type="file" name="image_src"></input><?php if($record->image_src){?> <a href="<?php echo $record->image_src;?>" target="_blank" style="color:blue;">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>说明</td><td align="left"><textarea rows="10" cols="60" name="mlist[comment]"><?php echo $record->comment;?></textarea> </td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center"><input id="submit" type="submit" value="保　　　存"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
		<input type="hidden" name="mlist[list_type]" value="5"></input>
	</div>
	</form>
</body>
</html>