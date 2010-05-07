<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_event";
	if($search!=''){
		$sql .= " where title like '%".$search."%' ";
	}
	$sql .=" order by priority asc, id desc";
	$record = $db->paginate($sql,30);
	$count = count($record);
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
    <div id=title>活动管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>	
<div id=isearch>
	<input id="search" type="text" value="<?php echo $search;?>">
	<input type="button" value="搜索" id="search_button">
</div>	

<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="20%">活动名称</td><td width="15%">举办地</td><td width="15%">举办时间</td><td width="35%">详细页面</td><td width="15%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->title;?></td>
					<td><?php echo $record[$i]->place;?></td>
					<td><?php echo $record[$i]->time;?></td>
					<td><?php echo $record[$i]->url;?></td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border=0></a>
						<span class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border=0></span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="btools">
				<td colspan=10>
					<?php paginate("",null,"page",true);?>
					<input type="hidden" id="db_table" value="fb_event">
				</td>
			</tr>
			<tr class="btools">
				<td colspan=10>
					<button id=clear_priority>清空优先级</button>
					<button id=edit_priority>编辑优先级</button>
				</td>
			</tr>
		</table>	
</div>
</body>
</html>
<script>
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($("#search").attr('value'));
}
</script>