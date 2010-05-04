$(function(){
	$("#author_search").click(function(){
		author_search();
	});
	
	$('#author_text').keypress(function(e){
		if(e.keyCode == 13){
			author_search();
		}
	});
});
function author_search(){
	window.location.href = "author.php?key="+$("#author_text").val()+"&type="+$("#type").val();
}
