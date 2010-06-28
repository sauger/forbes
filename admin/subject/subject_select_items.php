<?php
/*
 * just use in ajax mode
 */
 	
	require "../../frame.php";
	parse_str($_SERVER['QUERY_STRING']);
	$category_id = $cate[0];
	$db = get_db();
	switch ($category_type[0]) {
		case 'news':
			$record_limit[0] = 1;
			$table = 'smg_news';
		break;
		case 'newslist':
			$table = 'smg_news';
		break;
		case 'photo':
			$record_limit[0] = 1;
			$table = 'smg_images';
		break;
		case 'photolist':
			$table = 'smg_images';
		break;
		case 'video':
			$record_limit[0] = 1;
			$table = 'smg_video';
		break;
		case 'videolist':
			$table = 'smg_video';
		break;
		default:
			;
		break;
	}
	$db = get_db();
	$items = $db->paginate('select b.* from smg_subject_items a left join ' .$table .' b on a.resource_id = b.id where a.category_id=' .$cate_id[0] .' order by a.priority',20);
?>
<div id=div_top>
	<h3>筛选属于<?php echo $name[0];?>相关内容 </h3>
</div>
<!--
<div id="div_left_box">
	<?php
	$items_count = count($exist_items);
	for($i=$items_count-1; $i >=0 ;$i--){?>
	<div class="selected_item">
		<a href="#">
		<?php 
		if($table == 'smg_images'){
			?>
			<img src="<?php echo $exist_items[$i]->src_path('small');?>" width=20 height=20 border=0>
			<?php
		}elseif($table == 'smg_video'){
			?>
			<img src="<?php echo $exist_items[$i]->photo_url;?>" width=20 height=20 border=0>
			<?php
		}
		?>
		<?php echo $exist_items[$i]->title;?>
		</a>
	</div>			
	<?php	
	}
	?>
</div>
-->
<div id="div_right_box">
	<div id="search_box">
		<label for="keywrods">关键字:</label><input type="text" name="keywords">
		<label for="dept_s">部门:</label>
		<select name="dept_s" id="dept_s">
			<option>请选择</option>
		<?php 
			$dept_infos = $db->query('select * from smg_dept');
			foreach ($dept_infos as $v) {?>
				<option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
			<?php
			}
		?>
		</select>
		<button id="search_bt">搜索</button>
	</div>
	<div id="item_list">
		<?php 
		foreach ($items as $v) {
			echo $v->title;
		}
		?>
	</div>
</div>

<script>
	$(function(){
		$('#search_bt').click(function(){
			$.post('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>',{'keywords':$('#search_box input:first').attr('value'),'dept':$('#search_box select').attr('value')});
		});
	})
</script>
