<?php 
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category_id'] ? $_REQUEST['category_id'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$c = array("a.subject_id=$subject_id");
	if($category_id > 0){
		array_push($c, "a.category_id=$category_id");
	}
	if($is_adopt!=''){
		array_push($c, "a.is_adopt=$is_adopt");
	}
	if($title){
		$tmp = "(b.title like '%$title%' or b.description like '%$title%')";
		$c[] = $tmp;
	}	
	$conditions = implode(' and ' ,$c);
	$items = $db->paginate("select b.*,a.is_adopt as adopt, a.category_id as subject_category, a.priority as subject_priority, a.id as item_id, c.name as category_name from fb_subject_items a left join fb_images b on a.resource_id=b.id left join fb_subject_category c on c.id=a.category_id where a.category_type='image' and $conditions order by subject_priority asc, b.created_at desc",20);;
	$categories = $db->query("select * from fb_subject_category where subject_id=$subject_id and category_type='image'");
?>
<body>
<div id=icaption>
	<div id=title>图片内容管理</div>
	<a href="index.php" id=btn_back></a>
	<a href="photo_edit.php?subject_id=<?php echo $subject_id;?>" id=btn_add></a>
</div>
<div id=isearch>
	<select id="content_type">
		<option value="newslist" <?php if($_REQUEST['content_type'] == 'newslist') echo ' selected="selected"';?>>文章</option>
		<option value="photo"<?php if($_REQUEST['content_type'] == 'photo') echo ' selected="selected"';?>>图片</option>
	</select>　
	<input id=key type="text" value="<? echo $title;?>">
	<select id="sel_category">
		<option value=-1>请选择</option>
		<?php
		for($i=0;$i < count($categories);$i++){ ?>
		<option value="<?php echo $categories[$i]->id;?>" <?php if($_REQUEST['category_id'] == $categories[$i]->id) echo 'selected="selected"';?>><?php echo $categories[$i]->name;?></option>
		<?php }					
		?>
	</select>
	<select id=adopt style="width:100px" class="select_new">
		<option value="">发布状况</option>
		<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
		<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
	</select>
	<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="40%">标题</td><td width="20%">所属类别</td><td width="20%">发布时间</td><td width="20%">操作</td>
		</tr>
		<?php
			//--------------------
			
			for($i=0;$i<count($items);$i++){
				$url = "/subject/{$subject->identity}/{$content_type}.php?id={$items[$i]->id}";
		?>
				<tr class=tr3 id=<?php echo $items[$i]->item_id;?> >
					<td><?php echo strip_tags($items[$i]->title);?></td>
					<td>
						<a href="?category_id=<?php echo $items[$i]->subject_category;?>&subject_id=<?php echo $subject_id; ?>" style="color:#0000FF">
							<?php echo $items[$i]->category_name; ?>
						</a>
					</td>
					<td>
						<?php echo $items[$i]->created_at; ?>
					</td>								
					<td><?php if($items[$i]->adopt=="1"){?>
							<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $items[$i]->item_id;?>">撤消</span>
						<?php }?>
						<?php if($items[$i]->adopt=="0"){?>
							<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $items[$i]->item_id;?>">发布</span>
						<?php }?>
						<a href="<?php echo $content_type;?>_edit.php?subject_id=<?php echo $subject_id;?>&item_id=<?php echo $items[$i]->item_id;?>&id=<?php echo $items[$i]->id;?>" class="edit" name="<?php echo $items[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $items[$i]->item_id;?>">删除</span>
						<input type="text" class="priority"  name="<?php echo $items[$i]->item_id;?>"  value="<?php if('100'!=$items[$i]->subject_priority){echo $items[$i]->subject_priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate();?><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_subject_items">
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<script>
	function do_search(){
		var key = encodeURI($('#key').val());
		var category_id = $('#sel_category').val();
		var adopt = $('#adopt').val();
		window.location.href="subject_content.php?subject_id=<?php echo $subject_id;?>&category_id=" + category_id+'&title='+key+'&adopt='+adopt;
	}

	$(function(){
		$('#adopt,#sel_category').change(function(){
			do_search();
		});
		$('#search_button').click(function(){
			do_search();
		});
		$('#key').keypress(function(e){
			if(e.keyCode == 13){
				do_search();
			}
		});
	});
	
</script>
