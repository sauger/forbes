/**
 * @author loong
 */
var field_index = 0;
var head_index = 0;
function toggle_list_type(){
	var list_type = $('#list_type').val();
	if(list_type == "1"){
		$('#add_attribute').hide();
	}
};
$(function(){

	$('#list_type').change(function(){
		if($(this).val() == '1'){
			$('#add_attribute').show();

		}else{
			$('#add_attribute').hide();
			$('tr.custom_list_tr').remove();
		}
	});
	$('img.del_old').click(function(){
		var col = $(this).prev().val();
		$('form').append('<input type="hidden" name="del_columns[]" value="'+col+'"');
	});
	$('img.del_column').live('click',function(){
		$(this).parent().parent().remove();
	});	
	$('input:checkbox').live('change',function(){
		$(this).parent().find('input:checkbox').not($(this)).attr('checked',false);
	});
	$('#submit').click(function(){
		if($('#list_type').val() != '1') return true;
		var id = $('#id').val();
		if(!id){
			if($('img.del_column').length <= 0){
				alert('请至少为榜单添加一个列');
				return false;
			};
		}
		return true;
	});
	$('#add_attribute').click(function(){
		field_index = field_index + 1;
		var str = '		<tr class="tr4 custom_list_tr">'
			+'<td class=td1>列名</td>'
			+'<td width="665">'
			+'	<div style="float:left"><input type="text" name="new_columns[' + field_index +'][comment]"  class="required">'
			+'	<select name="new_columns[' + field_index +'][type]" style="width:100px;">'
			+'		<option value="varchar(255)">字符串</option>'
			+'		<option value="int(11)">整数</option>'
			+'		<option value="float">浮点数</option>'
			+'		<option value="text">长字符串</option>'
			+'	</select>'
			+'  </div>'
			+'	<div style="float:left"><input name="new_columns[' + field_index +'][key]" value="MUL" type="checkbox" style="width:20px;" />排序</div>'
			+'	<div style="float:left"><input name="new_columns[' + field_index +'][key]" value="UNI"  type="checkbox" style="width:20px;" />唯一</div>'
			+'	<img alt="删除" title="删除" src="/images/admin/btn_delete.png" style="cursor:pointer;" class="del_column">'
			+'</td>'
			+'</tr>';
		$('tr.tr4:last').after(str);
	});
	
	$('#add_head').click(function(){
		head_index = head_index + 1;
		var str = '<tr class="tr4 head">'
				+ '<td class="td1">榜单头部</td>'
				+ '<td class="list_head">名称： <input type="text" name="new_head['+head_index+'][name]" style="width:200px;"/>起始列： <input type="text" name="new_head['+head_index+'][from_field]" />结束列：<input type="text" name="new_head['+head_index+'][end_field]" />'
				+ '<img alt="删除" title="删除" src="/images/admin/btn_delete.png" style="cursor:pointer;" class="del_head">'
				+ '</td></tr>';
		if($('.head').length > 0){
			$('.head:last').after(str);
		}else{
			$('#head_tool').after(str);
		}
	});
	
	$('.del_head').live('click',function(){
		$(this).parent().parent().remove();
	});
	
	$(".del_exist_head").live('click',function(){
		$('.btools td:last').append('<input type="hidden" name="del[]" value="' +$(this).parent().find('input:last').val() + '"');
		$(this).parent().parent().remove();
		//alert('<input type="hidden" name="del[]" value="' +$(this).parent().find('input:last').val() + '"');
	});
	
	$("#use_pos").change(function(){
		if($(this).attr('checked')){
			$('#position').show();
		}else{
			$('#position').hide();
		}
	});
});