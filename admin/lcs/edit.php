<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id = $_GET['id'];
	$lcs = new table_class('fb_lcs');
	$lcs->find($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>福布斯·富国中国优选理财师评选</title>
<link href="/event/lcs/css/basic.css" rel="stylesheet" type="text/css" />
<link href="/event/lcs/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container"><!-- container begin -->
		<div id="container-inner"><!-- container-inner begin -->
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
													<td width="365" class="bb" span>姓名：</td>
													<td width="429"><?php echo $lcs->name;?></td>
												</tr>
												<tr>
													<td class="bb">性别：</td>
													<td>
														<?php echo $lcs->sex;?>
													</td>
												</tr>
												<tr>
													<td class="bb">年龄：</td>
													<td><?php echo $lcs->age;?></td>
												</tr>
												<tr>
													<td class="bb">电子邮箱：</td>
													<td><?php echo $lcs->email;?></td>
												</tr>
												<tr>
													<td class="bb">固定电话：</td>
													<td><?php echo $lcs->fix_phone;?></td>
												</tr>
												<tr>
													<td class="bb">手机：</td>
													<td><?php echo $lcs->phone;?></td>
												</tr>
												<tr>
													<td class="bb">您的工作地点：</td>
													<td>
														<?php echo $lcs->ccq;?>
													</td>
												</tr>
												<tr>
													<td class="bb">您已获得的最高学历为：</td>
													<td>
														<?php echo $lcs->education;?>
													</td>
												</tr>
												<tr>
													<td class="bb">最高学历的毕业院校为：</td>
													<td>
														<?php echo $lcs->school;?>
														所学专业：
														<?php echo $lcs->specialty;?>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<table class="table2">
															<tr>
																<td colspan="4" align="left">清填写您的学业经历（从高往底开始填写）</td>
															</tr>
															<tr>
																<td class="td2"><strong>毕业院校</strong></td>
																<td class="td2"><strong>主修专业</strong></td>
																<td class="td2"><strong>学历学位</strong></td>
																<td class="td2"><strong>起止日期</strong></td>
															</tr>
															<?php 
																$school_info = $lcs->school_info;
																$school_info = explode("&&",$school_info);
																$si0 = explode('+',$school_info[0]);
																$si1 = explode('+',$school_info[1]);
																$si2 = explode('+',$school_info[2]);
																$si3 = explode('+',$school_info[3]);
															?>
															<tr>
																<td class="td3"><?php echo $si0[0];?></td>
																<td class="td3"><?php echo $si1[0];?></td>
																<td class="td3"><?php echo $si2[0];?></td>
																<td class="td3"><?php echo $si3[0];?></td>
															</tr>
															<tr>
																<td class="td3"><?php echo $si0[1];?></td>
																<td class="td3"><?php echo $si1[1];?></td>
																<td class="td3"><?php echo $si2[1];?></td>
																<td class="td3"><?php echo $si3[1];?></td>
															</tr>
															<tr>
																<td class="td3"><?php echo $si0[2];?></td>
																<td class="td3"><?php echo $si1[2];?></td>
																<td class="td3"><?php echo $si2[2];?></td>
																<td class="td3"><?php echo $si3[2];?></td>
															</tr>
														</table>													</td>
												</tr>
												<tr> 
												<?php 
													$certificate = explode("&&",$lcs->certificate);
												?>
													<td colspan="2">
														<table class="table2">                                            
															<tr>
																<td rowspan="6" width="30%" valign="top" span class="bb" >您获得的资格或认证有（可多选）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('国际金融理财师（CFP）',$certificate))echo "checked='checked'";?> value="国际金融理财师（CFP）" />国际金融理财师（CFP）</td>
															  	<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('金融理财师（AFP）',$certificate))echo "checked='checked'";?> value="金融理财师（AFP）" />金融理财师（AFP）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('金融理财管理师（EFP）',$certificate))echo "checked='checked'";?> value="金融理财管理师（EFP）" />金融理财管理师（EFP）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('特许金融分析师（CFA）',$certificate))echo "checked='checked'";?> value="特许金融分析师（CFA）" />特许金融分析师（CFA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('风险管理师（FRM）',$certificate))echo "checked='checked'";?> value="风险管理师（FRM）" />风险管理师（FRM）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('注册资产评估师（CPV）',$certificate))echo "checked='checked'";?> value="注册资产评估师（CPV）" />注册资产评估师（CPV）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('注册税务师（CTA）',$certificate))echo "checked='checked'"?> value="注册税务师（CTA）" />注册税务师（CTA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('注册房地产估价师（CREA）',$certificate))echo "checked='checked'"?> value="注册房地产估价师（CREA）" />注册房地产估价师（CREA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('注册会计师（CPA）',$certificate))echo "checked='checked'"?> value="注册会计师（CPA）" />注册会计师（CPA）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('注册财务策划师（RFP）',$certificate))echo "checked='checked'"?> value="注册财务策划师（RFP）" />注册财务策划师（RFP）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('v',$certificate))echo "checked='checked'"?> value="国际认证财务顾问师（RFC）" />国际认证财务顾问师（RFC）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('特许财富管理师（CWM）',$certificate))echo "checked='checked'"?> value="特许财富管理师（CWM）" />特许财富管理师（CWM）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('中国注册理财规划师协会（CICFP）',$certificate))echo "checked='checked'"?> value="中国注册理财规划师协会（CICFP）" />中国注册理财规划师协会（CICFP）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('理财规划师国家职业资格认证（CHFP）',$certificate))echo "checked='checked'"?> value="理财规划师国家职业资格认证（CHFP）" />理财规划师国家职业资格认证（CHFP）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('中国银行业从业人员资格认证（CCBP）',$certificate))echo "checked='checked'"?> value="中国银行业从业人员资格认证（CCBP）" />中国银行业从业人员资格认证（CCBP）</td>
															</tr>
															<tr>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('国际注册内部审计师（CIA）',$certificate))echo "checked='checked'"?> value="国际注册内部审计师（CIA）" />国际注册内部审计师（CIA）</td>
																<td><input class="in-check reqired" name="certificate[]" type="checkbox" <?php if(in_array('其他（请具体写明）',$certificate))echo "checked='checked'"?> value="其他（请具体写明）" />其他（请具体写明）</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td class="bb">您目前所在的工作单位请明确到<br>（部门、网点、职务）：</td>
																<td colspan="3">
																	<?php
																		$workspace = explode("&&",$lcs->work_space);
																		echo $workspace[0];
																	?>
																	属于：<?php echo $workspace[1];?>
																	</select>																</td>
															</tr>
															<tr>
																<td class="bb">您的工作年限：</td>
																<td colspan="3">
																	<?php echo $lcs->work_year;?>
																	<span class="bb">参与理财工作年限：</span>
																	<?php echo $lcs->money_year;?>
																</td>
															</tr>
															<tr>
																<td class="bb">理财工作中您主要担任的角色为：</td>
																<td colspan="3">
																	<?php echo $lcs->role;?>															</td>
															</tr>
														</table>													</td>
												</tr>
												<tr>
												  <td colspan="2">
													  <table>                                                    
														<tr>
														<?php $time = explode('&&',$lcs->time_dealing);?>
													      <td class="bb"><strong>您在工作中，客户关系管理与专业理财服务的时间分配</strong></td>
														   <td><input class="iput-title reqired" type="text" value="<?php echo $time[0];?>"/><input class="iput-title" type="text" value="<?php echo $time[1];?>" /></td>
														</tr>
														<tr>
														  <td class="bb">请简单列举您在实际工作中常用的开发和维护客户关系的方式</td>
															<td><textarea class="tex-tarea-o reqired" maxlength="100" name="long[work_mode]" cols="" rows=""><?php echo $lcs->work_mode;?></textarea></td>
														</tr>
												    </table></td>
											  </tr>
												
												
												
												<tr>
												  <td colspan="2"><table class="table2">
                                                    <tr>
                                                      <td colspan="3" align="left">理财工作心得（控制在200字内） </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                      <td colspan="3">
                                                        <textarea class="tex-tarea reqired" maxlength="200" error_msg="理财工作心得" name="long[experience]" cols="" rows=""><?php echo $lcs->experience;?></textarea>
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
															<?php 
																$school_info = $lcs->information_references;
																$school_info = explode("&&",$school_info);
																$si0 = explode('+',$school_info[0]);
																$si1 = explode('+',$school_info[1]);
																$si2 = explode('+',$school_info[2]);
															?>
															<tr>
																<td class="td3"><?php echo $si0[0];?></td>
																<td class="td3"><?php echo $si1[0];?></td>
																<td class="td3"><?php echo $si2[0];?></td>
															</tr>
															<tr>
																<td class="td3"><?php echo $si0[1];?></td>
																<td class="td3"><?php echo $si1[1];?></td>
																<td class="td3"><?php echo $si2[1];?></td>
															</tr>
															<tr>
																<td class="td3"><?php echo $si0[2];?></td>
																<td class="td3"><?php echo $si1[2];?></td>
																<td class="td3"><?php echo $si2[2];?></td>
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
															<?php $money_time = explode("&&",$lcs->money_time);?>
																<td class="bb">家庭（个人）财务分析：</td><td><?php echo $money_time[0]?>%</td>
																<td class="bb">资产管理或投资规划：</td><td><?php echo $money_time[1]?>%</td>
															</tr>
															<tr>
																<td class="bb">风险管理或保险规划：</td><td><?php echo $money_time[2]?>%</td>
																<td class="bb">子女教育金规划：</td><td><?php echo $money_time[3]?>%</td>
															</tr>
															<tr>
																<td class="bb">换房规划：</td><td><?php echo $money_time[4]?>%</td>
																<td class="bb">税务筹划：</td><td><?php echo $money_time[5]?>%</td>
															</tr>
															<tr>
																<td class="bb">退休规划：</td><td><?php echo $money_time[6]?>%</td>
																<td class="bb">遗产规划：</td><td><?php echo $money_time[7]?>%</td>
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
															<?php 
																$db = get_db();
																$info = $db->query("select * from fb_lcs_data where lcs_id=$id order by year");
															?>
																<td width="25%" align="center" class="td2">&nbsp;</td>
																<td width="25%" align="center" class="td2"><strong>2008年度</strong></td>
																<td width="25%" align="center" class="td2"><strong>2009年度</strong></td>
																<td width="25%" align="center" class="td2"><strong>2010年（截止2010-6-30）</strong></td>
															</tr>
															<tr>
																<td class="td3">年末在您名下或直接管理和维护的客户数*</td>
																<td class="td3" ><?php echo $info[0]->nmzj;?></td>
																<td class="td3" ><?php echo $info[1]->nmzj;?></td>
																<td class="td3" ><?php echo $info[2]->nmzj;?></td>
															</tr>
															<tr>
																<td class="td3">年平均管理资产总量（万元）</td>
																<td class="td3" ><?php echo $info[0]->npjzc;?></td>
																<td class="td3" ><?php echo $info[1]->npjzc;?></td>
																<td class="td3" ><?php echo $info[2]->npjzc;?></td>
															</tr>
															<tr>
																<td class="td3">年末在管资产存量市值（万元）</td>
																<td class="td3" ><?php echo $info[0]->nmzc;?></td>
																<td class="td3" ><?php echo $info[1]->nmzc;?></td>
																<td class="td3" ><?php echo $info[2]->nmzc;?></td>
															</tr>
															<tr>
																<td class="td3">年金融产品销售量（万）</td>
																<td class="td3" ><?php echo $info[0]->nxc;?></td>
																<td class="td3" ><?php echo $info[1]->nxc;?></td>
																<td class="td3" ><?php echo $info[2]->nxc;?></td>
															</tr>
															<tr>
																<td class="td3">全年金融产品（含基金、银行理财产品、债券、股票等）销售量（万元）</td>
																<td class="td3" ><?php echo $info[0]->qncp;?></td>
																<td class="td3" ><?php echo $info[1]->qncp;?></td>
																<td class="td3" ><?php echo $info[2]->qncp;?></td>
															</tr>
															<tr>
																<td class="td3">全年保单销售量（万元）</td>
																<td class="td3" ><?php echo $info[0]->qnbd;?></td>
																<td class="td3" ><?php echo $info[1]->qnbd;?></td>
																<td class="td3" ><?php echo $info[2]->qnbd;?></td>
															</tr>
															<tr>
																<td class="td3">单个客户的平均资产规模（万元）</td>
																<td class="td3" ><?php echo $info[0]->dggm;?></td>
																<td class="td3" ><?php echo $info[1]->dggm;?></td>
																<td class="td3" ><?php echo $info[2]->dggm;?></td>
															</tr>
															<tr>
																<td class="td3">年末在管理单一客户的平均资产规模（万元）</td>
																<td class="td3" ><?php echo $info[0]->nmgm;?></td>
																<td class="td3" ><?php echo $info[1]->nmgm;?></td>
																<td class="td3" ><?php echo $info[2]->nmgm;?></td>
															</tr>
															<tr>
																<td class="td3">年末在管前10大客户的平均资产规模（万元）</td>
																<td class="td3" ><?php echo $info[0]->pjgm;?></td>
																<td class="td3" ><?php echo $info[1]->pjgm;?></td>
																<td class="td3" ><?php echo $info[2]->pjgm;?></td>
															</tr>
												 	  </table>													</td>
												</tr>
												<tr>
													<td colspan="2"><strong>何时何地受过何奖励</strong></td>
												</tr>
												<tr>
													<td colspan="2"><textarea class="tex-tarea reqired" maxlength="100" error_msg="何时何地受过何奖励" name="long[award]" cols="" rows=""><?php echo $lcs->award;?></textarea></td>
												</tr>
												<tr>
													<td colspan="2"><strong>您是否受到过监管机构或行业协会（如CFA、CPA）的任何处罚以及因违规或违法受过法律处罚？如是，请具体说明：</strong></td>
												</tr>
												<tr>
													<td colspan="2"><textarea class="tex-tarea reqired" maxlength="100" error_msg="您是否受到过监管机构或行业协会（如CFA、CPA）的任何处罚以及因违规或违法受过法律处罚" name="long[punish]" cols="" rows=""><?php echo $lcs->punish;?></textarea></td>
												</tr>
												<tr>
													<td colspan="2"><strong>个人声明：</strong></td>
												</tr>
												<tr>
													<td colspan="2" span class="bg">本人郑重声明：本人自愿参加“福布斯.富国2010中国优选理财师评选”大赛，本人在本表中所填写的内容及所提供的参评材料是真实准确
													的。如有不实之处，主办方可取消本人参赛资格，本人愿承担由此产生的相关责任。同时，本人授权大赛组委会可将参赛作品用于大赛相关的晚
													会、活动及展出、宣传使用，并且在非商业目的之前提下，组委会可将作品用作宣传、播放、刊登或结集出版使用。</td>
												</tr>
											</table>
											<input type="hidden" name="session" value="<?php echo $_SESSION['lcs'];?>">
											</form>
										</div>
										<div class="entryform-bottom"><img src="images/entry_3.gif" /></div>
										<div class="sure-but"><a id="form_submit" href="index.php">点击返回</a></div>						
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


