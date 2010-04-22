<?php 
		require_once('../../frame.php');
		$id = $_REQUEST['id'];
		if(isset($_REQUEST['id'])){
			$vote = new table_class('fb_vote');
			$vote->find($id);
			$vote_item = new table_class('fb_vote_item');
			$vote_item_record = $vote_item->find('all',array('conditions' => 'vote_id='.$id));
			$item_count = count($vote_item_record);
			$name = $vote_record[0]->name;
			$description = $vote_record[0]->description;
			$photo_url = $vote_record[0]->photo_url;
			$vote_type = $vote_record[0]->vote_type;
			$start = $vote_record[0]->started_at;
			$end = $vote_record[0]->ended_at;	
			$limit_type = $vote_record[0]->limit_type;
			$max_vote_count = $vote_record[0]->max_vote_count;
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery_ui();
		js_include_tag('admin_pub');
		validate_form("sub_vote_form");
	?>
</head>
	
<body>
<form id="sub_vote_form" method="post" enctype="multipart/form-data" action="ajax.post.php">
<div id=icaption style="width:550px;">
	<div id=title style="width:500px;">添加投票</div>
</div>
<div id=itable style="width:570px;">
 <table style="width:570px;" border="0" id="sub_table">  
		<tr class=tr1>
			<td colspan="2">　添加投票</td>
		</tr>
		<tr class=tr4>
			<td width="30%" align="center">标题：</td>
			<td width="70%"><input type="text" name="vote[name]" value="<?php echo $vote->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td align="center">描述：</td>
			<td><input type="text" name="vote[description]" value="<?php echo $description;?>"></td>
		</tr>
		<tr class=tr4>
			<td align="center">添加图片：</td>
			<td><?php if(null!=$photo_url){?><img src="<?php echo $photo_url;?>" width="50" height="50" border="0"><?php }?><input name="image"  type="file"></td>
		</tr>
		<tr class=tr4>
			<td align="center">投票类型：</td>
			<td align="left">
				<select  id="vote_type" name="vote[vote_type]">
					<option value="word_vote" <?php if("word_vote"==$vote_type){?>selected="selected"<?php }?>>文字投票</option>
					<option value="image_vote" <?php if("image_vote"==$vote_type){?>selected="selected"<?php }?>>图片投票</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">投票次数限制：</td>
			<td align="left"><input type="text" name="vote[max_vote_count]" class="number"></td>
		</tr>
		<tr class=tr4>
			<td align="center">投票选项限制：</td>
			<td><input type="text" class="number"  name="vote[max_item_count]" value="<?php echo $vote_item_record[0]->max_item_count;;?>"></td>
		</tr>
		<?php if(null!=$id){?>
			<input type="hidden" name="vote_item1_id" value="<?php echo $vote_item_record[0]->id;?>">
			<input type="hidden" name="vote_id" value="<?php echo $id;?>">
			<?php for($k=2;$k<=$item_count;$k++){?>
				<tr class=tr4>
					<td align="center">投票项目：</td>
					<td align="left">
						<input type="text" name="vote_item<?php echo $k;?>[title]" style="width:100px;" class="required" value="<?php echo $vote_item_record[$k-1]->title;?>">
						<?php if("image_vote"==$vote_type&&null!=$vote_item_record[$k-1]->photo_url){?><img src="<?php echo $vote_item_record[$k-1]->photo_url;?>" class="show_image" width="50" height="50" border="0"><?php }?>
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						<input name="item_image<?php echo $k;?>"  class="item_image"  type="file" <?php if("image_vote"!=$vote_type){?>style="display:none;"<?php }?>>
						<input type="hidden" name="vote_item<?php echo $k;?>_id" value="<?php echo $vote_item_record[$k-1]->id;?>">
						<a class='del_item' name="<?php echo $vote_item_record[$k-1]->id;?>" style='cursor:pointer;'>删除</a>
						<input type="hidden" name="deleted<?php echo $k;?>" id="deleted<?php echo $k;?>" value="false">
					</td>
				</tr>
			<?php }?>
			<input type="hidden" name="sub_type" value="edit_sub">
			<input type="hidden" id="ord_item_num" value="<?php echo $item_count;?>">
			<input type="hidden" id="ord_vote_type" value="<?php echo $vote_type;?>">
		<?php }?>
		<tr class="tr4 item">
			<td align="center">投票项目：</td>
			<td id="single">
				<input type="text" name="vote_item[title]" style="width:300px;" class="required">
				<input name="vote_item[]"  class="item_image"  type="file" style="display:none;">
				<a class="add_item" value="1" style="cursor:pointer;">继续添加</a>
			</td>	
		</tr>
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="发布投票"></td>
		</tr>
		<input type="hidden" name="vote[is_sub_vote]" value="1">
		<input type="hidden" name="vote_id" value="<?php echo $id;?>">
 </table>
 </div>
 </form>
 
</body>
</html>
 <script>
 	$(function(){
		if("image_vote"=='<?php echo $vote->vote_type;?>'){
			var displayed = "inline";
			var empty = "item_image required";
		}else{
			var displayed = "none";
			var empty = "item_image";
		}
		
		
		
		$(".add_item").click(function(){
			$(".item").after("<tr class='tr4 s_item'><td align='center'>投票项目：</td><td><input type='text' name='vote_item[title][]' class='required'>&nbsp;<input name='vote_item[]' type='file' class='"+empty+"' style='display:"+displayed+";'><a class='del_item' style='cursor:pointer;'>删除</a></td></tr>");
		});
	
		$("#vote_type").change(function(){
			if($("#vote_type").attr('value')=="word_vote"){
				$(".item_image").hide();
				$(".item_image").attr('class','item_image');
				$(".show_image").hide();
				empty = "item_image";
				displayed = "none";
			}else{
				$(".item_image").show();
				$(".item_image").attr('class','item_image required')
				empty = "item_image required";
				displayed = "inline";
			}
		});
		
		
		$(".del_item").live('click',function(){
			$(this).parent().parent().remove();
		});
		
	});

 
 </script>