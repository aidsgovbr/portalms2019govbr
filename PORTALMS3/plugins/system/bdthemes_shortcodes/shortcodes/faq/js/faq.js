jQuery(document).ready(function($) {
    'use strict';

	$('body').on('click', '.link-to-article', function (e) {
		var $link_to_article = $(this),
		    data = $link_to_article.data();

		    
		// Open specified url
        if (data.url !== '') {
            if (data.target === 'blank') window.open(data.url);
            else window.location = data.url;
        	e.preventDefault();
        } else
        {
			document.location.href = data.url;		
	        e.preventDefault();
        }
	});

    $('.su-faq').each(function () {
	
		var data = $(this).data(),
			faqid = '#' + data.scid, 
	     	gridContainer = $(faqid + '_container'),
	        filtersContainer = $(faqid + '_filter'),
	        searchContainer = $(faqid + '_search'),
	        wrap, filtersCallback;


	    /*******************************
	        init cubeportfolio
	     ****************************** */
	    gridContainer.cubeportfolio({
	        defaultFilter: '*',
	        animationType: data.filter_animation,
	        search: searchContainer,
	        gridAdjustment: 'responsive',
	        displayType: data.loading_animation,
	        displayTypeSpeed: data.display_speed,
	        caption: 'expand',
	        filters: filtersContainer,
	        mediaQueries: [{
	            width: 1,
	            cols: 1
	        }],
	        gapHorizontal: 0,
	        gapVertical: 50
	    });
	});
});