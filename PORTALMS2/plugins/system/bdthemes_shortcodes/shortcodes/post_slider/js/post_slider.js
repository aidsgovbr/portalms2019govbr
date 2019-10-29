jQuery(document).ready(function ($) {
// Enable carousels
	jQuery('.su-post-slider').each(function () {
		// Prepare data
		var $carousel = $(this),
			$slides = $carousel.find('.su-post-slider-slides'),
			$slide = $carousel.find('.su-post-slider-slide'),
			data = $carousel.data();

		// Apply to carousel
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
		            items: $carousel.data('items'),
		            dots: (data.pagination == 'yes') ? true : false,
            		nav: (data.arrows == 'yes') ? true : false
		        }
		    }
		});

		// Lightbox for galleries (slider, carousel, custom_gallery)
		$(this).find('.su-lightbox-item').magnificPopup({
			type: 'image',
			mainClass: 'mfp-zoom-in mfp-img-mobile',
			tLoading: '', // remove text from preloader
			removalDelay: 400, //delay removal by X to allow out-animation
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			callbacks: {
				open: function() {
					//overwrite default prev + next function. Add timeout for css3 crossfade animation
					$.magnificPopup.instance.next = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
					}
					$.magnificPopup.instance.prev = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
					}
				},
				imageLoadComplete: function() {
					var self = this;
					setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
				}
			}
		});

	});
});