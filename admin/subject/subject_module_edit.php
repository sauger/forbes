<?php require "../../frame.php";
	#var_dump($_GET);
	$item = new table_class('smg_subject_modules');
	if($_REQUEST['id']){
		$item->find($_REQUEST['id']);
	}else{
		$item->id = -1;	
		$item->pos_name = $_REQUEST['pos_name'];
		$item->subject_id = $_REQUEST['subject_id'];	
	}
	
	function assing_to_js($item,$js_name){
		?>
		<script>			
		<?php echo $js_name;?> = new subject_module_class();
		<?php echo $js_name;?>.id = '<?php echo $item->id;?>';
		<?php echo $js_name;?>.category_id = '<?php echo $item->category_id;?>';
		<?php echo $js_name;?>.category_type = '<?php echo $item->category_type;?>';
		<?php echo $js_name;?>.height = '<?php echo $item->height;?>';
		<?php echo $js_name;?>.element_height = '<?php echo $item->element_height;?>';
		<?php echo $js_name;?>.element_width = '<?php echo $item->element_width;?>';
		<?php echo $js_name;?>.scroll_type = '<?php echo $item->scroll_type;?>';
		<?php echo $js_name;?>.record_limit = '<?php echo $item->record_limit;?>';
		<?php echo $js_name;?>.name = '<?php echo $item->name;?>';
		<?php echo $js_name;?>.pos_name = '<?php echo $item->pos_name;?>';		
		<?php echo $js_name;?>.subject_id = '<?php echo $item->subject_id;?>';
		</script>
		<?php
	}
	
	$category = new table_class('smg_subject_category');
	
	$category = $category->find('all',array('conditions' => 'subject_id =' .$item->subject_id));

?>
<div id="subject_item_container">
	<p>
	  <label for="name">模块名称:</label><input type="text" name="module[name]" id="name" value="">	
	</p>
	<p>
		<label>模块类型:</label>
		<select name="module[category_type]" id="category_type">
			<option name="newslist" value="newslist">新闻列表</option>
			<option name="newslist" value="news">新闻内容</option>
			<option name="newslist" value="photolist">图片列表</option>	
			<option name="newslist" value="photo">图片展示</option>	
			<option name="newslist" value="videolist">视频列表</option>	
			<option name="newslist" value="video">视频展示</option>				
			<option name="newslist" value="commet">专题评论</option>	
		</select>	
	</p>
	<p>
		<label>内容类别:</label>
		<select name="module[category_id]" id="category_id">
			<? foreach ($category as $v) {?>
				<option value="<?php echo $v->id;?>" ><?php echo $v->name;?></option>
			<?php }?>
		</select>	
		<span id="span_quick_add"><a href="#" style="color:blue;" id="a_quick_add">快速添加</a></span>
	</p>
	<p id="height_p">
		<label for="height">高度:</label><input type="text" name="module[height]" id="height" value="">像素
	</p>
	<p id="limit_p">
		<label for="limit">条数:</label><input type="text" name="module[record_limit]" id="limit" value="">	
	</p>
	<p id="eheight_p">
		<label for="eheight">元素高度:</label><input type="text" name="module[element_height]" id="eheight" value="">	
	</p>
	<p id="ewidth_p">
		<label for="ewidth">元素高度:</label><input type="text" name="module[element_width]" id="ewidth" value="">	
	</p>
	<p id="show_pic_p">
		<label for="show_pic">显示新闻图片:</label>
		<select name="module[show_pic]" id="show_pic">
			<option value="0">不显示</option>
			<option value="1">显示</option>
		</select>	
	</p>
	<p id="show_title_p">
		<label for="show_pic">显示title:</label>
		<select name="module[show_title]" id="show_title">
			<option value="0">不显示</option>
			<option value="1">显示</option>
		</select>	
	</p>	
	<p id="scroll_type_p">
		<label>滚动类型:</label>
		<select name="module[scroll_type]" id="scroll_type">
			<option name="newslist" value="0">不滚动</option>
			<option name="newslist" value="1">向左滚动</option>
			<option name="newslist" value="2">向上滚动</option>				
			<option name="newslist" value="3">向右滚动</option>
			<option name="newslist" value="4">向下滚动</option>
		</select>	
	</p>	
	<p>
		<label for="description">描述:</label><textarea name="module[description]" id="description"></textarea>
	</p>
	<p>
		<button id="save">确定</button>
		<button id="cancel">取消 </button>			
		<input type="hidden" name="id" value="<?php echo $item->id;?>" id="hidden_module_id">
		<input type="hidden" name="module[subject_id]" value="<?php echo $item->subject_id;?>" id="hidden_subject_id">
		<input type="hidden" name="module[pos_name]" value="<?php echo $item->id;?>" id="hidden_pos_name">
	</p>
</div>		
<div id="ajax_resutl"></div>
<?php 
  assing_to_js($item, 'module');
?>
<script>	
	category = [];
	<?php
		if(count($category)>0){
	  	foreach ($category as $v) {?>
		category.push(new Array('<?php echo $v->id;?>','<?php echo $v->name;?>','<?php echo $v->category_type;?>'));
	<?php }}?>	
	
	function toggle_category_type(){
		category_type =  $('#category_type').val();
		category_type =category_type.replace(/list/g,'');
		str = '';
		jQuery.each(category,function(i){
			if(this[2] == category_type){
				if(this[0]==module.category_id){
					str += '<option selected="selected"  value=' + this[0] + '>' + this[1] + '</option>';
				}else{
					str += '<option  value=' + this[0] + '>' + this[1] + '</option>';
				}
			}			
		});
		$('#category_id').html(str);
		
	}
	
	$(function(){
		module.refresh();
		$('#cancel').click(function(){
			tb_remove();
			return false;
		});
		//var id = <?php echo $_REQUEST['id'] ?>;
		$('#save').click(function(){
			if(check_valdate()==false) return;
			$.post('subject_module.post.php',$('#subject_item_container input,#subject_item_container textarea,#subject_item_container select').serializeArray(),function(data){				
				if(data != 'ok'){
					alert('保存失败!');			
				}
				window.location.reload();
			});			
		});
		$('#category_type').change(function(){
			module.category_type = $(this).attr('value');
			module.refresh_p();
			toggle_category_type();
		});
		
		function check_valdate(){
			if($('#subject_name').attr('value') == ''){
				alert('请输入模块名称');
				return false;
			}
		}		
		
		$('#a_quick_add').click(function(e){
			e.preventDefault();
			str = '<input type="text" name="text_quick_add" id="text_quick_add"> <a href="#" style="color:blue;" id="a_quick_add_save">添加</a>';	
			$('#span_quick_add').html(str);
			$('#a_quick_add_save').click(function(e){
				e.preventDefault();
				if($('#text_quick_add').attr('value') == ''){
					alert('分类名称不能为空');
				}
				cate_type = $('#category_type').val();
				$('#ajax_resutl').load('quick_add_category.post.php',{'category[category_type]':cate_type,'category[subject_id]':module.subject_id,'category[name]':$('#text_quick_add').val()},function(data){
					
				});
			});
		});
		toggle_category_type();
	});
	
</script>