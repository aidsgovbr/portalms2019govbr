jQuery(document).ready(function($) {
    'use strict';

    $('.su-portfolio').each(function () {

    	// Lightbox for galleries (slider, carousel, custom_gallery)
    	$(this).magnificPopup({
            delegate: '.su-lightbox-item', // child items selector, by clicking on it popup will open
    		type: 'image',
    		mainClass: 'mfp-zoom-in mfp-img-mobile',
    		tLoading: '', // remove text from preloader
    		removalDelay: 400, //delay removal by X to allow out-animation
    		gallery: {
    			enabled: true,
    			navigateByImgClick: true,
    			preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
    			tCounter: '%curr% / %total%'
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
	
		var data = $(this).data(),
			portfolioid = '#' + data.scid, 
	     	gridContainer = $(portfolioid + '_container'),
	        filtersContainer = $(portfolioid + '_filter'),
	        loadMoreBtn = $(portfolioid + '_btn'),
	        singlePageInline = $(portfolioid + '_inlinecontents').children(),
	        wrap, filtersCallback;


	    /*******************************
	        init cubeportfolio
	     ****************************** */
	    gridContainer.cubeportfolio({
	        layoutMode: data.layout,
	        loadMore: loadMoreBtn,
	        loadMoreAction: data.loadmoreaction,
	        rewindNav: true,
	        scrollByPage: false,
	        mediaQueries: [{
	            width: 1100,
	            cols: data.large
	        }, {
	            width: 800,
	            cols: data.medium
	        }, {
	            width: 500,
	            cols: data.small
	        }, {
	            width: 320,
	            cols: 1
	        }],
	        filters: filtersContainer,
	        defaultFilter: '*',
	        animationType: data.filter_animation,
	        gapHorizontal: data.horizontal_gap,
	        gapVertical: data.vertical_gap,
	        gridAdjustment: 'responsive',
	        sortToPreventGaps: true,
	        caption: 'zoom',
	        displayType: data.loading_animation,
	        displayTypeSpeed: 400,
	        filterDeeplinking: data.filter_deeplink,
	    });
	});

});