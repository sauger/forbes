<?php
	require_once('../../frame.php');
    $db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>专题模板2</title>
	<?php
		css_include_tag('subject_templete/templet2');
	?>
</head>
<body>
	<div id=bodys>
		<?php include('top.inc.php');?>
		<div id=top>
			<div id=left>
				<?php 
					include_once("../../admin/subject/subject_module_class.php");
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_tl'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id=center>
				<?php
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_tc'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id=right>
				<?php
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_tr'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
		</div>
		
		<div id=middle>
			<?php
				$modules = new fb_subject_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_m'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
		</div>
		
		<div id=bottom>
			<div class=title></div>
			<div id=bleft>
				<?php
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_bl'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id=bright>
				<?php
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub2_br'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
		</div>
		<? //include('inc/djbottom.inc.php');?>
	</div>
</body>
</html>