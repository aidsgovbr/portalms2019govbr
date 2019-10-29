jQuery(document).ready(function($) {
    'use strict';

    $('.su-post-grid').each(function () {
	
		var data = $(this).data(),
			post_blockid = '#' + data.pgid, 
	     	gridContainer = $(post_blockid + '_container'),
	        filtersContainer = $(post_blockid + '_filter'),
	        loadMoreBtn = $(post_blockid + '_btn'),
	        searchContainer = $(post_blockid + '_search'),
	        wrap, filtersCallback;


	    /*******************************
	        init cubeportfolio
	     ****************************** */
	    gridContainer.cubeportfolio({
	        layoutMode: data.layout,
	        search: searchContainer,
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
	        caption: data.caption_style,
	        displayType: data.loading_animation,
	        displayTypeSpeed: 500,
	        filterDeeplinking: data.filter_deeplink
	    });
	});
});