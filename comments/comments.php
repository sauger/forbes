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
		css_include_tag('public','comments','right_inc');
	?>
</head>

<body>
	
	<div id=ibody>
		
		<?php include "../inc/top.inc.php";?>
		
		<div id=bread>
			
				<span>读者高见</span>
				
		</div>
		<div id="hr_top"></div>
	<div id="left">
		<div id="comments_top">
			<div id="title_pg_l"></div>
			<div id="title_pg">共有N条&nbsp;&nbsp;&nbsp;感言</div>
			<DIV ID="title_pg_r"></div>
		</div>
				
						
				<div id="c_join_a">
				<div class="join_top"><div class="title">XXXX</div><div class="time">2009-1-31&nbsp;&nbsp;19:25</div><div class="issues">评论：2009年12月刊</div><div class="title_people">《中国人》</div></div>
				<div class="content">
					<div class="content_lable">sdfsadfsaffffffffffffffffffffffffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是ffffffffffffffffwevfasvadsv</div>
				</div>
				</div>
				<div class="hr_dashed"></div>
				
				
				
				<div id="hr"></div>				
				<div class="c_join">
				<div class="join_top"><div class="title">XXXX</div><div class="time">2009-1-31&nbsp;&nbsp;19:25</div><div class="issues">评论：2009年12月刊</div><div class="title_people">《中国人》</div></div>
				<div class="content">
					<div class="content_lable">sdfsadfsaffffffffffffffffffffffffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是ffffffffffffffffwevfasvadsv</div>
				</div>
				</div>
				<div class="hr_dashed"></div>
				
				
				
				
				<div id="hr"></div>				
				<div class="c_join">
				<div class="join_top"><div class="title">XXXX</div><div class="time">2009-1-31&nbsp;&nbsp;19:25</div><div class="issues">评论：2009年12月刊</div><div class="title_people">《中国人》</div></div>
				<div class="content">
					<div class="content_lable">sdfsadfsaffffffffffffffffffffffffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是ffffffffffffffffwevfasvadsv</div>
				</div>
				</div>
				<div class="hr_dashed"></div>
				

				
				
				<div class="hr"></div>				
				<div class="c_join">
				<div class="join_top"><div class="title">XXXX</div><div class="time">2009-1-31&nbsp;&nbsp;19:25</div><div class="issues">评论：2009年12月刊</div><div class="title_people">《中国人》</div></div>
				<div class="content">
					<div class="content_lable">sdfsadfsafffffffffffwefsffffffffffffffffffffff能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞能否达拉斯你的发丝闹洞房阿桑能否达拉斯你的发丝闹洞房阿桑fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffffffffffffffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是fffff能否达拉斯你的发丝闹洞房阿桑挡风沙理发师地方是ffffffffffffffffwevfasvadsv</div>
				</div>
				</div>
				<div class="hr_dashed"></div>
				
				<div id="content_bottom">
					<div id="z_bottom">
					<div id="z_left">读者评论（共1条）</div><div id="z"><img src="../images/comments/comment.jpg"></div>
					<div id="z_right"><a href="#">查看所有评论</a></div>
					<div id="c_text">
						<div id="text">
						<textarea id="ta"></textarea>
					</div>
					
					<div id=" text_submit">
						<div id="s_radio"><input name="radio" type="radio" value="匿名"/></div>
						<div id="s_niming">匿&nbsp;&nbsp;名</div>
						<div id="submit">提&nbsp;&nbsp;交</div></div>
					
					</div>
				</div>
				
				</div>
				
				
				
				
				
				
				
				
				
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