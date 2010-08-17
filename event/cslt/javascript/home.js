$(function(){
	var speed=30;   
	var demo = $("#demo");   
	var demo1 = $("#demo1");   
	var demo2 = $("#demo2");
	demo2.html(demo1.html());   
	function Marquee1(){    
	    if(demo.scrollLeft()>=demo1.width())   
	        demo.scrollLeft(0);    
	    else{   
	        demo.scrollLeft(demo.scrollLeft()+1);   
	    }   
	}    
	var MyMar1=setInterval(Marquee1,speed) 

	
	var speed=30;   
	var demo3 = $("#demo3");   
	var demo4 = $("#demo4");   
	var demo5 = $("#demo5");
	demo5.html(demo4.html());   
	function Marquee2(){    
		if(demo3.scrollLeft()==0){   
	        demo3.scrollLeft(demo4.width());   
	    }else{   
	        demo3.scrollLeft(demo3.scrollLeft()-1);   
	    }     
	}    
	var MyMar2=setInterval(Marquee2,speed)


	var speed=30;   
	var demo7 = $("#demo7");   
	var demo8 = $("#demo8");   
	var demo9 = $("#demo9");
	demo9.html(demo8.html());   
	function Marquee3(){    
	    if(demo7.scrollLeft()>=demo8.width())   
	        demo7.scrollLeft(0);    
	    else{   
	        demo7.scrollLeft(demo7.scrollLeft()+1);   
	    }   
	    
	}    
	var MyMar3=setInterval(Marquee3,speed)    
	demo7.mouseover(function() {   
	    clearInterval(MyMar3);   
	} );   
	demo7.mouseout(function() {   
	    MyMar3=setInterval(Marquee3,speed);   
	} );
	
});