<?php
/**
 * @package     Module
 * @subpackage  mod_slideshow_responsive_phoca
 * @copyright   Copyright (C) 2014 MS, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Tiago Garcia.
 */

// No direct access.
defined('_JEXEC') or die;

// Exibe link + e o titulo
$link_categoria = $params->get('link_categoria', '1');

$titulo_mais_conteudo = $params->get('titulo_mais_conteudo', 'Leia mais...');

$font_color 				= $params->get( 'font_color', '#135cae' );
$font_size_name 			= $params->get( 'font_size_name', 12 );

?>

<!-- Carrossel de imagens -->
<div class="flexslider" style="height: 176px;">
	<ul class="slides">
		<?php if (!empty($items)) {
			foreach($items as $item){
				echo $item->metadesc;
			}
		} ?>
	</ul>
</div>

<div class="outstanding-footer-verde">
	<a class="outstanding-link" href="<?php echo $items[0]->category_route; ?>">
		<span class="text"><?php echo $titulo_mais_conteudo ?></span>
		<span class="icon-box">
			<i class="icon-angle-right icon-light"><span class="hide">&nbsp;</span></i>
		</span>
	</a>
</div>


<?php
JHtml::_('jquery.framework');
?>
<!-- CSS -->
<link rel="stylesheet" href="modules/mod_slideshow_responsive_phoca/css/flexslider.css" type="text/css" media="screen" />

<!-- Modernizr -->
<script defer src="modules/mod_slideshow_responsive_phoca/assets/js/jquery.flexslider-min.js"></script>
<!-- <script src="modules/mod_slideshow_responsive_phoca/js/modernizr.js"></script> -->


<script type="text/javascript" charset="utf-8">
jQuery(window).load(function() {
	jQuery('.flexslider').flexslider({
		<?php if($params->get('fadeorslide') == 0){?> animation: "slide", <?php } else if ($params->get('fadeorslide') == 1){ ?> animation: "fade", <?php } ?>
		<?php if($params->get('directionNav') == 1){?> directionNav: true, <?php } else if ($params->get('directionNav') == 0){ ?> directionNav: false, <?php } ?>
		<?php if($params->get('controlNav') == 1){?> controlNav: true, <?php } else if ($params->get('controlNav') == 0){ ?> controlNav:false, <?php } ?>
		<?php if($params->get('keyboardNav') == 1){?> keyboardNav: true, <?php } else if ($params->get('keyboardNav') == 0){ ?> keyboardNav:false, <?php } ?>
		<?php if($params->get('direction') == 0){?> direction: "horizontal", <?php } else if ($params->get('direction') == 1){ ?> direction: "vertical", <?php } ?>
		<?php if($params->get('slidespeed')){ echo "slideshowSpeed:".$params->get('slidespeed')."," ;} else { ?> slideshowSpeed: 7000, <?php } ?>
		<?php if($params->get('animatespeed')){ echo "animationSpeed:".$params->get('animatespeed')."," ;} else { ?> animationSpeed: 600, <?php } ?>
		<?php if($params->get('randomorder') == 0){?> randomize: false <?php } else if ($params->get('randomorder') == 1){ ?> randomize: true <?php } ?>
	});
});
</script>