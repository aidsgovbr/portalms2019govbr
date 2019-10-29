jQuery(document).ready(function($) {
    "use strict";

    jQuery('.su-drawer').each(function () {
        var drawer_toggle     = $(this).find('.su-drawer-toggle'),
            drawer_content    = $(this).find('.su-drawer-content'),
            drawer_animation  = $(this).data('animation'),
            drawer_duration   = $(this).data('duration');

        drawer_toggle.click(function() {            
            //Expand
            if (drawer_state == 0) {
                drawer_content.slideDown(drawer_duration, drawer_animation);
                $(this).find('.sud-close-title').removeClass('sud-hide');
                $(this).find('.sud-open-title').addClass('sud-hide');
                drawer_state = 1;
                //Collapse
            } else if (drawer_state == 1) {
                drawer_content.slideUp(drawer_duration, drawer_animation);
                $(this).find('.sud-open-title').removeClass('sud-hide');
                $(this).find('.sud-close-title').addClass('sud-hide');
                drawer_state = 0;
            }
        });
        var drawer_state = 0;
    });
});