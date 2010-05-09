<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$db = get_db();
	$industry = $db->query("select * from fb_invest_industry");
	$count = $db->record_count;
	$type = $_GET['type'];
	$key = $_GET['key'];
	if(strlen($key)>1){
		redirect('/error.html');
		die();
	}
	if(strlen($type)>20){
		redirect('/error.html');
		die();
	}
	$sql = "select * from fb_investor where 1=1";
	if($key!=''){
		$sql .= " and chinese_name like '%$key%'";
	}
	if($type!=''){
		$sql .= " and invest_zone like '%$type%'";
	}
	$sql .= " order by chinese_name asc";
	$investor = $db->paginate($sql,6);
	$i_count = $db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>投资人检索_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public','right','search/investor');
		css_include_tag('public','search/investor','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread>投资人检索</div>
		<div id="bread_line"></div>
		<div id="left">
			<div id="c_top">
				<div id="c_left"></div>
				<div id="c_middle">
					<div id="chr_c">
						<div id="chr_c_left">点击按字母查询：</div>
						<div id="chr_c_right"><?php for($i='A';$i<'Z';$i++){?><a <?php if($key==$i)echo 'style="color:#94000B;"';?> href="/investor?key=<?php echo $i;?>"><?php echo $i;?></a><?php }?><a <?php if($key=='Z')echo 'style="color:#94000B;"';?> href="investor.php?key=Z">Z</a></div>	
					</div>
					<div id="chr_sousuo">
							按照投资行业索引：  <select id="industry" style="width:240px; border:1px solid #B4B4BE;"><option value=""></option><?php for($i=0;$i<$count;$i++){?><option <?php if($type==$industry[$i]->name){echo 'selected="selected"';}?> value="<?php echo $industry[$i]->name;?>"><?php echo $industry[$i]->name;?></option><?php }?></select>
					<input type="button" id="investor_search" style="width:114px; height:37px; border:0px solid red; margin-left:60px; background:url(../images/search/button.gif) no-repeat;">
					</div>							
				</div>
				<div id="c_right"></div>
			</div>
			<?php for($i=0;$i<$i_count;$i++){?>
			<div class=zh_left_c>
				<div class=zc_left>
					<a href="/investor/<?php echo $investor[$i]->id;?>"><img border=0 src="<?php echo $investor[$i]->image;?>"></a>
				</div>
				<div class="z_title">
					<div class=name><a href="/investor/<?php echo $investor[$i]->id;?>"><?php echo $investor[$i]->name;?></a></div>
							
						<div class=com>
							<div class=zh_left_co><?php echo $investor[$i]->company;?></div>
							<div class=zh_left_of><?php echo $investor[$i]->post;?></div>
							</div>
							<div class=zh_left_z>
							<div class=zh_left_i>投资方向</div> 
							<div class=zh_left_in><?php echo $investor[$i]->invest_zone;?></div>
							</div>
					<div class=zh_left_ne>投资动态</div>
					<?php
						$news = $db->query("select t1.title,t1.id,t1.created_at from fb_news t1 join fb_investor_news t2 on t1.id=t2.news_id where t2.investor_id={$investor[$i]->id} order by t1.created_at desc limit 2");
						$count = $db->record_count;
						for($j=0;$j<$count;$j++){
					?>
					<div class=zh_left_inv><a href="<?php echo static_news_url($news[$i]);?>"><?php echo $news[$j]->title?></a></div>
					<?php }?>
				</div>
			</div>
			<div class="c_hr"></div>
			<?php }?>
			<div id="page">
				<?php paginate();?>
			</div>
		</div>
		<input type="hidden" id="key" value="<?php echo $key;?>">	
		<div id="right_inc">
		 		<?php include_right("ad");?>
			<?php include_right("favor");?>
			<?php include_right("four");?>
			<?php include_right("forum");?>
			<?php include_right("magazine");?>
		</div>
		<?php include_bottom();?>
		
	</div>
</body>
</html>