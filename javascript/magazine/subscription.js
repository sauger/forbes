$(function(){
	$(".colorbox").colorbox();
	$(".ApplyType").click(function(){
		$('#applyvalue').attr('value',$(this).val());
		if($(this).val()==1)
		{
			$('#xdtable').css('display','inline');
		}
		else
		{
			$('#xdtable').css('display','none');
		}
	})
	$("#su_bottom").click(function(){
		if($('#applyvalue').val()==1)
		{
			if($('#ReaderNo').val()=="")
			{
				alert('请输入读者编号！');
				$('#ReaderNo').focus();
				return false;
			}
		}
		$(".required").each(function(){
			if($(this).val()==''){                 
				flag = false;                 
				alert('请输入完整信息！');                 
				$(this).focus();                 
				return false;
			}         
		});
		if(!isEmail($('#Email').val()))
		{
			alert('请输入正确的邮件地址！');
			return false;
		}
		if($("#rvcode").val()==''){
			alert('请输入验证码');
			$("#rvcode").focus();
			return false;
		}else{
			$.post('check_session.php',{'rvcode':$("#rvcode").val()},function(data){
				if(data == '0'){
					alert('验证码错误！');
					return false;
				}else{
					$("#subscriptionform").submit();
				}
			});
		}
	});
	
});


function isEmail( str ){ 
	var myReg = /^[-_.A-Za-z0-9]+@([-_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 