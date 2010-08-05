$(function(){
	var html = $("[name=work_place2]").html();
	$("[name=work_place1]").change(function(){
		if($(this).val()!=''){
			$("[name=work_place2]").html($("#"+$(this).val()+"").html());
		}else{
			$("[name=work_place2]").html(html);
		}
	});
	
	
	$("#form_submit").click(function(e){
		e.preventDefault();
		
		
		var reqired_flag = true;
		$(".reqired").each(function(){
			if($(this).attr("error_msg") == undefined){
				var error_msg = $(this).parent().prev().text();
			}else{
				var error_msg = $(this).attr('error_msg');
			}
			if($(this).attr('type')=='radio'){
				var flag = false;
				var name = $(this).attr('name');
				$("[name="+name+"]").each(function(){
					if($(this).attr('checked')){
						flag = true;
					}
				});
				if(!flag){
					alert("请选择"+error_msg);
					$(this)[0].focus()
					reqired_flag = false;
					return false;
				}
			}else if($(this).attr('type')=='checkbox'){
				var flag = false;
				var name = $(this).attr('name');
				$("[name="+name+"]").each(function(){
					if($(this).attr('checked')){
						flag = true;
					}
				});
				if(!flag){
					alert("请至少选择一个"+error_msg);
					$(this)[0].focus();
					reqired_flag = false;
					return false;
				}
			}else if($(this).attr('tagName')=='select'){
				if($(this).val()==''){
					alert("请选择"+error_msg);
					$(this)[0].focus();
					reqired_flag = false;
					return false;
				}
			}else{
				if($(this).val()==''){
					alert("请填写"+error_msg);
					$(this)[0].focus();
					reqired_flag = false;
					return false;
				}
			}
		});
		
		if(!reqired_flag){
			return false;
		}
		var number_flag = true;
		
		$(".number").each(function(){
			if($(this).attr("error_msg") == undefined){
				var error_msg = $(this).parent().prev().text();
			}else{
				var error_msg = $(this).attr('error_msg');
			}
			if(isNaN($(this).val())){
				alert(error_msg+"必须为数字");
				$(this)[0].focus();
				number_flag = false;
				return false;
			}
		});
		if(!number_flag){
			return false;
		}
		var length_flag = true;
		
		$(".reqired").each(function(){
			if($(this).attr("error_msg") == undefined){
				var error_msg = $(this).parent().prev().text();
			}else{
				var error_msg = $(this).attr('error_msg');
			}
			if($(this).attr('maxlength')!=-1){
				var maxlength = $(this).attr('maxlength');
				if($(this).val().length>maxlength){
					alert(error_msg+"的长度不能大于"+maxlength);
					$(this)[0].focus();
					length_flag = false;
					return false;
				}
			}
		});
		
		if(!length_flag){
			return false;
		}
		
		var sure_flag = true;
		
		$("input[type=text]").each(function(){
			if($(this).attr("error_msg") == undefined){
				var error_msg = $(this).parent().prev().text();
			}else{
				var error_msg = $(this).attr('error_msg');
			}
			if($(this).attr('surelength')!=undefined){
				if($(this).val().length!=$(this).attr('surelength')){
					alert(error_msg+"的长度一定要等于"+$(this).attr('surelength'));
					$(this)[0].focus();
					sure_flag = false;
					return false;
				}
			}
		});
		
		if(!sure_flag){
			return false;
		}
		
		if(!isEmail($("[name=email]").val())){
			alert("邮箱格式不对");
			$("[name=email]")[0].focus();
			return false;
		}
		
		if($("#agree").attr('checked')&&!$("#disagree").attr('checked')){
			$("form").submit();
		}
		
		
	});
});


function isEmail( str ){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 