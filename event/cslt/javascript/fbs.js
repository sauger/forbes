function resize_iframe(){
var h;
var hh = $("#drd_iframe").contents().find("html").height();
var bs = $("#drd_iframe").contents().find("body").attr('scrollHeight');
var hs = $("#drd_iframe").contents().find("html").attr('scrollHeight');
if(window.navigator.userAgent.indexOf("MSIE")>0){
h = bs;
//IE678
}else if(window.navigator.userAgent.indexOf("Firefox")>0){
h = hh;
//FireFOX
}else{
h = hs;
//Chrome|Safari|Opera
}
h = h+40;
$("iframe").parent().height(h);
$("iframe").height(h);
}


$(function(){
	$('.nav_menu').hover(function(){
		$('.nav_menu').css('background','none');
		$(this).css('background','url("./images/nav_hover_bj.jpg") repeat-x');
	});
	$('.nav_menu').click(function(){		
		var selected = $('.nav_menu').index($(this));
		if(selected ==0){
			window.location.href="./index.html";
			//$('#drd_ifram').attr('src','./index.html');
			}
		else if (selected ==1){
			window.location.href="./test_intr_cs.html";
			//$('#drd_ifram').attr('src','./test_intr_cs.html');
			}
		else if(selected === 2){
			window.location.href="./test_lt_bj.html";
			//$('#drd_ifram').attr('src','./test_lt_bj.html');
			}
		else if(selected === 3){
			window.location.href="./test_intr_luntan.html";
			//$('#drd_ifram').attr('src','./test_intr_luntan.html');
			}
		else if(selected === 4){
			window.location.href="./test_media.html";
			//$('#drd_ifram').attr('src','./test_media.html');
			}
		else if(selected === 5){
				window.location.href="./test_guest.html";
				//$('#drd_ifram').attr('src','./test_media.html');
			}
		else if(selected === 6){
			window.location.href="./test_structure.html";
			//$('#drd_ifram').attr('src','./test_structure.html');
			}
	});
	$('#drd_iframe').load(function(){
		setTimeout(function(){
		resize_iframe();
		window.scrollTo(0,0);
		},300);
		});
});
