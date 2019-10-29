jQuery(document).ready(function($) {

    $('.su-lightbox').each(function() {
        $(this).on('click', function(e) {
            var type = $(this).data('mfp-type');
            e.preventDefault();
            e.stopPropagation();
            
            
            if (type === 'image') {
                $(this).magnificPopup({
                    type: type,
                    mainClass: 'mfp-zoom-in mfp-img-mobile',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        imageLoadComplete: function() {
                            var self = this;
                            setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
                        }
                    }
                }).magnificPopup('open');
            }
            else {
                $(this).magnificPopup({
                    type: type,
                    mainClass: 'mfp-img-mobile',
                    removalDelay: 0
                }).magnificPopup('open');
            }
        });
    });
});