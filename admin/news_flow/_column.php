<?php
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	
	$db = get_db();
	$c = array();
	$c[] = "publisher={$_SESSION['admin_user_id']}";
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%' or author like '%{$title}%' or content like '%{$title}%'");
	}
	if($category_id > 0){
		$cate_ids = implode(',',$category->children_map($category_id));
		array_push($c, "category_id in($cate_ids)");
	}
	$news = new table_class($tb_news);
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'created_at desc,category_id'),30);
?>
<div id=icaption>
    <div id=title>新闻管理</div>
	  <a href="news_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
		<span id="span_category"></span>
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
				<button class="submit">提交</button>
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
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