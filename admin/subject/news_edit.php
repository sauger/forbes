<?php
	require_once('../../frame.php');
	$role = judge_role();	
	$news = new table_class('smg_news');
	$subject_id = $_REQUEST['subject_id'];
	if($_GET['id']){
		$news = $news->find($_GET['id']);
		$item = new table_class('smg_subject_items');
		$item = $item->find($_REQUEST['item_id']);
	}	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG-编辑新闻</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("news_add");
	
	?>
</head>
<?php 
//initialize the categroy;
	$db = get_db();
	$category = $db->query("select * from smg_subject_category where subject_id=$subject_id and category_type='news'");
?>
<body style="background:#E1F0F7">
	<form id="news_add" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　编辑新闻</td>
		</tr>
		<tr class=tr3>
			<td width="130">标题</td><td width="695" align="left"><input type="text" name="news[title]" id="news_title" value="<?php echo $news->title;?>"></td>
		</tr>
		<tr class=tr3>
			<td width="130">短标题</td><td width="695" align="left"><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo $news->short_title;?>"><span id="max_len"></span></td>
		</tr>
		<tr class=tr3>
			<td>分　类</td>
			<td align="left" class="newsselect1" >
				<select id="sel_category" name="category_id">
					<option value=0>请选择</option>
					<?php
					for($i=0;$i < count($category);$i++){ ?>
					<option value="<?php echo $category[$i]->id;?>" <?php if($item->category_id == $category[$i]->id) echo 'selected="selected"';?>><?php echo $category[$i]->name;?></option>
					<?php }					
					?>
				</select>
			</td>
		</tr>
					
		<tr class=tr4 id=newsshow3 >
			<td>类别</td>
			<td align="left" id="td_newstype">
				<input type="radio" name="news[news_type]" value="1" checked="checked">默认
				<input type="radio" name="news[news_type]" value="2" <?php if($news->news_type==2){ ?>checked="checked"<?php } ?>>文件
				<input type="radio" name="news[news_type]" value="3" <?php if($news->news_type==3){ ?>checked="checked"<?php } ?>>URL
			</td>
		</tr>
		<tr class=tr4 id=newsshow3 >
			<td>关键词</td>
			<td align="left">
				<input type="text" size="20" name=news[keywords] id="news_keywords"  value="<?php echo $news->keywords;?>">(空格分隔)
			</td>
		</tr>	
		<tr class=tr4>
			<td>优先级</td>
			<td align="left">
				<input type="text" size="20" name=priority id="priority"  value="<?php echo $item->priority;?>">(0~100)
			</td>
		</tr>			
		<tr class=tr3 id=tr_file_name >
			<td>上传文件</td>
			<td align="left" id="tr_file_name">
				<input type="file" name=file_name id="file_name" value="<?php echo $news->file_name;?>">
				<?php
					if($news->news_type == 2 && $news->file_name){
						?>
						　<a href="<?php echo $news->file_name;?>" target="_blank" style="color:blue;">查看</a>
						<?php
					}
				?>
			</td>
		</tr>	
		
		<tr class=tr3 id=target_url>
			<td>URL</td><td align="left"><input type="text" size="50" name=news[target_url] value="<?php echo $news->target_url; ?>"></td>
		</tr>
				
		<tr id=newsshow3  class="normal_news tr4">
			<td>视频</td>
			<td align="left" id="td_video">			
				视频<input type="file" name="video_src" id="video_src">　	
				<?php 
				if($news->video_src){
						echo "<a href=\"{$news->video_src}\" target=\"_blank\">查看</a>";
					}
				?>
				缩略图<input type="file" name="video_pic" id="video_pic">　
				<?php					
					if($news->video_photo_src){
						echo "<a href=\"{$news->video_photo_src}\" target=\"_blank\">查看</a>";
					}
				?>
				<input type="checkbox" id="ch_low_quality" <?php if($news->low_quality) echo ' checked="checked"';?>>低清
				<input type="hidden" name="news[low_quality]" id="hidden_low_quality" value="<?php echo $news->low_quality?>">
			</td>
		</tr>
		
		<tr id=newsshow3  class="normal_news tr4">
			<td>其他选项</td>
			<td align="left">
				<input type="checkbox" name="news[forbbide_copy]" value="1" <?php if($news->forbbide_copy==1){?>checked="checked" <?php } ?>>禁止复制   				
				<input type="checkbox" id="check_box_commentable" <?php if($news->is_commentable) echo 'checked="checked"';?>>开启评论  
			</td>
		</tr>
		<tr id=newsshow1  class="normal_news tr3">
			<td height=100>简短描述</td><td><?php show_fckeditor('news[description]','Admin',true,"100",$news->description);?></td>
		</tr>
		<tr id=newsshow1 class="normal_news tr3">
			<td height=265>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',true,"265",$news->content);?></td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布新闻"></td>
		</tr>	
	</table>
		<input type="hidden" name="news[is_recommend]" id="hidden_is_recommend" value="<?php echo $news->is_recommed;?>">
		<input type="hidden" name="id" value="<?php echo $news->id;?>">
		<input type="hidden" name="news[is_commentable]" value="<?php echo $news->is_commentable;?>" id="hidden_is_commentable">
		<input type="hidden" name="item_id" value="<?php echo $_REQUEST['item_id'];?>">
		<input type="hidden" name="subject_id" value="<?php echo $subject_id;?>">
	</form>
</body>
</html>

<script>
	$(function(){
		$('#td_newstype input').click(function(){
			toggle_news_type();			
		});
		$('#image_flag_checkbox').click(function(){
			if($(this).attr('checked')){
				$('#hidden_image_flag').val('1');
			}else{
				$('#hidden_image_flag').val('0');
			}	
		});
		$('#forbbide_copy_checkbox').click(function(){
			if($(this).attr('checked')){
				$('#hidden_forbbide_copy').val('1');
			}else{
				$('#hidden_forbbide_copy').val('0');
			}		
		});
		$('#check_box_commentable').click(function(){
			if($(this).attr('checked')){
				$('#hidden_is_commentable').val(1);
			}else{
				$('#hidden_is_commentable').val(0);
			}
			
		});
		$('#ch_low_quality').change(function(){
			if($(this).attr('checked')){
				$('#hidden_low_quality').val(1);
			}else{
				$('#hidden_low_quality').val(0);
			}
		});
		
		$('#news_add').submit(function(){
			var video_array = new Array('flv','wmv','wav','mp3','mp4','avi','rm');
			var pic_array = new Array('jpg','png','bmp','gif','icon');
			if($('#video_src').val() != ''){
				var video_src = $('#video_src').val().replace(/.+\./,'');
				video_src = video_src.toLowerCase();
				if(jQuery.inArray(video_src,video_array) == -1){
					alert('视频格式不支持,请转换格式后再上传!可上传格式:' + video_array.join('|'));
					return false;
				}
			}
			if($('#video_pic').val() != ''){
				var video_pic = $('#video_pic').val().replace(/.+\./,'');
				video_pic = video_pic.toLowerCase();
				if(jQuery.inArray(video_pic,pic_array) == -1){
					alert('图片格式不支持,请转换格式后再上传!可上传格式:' + pic_array.join('|'));
					return false;
				}
			}
			
			var title= $('#news_title').val();
			if(title==""){
				alert("请输入标题！");
				return false;
			}	
			
			var short_title= $('#news_short_title').val();
			if($('#news_keywords').val()==''){
				alert("请输入关键字!");
				return false;
			}
			if(short_title==""){
				alert("请输入短标题！");
				return false;
			}
			if(news_type == 1){
				var oEditor = FCKeditorAPI.GetInstance('news[content]') ;
				var title = oEditor.GetHTML();
				if(news_type==1&&title==""){
					alert("请输入新闻内容！");
					return false;
				}
			}
			
			priority = $('#priority').attr('value');
			if(priority == '') priority = 100;
			
			$('#priority').attr('value', priority);	
			if($('#sel_category').val()==0){
				alert('请选择分类!');
				return false;
			}
			news_type=  $('#td_newstype').find('input:checked').attr('value');
			if(news_type == 3){
				if($('#target_url input').attr('value')== ''){
					alert('请输入新闻目标地址!');
					return false;
				}
			}else if(news_type==2 && $('#file_name').next('a').length <= 0 && $('#file_name').val() == ''){
				alert('请选择上传的文件!');
				return false;
			}
	
			if($('#video_src').attr('value') != '' && $('#video_pic').attr('value') == ''){
				alert('请选择视频图片!');
				return false;
			}
				
			return true;
		});	
		toggle_news_type();	
	});
	function toggle_news_type(){
		news_type=  $('#td_newstype').find('input:checked').attr('value');
		if (news_type == 1){
			$('.normal_news').show();
			$('#target_url').hide();
			$('#tr_file_name').hide();
		}else if(news_type == 2){
			$('.normal_news').hide();
			$('#target_url').hide();
			$('#tr_file_name').show();
		}else if(news_type == 3){
			$('.normal_news').hide();
			$('#target_url').show();
			$('#tr_file_name').hide();
		}
	}	
</script>