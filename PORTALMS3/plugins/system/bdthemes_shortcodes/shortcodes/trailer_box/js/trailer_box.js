jQuery(document).ready(function() {
	tb_responsive();
	
	jQuery(".su-trailer-box").hover(
		function(){
			jQuery(this).find(".su-trailer-box-img").attr("style","opacity:"+jQuery(this).data('hover-opacity'));
		},
		function(){
			jQuery(this).find(".su-trailer-box-img").attr("style","opacity:"+jQuery(this).data('opacity'));
		}
	);
});


function tb_responsive(){
	var new_ib = jQuery(".su-trailer-box");
	new_ib.each(function(index, element) {
       var $this = jQuery(this); 
	   if($this.hasClass("ult-ib-resp")){
			var w = jQuery(document).width();
			var ib_min = $this.data("min-width");
			var ib_max = $this.data("max-width");
			if(w <= ib_max && w >= ib_min){
				$this.find(".su-trailer-box-content").hide();
			} else {
				$this.find(".su-trailer-box-content").show();
			}
		}
    });
}