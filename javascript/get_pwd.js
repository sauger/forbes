$(function(){
	$("#change_pic").click(function(){
		$("#yz_img").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	})
});
