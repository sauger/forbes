<?php
	include_once( dirname(__FILE__) .'/../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
	$yh_xx = $db->query("select id from fb_yh_xx where yh_id=$uid");
	$user = new table_class('fb_yh_xx');
	$user->find($yh_xx[0]->id);
	$user2 = new table_class('fb_yh');
	$user2->find($uid);
	if(isset($_COOKIE['name'])){
		$uname = $_COOKIE['name'];
	}else{
		$uname = $_COOKIE['login_name'];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min.js','user/user2');
		css_include_tag('complete_info','public','colorbox');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>

	<div id=register>
		<div class="title">
			<div class="title_left">新用户注册</div>
			<div class="title_right">
				<div class="content">注册流程</div>
				<div class="content">Step1: 填写个人基本信息</div>
				<div class="arrow"></div>
				<div class="content">Step2: 接收验证mail</div>
				<div class="arrow"></div>
				<div class="content1">Step3: 完善个人资料</div>
				<div class="arrow1"></div>
				<div class="content">注册成功</div>
			</div>
		</div>
		<div id="info">
			<div id="content">
				<div id="content_left">
					<div class="context">我的收藏</div>
					<div class="context">订阅信息</div>
					<div class="context select">个人信息</div>
					<div class="context" style="margin-bottom:0px;">修改密码</div>
				</div>
				<div id="content_right">
					<span id="order_desc">您已成功注册会员，现在完善您的个人信息后，您就可以获得《福布斯》中文杂志一期，我们会根据您填写的个人真实信息送至您手上</span>
					<form action="complete_info.post.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td align="right">姓　　名：</td>
							<td colspan="3"><input class="txt1" type="text" maxlength=20 value="<?php echo htmlspecialchars($user->xm);?>" name="post[xm]"/></td>
						</tr>
						<tr>
							<td width="120" align="right">性　　别：</td>
							<td width="200">
								<div class="radio_div"><input value='男' name="post[xb]" <?php if($user->xb=='男')echo 'checked="checked"'?> id="gender1" type="radio"><label for="gender1">男</label></div>
								<div class="radio_div"><input value='女' name="post[xb]" <?php if($user->xb=='女')echo 'checked="checked"'?> id="gender2" type="radio"><label for="gender2">女</label></div></td>
							<td width="100" align="right">学　　历：</td>
							<td><SELECT  class=sel1 name="post[xl]">
									<option value=""></option>
									<OPTION <?php if($user->xl=="1.博士"){?>selected="selected"<?php }?> value=1.博士>1.博士</OPTION> 
									<OPTION <?php if($user->xl=="2.硕士"){?>selected="selected"<?php }?> value=2.硕士>2.硕士</OPTION> 
									<OPTION <?php if($user->xl=="3.大学本科 大学专科"){?>selected="selected"<?php }?> value="3.大学本科 大学专科">3.大学本科/大学专科</OPTION> 
									<OPTION <?php if($user->xl=="4.高中 中专"){?>selected="selected"<?php }?> value="4.高中 中专">4.高中/中专</OPTION> 
									<OPTION <?php if($user->xl=="5.其他"){?>selected="selected"<?php }?> value=5.其他>5.其他</OPTION>
								</SELECT></td>
						</tr>
						<tr>
							<td align="right">工作单位：</td>
							<td colspan="3"><input class="txt2" maxlength="30" value="<?php echo htmlspecialchars($user->gzdw);?>" name="post[gzdw]" type="text"></td>
						</tr>
						<tr>
							<td align="right">所在部门：</td>
							<td colspan="3"><input class="txt2" maxlength="20" value="<?php echo htmlspecialchars($user->szbm);?>" name="post[szbm]" type="text"></td>
						</tr>
						<tr>
							<td align="right">公司性质：</td>
							<td><select name="post[gsxz]" class=sel2>
									<option value=""></option>
									<option <?php if($user->gsxz=="1.国有/国有控股企业"){?>selected="selected"<?php }?> value="1.国有/国有控股企业">1.国有/国有控股企业</option>
									<option <?php if($user->gsxz=="2.事业单位"){?>selected="selected"<?php }?> value="2.事业单位">2.事业单位</option>
									<option <?php if($user->gsxz=="3.民营企业"){?>selected="selected"<?php }?> value="3.民营企业">3.民营企业</option>
									<option <?php if($user->gsxz=="4.外商独资企业"){?>selected="selected"<?php }?> value="4.外商独资企业">4.外商独资企业</option>
									<option <?php if($user->gsxz=="5.中外合资/合作企业"){?>selected="selected"<?php }?> value="5.中外合资/合作企业">5.中外合资/合作企业</option>
									<option <?php if($user->gsxz=="6.其他（请说明）"){?>selected="selected"<?php }?> value="6.其他（请说明）">6.其他（请说明）</option>
								</select></td>
							<td align="right">员工规模：</td>
							<td><select name="post[gsgm]" class=sel3>
									<option value=""></option>
									<OPTION <?php if($user->gsgm=="1.100人以下"){?>selected="selected"<?php }?> value=1.100人以下>1.100人以下</OPTION> 
									<OPTION <?php if($user->gsgm=="2.101 - 250"){?>selected="selected"<?php }?> value="2.101 - 250">2.101 - 250</OPTION> 
							    	<OPTION <?php if($user->gsgm=="251 - 500"){?>selected="selected"<?php }?> value="3.251 - 500">3.251 - 500</OPTION> 
									<OPTION <?php if($user->gsgm=="501 - 1000"){?>selected="selected"<?php }?> value="4.501 - 1000">4.501 - 1,000</OPTION> 
									<OPTION <?php if($user->gsgm=="1001 - 5000"){?>selected="selected"<?php }?> value="5.1001 - 5000">5.1001 - 5,000</OPTION> 
									<OPTION <?php if($user->gsgm=="5001 - 10000"){?>selected="selected"<?php }?> value="6.5001 - 10000">6.5,001 - 10,000</OPTION> 
									<OPTION <?php if($user->gsgm=="10000以上"){?>selected="selected"<?php }?> value=7.10000以上>7.10,000以上</OPTION>
								</select></td>
						</tr>
						<tr>
							<td align="right">上市公司：</td>
							<td><select name="post[sfss]" class=sel2>
									<option value=""></option>
									<OPTION <?php if($user->sfss=="1"){?>selected="selected"<?php }?> value=1>1.是</OPTION>
									<OPTION <?php if($user->sfss=="0"){?>selected="selected"<?php }?> value=0>2.否</OPTIN>
								</select></td>
							<td align="right">制造的产品：</td>
							<td><select name="post[gscp]" class=sel2>
									<option value=""></option>
									<OPTION <?php if($user->gscp=="1.电脑 电脑配件及外设"){?>selected="selected"<?php }?> value="1.电脑 电脑配件及外设">1.电脑、电脑配件及外设</OPTION> 
							        <OPTION <?php if($user->gscp=="2.电子元器件 电阻 电容 半导体等零部件"){?>selected="selected"<?php }?> value="2.电子元器件 电阻 电容 半导体等零部件 ">2.电子元器件（电阻、电容、半导体等零部件）</OPTION> 
							        <OPTION <?php if($user->gscp=="3.电子消费类产品"){?>selected="selected"<?php }?> value=3.电子消费类产品>3.电子消费类产品</OPTION> 
									<OPTION <?php if($user->gscp=="4.通讯 电力 网络等硬件设备"){?>selected="selected"<?php }?> value="4.通讯 电力 网络等硬件设备">4.通讯、电力、网络等硬件设备</OPTION> 
									<OPTION <?php if($user->gscp=="5.汽车及汽车用品"){?>selected="selected"<?php }?> value=5.汽车及汽车用品>5.汽车及汽车用品</OPTION> 
									<OPTION <?php if($user->gscp=="6.工业机械设备"){?>selected="selected"<?php }?> value=6.工业机械设备>6.工业机械设备</OPTION> 
									<OPTION <?php if($user->gscp=="7.建筑及家居装饰材料"){?>selected="selected"<?php }?> value=7.建筑及家居装饰材料>7.建筑及家居装饰材料</OPTION> 
									<OPTION <?php if($user->gscp=="8.纸业 包装印刷及包装印刷器材"){?>selected="selected"<?php }?> value="8.纸业 包装印刷及包装印刷器材">8.纸业、包装印刷及包装印刷器材</OPTION> 
									<OPTION <?php if($user->gscp=="9.五金制品"){?>selected="selected"<?php }?> value=9.五金制品>9.五金制品</OPTION> 
									<OPTION <?php if($user->gscp=="10.食品 食品加工及饲料"){?>selected="selected"<?php }?> value="10.食品 食品加工及饲料">10.食品、食品加工及饲料</OPTION> 
									<OPTION <?php if($user->gscp=="11.化工产品"){?>selected="selected"<?php }?> value=11.化工产品>11.化工产品</OPTION> 
									<OPTION <?php if($user->gscp=="12.日用化工 化妆品 香料 肥皂类及其它)"){?>selected="selected"<?php }?> value="12.日用化工 化妆品 香料 肥皂类及其它)">12.日用化工(化妆品、香料、肥皂类及其它)</OPTION> 
									<OPTION <?php if($user->gscp=="13.生物工程 药品及医疗器械"){?>selected="selected"<?php }?> value="13.生物工程 药品及医疗器械">13.生物工程、药品及医疗器械</OPTION> 
									<OPTION <?php if($user->gscp=="14.服装及饰品 纺织 皮革"){?>selected="selected"<?php }?> value="14.服装及饰品 纺织 皮革">14.服装及饰品、纺织、皮革</OPTION> 
									<OPTION <?php if($user->gscp=="15.钟表 相机及精密仪表"){?>selected="selected"<?php }?> value="15.钟表 相机及精密仪表">15.钟表、相机及精密仪表</OPTION> 
									<OPTION <?php if($user->gscp=="16.礼品 玩具 珠宝及文教体育用品"){?>selected="selected"<?php }?> value="16.礼品 玩具 珠宝及文教体育用品">16.礼品、玩具、珠宝及文教体育用品</OPTION> 
									<OPTION <?php if($user->gscp=="17.其他"){?>selected="selected"<?php }?> value=17.其他>17.其他</OPTION>
								</select></td>
						</tr>
						<tr>
							<td align="right">年营业额：</td>
							<td><select name="post[gsyye]" class=sel2>
									<option value=""></option>
									<OPTION <?php if($user->gsyye=="1.500万以下"){?>selected="selected"<?php }?> value=1.500万以下>1.500万以下</OPTION> 
									<OPTION <?php if($user->gsyye=="2.501万--1000万"){?>selected="selected"<?php }?> value=2.501万--1000万>2.501万--1,000万</OPTION> 
									<OPTION <?php if($user->gsyye=="3.1001万--5000万"){?>selected="selected"<?php }?> value=3.1001万--5000万>3.1,001万--5,000万</OPTION> 
									<OPTION <?php if($user->gsyye=="4.5001万--1亿"){?>selected="selected"<?php }?> value=4.5001万--1亿>4.5,001万--1亿</OPTION> 
									<OPTION <?php if($user->gsyye=="5.1亿零1万--50亿"){?>selected="selected"<?php }?> value=5.1亿零1万--50亿>5.1亿零1万--50亿</OPTION> 
									<OPTION <?php if($user->gsyye=="6.50亿零1万--100亿"){?>selected="selected"<?php }?> value=6.50亿零1万--100亿>6.50亿零1万--100亿</OPTION> 
									<OPTION <?php if($user->gsyye=="7.100亿以上"){?>selected="selected"<?php }?> value=7.100亿以上>7.100亿以上</OPTION>
								</select></td>
							<td align="right">个人年收入：</td>
							<td><select name="post[grsr]" class=sel2>
									<OPTION value=""></OPTION> 
									<OPTION <?php if($user->grsr=="1.10万元人民币以内"){?>selected="selected"<?php }?> value="1.10万元人民币以内">1. 10万元人民币以内</OPTION> 
							        <OPTION <?php if($user->grsr=="2.10万-299999元人民币"){?>selected="selected"<?php }?> value="2.10万-299999元人民币">2. 10万-299,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="3.30万-499999元人民币"){?>selected="selected"<?php }?> value="3.30万-499999元人民币">3. 30万-499,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="4.50万-999999元人民币"){?>selected="selected"<?php }?> value="4.50万-999999元人民币">4. 50万-999,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="5.100万人民币及以上"){?>selected="selected"<?php }?> value="5.100万人民币及以上">5. 100万人民币及以上</OPTION>
								</select></td>
						</tr>
						<tr>
							<td align="right">所在区域：</td>
							<td><select id="province" name="post[sf]" class=sel2>
								<option value=""></option>
								<?php
									$province = $db->query("select * from fb_chinafar where region_type=1");
									for($i=0;$i<count($province);$i++){
								?>
								<option <?php if($user->sf==$province[$i]->id)echo 'selected="selected"';?> value="<?php echo $province[$i]->id;?>"><?php echo $province[$i]->name;?></option>
								<?php 
									}
								?>
							</select></td>
							<td colspan="2"><select id="city" name="post[cs]" class=sel2>
								<option value=""></option>
								<?php 
									if($user->sf!=''){
										$city = $db->query("select * from fb_chinafar where parent_id={$user->sf}");
										for($i=0;$i<count($city);$i++){
								?>
								<option <?php if($user->cs==$city[$i]->id)echo 'selected="selected"';?> value="<?php echo $city[$i]->id;?>"><?php echo $city[$i]->name;?></option>
								<?php 
										}
									}
								?>
							</select></td>
						</tr>
						<tr>
							<td align="right">通信地址：</td>
							<td colspan="3"><input maxlength="30" value="<?php echo htmlspecialchars($user->txdz);?>" class="txt2" name="post[txdz]" type="text"></td>
						</tr>
						<tr>
							<td align="right">邮　　编：</td>
							<td colspan="3"><input maxlength="20" value="<?php echo htmlspecialchars($user->yb);?>" class="txt3" name="post[yb]" type="text"></td>
						</tr>
						<tr>
							<td align="right">固定电话：</td>
							<td colspan="3">
								<input class="txt3" maxlength="4" value="<?php echo $user->gddh1?>" name="post[gddh1]" type="text">　
								<input class="txt3" maxlength="8" value="<?php echo $user->gddh2?>" name="post[gddh2]" type="text">　
								<input class="txt3" maxlength="10" value="<?php echo $user->gddh3?>" name="post[gddh3]" type="text">
							</td>
						</tr>
						<tr>
							<td align="right">手　　机：</td>
							<td colspan="3"><input class="txt1" maxlength="20" value="<?php echo htmlspecialchars($user->sj);?>" name="post[sj]" type="text"></td>
						</tr>
						<tr>
							<td align="right">MSN：</td>
							<td colspan="3"><input class="txt1" maxlength="40" value="<?php echo htmlspecialchars($user->msn);?>" name="post[msn]" type="text"></td>
						</tr>
						<tr>
							<td align="right">QQ：</td>
							<td colspan="3"><input class="txt1" maxlength="10" value="<?php echo htmlspecialchars($user->qq);?>" name="post[qq]" type="text"></td>
						</tr>
						<tr>
							<td align="right">验证码：</td>
							<td colspan="3">
								<div><input id="rvcode" maxlength="4" name="yzm" class="txt3" type="text"></div>
								<div id=yzm><img id="pic" src="/user/yz.php"></div>
								<div id="chang_pic">看不清楚？换张图片</div>
							</td>
						</tr>
					</table>
				</div>
				<div id="content_bottom">
					<button type="button" id="info_submit">提　　交</button>　　
					<button type="button" id="info_skip">跳过，以后再说</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>