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
	$doman = "http://www.forbeschina.com";
	#$doman = "http://localhost:8081";
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
<style type="text/css">
<!--
body{font-size:12px;}
.font1 a:link {text-decoration: none; color: #fff;}
.font1 a:visited {text-decoration: none; color: #fff;}
.font1 a:hover {text-decoration: none; color: #fff;}
.font1 a:active {text-decoration: none; color: #fff;}
.f2 a:link {text-decoration: none; color: #fff;}
.f2 a:visited {text-decoration: none; color: #fff;}
.f2 a:hover {text-decoration: none; color: #fff;}
.f2 a:active {text-decoration: none; color: #fff;}
.f3 a:link {text-decoration: none; color: #17599C;}
.f3 a:visited {text-decoration: none; color: #17599C;}
.f3 a:hover {text-decoration: none; color: #17599C;}
.f3 a:active {text-decoration: none; color: #17599C;}

.f4 a:link {text-decoration: none; color: #333;}
.f4 a:visited {text-decoration: none; color: #333;}
.f4 a:hover {text-decoration: none; color: #333;}
.f4 a:active {text-decoration: none; color: #333;}
.f5 a:link {text-decoration: none; color: #000;}
.f5 a:visited {text-decoration: none; color: #000;}
.f5 a:hover {text-decoration: none; color: #000;}
.f5 a:active {text-decoration: none; color: #000;}
.f6 a:link {text-decoration: none; color: #333;}
.f6 a:visited {text-decoration: none; color: #333;}
.f6 a:hover {text-decoration: none; color: #333;}
.f6 a:active {text-decoration: none; color: #333;}

a:link {text-decoration: none;color: #666;}
a:visited {text-decoration: none;}
a:hover {text-decoration: none;}
a:active {text-decoration: none;}
-->
</style>
</head>
<body style="margin-left: 0px;	margin-top: 0px;margin-right: 0px;	margin-bottom: 0px; font-size: 12px; color: #666; line-height:150%;">
			<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="font-szie:12px;">
			  <tr>
			    <td width="558"><img src="images/logo.jpg" width="138" height="64" /></td>
			    <td width="92" align="right" valign="bottom"><a href="<?php echo $doman;?>/login/" target="_blank">登陆</a>　| 　<a style="font-size:12px;" href="<?php echo $doman;?>/register/" target="_blank">注册</a></td>
			  </tr>
			  <tr>
			    <td height="35" colspan="2" style="background:#125295; color: #FFF;"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
			      <tr class="font1" style="font-weight:bold; color:#FFF;">
			        <td width="99" align="center" valign="middle" style="color: #FFF; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com"  target="_blank">福布斯首页</a></td>
			        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/list/" target="_blank">榜单</a></td>
			        <td width="59" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/billionaires/" target="_blank">富豪</a></td>
			        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"> <a href="http://www.forbeschina.com/investment/" target="_blank">投资</a></td>
					<td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/business/" target="_blank">商业</a></td>
			        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/entrepreneur/" target="_blank">创业</a></td>
			        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/tech/" target="_blank">科技</a></td>
			        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/city/" target="_blank">城市</a></td>
			        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/life/" target="_blank">生活</a></td>
			        <td width="70" align="center" valign="middle" style="color: #FFF;"><a href="http://www.forbeschina.com/column/"  target="_blank">专栏</a></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; ">
			      <tr>
			      	<?php $pos ="edm_hl_img";?>
			        <td width="324" <?php show_page_pos($pos,'edm_img');?>><a href="<?php echo $pos_items->$pos->href;?>"><img border="0" src="<?php img_src()?>" width="324" height="234" /></a></td>
			        <td width="10" height="230">&nbsp;</td>
			        <td><table width="314" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="231" valign="top">
			            	<table width="304" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#EBF4F9">
			              <tr>
			                <td height="24" width:214px; valign="middle" class="f2" style="background:#3084B2;color:#000000;">&nbsp;一周精华</td>
			              </tr>
			             <?php for($i=0;$i<3;$i++){
			             	$pos = "edm_jh_{$i}";
			             ?>
			              <tr <?php show_page_pos($pos,'edm_base');?>>
			                <td><table width="295" border="0" align="right" cellpadding="0" cellspacing="0" style=" margin-top:10px;">
			                  <tr>
			                    <td><strong class="f3" style="color: #17599C;"><?php show_href()?></strong></td>
			                  </tr>
			                  <tr>
			                    <td><?php show_desc()?></td>
			                  </tr>
			                </table></td>
			              </tr>
			              <?php }?>
			            </table></td>
			          </tr>
			        </table></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="10" colspan="2"></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="205" height="141" valign="top">
			        	<table width="205" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;富豪</strong></td>
			          </tr>
			          <tr>
			            <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			              <tr <?php $pos="emd_rich"; show_page_pos($pos,'edm_base_img');?>>
			                <td width="65" rowspan="2" valign="top"><img src="<?php img_src()?>" width="54" height="54" /></td>
			                <td class="f3" style="color: #17599C;"><strong><?php show_href();?></strong></td>
			              </tr>
			              <tr>
			                <td valign="top"><?php show_desc();?></td>
			              </tr>
			              <?php for($i=0;$i<2;$i++){
			              	$pos = "edm_rich_list_{$i}";
			              ?>
			              <tr<?php show_page_pos($pos,'edm_link')?>>
			                <td height="22" colspan="2" valign="bottom" class="f5" style="color: #000">·<?php show_href();?></td>
			              </tr>
			              <?php }?>
			            </table></td>
			          </tr>
			        </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333;">&nbsp;投资</strong></td>
			          </tr>
			          <tr>
			            <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			              <tr<?php $pos="emd_city"; show_page_pos($pos,'edm_base_img');?>>
			                <td width="65" rowspan="2" valign="top"><img src="images/pic2.jpg" width="54" height="54" /></td>
			                <td class="f3" style="color: #17599C;"><strong><?php show_href();?></strong></td>
			              </tr>
			              <tr>
			                <td valign="top"><?php show_desc();?></td>
			              </tr>
			              <?php for($i=0;$i<2;$i++){
			              	$pos = "edm_city_list_{$i}";
			              ?>
			              <tr<?php show_page_pos($pos,'edm_link');?>>
			                <td height="22" colspan="2" valign="bottom" class="f5" style="color: #000">·<?php show_href();?></td>
			              </tr>
			              <?php }?>
			            </table></td>
			          </tr>
			        </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="195" border="0" align="right" cellpadding="0" cellspacing="0"  style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;榜单</strong></td>
			          </tr>
			          <tr>
			            <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			             	<?php 
			             		$pos = "edm_list_list_0";
			             	?>
			              <tr>
			                <td width="65" rowspan="3" valign="top"<?php show_page_pos($pos,'edm_link_img');?>><img src="<?php img_src()?>" width="54" height="54" /></td>
			                <td height="30" valign="top" class="f5"  style="color: #000">·<?php show_href();?></td>
			              </tr>
			              <?php for($i=1;$i<3;$i++){
			              	$pos = "edm_list_list_{$i}";
			              ?>
			              <tr>
			                <td height="30" valign="top"<?php show_page_pos($pos,'edm_link');?>><span class="f5"  style="color: #000">·<?php show_href();?></span></td>
			              </tr>
			              <?php }?>
			            </table></td>
			          </tr>
			        </table></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="10" colspan="2"></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="428" height="484" valign="top">
			        <table width="428" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			          <tr>
			            <td height="26" valign="middle" class="f4" style="color: #333; background:#E8E8E8">&nbsp;<strong>分类</strong></td>
			          </tr>
			          <tr>
			            <td height="24" valign="middle" class="f4" style="color: #333"><table width="400" border="0" cellspacing="0" cellpadding="0">
			              <tr>
			                <td><table width="180" border="0" cellspacing="0" style="margin-left:6px;" cellpadding="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C;">【商业】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href='http://www.forbeschina.com/business/'>MORE&gt;&gt;</a></td>
			                  </tr>
			                  <?php 
			                  	$pos = "edm_sy";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;" <?php show_page_pos($pos,'edm_base')?>><strong><?php show_href();?></strong></td>
			                   </tr>
			                  <tr>
			                    <td colspan="2" valign="top"><?php show_desc();?></td>
			                  </tr>
			                  <?php 
			                  	for($i=0;$i<2;$i++){
			                  		$pos = "edm_sy_{$i}";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link');?>>·<?php show_href();?></td>
			                  </tr>
			                   <?php }?>
			                </table></td>
			                <td><table width="180" border="0" align="right" style="margin-left:6px"  cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【创业】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="http://www.forbeschina.com/entrepreneur/">MORE&gt;&gt;</a></td>
			                  </tr>
			                  <?php 
			                  	$pos = "edm_cy";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;" <?php show_page_pos($pos,'edm_base')?>><strong><?php show_href();?></strong></td>
			                   </tr>
			                  <tr>
			                    <td colspan="2" valign="top"><?php show_desc();?></td>
			                  </tr>
			                  <?php 
			                  	for($i=0;$i<2;$i++){
			                  		$pos = "edm_cy_{$i}";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link');?>>·<?php show_href();?></td>
			                  </tr>
			                   <?php }?>
			                </table></td>
			              </tr>
			              <tr>
			                <td height="10" colspan="2"></td>
			                </tr>
			              <tr>
			                <td height="1" colspan="2"  style="border-bottom:1px dotted #666666"></td>
			              </tr>
			            </table></td>
			          </tr>
			          <tr>
			            <td height="5" valign="middle" class="f4" style="color: #333"></td>
			          </tr>
			          <tr>
			            <td height="24" valign="middle" class="f4" style="color: #333">
			            	<table width="400" border="0" cellspacing="0"  style="margin-left:6px" cellpadding="0">
			              <tr>
			                <td><table width="180" border="0" cellspacing="0" cellpadding="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【科技】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="http://www.forbeschina.com/tech/">MORE&gt;&gt;</a></td>
			                  </tr>
			                   <?php 
			                  	$pos = "edm_kj";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;" <?php show_page_pos($pos,'edm_base')?>><strong><?php show_href();?></strong></td>
			                   </tr>
			                  <tr>
			                    <td colspan="2" valign="top"><?php show_desc();?></td>
			                  </tr>
			                  <?php 
			                  	for($i=0;$i<2;$i++){
			                  		$pos = "edm_kj_{$i}";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link');?>>·<?php show_href();?></td>
			                  </tr>
			                   <?php }?>
			                </table></td>
			                <td><table width="180" border="0" align="right" style="margin-left:6px"   cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【城市】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="http://www.forbeschina.com/city/">MORE&gt;&gt;</a></td>
			                  </tr>
			                   <?php 
			                  	$pos = "edm_cs";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;" <?php show_page_pos($pos,'edm_base')?>><strong><?php show_href();?></strong></td>
			                   </tr>
			                  <tr>
			                    <td colspan="2" valign="top"><?php show_desc();?></td>
			                  </tr>
			                  <?php 
			                  	for($i=0;$i<2;$i++){
			                  		$pos = "edm_cs_{$i}";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link');?>>·<?php show_href();?></td>
			                  </tr>
			                   <?php }?>
			                </table></td>
			              </tr>
			              <tr>
			                <td height="10" colspan="2"></td>
			              </tr>
			              <tr>
			                <td height="1" colspan="2"  style="border-bottom:1px dotted #666666"></td>
			              </tr>
			            </table></td>
			          </tr>
			          <tr>
			            <td height="5" valign="middle" class="f4" style="color: #333"></td>
			          </tr>
			          <tr>
			            <td height="24" valign="middle" class="f4" style="color: #333">
			            	<table width="400" border="0" cellspacing="0" style="margin-left:6px" cellpadding="0">
			              <tr>
			                <td><table width="180" border="0" cellspacing="0" cellpadding="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【投资】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="http://www.forbeschina.com/investment/">MORE&gt;&gt;</a></td>
			                  </tr>
			                  </tr>
			                   <?php 
			                  	$pos = "edm_tz";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;" <?php show_page_pos($pos,'edm_base')?>><strong><?php show_href();?></strong></td>
			                   </tr>
			                  <tr>
			                    <td colspan="2" valign="top"><?php show_desc();?></td>
			                  </tr>
			                  <?php 
			                  	for($i=0;$i<2;$i++){
			                  		$pos = "edm_cs_{$i}";
			                  ?>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link');?>>·<?php show_href();?></td>
			                  </tr>
			                   <?php }?>
			                </table></td>
			                <td valign="top"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="80" ><img src="images/dingyeu.jpg" width="184" height="66" /></td>
			                  </tr>
			                  <tr>
			  					<td><a style="color:#4649B0;" href="<?php echo $doman ."/old_edm/"?>">往期福布斯精华查询</a></td>
			  				  </tr>
			                  </table></td>
			              </tr>
			              <tr></tr>
			              <tr>
			              </tr>
			            </table></td>
			          </tr>
			        </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="205" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="201" valign="top"><table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			              <tr>
			                <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;专栏</strong></td>
			              </tr>
			              <tr>
			                <td><table width="180" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;  margin-left:6px;">
			                  <?php for($i=0;$i<2;$i++){
			                  	$pos="edm_column_{$i}";
			                  ?>
			                  <tr>
			                    <td valign="top" class="f5" style="color: #000"><table width="180" border="0" cellspacing="0" cellpadding="0">
			                      <tr>
			                        <td height="24" class="f3" style="color: #17599C" <?php show_page_pos($pos,'edm_column');?>><strong><?php show_href();?></strong></td>
			                      </tr>
			                      <tr>
			                        <td height="24"><?php show_desc();?></td>
			                      </tr>
			                      <tr>
			                        <td height="24" align="right" class="f5" style="color: #000">--<?php echo $pos_items->$pos->alias;?></td>
			                      </tr>
			                    </table></td>
			                  </tr>
			                  <?php }?>
			                  </table></td>
			              </tr>
			            </table></td>
			          </tr>
			        </table>
			          <table width="205" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			            <tr>
			              <td height="166" valign="top"><table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			                <tr>
			                  <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;福布斯本周专题</strong></td>
			                </tr>
			                <tr>
			                  <td><table width="190"  border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; margin-left:6px;">
			                    <?php 
			                    	$pos="edm_subject";
			                    ?>
			                    <tr>
			                      <td width="65" rowspan="2" valign="top"><img src="<?php img_src()?>" width="54" height="54" /></td>
			                      <td class="f3" style="color: #17599C" <?php show_page_pos($pos,'edm_base_img');?>><strong><?php show_href();?></strong></td>
			                    </tr>
			                    <tr>
			                      <td valign="top"><?php show_desc()?></td>
			                    </tr>
			                    <?php for($i=0;$i<2;$i++){
			                    	$pos= "edm_subject_{$i}";
			                    ?>
			                    <tr>
			                      <td height="26" colspan="2" valign="bottom" class="f5" style="color: #000"<?php show_page_pos($pos,'edm_link')?>>·<?php show_href();?></td>
			                    </tr>
			                    <?php }?>
			                  </table></td>
			                </tr>
			              </table></td>
			            </tr>
			          </table>
			          <table width="205" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			            <tr>
			            	<?php $pos="edm_ad"?>
			              <td height="94" <?php show_page_pos($pos,'edm_img');?>><img src="<?php img_src();?>" width="205" height="94" /></td>
			            </tr>
			          </table></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="20" colspan="2"></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="428" height="199" valign="top">
			        	<table width="428" border="0" align="right" cellpadding="0" cellspacing="0"  style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" class="f4"  style="color: #333;background:#ECECEC">&nbsp;<strong>生活</strong></td>
			          </tr>
			          <tr>
			            <?php $pos="edm_sh"?>
			            <td valign="middle" class="f4"  style="color: #333"><table width="405" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px;">
			              <tr>
			                <td width="195" rowspan="4" valign="top" <?php show_page_pos($pos,'edm_base_img');?>><img src="<?php img_src();?>" width="183" height="149" /></td>
			                <td valign="top" class="f3" style="color: #17599C"><strong><?php show_href();?></strong></td>
			              </tr>
			              <tr>
			                <td valign="top"><?php show_desc();?></td>
			              </tr>
			              <?php for($i=0;$i<2;$i++){
			              	$pos="edm_sh_{$i}";
			              ?>
			              <tr>
			                <td valign="top"<?php show_page_pos($pos,'edm_link')?>><span class="f5" style="color: #000">·<?php show_href();?></span></td>
			              </tr>
			              <?php }?>
			            </table></td>
			          </tr>
			          </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="205" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="198" valign="top">
			            	<table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			              <tr>
			                <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;福布斯本周杂志</strong></td>
			              </tr>
			              <tr>
			              	<?php $pos="edm_magazine";?>
			                <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			                  <tr>
			                    <td width="90" rowspan="2" valign="top"<?php show_page_pos($pos,'edm_base_img')?>><img src="<?php img_src();?>" width="82" height="107" /></td>
			                    <td class="f3" style="color: #17599C"><strong><?php echo $pos_items->$pos->display;?></strong></td>
			                  </tr>
			                  <tr>
			                    <td valign="top">·<?php echo $pos_items->$pos->description;?></td>
			                  </tr>
			                  <tr>
			                    <td height="26" valign="bottom" class="f5" style="color: #000">·<a href="http://www.forbeschina.com/magazine">往期杂志查阅</a></td>
			                    <td height="26" valign="bottom" class="f5" style="color: #000"><label>
			                    </label></td>
			                  </tr>
			                </table></td>
			              </tr>
			            </table></td>
			          </tr>
			        </table></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="10" colspan="2"></td>
			  </tr>
			  <tr>
			    <td height="26" colspan="2" valign="middle"><table width="650" border="0" cellspacing="0" cellpadding="0">
			        <tr>
			          <td valign="middle">您已经订阅了本邮件，如果您想退订，请点击<a href="<?php echo $doman ."/user/"?>" style="color:blue">此处</a>，进入“我的设置”进行退订操作。</td>
			        </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="20" colspan="2"></td>
			  </tr>
			  <tr>
			    <td height="24" colspan="2" align="center" valign="middle" class="f2" style="background:#2775C3; color: #FFF;"><a href="http://www.forbeschina.com/"  target="_blank">福布斯首页</a>　　      <a href="http://www.forbeschina.com/list/"  target="_blank">榜单</a>　　      <a href="http://www.forbeschina.com/billionaires/"  target="_blank">富豪</a>　      　<a href="http://www.forbeschina.com/investment/"  target="_blank">投资</a>　      　<a href="http://www.forbeschina.com/business/" target="_blank">商业</a>　　      <a href="http://www.forbeschina.com/entrepreneur/" target="_blank">创业</a>　　      <a href="http://www.forbeschina.com/tech/" target="_blank">科技</a>　　      <a href="http://www.forbeschina.com/city/" target="_blank">城市</a>　     　<a href="http://www.forbeschina.com/life/" target="_blank">生活</a>　　      <a href="http://www.forbeschina.com/column/" target="_blank">专栏</a></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td height="10" colspan="2"></td>
			        </tr>
			      <tr>
			        <td><img src="images/logo.jpg" width="138" height="64" /></td>
			        <td align="right" valign="top" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;">Copyright@2001-2010 ShangHai NewEgg E-Business Co.,LTD</td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr></tr>
			</table>
</body>
</html>
