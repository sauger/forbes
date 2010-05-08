$(function(){
	$("#add_income1").click(function(){
		if($("#year1").val()!=''&&$("#income1").val()!=''){
			if(isNaN($("#year1").val())){
				alert("请输入数字！");
				return false;
			}
			if(isNaN($("#income1").val())){
				alert("请输入数字！");
				return false;
			}
			
			var flag = true;
			$("#income1_s option").each(function(){
				if($(this).val()==$("#year1").val()+','+$("#income1").val()){
					alert('请不要重复添加!');
					flag = false;
				}
			});
			if(flag){
				var str = '<option value="'+$("#year1").val()+','+$("#income1").val()+'">'+$("#year1").val()+'年'+$("#income1").val()+'万人民币</option>'
				$("#income1_s").append(str);
			}
		}
	});
	$("#del_income1").click(function(){
		$("#income1_s option:selected").remove();
	});
	$("#add_income2").click(function(){
		if($("#year2").val()!=''&&$("#income2").val()!=''){
			if(isNaN($("#year2").val())){
				alert("请输入数字！");
				return false;
			}
			if(isNaN($("#income2").val())){
				alert("请输入数字！");
				return false;
			}
			
			var flag = true;
			$("#income2_s option").each(function(){
				if($(this).val()==$("#year2").val()+','+$("#income2").val()){
					alert('请不要重复添加!');
					flag = false;
					return false;
				}
			});
			if(flag){
				var str = '<option value="'+$("#year2").val()+','+$("#income2").val()+'">'+$("#year2").val()+'年'+$("#income2").val()+'万人民币</option>'
				$("#income2_s").append(str);
			}
		}
	});
	$("#del_income2").click(function(){
		$("#income2_s option:selected").remove();
	});
	
	$("#sumbit").click(function(){
		var flag = true;
		var check = false;
		if($('#file').val()!="")
		{
			if(!lastname($('#file').val()))
			{
				flag=false;
				return false;
			}
		}
		$(".required").each(function(){
			if($(this).val()==''){
				flag = false;
				alert('不能为空！');
				$(this).focus();
				return false;
			}
		});
		if(flag){
			if($("#r_textarea").val().length>2000){
				alert('项目简介不能超过2000字！');
				flag = false;
				$("#r_textarea").focus();
				return false;
			}
		}
		
		if(flag){
			$("input[type=radio]").each(function(){
				if($(this).attr('checked'))check = true;
			});
			if(!check){
				alert('不能为空！');
				flag = false;
				$("input[type=radio]").focus();
				return false;
			}
		}
		
		if(flag){
			$(".number").each(function(){
				if(isNaN($(this).val())){
					flag = false;
					alert('请输入数字！');
					$(this).focus();
					return false;
				}
			});
		}
		if(flag){
			var income1 = new Array();
			var income2 = new Array();
			$("#income1_s option").each(function(){
				income1.push($(this).val());
			});
			$("#income2_s option").each(function(){
				income2.push($(this).val());
			});
			$('#h_income1').val(income1.join('|'));
			$('#h_income2').val(income2.join('|'));
			$("#sign").submit();
		}
	});
	function lastname(obj){
		//获取欲上传的文件路径
		var filepath = obj;
		//为了避免转义反斜杠出问题，这里将对其进行转换  
		var re = /(\\+)/g;
		var filename=filepath.replace(re,"#");
		//对路径字符串进行剪切截取
		var one=filename.split("#");
		//获取数组中最后一个，即文件名
		var two=one[one.length-1];
		//再对文件名进行截取，以取得后缀名
		var three=two.split(".");
		//获取截取的最后一个字符串，即为后缀名
		var last=three[three.length-1];
		//添加需要判断的后缀名类型
		var tp ="pdf,ppt,doc,docx,DOC,DOCX,PPT";
		//var tp ="jpg,gif,bmp,JPG,GIF,BMP";
		//返回符合条件的后缀名在字符串中的位置
		var rs=tp.indexOf(last);
		//如果返回的结果大于或等于0，说明包含允许上传的文件类型
		if(rs>=0){
			return true;
		}else{
		alert("请上传word|PPT|PDF文档！");
		return false;
		}
	}
});

