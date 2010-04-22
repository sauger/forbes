var vote_num = 0;

$(function() {
		
		var display = "none"; //是否显示添加图片的框
		var empty = "item_image"; //图片是否可以为空
	
	
		$(".date_jquery").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		});
		//日历框函数
		
		
		
		$("#add_item").click(function(){
			$(".btools").before("<tr class='tr4 s_item'><td align='center'>投票项目：</td><td><input type='text' name='vote_item[title][]' class='required'>&nbsp;<input name='vote_item[]' type='file' class='"+empty+"' style='display:"+display+";'><a class='del_item' style='cursor:pointer;'>删除</a></td></tr>");
		});
		//添加一个投票项目
		/*
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
		})*/;
		//使用鼠标放到添加子投票链接上的时候来判断是否符合添加子投票的条件
		
		$("#select_vote_type").change(function(){
			if($(this).attr('value')=="word_vote"||$(this).attr('value')=="image_vote"){ 
				$(".del_vote").each(function(){
					del_vote($(this).attr('name'));
					$(this).parent().parent().remove();
				});
				$("#first_item").attr('class','required');
				$("#single").show();
				$("#many").hide();
				if($(this).attr('value')=="image_vote"){
					$(".item_image").show();
					display = "inline";
					$(".item_image").attr('class','item_image')
					empty = "item_image";
				}else{ 
					$(".item_image").hide();
					display = "none";
					$(".item_image").attr('class','item_image')
					empty = "item_image";
				}
			}else{ //如果投票类型是复合投票，则首先将添加过的投票选择都删除，然后将添加子投票的链接显示出来
				$(".s_item").remove();
				$(".item_image").attr('class','item_image');
				$("#first_item").attr('class','');
				$("#single").hide();
				$("#many").show();
			}
		});
		//当投票类型选择框变化时，通过类型来显示不同的投票项目
		
		$(".del_item").live('click',function(){
			$(this).parent().parent().remove();
		});
		
		$(".del_vote").live('click',function(){
			del_vote($(this).attr('name'));
			$(this).parent().parent().remove();
		});
		
		$(".del_old_vote").click(function(){
			del_vote($(this).attr('name'));
			del_item($(this).prev().prev().val());
			$(this).parent().parent().remove();
		});
		
		$(".del_old_item").click(function(){
			del_item($(this).attr('name'));
			$(this).parent().parent().remove();
		});
});

function remove_tb(vote_id,vote_name){
	$(".btools").before('<tr class="tr4 sub_vote"><td align="center">投票项目：</td><td><div style="width:300px;" name='+vote_id+'>'+vote_name+'</div>　　<input type="hidden" name="vote_vote[title][]" value="'+vote_name+'"><input type="hidden" name="vote_vote[id][]" value="'+vote_id+'"><a id="thickbox'+vote_id+'" href="vote_add.ajax.php?id='+vote_id+'&KeepThis=true&TB_iframe=true&height=600&width=560">点击查看</a><a class="del_vote" name="'+vote_id+'" style="cursor:pointer;margin-left:50px">删除</a></td></tr>');
	tb_remove(); //关闭弹出窗口
	tb_init('#thickbox'+vote_id); //注册thickbox
}

function remove_tb2(vote_id,vote_name){
	$("div[name="+vote_id+"]").html(vote_name);
	$("div[name="+vote_id+"]").next().val(vote_name);
	tb_remove(); //关闭弹出窗口
}

function del_vote(id){
	$.post('del_vote.php',{'id':id});
}
function del_item(id){
	$.post('del_item.php',{'id':id});
}
