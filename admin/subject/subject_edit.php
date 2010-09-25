<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>编辑专题</title>
		<?php
			require_once('../../frame.php');
			$subject_id = intval($_REQUEST['id']);
			if($subject_id <=0){
				die('非法的专题id!');
			}
			css_include_tag("admin2","subject/subject.css","subject/subject1.css","contextmenu/jquery.contextmenu","thickbox");			
			use_jquery_ui();

			js_include_tag('jquery.contextmenu','admin/subject_edit','thickbox','admin/subject_module_class','ajaxfileupload');
			
			/*
			 * get data
			 */
			$subject = new table_class('fb_subject');
			if($subject->find($subject_id)=== false){
				die('无法找到匹配的专题!');
			};
		?>
	</head>
	<body>
		<div id=icaption>
		    <div id=title>发布专题</div>
			  <a href="index.php" id=btn_back></a>
		</div>
		<div id=itable>
			<form method="post" name="edit_subject" id="form_add_subject" action="subject.post.php">
			<table cellspacing="1"  align="center" width="1026">
			<tr class=tr4>
				<td class=td1 width=15%>专题名称</td>
				<td width=85%>
					<input type="text" name="subject[name]" id="subject_name" value="<?php echo $subject->name;?>">
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>专题标识</td>
				<td>
					<?php echo $subject->identity;?>	<input type="hidden" name="subject[identity]" id="subject_identity" value="<?php echo $subject->identity;?>">
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>导语文字1</td>
				<td>
					<textarea name="subject[description]"><?php echo $subject->description;?></textarea>
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>导语文字2</td>
				<td>
					<textarea name="subject[description2]"><?php echo $subject->description2;?></textarea>
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>图片</td>
				<td>
					<input type="file" name="subject[image]"><?php if($subject->image!=''){?><a href="<?php echo $subject->image?>" target="_blank">点击查看<?php }?>
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>样式</td>
				<td>
					<div id="layout" class="bder">
						<?php
							if($subject->templet_name == "templet1"){
						?>
						<div id="menu" class="bder subject_pos">menu</div>
						<div id="pos1" class="bder subject_pos">left</div>
						<div id="right_box" class="bder">
							<div id="pos2" class="bder subject_pos">top</div>
							<div id="pos3" class="bder subject_pos">left</div>
							<div id="pos4" class="bder subject_pos">right</div>
							<div style="clear:both"></div>
							<div id="pos5" class="bder subject_pos">center</div>
							<div id="pos6" class="bder subject_pos">left</div>
							<div id="pos7" class="bder subject_pos">right</div>
							<div style="clear:both"></div>
							<div id="pos8" class="bder subject_pos">bottom</div>
						</div>
						<?php
							}elseif($subject->templet_name == "templet2"){
						?>
						<div id="sub2_tl" class="bder subject_pos">left</div>
						<div id="sub2_tc" class="bder subject_pos">center</div>
						<div id="sub2_tr" class="bder subject_pos">right</div>
						<div id="sub2_m" class="bder subject_pos">middle</div>
						<div id="sub2_bl" class="bder subject_pos">left</div>
						<div id="sub2_br" class="bder subject_pos">right</div>
						<?php
							}elseif($subject->templet_name == "templet3"){
						?>
						<div id="sub3_tl" class="bder subject_pos">left</div>
						<div id="sub3_tc" class="bder subject_pos">center</div>
						<div id="sub3_tr" class="bder subject_pos">right</div>
						<div style="clear:both"></div>
						<div id="middle_left">
						<div id="sub3_mt" class="bder subject_pos">top</div>
						<div id="sub3_mbl" class="bder subject_pos">b_left</div>
						<div id="sub3_mbr" class="bder subject_pos">b_right</div>
						</div>
						<div id="sub3_mr" class="bder subject_pos">right</div>
						<div style="clear:both"></div>
						<div id="sub3_bl" class="bder subject_pos">left</div>
						<div id="sub3_br" class="bder subject_pos">right</div>
						<?php
							}elseif($subject->templet_name == "new_temp"){
						?>
						<div class="bder subject_pos" style="width:40%; float:left;" id="left_top">left_top</div>
						<div class="bder subject_pos" style="width:40%; float:left;" id="right_top">right_top</div>
						<div class="bder subject_pos" style="width:40%; margin-top:20px; float:left;" id="left_bottom">left_bottom</div>
						<div class="bder subject_pos" style="width:40%; margin-top:20px; float:left;" id="right_bottom">right_bottom</div>
						<?php
							}
						?>
					</div>
				</td>
			</tr>
			<tr class="btools">
				<td colspan="10">
					<input type="hidden" name="subject[id]" id="hidden_id" value="<?php echo $subject_id;?>">
					<input id="submit" type="submit" value="提交更改">	
				</td>
			</tr>	
			</table>
			</form>
		</div>
	</body>
</html>
<?php
	$modules = new table_class('fb_subject_modules');
	$modules = $modules->find('all',array('conditions' => 'subject_id=' . $subject->id,'order' => 'category_type,priority ASC'));
	$icount = count($modules);
?>
<script>

	$(function(){
		manager = new subject_modules_manager_class();
		<?php
			
			if($icount>0&&$modules){
				

			foreach($modules as $item){
			?>
				module = new subject_module_class();
				module.subject_id = '<?php echo $subject->id;?>'
				module.id = '<?php echo $item->id;?>';
				module.category_id = '<?php echo $item->category_id;?>';
				module.category_type = '<?php echo $item->category_type;?>';
				module.height = '<?php echo $item->height;?>';
				module.element_height = '<?php echo $item->element_height;?>';
				module.element_width = '<?php echo $item->element_width;?>';
				module.scroll_type = '<?php echo $item->scroll_type;?>';
				module.record_limit = '<?php echo $item->record_limit;?>';
				module.name = '<?php echo $item->name;?>';
				module.pos_name = '<?php echo $item->pos_name;?>';
				manager.items.push(module);
				module.display_info(true);
			<?php
				}
			}
		?>
		
		$("#templet_type").change(function(){
			$.post($("#templet_type").val()+".php",{},function(date){
				$("#layout").html(date);
				init_contextmenu();
			})
		})
	});
</script>