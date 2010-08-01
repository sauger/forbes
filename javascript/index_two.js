$(function(){
	$("#zt_prev").click(function(e){
		e.preventDefault();
		var str =$('.qie_banner:last');
		$('.qie_banner:last').remove();
		$("#qie_banner").prepend(str);
	});
	
	$("#zt_next").click(function(e){
		e.preventDefault();
		var str = $('.qie_banner:first');
		$('.qie_banner:first').remove();
		$("#qie_banner").append(str);
	});
	
	$("#day div").hover(function(){
		$("#day div").css('color','#525250');
		$(this).css('color','#A50203')
		var time = $(this).attr('id');
		$(".day_banner").hide();
		$(".favor"+time).show();
	},function(){});
});
