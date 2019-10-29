jQuery(document).ready(function ($) {
	// Content slider
	$('.su-content-slider').each(function () {
		var $slider = $(this),
			$panels = $slider.children('div'),
			data = $slider.data();
		// Remove unwanted br's
		$slider.children(':not(.su-content-slide)').remove();
		// Apply Owl Carousel
		$slider.owlCarousel({
			items:1,
			responsiveClass: true,
			mouseDrag: true,
			video:true,
			animateIn: data.transitionin,
    		animateOut: data.transitionout,
    		lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
            dots: (data.pagination == 'yes') ? true : false,
            nav: (data.arrows == 'yes') ? true : false,
            margin: data.margin,
            navText: ['','']
		});

		//spacific design for testimonials
		if ($slider.find('.su-testimonial')) {
			$slider.addClass('su-testimonials-slider');
			if ($slider.find('.su-testimonial').hasClass('su-testimonial-style-1')) {
				$slider.addClass('su-tmstyle1');
			}
			else if ($slider.find('.su-testimonial').hasClass('su-testimonial-style-2')) {
				$slider.addClass('su-tmstyle2');
			}
			else if ($slider.find('.su-testimonial').hasClass('su-testimonial-style-3')) {
				$slider.addClass('su-tmstyle3');
			}
		}

	});
});