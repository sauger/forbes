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
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/list/list');
	?>
</head>

<body>
	<?php
		$list= new table_class('fb_custom_list_type');
		if($_REQUEST['s_text']){
			$conditions[] = "name like '%{$_REQUEST['s_text']}%'";
		} 
		$conditions[]= "list_type=5";			
		if($conditions){
			$conditions = array('conditions' => implode(' and ', $conditions));
		}
		$order = ' priority asc, created_at desc';
		$conditions['order'] = $order;
		$record = $list->paginate("all",$conditions);
		$count = count($record);
	?>
<div id=icaption>
    <div id=title>文章榜单</div>
	  <a href="file_list_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
		<input type="button" value="搜索" id="search_button">
		<input type="hidden" id="file" value="file_list_list">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="60%">榜单名称</td><td width="40%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="/list/show_list.php?id=<?php echo $record[$i]->id;?>" target="_blank"><?php echo $record[$i]->name;?></a></td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?>
							<span class="revocation" name="<?php echo $record[$i]->id;?>" title="撤消"><img src="/images/admin/btn_apply.png" border=0></span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
							<span class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border=0></span>
						<?php }?>
						<a href="relation_list.php?id=<?php echo $record[$i]->id;?>" title="关联"><img border=0 src="/images/admin/btn_relation.png"></a>
						<a href="file_list_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img border=0 src="/images/admin/btn_edit.png"></a>
						<a href="file_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" title="榜单项管理"><img border=0 src="/images/admin/btn_item.png"></a>
						<a title="静态页面" href="<?php echo $static_site ."/list/{$record[$i]->id}";?>" target="_blank"><img src="/images/admin/btn_static.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del1" name="<?php echo $record[$i]->id;?>"><img border=0 src="/images/admin/btn_delete.png"></span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="btools">
				<td colspan=10><input type="hidden" id="db_table" value="fb_custom_list_type"><button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button><?php paginate();?></td>
			</tr>
		</table>	

	</body>
</html>