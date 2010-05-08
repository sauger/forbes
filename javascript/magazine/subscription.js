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
	$("#chang_pic").click(function(){
		$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	});
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
		if(!IsNum($('Mobile').val()))
		{
			alert('请输入正确的手机号码！');
			return false;
		}
		if($("#yzmcode").val()==''){
			alert('请输入验证码');
			$("#yzmcode").focus();
			return false;
		}else{
			$.post('check_session.php',{'rvcode':$("#yzmcode").val()},function(data){
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

function IsNum(s)
{
    if(s!=null){
        var r,re;
        re = /\d*/i; //\d表示数字,*表示匹配多个数字
        r = s.match(re);
        return (r==s)?true:false;
    }
    return false;
}