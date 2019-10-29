jQuery(document).ready(function ($) {
// Enable carousels
    jQuery('.su-twitter').each(function () {
        // Prepare data
        var $twtCarousel = $('#' + $(this).attr('id')),
            $slides = $twtCarousel.find('.su-twitter-slides'),
            data = $twtCarousel.data();

        // Apply Swiper
        var $owlCarousel = $slides.owlCarousel({
            responsiveClass: true,
            mouseDrag: true,
            autoplayTimeout: data.delay * 1000,
            smartSpeed: data.speed * 1000,
            autoplay: (data.autoplay == 'yes') ? true : false,
            autoHeight: (data.autoheight == 'yes') ? true : false,
            autoplayHoverPause: true,
            center: (data.center == 'yes') ? true : false,
            loop: (data.loop == 'yes') ? true : false,
            animateIn: data.transitionin,
            animateOut: data.transitionout,
            dots: (data.pagination == 'yes') ? true : false,
            nav: (data.arrows == 'yes') ? true : false,
            margin: data.margin,
            navText: ['',''],
            rtl: data.rtl,
            responsive:{
                0:{
                    items: data.small,
                    margin: 0,
                    dots: (data.pagination == 'yes') ? true : false,
                    nav: (data.arrows == 'yes') ? true : false
                },
                768:{
                    items:data.medium,
                    dots: (data.pagination == 'yes') ? true : false,
                    nav: (data.arrows == 'yes') ? true : false
                },
                1000:{
                    items: data.large,
                    dots: (data.pagination == 'yes') ? true : false,
                    nav: (data.arrows == 'yes') ? true : false
                }
            }
        });
    });
});