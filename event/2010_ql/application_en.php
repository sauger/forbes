<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Application</title>
</head>
<body style="line-height:0px;">
	<div id=ibody>
		<div id=background>
		<div id=top><IFRAME frameborder="no" border="0" scrolling=no width='980' height="277" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/top_en.inc.html" ></IFRAME></div>
		<div id=left>
			<form method="post" id="add" action="app.post.php">
				<div id=sub_title>Application</div>
				<div class=s_title>Applicant Information</div>
				<div class=tr>
					<div class=tr>Company：<input style="width:580px;" name="app[company_name]"  class="txtinput" type="text"></div>	
					<div class=td>Name：<input style="width:220px;" name="app[name]" class="txtinput" type="text"></div><div class=td>Position：<input name="app[position]" style="width:220px;" class="txtinput" type="text"></div>
					<div class=td>Address：<input style="width:220px;" name="app[address]" class="txtinput" type="text"></div><div class=td>Code：<input name="app[post]" style="width:220px;" class="txtinput" type="text"></div>
					<div class=td>Phone：<input style="width:220px;" name="app[phone]" class="txtinput" type="text"></div><div class=td>Fax：<input name="app[fax]" style="width:220px;" class="txtinput" type="text"></div>
					<div class=td>Email：<input style="width:220px;" name="app[email]" class="txtinput" type="text"></div><div class=td>Mobile：<input name="app[mobile]" style="width:220px;" class="txtinput" type="text"></div>
				</div>
				<div class=s_title>Company Information（Required）：</div>
				<div class=s_content>
					<span style="font-weight:bold;">Type of Company：（Select）</span><br>
					<input type="checkbox" name="cktype" value="1" onclick="chooseOne(this,'cktype')">State-owned enterprise
					<input type="checkbox" name="cktype" value="2" onclick="chooseOne(this,'cktype')">Foreign-owned enterprise
					<input type="checkbox" name="cktype" value="3" onclick="chooseOne(this,'cktype')">joint venture enterprise
					<input type="checkbox" name="cktype" value="4" onclick="chooseOne(this,'cktype')">Private enterprise
					<input type="checkbox" name="cktype" value="5" onclick="chooseOne(this,'cktype')">Government / Institution
					<input type="checkbox" name="cktype" value="6" onclick="chooseOne(this,'cktype')">Others<input id="othertype" onblur="fz('type')" class="txtinput" type="text"><br><br>
					<span style="font-weight:bold;">Industry</span><br>	
					<input type="checkbox" name="ckindustry" value="1" onclick="chooseOne(this,'ckindustry')">Manufacturing　
					<input type="checkbox" name="ckindustry" value="2" onclick="chooseOne(this,'ckindustry')">Import and export trade
					<input type="checkbox" name="ckindustry" value="3" onclick="chooseOne(this,'ckindustry')">Wholesale / Retail / Distribution
					<input type="checkbox" name="ckindustry" value="4" onclick="chooseOne(this,'ckindustry')">Product Agent
					<input type="checkbox" name="ckindustry" value="5" onclick="chooseOne(this,'ckindustry')">Banking / Finance / Insurance
					<input type="checkbox" name="ckindustry" value="6" onclick="chooseOne(this,'ckindustry')">Telecommunications services
					<input type="checkbox" name="ckindustry" value="7" onclick="chooseOne(this,'ckindustry')">Postal Service
					<input type="checkbox" name="ckindustry" value="8" onclick="chooseOne(this,'ckindustry')">Construction
					<input type="checkbox" name="ckindustry" value="9" onclick="chooseOne(this,'ckindustry')">Network / Information Services / E-commerce　
					<input type="checkbox" name="ckindustry" value="11" onclick="chooseOne(this,'ckindustry')">Hotel / Travel　
					<input type="checkbox" name="ckindustry" value="12" onclick="chooseOne(this,'ckindustry')">Real Estate　
					<input type="checkbox" name="ckindustry" value="13" onclick="chooseOne(this,'ckindustry')">Utilities　
					<input type="checkbox" name="ckindustry" value="14" onclick="chooseOne(this,'ckindustry')">government organization　
					<input type="checkbox" name="ckindustry" value="15" onclick="chooseOne(this,'ckindustry')">Culture / Education / Training　
					<input type="checkbox" name="ckindustry" value="16" onclick="chooseOne(this,'ckindustry')">Legal / Accounting　
					<input type="checkbox" name="ckindustry" value="17" onclick="chooseOne(this,'ckindustry')">Transportation　
					<input type="checkbox" name="ckindustry" value="18" onclick="chooseOne(this,'ckindustry')">Business Advisory / Consultancy Services　
					<input type="checkbox" name="ckindustry" value="19" onclick="chooseOne(this,'ckindustry')">Media / PR　
					<input type="checkbox" name="ckindustry" value="20" onclick="chooseOne(this,'ckindustry')">Others<input id="otherindustry" onblur="fz('industry')" class="txtinput" type="text"><br>
					Whether listed：<input class="txtinput" type="text" id="stock" name="app[isstock]">　　
					Main Business：<input class="txtinput" type="text" id="business" name="app[business]"><br><br>
					<span style="font-weight:bold;">Employees：（Select）</span><br>
					<input type="checkbox" name="ckworknum" value="1" onclick="chooseOne(this,'ckworknum')">Below 100
					<input type="checkbox" name="ckworknum" value="2" onclick="chooseOne(this,'ckworknum')">101—250
					<input type="checkbox" name="ckworknum" value="3" onclick="chooseOne(this,'ckworknum')">251—500
					<input type="checkbox" name="ckworknum" value="4" onclick="chooseOne(this,'ckworknum')">501—1000
					<input type="checkbox" name="ckworknum" value="5" onclick="chooseOne(this,'ckworknum')">1001--5000
					<input type="checkbox" name="ckworknum" value="6" onclick="chooseOne(this,'ckworknum')">5001—10000
					<input type="checkbox" name="ckworknum" value="7" onclick="chooseOne(this,'ckworknum')">Above 10000<br><br>
					<span style="font-weight:bold;">Turnover of company（Unit：RMB）：（Select）</span><br>
					<input type="checkbox" name="ckturnover" value="1" onclick="chooseOne(this,'ckturnover')">Below 5,000,000（Including）
					<input type="checkbox" name="ckturnover" value="2" onclick="chooseOne(this,'ckturnover')">5,000,000—10,000,000（Including）
					<input type="checkbox" name="ckturnover" value="3" onclick="chooseOne(this,'ckturnover')">10,000,000—50,000,000（Including）
					<input type="checkbox" name="ckturnover" value="4" onclick="chooseOne(this,'ckturnover')">50,000,000—100,000,000（Including）
					<input type="checkbox" name="ckturnover" value="5" onclick="chooseOne(this,'ckturnover')">100,000,000—5,000,000,000（Including）
					<input type="checkbox" name="ckturnover" value="6" onclick="chooseOne(this,'ckturnover')">5,000,000,000—10,000,000,000（Including）　　
					<input type="checkbox" name="ckturnover" value="7" onclick="chooseOne(this,'ckturnover')">Above 10,000,000,000
				</div>
				<div class=s_title>Participants fees：</div>
				<div class=s_content>
					RMB 5500.00 /person，Please submit your application before Mar 10th, 2010. Late application will not be accepted.<br>
					Discount：<br>
					10% discount if enrollment before Feb 12th, 2010.<br>
					20% discount if 3 or more persons participating the forum. <br>	
				</div>
				<div class=s_title>Payment Information </div>
				<div class=s_content>
					Payment：
					<input type="checkbox" name="ckpaytype" value="1" onclick="chooseOne(this,'ckpaytype')">Telegraphic transfer
					<input type="checkbox" name="ckpaytype" value="2" onclick="chooseOne(this,'ckpaytype')">Transfer of account 
					<input type="checkbox" name="ckpaytype" value="4" onclick="chooseOne(this,'ckpaytype')">Check<br>
					Account Name：	   Shanghai Wise Wealth Media Co., Lid <br>
					Deposit bank：	 China Construction Bank, Shanghai Pudong Branch<br>
					Account：   3100-1520-3130-5002-0304<br><br>
					·Organizer will send formal invitation when the participant is confirmed. Please come to forum registration place with invitation and business card.<br>
					·The fee includes all-day forum, lunch, refreshment and all conference materials, not including travel and hotel cost. <br>
					·Organizer will confirm the registration information with applicants in call. Please make the payment within one week to retain the qualified participant.<br>
					·The quota could transfer to others after payment. To refund, organizer will deduct 50% of the fee.<br>
					·If the forum is canceled, will provide a full refund.<br>
					·Forbes China retains the ultimate power of interpretation of the forum.<br>
					<input type="hidden" name="app[company_type]" id="type">
					<input type="hidden" name="app[industry]" id="industry">
					<input type="hidden" name="app[worker_num]" id="worknum">
					<input type="hidden" name="app[turnover]" id="turnover">
					<input type="hidden" name="app[pay_type]" id="paytype">
				</div>
				<div style="width:662px; text-align:center; float:left; display:inline;"><input type="submit" value="submit" onclick="return check();"></div>
			<form>
		</div>
		<div id=right2>
			<IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/right_en.inc.html" ></IFRAME>
		</div>
		<div id=right_b>
			<span style="font-weight:bold;">Sponsorship：<br>
			Mr. Zhu</span><br>
			TEL:021-68413905<br>
			FAX:021-68412942<br>
			EMAIL:<br><a style="text-decoration:underline;" href="mailto:Robert.Zhu@forbeschinamagazine.com">Robert.Zhu@forbeschinamagazine.com</a><br><br>
			<span style="font-weight:bold;">Media:<br>
			Ms. Gu</span><br>
			TEL:021-68412936<br>
			FAX:021-68412942<br>
			EMAIL:<br><a style="text-decoration:underline;" href="mailto:Michelle.Gu@forbeschinamagazine.com">Michelle.Gu@forbeschinamagazine.com</a><br><br>
			<span style="font-weight:bold;">Registration:<br>
			Ms. He</span><br>
			TEL:021-68412924<br>
			FAX:021-68412942<br>
			EMAIL:<br><a style="text-decoration:underline;" href="mailto:Lily.He@forbeschinamagazine.com ">Lily.He@forbeschinamagazine.com </a><br>
		</div>
		<div id=bottom><IFRAME frameborder="no" border="0" scrolling=no width='100%' height="100%" marginwidth=0 marginheight=0 allowTransparency="true" SRC="inc/bottom_en.inc.html" ></IFRAME></div>	
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
	 		alert('Incomplete information!');
	 		return false;	
	 	}
	 	else if(document.getElementById('type').value=="")
	 	{
	 		alert('Incomplete information!');
	 		return false;		
	 	}
	 	else if(document.getElementById('industry').value=="")
	 	{
	 		alert('Incomplete information!');
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
