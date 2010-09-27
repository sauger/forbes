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
			$sql = 'select a.id as item_id,a.priority,a.is_adopt,b.short_title as name,b.id from fb_subject_items a left join fb_news b on a.resource_id = b.id where a.category_id=' .$id.' order by a.priority';
		break;
		case 'list':
			$sql = "select t1.id as item_id,t2.id,t1.priority,t1.is_adopt,t2.name from fb_subject_items t1 join fb_custom_list_type t2 on t1.resource_id=t2.id where t1.category_type='list' and t1.category_id=$id order by t1.priority";
		break;
		case 'ilist':
			$sql = "select t1.id as item_id,t2.id,t1.priority,t1.is_adopt,t2.name from fb_subject_items t1 join fb_custom_list_type t2 on t1.resource_id=t2.id where t1.category_type='ilist' and t1.category_id=$id order by t1.priority";
		break;
		case 'image':
			$sql = "select t1.id as item_id,t2.id,t1.priority,t1.is_adopt,t2.title as name from fb_subject_items t1 join fb_images t2 on t1.resource_id=t2.id where t1.category_type='image' and t1.category_id=$id order by t1.priority";
		break;
		default:
			;
		break;
	}
	$db = get_db();
	$items = $db->query($sql);
	!$items && $items = array();
	if($module->category_type!='link'&&$module->category_type!='word'){
		$ids_array = array();
		foreach($items as $v){
			array_push($ids_array,$v->id);
		}
		$ids = implode(',',$ids_array);
		if($keyword){
			switch ($module->category_type) {
				case 'news':
					$sql = "select id,short_title as title from fb_news where (title like '%$keyword%' or short_title like '%$keyword%' or author like '%$keyword%')";
					$name = '文章标题';
				break;
				case 'list':
					$sql = "select id,name as title from fb_custom_list_type where (name like '%$keyword%') and list_type=1";
					$name = '榜单标题';
				break;
				case 'ilist':
					$sql = "select id,name as title from fb_custom_list_type where (name like '%$keyword%') and list_type=4";
					$name = '图片榜标题';
				break;
				case 'image':
					$sql = "select id,title from fb_images where (title like '%$keyword%')";
					$name = '图片标题';
				break;
				default:
					;
				break;
			}
			if($ids){
				$sql .= " and id not in($ids)";
			}
			$source = $db->query($sql);
			!$source && $source = array();
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
		<label for="keywrods">关键字:</label><input type="text" value="<?php echo $keyword;?>" name="keywords">
		<button id="search_bt">搜索</button><span style="display:none;" id="search_info">搜索中。。。</span>
	</div>
	<div id="item_list">
	<div class="title"><?php echo $name;?></div>
		<div class="priority">显示优先级</div>
		<div class="contrl">操作</div>
		<?php if($keyword){
			foreach($source as $v){	
		?>
		<div class="title"><?php echo $v->title;?></div>
		<div class="priority"></div>
		<div class="contrl">
			<a class="add" href='<?php echo $v->id;?>'>加入</a>
		</div>
		<?php }}?>
		<?php foreach ($items as $v) {?>
		<div class="title"><?php echo $v->name;?></div>
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
			$.post('select.post.php',{'id':$(this).attr('href'),'subject_id':'<?php echo $module->subject_id;?>','category_id':'<?php echo $module->category_id;?>','category_type':'<?php echo $module->category_type;?>','type':'add','module_id':<?php echo $id;?>},function(data){
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
		$("#search_info").show();
		$("#TB_ajaxContent").load('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>',{'keywords':$('#search_box input:first').attr('value')});
	}
</script>
<?php }else if($module->category_type=='link'){?>
<style>
	#item_list div{float:left; overflow:hidden; text-align:center; border-bottom:1px solid #999999; height:25px; line-height:25px;}
	.title{width:30%;}
	.href{width:20%;}
	.href input{width:80%}
	.priority{width:20%;}
	.priority input{width:50%}
	.contrl{width:30%;}
</style>
<div id=div_top>
	<h3>筛选相关内容 </h3>
</div>
<div id="div_right_box">
	<div id="search_box">
		<button id="add_href">添加</button>
	</div>
	<div id="item_list">
		<div class="title">标题</div>
		<div class="href">链接</div>
		<div class="priority">显示优先级</div>
		<div class="contrl" id="flag">操作</div>
		<?php foreach ($items as $v) {?>
		<div class="title"><input type='text' name="<?php echo $v->id;?>" value="<?php echo $v->name;?>"></div>
		<div class="href"><input type='text' name="<?php echo $v->id;?>" value="<?php echo $v->href;?>"></div>
		<div class="priority"><input type="text" name="<?php echo $v->id;?>" value="<?php if($v->priority!='100')echo $v->priority;?>"></div>
		<div class="contrl">
			<?php if($v->is_adopt){?>
			<a class="unpublish" href='<?php echo $v->id;?>'>撤销</a>
			<?php }else{?>
			<a class="publish" href='<?php echo $v->id;?>'>发布</a>
			<?php }?>
			<a class="del" href='<?php echo $v->id;?>'>删除</a>
		</div>
		<?php }?>
	</div>
	<button id="save">保存</button>
</div>
<script>
	$(function(){
		$('#save').unbind();
		
		var flag = 0;
		$("#add_href").click(function(){
			var str = '<div class="title"><input type="text" id="new_title"></div>';
			str += '<div class="href"><input type="text" id="new_href"></div>';
			str += '<div class="priority"><input type="text" id="new_priority"></div>';
			str += '<div class="contrl"></div>';
			if(flag == 0){
				$("#flag").after(str);
				flag = 1;
			} 
		});

		$("#save").click(function(){
			$.post('select.post.php',{'title':$("#new_title").val(),'href':$("#new_href").val(),'priority':$("#new_priority").val(),'subject_id':'<?php echo $module->subject_id;?>','category_type':'link','type':'add','module_id':<?php echo $id;?>},function(data){
				reload_box();
			});
		});
		
		$(".del").click(function(e){
			e.preventDefault();
			if(!window.confirm("确定要删除吗")){return false;}
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'del','s_type':'link'},function(data){
				reload_box();
			});
		});
		$(".unpublish").click(function(e){
			e.preventDefault();
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'unpub','s_type':'link'},function(data){
				reload_box();
			});
		});
		$(".publish").click(function(e){
			e.preventDefault();
			$.post('select.post.php',{'id':$(this).attr('href'),'type':'pub','s_type':'link'},function(data){
				reload_box();
			});
		});
		$(".priority input").change(function(){
			$.post('select.post.php',{'id':$(this).attr('name'),'priority':$(this).val(),'type':'priority','s_type':'link'},function(data){
			});
		});
		$(".title input").change(function(){
			$.post('select.post.php',{'id':$(this).attr('name'),'title':$(this).val(),'type':'link_title'},function(data){
			});
		});
		$(".href input").change(function(){
			$.post('select.post.php',{'id':$(this).attr('name'),'href':$(this).val(),'type':'link_href'},function(data){
			});
		});
	});
	
	function reload_box(){
		$("#TB_ajaxContent").load('subject_select_items.php?' + '<?php echo $_SERVER['QUERY_STRING'];?>');
	}
</script>
<?php }else if($module->category_type=='word'){?>
<div>
	<div>标题</div>
	<div><input type="text" id="word_title" value="<?php echo $items[0]->title;?>"></div>
	<div>链接</div>
	<div><input type="text" id="word_href" value="<?php echo $items[0]->href;?>"></div>
	<div>内容</div>
	<div><textarea id="word_text" style="width:600px; height:260px;"><?php echo $items[0]->text;?></textarea></div>
	<button id="save">保存</button>
</div>
<script>
	$("#save").click(function(){
		if($("#word_title").val()==''){
			alert('请输入标题');
			return false;
		}
		if($("#word_href").val()==''){
			alert('请输入链接');
			return false;
		}
		if($("#word_text").val()==''){
			alert('请入内容');
			return false;
		}
		$.post('select.post.php',{'id':'<?php echo $items[0]->id;?>','title':$("#word_title").val(),'href':$("#word_href").val(),'text':$("#word_text").val(),'module_id':'<?php echo $id;?>','type':'word'},function(data){
		});
	});
</script>
<?php }?>


