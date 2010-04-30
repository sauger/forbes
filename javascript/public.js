$(function(){
	$(".nav").hover(function(){
		var num=$(this).attr("param1");
		$(".nav2").css('display','none');
		$("#nav"+num).css('display','inline');
		$(".nav").parent().parent().css("background","none");
		$(this).parent().parent().css('background',"url('/images/public/bg_menu.jpg') repeat-x");
	});
	
	
	$(".search").click(function(){
		top_search()
	});
	
	$('#search_text').keypress(function(e){
		if(e.keyCode == 13){
			top_search();
		}
	});
});

function top_search(){
	var type = $(".iselect").val();
	var text = $("#search_text").val();
	
	if(type=='list'){
		window.location.href="/list/list.php?key="+encodeURI(text);
	}else if(type=='news'){
		window.location.href="/search/news.php?key="+encodeURI(text);
	}else if(type=='author'){
		window.location.href="/search/author.php?key="+encodeURI(text);
	}else if(type=='rich'){
		window.location.href="/search/rich.php?name="+encodeURI(text);
	}	
}



/* top favor*/
var isIE=(document.all&&document.getElementById&&!window.opera)?true:false;
var isMozilla=(!document.all&&document.getElementById&&!window.opera)?true:false;
var isOpera=(window.opera)?true:false;
var seturl='url(#default#homepage)';
var weburl='http://www.forbeschina.com';
var webname='福布斯中文网';


function myhomepage() {
	if(isMozilla){
	   try {netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}
	   catch (e){alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]设置为'true'");return}
	   var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
	   prefs.setCharPref('browser.startup.homepage',weburl);
	}
	if(isIE){
	   this.homepage.style.behavior=seturl;this.homepage.sethomepage(weburl);
	}
}

function addfavorite()
{

	if(isMozilla){
	   if (document.all){ window.external.addFavorite(weburl,webname);}
	   else if (window.sidebar){ window.sidebar.addPanel(webname, weburl,"");}
	}
	if(isIE){window.external.AddFavorite(weburl, webname);}
}
/* top favor*/
