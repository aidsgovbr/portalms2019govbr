function is_transition_supported() {
	var thisBody = document.body || document.documentElement,
		thisStyle = thisBody.style,
		support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;

	return support;
}

jQuery(document).ready(function($) {
	if (is_transition_supported()) {
	    $('.su-animate').each(function() {
	        $(this).appear(function(e) {
	            var data = $(this).data()
	            $(this).addClass('animated').css('visibility', 'visible');
	            $(this).addClass(data.animation);
	        });
	    });
	}
	// Animations isn't supported so show it normal mode
	else {
		$('.su-animate').css('visibility', 'visible');
	}
});