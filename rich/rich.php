<?php 
	require_once('../frame.php');
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
		js_include_tag('public','jquery.colorbox-min','comment','right');
		css_include_tag('public','comments','right_inc','rich','colorbox');
	?>
</head>

<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<span>读者高见</span>
		</div>
		<div id="hr_top"></div>
		
		
		
			<div id="info">
						<div id="info_top"><div id="people_info">人物信息</div></div>
						<div id="info_connect">
								<div id="info_a">
											<div id="info_a_left"><img src="../images/rich/people.jpg" style="width:236px; height:301px; margin-top:2px; margin-left:2px; margin-right:2px; margin-bottom:2px;"></div>
											<div id="info_a_right">
													<div id="info_c_name"><font style="color:#246BB0; font-size:14px; font-weight:bold;">姓名：沈南鹏</font></div>											
													<div id="info_c_company"><font style="font-size:13px; font-weight:bold;">所在公司：</font><font style="font-size:13px; ">红洒资本 </font> </div>
													<div id="info_c_capacity"><font style="font-size:13px; font-weight:bold;">身份：</font><font style="font-size:13px; ">创始投资人</font></div>
													<div id="investment"><font style="font-size:13px; font-weight:bold;">投资方向：</font><font style="font-size:13px;">互联网、生物、高科技、服务业</font></div>
													<div id="info_c_extra"><font style="font-size:13px; font-weight:bold;">个人介绍：</font></div>
													<div id="extra_content">我十分少我十分少妇阿萨塞佛isa而非那里速度斯蒂芬撒旦法我十分少妇阿萨塞佛isa而非那里速度斯蒂芬撒旦法我十分少妇阿萨塞佛isa而非那里速度斯蒂芬撒旦法我十分少妇阿萨塞佛isa而非那里速度斯蒂芬撒旦法妇阿萨塞佛isa而非那里速度斯蒂芬撒旦法</div>
											</div>
								</div>
								<div id="investment_b">
											<div id="i_b_title">投资项目</div>
											<div id="b_z">
													<div id="company_name">公司名称</div>
													<div id="b_type">投资类别</div>
													<div id="trade">行业</div>
													<div id="capx">投资金额</div>
											</div>
											<div class="b_c">
													<div class="i_c_name">hahah</div>
													<div class="i_c_type">VC</div>
													<div class="i_c_trade">电子商务</div>
													<div class="i_c_capx">3000万美金</div>
											</div>
											<div class="b_c">
													<div class="i_c_name">hahah</div>
													<div class="i_c_type">VC</div>
													<div class="i_c_trade">电子商务</div>
													<div class="i_c_capx">3000万美金</div>
											</div>
											<div class="b_c">
													<div class="i_c_name">hahah</div>
													<div class="i_c_type">VC</div>
													<div class="i_c_trade">电子商务</div>
													<div class="i_c_capx">3000万美金</div>
											</div>
											<div class="b_c">
													<div class="i_c_name">hahah</div>
													<div class="i_c_type">VC</div>
													<div class="i_c_trade">电子商务</div>
													<div class="i_c_capx">3000万美金</div>
											</div>
											
								</div>
								<div class="c_hr"></div>
								<div id="career_z">
											<div id="career">职业生涯</div>
											<div id="career_title">
													<div id="employer">所在企业</div>
													<div id="task">担任任务</div>
													<div id="time">起止时间</div>
											</div>
											<div class="b_c">
													<div class="careet_connect">
															<div class="employer">洪山资本</div>
															<div class="task">投资顾问</div>
															<div class="time">2009-2010</div>
													</div>
											</div>
											<div class="b_c">
													<div class="careet_connect">
															<div class="employer">洪山资本</div>
															<div class="task">投资顾问</div>
															<div class="time">2009-2010</div>
													</div>
											</div>
											<div class="b_c">
													<div class="careet_connect">
															<div class="employer">洪山资本</div>
															<div class="task">投资顾问</div>
															<div class="time">2009-2010</div>
													</div>
											</div>
											<div class="b_c">
													<div class="careet_connect">
															<div class="employer">洪山资本</div>
															<div class="task">投资顾问</div>
															<div class="time">2009-2010</div>
													</div>
											</div>
											<div class="b_c">
													<div class="careet_connect">
															<div class="employer">洪山资本</div>
															<div class="task">投资顾问</div>
															<div class="time">2009-2010</div>
													</div>
											</div>
								</div>
								<div class="c_hr"></div>
								<div id="investment_c">
										<div id="inve_title">投资动态</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">沃尔沃额外额外额外额外额</div>
										</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">搜房网俄国防</div>
										</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">沃尔夫vsa阿德萨WD 午饭AFAASFSEFSA啊舒服噶是</div>
										</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">无非是十分封杀沃尔福萨</div>
										</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">杀毒服务艾薇儿发声方法是我射日发生</div>
										</div>
										<div class="inve_content">
											<div class="inve_left"></div>
											<div class="inve_right">双方均十分舒服哇俄方是否双方实力斯蒂芬二手房</div>
										</div>
								</div>
						</div>
						<div id="info_bottom"></div>
						<div id="christcross">
								<div id="christcross_left"></div>
								<div id="christcross_middle">
										<div id="chr_christcross">
												<div id="chr_c_left">点击按字母排序：</div>
												<div id="chr_c_right"><font style="color:#246BB0;">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z</font></div>	
										</div>
										<div id="chr_sousuo">
												按照投资行业索引：  <select name="select" style="width:200px; border:1px solid #B4B4BE;"></select>
										<input type="button" name="str"  style="width:114px; height:37px; border:0px solid red; margin-left:60px; background:url(../images/search/button.gif) no-repeat;">
										</div>							
								
								</div>
								<div id="christcross_right"></div>
						</div>
			</div>
			
		
		
		
		
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<div id="money"><input type="button" style="width:111px; height:26px; margin-top:50px; margin-left:180px;	 background:url(../../images/rich/btn_data.jpg) no-repeat; border:0px solid red;"></div>
		
		 			<div id="made">
		 			<div id="essay_top">
						<div id=essay_con>投资人动态</div>	
					</div>
				</div>
				<div id="right_people">
					<div id="people_top">
							<div id="people">人  物</div>
							<div id="people_type">投资人类别</div>
							<div id="people_enterprise">最近投资企业</div>
							<div id="people_money">涉及金额</div>
					</div>
					<div id="people_connect">
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
						<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
					</div>
				</div>
		 		<div id="essay_bottom"></div>
		 		<div id="made">
		 			<div id="essay_top">
						<div id=essay_con>福布斯精华文章定制</div>	
					</div>
					<div id="essay_div">
									<div id="essay_a">
												<div id="essay_title">订阅福布斯快闻</div>
												<div id="essay_redio"><input type="radio" name="radiobutton" value="radiobutton" /></div>
												<div id="essay_rc">我要定制</div>
												<div id="essay_button"><input type="button" name="sousuo" style="width:60px; height:28px; border:0px solid red; background:url(../images/zz/btn_bg.jpg) no-repeat; " value="定制"></div>
									</div>
									<div id="essay_b">订阅分类文章</div>
									<div id="essay_c">
									<div id="essay_c_left">
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
									</div>
									<div id="essay_c_right"><input type="button" name="sousuo" style="width:60px; height:28px; border:0px solid red; background:url(../images/zz/btn_bg.jpg) no-repeat; " value="定制"></div>
									</div>
						 		</div>
						 		<div id="essay_bottom"></div>
		 		</div>
				
	</div>

		<?php include "../inc/bottom.inc.php";?>
		
</body>
<html>