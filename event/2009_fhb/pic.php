<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>福布斯2009富豪榜新闻发布会</title>
		<script src="js/jquery.js" type=text/javascript></script>
		<link href="css/index.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="ibody">
		<div id="header">
			<div id=menu>
			<li><a href="index.html">首页</a></li>
			<li><a href="bz1.html">中国富豪榜17年(1)</a></li>
			<li><a href="bz2.html">中国富豪榜17年(2)</a></li>
			<li><a href="cf1.html">创富故事(1)</a></li>
			<li><a href="cf2.html">创富故事(2)</a></li>
			<li><a href="cf3.html">创富故事(3)</a></li>
			<li><a href="cf4.html">创富故事(4)</a></li>
			<li><a href="pic.php" style="color:#ff0000">新闻发布会图集</a></li>
			</div>
		</div>
			<?php
				$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
				if ($page <=0 ){
					$page = 1;
				}
				$max = 29;
				if ($page > $max){
					$page = $max;
				}
			?>
			<div style="border:double #edd586 ; width:897px;  margin-top:3px; float:left;">
				<div class="title"　>新闻发布会照片集锦</div>
				<div style="margin-top:23px; text-align:center;">
					<img src="images/xc/xc<?php echo $page; ?>.jpg" border=0 width="850"  />
					<div id=page style="text-align:center;margin-top:10px; margin-bottom:10px;">
						<?php if ($page == 1) { echo '上一张';} else {?><a href="?page=<?php echo $page -1;?>">上一张</a><?php } ?>　　
						<?php if ($page >= $max) { echo '下一张';} else {?><a href="?page=<?php echo $page +1;?>">下一张</a><?php } ?>
					</div>
				</div>
			</div>
			<!-- bottom -->
			<div id="bottom">
				<div class="title" style="width:900px;">
					创富者
				</div>
				<div style="padding:20px 0px 20px 20px; display:inline;float:left;height:200px;">
					<div id="demo6" style="OVERFLOW: hidden; WIDTH: 98%; height:200px;">
					    <table cellspacing="0" cellpadding="0" border="0">
					       <tbody>
					          <tr>
					             <td id="demo7" valign="top" align="center">
					                <table cellspacing="0" cellpadding="2" border="0">
					                  <tbody>
					             		<tr align="left">					             		             
	                                       <td>
	                                          
	                                            <img border="0" width="150" height="180" src="images/fh1.jpg" /> 
	                                        </td>	
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh2.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh3.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh4.jpg" /> 
	                                        </td>	
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh5.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh6.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh7.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh8.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh9.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh10.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh11.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh12.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh13.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh14.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh15.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh16.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh17.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh18.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh19.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh20.jpg" /> 
	                                        </td>
											<td>
	                                            <img border="0" width="150" height="180" src="images/fh21.jpg" /> 
	                                        </td>	              			    
					                    </tr>
					                 </tbody>
					               </table>
					             </td>
					             <td id="demo8" valign="top"></td>
					           </tr>
					         </tbody>
					      </table>
				    </div>
				</div>
			</div>
			<div id="link" style="float:left;display:inline;text-align:center;width:905px;color: #A56619;font-size:12px;padding-bottom:10px;">
				<span><b>特别鸣谢：</b>Ermenegildo Zegna<br></span>
				<span><b>战略合作媒体：</b>网易财经 新浪财经 腾讯财经 凤凰财经 激动网<br></span>
				<span><b>特约媒体支持：</b>21世纪经济报道 理财周报 21世纪网 搜狐财经<br></span>
			</div>
		</div>	
		
<span style="display:none;">
<script src="http://s9.cnzz.com/stat.php?id=2154547&web_id=2154547" language="JavaScript"></script>
</span>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16303233-1");
pageTracker._trackPageview();
} 
catch(err) {}
</script>
	</body>
</html>
<script type="text/javascript">
   	i = 1;
   	j=1;
   	setInterval("changepic()",5000);
   	function changepic()
   	{
   		$('#ztpic').attr('src',"images/zt" + j +".jpg");

   		$('#xcpic').attr('src',"images/xc" + i +".jpg");
   		i++;
   		if(i>=4) i = 1;
   		j++;
   		if(j>=3) j = 1;
   	};  	
	var demo6 = document.getElementById('demo6');
	var demo7 = document.getElementById('demo7');
	var demo8 = document.getElementById('demo8');  
	var speed=30;//速度数值越大速度越慢
	demo8.innerHTML=demo7.innerHTML;
	function Marquee(){
		if(demo8.offsetWidth-demo6.scrollLeft<=0)
			demo6.scrollLeft-=demo7.offsetWidth;
		else{
			demo6.scrollLeft++;
		}
	}
	var MyMar=setInterval(Marquee,speed);
	demo6.onmouseover=function() {clearInterval(MyMar)};
	demo6.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
</script>	
