jQuery(document).ready(function ($) {

	// Photo/Icon panel
	$('body:not(.su-extra-loaded)').on('click', '.su-panel-clickable', function (e) {
		document.location.href = $(this).data('url');
	});
	$('body').addClass('su-extra-loaded');
});