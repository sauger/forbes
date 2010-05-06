function jd(obj){ 
	return document.getElementById(obj); 
	} 
	function go(){ 
	jd("bar").style.width = parseInt(jd("bar").style.width) + 1 + "%"; 
	if(jd("bar").style.width == "100%"){ 
	window.clearInterval(bar); 
	} 
	
	} 
	var bar = window.setInterval("go()",5); 
	window.onload = function(){ 
	bar; 
	}	
