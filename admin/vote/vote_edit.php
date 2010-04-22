<?php
	require_once('../../frame.php');
	$id = $_REQUEST['id'];
	$vote = new table_class('smg_vote');
	$vote_record = $vote->find('all',array('conditions' => 'id='.$id));
	$vote_type = $vote_record[0]->vote_type;
	switch($vote_type) {
			case "word_vote":
				$vote_name = "文字投票";
				break;
			case "image_vote":
				$vote_name = "图片投票";
				break;
			case "more_vote":
				$vote_name = "复合投票";
				break;
			default:
				$vote_name = "未知类型";
	}
	$vote_item = new table_class('smg_vote_item');
	$vote_item_record = $vote_item->find('all',array('conditions' => 'vote_id='.$id));
	$count = count($vote_item_record);
	$category = new table_class("smg_category");
	$category_menu = $category->find("all",array('conditions' => "category_type='vote'","order" => "priority"));
	$category_count = count($category_menu);
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
<?php 
	css_include_tag('admin','thickbox','jquery_ui');
	use_jquery_ui();
	js_include_once_tag('thickbox');
	js_include_tag('admin_pub','vote_edit','ajaxfileupload');
	validate_form("vote_form");
?>
</head>

<body>
<form id="vote_form" method="post" enctype="multipart/form-data" action="vote.post.php">
 <table width="795" border="0" id="list">
		<tr class=tr1>
			<td colspan="2">　添加投票</td>
		</tr>
		<tr class=tr3>
			<td width="15%">标题：</td>
			<td width="85%" align="left"><?php show_fckeditor('title','Title',true,"80",$vote_record[0]->name);?></td>
		</tr>
		<tr class=tr3>
			<td>描述：</td>
			<td align="left"><textarea cols=70 name="vote[description]"><?php echo $vote_record[0]->description;?></textarea></td>
		</tr>
		<tr class=tr3>
			<td>添加图片：</td>
			<td align="left"><?php if(null!=$vote_record[0]->photo_url){?><img src="<?php echo  $vote_record[0]->photo_url;?>" width="50" height="50" border="0"><?php }?><input type="hidden" name="MAX_FILE_SIZE" value="2097152"><input name="image" id="image" type="file"></td>
		</tr>
		<tr class=tr3>
			<td>所属类别：</td>
			<td align="left">
				<select name="vote[category_id]">
					<?php for($i=0;$i<$category_count;$i++){?>
					<option value="<?php echo $category_menu[$i]->id;?>" <?php if($category_menu[$i]->id==$vote_record[0]->category_id){?>selected="selected"<?php }?>><?php echo $category_menu[$i]->name;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td>投票类型：</td>
			<td align="left">
				<?php echo $vote_name;?>
				<input type="hidden" name="vote[vote_type]" id="vote_type" value="<?php echo $vote_type;?>">
			</td>
		</tr>
		<tr class=tr3>
			<td>控制方式：</td>
			<td align="left">
				<select id=select_limit_type name="vote[limit_type]">
					<option value="user_id" <?php if("user_id"==$vote_record[0]->limit_type){?>selected="selected"<?php }?> >工号登录</option>
					<option value="ip" <?php if("ip"==$vote_record[0]->limit_type){?>selected="selected"<?php }?> >IP控制</option>
					<option value="no_limit" <?php if("no_limit"==$vote_record[0]->limit_type){?>selected="selected"<?php }?> >不设限制</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td>投票次数限制：</td>
			<td align="left"><input type="text" name="vote[max_vote_count]" class="number" id="max_vote_count" value="<?php if($vote_record[0]->max_vote_count!=0){echo $vote_record[0]->max_vote_count;}?>">如果不填则无限制</td>
		</tr>
		<tr class=tr3>
			<td>投票选项限制：</td>
			<td align="left"><input type="text" name="vote[max_item_count]" class="number" id="max_item_count" value="<?php if($vote_record[0]->max_item_count!=0){echo $vote_record[0]->max_item_count;}?>">如果不填则无限制</td>
		</tr>
		<tr class=tr3>
			<td>开始日期：</td>
			<td align="left"><input type="text" class="date_jquery" name="started_at" id="start" value="<?php echo substr($vote_record[0]->started_at,0,10);?>"></td>
		</tr>
		<tr class=tr3>
			<td>截止日期：</td>
			<td align="left"><input type="text"  class="date_jquery" name="ended_at" id="end" value="<?php echo substr($vote_record[0]->ended_at,0,10);?>"></td>
		</tr>
		<?php if($vote_type=="word_vote"){?>
			<tr class=tr3>
				<td>投票项目：</td>
				<td align="left">
					<input type="text" name="vote_item1[title]" id="first_item" style="width:300px" class="required" value="<?php echo $vote_item_record[0]->title?>">
					<a id="add_item" value="1" style="cursor:pointer;">继续添加</a>
					<input type="hidden" name="deleted1" value="false">
					<input type="hidden" name="vote_item1_id" value="<?php echo $vote_item_record[0]->id;?>">
				</td>	
			</tr>
			<?php for($k=2;$k<=$count;$k++){?>
				<tr class=tr3>
					<td>投票项目：</td>
					<td align="left">
						<input type="text" name="vote_item<?php echo $k;?>[title]" style="width:300px;" class="required" value="<?php echo $vote_item_record[$k-1]->title;?>">
						<a class='del_item' name="<?php echo $vote_item_record[$k-1]->id;?>" style='cursor:pointer;'>删除</a>
						<input type="hidden" name="deleted<?php echo $k;?>" id="deleted<?php echo $k;?>" value="false">
						<input type="hidden" name="vote_item<?php echo $k;?>_id" value="<?php echo $vote_item_record[$k-1]->id;?>">
					</td>	
				</tr>
			<?php }?>
		<?php }elseif($vote_type=="image_vote"){?>
			<tr class=tr3>
				<td>投票项目：</td>
				<td align="left">
					<input type="text" name="vote_item1[title]" id="first_item" value="<?php echo $vote_item_record[0]->title?>" style="width:100px" class="required">
					<?php if(null!=$vote_item_record[0]->photo_url){?><img src="<?php echo $vote_item_record[0]->photo_url;?>" class="show_image" width="50" height="50" border="0"><?php }?>
					<input name="item_image1"  class="item_image"  type="file">
					<a  id="add_item" value="1" style="cursor:pointer;">继续添加</a>
					<input type="hidden" name="deleted1" value="false"> 
					<input type="hidden" name="vote_item1_id" value="<?php echo $vote_item_record[0]->id;?>">	
				</td>	
			</tr>
			<?php for($k=2;$k<=$count;$k++){?>
				<tr class=tr3>
					<td>投票项目：</td>
					<td align="left">
						<input type="text" name="vote_item<?php echo $k;?>[title]" style="width:100px;" class="required" value="<?php echo $vote_item_record[$k-1]->title;?>">
						<?php if(null!=$vote_item_record[$k-1]->photo_url){?><img src="<?php echo $vote_item_record[$k-1]->photo_url;?>" class="show_image" width="50" height="50" border="0"><?php }?>
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						<input name="item_image<?php echo $k;?>"  class="item_image"  type="file">
						<input type="hidden" name="vote_item<?php echo $k;?>_id" value="<?php echo $vote_item_record[$k-1]->id;?>">
						<a class='del_item' name="<?php echo $vote_item_record[$k-1]->id;?>" style='cursor:pointer;'>删除</a>
						<input type="hidden" name="deleted<?php echo $k;?>" id="deleted<?php echo $k;?>" value="false">
					</td>	
				</tr>
			<?php }?>		
		<?php }else{?>
			<?php for($i=1;$i<=$count;$i++){?>
				<tr class="tr3 sub_vote">
					<td>投票项目：</td>
					<td align="left" >
						<a href="vote_add.ajax.php?id=<?php echo $vote_item_record[$i-1]->sub_vote_id;?>&KeepThis=true&TB_iframe=true&height=400&width=540" class="thickbox">查看该投票</a>
						<a class="del_vote" style="cursor:pointer;margin-left:50px">删除</a>
						<input type="hidden" name="deleted<?php echo $i;?>" id="deleted<?php echo $i;?>" value="false">
						<input type="hidden" name="vote_id<?php echo $i;?>" value="<?php echo $vote_item_record[$i-1]->sub_vote_id;?>">
						<input type="hidden" name="vote_item<?php echo $i;?>_id" value="<?php echo $vote_item_record[$i-1]->id;?>">
					</td>
				</tr>
			<?php }?>
			<tr class=tr3 id="item">
				<td>投票项目：</td>
				<td align="left" id="many">
					<a  href="vote_add.ajax.php?KeepThis=true&TB_iframe=true&height=400&width=540" class="thickbox" id="add_sub_vote">添加子投票</a>
					<a  id="can_not_add" style="display:none; cursor:pointer;">请先填写日期并选择好控制方式</a>
				</td>
			</tr>
		<?php }?>
 </table>
 <table width="795" border="0" id="list">
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="vote[created_at]"  value="<?php echo $vote_record[0]->created_at;?>">
		<input type="hidden" id="vote_item_count" name="vote_item_count" value="<?php echo $count;?>">
		<input type="hidden" name="type" value="edit">
		<input type="hidden" name="vote_id" value="<?php echo $id;?>">
		<input type="hidden" name="vote[is_sub_vote]" value="0">
 </table>
 </form>
 
</body>
</html>