<?php
	session_start();
	include_once('../../frame.php');
	if(!isset($_SESSION['lcs'])){
		 $_SESSION['lcs'] = rand_str();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>福布斯·富国中国优选理财师评选</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="/javascript/jquery.js"></script>
<script type="text/javascript" language="javascript" src="form.js"></script>
</head>
<body>
	<div id="container"><!-- container begin -->
		<div id="container-inner"><!-- container-inner begin -->
			<div id="header"><!-- header begin -->
				<div id="header-inner"><!-- header-inner begin -->
					<div class="header_bg">
						<img src="images/header-bg.gif" />	
					</div>					
				</div><!-- header-inner end -->				
			</div><!-- header end -->
			<div id="body"><!-- body begin -->					
				<div id="body-inner"><!-- body-inner begin -->
					<div id="content"><!-- content begin -->
						<div id="content-inner" class="clear"><!-- content-inner begin -->
							<div class="background-warp">
								<div class="entryform-main">								
									<div class="entryform-box">
										<p class="entryform-title"><strong>福布斯•富国2010中国优选理财师评选报名</strong></p>
										<p class="bg">保密承诺：组委会对所有问卷信息严格保密。在注册竞赛、调查及意见反馈时您输入的任何个人资料都将被收集并存储在数据库中，组委会将采取必要的防范措施确保您的个人资料不被丢失、滥用或篡改。只有经授权的组委会工作人员及委托人才有权使用该资料。除了本保密承诺中所指定的当事方以外，组委会工作人员和委托人不会向组委会以外的任何第三方透露这些资料。尽管如此，由于互联网的公开特征，我们无法完全保证储存在服务器上的，或传输自 / 向用户的任何信息免遭非法获取或篡改。参与此次活动表示您理解并同意承担这些风险。</p><p>*报名截止日期：9月2日</p>
										<div class="entryform-head"><img src="images/entry_1.gif" /></div>
										<div class="entryform-content">			
										<form action="post.php" method="post">
											<table>
												<tr>
												  <td colspan="2" span class="td4"><strong>报名资格：</strong>工作经验：从事理财相关工作3年（含）以上学历：大专（含）以上</td>
											  </tr>
												<tr>
													<td width="365" class="bb" span>姓名</td>
													<td width="429"><input class="iput-title reqired" maxlength="6" type="text" name="name" ></td>
												</tr>
												<tr>
													<td class="bb">性别</td>
													<td>
														<input type="radio" value="男" class="radio reqired" name="sex" />男
														<input type="radio" value="女" class="radio reqired" name="sex" />女													
													</td>
												</tr>
												<tr>
													<td class="bb">年龄</td>
													<td><input class="iput-title reqired number" maxlength="3" type="text" name="age" ></td>
												</tr>
												<tr>
													<td class="bb">电子邮箱</td>
													<td><input class="iput-title reqired" maxlength="40" type="text" name="email" ></td>
												</tr>
												<tr>
													<td class="bb">固定电话</td>
													<td><input class="iput-title reqired" maxlength="20" type="text" name="fix_phone" ></td>
												</tr>
												<tr>
													<td class="bb">手机</td>
													<td><input class="iput-title reqired number" maxlength="11" surelength="11" type="text" name="phone" ></td>
												</tr>
												<tr>
													<td class="bb">填写所在省份及所属城市</td>
													<td><input class="iput-title reqired" type="text" maxlength="20" name="city" ></td>
												</tr>
												<tr>
													<td class="bb">所选参赛区</td>
													<td>
														<select class="se-lect2 reqired" name="ccq">
															<option value="">请选择</option>
															<option value="北京赛区">北京赛区</option>
															<option value="上海赛区">上海赛区</option>
															<option value="深圳赛区">深圳赛区</option>
															<option value="沈阳赛区">沈阳赛区</option>
															<option value="成都赛区">成都赛区</option>
															<option value="郑州赛区">郑州赛区</option>
														</select>
													</td>
												</tr>
												<tr>
													<td class="bb">您已获得的最高学历为</td>
													<td>
														<select class="se-lect2 reqired" name="education">
															<option value="">请选择</option>
															<option value="博士">博士</option>
															<option value="硕士">硕士</option>
															<option value="本科">本科</option>
															<option value="大专">大专</option>
														</select>
													</td>
												</tr>
												<tr>
													<td class="bb">最高学历的毕业院校为</td>
													<td>
														<input class="iput-title reqired" type="text" name="school" >
														所学专业<select class="se-lect2 reqired" error_msg="所学专业" name="specialty">
															<option value="">请选择</option>
															<option value="哲学">哲学</option>
															<option value="经济学">经济学</option>
															<option value="法学">法学</option>
															<option value="教育学">教育学</option>
															<option value="文学">文学</option>
															<option value="历史学">历史学</option>
															<option value="理学">理学</option>
															<option value="工商管理硕士">工商管理硕士</option>
															<option value="工学">工学</option>
															<option value="农学">农学</option>
															<option value="医学">医学</option>
															<option value="军事学">军事学</option>
															<option value="管理学">管理学</option>
															<option value="体育学">体育学</option>
															<option value="中医学">中医学</option>
															<option value="法律硕士">法律硕士</option>
															<option value="其他">其他</option>
														</select>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<table class="table2">
															<tr>
																<td colspan="4" align="left">本科学历的毕业院校为</td>
															</tr>
															<tr>
																<td class="td2"><strong>毕业院校</strong></td>
																<td class="td2"><strong>主修专业</strong></td>
																<td class="td2"><strong>学历学位</strong></td>
																<td class="td2"><strong>起止日期</strong></td>
															</tr>
															<tr>
																<td class="td3"><input type="text" error_msg="毕业院校" maxlength="20" class="reqired" style="border:0" name="info_school[]"></td>
																<td class="td3"><input type="text" error_msg="主修专业" maxlength="20" class="reqired" style="border:0" name="info_zy[]"></td>
																<td class="td3"><input type="text" error_msg="学历学位" maxlength="20" class="reqired" style="border:0" name="info_xw[]"></td>
																<td class="td3"><input type="text" error_msg="起止日期" maxlength="30" class="reqired" style="border:0" name="info_rq[]"></td>
															</tr>
															<tr>
																<td class="td3"><input type="text" error_msg="毕业院校" maxlength="20" style="border:0" name="info_school[]"></td>
																<td class="td3"><input type="text" error_msg="主修专业" maxlength="20" style="border:0" name="info_zy[]"></td>
																<td class="td3"><input type="text" error_msg="学历学位" maxlength="20" style="border:0" name="info_xw[]"></td>
																<td class="td3"><input type="text" error_msg="起止日期" maxlength="30" style="border:0" name="info_rq[]"></td>
															</tr>
															<tr>
																<td class="td3"><input type="text" error_msg="毕业院校" maxlength="20" style="border:0" name="info_school[]"></td>
																<td class="td3"><input type="text" error_msg="主修专业" maxlength="20" style="border:0" name="info_zy[]"></td>
																<td class="td3"><input type="text" error_msg="学历学位" maxlength="20" style="border:0" name="info_xw[]"></td>
																<td class="td3"><input type="text" error_msg="起止日期" maxlength="30" style="border:0" name="info_rq[]"></td>
															</tr>
														</table>													</td>
												</tr>
												<tr>
													<td colspan="2">
														<table class="table2">                                            
															<tr>
																<td rowspan="4" valign="top" span class="bb" >您获得的资格或认证有（可多选）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="国际金融理财师（CFP）" />国际金融理财师（CFP）</td>
															  <td><input class="in-check reqired" name="certificate[]" type="checkbox" value="金融理财师（AFP）" />金融理财师（AFP）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="金融理财管理师（EFP）" />金融理财管理师（EFP）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="特许金融分析师（CFA）" />特许金融分析师（CFA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="风险管理师（FRM）" />风险管理师（FRM）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="注册资产评估师（CPV）" />注册资产评估师（CPV）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="注册税务师（CTA）" />注册税务师（CTA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="注册房地产估价师（CREA）" />注册房地产估价师（CREA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="注册会计师（CPA）" />注册会计师（CPA）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="国际注册内部审计师（CIA）" />国际注册内部审计师（CIA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" value="其他（请具体写明）" />其他（请具体写明）</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td class="bb">理财师所属机构</td>
																<td colspan="3"><input class="iput-title reqired" maxlength="20" type="text" name="ssjg" /></td>
															</tr>
															<tr>
																<td class="bb">您的工作地点</td>
																<td colspan="3">
																	<select class="se-lect2 reqired" name="work_place1">
																		<option value="">请选择分类</option>
																		<option value="北京赛区">北京赛区</option>
																		<option value="上海赛区">上海赛区</option>
																		<option value="深圳赛区">深圳赛区</option>
																		<option value="沈阳赛区">沈阳赛区</option>
																		<option value="成都赛区">成都赛区</option>
																		<option value="郑州赛区">郑州赛区</option>
																	</select>
																	<select class="se-lect2 reqired" name="work_place2">
																		<option>请选择分类</option>
																		<option belong="北京赛区" value="北京">北京</option>
																		<option belong="北京赛区" value="天津">天津</option>
																		<option belong="北京赛区" value="河北">河北</option>
																		<option belong="北京赛区" value="山西">山西</option>
																		<option belong="北京赛区" value="陕西">陕西</option>
																		<option belong="北京赛区" value="内蒙">内蒙</option>
																		<option belong="上海赛区" value="上海">上海</option>
																		<option belong="上海赛区" value="江苏">江苏</option>
																		<option belong="上海赛区" value="浙江">浙江</option>
																		<option belong="深圳赛区" value="广东">广东</option>
																		<option belong="深圳赛区" value="福建">福建</option>
																		<option belong="深圳赛区" value="广西">广西</option>
																		<option belong="深圳赛区" value="海南">海南</option>
																		<option belong="深圳赛区" value="云南">云南</option>
																		<option belong="沈阳赛区" value="山东">山东</option>
																		<option belong="沈阳赛区" value="辽宁">辽宁</option>
																		<option belong="沈阳赛区" value="吉林">吉林</option>
																		<option belong="沈阳赛区" value="黑龙江">黑龙江</option>
																		<option belong="成都赛区" value="重庆市">重庆市</option>
																		<option belong="成都赛区" value="四川省">四川省</option>
																		<option belong="成都赛区" value="湖北">湖北</option>
																		<option belong="成都赛区" value="湖南">湖南</option>
																		<option belong="成都赛区" value="贵州省">贵州省</option>
																		<option belong="成都赛区" value="西藏自治区">西藏自治区</option>
																		<option belong="成都赛区" value="青海">青海</option>
																		<option belong="成都赛区" value="宁夏">宁夏</option>
																		<option belong="郑州赛区" value="河南">河南</option>
																		<option belong="郑州赛区" value="江西">江西</option>
																		<option belong="郑州赛区" value="安徽">安徽</option>
																		<option belong="郑州赛区" value="新疆">新疆</option>
																		<option belong="郑州赛区" value="新疆">新疆</option>
																	</select>																</td>
															</tr>
															<tr>
																<td class="bb">您目前所在的工作单位请明确到<br>（部门、网点、职务）</td>
																<td colspan="3">
																	<input class="iput-title reqired" type="text" maxlength="30" name="work_space1" />
																	属于<select class="se-lect2 reqired" name="work_space2">
																		<option value="">请选择分类</option>
																		<option value="银行">银行</option>
																		<option value="证券公司">证券公司</option>
																		<option value="保险公司">保险公司</option>
																		<option value="信托投资公司">信托投资公司</option>
																		<option value="基金管理公司">基金管理公司</option>
																		<option value="投资咨询（管理）公司">投资咨询（管理）公司</option>
																		<option value="第三方理财公司">第三方理财公司</option>
																		<option value="其他">其他</option>
																	</select>																</td>
															</tr>
															<tr>
																<td class="bb">您的工作年限</td>
																<td colspan="3">
																	<input class="iput-title reqired number" maxlength="2" type="text" name="work_year"/>
																	<span class="bb">参与理财工作年限</span>
																	<input class="iput-title reqired number" maxlength="2" type="text" error_msg="参与理财工作年限" name="money_year"/>																</td>
															</tr>
															<tr>
																<td class="bb">理财工作中您主要担任的角色为</td>
																<td colspan="3">
																	<select class="se-lect2 reqired" name="role">
																		<option value="">请选择分类</option>
																		<option value="保险咨询师">保险咨询师</option>
																		<option value="投资咨询师">投资咨询师</option>
																		<option value="基金咨询师">基金咨询师</option>
																		<option value="其他">其他</option>
																	</select>																</td>
															</tr>
														</table>													</td>
												</tr>
												<tr>
												  <td colspan="2">
													  <table>                                                    
														<tr>
													      <td class="bb"><strong>您在工作中，客户关系管理与专业理财服务的时间分配</strong></td>
														   <td><input class="iput-title reqired" type="text" maxlength="20" name="time_dealing1" /><input class="iput-title" maxlength="20" type="text" name="time_dealing2" /></td>
														</tr>
														<tr>
														  <td class="bb">请简单列举您在实际工作中常用的开发和维护客户关系的方式</td>
															<td><textarea class="tex-tarea-o reqired" maxlength="100" name="long[work_mode]" cols="" rows=""></textarea></td>
														</tr>
												    </table>												  </td>
											  </tr>
												
												
												
												<tr>
												  <td colspan="2"><table class="table2">
                                                    <tr>
                                                      <td colspan="3" align="left">理财工作心得（控制在200字内） </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                      <td colspan="3">
                                                        <textarea class="tex-tarea reqired" maxlength="200" error_msg="理财工作心得" name="long[experience]" cols="" rows=""></textarea>
                                                      </td>
                                                    </tr>
                                                    
                                                  </table></td>
											  </tr>
												<tr>
													<td colspan="2">
														<table class="table2">
															<tr>
																<td colspan="3" align="left">信息证明人</td>
															</tr>
															<tr>
																<td class="td2" >姓名</td>
																<td class="td2" >单位及职务</td>
																<td class="td2" >联系电话</td>
															</tr>
															<tr>
																<td class="td3" ><input type="text" maxlength="6" error_msg="信息证明人姓名" class="reqired" style="border:0" name="zm_name[]"></td>
																<td class="td3" ><input type="text" maxlength="20" error_msg="信息证明人单位及职务" class="reqired" style="border:0" name="zm_zw[]"></td>
																<td class="td3" ><input type="text" maxlength="25" error_msg="信息证明人联系电话" class="reqired" style="border:0" name="zm_phone[]"></td>
															</tr>
															<tr>
																<td class="td3" ><input type="text" maxlength="6" error_msg="信息证明人姓名" style="border:0" name="zm_name[]"></td>
																<td class="td3" ><input type="text" maxlength="20" error_msg="信息证明人单位及职务" style="border:0" name="zm_zw[]"></td>
																<td class="td3" ><input type="text" maxlength="25" error_msg="信息证明人联系电话" style="border:0" name="zm_phone[]"></td>
															</tr>
															<tr>
																<td class="td3" ><input type="text" maxlength="6" error_msg="信息证明人姓名" style="border:0" name="zm_name[]"></td>
																<td class="td3" ><input type="text" maxlength="20" error_msg="信息证明人单位及职务" style="border:0" name="zm_zw[]"></td>
																<td class="td3" ><input type="text" maxlength="25" error_msg="信息证明人联系电话" style="border:0" name="zm_phone[]"></td>
															</tr>
															</table>														
														</td>
												</tr>
												<tr>
													<td colspan="2">
														<table width="95%" class="table2">
															<tr>
																<td colspan="4" align="left"><strong>您用于各理财领域的时间为</strong><span class="ae4red">*请设计所填比例为100%，否则就报错</span></td>
															</tr>
															<tr>
																<td class="bb">家庭（个人）财务分析：</td>
																<td>
																	<input class="iput-title reqired number" maxlength="6" error_msg="家庭（个人）财务分析" type="text" name="money_time[]" />%</td>
																<td class="bb">资产管理或投资规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="资产管理或投资规划" type="text" name="money_time[]" />%</td>
															</tr>
															<tr>
																<td class="bb">风险管理或保险规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="风险管理或保险规划" type="text" name="money_time[]" />%</td>
																<td class="bb">子女教育金规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="子女教育金规划" type="text" name="money_time[]" />%</td>
															</tr>
															<tr>
																<td class="bb">换房规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="换房规划" type="text" name="money_time[]" />%</td>
																<td class="bb">税务筹划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="税务筹划" type="text" name="money_time[]" />%</td>
															</tr>
															<tr>
																<td class="bb">退休规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="退休规划" type="text" name="money_time[]" />%</td>
																<td class="bb">遗产规划：</td>
																<td><input class="iput-title reqired number" maxlength="6" error_msg="遗产规划" type="text" name="money_time[]" />%</td>
															</tr>
														</table>													</td>
												</tr>
												<tr>
													<td colspan="2">
														<table class="table2">
															<tr>
																<td colspan="4" align="left"><strong>请填写以下表格（以下数据应该可以统计并备查）<strong></td>
															</tr>
															<tr>
																<td width="25%" align="center" class="td2">&nbsp;</td>
																<td width="25%" align="center" class="td2"><strong>2008年度</strong></td>
																<td width="25%" align="center" class="td2"><strong>2009年度</strong></td>
																<td width="25%" align="center" class="td2"><strong>2010年（截止2010-6-30）</strong></td>
															</tr>
															<tr>
																<td class="td3">客户人数</td>
																<td class="td3" ><input type="text" maxlength="6" error_msg="2008年度客户人数" class="reqired number" style="border:0" name="khrs[]"></td>
																<td class="td3" ><input type="text" maxlength="6" error_msg="2009年度客户人数" class="reqired number" style="border:0" name="khrs[]"></td>
																<td class="td3" ><input type="text" maxlength="6" error_msg="2010年度客户人数" class="reqired number" style="border:0" name="khrs[]"></td>
															</tr>
															<tr>
																<td class="td3">年末在您名下或直接管理和维护的</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度年末在您名下或直接管理和维护的" class="reqired number" style="border:0" name="nmzj[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度年末在您名下或直接管理和维护的" class="reqired number" style="border:0" name="nmzj[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度年末在您名下或直接管理和维护的" class="reqired number" style="border:0" name="nmzj[]"></td>
															</tr>
															<tr>
																<td class="td3">年平均管理资产总量（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度年平均管理资产总量" class="reqired number" style="border:0" name="npjzc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度年平均管理资产总量" class="reqired number" style="border:0" name="npjzc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度年平均管理资产总量" class="reqired number" style="border:0" name="npjzc[]"></td>
															</tr>
															<tr>
																<td class="td3">年末在管资产存量市值（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度年末在管资产存量市值" class="reqired number" style="border:0" name="nmzc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度年末在管资产存量市值" class="reqired number" style="border:0" name="nmzc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度年末在管资产存量市值" class="reqired number" style="border:0" name="nmzc[]"></td>
															</tr>
															<tr>
																<td class="td3">年金融产品销售量（万）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度年金融产品销售量" class="reqired number" style="border:0" name="nxc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度年金融产品销售量" class="reqired number" style="border:0" name="nxc[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度年金融产品销售量" class="reqired number" style="border:0" name="nxc[]"></td>
															</tr>
															<tr>
																<td class="td3">全年金融产品（含基金、银行理财产品、债券、股票等）销售量（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度全年金融产品" class="reqired number" style="border:0" name="qncp[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度全年金融产品" class="reqired number" style="border:0" name="qncp[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度全年金融产品" class="reqired number" style="border:0" name="qncp[]"></td>
															</tr>
															<tr>
																<td class="td3">全年保单销售量（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度全年保单销售量" class="reqired number" style="border:0" name="qnbd[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度全年保单销售量" class="reqired number" style="border:0" name="qnbd[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度全年保单销售量" class="reqired number" style="border:0" name="qnbd[]"></td>
															</tr>
															<tr>
																<td class="td3">单个客户的平均资产规模（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度单个客户的平均资产规模" class="reqired number" style="border:0" name="dggm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度单个客户的平均资产规模" class="reqired number" style="border:0" name="dggm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度单个客户的平均资产规模" class="reqired number" style="border:0" name="dggm[]"></td>
															</tr>
															<tr>
																<td class="td3">年末在管理单一客户的平均资产规模（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2008年度年末在管理单一客户的平均资产规模" class="reqired number" style="border:0" name="nmgm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2009年度年末在管理单一客户的平均资产规模" class="reqired number" style="border:0" name="nmgm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" error_msg="2010年度年末在管理单一客户的平均资产规模" class="reqired number" style="border:0" name="nmgm[]"></td>
															</tr>
															<tr>
																<td class="td3">年末在管前10大客户的平均资产规模（万元）</td>
																<td class="td3" ><input type="text" maxlength="10" class="reqired number" error_msg="2008年度年末在管前10大客户的平均资产规模" style="border:0" name="pjgm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" class="reqired number" error_msg="2009年度年末在管前10大客户的平均资产规模" style="border:0" name="pjgm[]"></td>
																<td class="td3" ><input type="text" maxlength="10" class="reqired number" error_msg="2010年度年末在管前10大客户的平均资产规模" style="border:0" name="pjgm[]"></td>
															</tr>
												 	  </table>													</td>
												</tr>
												<tr>
													<td colspan="2"><strong>何时何地受过何奖励</strong></td>
												</tr>
												<tr>
													<td colspan="2"><textarea class="tex-tarea reqired" maxlength="100" error_msg="何时何地受过何奖励" name="long[award]" cols="" rows=""></textarea></td>
												</tr>
												<tr>
													<td colspan="2"><strong>您是否受到过监管机构或行业协会（如CFA、CPA）的任何处罚以及因违规或违法受过法律处罚？如是，请具体说明：</strong></td>
												</tr>
												<tr>
													<td colspan="2"><textarea class="tex-tarea reqired" maxlength="100" error_msg="您是否受到过监管机构或行业协会（如CFA、CPA）的任何处罚以及因违规或违法受过法律处罚" name="long[punish]" cols="" rows=""></textarea></td>
												</tr>
												<tr>
													<td colspan="2"><strong>个人声明：</strong></td>
												</tr>
												<tr>
													<td colspan="2" span class="bg">本人郑重声明：本人自愿参加“福布斯.富国2010中国优选理财师评选”大赛，本人在本表中所填写的内容及所提供的参评材料是真实准确
													的。如有不实之处，主办方可取消本人参赛资格，本人愿承担由此产生的相关责任。同时，本人授权大赛组委会可将参赛作品用于大赛相关的晚
													会、活动及展出、宣传使用，并且在非商业目的之前提下，组委会可将作品用作宣传、播放、刊登或结集出版使用。</td>
												</tr>
												<tr>
													<td colspan="2" align="center"><input class="in-check" name="" type="checkbox" id="agree"/>我同意（必填）<input id="disagree" class="in-check" name="" type="checkbox" value="" />我不同意</td>
												</tr>
											</table>
											<input type="hidden" name="session" value="<?php echo $_SESSION['lcs'];?>">
											</form>
										</div>
										<div class="entryform-bottom"><img src="images/entry_3.gif" /></div>
										<div class="sure-but"><a id="form_submit" href="#">确认发布</a></div>						
									</div>	
								</div>								
							</div>
						</div>
					</div><!-- content-inner end -->		
				</div><!-- content end -->		
			</div><!-- body-inner end -->	
		</div><!-- body end -->						
	</div>
</body>
</html>


