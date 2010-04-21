<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>专题报名详情</title>
</head>
<body style="line-height:0px;">
<?php require_once('frame.php');
if($_REQUEST['id']=="")
{
	redirect('application.php');	
}
	$db=get_db();
	$app=$db->query('select * from subject_application2 where id='.$_REQUEST['id']);
?>
	<div id=ibody>
		<div id=background>
		<div id=top><IFRAME frameborder="no" border="0" scrolling=no width='980' height="277" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/top.inc.html" ></IFRAME></div>
		<div id=left>
			<form method="post" id="add" action="app.post.php">
				<div id=sub_title>参会申请</div>
				<div class=s_title>参会人员信息</div>
				<div class=tr>
					<div class=tr>公司：<input style="width:610px;" name="app[company_name]"  class="txtinput" type="text" value="<?php echo $app[0]->company_name; ?>"></div>
					<div class=td>姓名：<input style="width:280px;" name="app[name]" class="txtinput" type="text" value="<?php echo $app[0]->name; ?>"></div><div class=td>职位：<input name="app[position]" style="width:280px;" class="txtinput" type="text" value="<?php echo $app[0]->position; ?>"></div>
					<div class=td>地址：<input style="width:280px;" name="app[address]" class="txtinput" type="text" value="<?php echo $app[0]->address; ?>"></div><div class=td>邮编：<input name="app[post]" style="width:280px;" class="txtinput" type="text" value="<?php echo $app[0]->post; ?>"></div>
					<div class=td>电话：<input style="width:280px;" name="app[phone]" class="txtinput" type="text" value="<?php echo $app[0]->phone; ?>"></div><div class=td>传真：<input name="app[fax]" style="width:280px;" class="txtinput" type="text" value="<?php echo $app[0]->fax; ?>"></div>
					<div class=td>邮箱：<input style="width:280px;" name="app[email]" class="txtinput" type="text" value="<?php echo $app[0]->email; ?>"></div><div class=td>手机：<input name="app[mobile]" style="width:280px;" class="txtinput" type="text" value="<?php echo $app[0]->mobile; ?>"></div>
				</div>
				<div class=s_title>公司资料（必须填写）</div>
				<div class=s_content>
					<span style="font-weight:bold;">公司类型（请选择）</span><br>
					<input type="checkbox" name="cktype" value="1" <?php if($app[0]->company_type==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">国有企业/集体企业　　
					<input type="checkbox" name="cktype" value="2" <?php if($app[0]->company_type==2){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">外商独资企业　　
					<input type="checkbox" name="cktype" value="3" <?php if($app[0]->company_type==3){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">合资/合作企业　　
					<input type="checkbox" name="cktype" value="4" <?php if($app[0]->company_type==4){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">民营企业　　
					<input type="checkbox" name="cktype" value="5" <?php if($app[0]->company_type==5){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">政府机构/事业单位　　
					<input type="checkbox" name="cktype" value="6" <?php if(!preg_match('/^\d*$/',$app[0]->company_type)){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'cktype')">其他（请说明）<input id="othertype" onblur="fz('type')" class="txtinput" type="text" value="<?php if(!preg_match('/^\d*$/',$app[0]->company_type)){  echo $app[0]->company_type;}?>"><br><br>
					<span style="font-weight:bold;">您所在的行业</span><br>	
					<input type="checkbox" name="ckindustry" value="1" <?php if($app[0]->industry==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">制造业　
					<input type="checkbox" name="ckindustry" value="2" <?php if($app[0]->industry==2){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">进出口贸易　
					<input type="checkbox" name="ckindustry" value="3" <?php if($app[0]->industry==3){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">批发/零售/分销　
					<input type="checkbox" name="ckindustry" value="4" <?php if($app[0]->industry==4){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">产品代理　
					<input type="checkbox" name="ckindustry" value="5" <?php if($app[0]->industry==5){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">银行/金融　
					<input type="checkbox" name="ckindustry" value="6" <?php if($app[0]->industry==6){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">保险业　
					<input type="checkbox" name="ckindustry" value="7" <?php if($app[0]->industry==7){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">电信服务业　
					<input type="checkbox" name="ckindustry" value="8" <?php if($app[0]->industry==8){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">邮政服务　
					<input type="checkbox" name="ckindustry" value="9" <?php if($app[0]->industry==9){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">网络/信息服务/电子商务　
					<input type="checkbox" name="ckindustry" value="10" <?php if($app[0]->industry==10){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">公用事业　
					<input type="checkbox" name="ckindustry" value="11" <?php if($app[0]->industry==11){ ?>checked=checked<?php } ?> <?php if($app[0]->industry==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">酒店/旅游　
					<input type="checkbox" name="ckindustry" value="12" <?php if($app[0]->industry==12){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">房地产　
					<input type="checkbox" name="ckindustry" value="13" <?php if($app[0]->industry==13){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">建筑　
					<input type="checkbox" name="ckindustry" value="14" <?php if($app[0]->industry==14){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">政府机构　
					<input type="checkbox" name="ckindustry" value="15" <?php if($app[0]->industry==15){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">文化/教育/培训　
					<input type="checkbox" name="ckindustry" value="16" <?php if($app[0]->industry==16){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">法律/会计　
					<input type="checkbox" name="ckindustry" value="17" <?php if($app[0]->industry==17){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">交通运输（航空、船务、铁路、货运等）　
					<input type="checkbox" name="ckindustry" value="18" <?php if($app[0]->industry==18){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">商业咨询/顾问服务　　　
					<input type="checkbox" name="ckindustry" value="19" <?php if($app[0]->industry==19){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">媒体/公关（出版、广告、广播等）　
					<input type="checkbox" name="ckindustry" value="20" <?php if(!preg_match('/^\d*$/',$app[0]->industry)){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckindustry')">其他（请说明）<input id="otherindustry" onblur="fz('industry')" class="txtinput" type="text" value="<?php if(!preg_match('/^\d*$/',$app[0]->industry)){  echo $app[0]->industry;} ?>"><br>
					是否上市：<input class="txtinput" type="text" id="stock" name="app[isstock]" value="<?php echo $app[0]->isstock;?>">　　
					主营业务：<input class="txtinput" type="text" id="business" name="app[business]" value="<?php echo $app[0]->business;?>"><br><br>
					<span style="font-weight:bold;">职工人数：（请选择）</span><br>
					<input type="checkbox" name="ckworknum" value="1" <?php if($app[0]->worker_num==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">100人以下
					<input type="checkbox" name="ckworknum" value="2" <?php if($app[0]->worker_num==2){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">101—250
					<input type="checkbox" name="ckworknum" value="3" <?php if($app[0]->worker_num==3){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">251—500
					<input type="checkbox" name="ckworknum" value="4" <?php if($app[0]->worker_num==4){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">501—1000
					<input type="checkbox" name="ckworknum" value="5" <?php if($app[0]->worker_num==5){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">1001--5000
					<input type="checkbox" name="ckworknum" value="6" <?php if($app[0]->worker_num==6){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">5001—10000
					<input type="checkbox" name="ckworknum" value="7" <?php if($app[0]->worker_num==7){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckworknum')">10000以上<br><br>
					<span style="font-weight:bold;">公司年营业额（单位：人民币元）：（请选择）</span><br>
					<input type="checkbox" name="ckturnover" value="1" <?php if($app[0]->turnover==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">500万以下　　
					<input type="checkbox" name="ckturnover" value="2" <?php if($app[0]->turnover==2){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">501万--1000万（含）　　
					<input type="checkbox" name="ckturnover" value="3" <?php if($app[0]->turnover==3){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">1001万—5000万（含）　　
					<input type="checkbox" name="ckturnover" value="4" <?php if($app[0]->turnover==4){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">5001万—1亿（含）　　　　　
					<input type="checkbox" name="ckturnover" value="5" <?php if($app[0]->turnover==5){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">1亿—50亿（含）　　
					<input type="checkbox" name="ckturnover" value="6" <?php if($app[0]->turnover==6){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">50亿—100亿（含）　　
					<input type="checkbox" name="ckturnover" value="7" <?php if($app[0]->turnover==7){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckturnover')">100亿以上
				</div>
				<div class=s_title>参会费用：</div>
				<div class=s_content>
					人民币5500.00元/人，请于2010年3月10日前提交参会申请，逾期将不接受任何报名申请。<br>
					折扣优惠：<br>
					2010年2月12日前报名，将享有会务费用10%的折扣优惠<br>
					三人或三人以上参加此论坛，将享有会务费用10%的折扣优惠<br>	
				</div>
				<div class=s_title>付款信息:</div>
				<div class=s_content>
					付款方式：
					<input type="checkbox" name="ckpaytype" value="1" <?php if($app[0]->pay_type==1){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckpaytype')">电汇
					<input type="checkbox" name="ckpaytype" value="2" <?php if($app[0]->pay_type==2){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckpaytype')">转帐
					<input type="checkbox" name="ckpaytype" value="3" <?php if($app[0]->pay_type==3){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckpaytype')">现金
					<input type="checkbox" name="ckpaytype" value="4" <?php if($app[0]->pay_type==4){ ?>checked=checked<?php } ?> onclick="chooseOne(this,'ckpaytype')">支票<br>
					开户名：	   上海智惠文化传播有限公司<br>
					开户银行：	 中国建设银行上海浦东分行<br>
					开户帐号：   3100-1520-3130-5002-0304<br>
				</div>
		</div>
		<div id=right><IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/right.inc.html" ></IFRAME></div>
		<div id=bottom><IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/bottom.inc.html" ></IFRAME></div>	
	</div>
	</div>
</body>
</html>
