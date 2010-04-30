<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯中文网</title>
	<?php
		include_once dirname(__FILE__) ."/../../frame.php";
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min','admin/position/edit');
		css_include_tag('jquery_ui','admin');
		$pos = new table_class('fb_page_pos');
		$pos->find_by_name($_GET['pos_name']);
		$fields['link'] = array("标题","","mouseover","链接","静态链接","","","过期时间","","","说明");
		$fields['link_img'] = array("标题","","mouseover","链接","静态链接","图片","","过期时间","","","说明");
		$fields['base'] = array("标题","描述","mouseover","链接","静态链接","","","过期时间","","","说明");
		$fields['base_img'] = array("标题","描述","mouseover","链接","静态链接","图片","","过期时间","","","说明");
		$fields['index_column'] = array("专栏名","","mouseover","链接","静态链接","图片","","过期时间","用户名","","说明");
		$fields['index_column2'] = array("专栏名","","专栏作者名","链接","静态链接","图片","","过期时间","","","说明");
		$fields['index_event'] = array("标题","","地点","链接","","图片","","过期时间","","举办日期","说明");
		$fields['magazine'] = array("杂志标题","杂志介绍","mouseover","链接","","杂志图片","","过期时间","","","说明");
		$fields['default']=array("标题","描述","mouseover","链接","静态链接","图片一","","过期时间","备用字段","备用字段2","说明");
		$fields['column_full']=array("文章标题","文章描述","mouseover","链接","静态链接","作者照片","","过期时间","专栏作者","专栏链接","说明");
		$fields['column_with_author']=array("文章标题","文章描述","mouseover","链接","静态链接","","","过期时间","专栏作者","专栏链接","说明");
		$fields['column_simple']=array("文章标题","","mouseover","链接","静态链接","","","过期时间","专栏作者","专栏链接","说明");
		$fields['rich']=array("富豪","公司","mouseover","链接","静态链接","富豪照片","","过期时间","财富数（亿）","","说明");
		$fields['survey']=array("调查标题","描述","mouseover","链接","静态链接","","","","","","说明");
		$names = array_key_exists($_GET['name'],$fields) ?  $fields[$_GET['name']] : $fields['default'];  
		
	?>
</head>
<body>
<div id=pos_caption>
  <div id=title>位置管理</div>
</div>
<div id=pos_table>
	<form method="post"  enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1" align="center">
		<tr class=tr4 <?php if(!$names[0]) echo 'style="display:none;"';?>>
			<td class=td1 width="15%"><?php echo $names[0]?></td>
			<td width="85%"><input type="text" name="pos[display]" value="<?php echo $pos->display; ?>"></td>
		</tr>
		<tr class="tr4" <?php if(!$names[1]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[1]?></td>
			<td><textarea name="pos[description]"><?php echo $pos->description;?></textarea></td>
		</tr>
		<tr class="tr4" <?php if(!$names[2]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[2]?></td>
			<td><input type="text" name="pos[title]" value="<?php echo $pos->title; ?>"></td>
		</tr>
		<tr class=tr4 <?php if(!$names[3]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[3]?></td>
			<td><input type="text" name="pos[href]" value="<?php echo $pos->href;?>"></input></td>
		</tr>
		<tr class=tr4 <?php if(!$names[4]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[4]?></td>
			<td><input type="text" name="pos[static_href]" value="<?php echo $pos->static_href;?>"></input></td>
		</tr>
		<tr class=tr4 <?php if(!$names[5]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[5]?></td>
			<td><input type="file" name="pos[image1]"></input> <?php if($pos->image1) echo "<a href='{$pos->image1}'>查看</a>"?></td>
		</tr>
		<tr class=tr4 <?php if(!$names[6]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[6]?></td>
			<td><input type="file" name="pos[image2]"></input> <?php if($pos->image2) echo "<a href='{$pos->image2}'>查看</a>"?></td>
		</tr>
		<tr class=tr4 <?php if(!$names[7]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[7]?></td>
			<?php 
				$h = ceil((strtotime($pos->end_time) - time()) / 3600);
				$h = $h <0 ? 0 : $h;
			?>
			<td><input id="end_time" name="end_time" value="<?php echo $h;?>"></input>小时后过期</td>
		</tr>
		<tr class=tr4 <?php if(!$names[8]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[8]?></td>
			<td><input name="pos[alias]" value="<?php echo $pos->alias;?>"></input></td>
		</tr>
		<tr class=tr4 <?php if(!$names[9]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[9]?></td>
			<td><input name="pos[reserve]" value="<?php echo $pos->reserve;?>"></input></td>
		</tr>		
		<tr class=tr4 <?php if(!$names[10]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[10]?></td>
			<td><textarea name="pos[comment]"><?php echo $pos->comment;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center">
				<input type="submit" value="保存"></input>
				<input type="button" id="btn_cancel" value="取消" />
				<input type="hidden" name="pos[name]" value="<?php echo $_GET['pos_name'];?>"></input>
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>