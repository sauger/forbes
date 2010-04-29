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
		
		$(".required").each(function(){
			if($(this).val()==''){
				flag = false;
				alert('不能为空！');
				$(this).focus();
				return false;
			}
		});
		
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
			})
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
});
