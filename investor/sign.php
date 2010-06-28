<?php
	session_start();
	include_once('../frame.php');
	if(!isset($_SESSION['sign'])){
		$_SESSION['sign'] = rand_str(20);
	}
	$db = get_db();
	$industry = $db->query("select * from fb_invest_industry");
	$count = $db->record_count;
	close_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>报名加入创业者数据库-福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public','right','sign');
		#validate_form("sign");
		css_include_tag('public','right_inc','sign');
	?>
</head>

<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread>
			报名加入创业者数据库
		</div>
		<div id="bread_line"></div>
		<div id="f_z">
				<div class="f_title">
					<div class="f_title_left"></div>
					<div class="f_title_middle"><div class="title_z">填写报名信息</div></div>
					<div class="f_title_right"></div>
				</div>
				<form action="sign.post.php" enctype="multipart/form-data" method="post" id="sign">
				<div id="f_content">
					<div id="fc_top"></div>
					<div id="fc_a">1.福布斯将充分尊重您的隐私，对您提供的数据严格保密；<br>2.注意 * 为必填项，请保证所填数据的真实性。</div>
					<div class="fc_b">
							<div class="fc_title_pg"></div>
							<div class="fc_title">项目信息</div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left">*  项目名称：</div>
							<div class="fc_c_right"><input type="text" maxlength="30" class="required" name="post[item_name]" ></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left">*  所属行业：</div>
							<div class="fc_c_right">
								<select name="post[industry]" class="required" id="req" >
								<option value=''></option>
								<?php for($i=0;$i<$count;$i++){?>
								<option value="<?php echo $industry[$i]->name;?>"><?php echo $industry[$i]->name;?></option>
								<?php }?>
								</select>
							</div>
					</div>
					<div class="fc_c">
							<div id="fc_c_redio">*  希望的投资类型：</div>
							<div id="fc_x_right">
									<input type="radio"  name="post[item_type]" id="rdo_a" value="1" /><div class="f_xx">风险投资</div>
									<input type="radio"  name="post[item_type]" class="rdo"  value="2"/><div  class="f_xx">出售企业</div>
									<input type="radio"  name="post[item_type]" class="rdo"  value="3" /><div  class="f_xx">天使投资</div>
							</div>
					</div>
					<div id="fc_money">
							<div id="fc_c_money"><div class="n"></div>融资金额：</div>
							<div id="money_input"><input maxlength="20" type="text" name="post[item_money]"/></div>
							<div id="moneyvalue">选择投资类型为“风险投资“和”天使投资“的金额，例如：100万人民币</div>
					</div>
					<div id="fc_trae">
							<div id="trae_left">*  项目简介：</div>
							<div id="trae_right"><textarea class="required" id="r_textarea" name="post[item_description]"></textarea></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>项目网址：</div>
							<div class="fc_c_right">
							<div class="fc_c_right"><input type="text" maxlength="50" name="post[item_url]" id="www_r"></div>
							</div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>项目计划：</div>
							<div class="fc_c_right">
									<div id="fc_open">
										<input type="file" id="file" name="post">
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
							<div class="fc_c_right"><input type="text" maxlength="20" class="required" id="re_a" name="post[company_name]"></div>
					</div>
					<div class="fc_c">
							<div class="fc_c_left"><div class="n"></div>公司规模：</div>
							<div class="fc_c_right"><input type="text" maxlength="30" name="post[company_size]"  id="re_b"></div>
					</div>
					<div id="company">
							<div id="company_a">
										<div class="com_a">公司历史收入</div>
										<div class="com_b">
											<div class="com_year"></div>
											<div class="com_money"></div>
										</div>
										<div class="com_c">
											<div class="year_a">年份：4位数字</div>
											<div class="money_b">收入单位：万  人民币</div>
										</div>
										<div class="com_d">
											<div class="year_d"><input maxlength="4" id="year1"></div>
											<div class="money_d"><input maxlength="10" id="income1"></div>
										</div>
										<div class="com_e">
												<input type="button" id="add_income1" value="添加输入"/>
												<input  type="button" id="del_income1"  value="删除输入"/>
										</div>
										<select multiple="multiple" id="income1_s" class="com_f"></select>
										</textarea>
							</div>
							<div id="company_b">
										<div class="com_a">公司预期收入</div>
										<div class="com_b">
											<div class="com_year"></div>
											<div class="com_money"></div>
										</div>
										<div class="com_c">
											<div class="year_a">年份：4位数字</div>
											<div class="money_b">收入单位：万  人民币</div>
										</div>
										<div class="com_d">
											<div class="year_d"><input maxlength="4" id="year2"></div>
											<div class="money_d"><input maxlength="10" id="income2"></div>
										</div>
										<div class="com_e">
												<input type="button" id="add_income2"  value="添加输入"/>
												<input  type="button" id="del_income2"  value="删除输入"/>
										</div>
										<select multiple="multiple" id="income2_s" class="com_f"></select>
										</textarea>
							</div>
						<div class="fc_c">
							<div class="company_left">公司成立时间：</div>
							<div class="fc_c_right">
									<input type="text" id="cr_t" maxlength="20" name="post[company_created]">		
							</div>
						</div>
						<div class="fc_c">
							<div id="comany_add">*  公司总部所在地：</div>
							<div class="fc_c_right">
									<input type="text" class="required" maxlength="50" name="post[company_location]" id="address">
							</div>
					</div>
							<div class="fc_c">
							<div class="fc_c_left">*  邮编：</div>
							<div class="fc_c_right"><input class="required number" maxlength="20" id="post_input" type="text" name="post[zip]"></div>
					</div>
					</div>
					<div id="fc_v">
							<div id="fc_c_ma">公司注册资金单位：万人民币</div>
							<div id="money_i"><input type="text" class="number" maxlength="10" name="post[capital]"/></div>
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
							<div id="linkman_name_input"><input type="text" maxlength="20" class="required"  name="post[name]"/></div>
					</div>
					<div class="linkman_a">
							<div class="linkman_name">* 联系人手机：</div>
							<div class="linkman_input"><input type="text" maxlength="20" class="required number" name="post[mobile]"/></div>
							<div id="linkman_phone">* 联系人电话</div>
							<input type="text" class="number" maxlength="4" id="phone_a" name="phone1"/>
							<input type="text"  class="required number" maxlength="8" id="phone_b" name="phone2"/>
							<input type="text"  class="number" maxlength="10" id="phone_c" name="phone3"/>
					</div>
					<div class="linkman_a">
							<div class="linkman_name">* 联系人邮件：</div>
							<div class="linkman_input"><input type="text" maxlength="40" class="required email" name="post[email]"/></div>
							<div id="linkman_qq">联系人QQ：</div>
							<input type="text" id="q_input" class="number" maxlength="10" name="post[qq]"/>
					</div>
					<div class="linkman_a">
							<div id="linkman_name">* 联系人职位信息：</div>
							<div class="linkman_input"><input type="text" id="p_info" maxlength="20" class="required" name="post[post]"/></div>
							<div id="linkman_msn">联系人MSN：</div>
							<input type="text" id="msn" maxlength="40" name="post[msn]"/>
					</div>
					<div id="kong"><input type="button" id="sumbit" value="完  成"/></div>
			</div>
			<input type="hidden" name="income1" id="h_income1"><input type="hidden" name="income2" id="h_income2"><input type="hidden" name="session" value="<?php echo $_SESSION['sign'];?>">
			</form>
		</div>
		
		
		
		<div id="right_inc">
		 		<?php include_right("ad");?>
				<?php include_right("favor");?>
				<?php include_right("four");?>
				<?php include_right("rich");?>
				<?php include_right("magazine");?>
		</div>
		<?php include_bottom();?>
		
	</div>
	
	
</body>