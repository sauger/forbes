<?php
	require_once('../../frame.php');
	$role = judge_role();
	$id = $_REQUEST['id'];	
	$photo = new table_class("fb_images");	
	if($id){
		$photo = $photo->find($id);
	}
	
	$subject_item = new table_class('fb_subject_items');
	$subject_id = $_REQUEST['subject_id'];
	$item_id = $_REQUEST['item_id'];
	if($item_id){
		$subject_item = $subject_item->find($item_id);
	}	
	$db = get_db();
	$category = $db->query("select * from fb_subject_category where subject_id=$subject_id and category_type='photo'");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG</title>
	<?php 
		css_include_tag('admin');
		use_jquery();		
	?>
</head>
<body style="background:#E1F0F7">
	<form id="picture_edit" enctype="multipart/form-data" action="photo.post.php" method="post"> 
	<table width="795" border="0">
		<tr bgcolor="#f9f9f9" height="25px;" style="font-weight:bold; font-size:13px;">
			<td colspan="2" width="795">　　编辑图片</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td width="100">标　题</td>
			<td width="695" align="left">
				<input type="text" name="photo[title]" id="photo_title" value="<?php echo $photo->title;?>">
			</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>优先级</td><td align="left"><input type="text" size="10" id="priority" name="photo[priority]" value="<?php if($photo->subject_priority!=100){echo $photo->subject_priority;}?>">(1-100)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>关键词</td><td align="left"><input type="text" size="50" name="photo[keywords]" value="<?php echo $photo->keywords;?>">(请用空格或者","分隔开关键词,比如:高考 升学)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>开启评论</td><td align="left"><input type="checkbox" name="photo[commentable]" id=commentable <?php if($photo->commentable==="on"){?>checked="checked"<?php }?> ></td>
		</tr>			
		
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>分　类</td>
			<td align="left">
			<select id="sel_category" name="item[category_id]">
				<option value=0>请选择</option>
				<?php
				for($i=0;$i < count($category);$i++){ ?>
				<option value="<?php echo $category[$i]->id;?>" <?php if($subject_item->category_id == $category[$i]->id) echo 'selected="selected"';?>><?php echo $category[$i]->name;?></option>
				<?php }					
				?>
			</select>
			</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>图片链接</td><td align="left"><input type="text" size="50" name="photo[url]" id="online" value="<?php echo $photo->url;?>"></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>选择图片</td><td align="left"><input type="hidden" name="MAX_FILE_SIZE1" value="2097152"><input name="image" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($photo->src!=''){?><a href="<?php echo $photo->src;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="150px;" id=newsshow1>
			<td>简短描述</td><td align="left"><textarea cols="80" rows="8" name="photo[description]" class="required" ><?php echo $photo->description;?></textarea></td>
		</tr>

		<tr bgcolor="#f9f9f9" height="30px;">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布图片"></td>
		</tr>	
	</table>

	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="photo[is_recommend]" id="recommend" value="1">
	<input type="hidden" name="item_id" value="<?php echo $_REQUEST['item_id'];?>">
	<input type="hidden" name="item[subject_id]" value="<?php echo $subject_id;?>">
	<input type="hidden" name="item[category_type]" value="photo">
	<input type="hidden" name="item[resource_id]" value="<?php echo $id;?>">
	</form>
</body>
</html>

<script>
	$(function(){
		$("#submit").click(function(){		
			var title = $('#photo_title').val();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
			if($("#upfile").val()!=''){
				var upfile1 = $("#upfile").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else{
				if(!$('#id').val){
					alert('请选择上传图片');
					return false;					
				}

			}
			if($("#description").val()==''){
				alert('请输入简短描述！');
				return false;
			}
			if($("#sel_category").val()==0){
				alert("请选择分类");
				return false;
			}
		}); 							
	});
	

	
</script>