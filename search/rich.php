<?php 
	require_once( '../frame.php');
	$db = get_db();
	
	$name = $_GET['name'];
	$year = intval($_GET['year']);
	$asset = intval($_GET['asset']);
	$nationality = $_GET['nationality'];
	$indust = $_GET['industry'];
	if(strlen($name)>20){
		$name = '';
	}
	if(strlen($year)>20){
		$year = '';
	}
	if(strlen($asset)>20){
		$asset = '';
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
				</span><br>
				<span class="div1">　国　籍</span>
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
				<span class="div3">行　业</span>
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
					$sql = "select f.r_fortune,f.name,f.birthday,f.country,group_concat(n.name) as cname,group_concat(n.id) as cid,group_concat(n.cname) as iname FROM v_rich_fortune f left join fb_rich_company m on f.id=m.rich_id left join v_company_industry n on m.company_id=n.id where 1=1";
					if($name){$sql .= " and f.name like '%$name%'";}
					if($nationality){$sql .= " and f.country = '$nationality'";}
					if($indust){$sql .= " and iname like '%$indust%'";}
					if($year){
						switch ($year){
							case 1:$sql .= " and f.birthday<'".date('Y')."' and f.birthday>'".(date('Y')-19)."'";break;
							case 2:$sql .= " and f.birthday<'".(date('Y')-20)."' and f.birthday>'".(date('Y')-29)."'";break;
							case 3:$sql .= " and f.birthday<'".(date('Y')-30)."' and f.birthday>'".(date('Y')-39)."'";break;
							case 4:$sql .= " and f.birthday<'".(date('Y')-40)."' and f.birthday>'".(date('Y')-49)."'";break;
							case 5:$sql .= " and f.birthday<'".(date('Y')-50)."' and f.birthday>'".(date('Y')-59)."'";break;
							case 6:$sql .= " and f.birthday<'".(date('Y')-60)."' and f.birthday>'".(date('Y')-79)."'";break;
							case 7:$sql .= " and f.birthday<'".(date('Y')-80)."' and f.birthday>'".(date('Y')-200)."'";break;
						}
					}
					if($asset){
					}
					$sql .=" group by f.name";
					alert($sql);
					$rich = $db->paginate($sql,20);
					$count = count($rich);
					for($i=0;$i<$count;$i++){
				?>
					<tr>
						<td valign="middle" width="5%"><img src="/images/search/icon.gif"></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->name;?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->rich_fortune;?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->country;?></td>
						<td valign="middle" width="10%"><?php $year = intval($rich[$i]->birthday);if(empty($year))echo "未知";else echo (date('Y')-$year).'岁';?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->cname;?></td>
						<td valign="middle" width="15%"><?php echo $rich[$i]->iname;?></td>
					</tr><?php }?>
				</table>
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
