jQuery(document).ready(function($) {
    'use strict';

    $('.su-showcase').each(function () {
	
		var data 		     = $(this).data(),
			showcaseid       = '#' + data.scid, 
			gridContainer    = $(showcaseid + '_container'),
			filtersContainer = $(showcaseid + '_filter'),
			loadMoreBtn      = $(showcaseid + '_btn'),
			singlePageInline = $(showcaseid + '_inlinecontents').children(),
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
	            width: 1170,
	            cols: data.large
	        }, {
	            width: 767,
	            cols: data.medium
	        }, {
	            width: 480,
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
	        caption: data.caption_style,
	        displayType: data.loading_animation,
	        displayTypeSpeed: 200,
	        filterDeeplinking: data.filter_deeplink,

	        // lightbox
	        lightboxDelegate: '.cbp-lightbox',
	        lightboxGallery: true,
	        lightboxTitleSrc: 'data-title',
	        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

	        // singlePage popup
	        singlePageDelegate: '.cbp-singlePage',
	        singlePageDeeplinking: false,
	        singlePageStickyNavigation: true,
	        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
	        singlePageCallback: function(url, element) {
	            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
	            var t = this,
	            	sp = $(this).data('url');

	            $.ajax({
                    url: $(element).data('url'),
                    method: "POST",
                    data: {	
                    	id: $(element).data("id"), 
                    	source: $(element).data("source"), 
                    	include_article_image: $(element).data("include_article_image"),
                    	popup_image: $(element).data("popup_image"), 
                    	popup_category: $(element).data("popup_category"),
                    	popup_date: $(element).data("popup_date"),
                    	popup_detail_button: $(element).data("popup_detail_button")
                    },						
                    dataType: 'html',
                    timeout: 5000
                })
                .done(function(result) {
                    t.updateSinglePage(result);
                })
                .fail(function() {
                    t.updateSinglePage("Error! Please refresh the page!");
                });
	        },

	        // singlePageInline
	        singlePageInlineDelegate: '.cbp-singlePageInline',
	        singlePageInlinePosition: data.popup_position,
	        singlePageInlineInFocus: true,
	        singlePageInlineCallback: function(url, element) {
	            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
	            var t = this,
	            	sp = $(this).data('url');

	            $.ajax({
                    url: $(element).data('url'),
                    method: "POST",
                    data: {	
                    	id: $(element).data("id"), 
                    	source: $(element).data("source"), 
                    	include_article_image: $(element).data("include_article_image"),
                    	popup_image: $(element).data("popup_image"), 
                    	popup_category: $(element).data("popup_category"),
                    	popup_date: $(element).data("popup_date"),
                    	popup_detail_button: $(element).data("popup_detail_button")
                    },						
                    dataType: 'html',
                    timeout: 5000
                })
                .done(function(result) {
                    t.updateSinglePageInline(result);
                })
                .fail(function() {
                    t.updateSinglePageInline("Error! Please refresh the page!");
                });
	        }
	    });
	});

});