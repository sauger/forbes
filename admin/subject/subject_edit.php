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
			css_include_tag("subject/subject.css","subject/subject1.css","contextmenu/jquery.contextmenu","thickbox");			
			use_jquery_ui();

			js_include_tag('jquery.contextmenu','admin/subject_edit','thickbox','admin/subject_module_class');
			
			/*
			 * get data
			 */
			$subject = new table_class('smg_subject');
			if($subject->find($subject_id)=== false){
				die('无法找到匹配的专题!');
			};
		?>
	</head>
	<body>
		<form method="post" name="edit_subject" action="subject.post.php">
			<div id="top_info">
				<p>
					<label for="subject_name">专题名称:</label><input type="text" name="subject[name]" id="subject_name" value="<?php echo $subject->name;?>">					
				</p>
				<p>
					<label for="subject_identity">专题标识:</label><?php echo $subject->identity;?>	<input type="hidden" name="subject[identity]" id="subject_identity" value="<?php echo $subject->identity;?>">				
				</p>
				<p>
					<label>专题模板:</label>
					<select name="subject[templet_name]" id="templet_type">
						<option value="1" <?php if($subject->templet_name == "1") echo 'selected="selected"';?>>专题模板1</option>
						<option value="2" <?php if($subject->templet_name == "2") echo 'selected="selected"';?>>专题模板2</option>
						<option value="3" <?php if($subject->templet_name == "3") echo 'selected="selected"';?>>专题模板3</option>	
					</select>					
				</p>
				<p>
					<input type="hidden" name="subject[id]" value="<?php echo $subject_id;?>">
					<input type="submit" value="提交">			
				</p>
			</div>
			<div id="layout" class="bder">
				<?php
					if($subject->templet_name == "1"){
				?>
				<div id="menu" class="bder">menu</div>
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
					}elseif($subject->templet_name == "2"){
				?>
				<div id="sub2_tl" class="bder subject_pos">left</div>
				<div id="sub2_tc" class="bder subject_pos">center</div>
				<div id="sub2_tr" class="bder subject_pos">right</div>
				<div id="sub2_m" class="bder subject_pos">middle</div>
				<div id="sub2_bl" class="bder subject_pos">left</div>
				<div id="sub2_br" class="bder subject_pos">right</div>
				<?php
					}elseif($subject->templet_name == "3"){
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
					}
				?>
			</div>
			<input type="hidden" name="id" id="hidden_id" value="<?php echo $subject->id;?>">
		</form>
	</body>
</html>
<?php
	$modules = new table_class('smg_subject_modules');
	$modules = $modules->find('all',array('conditions' => 'subject_id=' . $subject->id,'order' => 'category_type,priority ASC'));
?>
<script>

	$(function(){
		manager = new subject_modules_manager_class();
		<?php
			$icount = count($modules);
			if($icount > 0){
				

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
			$.post("templet"+$("#templet_type").val()+".php",{},function(date){
				$("#layout").html(date);
			})
		})
	});
</script>