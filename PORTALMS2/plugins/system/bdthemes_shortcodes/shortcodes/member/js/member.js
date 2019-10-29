jQuery(document).ready(function($) {

	$('body').on('click', '.su-member-clickable', function (e) {
		document.location.href = $(this).data('url');
	});

	$(".su-member-style-5, .su-member-style-6").on('hover',
		function(){
			$(this).find(".su-content-wrap:not(:empty)").animate({
				height: "toggle",
				padding: "toggle",
				opacity: "toggle"
			});
		}
	);
});

