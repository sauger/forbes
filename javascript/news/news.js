 function copyToClipboard(txt) {   
      if(window.clipboardData) {   
              window.clipboardData.clearData();   
              window.clipboardData.setData("Text", txt);   
      } else if(navigator.userAgent.indexOf("Opera") != -1) {   
           window.location = txt;   
      } else if (window.netscape) {   
           try {   
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
           } catch (e) {   
                alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
           }   
           var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
           if (!clip)   
                return false;   
           var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);   
           if (!trans)   
                return false;   
           trans.addDataFlavor('text/unicode');   
           var str = new Object();   
           var len = new Object();   
           var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
           var copytext = txt;   
           str.data = copytext;   
           trans.setTransferData("text/unicode",str,copytext.length*2);   
           var clipid = Components.interfaces.nsIClipboard;   
           if (!clip)   
                return false;   
           clip.setData(trans,null,clipid.kGlobalClipboard);   
           return true;  
      }   
}
$(function(){
	//add view count;
	$.post('/ajax/add_news_click.php?id=' + $('#newsid').val());
	$("#news_comment").load('/ajax/news_comment.php',{'id':$("#newsid").val()},function(){
		refresh_login_box();
	});
	$('#a_collect').click(function(e){
		e.preventDefault();
		$.post('/ajax/user_collect.php',{'resource_type':'fb_news','resource_id':$(this).attr('href')},function(data){
			if(data!='请先登录!'){
				alert(data);
			}else{
				alert(data);
				window.location.href="/login/?last_url="+document.location.href;
			}
		});
	});
	$('#button4').click(function(){
		if(copyToClipboard(window.location.href)){
			alert('已复制到剪贴板，在msn，qq，或者邮件中，使用Ctrl + V与好友分享这篇文章！');
		};
	});
	
	var font_size = 14;
	
	$("#font_down").click(function(){
		if(font_size>12){
			font_size = font_size-2;
			$("#news_content").find("*").css('font-size',font_size);
		}
		if(font_size==12){
			$("#font_down").attr('src','/images/news/font1.gif');
			$("#font_down").css('cursor','auto');
		}else{
			$("#font_up").attr('src','/images/news/font2.gif');
			$("#font_up").css('cursor','pointer');
		}
	});
	$("#font_up").click(function(){
		if (font_size < 16) {
			font_size = font_size+2;
			$("#news_content").find("*").css('font-size', font_size);
		}
		if(font_size==16){
			$("#font_up").attr('src','/images/news/font4.gif');
			$("#font_up").css('cursor','auto');
		}else{
			$("#font_down").attr('src','/images/news/font3.gif');
			$("#font_down").css('cursor','pointer');
		}
	});
	
	$("#comment_caption #comment_btn").live('click',function(){
		$("#show_comment").show();
	});
	
	$("#password").live('keypress',function(e){
		if(e.keyCode == 13){
			login();
		}
	});
	
	$("#comment_login").live('click',function(){
		login();
	});
	
	$("#hid_name").live('click',function(){
		$("#nick_name").attr('disabled',true);
	});
	
	$("#has_name").live('click',function(){
		$("#nick_name").attr('disabled',false);
	});
	
	
	$(".up").live('click',function(){
		$.post('/ajax/comment.php',{'id':$(this).attr('name'),'type':'up'});
		$(this).attr('class','');
		$(this).html('已支持(');
		$(this).next().html(parseInt($(this).next().html())+1);
	});
	
	$(".down").live('click',function(){
		$.post('/ajax/comment.php',{'id':$(this).attr('name'),'type':'down'});
		$(this).attr('class','');
		$(this).html('已反对(');
		$(this).next().html(parseInt($(this).next().html())+1);
	});
	
	$.post('/ajax/comment_cout.php',{'news_id':$("#newsid").val()},function(data){
		$(".news_tools_btn2").html(data);
	});
	
	$("#commit_submit").live('click',function(){
		var nick_name;
		var content = $("#comment_text").val();
		if(content.length>1000){
			alert("评论内容过长！");
			return false;
		}
		if(content.length==0){
			alert("留言内容不能为空！");
			return false;
		}
		if($('#has_name').attr('checked') && $('#nick_name').val()==''){
			alert("请输入昵称！");
			return false;
		}
		$("input[name='nick_name']").each(function(){
			if($(this).attr('checked')){
				if($(this).val()=='hidden'){
					nick_name = '匿名用户';
				}else{
					nick_name = $("#nick_name").val();
				}
			}
		});
		$.post('/ajax/comment.php',{'content':$("#comment_text").val(),'news_id':$("#newsid").val(),'nick_name':nick_name,'type':'comment'},function(data){
			if(data=='wrong'){
				alert('发布失败！可能是包含敏感词语，请检查后重新发布!');
			}else{
				alert('发布成功！请等候管理员审批！');
				load_comment(data);
				$("#comment_text").val('');
				$("#show_comment").hide();
			}
		});
	});
});

function login(){
	$.post('/ajax/comment_login.php',{'user_name':$("#user_name").val(),'password':$("#password").val()},function(data){
		eval(data);
	});
}

function refresh_login_box(){
	if($.cookie('cache_name')){
		if($('#nick_name').val()=='' || $('#nick_name').val()== '匿名'){
			if($.cookie('name') && $.cookie('name')!= null);
			$('#nick_name').val($.cookie('name'));
		}
		$('#nick_name').show();
		$('#login_info').hide();
		$('#has_name').show().attr('checked',true);
		$('#login_info').hide();
		$('#span_nickname').show();
	}else{
		$('#nick_name').hide().val('匿名');
		$('#hid_name').attr('checked',true);
		$('#has_name').hide();
		$('#login_info').show();
		$('#span_nickname').hide();
	}
}

function load_comment(id){
	$.post('/ajax/load_unapproved_comment.php',{'comment_id':id},function(data){
		$('#show_comment').after(data);
	});
}