<?php
	session_start();
	include_once( dirname(__FILE__) .'/../../frame.php');
	if(!isset($_SESSION['zzh'])){
		 $_SESSION['zzh'] = rand_str();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>
<?php 
	use_jquery_ui();
?>
<script type="text/javascript" language="javascript" src="form.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
		<div id="container-inner"><!-- container-inner begin -->
			<div id="body"><!-- body begin -->					
				<div id="body-inner"><!-- body-inner begin -->
					<div id="content"><!-- content begin -->
						<div id="content-inner" class="clear"><!-- content-inner begin -->
							<div id="body-left"><!-- body-left begin -->
								<?php include 'left.php';?>
							</div><!-- left end-->
							<div id="body-right"><!-- right begin-->
								<div class="right-bg-top"><img src="images/right-top.gif" /></div>
								<div class="right-warp">																	
									<div class="r-m-t-two" style="margin:0px">
									  <div class="main" style="padding:10px 0;">
									  	<form action="user.post.php" method="post">
												<p class="t-title"><img src="images/t-list.gif" /><strong>在线申请</strong></p>
									    		<table style="margin-top:50px">
												  <tr>
													<td width="30%" class="bb">姓 名<span class="star">*</span></td>
													<td><input class="input-title reqired" type="text" maxlength="10" name="post[name]">
													  <input type="radio" error_msg="性别" class="radio reqired" name="post[sex]" value="先生"/>先生
											          <input type="radio" error_msg="性别" class="radio reqired" name="post[sex]" value="女生"/>女生</td>
											      </tr>
												  <tr>
												    <td class="bb">公司名称<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="20" name="post[company_name]" /></td>
												    </tr>
												  <tr>
												    <td class="bb">所属类型<span class="star">*</span></td>
												    <td>
												    	<select class="input-title2 reqired" name="post[item_type]" />
												    		<option value="风险投资">风险投资</option>
												    		<option value="出售企业">出售企业</option>
												    		<option value="天使投资">天使投资</option>
												    	</select>
												    </td>
												    </tr>
												  <tr>
												    <td class="bb">所在地域<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="20" name="post[company_location]" /></td>
											      </tr>
												  <tr>
												    <td class="bb">雇佣人数<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="10" name="post[company_size]" /></td>
											      </tr>
												  <tr>
												    <td class="bb">联系人部门<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="20" name="post[department]" /></td>
												    </tr>
												  <tr>
												    <td class="bb">联系人职务<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="10" name="post[post]" /></td>
												    </tr>
												  <tr>
												    <td class="bb">联系人电话<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" maxlength="20" name="post[phone]" /></td>
												    </tr>
												  <tr>
												    <td class="bb">手 机<span class="star">*</span></td>
												    <td><input class="input-title2 reqired number" type="text" maxlength="11" surelength="11" name="post[mobile]" /></td>
												    </tr>
												  <tr>
												    <td class="bb">传 真<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" name="post[fax]" maxlength="20" /></td>
												    </tr>
												  <tr>
												    <td class="bb">电子邮箱<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" name="email" maxlength="30"/></td>
												    </tr>
												  <tr>
												    <td class="bb">通讯地址<span class="star">*</span></td>
												    <td><input class="input-title2 reqired" type="text" name="post[address]" maxlength="30"/></td>
												    </tr>
												  <tr>
												    <td class="bb">邮 编<span class="star">*</span></span></td>
											        <td><input class="input-title2 reqired number" type="" name="post[zip]" maxlength="6" surelength="6"/></td>
										          </tr>
												  
												  <tr>
													<td colspan="2" align="center"><a id="form_submit" href="#"><img src="images/submit.gif" /></a></td>
												  </tr>
												</table>
												<input type="hidden" name="session" value="<?php echo $_SESSION['zzh'];?>">
											</form>
									  </div>
									</div>												
								</div>					
								<div class="right-bg-bot"><img src="images/right-bot.gif" /></div>
				 			</div><!-- right end-->
						</div>	<!-- content end -->					
					</div><!-- content-inner end -->
				</div><!-- body-inner-->
			</div><!-- body end -->						
		 </div><!-- container-inner end -->	
	</div><!-- container end -->	
</body>
</html>