$(function(){
	$('.other_title').click(function(){
		for(var i=1;i<4;i++)
		{
			$('#othertitle'+i).attr('class','other_title');
		}
		
		$(this).attr('class','dq_title');
		if($(this).attr('param')!="1")
		{	
			$(this).css('margin-left','60px;');		
		}
		var iframsrc='iframe.php?id='+$('#columnid').attr('value')+'&type='+$(this).attr('param1')+'&date='+$('#columndate').attr('value');
		$('#iframesrc').attr('src',iframsrc);
	});
});
