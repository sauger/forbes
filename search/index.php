﻿<?php 
	include_once('../frame.php');

		$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','x_index','right_inc','rich');
	?>
</head>
<body>
	<div id=ibody>
		
		<?php include "../inc/top.inc.php";?>
		
		<div id=bread>
			
				<span></span>
				
		</div>
		
		<div id="hr_top"></div>
		
			<div id="left">
					<div id="c_top">
								<div id="c_left"></div>
								<div id="c_middle">
										<div id="chr_c">
												<div id="chr_c_left">点击按字母排序：</div>
												<div id="chr_c_right"><a href="#">A</a> <a href="#">B</a> <a href="#">C</a> <a href="#">D</a> <a href="#">E</a> <a href="#">F</a> <a href="#">G</a> <a href="#">H</a> <a href="#">I</a> <a href="#">J</a> <a href="#">K</a> <a href="#">L</a> <a href="#">M</a> <a href="#">N</a> <a href="#">O</a> <a href="#">P</a> <a href="#">Q</a> <a href="#">R</a> <a href="#">S</a> <a href="#">T</a> <a href="#">U</a> <a href="#">V</a> <a href="#">W</a> <a href="#">X</a> <a href="#">Y</a> <a href="#">Z</a></div>	
										</div>
										<div id="chr_sousuo">
												按照投资行业索引：  <select name="select" style="width:240px; border:1px solid #B4B4BE;"></select>
										<input type="button" name="str"  style="width:114px; height:37px; border:0px solid red; margin-left:60px; background:url(../images/search/button.gif) no-repeat;">
										</div>							
								
								</div>
								<div id="c_right"></div>
						</div>
					<div class=zh_left_c>
								<div class=zc_left>
									<img src="../images/search/1.jpg"></div>
								<div class="z_title">
									<div  class=name><strong>张默默</strong></div>
											
										<div class=com>
											<div  class=zh_left_co>北极光风险投资</div>
											<div  class=zh_left_of>合伙人</div>
											</div>
											<div class=zh_left_z>
											<div class=zh_left_i>投资方向</div> 
											<div  class=zh_left_in>生物医药 电子商务 制造</div>
											</div>
									<div  class=zh_left_ne>投资动态</div>
									<div class=zh_left_inv>曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握</div>
									<div class=zh_left_inv>曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握</div>
								</div>
					</div>
					<div class="c_hr"></div>
					<div id="page">
						<div id="up"></div>
						<div id="number"> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a></div>
						<div id="next"></div>
					</div>
					
					
					
			</div>
			
		
		<div id="right_inc">
		 	<?php include_right("ad");?>
			<?php include_right("favor");?>
			<?php include_right("four");?>
			<?php include_right("forum");?>
			<?php include_right("magazine");?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
		
	</div>
</body>
<html>