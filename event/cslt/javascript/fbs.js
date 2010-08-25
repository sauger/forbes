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
			window.location.href="./bg_forum.html";
			}
		else if(selected === 2){
			window.location.href="./meeting.html";
			}
		else if(selected === 3){
			window.location.href="./guest.html";
			}
		else if(selected === 4){
			window.location.href="./intr_cs.html";
			}
		else if(selected === 5){
				window.location.href="./media.html";
			}
		else if(selected === 6){
			window.location.href="./review.html";
			}
		else if(selected === 7){
			window.location.href="./contact.html";
			}
	});
});
