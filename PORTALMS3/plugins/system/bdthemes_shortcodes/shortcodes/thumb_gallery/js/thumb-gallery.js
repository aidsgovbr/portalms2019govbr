jQuery(document).ready(function ($) {
	'use strict';

	// Lightbox for galleries (custom_gallery)
	$('.su-thumb-gallery').each(function () {

		var data = $(this).data(),
			galleryid = '#' + data.pgid, 
	     	gridContainer = $(galleryid + '_container'),
	        filtersContainer = $(galleryid + '_filter'),
	        singlePageInline = $(galleryid + '_inlinecontents').children(),
	        wrap, filtersCallback;


	    /*******************************
	        init cubeportfolio
	     ****************************** */
	    gridContainer.cubeportfolio({
	        layoutMode: 'slider',
	        drag: true,
	        auto: false,
	        autoTimeout: 5000,
	        autoPauseOnHover: true,
	        showNavigation: true,
	        showPagination: false,
	        rewindNav: true,
	        scrollByPage: true,
	        gridAdjustment: 'responsive',
	        mediaQueries: [{
	            width: 1,
	            cols: 1
	        }],
	        gapHorizontal: 0,
	        gapVertical: 0,
	        caption: '',
	        displayType: 'fadeIn',
	        displayTypeSpeed: 400,

	        plugins: {
	            slider: {
	                pagination: $(galleryid + '_tg_slider'),
	                paginationClass: 'cbp-pagination-active',
	            }
	        }
	        
	    });

	});
});