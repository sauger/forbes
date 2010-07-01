<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
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
		
		function get_type($type){
			switch($type){
				case 'news':
					echo '新闻';break;
				case 'image':
					echo '图片';break;
				default:
					echo '未知';
			}
		}
	?>
</head>
<body>
	<div id=icaption>
		<div id=title>分类管理</div>
		<a href="index.php" id=btn_back></a>
		<a href="subject_category_edit.php?subject_id=<?php echo $subject_id;?>" id=btn_add></a>
	</div>
	<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="50%">分类名称</td><td width="20%">类型</td><td width="30%">操作</td>
		</tr>
		<?php
			!$categories && $categories = array();
			foreach($categories as $category){
		?>
				<tr class=tr3 id=<?php echo $category->id;?> >
					<td><?php echo $category->name;?></td>
					<td><?php get_type($category->category_type);?></td>
					<td>
						<a href="subject_category_edit.php?id=<?php echo $category->id;?>">编辑</a>
						<a class="del" name="<?php echo $category->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate();?>
				<input type="hidden" id="db_table" value="fb_subject_category">
			</td>
		</tr>
	</table>
	</div>
</body>
</html>
