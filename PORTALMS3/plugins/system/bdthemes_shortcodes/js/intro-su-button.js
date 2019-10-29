jQuery(document).ready(function($) {
    function startIntro() {
        var intro = introJs();
        intro.setOptions({
            hints: [
              {
                element: document.querySelector('.sug-button'),
                hint: "<h3>Welcome to Shortcode Ultimate Generator</h3><p>Here you can generate your awesome shortcode easily. Just select your shortcode element from list, change options as you need and insert it.</p>",
                hintPosition: 'left-middle'
              },
            ]
        });
        
        intro.addHints();


    }


    setTimeout(function() {
        // and check for it when deciding whether to start.  
        var buttonTourDone = localStorage.getItem('buttonTourDone') === 'yeah!';
        if (buttonTourDone) return;
        startIntro();
        localStorage.setItem('buttonTourDone', 'yeah!');  
    }, 3000);

        
});