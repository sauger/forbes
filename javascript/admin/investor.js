/**
 * @author Administrator
 */
function add_industry(industry){
	if(industry == ''){
		alert('请选择一个行业!');
		return;
	}
	var can_add = true;
	$('#sel_industry').find('option').each(function(){
		if($(this).val() == industry){
			alert('请不要重复添加');
			can_add = false;
			return;
		}
	});
	if(can_add)
		$('#sel_industry').append('<option value="' + industry + '">' + industry + '</option>');
	
}
function delete_industry(){
	var items = $('#sel_industry option:selected');
	if(items.length <= 0){
		alert('请选择需要删除的行业');
		return false;
	}
	if(false === confirm('您确定要删除选中的行业吗？')) return;
	items.each(function(){
		$(this).remove();
	});
}

$(function(){
	$('#add_industry').click(function(){
		add_industry($("#industry option:selected").text());
	});
	
	$("#delete_industry").click(function(){
		delete_industry();
	});
	
	$("#submit").click(function(){
		var industry = new Array();
		$('#sel_industry option').each(function(){
			industry.push($(this).val());
		});
		$('#industry_name').val(industry.join(','));
		return true;
	});
	
	$('.rich_btn').click(function(){
		$('.rich_btn').css("color","#cccccc");
		$(this).css("color","#0B55C4");
		var tabs=$(this).attr("id");
		$('.tabs').hide();
		$('#tabs'+tabs).show();
	});
	
	$("#item_add").click(function(){
		var industry = $("#industry").html();
		var str = '<tr class="tr3"><td><input type="text"></td>'
				+ '<td><input type="text"></td>'
				+ '<td><select>'+industry+'</select></td>'
				+ '<td><input type="text"></td>'
				+ '<td><a class="item_del"><img src="/images/admin/btn_delete.png" border="0"></a>'
				+ '<input type="hidden" class="item_id" value="0"></td>'
				+ '</tr>';
		$("#item_box").after(str);
	});
	
	$("#job_add").click(function(){
		var str = '<tr class="tr3"><td><input type="text"></td>'
				+ '<td><input type="text"></td>'
				+ '<td><input type="text"></td>'
				+ '<td><a class="job_del"><img src="/images/admin/btn_delete.png" border="0"></a>'
				+ '<input type="hidden" class="job_id" value="0"></td>'
				+ '</tr>';
		$("#job_box").after(str);
	});
	
	$(".item_del").live('click',function(){
		if ($(this).next().val() == 0) {
			$(this).parent().parent().remove();
		}
		else {
			if(confirm("删除后无法恢复，您确认要删除改记录吗？")){
				$.post('delete_item.php',{'id':$(this).next().val()});
				$(this).parent().parent().remove();
			}
			
		}
	});
	
	$(".job_del").live('click',function(){
		if ($(this).next().val() == 0) {
			$(this).parent().parent().remove();
		}
		else {
			if(confirm("删除后无法恢复，您确认要删除改记录吗？")){
				$.post('delete_job.php',{'id':$(this).next().val()});
				$(this).parent().parent().remove();
			}
			
		}
	});
	
	$("#item_save").click(function(){
		var params = new Array();
		$('#table_item').find('.tr3').each(function(){
			params.push($(this).find('input:eq(3)').val() +'|'+ $(this).find('input:eq(0)').val() +'|'+ $(this).find('input:eq(1)').val() +'|'+ $(this).find('select').val() +'|'+$(this).find('input:eq(2)').val());
		});
		$.post('item.post.php',{'params':params.join(','),'id':$('#investor_id').val()},function(data){
			var ids = data.split(',');
			$('.item_id').each(function(i){
				$(this).val(ids[i]);
			});
			alert("保存成功");
		});
	});
	
	$("#job_save").click(function(){
		var params = new Array();
		$('#table_job').find('.tr3').each(function(){
			params.push($(this).find('input:eq(3)').val() +'|'+ $(this).find('input:eq(1)').val() +'|'+ $(this).find('input:eq(2)').val() +'|'+$(this).find('input:eq(0)').val());
		});
		$.post('job.post.php',{'params':params.join(','),'id':$('#investor_id').val()},function(data){
			var ids = data.split(',');
			$('.job_id').each(function(i){
				$(this).val(ids[i]);
			});
			alert("保存成功");
		});
	});
	
	$(".publish").click(function(){
		$.post('rela_news.php',{'news_id':$(this).attr('name'),'investor_id':$("#list_id").val(),'type':'publish'},function(data){
			window.location.reload();
		});
	});
	
	$(".revocation").click(function(){
		$.post('rela_news.php',{'id':$(this).attr('name'),'type':'revocation'},function(data){
			window.location.reload();
		});
	});
	
	$('#search_button').click(function(){
		search_news();
	});
	$('select.sau_search').change(function(){
		search_news();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_news();
		}
	});
});

function search_news(){
    if(arguments.length   ==   0)  
    	class_name   =   'sau_search';  
    else
    	class_name = arguments[0];
	var url = new Array();
	var id = 'id='+$("#list_id").val();
	url.push(id);
	$('.'+class_name).each(function(){
		url.push($(this).attr('name') + '=' + encodeURI($(this).val()));
	});
	
	url = "news_edit.php?id="+$("#list_id").val()+"&" + url.join('&');
	window.location.href=url;
}
