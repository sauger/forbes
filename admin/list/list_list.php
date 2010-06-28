<?php
	session_start();
	include_once('../../frame.php');
	judge_role()
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
		js_include_tag('admin_pub','admin/list/list');
	?>
</head>

<body>
	<?php
		function list_type($type){
			$type = intval($type);
			switch ($type) {
				case 1:
					return "自定义榜单";
				break;
				case 2:
					return "年度富豪榜";
				break;
				case 3:
					return "年度名人榜";
				break;				
				default:
					;
				break;
			}
		}
		function list_position($pos){
			$pos = intval($pos);
			switch ($pos) {
				case 1:
					return "富豪";
				break;
				case 2:
					return "投资";
				break;
				case 3:
					return "公司";
				break;	
				case 4:
					return "城市";
				break;
				case 5:
					return "人物";
				break;
				case 6:
					return "体育";
				break;	
				case 7:
					return "生活";
				break;	
				case 8:
					return "教育";
				break;				
				default:
					;
				break;
			}
		}
		$list= new table_class('fb_custom_list_type');
		$conditions = array('list_type != 4 and list_type !=5');
		if($_REQUEST['s_text']){
			$conditions[] = "name like '%{$_REQUEST['s_text']}%'";
		} 
		if($_REQUEST['s_list_type']){
			$conditions[]= "list_type={$_REQUEST['s_list_type']}";			
		}
		if($_REQUEST['s_list_position']){
			$conditions[]= "position={$_REQUEST['s_list_position']}"	;		
		}
		if($conditions){
			$conditions = array('conditions' => implode(' and ', $conditions));
		}
		$order = ' priority asc, created_at desc';
		$conditions['order'] = $order;
		$record = $list->paginate("all",$conditions,'30');
		$count = count($record);
	?>

<div id=icaption>
    <div id=title>常规榜单</div>
	  <a href="custom_list_edit.php" id=btn_add></a>
</div>	
<div id=isearch>
 		<input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
		<select id="s_list_type">
				 	<option value="-1">榜单类型</option>
				 	<option value="1">自定义类型</option>
				 	<option value="2">年度富豪榜</option>
				 	<option value="3">年度名人榜</option>
		</select><?php if($_REQUEST['s_list_type'])?>
		<script type="text/javascript">$('#s_list_type').val('<?php echo $_REQUEST['s_list_type'];?>');</script><?php ?>
		<select id="s_list_position">
				 	<option value="-1">发布位置</option>
				 	<option value="1">富豪</option>
					<option value="2">投资</option>
					<option value="3">公司</option>
					<option value="4">城市</option>
					<option value="5">人物</option>
					<option value="6">体育</option>
					<option value="7">生活</option>
					<option value="8">教育</option>
		</select>
		<?php if($_REQUEST['s_list_position'])?>
		<script type="text/javascript">$('#s_list_position').val('<?php echo $_REQUEST['s_list_position'];?>');</script>
		 <?php ?>
		 <input type="button" value="搜索" id="search_button">
		 <input type="hidden" id="file" value="list_list">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="50%">榜单名称</td><td width="10%">榜单类型</td><td width="10%">发布位置</td><td width="8%">推荐优先级</td><td width="22%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="/list/show_list.php?id=<?php echo $record[$i]->id;?>" target="_blank"> <?php echo $record[$i]->name;?></a></td>
					<td>
						<?php echo list_type($record[$i]->list_type);?>
					</td>
					<td>
						<?php echo list_position($record[$i]->position);?>
					</td>
					<td>
						<?php echo $record[$i]->recommend_priority;?>
					</td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?>
							<span class="revocation" name="<?php echo $record[$i]->id;?>" title="撤消"><img src="/images/admin/btn_apply.png" border=0></span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
							<span class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border=0></span>
						<?php }?>
						<a href="relation_list.php?id=<?php echo $record[$i]->id;?>" title="关联"><img border=0 src="/images/admin/btn_relation.png"></a>
						<a href="custom_list_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img border=0 src="/images/admin/btn_edit.png"></a>
						<a href="data_upload.php?id=<?php echo $record[$i]->id;?>" title="数据导入"><img src="/images/admin/btn_import.png" border=0></a>
						<?php if($record[$i]->list_type == 1){?>
						<a href="custom_list_item_list.php?id=<?php echo $record[$i]->id;?>" class="edit" title="榜单项管理"><img border=0 src="/images/admin/btn_item.png"></a>
						<?php }elseif($record[$i]->list_type == 2){?>
						<a href="rich_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" title="榜单项管理"><img border=0 src="/images/admin/btn_item.png"></a>
						<?php }elseif($record[$i]->list_type == 3){?>
						<a href="famous_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" title="榜单项管理"><img border=0 src="/images/admin/btn_item.png"></a>
						<?php }?>
						<a title="静态页面" href="<?php echo $static_site ."/list/{$record[$i]->id}";?>" target="_blank"><img src="/images/admin/btn_static.png" border="0"></a>
						<span class="del1" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png"></span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="btools">
				<td colspan=10><input type="hidden" id="db_table" value="fb_custom_list_type"><input type="hidden" id="relation" value="list"><?php paginate();?></td>
			</tr>
			<tr class="btools">
				<td colspan=10><button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
			</tr>
		</table>	
</div>
</body>
</html>