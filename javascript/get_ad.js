$(function(){
	var parttern = /\/([^\/]*)\/?\s*/;
	var channel =  parttern.exec(location.pathname);
	if(channel){
		channel = channel[1];
	}else{
		channel = "index";
	}
	if(channel=='')channel='index';
	var ads = $('div.ad_banner');
	ads.each(function(){
		var ob = $(this);
		var banner = $(this).attr('id');
		var href  = '/ajax/load_ad.php?channel='+channel+'&banner='+banner;
		
		$.getJSON(href,{url:location.pathname},function(data){
			if(data){
				if(data.type=='word'){
					$(ob).html("<iframe scrolling='no' width='"+data.width+"' height='"+data.height+"' frameborder='no' border='0' src='/ajax/show_ad.php?id="+data.id+"'></iframe>");
				}else if(data.type=='two'){
					$(ob).html(data.two);
					$height = $(ob).attr('bheight')+'px';
					$(ob).find('img').css('height',$height);
					setTimeout(function(){
						$(ob).find('img').hide('blind');
						setTimeout(function(){
							$(ob).html(data.content);
						}, 1000);
					}, 3000);
				}else{
					$(ob).html(data.content);
				}
			}
		});
		//$(this).load('/ajax/load_ad.php?channel='+channel+ '&banner='+$(this).attr('id'),{url:location.pathname});
	});
	$('div.ad_banner').live('click',function(e){
		$.post('/ajax/add_click_ad.php',{'code':$(this).find('input:first').val(),url:location.pathname});
	});
	
});