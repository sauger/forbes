var vote_num = 0;

$(function() {
		
		var num = 1; //记录有几条投票项目	
		var display = "none"; //是否显示添加图片的框
		var empty = "item_image"; //图片是否可以为空
	

		$("#submit").click(function(){
			var oEditor = FCKeditorAPI.GetInstance('title') ;
			var title = oEditor.GetHTML();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
		}); 		

	
	
		$(".date_jquery").datepicker(
			{
				monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			}
		);
		//日历框函数
		
		$("#add_item").click(function(){
			num++;
			$("#vote_item_count").attr('value',num);
			$("#list").append("<tr class=tr3 id='tr"+num+"' name='new_item'><td>投票项目：</td><td align='left'>标题<input type='text' name='vote_item"+num+"[title]' style='width:300px;' class='required'>&nbsp;<input type='hidden' name='MAX_FILE_SIZE' value='2097152'><input name='item_image"+num+"' type='file' class='"+empty+"' style='display:"+display+";'><a class='del_item' style='cursor:pointer;'>删除</a><input type='hidden' name='deleted"+num+"' id='deleted"+num+"' value='false'></td></tr>");
			$(".del_item").click(function(){
				$(this).prev().attr('class','');
				$(this).prev().prev().prev().attr('class','');
				$(this).next().attr('value','true');
				$(this).parent().parent().hide();
			})
			
		});
		//添加一个投票项目
		$("#many").hover(function(){
			if($("#end").attr('value')==""||$("#start").attr('value')==""){ //如果开始和结束时间没有填写，则不能添加子投票
				$("#can_not_add").show(); 
				$(".thickbox").hide();
			}else{
				if($("#can_not_add").is(':visible')){
					$("#can_not_add").hide();
					$(".thickbox").show();
				}
				$("#add_sub_vote").attr('href','vote_add.ajax.php?start='+$("#start").attr('value')+'&end='+$("#end").attr('value')+'&limit='+$("#select_limit_type").attr('value')+'&max='+$("#max_vote_count").attr('value')+'&KeepThis=true&TB_iframe=true&height=400&width=540');
				
				//子投票使用thickbox弹出框的形式，使用href来指定参数
			}
		});
		//使用鼠标放到添加子投票链接上的时候来判断是否符合添加子投票的条件
		
		$("#select_vote_type").change(function(){
			if($(this).attr('value')=="word_vote"||$(this).attr('value')=="image_vote"){ 
				$(".sub_vote").remove();
				vote_num = 1; //投票项目重新计数
				$("#first_item").attr('class','required');
				$("#single").show();
				$("#many").hide();
				if($(this).attr('value')=="image_vote"){
					$(".item_image").show();
					display = "inline";
					$(".item_image").attr('class','item_image required')
					empty = "item_image required";
				}else{ 
					$(".item_image").hide();
					display = "none";
					$(".item_image").attr('class','item_image')
					empty = "item_image";
				}
			}else{ //如果投票类型是复合投票，则首先将添加过的投票选择都删除，然后将添加子投票的链接显示出来
				$("tr[name]").each(function(){
					$(this).remove();
				});
				$(".item_image").attr('class','item_image');
				$("#first_item").attr('class','');
				num = 1; //投票项目重新计数
				$("#single").hide();
				$("#many").show();
			}
		});
		//当投票类型选择框变化时，通过类型来显示不同的投票项目
});

function remove_tb(vote_id){
	vote_num++;
	$("#item").before('<tr class="tr3 sub_vote"><td>投票项目：</td><td align="left" ><a href="vote_add.ajax.php?id='+vote_id+'&KeepThis=true&TB_iframe=true&height=600&width=600" id="thickbox'+vote_id+'">查看该投票</a><a class="del_vote" style="cursor:pointer;margin-left:50px">删除</a><input type="hidden" name="deleted'+vote_num+'" id="deleted'+vote_num+'" value="false"><input type="hidden" name="vote_id'+vote_num+'" value="'+vote_id+'"></td></tr>');
	$("#vote_item_count").attr('value',vote_num);
	$(".del_vote").click(function(){
		$(this).parent().parent().hide();
		$(this).next().attr('value','true');
	});
	tb_remove(); //关闭弹出窗口
	tb_init('#thickbox'+vote_id); //注册thickbox
}

function remove_tb2(){
	tb_remove(); //关闭弹出窗口
}

