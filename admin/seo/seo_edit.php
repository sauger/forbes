<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	if($id!='')	{
		$video = new table_class('fb_seo');
		$video->find($id);
		$category_id = $video->category_id;
	}else{
		$category_id = -1;
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('category_class.js');
	?>
</head>
<body>
<div id=icaption>
    <div id=title><?php if($id){echo "修改SEO";}else{echo "添加SEO";}?></div>
	  <a href="video_list.php" id=btn_back></a>
</div>
	<form id="picture_edit" enctype="multipart/form-data" action="video.post.php" method="post"> 
		<div id=itable>
			<table cellspacing="1" align="center">
				<tr class=tr4 align="center">
					<td class=td1 width=15%>标　题</td><td align="left"><input id="title" type="text" name="video[title]" value="<?php echo $video->title;?>"></td>
				</tr>
				<tr class=tr4 align="center">
					<td class=td1>优先级</td><td align="left"><input type="text" size="10" id="priority" name="video[priority]" value="<?php if($video->priority!=100){echo $video->priority;}?>">(1-100)</td>
				</tr>
				<tr class=tr4 align="center">
					<td class=td1>关键词</td><td align="left"><input type="text" size="50" name="video[keywords]" value="<?php echo $video->keywords;?>">(请用空格或者","分隔开关键词,比如:高考 升学)</td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>分　类</td>
					<td align="left">
					<span id="span_category"></span>
					</td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>在线视频</td><td align="left"><input type="text" size="50" name="video[online_url]" value="<?php echo $video->online_url;?>" id="online">（如果本地上传视频此项请留空！）</td>
				</tr>
				<tr align="center" class=tr4 id=newsshow3 >
					<td class=td1>选择图片</td><td align="left"><input type="hidden" name="MAX_FILE_SIZE" value="2097152"><input name="image" id="image" type="file" >(请上传小于2M的图片，格式支持jpg、gif、png))<?php if($video->photo_url!=''){?><a style="color:#0000FF" href="<?php echo $video->photo_url;?>" target="_blank">点击查看图片</a><?php } ?></td>
				</tr>
				<tr align="center" class=tr4 id=newsshow3 >
					<td class=td1>选择视频</td><td align="left"><input type="hidden" name="MAX_FILE_SIZE" value="5000000000"><input name="video" id="video" type="file" >(请上传视频，并且不要大于500M，格式支持flv,wma,wav,mp3,mp4,avi,rm)<?php if($video->video_url!=''){?><a style="color:#0000FF"  href="<?php echo $video->video_url;?>" target="_blank">点击下载</a><?php } ?></td>
				</tr>
				<tr class=btools>
					<td colspan="10" align="center"><input id="submit" type="submit" value="发布视频"></td>
				</tr>	
			</table>
			<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
		</div>
	</form>
</body>
</html>
