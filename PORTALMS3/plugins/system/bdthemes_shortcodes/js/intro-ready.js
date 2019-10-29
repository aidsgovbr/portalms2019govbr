jQuery(document).ready(function($) {
    function startIntro() {
        var intro = introJs();
        intro.setOptions({
            steps: [
            { 
                intro: "<h3>Welcome to Shortcode Ultimate!</h3> <p>Thank you for choosing No.1 shortcode plugin. We included 85+ essential shortcode elements for you, we hope you enjoy it!</p>"
            },
            {
                element: document.querySelector('.su-basic-settings'),
                intro: "Here you can On/Off your font awesome if it's conflict with any others extensions. Select your extra shortcode override if included in any template. also you can turn off me from here.",
                position: 'right'
            },
            {
                element: document.querySelector("[href='#attrib-advanced']"),
                intro: "Click here for get all advanced settings from here, Now click next on intro for know details of advanced tab."
            },
            {
                element: document.querySelector('.su-advanced-settings'),
                intro: "Here you can On/Off your font awesome if it's conflict with any admin extensions. You can add extra prefix for all shortcode if Shortcode Ultimate conflict with any others shortcode system."
            },
            {
                element: document.querySelector("[href='#attrib-api_settings']"),
                intro: "Click here for get all API Key related settings from here, Now click next on intro for know details of advanced tab."
            },
            {
                element: document.querySelector('.su-facebook-settings'),
                intro: "Here your facebook api key and token settings, you can set it here for works all facebook related shortcode such as social feed, social like etc.",
                position: 'right'
            },
            {
                element: document.querySelector('.su-google-map-settings'),
                intro: 'Here your google map api key settings, you can set it here for works google map advanced properly.',
                position: 'right'
            },
            {
                element: document.querySelector('.su-google-plus-settings'),
                intro: 'Here your google plus api key settings, you can set it here for works google plus related shortcode properly.',
                position: 'right'
            },
            {
                intro: 'Don\'t forget to give <a href="https://codecanyon.net/item/shortcode-ultimate-plugin-for-joomla/7807980?ref=bdthemes" target="_blank"><strong>5 stars rate</strong></a> our plugin, it would help us to provide great product in future. Many many thanks for using Shortcode Ultimate Joomla Plugin.'
            }
            ]
        });

        // add a flag when we're done
        intro.oncomplete(function() {
          localStorage.setItem('doneTour', 'yeah!');
        })

        // add a flag when we exit
        intro.onexit(function() {
           localStorage.setItem('doneTour', 'yeah!');
        });

        intro.start();
    }

    setTimeout(function() {
        var doneTour = localStorage.getItem('doneTour') === 'yeah!';
        if (doneTour) return;
        startIntro();
    }, 1000);
        
});