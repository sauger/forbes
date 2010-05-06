<?php
	session_start();
  include_once('../../frame.php');
	judge_role();
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		$list_id = intval($_REQUEST['list_id']);
		if (!$list_id) {
			alert('invalid request');
			redirect('file_list_list.php');
			die();
		}
		$id = intval($_REQUEST['id']);
		$news = new table_class('fb_file_list_items');
		if($id){
			$news = $news->find($id);
		}
		$news->list_id = $list_id;
		judge_role();
		css_include_tag('admin','colorbox','autocomplete');
		use_jquery();
		validate_form("news_edit");
		js_include_tag('category_class.js', 'admin/news_pub', 'admin/list/file_list_item_edit.js','jquery.colorbox-min.js','jquery-ui-1.7.2.custom.min.js','../ckeditor/ckeditor.js','autocomplete.jquery','pubfun');
	?>
</head>
<body>
<?php
	$category = new category_class('file_list');
	$category->echo_jsdata();
	if($id){
		$category_id = $news->category_id;
	}else{
		$category_id = -1;
	}
	if(empty($category_id)){
		$category_id = -1;
	}
?>
<div id=icaption>
    <div id=title>发布新闻榜单</div>
	  <a href="<?php echo "file_list_items_list.php?id={$list_id}";?>" id=btn_back></a>
</div>
<div id=itable>
	<form id="news_edit" enctype="multipart/form-data" action="file_list_item_edit.post.php" method="post"> 
	<table cellspacing=1 border="0">
		<tr class=tr4>
			<td  class=td1>标题</td>
			<td  align="left">
				<input type="text" style="width:400px" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>">
			</td>
		</tr>

		<tr class=tr4>
			<td  class=td1>短标题</td>
			<td align="left">
				<input type="text" style="width:400px" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input>
			</td>
		</tr>
		
		<tr class=tr4>
			<td  class=td1>wap标题</td>
			<td align="left">
				<input type="text" style="width:400px" name="news[wap_title]" id="news_wap_title" value="<?php echo strip_tags($news->wap_title);?>"></input>
			</td>
		</tr>		

		<tr class=tr4>
			<td class=td1>分　类</td>
			<td align="left" class="newsselect1" >
				<span id="span_category"></span>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>作者名</td>
			<td><input type="text" name="news[author]" id="news_short_title" value="<?php echo strip_tags($news->author ? $news->author : $_SESSION['admin_nick_name']);?>"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>关键词</td>
			<td align="left">
				<input type="text" style="width:400px" name=news[keywords]  id="news_keywords"  value="<?php echo $news->keywords;?>">(空格分隔) 
			</td>
		</tr>

		<tr class=tr4 style="display:none">
			<td class=td1>优先级</td>
			<td align="left">
				<input type="text" style="width:400px" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>上传PDF版</td>
			<td align="left">
				<input type="file" name="pdf_src" id="pdf_src">
				<?php if($news->pdf_src){?>
				<a href="<?php echo $news->pdf_src?>" target="_blank">下载</a> <a href="#" id="a_delete_pdf">删除</a>
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>上传封面图片</td>
			<td align="left">
				<input type="file" name="news_pic">
				<?php if($news->video_photo_src){?>
				<a href="<?php echo $news->video_photo_src?>" target="_blank">查看</a> <a href="#" id="a_delete_pic">删除</a>
				<?php }?>
				<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
			</td>
		</tr>		
		<tr class="tr4">
			<td class=td1>放置广告</td>
			<td align="left">
				<input type="checkbox" id="news_ad_id" <?php if($news->ad_id == 1) echo "checked='checked'";?>><label for="news_ad_id">放置广告</label><input type="hidden" id="input_news_ad_id" name="news[ad_id]" value="<?php echo $news->ad_id;?>"></input>
			</td>
		</tr>

		<tr class="tr4">
			<td class=td1>禁止复制</td>
			<td align="left">
				<input type="checkbox" id="news_forbbide_copy" <?php if($news->forbbide_copy == 1) echo "checked='checked'";?>></input><label for="news_forbbide_copy">禁止复制</label><input type="hidden" id="input_news_forbbide_copy"  name="news[forbbide_copy]" value="<?php echo $news->forbbide_copy;?>"></input>
			</td>
		</tr>

		<tr id=newsshow1  class="normal_news tr4">
			<td  class=td1  height=100>英文来源</td><td><?php show_fckeditor('news[top_info]','Admin',false,"80",$news->top_info);?></td>
		</tr>
		<tr id=newsshow1  class="normal_news tr4">
			<td  class=td1  height=100>简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"80",$news->description);?></td>
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td  class=td1 height=215>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布新闻"></td>
		</tr>	
	</table>
		<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
		<input type="hidden" name="news[image_flag]" value="<?php echo $news->image_flag;?>" id="hidden_image_flag">
		<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
		<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $news->related_news ? $news->related_news : "";?>"></input>
		<input type="hidden" name="news[sub_headline]" id="hidden_sub_headline" value="<?php echo $news->sub_headline ? $news->sub_headline : "";?>"></input>
		<input type="hidden" name="news[list_id]" value="<?php echo $news->list_id;?>"></input>
	</form>
</div>
<script>
$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		category.display_select('category_select_copy',$('#span_category_copy'),<?php echo $category_id;?>,'', function(id){			
		});
	});	

</script>
</body>
</html>