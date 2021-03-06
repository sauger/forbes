<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$category = new category_class('news');
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$up = $_REQUEST['up'];
	$language_tag = $_REQUEST['language_tag'] ? $_REQUEST['language_tag'] : 0;
	
	$db = get_db();
	$c = array();
	array_push($c, "language_tag=$language_tag");
	array_push($c, "category_id is not null");
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%' or author like '%{$title}%'");
	}
	if($category_id > 0){
		$cate_ids = implode(',',$category->children_map($category_id));
		array_push($c, "category_id in($cate_ids)");
	}
	array_push($c, "is_adopt=0");
	if($up!=''){
		array_push($c, "set_up=$up");
	}
	if(role_name() == 'column_editor' || role_name()=='column_writer'){
		$c[] = "publisher={$_SESSION['admin_user_id']}";
	}
	$news = new table_class($tb_news);
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'created_at desc,category_id'),30);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class','admin/pub/search','admin/news/news_list');
		$category->echo_jsdata();		
	?>
</head>
<body>
<div id=icaption>
    <div id=title>新闻管理</div>
	  <a href="news_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
		<span id="span_category"></span>
		<select id="language_tag" name="language_tag" class="sau_search">					
				<option value="0" <? if($_REQUEST['language_tag']=="0"){?>selected="selected"<? }?>>中文</option>
				<option value="1" <? if($_REQUEST['language_tag']=="1"){?>selected="selected"<? }?>>English</option>
		</select>
		<select id=up name="up" style="width:90px" class="sau_search">
				<option value="">是否置顶</option>
				<option value="1" <? if($_REQUEST['up']=="1"){?>selected="selected"<? }?>>已置顶</option>
				<option value="0" <? if($_REQUEST['up']=="0"){?>selected="selected"<? }?>>未置顶</option>
		</select>
		<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">标题</td><td width="15%">作者</td><td width="15%">所属类别</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><a href="<?php echo "/news/news.php?id={$record[$i]->id}";?>" target="_blank"><?php echo strip_tags($record[$i]->title);?></a></td>
			<td><?php echo $record[$i]->author;?></td>
			<td><a href="?category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF"><?php echo $category->find($record[$i]->category_id)->name;?></a></td>
			<td><?php echo $record[$i]->created_at;?></td>
			<td>
					<a href="news_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
					<?php 
						if(has_right('delete_news')){
					?>
					<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					<?php }?>
					<?php
						if(has_right('publish_news')){ 
							if($record[$i]->is_adopt=="1"){?>
					<span style="cursor:pointer" class="unpublish_news" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
					<?php	}else{?>
					<span style="cursor:pointer" class="publish_news" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
					<?php }
						}?>
					<?php
					if(has_right('top_news')){ 
					if($record[$i]->set_up=="1"){?>
					<span style="cursor:pointer" class="set_down" name="<?php echo $record[$i]->id;?>" title="取消置顶"><img src="/images/admin/btn_up.png" border="0"></span>
					<?php }else{?>
					<span style="cursor:pointer" class="set_up" name="<?php echo $record[$i]->id;?>" title="置顶"><img src="/images/admin/btn_unup.png" border="0"></span>
					<?php }
					}?>
					<a title="静态页面" href="<?php echo $static_site .static_news_url($record[$i]);?>" target="_blank"><img src="/images/admin/btn_static.png" border="0"></a>
					<?php if(has_right('comment_news')){?>
					<a href="/admin/comment/comment.php?id=<?php echo $record[$i]->id;?>&type=news" title="评论"><img src="/images/admin/btn_comment.png" border="0"></a>
					<?php }?>
					<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
				</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority style="display:none">清空优先级</button>
				<button id=edit_priority  style="display:none">编辑优先级</button>
				<input type="hidden" id="relation" value="news">
				<input type="hidden" id="db_table" value="<?php echo $tb_news;?>">
			</td>
		</tr>
  </table>
</div>	
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
			var category_id = $('.category_select:last').val();
			if(category_id <= 0){
				var count = $('.category_select').length;
				for(var i=count-1;i>=0;i--){
					if($('.category_select:eq(' + i +')').val() > 0 ){
						category_id = $('.category_select:eq(' + i +')').val();
						break;
					}
				}
			}
			$('#search_category').val(category_id);
			search_news();
		});
	});
</script>