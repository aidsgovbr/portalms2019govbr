jQuery(document).ready(function($) {
    'use strict';

    $('.su-progress-pie').appear(function() {
        var progressPie = '#' + $(this).attr('id');

        $(progressPie).asPieProgress({
            namespace: "pieProgress",
            classes: {
                svg: "su-progress-pie-svg",
                number: "su-progress-pie-number",
                content: "su-progress-pie-content"
            }
        })
        $(progressPie).asPieProgress("start");


    });

});        