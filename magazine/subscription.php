<?php 
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-杂志赠阅</title>
	<?php
		use_jquery();
		js_include_tag('magazine/subscription','public','jquery.colorbox-min.js');
		css_include_tag('magazine/subscription','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
	<? include_once('../inc/top.inc.php');?>
		<div id=bread><a href="#">杂志赠阅</a></div>
		<div id=bread_line></div>
		<div class="con_left">
			<div class="subscription">

			<form id="subscriptionform" name="subscriptionform" action="subscription.post.php" method="post">
			  <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td><input name="sub[ApplyType]" class="ApplyType" type="radio" value="0" checked />初次申请</td>
                  <td><input name="sub[ApplyType]" class="ApplyType" type="radio" value="1" />申请续订</td>
                  <td width="300"><input type="hidden" id="applyvalue" value="0">&nbsp;</td>
                </tr>
              </table>

			  <table border="0" cellpadding="0" cellspacing="0" id="xdtable" style="display:none">
                <tr>
                  <td>重新申请的读者请注意：为更好地处理您的申请，及保持您的订阅的持续性，请填写您个人的读者编号。您的读者编号是在我们给您邮寄杂志信封上的标签的右下角，它是一个由Q开头的九位条形码的号码，号码在条形码的下方。(*为必填项)</td>
                </tr>
                <tr>
                  <td height="170" align="center"><img src="/images/magazine/pic_09.jpg" width="303" height="150" /></td>
                </tr>
                <tr>
                  <td align="center">您的读者编号 Q：<input type="text" name="sub[ReaderNo]" id="ReaderNo" maxlength="50"/></td>
                </tr>
              </table>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>我希望收到《福布斯》中文版！
                      <input type="radio" name="sub[ChineseMagazine]" class="ChineseMagazine" value="1" checked/>是
                      <input type="radio" name="sub[ChineseMagazine]" class="ChineseMagazine" value="0" />否</td>
                </tr>

                <tr>
                  <td>个人资料(请全部用中文填写完整，所填事项不完整及填写家庭地址恕不受理。)</td>
                </tr>
              </table>
			  <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="90">* 出 生 地：</td>
                  <td><input name="sub[BirthPlace]" id="BirthPlace" class=bc type="text"  maxlength="20" class="required"/><span id="checkbirthplace">&nbsp;</span><br />请输入您的出生地作为个人标志，本资料仅供确认您订阅的有效性，不会用于其他用途。</td>

                </tr>
                <tr>
                  <td width="90">* 姓　　名：</td>
                  <td><input name="sub[RealName]" id="RealName" type="text" size="35" class=bc maxlength="6" class="required"/><span id="checkrealname">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 性　　别：</td>
                  <td><select name="sub[Sex]" id="Sex" class="required">

                      <option value="男">先生</option>
                      <option value="女">女士</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>* 工作单位：</td>

                  <td><input name="sub[Company]" id="Company" class=bc type="text" size="35"  maxlength="20" class="required"/><span id="checkcompany">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 部　　门：</td>
                  <td><input name="sub[Department]" class=bc id="Department" type="text" size="35" maxlength="20" class="required"/><span id="checkdepartment">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 职　　位：</td>

                  <td><input name="sub[Position2]" class=bc id="Position2" type="text" size="35" maxlength="20" class="required"/><span id="checkPosition2">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 省/直辖市：</td>
                  <td><select  name="sub[Province]" id="Province"  size="1" class="required">
                      <option value=""> </option>
                      <option value="北京">北京</option>

                      <option value="天津">天津</option>
                      <option value="上海">上海</option>
                      <option value="重庆">重庆</option>
                      <option value="福建">福建</option>
                      <option value="甘肃">甘肃</option>
                      <option value="广东">广东</option>

                      <option value="广西">广西</option>
                      <option value="贵州">贵州</option>
                      <option value="海南">海南</option>
                      <option value="河北">河北</option>
                      <option value="黑龙江">黑龙江</option>
                      <option value="河南">河南</option>

                      <option value="湖北">湖北</option>
                      <option value="湖南">湖南</option>
                      <option value="内蒙古">内蒙古</option>
                      <option value="江苏">江苏</option>
                      <option value="江西">江西</option>
                      <option value="吉林">吉林</option>

                      <option value="辽宁">辽宁</option>
                      <option value="宁夏">宁夏</option>
                      <option value="青海">青海</option>
                      <option value="山西">山西</option>
                      <option value="陕西">陕西</option>
                      <option value="山东">山东</option>

                      <option value="四川">四川</option>
                      <option value="西藏">西藏</option>
                      <option value="新疆">新疆</option>
                      <option value="云南">云南</option>
                      <option value="浙江">浙江</option>
                      <option value="安徽">安徽</option>

                      <option value="Others">其他</option>
                  </select></td>
                </tr>
                <tr>
                  <td>* 邮　　编：</td>
                  <td><input name="sub[zipcode]" id="zipcode" type="text"  class=bc maxlength="6" class="required"/><span id="checkzipcode">&nbsp;</span></td>
                </tr>
                <tr>

                  <td>* 单位地址：</td>
                  <td><input name="sub[CompanyAddress]" id="CompanyAddress" type="text" class=bc maxlength="40" class="required"/><span id="checkcompanyaddress">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 电　　话：</td>
                  <td>
                    <input name="sub[Tel]" id="Tel" type="text"  class=bc maxlength="14" class="required" /><span id="checktel">&nbsp;</span>
                  </td>

                </tr>
                <tr>
                  <td>* 手　　机：</td>
                  <td><input name="sub[Mobile]" id="Mobile" type="text"  class=bc maxlength="13" class="required"/><span id="checkmobile">&nbsp;</span></td>
                </tr>
                <tr>
                  <td>* 传　　真：</td>
                  <td><input name="sub[Fax]" id="Fax" type="text"  class=bc maxlength="13" class="required"/><span id="checkfax">&nbsp;</span></td>

                </tr>
                <tr>
                  <td>* 电子邮件：</td>
                  <td><input name="sub[Email]" id="Email" type="text"  class=bc maxlength="40" class="required"/><span id="checkemail">&nbsp;</span></td>
                </tr>
              </table>
			  <p style="color:#FF0000">正确填写电话或手机号码将有助于您更快通过审核及获得更多优惠资讯</p>
			  <table width="100%" cellpadding="0" cellspacing="0">

                <tr>
                  <td width="150">* 您的学历是：</td>
                  <td><select  name="sub[Degree]" id="Degree"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1.博士">1.博士</option>
                      <option value="2.硕士">2.硕士</option>
                      <option value="3.大学本科 大学专科">3.大学本科/大学专科</option>

                      <option value="4.高中 中专">4.高中/中专</option>
                  </select></td>
                </tr>
				<tr>
                  <td>* 职　　位：</td>
                  <td><select  name="sub[Position]"  id="Position"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1.董事长 总裁 行政总裁 首席执行官 董事">1.董事长/总裁/行政总裁/首席执行官/董事</option>
                      <option value="2.副总裁 执行董事">2.副总裁/执行董事</option>
                      <option value="3.总经理 副总经理">3.总经理/副总经理</option>
                      <option value="4.企业所有人 企业合伙人">4.企业所有人/企业合伙人</option>
                      <option value="5.财务总监 总会计师">5.财务总监/总会计师</option>
                      <option value="6.信息系统总监 首席信息官">6.信息系统总监/首席信息官</option>
                      <option value="7.市场 销售 运营总监">7市场/销售/运营总监</option>
                      <option value="8.总工程师 高级工程师">8.总工程师/高级工程师</option>
                      <option value="9.部门经理">9.部门经理</option>
                       <option value="10.专业人士 会计师 律师 经济师 教授等">10.专业人士（会计师，律师，经济师，教授等）</option>

                      <option value="11.政府机构官员">11.政府机构官员</option>
                      <option value="12.其他">12.其他</option>
                  </select></td>
                </tr>
                <tr>
                  <td>* 贵公司的行业类型：</td>
                  <td><select  name="sub[Industry]"  id="Industry"  size="1" class="required">

                      <option value=""> </option>
                      <option value="1.制造业">1.制造业</option>
                      <option value="2.进出口贸易">2.进出口贸易</option>
                      <option value="3.批发 零售分销">3.批发/零售/分销</option>
                      <option value="4.产品代理">4.产品代理</option>
                      <option value="5.银行 金融">5.银行/金融</option>

                      <option value="6.保险业">6.保险业</option>
                      <option value="7.电信服务业">7.电信服务业</option>
                      <option value="8.邮政服务">8.邮政服务</option>
                      <option value="9.网络 信息服务 电子商务">9.网络/信息服务/电子商务</option>
                      <option value="10.公用事业">10.公用事业</option>
                      <option value="11.酒店 旅游">11.酒店/旅游</option>

                      <option value="12.房地产">12.房地产</option>
                      <option value="13.建筑">13.建筑</option>
                      <option value="14.政府机构">14.政府机构</option>
                      <option value="15.文化 教育 培训">15.文化/教育/培训</option>
                      <option value="16.交通运输 航空 船务 铁路 货运等 ">16.交通运输(航空，船务，铁路，货运等)</option>
                      <option value="17.法律 会计">17.法律/会计</option>

                      <option value="18.商业咨询 顾问服务">18.商业咨询/顾问服务</option>
                      <option value="19.媒体 公关 出版 广播 广告等 ">19.媒体/公关（出版，广播，广告等）</option>
                      <option value="20.其他">20.其他</option>
                  </select></td>
                </tr>
                <tr>
                  <td>* 贵公司的职工人数是：</td>

                  <td><select  name="sub[Employeeamount]" id="Employeeamount"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1.100人以下">1.&nbsp; 100人以下</option>
                      <option value="2.101 - 250">2.&nbsp; 101 - 250</option>
                      <option value="3.251 - 500">3.&nbsp; 251 - 500</option>
                      <option value="4.501 - 1000">4.&nbsp; 501 - 1,000</option>
                      <option value="5.1001 - 5000">5.&nbsp; 1001 - 5,000</option>
                      <option value="6.5001 - 10000">6.&nbsp; 5,001 - 10,000</option>
                      <option value="7.10000以上">7.&nbsp; 10,000以上</option>

                  </select></td>
                </tr>
                <tr>
                  <td>* 贵公司的类型是：</td>
                  <td><select  name="sub[CompanyType]" id="CompanyType"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1.国有企业 集体企业">1.国有企业/集体企业</option>
                      <option value="2.外商独资企业">2.外商独资企业</option>
                      <option value="3.合资 合作企业">3.合资/合作企业</option>
                      <option value="4.民营企业">4.民营企业</option>
                      <option value="5.政府机构 事业单位">5.政府机构/事业单位</option>
                      <option value="6.其他">6.其他</option>
                  </select></td>

                </tr>
                <tr>
                  <td>* 贵公司是否是上市公司：</td>
                  <td><select  name="sub[StockCompany]" id="StockCompany"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1">1.是</option>
                      <option value="0">2.否</option>

                  </select></td>
                </tr>
                <tr>
                  <td>* 贵公司所制造的产品：</td>
                  <td><select  name="sub[Product]"  id="Product"  size="1" class="required">
                      <option value=""> </option>
                      <option value="1.电脑 电脑配件及外设">1.电脑、电脑配件及外设</option>
                      <option value="2.电子元器件 电阻 电容 半导体等零部件 ">2.电子元器件（电阻、电容、半导体等零部件）</option>
                      <option value="3.电子消费类产品">3.电子消费类产品</option>
                      <option value="4.通讯 电力 网络等硬件设备">4.通讯、电力、网络等硬件设备</option>
                      <option value="5.汽车及汽车用品">5.汽车及汽车用品</option>
                      <option value="6.工业机械设备">6.工业机械设备</option>
                      <option value="7.建筑及家居装饰材料">7.建筑及家居装饰材料</option>
                      <option value="8.纸业 包装印刷及包装印刷器材">8.纸业、包装印刷及包装印刷器材</option>
                      <option value="9.五金制品">9.五金制品</option>
                      <option value="10.食品 食品加工及饲料">10.食品、食品加工及饲料</option>
                      <option value="11.化工产品">11.化工产品</option>
                      <option value="12.日用化工 化妆品 香料 肥皂类及其它)">12.日用化工(化妆品、香料、肥皂类及其它)</option>
                      <option value="13.生物工程 药品及医疗器械">13.生物工程、药品及医疗器械</option>
                      <option value="14.服装及饰品 纺织 皮革">14.服装及饰品、纺织、皮革</option>
                      <option value="15.钟表 相机及精密仪表">15.钟表、相机及精密仪表</option>
                      <option value="16.礼品 玩具 珠宝及文教体育用品">16.礼品、玩具、珠宝及文教体育用品</option>
                      <option value="17.其他">17.其他</option>
                  </select></td>
                </tr>
                <tr>

                  <td>&nbsp; 贵公司年营业额（可选）：</td>
                  <td><select  name="sub[turnove]" id="turnover"  size="1">
                      <option value=""> </option>
                      <option value="1.500万以下">1. 500万以下</option>
                      <option value="2.501万--1000万">2. 501万--1,000万</option>
                      <option value="3.1001万--5000万">3. 1,001万--5,000万</option>
                      <option value="4.5001万--1亿">4. 5,001万--1亿</option>
                      <option value="5.1亿零1万--50亿">5. 1亿零1万--50亿</option>
                      <option value="6.50亿零1万--100亿">6. 50亿零1万--100亿</option>
                      <option value="7.100亿以上">7. 100亿以上</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;您的年收入（可选）：</td>
                  <td><select  name="sub[Earning]" id="Earning"  size="1">
                      <option value=""> </option>
                      <option value="1.10万元人民币以内">1. 10万元人民币以内</option>
                      <option value="2.10万-299999元人民币">2. 10万-299,999元人民币</option>
                      <option value="3.30万-499999元人民币">3. 30万-499,999元人民币</option>
                      <option value="4.50万-999999元人民币">4. 50万-999,999元人民币</option>
                      <option value="5.100万人民币及以上">5. 100万人民币及以上</option>
                  </select></td>
                </tr>
				<tr>
                  <td>&nbsp;* 验证码：</td>
                  <td>
                  	<div id="rvcode"><input  name="rvcode" class="txt" type="text"></div>
                  	<div id=yzm><img id="pic" src="yz.php"></div>
                  	<div id="chang_pic">看不清楚？换张图片</div>
                  </td>

                </tr>

                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

              </table>
			  <input type="hidden" id="subscriptionsubmit" name="subscriptionsubmit" value="申请赠阅" />
			  <input type="button" id="su_bottom" value=" 提 交 "/>
			  </form>
			  </div>
		</div>
		<div id="right_inc">
			<?php include_once( dirname(__FILE__) .'/../right/ad.php');?>
			<?php include_once( dirname(__FILE__) .'/../right/magazine.php');?>
		</div>
	<? include_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>