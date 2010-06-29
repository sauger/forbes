<?php
	require_once('../../frame.php');
    $db = get_db();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG -党建新闻列表</title>
	<?php css_include_tag('subject_templete/templet1');
		use_jquery();
		js_include_once_tag('dj');
	?>
</head>
<body>
	<div id=bodys>			
		<? include('inc/djtop.inc.php');?>
		<div id=right>
			<?php 
				$modules = new fb_subject_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos2'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
			<div id="pos3">
				<?php 
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos3'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id="pos4">
				<?php 
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos4'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<?php 
				$modules = new fb_subject_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos5'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
			<div id="pos6">
				<?php 
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos6'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id="pos7">
				<?php 
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos7'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div class=bg>
				<?php 
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos8'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
				<form name="commentform" id="commentform" method="post" action="inc/comment.post.php">
				   <div id=content9>
					   用户：<input type="text" value="" id="commenter" name="post[nick_name]">   	
				   </div>
				   <div id=content10>
					  <div id=plleft>意见：</div><textarea id="commentcontent" name="post[comment]"></textarea>
				   </div>   
				   <div id=content11></div>
				   	<input type="hidden"  name="post[resource_type]" value="djnews">
					<input type="hidden"  name="subject_id" value="24">
				</form>
			</div>
		</div>
		<? include('inc/djbottom.inc.php');?>
	</div>

</body>
</html>

