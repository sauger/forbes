var headline_id=0;
var is_changed=0;
var subject_id=0;
var max_headline_id = 3;


function head_line(now_id)
{
		$(".headline_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#b"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
		
		$(".headline_pic").hide();
		$("#headline_pic_"+now_id).show();

		$(".headline_title").hide();
		$("#headline_title_"+now_id).show();		

		$(".headline_description").hide();
		$("#headline_description_"+now_id).show();		

		$(".headline_related").hide();
		$("#headline_related_"+now_id).show();		
		
		headline_id=now_id;
		is_changed=1;
}

function head_line2()
{
	  if(is_changed=="1")
	  {
	  	is_changed=0;
			setTimeout("head_line2()",6000);
	  	return false;
	  }
		var now_id=headline_id;	
		now_id=parseInt(headline_id)+1;
    if(now_id>max_headline_id){now_id=0;}

		$(".headline_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#b"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
	
		$(".headline_pic").hide();
		$("#headline_pic_"+now_id).show();

		$(".headline_title").hide();
		$("#headline_title_"+now_id).show();		

		$(".headline_description").hide();
		$("#headline_description_"+now_id).show();		

		$(".headline_related").hide();
		$("#headline_related_"+now_id).show();		
		
		headline_id=now_id;
		setTimeout("head_line2()",6000);
}

$(function(){
		max_headline_id = $('.headline_btn2').length - 1;
		$(".headline_btn2").click(function()
		{
			var now_id=$(this).attr('param');	
			head_line(now_id);
		});
	
		$(".headline_btn1").click(function()
		{
			var now_id=$(this).attr('param');	
			if(now_id=="l"){now_id=parseInt(headline_id)-1;}
			else{now_id=parseInt(headline_id)+1;}
 	    if(now_id>max_headline_id){now_id=0;}
 	    if(now_id<0){now_id=max_headline_id;}
			head_line(now_id);
		});	
});





setTimeout("head_line2()",5000);
