$(function(){
	$('.nav_menu').hover(function(){
		$('.nav_menu').css('background','none');
		$(this).css('background','url("./images/nav_hover_bj.jpg") repeat-x');
	});
	$('.nav_menu').click(function(){		
		var selected = $('.nav_menu').index($(this));
		if(selected ==0){
			window.location.href="./index.html";
			}
		else if (selected ==1){
			window.location.href="./test_lt_bj.html";
			}
		else if(selected === 2){
			window.location.href="./test_intr_luntan.html";
			}
		else if(selected === 3){
			window.location.href="./test_guest.html";
			}
		else if(selected === 4){
			window.location.href="./test_intr_cs.html";
			}
		else if(selected === 5){
				window.location.href="./test_media.html";
			}
		else if(selected === 6){
			window.location.href="./test_past.html";
			}
	});
});
