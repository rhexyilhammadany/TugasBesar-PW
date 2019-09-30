// $(window).scroll(function() {
// 	var wScroll = $(this).scrollTop();

// 	$('.jumbotron img').css({
// 		'transform' : 'translate(0px, '+ wScroll/2 +'%)'
// 	});

// });
$(document).ready(function(){
	$('#keyword').on('keyup',function(){
		$('#you').load('ajax/user.php?keyword=' + $('#keyword').val());		
	});
});