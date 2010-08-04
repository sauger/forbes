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
	
	
	var change_flag = 0;
	$("#top_num div").click(function(){
		change_top($(this));
	});
	
	$("#qie_img").hover(function(){
		change_flag = 1;
	},function(){
		change_flag = 0;
	});
	
	function auto_turn_top(){
		if(change_flag==0){
			var index = $(".select_top_num").text();
			if(index==5){
				change_top($("#top_num div").first());
			}else{
				change_top($(".select_top_num").next());
			}
			setTimeout(function(){
				auto_turn_top();
			},5000);
		}else{
			setTimeout(function(){
				auto_turn_top();
			},5000);
		}
	}
	
	function change_top(ob){
		$("#top_num div").attr('class','normal_top_num');
		$(ob).attr('class','select_top_num');
		var index = $(ob).text()-1;
		$(".top_img").hide();
		$(".top_box").hide();
		$(".top_img:eq("+index+")").show();
		$(".top_box:eq("+index+")").show();
	}
	
	setTimeout(function(){
		auto_turn_top();
	},5000);
	
});
