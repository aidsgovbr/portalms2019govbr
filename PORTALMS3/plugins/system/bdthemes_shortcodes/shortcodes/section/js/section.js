jQuery(document).ready(function ($) {

	$('body').on('click', '.su-section-clickable', function (e) {
	    var $sectionclk = $(this),
	        data = $sectionclk.data();

	    // Open specified url
	    if (data.url !== '') {
	        if (data.target === 'self') window.location = data.url;
	        else if (data.target === 'blank') window.open(data.url);
	    }
	    e.preventDefault();
	});
	
	// Section with parallax
	$('.su-section-parallax').each(function () {
		var $this = $(this);
		$(window).on('scroll touchmove', function () {
			var yPos = -($(window).scrollTop() / $this.data('speed'));
			var coords = '50% ' + yPos + 'px';
			$this.css({
				backgroundPosition: coords
			});
		});
	});

	// Section force full width
	$('.su-section-forcefullwidth').each(function (e) {
		var section = $(this);
		var container_wrapper = section.find('.su-section-wrapper');
		var container = section.find('.su-section');
		var loff = section.offset().left;
		var rtl_check = container_wrapper.data('rtl');

		if (rtl_check) {
			container_wrapper.css({'margin-right':(0-loff)+"px",'width':$(window).width()});
			container.width=$(window).width();

			$(window).resize(function(e) {
				var loffr = section.offset().left;
				container_wrapper.css({'margin-right':(0-loffr)+"px",'width':$(window).width()});
			});	
		}
		else {
			container_wrapper.css({'margin-left':(0-loff)+"px",'width':$(window).width()});
			container.width=$(window).width();	
			
			$(window).resize(function(e) {
				var loffr = section.offset().left;
				container_wrapper.css({'margin-left':(0-loffr)+"px",'width':$(window).width()});
			});
		}

	});

	// Section video adding script
	$('.su-section-video').each(function () {
		var data = $(this).data();
			id = $(this).data('id'),
			selector = '#' + id;
			
			var globalEasyVideo = new video_background(selector, {
			"position": 'absolute',		//Stick within the div
			"z-index": '0',				//Behind everything

			"loop": data.loop, 			//Loop when it reaches the end
			"autoplay": data.autoplay,	//Autoplay at start
			"muted": data.muted,		//Muted at start

			"mp4": ((typeof data.mp4==="undefined")?false:data.mp4),
			"webm": ((typeof data.webm==="undefined")?false:data.webm),
			"ogg": ((typeof data.ogg==="undefined")?false:data.ogg),
			"flv": ((typeof data.flv==="undefined")?false:data.flv),
			"vimeo": (typeof data.vimeo==="undefined")?false:data.vimeo,
			"youtube": (typeof data.youtube==="undefined")?false:data.youtube,	//Youtube video id
			"video_ratio": data.ratio, 	// width/height -> If none provided sizing of the video is set to adjust
			"swfpath": data.swfpath,
			"sizing": data.sizing,
			"overlayOpacity": 0.5,
			"fallback_image": false,
			"enableOverlay": (data.overlay=="")?false:true
		});
	});
});