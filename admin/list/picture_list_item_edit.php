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
	<title>榜单编辑</title>
	<?php 
		$db = get_db();
		$id = intval($_REQUEST['id']);
		$list_id = intval($_REQUEST['list_id']);
		if(!$list_id){
			alert('invalid request!');
			redirect('index.php');
			die();
		}
		css_include_tag('admin');
		use_jquery();
		validate_form("fbd_edit");
		js_include_tag('admin/rich/edit','autocomplete.jquery','../ckeditor/ckeditor.js');
		$list = new table_class('fb_custom_list_type');
		$list->find($list_id);
		$item = new table_class('fb_picture_list_items');
		if($id){
			$item->find($id);
		}		
	?>
</head>
<body>
<div id=icaption>
   <div id=title><?php if($id){echo "编辑图片榜单";}else{echo "添加图片榜单";}?></div>
	 <a href="javascript:history.go(-1)" id=btn_back></a>
</div>
<div id=itable>
	<form id="fbd_edit" enctype="multipart/form-data" action="picture_list_item.post.php" method="post"> 
	<table cellspacing=1 border="0">
		<tr class=tr4>
			<td width="15%" class=td1>标题</td>
			<td width="85%">
				<input type="text" name="item[name]" value="<?php echo $item->name;?>" class="required"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td>
				<input type="text" name="item[priority]" value="<?php if($item->priority != 100) echo $item->priority;?>" class="number">
			</td>
		</tr>
		<tr class=tr4>
			<td  class=td1>图片</td>
			<td>
				<input type="file" name="item[image]" <?php if(!$item->image){?> class="required" <?php }?>>（请上传小于2M的照片）<?php if($item->image){?><a target="_blank" href="<?php echo $item->image?>">点击查看照片</a><?php }?>
			</td>
		</tr>
		<tr class="tr4">
			<td class=td1>图片说明</td>
			<td>
				<?php show_fckeditor('item[comment]','Admin',false,"100",$item->comment);?>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10">
				<input id="finish" type="submit" value="保存">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="list_id" value="<?php echo $list_id;?>"></input>
			</td>
		</tr>	
	</table>

	</form>
</div>	
</body>
</html>