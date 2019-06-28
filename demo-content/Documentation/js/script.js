(function($) {
$(document).ready(function(){

	var winWidth = $(window).width();
	var winHeight = $(window).height();
	var menuHeight = winHeight - 310;
	$('.menu').css({
		'height': menuHeight
	});

	$(window).resize( function(e)
	{
		var winWidth = $(window).width();
		var winHeight = $(window).height();
		var menuHeight = winHeight - 310;
		$('.menu').css({
			'height': menuHeight
		});
	});

	$('.menu li a').on("click", function(e) {
		e.preventDefault();
		$('.menu li a.active').removeClass("active");
		$(this).addClass("active");
    	var toId = $(this).attr('href');
		$.scrollTo(toId,500, {offset: {top:0, left:0}});
		return false;
    });


});
})(jQuery);	