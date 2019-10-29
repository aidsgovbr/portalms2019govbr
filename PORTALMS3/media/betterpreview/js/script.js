/**
 * @package         Better Preview
 * @version         6.0.6
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

(function($) {
	"use strict";

	$(document).ready(function() {
		$('.betterpreview-dropdown .dropdown-toggle').hover(function() {
			var el   = $(this).parent();
			var menu = el.find('.dropdown-menu');

			menu.stop(true, true).show();
			el.addClass('open');

			var hide = function() {
				menu.stop(true, true).hide();
				el.removeClass('open');
			};

			$('html').click(function() {
				hide();
			});
			menu.hover(function() {
			}, function() {
				hide();
			});
			$('#menu').hover(function() {
				hide();
			});
		});

	});
})(jQuery);

