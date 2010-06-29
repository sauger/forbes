<?php
/*
 * just use in ajax mode
 */
 	
	require "../../frame.php";
	parse_str($_SERVER['QUERY_STRING']);
	$id = $_GET['id'];
	$module = new table_class('fb_subject_modules');
	$module->find($id);
	$db = get_db();
	switch ($module->category_type) {
		case 'news':
			$record_limit[0] = 1;
			$table = 'fb_news';
		break;
		case 'newslist':
			$table = 'fb_news';
		break;
		case 'photo':
			$record_limit[0] = 1;
			$table = 'fb_images';
		break;
		case 'photolist':
			$table = 'fb_images';
		break;
		case 'video':
			$record_limit[0] = 1;
			$table = 'fb_video';
		break;
		case 'videolist':
			$table = 'fb_video';
		break;
		default:
			;
		break;
	}
	$db = get_db();
	$items = $db->paginate('select b.* from fb_subject_items a left join ' .$table .' b on a.resource_id = b.id where a.category_id=' .$module->category_id.' order by a.priority',20);
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
		if($table == 'fb_images'){
			?>
			<img src="<?php echo $exist_items[$i]->src_path('small');?>" width=20 height=20 border=0>
			<?php
		}elseif($table == 'fb_video'){
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
			$.post('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>',{'keywords':$('#search_box input:first').attr('value')});
		});
	})
</script>
