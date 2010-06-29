<?php
	require_once('../../frame.php');
    $db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>专题模板3</title>
	<?php
		css_include_tag('subject_templete/templet3');
	?>
</head>
<body>
	<div style="width:987px; height:800px; margin:0 auto;">
	<div id="ibody">
		<div id="top_title"></div>
		<div id="menu">
			<div id="menu_box">
				<div class="cl" style='border:0px;'><a target="_blank" href="djnews.php">首页首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
				<div class="cl"><a target="_blank" href="djnews.php">首页</a></div>
			</div>
		</div>
		<div id="top">
			<div id="left">
				<div id="box_box">
					<?php 
						include_once("../../admin/subject/subject_module_class.php");
						$modules = new fb_subject_module_class();
						$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub3_tl'",'order' => "priority asc,id desc"));
						for($i=0;$i<count($modules);$i++)
						$modules[$i]->display();
					?>
				</div>
			</div>
			<div id="center">
				<?php 
						include_once("../../admin/subject/subject_module_class.php");
						$modules = new fb_subject_module_class();
						$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub3_tc'",'order' => "priority asc,id desc"));
						for($i=0;$i<count($modules);$i++)
						$modules[$i]->display();
					?>
			</div>
			<div id="right">
				<?php 
					include_once("../../admin/subject/subject_module_class.php");
					$modules = new fb_subject_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='sub3_tr'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
		</div>
		
		<div id="middle">
			<div id="m_title"></div>
			<div id="left">
				<div id="top"></div>
				<div id="bottom">
					<div id="left"></div>
					<div id="right"></div>
				</div>
			</div>
			<div id="right"></div>
		</div>
		
		<div id="bottom">
			<div id="b_title"></div>
			<div id="b_box">
				<div id="left"></div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>