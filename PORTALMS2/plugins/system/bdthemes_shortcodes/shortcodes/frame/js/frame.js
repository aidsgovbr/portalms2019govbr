jQuery(document).ready(function($) {

    $('.su-frame-align-center, .su-frame-align-none').each(function() {
        var frame_width = $(this).find('img').width();
        $(this).css('width', frame_width + 12);
    });
        
});