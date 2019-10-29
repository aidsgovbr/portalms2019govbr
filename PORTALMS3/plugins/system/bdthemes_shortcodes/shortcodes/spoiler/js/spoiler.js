jQuery(document).ready(function($) {

    $('body').on('click', '.su-spoiler-title', function (e) {
        var $title = $(this),
            $spoiler = $title.parent();
        // Open/close spoiler
        $spoiler.toggleClass('su-spoiler-closed');
        // Close other spoilers in accordion
        $spoiler.parent('.su-accordion').children('.su-spoiler').not($spoiler).addClass('su-spoiler-closed');
        // Scroll in spoiler in accordion
        if ($(window).scrollTop() > $title.offset().top) $(window).scrollTop($title.offset().top - $title.height());
        e.preventDefault();
    });

    $('.su-spoiler-content').removeAttr('style');

    function spoiler_anchor() {
        // Check hash
        if (document.location.hash === '') return;
        // Go through spoilers
        $('.su-spoiler[data-anchor]').each(function () {
            if ('#' + $(this).data('anchor') === document.location.hash) {
                var $spoiler = $(this);

                // Activate tab
                if ($spoiler.hasClass('su-spoiler-closed')) $spoiler.find('.su-spoiler-title:first').trigger('click');

                // Scroll-in tabs container
                $('html, body').animate({
                    scrollTop: $spoiler.offset().top
                }, 300);
            }
        });
    }

    if ('onhashchange' in window) {
        $(window).on('hashchange', spoiler_anchor);
    }    
});