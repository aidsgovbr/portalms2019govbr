jQuery(document).ready(function ($) {
// Enable carousels
	jQuery('.su-custom-carousel').each(function () {
		// Prepare data
		var $carousel = $(this),
			$slides = $carousel.find('.su-custom-carousel-slides'),
			$slide = $carousel.find('.su-custom-carousel-item'),
			data = $carousel.data();

		// Apply Swiper
		var $owlCarousel = $slides.owlCarousel({
			responsiveClass: true,
			mouseDrag: true,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			margin: data.margin,
			navText: ['',''],
			rtl: data.rtl,
			responsive:{
		        0:{
		            items: $carousel.data('small'),
		            margin: 0,
		            dots: (data.pagination == 'yes') ? true : false,
            		nav: (data.arrows == 'yes') ? true : false
		        },
		        768:{
		            items:$carousel.data('medium'),
		            dots: (data.pagination == 'yes') ? true : false,
            		nav: (data.arrows == 'yes') ? true : false
		        },
		        1000:{
		            items: $carousel.data('large'),
		            dots: (data.pagination == 'yes') ? true : false,
            		nav: (data.arrows == 'yes') ? true : false
		        }
		    }
		});
	});
});