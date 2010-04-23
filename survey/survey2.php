<?php 
	require_once('../frame.php');

		$db = get_db();
		$id = intval($_GET['id']);
		if($id==0)
		{
				$id=1;	
		}
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
		css_include_tag('public','survey','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		
		<?php include "../inc/top.inc.php";?>
		
		<div id=bread>
			
				<span>关于我们</span>
				
		</div>

		<div id="hr_top"></div>
		<div id="questions2_div">
						
						<div class="survey2_z">
									<div class="s2_top">
											<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
											<div class="s2_title">首付款撒旦法沙发ius生地方eif啊是的烦恼</div>
									</div>
									<div class="s2_content">
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊生地方啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊生地方发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生生地方地方那是哦发啊</div>
											</div>
									</div>
						</div>
						<div class="survey2_z">
									<div class="s2_top">
											<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
											<div class="s2_title">首付款撒旦法沙发iu生地方seif啊是的烦恼</div>
									</div>
									<div class="s2_content">
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 生地方啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊生地方啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
									</div>
						</div>
						<div class="survey2_z">
									<div class="s2_top">
											<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
											<div class="s2_title">首付款撒旦法沙发iuseif生地方啊是的烦恼</div>
									</div>
									<div class="s2_content">
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊生地方 啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊生地方 啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生生地方地方那是哦发啊</div>
											</div>
									</div>
						</div>
						<div class="survey2_z">
									<div class="s2_top">
											<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
											<div class="s2_title">首付款撒旦法沙发iuse生地方if啊是的烦恼</div>
									</div>
									<div class="s2_content">
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈生地方啊 啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生生地方地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 生地方啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
									</div>
						</div>
						<div class="survey2_z">
									<div class="s2_top">
											<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
											<div class="s2_title">首付款撒旦法沙发iu生地方seif啊是的烦恼</div>
									</div>
									<div class="s2_content">
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊生地方 啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 啊啊发生地方生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊 生地方啊啊发生地方那是哦发啊</div>
											</div>
											<div class="s2_c">
													<div class="s2_c_radio"><input type="radio" ></div>
													<div class="s2_c_content">哈哈啊撒旦法发生地方那是哦发啊</div>
											</div>
									</div>
						</div>
						<div id="s2_submit"><input type="button" style="border:0 solid red; width:63px; height:24px;  background:url(../images/survey/right_b_b_btn.jpg);" value="提交"></div>
						
						
		</div>
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<?php include "../right/favor.php";?>
		 		<?php include "../right/four.php";?>
		 		<?php include "../right/rich.php";?>
		 		<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
		
	</div>
</body>
<html>