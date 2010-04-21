<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>参会申请</title>
</head>
<body style="line-height:0px;">

	<div id=ibody>
		<div id=background>
		<div id=top><IFRAME frameborder="no" border="0" scrolling=no width='980' height="277" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/top.inc.html" ></IFRAME></div>
		<div id=left>
			<form method="post" id="add" action="app.post.php">
				<div id=sub_title>参会申请</div>
				<div class=s_title>参会人员信息</div>
				<div class=tr>
					<div class=tr>公司：<input style="width:610px;" name="app[company_name]"  class="txtinput" type="text"></div>
					<div class=td>姓名：<input style="width:280px;" name="app[name]" class="txtinput" type="text"></div><div class=td>职位：<input name="app[position]" style="width:280px;" class="txtinput" type="text"></div>
					<div class=td>地址：<input style="width:280px;" name="app[address]" class="txtinput" type="text"></div><div class=td>邮编：<input name="app[post]" style="width:280px;" class="txtinput" type="text"></div>
					<div class=td>电话：<input style="width:280px;" name="app[phone]" class="txtinput" type="text"></div><div class=td>传真：<input name="app[fax]" style="width:280px;" class="txtinput" type="text"></div>
					<div class=td>邮箱：<input style="width:280px;" name="app[email]" class="txtinput" type="text"></div><div class=td>手机：<input name="app[mobile]" style="width:280px;" class="txtinput" type="text"></div>
				</div>
				<div class=s_title>公司资料（必须填写）</div>
				<div class=s_content>
					<span style="font-weight:bold;">公司类型（请选择）</span><br>
					<input type="checkbox" name="cktype" value="1" onclick="chooseOne(this,'cktype')">国有企业/集体企业　　
					<input type="checkbox" name="cktype" value="2" onclick="chooseOne(this,'cktype')">外商独资企业　　
					<input type="checkbox" name="cktype" value="3" onclick="chooseOne(this,'cktype')">合资/合作企业　　
					<input type="checkbox" name="cktype" value="4" onclick="chooseOne(this,'cktype')">民营企业　　
					<input type="checkbox" name="cktype" value="5" onclick="chooseOne(this,'cktype')">政府机构/事业单位　　
					<input type="checkbox" name="cktype" value="6" onclick="chooseOne(this,'cktype')">其他（请说明）<input id="othertype" onblur="fz('type')" class="txtinput" type="text"><br><br>
					<span style="font-weight:bold;">您所在的行业</span><br>	
					<input type="checkbox" name="ckindustry" value="1" onclick="chooseOne(this,'ckindustry')">制造业　
					<input type="checkbox" name="ckindustry" value="2" onclick="chooseOne(this,'ckindustry')">进出口贸易　
					<input type="checkbox" name="ckindustry" value="3" onclick="chooseOne(this,'ckindustry')">批发/零售/分销　
					<input type="checkbox" name="ckindustry" value="4" onclick="chooseOne(this,'ckindustry')">产品代理　
					<input type="checkbox" name="ckindustry" value="5" onclick="chooseOne(this,'ckindustry')">银行/金融　
					<input type="checkbox" name="ckindustry" value="6" onclick="chooseOne(this,'ckindustry')">保险业　
					<input type="checkbox" name="ckindustry" value="7" onclick="chooseOne(this,'ckindustry')">电信服务业　
					<input type="checkbox" name="ckindustry" value="8" onclick="chooseOne(this,'ckindustry')">邮政服务　
					<input type="checkbox" name="ckindustry" value="9" onclick="chooseOne(this,'ckindustry')">网络/信息服务/电子商务　
					<input type="checkbox" name="ckindustry" value="10" onclick="chooseOne(this,'ckindustry')">公用事业　
					<input type="checkbox" name="ckindustry" value="11" onclick="chooseOne(this,'ckindustry')">酒店/旅游　
					<input type="checkbox" name="ckindustry" value="12" onclick="chooseOne(this,'ckindustry')">房地产　
					<input type="checkbox" name="ckindustry" value="13" onclick="chooseOne(this,'ckindustry')">建筑　
					<input type="checkbox" name="ckindustry" value="14" onclick="chooseOne(this,'ckindustry')">政府机构　
					<input type="checkbox" name="ckindustry" value="15" onclick="chooseOne(this,'ckindustry')">文化/教育/培训　
					<input type="checkbox" name="ckindustry" value="16" onclick="chooseOne(this,'ckindustry')">法律/会计　
					<input type="checkbox" name="ckindustry" value="17" onclick="chooseOne(this,'ckindustry')">交通运输（航空、船务、铁路、货运等）　
					<input type="checkbox" name="ckindustry" value="18" onclick="chooseOne(this,'ckindustry')">商业咨询/顾问服务　　　
					<input type="checkbox" name="ckindustry" value="19" onclick="chooseOne(this,'ckindustry')">媒体/公关（出版、广告、广播等）　
					<input type="checkbox" name="ckindustry" value="20" onclick="chooseOne(this,'ckindustry')">其他（请说明）<input id="otherindustry" onblur="fz('industry')" class="txtinput" type="text"><br>
					是否上市：<input class="txtinput" type="text" id="stock" name="app[isstock]">　　
					主营业务：<input class="txtinput" type="text" id="business" name="app[business]"><br><br>
					<span style="font-weight:bold;">职工人数：（请选择）</span><br>
					<input type="checkbox" name="ckworknum" value="1" onclick="chooseOne(this,'ckworknum')">100人以下
					<input type="checkbox" name="ckworknum" value="2" onclick="chooseOne(this,'ckworknum')">101—250
					<input type="checkbox" name="ckworknum" value="3" onclick="chooseOne(this,'ckworknum')">251—500
					<input type="checkbox" name="ckworknum" value="4" onclick="chooseOne(this,'ckworknum')">501—1000
					<input type="checkbox" name="ckworknum" value="5" onclick="chooseOne(this,'ckworknum')">1001--5000
					<input type="checkbox" name="ckworknum" value="6" onclick="chooseOne(this,'ckworknum')">5001—10000
					<input type="checkbox" name="ckworknum" value="7" onclick="chooseOne(this,'ckworknum')">10000以上<br><br>
					<span style="font-weight:bold;">公司年营业额（单位：人民币元）：（请选择）</span><br>
					<input type="checkbox" name="ckturnover" value="1" onclick="chooseOne(this,'ckturnover')">500万以下　　
					<input type="checkbox" name="ckturnover" value="2" onclick="chooseOne(this,'ckturnover')">501万--1000万（含）　　
					<input type="checkbox" name="ckturnover" value="3" onclick="chooseOne(this,'ckturnover')">1001万—5000万（含）　　
					<input type="checkbox" name="ckturnover" value="4" onclick="chooseOne(this,'ckturnover')">5001万—1亿（含）　　　　　
					<input type="checkbox" name="ckturnover" value="5" onclick="chooseOne(this,'ckturnover')">1亿—50亿（含）　　
					<input type="checkbox" name="ckturnover" value="6" onclick="chooseOne(this,'ckturnover')">50亿—100亿（含）　　
					<input type="checkbox" name="ckturnover" value="7" onclick="chooseOne(this,'ckturnover')">100亿以上
				</div>
				<div class=s_title>参会费用：</div>
				<div class=s_content>
					人民币5500.00元/人，请于2010年3月10日前提交参会申请，逾期将不接受任何报名申请。<br>
					折扣优惠：<br>
					2010年2月12日前报名，将享有会务费用9折优惠<br>
				</div>
				<div class=s_title>付款信息:</div>
				<div class=s_content>
					付款方式：
					<input type="checkbox" name="ckpaytype" value="1" onclick="chooseOne(this,'ckpaytype')">电汇
					<input type="checkbox" name="ckpaytype" value="2" onclick="chooseOne(this,'ckpaytype')">转帐
					<input type="checkbox" name="ckpaytype" value="4" onclick="chooseOne(this,'ckpaytype')">支票<br>
					开户名：	   上海智惠文化传播有限公司<br>
					开户银行：	 中国建设银行上海浦东分行<br>
					开户帐号：   3100-1520-3130-5002-0304<br><br>
					·与会来宾资格，经主办方审核后发送正式请柬确认，参会人士请凭请柬于当日到会场签到处签到入场。<br>
					·参会费包括参加全天论坛、午餐、茶点以及所有会议资料的费用，不包括旅行和酒店的费用。<br>
					·提交报名申请后，会议主办方将电话和参会人员确认报名，请于确认后一周内付清参会费用以保留参会资格。<br>
					·报名付费后，本人的名额可转让他人；若要退款，主办方将扣除50%的费用。<br>
					·如果活动被取消，将提供全额退款。<br>
					·《福布斯》中文版保留对活动的最终解释权。<br><br>
					<input type="hidden" name="app[company_type]" id="type">
					<input type="hidden" name="app[industry]" id="industry">
					<input type="hidden" name="app[worker_num]" id="worknum">
					<input type="hidden" name="app[turnover]" id="turnover">
					<input type="hidden" name="app[pay_type]" id="paytype">
				</div>
				<div style="width:662px; text-align:center; float:left; display:inline;"><input type="submit" value="提交" onclick="return check();"></div>
			<form>
		</div>
		<div id=right>
			<IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/right.inc.html" ></IFRAME>
		</div>
		<div id=right_b>
			<span style="font-weight:bold;">赞助及嘉宾：<br>
			朱先生</span><br>
			电话:021-68413905<br>
			传真:021-68412942<br>
			邮件:<a style="text-decoration:underline;" href="mailto:Robert.Zhu@forbeschinamagazine.com">Robert.Zhu@forbeschinamagazine.com</a><br><br>
			<span style="font-weight:bold;">媒体及注册：<br>
			刘小姐</span><br>
			电话:021-68412915<br>
			传真:021-68412942<br>
			邮件:<a style="text-decoration:underline;" href="mailto:Liu.chen@forbeschinamagazine.com">Liu.chen@forbeschinamagazine.com</a><br><br>
			<span style="font-weight:bold;">报名及参会：<br>
			何小姐</span><br>
			电话:021-68412924<br>
			传真:021-68412942<br>
			邮件:<a style="text-decoration:underline;" href="mailto:Lily.He@forbeschinamagazine.com ">Lily.He@forbeschinamagazine.com </a><br>
		</div>
		<div id=bottom><IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/bottom.inc.html" ></IFRAME></div>	
		</div>
	</div>
</body>
</html>
<script>
	 function fz(kj)
	 {
	 	document.getElementById(kj).value=document.getElementById('other'+kj).value;
	 }
	 function check()
	 {
	 	if(document.getElementById('stock').value==""||document.getElementById('business').value=="")
	 	{
	 		alert('请填写完整信息！');
	 		return false;	
	 	}
	 	else if(document.getElementById('type').value=="")
	 	{
	 		alert('请填写公司类型！');
	 		return false;		
	 	}
	 	else if(document.getElementById('industry').value=="")
	 	{
	 		alert('请填写所在行业！');
	 		return false;		
	 	}
	 	else
	 	{
	 		return true;	
	 	}
	 }
   function chooseOne(cb,ckname){
     var obj = document.getElementsByName(ckname);   
     for (i=0; i<obj.length; i++){   
         if (obj[i]!=cb)
         {
         	obj[i].checked = false;
         }  
         else
         { 
         	obj[i].checked = true;
         	var hiddenid=ckname.substr(2);
         	document.getElementById(hiddenid).value=obj[i].value;
         	if(ckname=='cktype'&&obj[i].value==6)
         	{
         		document.getElementById('type').value=document.getElementById('othertype').value;
         	}
         	if(ckname=='ckindustry'&&obj[i].value==20)
         	{
         		document.getElementById('industry').value=document.getElementById('otherindustry').value;
         	}
         }   
     }   
   }   
 </script>  
