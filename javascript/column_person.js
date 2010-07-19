$(function(){
	$('.other_title').click(function(){
		$('.other_title').removeClass('selected');
		$(this).addClass('selected');	
		//alert($('#columnid').attr('value'));
		var iframsrc='iframe.php?id='+$('#columnid').attr('value')+'&type='+$(this).attr('id')+'&date='+$('#columndate').attr('value');
		$('#iframesrc').attr('src',iframsrc);
	});
	$('#btn_collect').click(function(){
		$.getScript('/ajax/collect_column.php?column_id=' + $('#columnid').val());
	});
	$('#a_image').click(function(e){
		e.preventDefault();
		$('#other').click();
	});
	$('.c_b_content a').click(function(e){
		e.preventDefault();
		if($(this).hasClass('selected')){
			$('#columndate').val('');
			$(this).removeClass('selected');
		}else{
			$('#columndate').val($(this).html());
			$('.c_b_content a').removeClass('selected');
			$(this).addClass('selected');
		}
		$('.other_title.selected').click();
	});
});
