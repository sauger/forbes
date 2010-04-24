<?php
	session_start();
  require_once('../../frame.php');
	judge_role();
	$id = intval($_REQUEST['id']);
	if($id <= 0){
		alert('invalid request!');
		redirect('index.php');
		exit;
	}
	$search = $_REQUEST['search'];
	$list = new table_class('fb_custom_list_type');
	if($list->find($id)===false){
		alert('invalid request!');
		redirect('index.php');
		exit;
	};
	$db = get_db();
	$sql = "select * from fb_file_list_items where list_id={$id}" ;
	if($search){
		$sql .= " and title like '%{$search}%'";
	}
	$sql .= " order by priority asc";
	$record = $db->paginate($sql,30);
	$count = $db->record_count;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/list/famous_item_list');
	?>
</head>

<body>
<div id=icaption>
    <div id=title>榜单项管理</div>
	<a href="file_list_item_edit.php?list_id=<?php echo $id;?>" id=btn_add></a>
	<a href="file_list_list.php" id=btn_back></a>
</div>	
	
<div id=isearch>
		<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
  	<input type="button" value="搜索" id="search_button">
</div>		
<div id=itable>	
	
	<table cellspacing=1 border="0">

		<tr class="itable_title">
			<td width="50%">标题</td><td width="50%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->title;?></td>
					<td>
						<a href="file_list_item_edit.php?id=<?php echo $record[$i]->id;?>&list_id=<?php echo $id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border=0></a>
						<span class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border=0></span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
				<td colspan=6><input type="hidden" id="db_table" value="fb_file_list_items"><button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button><?php paginate();?></td>
		</tr>
		<input type="hidden" id="list_id" name="id" value="<?php echo $id;?>"> 
	</table>
</div>	
</body>
</html>