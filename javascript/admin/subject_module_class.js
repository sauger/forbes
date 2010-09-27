/**
 * @author sauger
 */
function subject_module_class(){
	this.pos_name = '';
	this.subject_id = 0;
	this.category_type = 'newslist';
	this.category_id;
	this.width;
	this.height;
	this.element_width;
	this.element_height;
	this.scroll_type = 'none';
	this.show_title;
	this.name;
	this.record_limit;
	this.refresh_dom = '#subject_item_container';
	this.id='-1';
	this.description = '';
	this.show_desc;
	this.show_pic;
	this.image_scale;
	this.refresh = function(){
		this.refresh_p();
		$(this.refresh_dom + ' #name').attr('value',this.name);
		$(this.refresh_dom + ' #category_type').attr('value',this.category_type);
		$(this.refresh_dom + ' #height').attr('value',this.height);
		$(this.refresh_dom + ' #category_id').attr('value',this.category_id);
		$(this.refresh_dom + ' #limit').attr('value',this.record_limit);
		$(this.refresh_dom + ' #eheight').attr('value',this.element_height);
		$(this.refresh_dom + ' #ewidth').attr('value',this.element_width);
		$(this.refresh_dom + ' #scroll_type').attr('value',this.scroll_type);
		$(this.refresh_dom + ' #hidden_module_id').attr('value',this.id);
		$(this.refresh_dom + ' #hidden_subject_id').attr('value',this.subject_id);
		$(this.refresh_dom + ' #description').attr('value',this.description);
		$(this.refresh_dom + ' #hidden_pos_name').attr('value',this.pos_name);
		$(this.refresh_dom + ' #show_title').attr('value',this.show_title);
		$(this.refresh_dom + ' #show_desc').attr('value',this.show_desc);
		$(this.refresh_dom + ' #show_pic').attr('value',this.show_pic);
		$(this.refresh_dom + ' #image_scale').attr('value',this.image_scale);
	};
		
	this.assign_from_html=function(){
		this.name = $(this.refresh_dom + ' #name').attr('value');
		this.category_type = $(this.refresh_dom + ' #category_type').attr('value');
		this.height = $(this.refresh_dom + ' #height').attr('value');
		this.record_limit = $(this.refresh_dom + ' #limit').attr('value');
		this.element_height = $(this.refresh_dom + ' #eheight').attr('value');
		this.element_width = $(this.refresh_dom + ' #ewidth').attr('value');
		this.scroll_type = $(this.refresh_dom + ' #scroll_type').attr('value');
		this.id = $(this.refresh_dom + ' #hidden_module_id').attr('value');
		this.subject_id = $(this.refresh_dom + ' #hidden_subject_id').attr('value');
		this.pos_name = $(this.refresh_dom + ' #hidden_pos_name').attr('value');
		this.category_id = $(this.refresh_dom + ' #category_id').attr('value');
		this.description = $(this.refresh_dom + ' #description').attr('value');
		this.show_title = $(this.refresh_dom + ' #show_title').attr('value');
		this.show_desc = $(this.refresh_dom + ' #show_desc').attr('value');
		this.show_pic = $(this.refresh_dom + ' #show_pic').attr('value');
		this.image_scale = $(this.refresh_dom + ' #image_scale').attr('value');
	}
	
	this.display_info=function(){
		if($('#' + this.id).length <= 0){
			var str = '<div class="subejct_item module" id="'+ this.id  + '">';
			str += '<span>' + this.name + this.conv_category_type(this.category_type,this.record_limit) + '</span></div>';			
			$('#'+this.pos_name).append(str);
			$('#' +this.id).contextMenu(menu2);
		}else{
			var str = '<span>' + this.name + this.conv_category_type(this.category_type,this.record_limit) + '</span>';			
			$('#' + this.id).html(str);
		}
		
		
	};
	
	this.conv_category_type=function(itype,limit){
	switch(itype){
		case 'news':
			return '[新闻]('+limit+'条)';
			break;
		case 'list':
			return '[常规榜单]('+limit+'条)';
			break;				
		case 'ilist':
			return '[图片榜单]('+limit+'条)';
			break;
		case 'image':
			return '[图片]('+limit+'条)';
			break;
		/*	
		case 'commet':
			return '[专题评论]('+limit+'条)';
			break;
		*/				
	}
}
	this.refresh_p = function(){
		var cate = $('#category_type').attr('value');
		switch(cate){
			case 'news':
				$("#show_pic_p").show();
				$('#show_title_p').show();
				$('#show_desc_p').show();
				$('#show_image_scale').show();
				$('#limit_p').show();
				break;
			case 'list':
				$("#show_pic_p").show();
				$('#show_title_p').show();
				$('#show_desc_p').show();
				$('#show_image_scale').show();
				$('#limit_p').show();
				break;				
			case 'ilist':
				$("#show_pic_p").show();
				$('#show_title_p').show();
				$('#show_desc_p').show();
				$('#show_image_scale').show();
				$('#limit_p').show();
				break;
			case 'image':
				$("#show_pic_p").hide();
				$('#show_title_p').hide();
				$('#show_desc_p').hide();
				$('#show_image_scale').show();
				$('#limit_p').show();
				break;	
		}
	}
};

function subject_modules_manager_class(){
	this.items = [];
	this.find=function(id){
		jQuery.each(this.items,function(){
			if(this.id == id) return this;
		});
	}
}
