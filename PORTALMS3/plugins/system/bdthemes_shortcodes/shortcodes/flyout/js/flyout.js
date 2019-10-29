jQuery(document).ready(function($) {

    function adBlockDetected () {

        if ($( "body > div" ).hasClass( "su-adb-message-container" ) == false) {
            $( "body" ).append( "<div class='su-adb-message-container'><div class='su-adb-message'><h3>Adblocker Detected!</h3><p>We have detected that you are using adblocking plugin in your browser. We request you to whitelist our website in your adblocking plugin. Please whitelist our website and refresh this page to view the content.</p></div>" );
        };
        setTimeout(adBlockDetected, 2000);
    }

    setTimeout(function(){
        if(typeof fuckAdBlock === 'undefined') {
            adBlockDetected();
        } else {
            fuckAdBlock.onDetected(adBlockDetected);
        }
    }, 300);

});