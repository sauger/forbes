<?php 
	$title = $_REQUEST['title'];
	$is_adopt = $_REQUEST['adopt'];
	$sql = "select * from fb_subject_link where subject_id=$subject_id";
	if($title){
		$sql .= " and title like '%$title%'";
	}
	if($_REQUEST['adopt']!=''){
		$sql .= " and is_adopt=$is_adopt";
	}
	$items = $db->paginate($sql,20);
?>
<body>
<div id=icaption>
	<div id=title>链接管理</div>
	<a href="index.php" id=btn_back></a>
	<a href="link_edit.php?subject_id=<?php echo $subject_id;?>" id=btn_add></a>
</div>
<div id=isearch>
	<select id="content_type">
		<option value="newslist" <?php if($_REQUEST['content_type'] == 'newslist') echo ' selected="selected"';?>>文章</option>
		<option value="photo"<?php if($_REQUEST['content_type'] == 'photo') echo ' selected="selected"';?>>图片</option>
		<option value="word"<?php if($_REQUEST['content_type'] == 'word') echo ' selected="selected"';?>>文字</option>
		<option value="link"<?php if($_REQUEST['content_type'] == 'link') echo ' selected="selected"';?>>链接</option>
	</select>　
	<input id=key type="text" value="<? echo $title;?>">
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
			<td width="40%">标题</td><td width="40%">链接</td><td width="20%">操作</td>
		</tr>
		<?php
			//--------------------
			!$items && $items = array();
			foreach($items as $item){
		?>
				<tr class=tr3 id=<?php echo $item->id;?> >
					<td><?php echo $item->title;?></td>
					<td>
						<?php echo $item->href; ?>
					</td>								
					<td><?php if($item->adopt=="1"){?>
							<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $item->id;?>">撤消</span>
						<?php }?>
						<?php if($item->adopt=="0"){?>
							<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $item->id;?>">发布</span>
						<?php }?>
						<a href="list_edit.php?subject_id=<?php echo $subject_id;?>&item_id=<?php echo $item->id;?>" class="edit" name="<?php echo $items[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $item->id;?>">删除</span>
						<input type="text" class="priority"  name="<?php echo $item->id;?>"  value="<?php if('100'!=$item->priority){echo $item->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate();?><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_subject_link">
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<script>
	function do_search(){
		var key = encodeURI($('#key').val());
		var adopt = $('#adopt').val();
		window.location.href="subject_content.php?subject_id=<?php echo $subject_id;?>&title="+key+"&adopt="+adopt;
	}

	$(function(){
		$('#adopt').change(function(){
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
