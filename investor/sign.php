<?php 
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
		css_include_tag('public','comments','right_inc','sign','colorbox');
	?>
</head>

<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<span>增长俱乐部首页 > 报名加入创业者数据库</span>
		</div>
		<div id="hr_top"></div>
		<div id="f_z">
				<div class="f_title">
					<div class="f_title_left"></div>
					<div class="f_title_middle"><div class="title_z">填写报名信息</div></div>
					<div class="f_title_right"></div>
				</div>
				<div id="f_content">
					<div id="fc_top"></div>
					<div id="fc_a">注意 * 为必填项，请将内容准确完整，以保证项目真实有效。</div>
					<div class="fc_b">
							<div class="fc_title_pg"></div>
							<div class="fc_title">项目信息</div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left">*  项目名称：</div>
							<div class="fc_c_right"><input type="text" name="input" style="border:1px solid #999999; width:400px; margin-top:5px; height:20px;"></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left">*  所属行业：</div>
							<div class="fc_c_right">
								<select name="select" style="width:150px; margin-top:6px;"></select>
								<select name="select" style="width:150px; margin-left:5px;"></select>
							</div>
					</div>
					<div class="fc_c">
							<div id="fc_c_redio">*  希望的投资类型：</div>
							<div id="fc_x_right">
									<input type="radio" name="radiobutton" style="float:left; display:inline;" value="radiobutton" /><div class="f_xx">风险投资</div>
									<input type="radio" name="radiobutton" style="margin-left:10px; float:left; display:inline;" value="radiobutton"/><div  class="f_xx">出售企业</div>
									<input type="radio" name="radiobutton" style="margin-left:10px; float:left; display:inline;" value="radiobutton" /><div  class="f_xx">天使投资</div>
							</div>
					</div>
					<div id="fc_money">
							<div id="fc_c_money"><div class="n"></div>融资金额：</div>
							<div id="money_input"><input type="text" name="text"  style="border:1px solid #999999;  width:190px; margin-top:5px; height:20px;"/></div>
							<div id="moneyvalue">选择投资类型为“风险投资“和”天使投资“的金额，例如：100万人民币</div>
					</div>
					<div id="fc_trae">
							<div id="trae_left">*  项目简介：</div>
							<div id="trae_right"><textarea name="text" style="width:450px;  margin-top:5px; height:200px;"></textarea></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>项目网址：</div>
							<div class="fc_c_right">
							<div class="fc_c_right"><input type="text" name="input" style="border:1px solid #999999; width:400px; margin-top:5px; height:20px;"></div>
							</div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>项目计划：</div>
							<div class="fc_c_right">
									<div id="fc_open">
										<input type="text" name="input" style="border:1px solid #999999; width:200px; margin-top:5px; height:20px;">
										<input type="button" style="width:63px; margin-left:30px; font-size:14px; font-weight:bold;  height:24px; border:0px solid red; background:url(../images/right/right_b_b_btn.jpg) no-repeat;" value="浏 览"/><input type="button" style="margin-left:10px; font-size:14px; font-weight:bold; width:63px; height:24px; border:0px solid red; background:url(../images/right/right_b_b_btn.jpg) no-repeat;"  value="上 传"/>
									</div>
							</div>
					</div>
					<div id="fc_c_bottom">注：请使用word\PPT\PDF文档，文件大小不要超过2M</div>
					<div id="f_hr">
					</div>
			
				
					<div class="fc_b">
							<div class="fc_title_pg"></div>
							<div class="fc_title">公司信息</div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left">*  公司名称：</div>
							<div class="fc_c_right"><input type="text" name="input" style="border:1px solid #999999; width:400px; margin-top:5px; height:20px;"></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>公司规模：</div>
							<div class="fc_c_right"><input type="text" name="input" style="border:1px solid #999999; width:400px; margin-top:5px; height:20px;"></div>
					</div>
					<div id="company">
							<div id="company_a">
										<div class="com_a">公司历史收入</div>
										<div class="com_b">
											<div class="com_year"></div>
											<div class="com_money"></div>
										</div>
										<div class="com_c">
											<div class="year_a">年份</div>
											<div class="money_b">收入单位：万  人民币</div>
										</div>
										<div class="com_d">
											<div class="year_d"><select name="select" style="width:70px; margin-top:18px;"></select></div>
											<div class="money_d"><select name="select" style="width:70px; margin-top:7Px;"></select></div>
										</div>
										<div class="com_e">
												<input type="button" style="width:70px; height:24px; border:0px solid red; margin-top:15px; background:url(../images/sign/right_b_b_btn.jpg) no-repeat;" value="添加输入"/>
												<input  type="button" style="width:70px; height:24px; border:0px solid red; background:url(../images/sign/right_b_b_btn.jpg) no-repeat; margin-top:10px;"  value="删除输入"/>
										</div>
										<textarea class="com_f">
										</textarea>
							</div>
							<div id="company_b">
										<div class="com_a">公司预期收入</div>
										<div class="com_b">
											<div class="com_year"></div>
											<div class="com_money"></div>
										</div>
										<div class="com_c">
											<div class="year_a">年份</div>
											<div class="money_b">收入单位：万  人民币</div>
										</div>
										<div class="com_d">
											<div class="year_d"><select name="select" style="width:70px; margin-top:18px;"></select></div>
											<div class="money_d"><select name="select" style="width:70px; margin-top:7Px;"></select></div>
										</div>
										<div class="com_e">
												<input type="button" style="width:70px; height:24px; border:0px solid red; background:url(../images/sign/right_b_b_btn.jpg) no-repeat; margin-top:15px; " value="添加输入"/>
												<input  type="button" style="width:70px; height:24px; border:0px solid red; background:url(../images/sign/right_b_b_btn.jpg) no-repeat; margin-top:10px;"  value="删除输入"/>
										</div>
										<textarea class="com_f">
										</textarea>
							</div>
						
						
						<div class="fc_c">
							<div class="company_left">公司成立时间：</div>
							<div class="fc_c_right">
											<select name="select" style="width:70px; margin-left:20px; margin-top:6px; "></select>
											<select name="select" style="width:70px; margin-left:5px;"></select>						
							</div>
						</div>
						<div class="fc_c">
							<div id="comany_add">*  公司总部所在地：</div>
							<div class="fc_c_right">
										<select name="select" style="width:70px; margin-top:6px;"></select>
										<select name="select" style="width:70px; margin-left:5px;"></select>
							</div>
					</div>
							<div class="fc_c">
							<div class="fc_c_left">*  项目名称：</div>
							<div class="fc_c_right"><input type="text" name="input" style="border:1px solid #999999; width:250px; margin-left:10px; margin-top:5px; height:20px;"> * 邮编：<input type="text" name="input" style="border:1px solid #999999; width:100px; margin-top:5px; height:20px;"></div>
					</div>
					</div>
					<div id="fc_v">
							<div id="fc_c_ma">公司注册资金单位：万人民币</div>
							<div id="money_i"><input type="text" name="text"  style="border:1px solid #999999;  width:190px; margin-left:10px; margin-top:5px; height:20px;"/></div>
							<div id="money_v">如：500万 人民币</div>
					</div>
					
					<div id="f_hr">
					</div>
			
				
					<div class="fc_b">
							<div class="fc_title_pg"></div>
							<div class="fc_title">联系人信息</div>
					</div>
					<div class="linkman_a">
							<div class="linkman_name">* 联系人姓名：</div>
							<div id="linkman_name_input"><input type="text" style="border:1px solid #999999;  width:190px; margin-top:5px; height:20px; margin-left:8px;" name="text"/></div>
					</div>
					<div class="linkman_a">
							<div class="linkman_name">* 联系人手机：</div>
							<div class="linkman_input"><input type="text" style="border:1px solid #999999;  width:190px; margin-top:5px; height:20px; margin-left:8px;" name="text"/></div>
							<div id="linkman_phone">* 联系人电话</div>
							<input type="text"  style="border:1px solid #999999;  width:30px; margin-top:5px; height:20px; margin-left:13px;" name="text"/>
							<input type="text"  style="border:1px solid #999999;  width:80px; margin-top:5px; height:20px; margin-left:3px;" name="text"/>
							<input type="text"  style="border:1px solid #999999;  width:27px; margin-top:5px; height:20px; margin-left:3px;" name="text"/>
					</div>
					<div class="linkman_a">
							<div class="linkman_name">* 联系人邮件：</div>
							<div class="linkman_input"><input type="text" style="border:1px solid #999999;  width:190px; margin-top:5px; height:20px; margin-left:8px;" name="text"/></div>
							<div id="linkman_qq">联系人QQ：</div>
							<input type="text" style="border:1px solid #999999;  width:157px; margin-top:5px; margin-left:4px; height:20px;" name="text"/>
					</div>
					<div class="linkman_a">
							<div id="linkman_name">* 联系人职位信息：</div>
							<div class="linkman_input"><input type="text" style="border:1px solid #999999;  width:165px; margin-top:5px; height:20px; margin-left:8px;" name="text"/></div>
							<div id="linkman_msn">联系人MSN：</div>
							<input type="text" style="border:1px solid #999999;  width:156px; margin-top:5px; height:20px;" name="text"/>
					</div>
					<div id="kong"></div>
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