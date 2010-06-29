<?php
	require_once('../../frame.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		$subject_id = intval($_REQUEST['id']);
		if($subject_id <=0){
			die('非法的专题id!');
		}
		$db = get_db();
		$subject = $db->query("select * from fb_subject where id=$subject_id");
		if($subject === false){
			die("非法的专题id!");			
		}
		$subject = $subject[0];
		$categories = $db->query("select * from fb_subject_category where subject_id={$subject->id} order by category_type");
		$cate_len = count($categories);
	?>
</head>
<body>
	<div><a href="#tab1" class="tab_a">新闻分类</a> <a href="#tab2" class="tab_a">视频分类</a> <a href="#tab3" class="tab_a">图片分类</a></div>
	<table width="795" border="0" id="tab1" class="tab_div">
		<tr class="tr1">
			<td colspan="8">　<a style="margin-right:50px" href="subject_category_edit.php?subject_id=<?php echo $subject_id;?>&type=news">添加新闻分类</a>
			</td>
		</tr>
		<tr class="tr2">
			<td>分类名称</td><td width="200">创建时间</td><td width="120">操作</td>
		</tr>
		<?php
			for($i=0;$i < $cate_len;$i++){
				if($categories[$i]->category_type=='news'){
		?>
				<tr class=tr3 id=<?php echo $categories[$i]->id;?> >
					<td><?php echo $categories[$i]->name;?></td>
					<td><?php echo $categories[$i]->created_at;?></td>
					<td>
						<a href="subject_category_edit.php?id=<?php echo $categories[$i]->id;?>">编辑</a>
						<a class="del" name="<?php echo $categories[$i]->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
					</td>
				</tr>
		<?php
			}
			}
			//--------------------
		?>
	</table>
	
	<table width="795" border="0" id="tab2" class="tab_div" style="display:none;">
		<tr class="tr1">
			<td colspan="8">　<a style="margin-right:50px" href="subject_category_edit.php?subject_id=<?php echo $subject_id;?>&type=video">添加视频分类</a>
			</td>
		</tr>
		<tr class="tr2">
			<td>分类名称</td><td width="200">创建时间</td><td width="120">操作</td>
		</tr>
		<?php
			for($i=0;$i < $cate_len;$i++){
				if($categories[$i]->category_type=='video'){
		?>
				<tr class=tr3 id=<?php echo $categories[$i]->id;?> >
					<td><?php echo $categories[$i]->name;?></td>
					<td><?php echo $categories[$i]->created_at;?></td>
					<td>
						<a href="subject_category_edit.php?id=<?php echo $categories[$i]->id;?>">编辑</a>
						<a class="del" name="<?php echo $categories[$i]->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
					</td>
				</tr>
		<?php
			}
			}
			//--------------------
		?>
	</table>
	<table width="795" border="0" id="tab3" class="tab_div" style="display:none;">
		<tr class="tr1">
			<td colspan="8">　<a style="margin-right:50px" href="subject_category_edit.php?subject_id=<?php echo $subject_id;?>&type=photo">添加图片分类</a>
			</td>
		</tr>
		<tr class="tr2">
			<td>分类名称</td><td width="200">创建时间</td><td width="120">操作</td>
		</tr>
		<?php
			for($i=0;$i < $cate_len;$i++){
				if($categories[$i]->category_type=='photo'){
		?>
				<tr class=tr3 id=<?php echo $categories[$i]->id;?> >
					<td><?php echo $categories[$i]->name;?></td>
					<td><?php echo $categories[$i]->created_at;?></td>
					<td>
						<a href="subject_category_edit.php?id=<?php echo $categories[$i]->id;?>">编辑</a>
						<a class="del" name="<?php echo $categories[$i]->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
					</td>
				</tr>
		<?php
			}
			}
			//--------------------
		?>
	</table>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
	<input type="hidden" id="db_talbe" value="fb_subject_category">
</body>
</html>
<script>
	$(function(){
		$('.tab_a').click(function(e){
			e.preventDefault();
			$('.tab_div').hide();
			$($(this).attr('href')).show();
		});
	});
</script>