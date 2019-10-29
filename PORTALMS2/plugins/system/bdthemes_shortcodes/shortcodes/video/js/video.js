jQuery(document).ready(function ($) {

	$('.su-video').each(function () {

		var $this = $(this),
			id = $this.data('id'),
			selector = '#' + id,
			$player = $(selector),
			$player_container = selector + '_container',
			video = $this.data('video'),
			poster = $this.data('poster'),
			title = $this.data('title'),
			swf = $this.data('swf');
			volume = $this.data('volume');

	    $player.jPlayer({

	        // Extra Settings
	        swfPath: swf,
	        solution: 'html, flash',
	        volume: volume/100,
	        smoothPlayBar: false,
	        keyEnabled: true,
	        remainingDuration: false,
	        toggleDuration: false,
	        errorAlerts: false,
	        warningAlerts: false,
	        supplied: 'm4v, flv',

	        // CSS Selectors
	        size: {
	            width: "100%",
	            height: "auto"
	        },

	        cssSelectorAncestor: $player_container,
	        cssSelector: {
	            videoPlay: ".video-play",
	            play: ".play",
	            pause: ".pause",
	            seekBar: ".seekBar",
	            playBar: ".playBar",
	            mute: ".right-volume .mute",
	            unmute: ".right-volume .unmute",
	            volumeBar: ".volume-control",
	            volumeBarValue: ".volume-control .volume-value",
	            currentTime: ".timer.current",
	            duration: ".timer.duration",
	            fullScreen: ".fullscreen",
	            restoreScreen: ".smallscreen",
	            gui: ".controls",
	            noSolution: ".noSolution"
	        },

	        ready: function (event) {

	            if(event.jPlayer.status.noVolume) {
	                // Add a class and then CSS rules deal with it.
	                $player.find(".controls .jpprogress-block").css({ margin: '0 10px 0 45px'});
	            }

	            $(this).jPlayer("setMedia", {
	                title: title,
	               	m4v: video,
	               	poster: poster,
	               	volume: volume/100
	            });

	            // Autoplay
	            if ($this.data('autoplay') === 'yes') $player.jPlayer('play');
	            // Loop
	            if ($this.data('loop') === 'yes') $player.bind($.jPlayer.event.ended + '.repeat', function () {
	            	$player.jPlayer('play');
	            });

	        },
	        play: function() {
	            $this.find('.playerScreen .video-play').stop(true,true).fadeOut(150);
	            $(this).on('click', function() { $(this).jPlayer('pause');});
	            $(this).jPlayer("pauseOthers");
	            //jplayer_responsive();
	        },
	        pause: function() {
	            $this.find('.playerScreen .video-play').stop(true,true).fadeIn(350);
	            $(this).unbind('click');
	        },
	        ended: function() {
	            $(this).jPlayer("setMedia", {
	                title: title,
	               	m4v: video,
	               	poster: poster
	            });
	        }
	    });
	});
});

