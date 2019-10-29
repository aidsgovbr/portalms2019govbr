jQuery(document).ready(function ($) {
	// Content slider
	$('.su-device-slider').each(function () {
		var $slider = $(this),
			data = $slider.data();
		// Remove unwanted br's
		$slider.children(':not(.su-device-slide-item)').remove();

		// Apply Owl Carousel
		$slider.owlCarousel({
			items:1,
			responsiveClass: true,
			mouseDrag: true,
			video:true,
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

		// Lightbox for galleries (slider, carousel, custom_gallery)
		if ($slider.hasClass('has-lightbox')) {
			$slider.find('.su-lightbox-item').magnificPopup({
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
		}
	});
});