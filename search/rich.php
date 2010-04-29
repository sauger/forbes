<?php 
	include_once( '../frame.php');
	$db = get_db();
	
	$name = $_GET['name'];
	$year = intval($_GET['year']);
	$asset = intval($_GET['asset']);
	$nationality = $_GET['nationality'];
	$indust = $_GET['industry'];
	if(strlen($name)>20){
		$name = '';
	}
	if(strlen($nationality)>20){
		$nationality = '';
	}
	if($indust>40){
		$indust = '';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-富豪检索</title>
	<?php
		use_jquery();
		js_include_tag('public','right','search/rich');
		css_include_tag('public','right_inc','search/rich');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		 <div id=bread><span>富豪检索</span></div>
	 	 <div id=bread_line></div>
		<div id="left">
			<div id="left_top">
				<span class="div1">富豪姓名</span>
				<span class="div2"><input id="name" value="<?php echo $name;?>" type="text"></span>
				<span class="div3">年龄段</span>
				<span class="div2">
					<select id="year">
						<option value=""></option>
						<option value="1">20岁以下</option>
						<option value="2">20-30岁</option>
						<option value="3">30-40岁</option>
						<option value="4">40-50岁</option>
						<option value="5">50-60岁</option>
						<option value="6">60-80岁</option>
						<option value="7">80岁以上</option>
					</select>
				</span>
				<span class="div1">资产规模</span>
				<span class="div2">
					<select id="asset">
						<option value=""></option>
						<option value="1">5000万人民币以下</option>
						<option value="2">0.5-1亿人民币</option>
						<option value="3">1-10亿人民币</option>
						<option value="4">10-50亿人民币</option>
						<option value="5">50-100亿人民币</option>
						<option value="6">100亿人民币以上</option>
					</select>
				</span>
				<span class="div3">国　籍</span>
				<span class="div2">
					<select id="nationality">
						<option value=""></option>
						<?php 
							$country = $db->query("select country from fb_rich group by country");
							$count = $db->record_count;
							for($i=0;$i<$count;$i++){
						?>
						<option value="<?php echo $country[$i]->country;?>"><?php echo $country[$i]->country;?></option>
						<?php }?>
					</select></span>
				<span class="div1">行　　业</span>
				<span class="div2">
					<select id="industry">
						<option value=""></option>
						<?php 
							$industry = $db->query("select * from fb_industry");
							$count = $db->record_count;
							for($i=0;$i<$count;$i++){
						?>
						<option value="<?php echo $industry[$i]->name;?>"><?php echo $industry[$i]->name;?></option>
						<?php }?>
					</select>
				</span>
				<button id="search"></button>
				<script>
					$(function(){
						$("#year").val("<?php echo $year;?>");
						$("#asset").val("<?php echo $asset;?>");
						$("#nationality").val("<?php echo $nationality;?>");
						$("#industry").val("<?php echo $indust;?>");
					});
				</script>
			</div>
			<div id="info">搜索结果如下</div>
			<div id="result">
				<table width="600" border="0" cellspacing="0" cellpadding="0">
				<?php
					$sql = "SELECT r1.country,r1.name,r1.birthday,group_concat(i2.name) as iname,r2.fortune,group_concat(c2.name) as cname  FROM fb_rich r1  left join fb_rich_company c1 on r1.id=c1.rich_id left join fb_company c2 on c1.company_id=c2.id left join fb_company_industry i1 on c2.id=i1.company_id left join fb_industry i2 on i1.industry_id=i2.id left join fb_rich_fortune r2 on r1.id=r2.rich_id where (r2.fortune_year is null or r2.fortune_year=".date('Y').")";
					if($name){$sql .= " and r1.name like '%$name%'";}
					if($nationality){$sql .= " and r1.country = '$nationality'";}
					if($indust){$sql .= " and i2.name like '%$indust%'";}
					if($year){
						switch ($year){
							case 1:$sql .= " and r1.birthday<'".date('Y')."' and r1.birthday>'".(date('Y')-19)."'";break;
							case 2:$sql .= " and r1.birthday<'".(date('Y')-20)."' and r1.birthday>'".(date('Y')-29)."'";break;
							case 3:$sql .= " and r1.birthday<'".(date('Y')-30)."' and r1.birthday>'".(date('Y')-39)."'";break;
							case 4:$sql .= " and r1.birthday<'".(date('Y')-40)."' and r1.birthday>'".(date('Y')-49)."'";break;
							case 5:$sql .= " and r1.birthday<'".(date('Y')-50)."' and r1.birthday>'".(date('Y')-59)."'";break;
							case 6:$sql .= " and r1.birthday<'".(date('Y')-60)."' and r1.birthday>'".(date('Y')-79)."'";break;
							case 7:$sql .= " and r1.birthday<'".(date('Y')-80)."' and r1.birthday>'".(date('Y')-200)."'";break;
						}
					}
					if($asset){
						switch ($asset){
							case 1:$sql .=" and r2.fortune<0.5";
							case 2:$sql .=" and r2.fortune<=1 and r2.fortune>0.5";
							case 3:$sql .=" and r2.fortune<=10 and r2.fortune>1";
							case 4:$sql .=" and r2.fortune<=50 and r2.fortune>10";
							case 5:$sql .=" and r2.fortune<=100 and r2.fortune>50";
							case 6:$sql .=" and r2.fortune>100";
						}
					}
					$sql .=" group by r1.id";
					$rich = $db->paginate($sql,25);
					$count = count($rich);
					for($i=0;$i<$count;$i++){
				?>
					<tr>
						<td valign="middle" width="5%"><img src="/images/search/icon.gif"></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->name;?></td>
						<td valign="middle" width="15%"><?php if($rich[$i]->fortune!='')echo $rich[$i]->fortune.'亿人民币';else echo '未知';?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->country;?></td>
						<td valign="middle" width="10%"><?php $year = intval($rich[$i]->birthday);if(empty($year))echo "未知";else echo (date('Y')-$year).'岁';?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->cname;?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->iname;?></td>
					</tr><?php }?>
				</table>
				<div class="paginate"><?php paginate()?></div>
			</div>
		</div>
		<div id="right_inc">
			<?php include "../right/ad.php";?>
			<?php include "../right/favor.php";?>
			<?php include "../right/four.php";?>
			<?php include "../right/forum.php";?>
			<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
</html>
