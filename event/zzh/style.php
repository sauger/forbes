<?php 
	include_once( dirname(__FILE__) .'/../../frame.php');
	$db = get_db();
	$industry = $db->query("select * from fb_invest_industry");
	$count = $db->record_count;
	$type = $_GET['type'];
	$key = $_GET['key'];
	if(strlen($key)>1){
		redirect('/error.html');
		die();
	}
	if(strlen($type)>20){
		redirect('/error.html');
		die();
	}
	$sql = "select * from fb_investor where 1=1";
	if($key!=''){
		$sql .= " and chinese_name like '%$key%'";
	}
	if($type!=''){
		$sql .= " and invest_zone like '%$type%'";
	}
	$sql .= " order by chinese_name asc";
	$investor = $db->paginate($sql,6);
	$i_count = $db->record_count;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>
<?php 
use_jquery();
?>
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
								<div class="logo"><img src="images/logo.gif" /></div>
								<div class="left-main">
									<div class="left-application"><a href="on-line.html"></a></div>
									<div class="left-nav">
										<ul>
											<li><a href="index.html" onfocus="this.blur()">增长会介绍</a></li>
											<li><a href="vip.html" class="bc" onfocus="this.blur()">会员专享</a></li>
											<li><a href="prediction.html" onfocus="this.blur()">活动专区</a></li>
											<li><a href="cooperation.html" onfocus="this.blur()">合作伙伴</a></li>
											<li><a href="contact us.html" onfocus="this.blur()">联系我们</a></li>
										</ul>
									</div>
									<div class="left-calendar"><img src="images/calendar.gif" /></div>
									<div class="left-part">
										<div class="left-part-top">部分会员</div>
										<div class="left-part-c">
										<a class="left-part-pic" href="#"><img src="images/logo0.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo2.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo3.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo2.gif" /></a>
									</div>
										<div class="left-part-bot"><img src="images/part-bot.gif" /></div>	
									</div>
									<!--<div class="left-banner"><img src="images/banner.gif" /></div>-->
								</div>	
							</div><!-- left end-->
							<div id="body-right"><!-- right begin-->
								<div class="right-bg-top"><img src="images/right-top.gif" /></div>
								<div class="right-warp">																	
								  	<div class="r-m-t-two">
									  	<div class="main" style="padding:10px 0;">
											<p class="t-title"><img src="images/t-list.gif" /><strong>理事风采</strong></p>									
											<div class="r-m-t-one" style="text-align:right;margin:15px 0">
												<span class="mark">搜索理事</span>
												<input class="input-title" id="key"></input>
												<select class="input-title" id="industry" name=""><option value=""></option><?php for($i=0;$i<$count;$i++){?><option <?php if($type==$industry[$i]->name){echo 'selected="selected"';}?> value="<?php echo $industry[$i]->name;?>"><?php echo $industry[$i]->name;?></option><?php }?></select>
												<input  name="搜索" type="submit" class="sub-but" id="investor_search" value="搜索"/>
											</div>																		    		
									  		<ul class="style-list">
									  		<?php for($i=0;$i<$i_count;$i++){?>
												<li><img src="<?php echo $investor[$i]->image;?>" /><h4><a href="vip_contace.php?id=<?php echo $investor[$i]->id;?>"><?php echo $investor[$i]->name;?></a></h4>
													<p><span class="mark">公司机构：</span><?php echo $investor[$i]->company;?></p>
													<p><span class="mark">投资方向：</span><?php echo $investor[$i]->invest_zone;?></p>
												</li>
											<?php }?>
									 		 </ul>
									   	</div>
										<div class="page">
										<?php paginate();?>
											<!-- 	<ul>
													<li><a class="dd" href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#">5</a></li>
													<li><a href="#">7</a></li>											
												</ul> -->
									
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

<script>
function investor_search(){
	window.location.href = "?key="+$("#key").val()+"&type="+encodeURI($("#industry").val());
}
$(function(){
	$("#investor_search").click(function(){
		investor_search();
	});
});
</script>