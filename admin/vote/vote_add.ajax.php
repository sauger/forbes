<?php 
		require_once('../../frame.php');
		if($_REQUEST['id']!=null){
			$id = $_REQUEST['id'];
			$vote = new table_class('smg_vote');
			$vote_record = $vote->find('all',array('conditions' => 'id='.$id));
			$vote_item = new table_class('smg_vote_item');
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
		}else{
			$start = $_REQUEST['start'];
			$end = $_REQUEST['end'];
			$limit_type = $_REQUEST['limit'];
			$max_vote_count = $_REQUEST['max'];
		}
		
		switch($limit_type) {
			case "user_id":
				$limit_name = "工号登录";
				break;
			case "ip":
				$limit_name = "IP控制";
				break;
			case "no_limit":
				$limit_name = "不设限制";
				break;
			default:
				$limit_name = "未知类型";
		}
		
		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin');
		use_jquery_ui();
		js_include_tag('admin_pub');
		validate_form("sub_vote_form");
	?>
</head>
	
<body>
<form id="sub_vote_form" method="post" enctype="multipart/form-data" action="ajax.post.php">	
 <table width="570" border="0" id="sub_table">  
		<tr class=tr1>
			<td colspan="2">　添加投票</td>
		</tr>
		<tr class=tr3>
			<td width=150>标题：</td>
			<td width=645 align="left"><?php show_fckeditor('title','Title',true,"80",$vote_record[0]->name);?></td>
		</tr>
		<tr class=tr3>
			<td>描述：</td>
			<td align="left"><input type="text" name="vote[description]" value="<?php echo $description;?>"></td>
		</tr>
		<tr class=tr3>
			<td>添加图片：</td>
			<td align="left"><?php if(null!=$photo_url){?><img src="<?php echo $photo_url;?>" width="50" height="50" border="0"><?php }?><input type="hidden" id="MAX_FILE_SIZE" value="2097152"><input name="image"  type="file"></td>
		</tr>
		<tr class=tr3>
			<td>投票类型：</td>
			<td align="left">
				<select  id="vote_type" name="vote[vote_type]">
					<option value="word_vote" <?php if("word_vote"==$vote_type){?>selected="selected"<?php }?>>文字投票</option>
					<option value="image_vote" <?php if("image_vote"==$vote_type){?>selected="selected"<?php }?>>图片投票</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td>控制方式：</td>
			<td align="left">
				<?php echo $limit_name;?>
				<input type="hidden" name="vote[limit_type]" value="<?php echo $limit_type;?>">
			</td>
		</tr>
		<tr class=tr3>
			<td>投票选项限制：</td>
			<td align="left"><input type="text" name="vote[max_item_count]" value="<?php echo $vote_item_record[0]->max_item_count;;?>"></td>
		</tr>
		<tr class=tr3>
			<td>投票项目：</td>
			<td align="left" id="single">
				标题<input type="text" name="vote_item1[title]" style="width:100px;" class="required" <?php if($id!=null){?>value="<?php echo $vote_item_record[0]->title;?>"<?php }?>>
				<?php if("image_vote"==$vote_type&&null!=$vote_item_record[0]->photo_url){?><img src="<?php echo $vote_item_record[0]->photo_url;?>" class="show_image" width="50" height="50" border="0"><?php }?>
				<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
				<input name="item_image1"  class="item_image"  type="file" <?php if("image_vote"!=$vote_type){?>style="display:none;"<?php }?>>
				<a  class="add_item" value="1" style="cursor:pointer;">继续添加</a>
				<input type="hidden" name="deleted1" value="false"> 	
			</td>	
		</tr>
		<?php if(null!=$id){?>
			<input type="hidden" name="vote_item1_id" value="<?php echo $vote_item_record[0]->id;?>">
			<input type="hidden" name="vote_id" value="<?php echo $id;?>">
			<?php for($k=2;$k<=$item_count;$k++){?>
				<tr class=tr3>
					<td>投票项目：</td>
					<td align="left">
						标题<input type="text" name="vote_item<?php echo $k;?>[title]" style="width:100px;" class="required" value="<?php echo $vote_item_record[$k-1]->title;?>">
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
 </table>
 <table width="570" border="0" id="list">
		<tr class=tr3>
			<td colspan="2"><button id="submit" type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="vote[is_sub_vote]" value="1">
		<input type="hidden" name="vote[created_at]"  value="<?php echo date("y-m-d")?>">  
		<input type="hidden" name="sub_item_num" id="sub_item_num" value="<?php if(null==$id){echo 1;}else{echo $item_count;}?>">  
 </table>
 </form>
 
</body>
</html>
 <script>
 	$(function(){
		if(null!=$("#ord_item_num").attr('value')){
			var item_num = $("#ord_item_num").attr('value');
		}else{
			var item_num = 1;
		}
		if("image_vote"==$("#ord_vote_type").attr('value')){
			var displayed = "inline";
			var empty = "item_image required";
		}else{
			var displayed = "none";
			var empty = "item_image";
		}
		
		
		$("#submit").click(function(){
			var oEditor = FCKeditorAPI.GetInstance('title') ;
			var title = oEditor.GetHTML();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
		});
		
		$(".add_item").click(function(){
			item_num++;
			$("#sub_item_num").attr('value',item_num);
			$("#sub_table").append("<tr class=tr3 id='tr"+item_num+"'><td>投票项目：</td><td align='left'>标题<input type='text' name='vote_item"+item_num+"[title]' style='width:100px;' class='required'>&nbsp;<input type='hidden' name='MAX_FILE_SIZE' value='2097152'><input name='item_image"+item_num+"' type='file' class='"+empty+"' style='display:"+displayed+";'><a class='del_item' style='cursor:pointer;'>删除</a><input type='hidden' name='deleted"+item_num+"' id='deleted"+item_num+"' value='false'></td></tr>");
			$(".del_item").click(function(){
				$(this).prev().attr('class','');
				$(this).prev().prev().prev().attr('class','');
				$(this).next().attr('value','true');
				$(this).parent().parent().hide();
			})
			
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
		
		
		$(".del_item").click(function(){
				$(this).next().attr('value','true');
				$(this).parent().parent().hide();
		})
		
	});

 
 </script>