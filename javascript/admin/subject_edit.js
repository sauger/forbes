/**
 * @author sauger
 */
$.contextMenu.theme = 'xp';   
var menu1 = [ {'添加模块':function(menuItem,menu) { add_subject_item(this); } }, $.contextMenu.separator, {'删除所有':function(menuItem,menu) { 
				if(confirm('确认删除?')){
					$(this).find('.module').each(function(){
						delete_module(this);
					});
					
				}
				
			} } ]; 		
var menu2 = [
			{'添加新模块':function(menuItem,menu){
				add_subject_item($(this).parent());
			}},
			{'编辑该模块':function(menuItem,menu){
				
				tb_show('编辑','subject_module_edit.php?height=350&width=400&pos_name=' + $(this).parent().attr('id') + '&subject_id=' + $('#hidden_id').attr('value') + '&id=' + $(this).attr('id'),false)
			}},
			/*$.contextMenu.separator,
			{'关联内容':function(menuItem,menu){
				
				param = $(this).find("input").serialize();
				tb_show('编辑','subject_select_items.php?height=400&width=700&' + param,false)
			}},*/
			$.contextMenu.separator,
			{'删除该模块':function(menuItem,menu){
				if(confirm('确认删除?')){delete_module(this);}
			}}
];

function delete_module(ob){
	var cate_id = $(ob).attr('id');
	if(cate_id > 0){
		$.post('subject_item_delete.php',{'id':cate_id},function(data){
			if(data != 'ok'){
				alert('删除失败!' + data);
				return false;
			}
		});	
	}
	$(ob).remove();
}

function add_subject_item(ob){ //,cate_id,name,cate_type,desc,limit,donot_show,iheight,ewidth,eheight,scroll_type){
	tb_show('编辑','subject_module_edit.php?height=420&width=400&pos_name=' + $(ob).attr('id') + '&subject_id=' + $('#hidden_id').attr('value') ,false);
}

function init_contextmenu(){
	$('.subject_pos').contextMenu(menu1);
	$('.subject_pos').sortable({
		connectWith: '.subject_pos',
		stop: function(event, ui) {
			//$(this).sortable('disable');
			jQuery.post('save_priority.post.php',{'ids':$(this).sortable('toArray').join(),'pos':$(this).attr('id')});
		},
		receive: function(event, ui) {
			//$(ui.item).find("input:eq(6)").attr('value',$(this).attr('id'));		
			jQuery.post('save_priority.post.php',{'ids':$(this).sortable('toArray').join(),'pos':$(this).attr('id')});
		}
	});
}


	$(function(){
		init_contextmenu();
		
	});
