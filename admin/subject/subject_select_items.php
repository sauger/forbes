<?php
/*
 * just use in ajax mode
 */
 	
	require "../../frame.php";
	parse_str($_SERVER['QUERY_STRING']);
	$id = $_GET['id'];
	$keyword = $_POST['keywords'];
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
	$items = $db->paginate('select a.id as item_id,a.priority,a.is_adopt,b.short_title,b.id from fb_subject_items a left join ' .$table .' b on a.resource_id = b.id where a.category_id=' .$module->category_id.' order by a.priority',20);
	!$items && $items = array();
	$ids_array = array();
	foreach($items as $v){
		array_push($ids_array,$v->id);
	}
	$ids = implode(',',$ids_array);
	if($keyword){
		$sql = "select id,short_title from fb_news where (title like '%$keyword%' or short_title like '%$keyword%' or author like '%$keyword%' or content like '%$keyword%' or description like '%$keyword%' or keywords like '%$keyword%')";
		if($ids){
			$sql .= " and id not in($ids)";
		}
		$news = $db->query($sql);
		!$news && $news = array();
	}
?>
<style>
	#item_list div{float:left; overflow:hidden; text-align:center; border-bottom:1px solid #999999; height:25px; line-height:25px;}
	.title{width:50%;}
	.priority{width:20%;}
	.priority input{width:50%}
	.contrl{width:30%;}
</style>
<div id=div_top>
	<h3>筛选相关内容 </h3>
</div>
<div id="div_right_box">
	<div id="search_box">
		<label for="keywrods">关键字:</label><input type="text" name="keywords">
		<button id="search_bt">搜索</button>
	</div>
	<div id="item_list">
	<div class="title">文章标题</div>
		<div class="priority">显示优先级</div>
		<div class="contrl">操作</div>
		<?php if($keyword){
			foreach($news as $v){	
		?>
		<div class="title"><?php echo $v->short_title;?></div>
		<div class="priority"></div>
		<div class="contrl">
			<a class="add" href='<?php echo $v->id;?>'>加入</a>
		</div>
		<?php }}?>
		<?php foreach ($items as $v) {?>
		<div class="title"><?php echo $v->short_title;?></div>
		<div class="priority"><input type="text" name="<?php echo $v->item_id;?>" value="<?php if($v->priority!='100')echo $v->priority;?>"></div>
		<div class="contrl">
			<?php if($v->is_adopt){?>
			<a class="unpublish" href='<?php echo $v->item_id;?>'>撤销</a>
			<?php }else{?>
			<a class="publish" href='<?php echo $v->item_id;?>'>发布</a>
			<?php }?>
			<a class="del" href='<?php echo $v->item_id;?>'>删除</a>
		</div>
		<?php }?>
	</div>
</div>

<script>
	$(function(){
		$('#search_bt').click(function(){
			search();
		});
		$(".add").click(function(e){
			e.preventDefault();
			$.post('select.post.php',{'id':$(this).attr('href'),'subject_id':'<?php echo $module->subject_id;?>','category_id':'<?php echo $module->category_id;?>','category_type':'<?php echo $module->category_type;?>','type':'add'},function(data){
				reload_box();
			});
		});
		$(".del").click(function(e){
			e.preventDefault();
			if(!window.confirm("确定要删除吗")){return false;}
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'del'},function(data){
				reload_box();
			});
		});
		$(".unpublish").click(function(e){
			e.preventDefault();
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'unpub'},function(data){
				reload_box();
			});
		});
		$(".publish").click(function(e){
			e.preventDefault();
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'pub'},function(data){
				reload_box();
			});
		});
		$(".priority input").change(function(){
			$.post('select.post.php',{'id':$(this).attr('name'),'priority':$(this).val(),'type':'priority'},function(data){
			});
		});
	});
	
	function reload_box(){
		$("#TB_ajaxContent").load('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>');
	}

	function search(){
		$("#TB_ajaxContent").load('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>',{'keywords':$('#search_box input:first').attr('value')});
	}
</script>
