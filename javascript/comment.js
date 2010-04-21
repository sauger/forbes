$(function(){
	$('#z').click(function(){
		$.fn.colorbox({
			href: '/ajax/magazine_comment.php',
			iframe: true,
			width: '720px',
			height: '420px'
		});
	});
});