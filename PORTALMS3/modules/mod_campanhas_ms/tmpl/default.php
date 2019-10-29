<?php
/**
 * @package     Campanhas_MS
 * @subpackage  mod_campanhas_ms
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

?>
<?php
$appParams = JFactory::getApplication()->getParams();
$document = JFactory::getDocument();
$target = "";
?>
<div class="module campanhas_ms">

	<!-- Carrossel de imagens -->
	<div class="flexslider" style="width:<?php echo $params->get('largura');?>px; height: <?php echo $params->get('altura'); ?>px;">

		<div class="flex-viewport" style="overflow: hidden; position: relative;">
			<ul class="slides" style="width: 800%; transition: 0s; -webkit-transition: 0s; -webkit-transform: translate3d(-452px, 0px, 0px); transform: translate3d(-452px, 0px, 0px);">
				<?php
				foreach ($list as $key => $value) {
					$urls = json_decode($value->urls);
					$imagem = json_decode($value->images);
					if ($urls->urla) {
						$link = $urls->urla;
						switch ($urls->targeta) {
							case 1:
							$target = 'target="_blank"';
							break;

							case 2:
							$target = 'target="_blank"';
							break;

							case 3:
							$target = '';
							break;

							default:
							$target = '';
							break;
						}
					} else{
						$link = $value->link;
					}
					?>
					<li class="" aria-hidden="true" style="float: left; display: block; width: <?php echo $params->get('largura'); ?>px; height: <?php echo $params->get('altura'); ?>px;">
						<a <?php echo $target; ?> href="<?php echo $link; ?>" title="<?php echo $value->title; ?>">
							<img src="<?php echo $imagem->image_intro; ?>" alt="<?php echo $value->title; ?>" draggable="false">
						</a>
					</li>
					<?php } ?>

				</ul>
			</div>
			<ul class="flex-direction-nav">
				<li>
					<a class="flex-prev" href="#">Previous</a>
				</li>
				<li>
					<a class="flex-next" href="#">Next</a>
				</li>
			</ul>
		</div>

		<?php if ($params->get('mostrar_leia_mais') == 1): ?>
		<div class="outstanding-footer-verde">
			<a class="outstanding-link" href="<?php echo $params->get('link_leia_mais'); ?>">
				<span class="text"><?php echo $params->get('text_leia_mais'); ?></span>
				<span class="icon-box">
					<i class="icon-angle-right icon-light"><span class="hide">&nbsp;</span></i>
				</span>
			</a>
		</div>
		<?php endif ?>

	<!-- CSS -->
	<link rel="stylesheet" href="modules/mod_campanhas_ms/media/css/flexslider.css" type="text/css" media="screen">
	<!-- Modernizr -->
	<script defer="" src="modules/mod_campanhas_ms/media/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" charset="utf-8">
	jQuery(window).load(function() {
		jQuery('.flexslider').flexslider({
			animation: "slide",
			directionNav: true,
			controlNav:<?php echo ($params->get('mostrar_controle')? "true": "false" ); ?>,
			keyboardNav: <?php echo ($params->get('mostrar_navegacao')? "true": "false" ); ?>,
			direction: "horizontal",
			slideshowSpeed:4000,
			animationSpeed:600,
			randomize: false 	});
	});
	</script>
</div>
