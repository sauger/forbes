$(function(){
	$('.other_title').click(function(){
		var i;
		for(i=1;i<4;i++)
		{
			$('#othertitle'+i).attr('class','other_title');
		}
		
		$(this).attr('class','dq_title');	
		var iframsrc='iframe.php?id='+$('#columnid').attr('value')+'&type='+$(this).attr('param1')+'&date='+$('#columndate').attr('value');
		$('#iframesrc').attr('src',iframsrc);
	});
});
