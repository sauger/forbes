$(function(){
	var parttern = /\/(.*)\/\s*/;
	var channel =  parttern.exec(location.pathname);
	if(channel){
		channel = channel[1];
	}else{
		channel = "index";
	}
	var ads = $('div.ad_banner');
	ads.each(function(){
		$(this).load('/ajax/load_ad.php?channel='+channel+ '&banner='+$(this).attr('id'));
	});
	
});