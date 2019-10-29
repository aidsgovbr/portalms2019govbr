jQuery(document).ready(function ($) {
	// Photo/Icon panel
	$('body').on('click', '.su-panel-clickable', function (e) {
		var $tab = $(this),
		    data = $tab.data();

		    
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
});