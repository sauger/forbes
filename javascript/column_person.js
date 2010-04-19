$(function(){
	$('.other_title').click(function(){
		for(var i=1;i<4;i++)
		{
			$('#other_title'+i).attr('css','other_title');
		}
		$(this).attr('css','dq_title');
		if($(this).attr('param')!=1)
		{	
			$(this).css('margin-left','60px;');		
		}
		var iframsrc='iframe.php?id='+$('#columnid').attr('value')+'&type='+$(this).attr('param1');
		$('#iframesrc').attr('src',iframsrc);
	});
});
