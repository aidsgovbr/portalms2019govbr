jQuery(document).ready(function($) {
    'use strict';

    $('.su-switcher').each(function () {

        
        // Activate tabs
        //var active = parseInt($(this).data('active')) - 1;
        //$(this).children('.su-swt-filter').children('div').eq(active).addClass('cbp-filter-item-active');
    
        var data = $(this).data(),
            switcherid = '#' + data.swtid, 
            gridContainer = $(switcherid + '_container'),
            filtersContainer = $(switcherid + '_filter');


        /*******************************
            init cubeportfolio
         ****************************** */
        gridContainer.cubeportfolio({
            filters: filtersContainer,
            defaultFilter: data.active_tab,
            animationType: data.animation,
            gridAdjustment: 'default',
            displayType: 'lazyLoading',
            //filterDeeplinking: true,
            caption: ''
        });
    });

});