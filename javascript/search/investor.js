/**
 * @author Administrator
 */
function investor_search(){
	window.location.href = "/investor?key="+$("#key").val()+"&type="+encodeURI($("#industry").val());
}
$(function(){
	$("#investor_search").click(function(){
		investor_search();
	});
});