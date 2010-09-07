<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>
<?php 
	use_jquery_ui();
	init_page_items();
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
									<div class="left-application"><a href="#"></a></div>
									<div class="left-nav">
										<ul>
											<li><a class="bc" href="index.php" onfocus="this.blur()">增长会介绍</a></li>
											<li><a href="vip.php" onfocus="this.blur()">会员专享</a></li>
											<li><a href="prediction.php" onfocus="this.blur()">活动专区</a></li>
											<li><a href="cooperation.php" onfocus="this.blur()">合作伙伴</a></li>
											<li><a href="contact us.html" onfocus="this.blur()">联系我们</a></li>
										</ul>
									</div>
									<div class="left-calendar"></div>
									<div id="dialog">
										<?php 
											$db = get_db();
											$today = $db->query("select * from zzh_activity where TO_DAYS(NOW()) = TO_DAYS(time)");
											if(!empty($today)){
										?>
										<p>活动名称：</p>
										<p>　　　<?php echo $today[0]->name;?></p>
										<p>活动日期：</p>
										<p>　　　<?php echo substr($today[0]->time,0,10);?></p>
										<p><a href="<?php echo $today[0]->link;?>">点击了解活动详情</a></p>
										<?php
											}
											$activity = $db->query("select * from zzh_activity where month(now())=month(time)");
										?>
									</div>
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
									<div class="r-m-t-title"><!-- 标题 begin-->
										<img src="images/t-left-1.gif" /><strong>福布斯中国增长会宗旨——把握创新机会 实现快速增长</strong><img src="images/t-left-2.gif" />
									</div><!-- 标题 end -->
									<?php $pos_name = "zzh_index"?>
									<div class="r-m-t-one" <?php show_page_pos($pos_name,'zzh')?>><!-- 活动预告 begin -->
										<div class="r-m-t-bigpic"><img src="<?php echo $pos_items->$pos_name->image1;?>" /></div>
										<p><strong>活动名称：</strong><?php echo $pos_items->$pos_name->display;?></p>
										<p><strong>活动日期：</strong><?php echo $pos_items->$pos_name->title;?></p>
										<p><strong>活动地点：</strong><?php echo $pos_items->$pos_name->href;?></p>
										<p><strong>活动介绍：</strong></p>
										<p><?php echo $pos_items->$pos_name->description;?></p>
										<span class="right"><a href="<?php echo $pos_items->$pos_name->static_href;?>"><strong>了解活动详情>></strong></a></span>
									</div><!-- 活动预告 end -->		
									<div class="r-m-t-two"><!-- 增长会介绍 begin -->
										<p class="t-title"><img src="images/t-list.gif" /><strong>福布斯中国增长会</strong></p>
										<div class="main">
											<p><h4><strong>福布斯中国增长会（Forbes China GrowthNetwork）</strong></h4></p>
											<p>是由福布斯中文版联合数十名中国最具影响力的企业领袖、最具眼光的投资家和最具创新力的创业家发起成立的一个创业创富（或投融资）组织，是专门为中文版高端读者提供增值服务的组织。</p><br>
											<p><h4><strong>福布斯中国增长会宗旨——把握创新机会，实现快速增长</strong></h4></p>
											<p>-帮助投资人会员发现潜力企业的投资价值，分享中国高增长机会</p>
											<p>-帮助潜力企业会员通过股权投资等融资方式，获得资本及管理经验，实现企业的高成长</p><br>
											<p><h4><strong>福布斯中国增长会会员服务——</strong></h4></p>
											<p>-福布斯潜力企业数据库</p>
											<p>-潜力企业年度报告</p>
											<p>-与行业、城市相关的投融资论坛、研讨会</p>
											<p>-PE/VC投资考察行</p><p>-国外最新资讯月度通讯</p>
											<p>-等等</p>	
										</div>								
									</div><!-- 增长会介绍 end -->
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
var day_array = new Array(1,2);

$(function() {
	$(".left-calendar").datepicker({
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
	init_month();
	<?php if(!empty($today)){?>
	show_today();
	<?php }?>

	$(".ui-state-default").live('click',function(){
		if($.inArray($(this).text(),day_array)>-1){
			get_activity($(this),$(this).text());
		}
		init_day();
	});

	$(".ui-datepicker-month").live('change',function(){
		init_month();
	});

	$(".ui-datepicker-year").live('change',function(){
		init_month();
	});

	$(".ui-icon").live('click',function(){
		init_month();
	});
});

function init_month(){
	var month = $(".ui-datepicker-month").val();
	var year = $(".ui-datepicker-year").val();
	$.post('init_month.php',{'month':month,'year':year},function(data){
		day_array = data.split("|");
		init_day();
	});
}

function init_day(){
	$(".ui-state-default").each(function(){
		if($.inArray($(this).text(),day_array)>-1){
			$(this).css('color','#ff0000');
		}
	});
}


function show_today(){
	var top = $(".hasDatepicker").offset().top+120;
	var left = $(".hasDatepicker").offset().left+30;
	$("#dialog").dialog({
		draggable: false,
		position:[left,top],
		width:180,
		height:130,
		resizable: false
	});
	$(".ui-dialog").css('top',top);
}

function show_activity(ob){
	var top = $(".hasDatepicker").offset().top+120;
	var left = $(".hasDatepicker").offset().left+30;
	$("#dialog").dialog({
		draggable: false,
		position:[left,top],
		width:180,
		height:130,
		resizable: false
	});
	$(".ui-dialog").css('top',top);
}

function get_activity(ob,day){
	var month = $(".ui-datepicker-month").val();
	var year = $(".ui-datepicker-year").val();
	$("#dialog").load('get_activity.php?day='+day+'&month='+month+'&year='+year,function(){
		show_activity(ob);
		init_day();
	});
	
}
</script>