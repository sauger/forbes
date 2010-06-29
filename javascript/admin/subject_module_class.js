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
	this.name;
	this.record_limit;
	this.refresh_dom = '#subject_item_container';
	this.id='-1';
	this.description = '';
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
		case 'newslist':
			return '[新闻列表]('+limit+'条)';
			break;
		case 'news':
			return '[新闻内容]';
			break;
		case 'photolist':
			return '[图片列表]('+limit+'条)';
			break;
		case 'photo':
			return '[图片展示]';
			break;	
		case 'videolist':
			return '[视频列表]('+limit+'条)';
			break;	
		case 'video':
			return '[视频展示]';
			break;
		case 'commet':
			return '[专题评论]('+limit+'条)';
			break;				
	}
}
	this.refresh_p = function(){
		var cate = $('#category_type').attr('value');
		switch(cate){
			case 'newslist':
				$('#limit_p').show();
				$('#eheight_p').hide();
				$('#ewidth_p').hide();
				$('#scroll_type_p').show();
				$('#show_pic_p').show();
				break;
			case 'news':
				$('#limit_p').hide();
				$('#eheight_p label').html('新闻高度:');
				$('#eheight_p').show();
				$('#ewidth_p label').html('新闻宽度:');
				$('#ewidth_p').show();
				$('#scroll_type_p').hide();
				$('#show_pic_p').hide();
				break;				
			case 'photolist':
				$('#limit_p').show();
				$('#eheight_p label').html('图片高度:');
				$('#eheight_p').show();
				$('#ewidth_p label').html('图片宽度:');
				$('#ewidth_p').show();
				$('#scroll_type_p').show();
				$('#show_pic_p').hide();
				break;
			case 'photo':
				$('#limit_p').hide();
				$('#eheight_p label').html('图片高度:');
				$('#eheight_p').show();
				$('#ewidth_p label').html('图片宽度:');
				$('#ewidth_p').show();
				$('#scroll_type_p').hide();
				$('#show_pic_p').hide();
				break;	
			case 'videolist':
				$('#limit_p').show();
				$('#eheight_p').hide();
				$('#ewidth_p').hide();
				$('#scroll_type_p').show();
				$('#show_pic_p').hide();
				break;
			case 'video':
				$('#limit_p').hide();
				$('#eheight_p label').html('视频高度:');
				$('#eheight_p').show();
				$('#ewidth_p label').html('视频宽度:');
				$('#ewidth_p').show();
				$('#scroll_type_p').hide();
				$('#show_pic_p').hide();
				break;
			case 'commet':
				$('#limit_p').show();
				$('#eheight_p').hide();
				$('#ewidth_p').hide();
				$('#scroll_type_p').show();
				$('#show_pic_p').hide();
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
