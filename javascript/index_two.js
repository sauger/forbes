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
	
	$(".colorbox").colorbox();
	
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
	
	$("#recommend_left").hover(function(){
		$("#recommend_left").css("background","url('/images/index_two/list_l.jpg')");
		$(".recommend_center").css("background","url('/images/index_two/list_c2.jpg')");
		$("#recommend_right").css("background","url('/images/index_two/list_r2.jpg')");
	},function(){});
	
	$("#recommend_right").hover(function(){
		$("#recommend_left").css("background","url('/images/index_two/list_l2.jpg')");
		$(".recommend_center").css("background","url('/images/index_two/list_c2.jpg')");
		$("#recommend_right").css("background","url('/images/index_two/list_r.jpg')");
	},function(){});
	
	$(".recommend_center").hover(function(){
		$("#recommend_left").css("background","url('/images/index_two/list_l2.jpg')");
		$(".recommend_center").css("background","url('/images/index_two/list_c2.jpg')");
		$("#recommend_right").css("background","url('/images/index_two/list_r2.jpg')");
		$(this).css("background","url('/images/index_two/list_c.jpg')");
	},function(){});
	
	$(".recommend_title").hover(function(){
		var index = $(".recommend_title").index($(this)[0]);
		$("#recommend_btn").find('a').hide();
		$("#recommend_btn").find('a').eq(index).show();
		$(".rt_tab").hide();
		$(".rt_tab").eq(index).show();
		$(".recommend_title").css('font-weight','normal');
		$(this).css('font-weight','bold');
		$(".recommend_title a").css('color','#838486');
		$(this).find('a').css('color','#000000');
	},function(){});
	
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
	
	$("#content_qie_left").hover(function(){
		$(".guide").hide();
		$("#ljzzc").show();
		$("#content_qie_left img").show();
		$("#content_qie_right img").hide();
		$("#content_qie_left").css({'background-image':'url(/images/index_two/right_u.jpg)','color':'#B00001','font-weight':'bold'});
		$("#content_qie_right").css({'background-image':'url(/images/index_two/left_s.jpg)','color':'#B5B5B5','font-weight':'normal'});
	},function(){});
	$("#content_qie_right").hover(function(){
		$(".guide").hide();
		$("#jhdd").show();
		$("#content_qie_right img").show();
		$("#content_qie_left img").hide();
		$("#content_qie_left").css({'background-image':'url(/images/index_two/right_s.jpg)','color':'#B5B5B5','font-weight':'normal'});
		$("#content_qie_right").css({'background-image':'url(/images/index_two/left_u.jpg)','color':'#B00001','font-weight':'bold'});
		
	},function(){});
	
	setTimeout(function(){
		auto_turn_top();
	},5000);
	
});
