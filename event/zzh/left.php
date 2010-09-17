<div class="logo"><img src="images/logo.gif" /></div>
<div class="left-main">
	<div class="left-application"><a href="on-line.php"></a></div>
	<div class="left-nav">
		<ul>
		<?php 
			$url = $_SERVER['PHP_SELF'];
			$filename= substr( $url,strrpos($url,'/')+1 );
		?>
			<li><a <?php if($filename=='index.php'){?>class="bc"<?php }?> href="index.php" onfocus="this.blur()">增长会介绍</a></li>
			<li><a <?php if($filename=='vip.php'){?>class="bc"<?php }?> href="vip.php" onfocus="this.blur()">会员专享</a></li>
			<li><a <?php if($filename=='prediction.php'){?>class="bc"<?php }?> href="prediction.php" onfocus="this.blur()">活动专区</a></li>
			<li><a <?php if($filename=='cooperation.php'){?>class="bc"<?php }?> href="cooperation.php" onfocus="this.blur()">合作伙伴</a></li>
			<li><a <?php if($filename=='contact us.html'){?>class="bc"<?php }?> href="contact us.html" onfocus="this.blur()">联系我们</a></li>
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
	<div id="date_word">红色字体代表当天有活动安排，请点击日期数字查看活动概要</div>
	<div class="left-part">
		<div class="left-part-top">部分会员</div>
		<div class="left-part-c">
		<?php 
			$partner = $db->query("select * from zzh_partner order by priority limit 4");
			!$partner && $partner = array();
			foreach($partner as $v){
		?>
			<a class="left-part-pic" href="<?php echo $v->link;?>"><img src="<?php echo $v->image;?>" /></a>
		<?php }?>
		</div>
		<div class="left-part-bot"><img src="images/part-bot.gif" /></div>	
	</div>
	<!--<div class="left-banner"><img src="images/banner.gif" /></div>-->
</div>
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
		dateFormat: 'yy-mm-dd',
		onChangeMonthYear: function(year, month, inst) {init_month(year,month);},
		onSelect: function(dateText, inst) {get_activity(dateText);}
	});
	init_month($(".ui-datepicker-year").val(),$(".ui-datepicker-month").val()-(-1));
	<?php if(!empty($today)){?>
	show_today();
	<?php }?>

});

function init_month(year,month){
	$.post('init_month.php',{'month':month,'year':year},function(data){
		day_array = data.split("|");
		setTimeout(function(){
			init_day();
		},300);
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

function show_activity(){
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

function get_activity(date){
	$("#dialog").load('get_activity.php?date='+date,function(){
		show_activity();
		setTimeout(function(){
			init_day();
		},300);
	});
	
}
</script>