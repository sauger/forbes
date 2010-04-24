<?php 
	include "../../frame.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
	$page_type = $page_type ? $page_type : $_REQUEST['page_type'];
	if(empty($page_type)){
		$page_type= 'dynamic';
	}
	if($page_type != 'static'){
		use_jquery();
	}
	init_page_items();
	$doman = "http://admin.forbeschina.com";
	#$doman = "http://127.0.0.1";
	function img_src(){
		global $pos;
		global $pos_items;
		global $doman;
		echo $doman . "/" .$pos_items->$pos->image1;
	}

	function show_href(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></a>
		<?php 		
	}
	function show_desc(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->description ? $pos_items->$pos->description : '&nbsp;';?></a>
		<?php 		
		
	}
	
?>
<style>
	.font1 a:link {text-decoration: none; color: #fff;}
	.font1 a:visited {text-decoration: none; color: #fff;}
	.font1 a:hover {text-decoration: none; color: #fff;}
	.font1 a:active {text-decoration: none; color: #fff;}
</style>
</head>
<body style="margin-left: 0px;	margin-top: 0px;margin-right: 0px;	margin-bottom: 0px; font-size: 12px; color: #666; line-height:150%;">
			<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="558"><img src="images/logo.jpg" width="138" height="64" /></td>
			    <td width="92" align="right" valign="bottom"><a href="<?php echo $doman;?>/login/" target="_blank">登陆</a>　| 　<a href="<?php echo $doman;?>/register/" target="_blank">注册</a></td>
			  </tr>
			  <tr>
			    <td height="35" colspan="2" style="background:#125295; color: #FFF;">
				    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
				      <tr class="font1" style="font-weight:bold; color:#FFF;">
				        <td width="99" align="center" valign="middle" style="color: #FFF; border-right:1px solid #0F4382;"><a href="#"  target="_blank">福布斯首页</a></td>
				        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">榜单</a></td>
				        <td width="59" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">富豪</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"> <a href="#" target="_blank">投资</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">创业</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">科技</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">城市</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">评论</a></td>
				        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="#" target="_blank">奢华</a></td>
				        <td width="70" align="center" valign="middle" style="color: #FFF;"><a href="#"  target="_blank">专栏</a></td>
				      </tr>
				    </table>
			    </td>
			  </tr>
			  <tr>
			  	<td width="700">
			  		<table width=100%>
			  			<tr>
			  				<td height=24 style="background: rgb(236, 236, 236) none repeat scroll 0% 0%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;"></td>
			  			</tr>
			  		</table>
			  	</td>
			  	<td></td>
			  </tr>
			</table>
</body>
</html>