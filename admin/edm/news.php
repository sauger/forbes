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
?>
<style type="text/css">
<!--
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
<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px; 	font-size: 12px; color: #666; line-height:150%;">
			<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="558"><img src="images/logo.jpg" width="138" height="64" /></td>
			    <td width="92" align="right" valign="bottom">登陆　| 　注册</td>
			  </tr>
			  <tr>
			    <td height="35" colspan="2" style="background:#125295; color: #FFF;"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
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
			    </table></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; ">
			      <tr>
			        <td width="324"><img src="images/pic.jpg" width="324" height="234" /></td>
			        <td width="10" height="230">&nbsp;</td>
			        <td><table width="314" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="231" valign="top">
			            	<table width="304" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#EBF4F9">
			              <tr>
			                <td height="24" width:214px; valign="middle" class="f2" style="background:#3084B2;color:#000000;">&nbsp;一周精华</td>
			              </tr>
			              <tr>
			                <td><table width="295" border="0" align="right" cellpadding="0" cellspacing="0" style=" margin-top:10px;">
			                  <tr>
			                    <td><strong class="f3" style="color: #17599C;">“放开二胎”都指向了人口老龄化问题</strong></td>
			                  </tr>
			                  <tr>
			                    <td>前女首富张茵明确表示，因为我国老龄化问题日益严峻，她想呼吁国家逐步放开二胎政策。</td>
			                  </tr>
			                </table></td>
			              </tr>
			              <tr>
			                <td><table width="295" border="0" align="right" cellpadding="0" cellspacing="0" style=" margin-top:10px;">
			                  <tr>
			                    <td><strong class="f3" style="color: #17599C;">“放开二胎”都指向了人口老龄化问题</strong></td>
			                  </tr>
			                  <tr>
			                    <td>前女首富张茵明确表示，因为我国老龄化问题日益严峻，她想呼吁国家逐步放开二胎政策。</td>
			                  </tr>
			                </table></td>
			              </tr>
			              <tr>
			                <td><table width="295" border="0" align="right" cellpadding="0" cellspacing="0" style=" margin-top:10px;">
			                  <tr>
			                    <td><strong class="f3" style="color: #17599C;">“放开二胎”都指向了人口老龄化问题</strong></td>
			                  </tr>
			                  <tr>
			                    <td>前女首富张茵明确表示，因为我国老龄化问题日益严峻，她想呼吁国家逐步放开二胎政策。</td>
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
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="205" height="141" valign="top">
			        	<table width="205" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;富豪</strong></td>
			          </tr>
			          <tr>
			            <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			              <tr>
			                <td width="65" rowspan="2" valign="top"><img src="images/pic2.jpg" width="54" height="54" /></td>
			                <td class="f3" style="color: #17599C;"><strong>对话杨惠妍</strong></td>
			              </tr>
			              <tr>
			                <td valign="top">前女首富张茵明确表示因为我国老龄化问题日益严峻，她想呼吁国家逐步放开二胎政策。</td>
			              </tr>
			            </table></td>
			          </tr>
			        </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			          <tr>
			            <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333;">&nbsp;城市</strong></td>
			          </tr>
			          <tr>
			            <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			              <tr>
			                <td width="65" rowspan="2" valign="top"><img src="images/pic2.jpg" width="54" height="54" /></td>
			                <td class="f3" style="color: #17599C;"><strong>对话杨惠妍</strong></td>
			              </tr>
			              <tr>
			                <td valign="top">前女首富张茵明确表示因为我国老龄化问题日益严峻，她想呼吁</td>
			              </tr>
			              <tr>
			                <td height="22" colspan="2" valign="bottom" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                </tr>
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
			              <tr>
			                <td width="65" rowspan="3" valign="top"><img src="images/pic2.jpg" width="54" height="54" /></td>
			                <td height="30" valign="top" class="f5"  style="color: #000">·前女首富张茵明确</td>
			              </tr>
			              <tr>
			                <td height="30" valign="top"><span class="f5"  style="color: #000">·前女首富张茵明确</span></td>
			              </tr>
			              <tr>
			                <td height="30" valign="top"><span class="f5" style="color: #000">·前女首富张茵明确</span></td>
			              </tr>
			              <tr></tr>
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
			                    <td height="30" class="f3" style="color: #17599C;">【投资】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;">MORE&gt;&gt;</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C;"><strong>对话杨惠妍</strong></td>
			                    </tr>
			                  <tr>
			                    <td colspan="2" valign="top">前女首富张茵明确表示因为我国老龄化问...</td>
			                    </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                    </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                    </tr>
			                </table></td>
			                <td><table width="180" border="0" align="right" style="margin-left:6px"  cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【投资】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;">MORE&gt;&gt;</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                  </tr>
			                  <tr>
			                    <td colspan="2" valign="top">前女首富张茵明确表示因为我国老龄化问...</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
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
			                    <td height="30" class="f3" style="color: #17599C">【投资】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;">MORE&gt;&gt;</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                  </tr>
			                  <tr>
			                    <td colspan="2" valign="top">前女首富张茵明确表示因为我国老龄化问...</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                </table></td>
			                <td><table width="180" border="0" align="right" style="margin-left:6px"   cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="30" class="f3" style="color: #17599C">【投资】</td>
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="#"  target="_blank" style="color:#333">MORE&gt;&gt;</a></td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                  </tr>
			                  <tr>
			                    <td colspan="2" valign="top">前女首富张茵明确表示因为我国老龄化问...</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
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
			                    <td height="30" align="right" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;">MORE&gt;&gt;</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                  </tr>
			                  <tr>
			                    <td colspan="2" valign="top">前女首富张茵明确表示因为我国老龄化问...</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                  <tr>
			                    <td height="24" colspan="2" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                  </tr>
			                </table></td>
			                <td valign="top"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
			                  <tr>
			                    <td height="80" ><img src="images/dingyeu.jpg" width="184" height="66" /></td>
			                  </tr>
			                  <tr>
			                    <td height="30" valign="bottom" ><strong class="f5" style="color: #000">往期福布精华化查询</strong></td>
			                  </tr>
			                  <tr>
			                    <td height="30" valign="middle" ><label>
			                      <select name="select" id="select" style="width:184px;">
			                      </select>
			                    </label></td>
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
			                  <tr>
			                    <td valign="top" class="f5" style="color: #000"><table width="180" border="0" cellspacing="0" cellpadding="0">
			                      <tr>
			                        <td height="24" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                      </tr>
			                      <tr>
			                        <td height="24">前女首富张茵明确表示因为我国老龄化问题日峻，她想呼吁..</td>
			                      </tr>
			                      <tr>
			                        <td height="24" align="right" class="f5" style="color: #000">--张茵明专栏</td>
			                      </tr>
			                    </table></td>
			                  </tr>
			                  <tr>
			                    <td valign="top"><table width="180" border="0" cellspacing="0" cellpadding="0">
			                      <tr>
			                        <td height="24" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                      </tr>
			                      <tr>
			                        <td height="24">前女首富张茵明确表示因为我国老龄化问题日峻，她想呼吁..</td>
			                      </tr>
			                      <tr>
			                        <td height="24" align="right" class="f5" style="color: #000">--张茵明专栏</td>
			                      </tr>
			                    </table></td>
			                  </tr>
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
			                    <tr>
			                      <td width="65" rowspan="2" valign="top"><img src="images/pic2.jpg" width="54" height="54" /></td>
			                      <td class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			                    </tr>
			                    <tr>
			                      <td valign="top">前女首富张茵明确表示因为我国老龄化问题日益严峻，她想呼吁</td>
			                    </tr>
			                    <tr>
			                      <td height="26" colspan="2" valign="bottom" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                    </tr>
			                    <tr>
			                      <td height="26" colspan="2" valign="bottom" class="f5" style="color: #000">·前女首富张茵明确表示因为我</td>
			                    </tr>
			                  </table></td>
			                </tr>
			              </table></td>
			            </tr>
			          </table>
			          <table width="205" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			            <tr>
			              <td height="94"><img src="images/pic3.jpg" width="205" height="94" /></td>
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
			            <td height="24" valign="middle" class="f4"  style="color: #333;background:#ECECEC">&nbsp;<strong>分类</strong></td>
			          </tr>
			          <tr>
			            <td valign="middle" class="f4"  style="color: #333"><table width="405" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px;">
			              <tr>
			                <td width="195" rowspan="4" valign="top"><img src="images/pic4.jpg" width="183" height="149" /></td>
			                <td valign="top" class="f3" style="color: #17599C"><strong>对话杨惠妍</strong></td>
			              </tr>
			              <tr>
			                <td valign="top">前女首富张茵明确表示因为我国老龄化问题日益严峻，她想呼吁国家逐步放开二胎政策。</td>
			              </tr>
			              <tr>
			                <td valign="top"><span class="f5" style="color: #000">·前女首富张茵明确表示因为我</span></td>
			              </tr>
			              <tr>
			                <td valign="top"><span class="f5" style="color: #000">·前女首富张茵明确表示因为我</span></td>
			              </tr>
			            </table></td>
			          </tr>
			          </table></td>
			        <td>&nbsp;</td>
			        <td width="205" valign="top"><table width="205" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="198" valign="top">
			            	<table width="195" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#F7F7F7">
			              <tr>
			                <td height="24" valign="middle" style="background:#ECECEC"><strong class="f4" style="color: #333">&nbsp;福布斯本周专题</strong></td>
			              </tr>
			              <tr>
			                <td><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			                  <tr>
			                    <td width="90" rowspan="2" valign="top"><img src="images/pic5.jpg" width="82" height="107" /></td>
			                    <td class="f3" style="color: #17599C"><strong>福布斯2010年1月</strong></td>
			                  </tr>
			                  <tr>
			                    <td valign="top">·宇星科技、搜房网、聚光科技夺得新能源等行业表现抢眼</td>
			                  </tr>
			                  <tr>
			                    <td height="26" valign="bottom" class="f5" style="color: #000">·往期杂志查阅</td>
			                    <td height="26" valign="bottom" class="f5" style="color: #000"><label>
			                      <select name="select2" id="select2" style="width:90px;">
			                      </select>
			                    </label></td>
			                  </tr>
			                  <tr>
			                    <td height="26" colspan="2" valign="bottom" class="f3" style="color: #17599C"><strong>申请阅读</strong>　<strong>在线阅读</strong></td>
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
			          <td height="26"><input type="image" name="imageField" id="imageField" src="images/bt.jpg" /></td>
			          <td valign="middle">您已经订阅了本邮件，如果您想退订，请点击此处，进入“我的设置”进行退订操作。</td>
			        </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="20" colspan="2"></td>
			  </tr>
			  <tr>
			    <td height="24" colspan="2" align="center" valign="middle" class="f2" style="background:#2775C3; color: #FFF;"><a href="#"  target="_blank">福布斯首页</a>　　      <a href="#"  target="_blank">榜单</a>　　      <a href="#"  target="_blank">富豪</a>　      　<a href="#"  target="_blank">投资</a>　　      <a href="#" target="_blank">创业</a>　　      <a href="#" target="_blank">科技</a>　　      <a href="#" target="_blank">城市</a>　      　<a href="#" target="_blank">评论</a>　     　<a href="#" target="_blank">奢华</a>　　      <a href="#" target="_blank">专栏</a></td>
			  </tr>
			  <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td height="10" colspan="2"></td>
			        </tr>
			      <tr>
			        <td><img src="images/logo.jpg" width="138" height="64" /></td>
			        <td align="right" valign="top" class="f6" style="font-size: 10px;color:#333;font-family: Arial, Helvetica, sans-serif;"><a href="#" target="_blank">Copyright@2001-2010 ShangHai NewEgg E-Business Co.,LTD</a></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr></tr>
			</table>
</body>
</html>
