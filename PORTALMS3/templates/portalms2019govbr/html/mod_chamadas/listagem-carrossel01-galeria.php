﻿<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_chamadas
 *
 * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
//preencher link quando categoria for unica
if (empty($link_saiba_mais) && count($params->get('catid'))==1 && $params->get('buscar_cat_tag')==1) {
	$catid = $params->get('catid');
	$link_saiba_mais = JRoute::_('index.php?option=com_content&view=category&id='.$catid[0]);
}
?>
<div id="carousel-<?php echo $module->id ?>" class="gallery-pane">
	<div id="gallery-carousel-<?php echo $module->id ?>" class="carousel slide">
		<div class="carousel-inner">
			<?php foreach ($lista_chamadas as $k => $lista): ?>
			<?php 
			if($lista->image_alt=='')
			{
				$lista->image_alt = 'Foto da galeria de imagens: sem descrição informada.';
			}
			?>
			<div id="item0<?php echo $k ?>" class="item<?php if($k==0): ?> active<?php endif; ?>">
				<img class="img-rounded" alt="<?php echo $lista->image_alt ?>" src="<?php echo $lista->image_url ?>">
				<div class="galleria-info">
					<div class="galleria-info-text">
					    <div class="galleria-info-title">
					    	<<?php echo $params->get('header_tag')?>><a href="<?php echo $lista->link ?>"><?php echo $lista->title ?></a></<?php echo $params->get('header_tag')?>>
					    </div>
					    <div class="galleria-info-description"><?php echo $lista->introtext; ?></div>
					<!--   <div data-index="<?php echo $k ?>" class="rights"><?php echo $lista->image_caption; ?></div> -->
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<a data-slide="prev" href="#gallery-carousel-<?php echo $module->id ?>" class="left carousel-control"><i class="icon-angle-left"></i><span class="hide">Mover foto esquerda</span></a>
		<!-- separador para fins de acessibilidade <--><span class="hide">&nbsp;</span></--><!-- fim separador para fins de acessibilidade -->
		<a data-slide="next" href="#gallery-carousel-<?php echo $module->id ?>" class="right carousel-control"><i class="icon-angle-right"></i><span class="hide">Mover foto esquerda</span></a>
	</div>
	<div class="galeria-thumbs ">
		<ul>
			<?php reset($lista_chamadas); ?>
			<?php foreach ($lista_chamadas as $k => $lista): ?>
			<li class="galeria-image item0<?php echo $k ?> ">
				<a href="#0<?php echo $k ?>">item0<?php echo $k ?></a>
			</li>
			<?php endforeach; ?>			
		</ul>
	</div>
</div>
<?php if (! empty($link_saiba_mais) ): ?>
	<div class="footer">
		<a href="<?php echo $link_saiba_mais; ?>" class="link">
			<?php echo $params->get('texto_saiba_mais', 'saiba mais')?>			
		</a>	
	</div>
<?php endif; ?>
<script type="text/javascript">
if (document.documentElement.clientWidth < 481) {
    jQuery("#carousel-<?php echo $module->id; ?>").find('.carousel-inner').toggleClass('carousel-inner carousel-inner-mobile');
    jQuery("#carousel-<?php echo $module->id; ?>").find('.galeria-thumbs ').remove();
 }
 jQuery("#carousel-<?php echo $module->id; ?> .galeria-image.item00").addClass('item-active');
 jQuery("#carousel-<?php echo $module->id; ?> div.item").bind('DOMSubtreeModified', function(){ 
 	  var itemID = jQuery("#carousel-<?php echo $module->id ?> .active").attr('id');
	  jQuery("#carousel-<?php echo $module->id; ?> .galeria-image").removeClass('item-active');
      jQuery("#carousel-<?php echo $module->id; ?> .galeria-image."+itemID).addClass('item-active');
 });
</script>