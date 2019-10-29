<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_chamadas
 *
 * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$appParams = JFactory::getApplication()->getParams();
$document = JFactory::getDocument();
$largura = $params->get('largura');
$altura = $params->get('altura');

// var_dump($list); die;
?>
	<div class="gallery-pane">
		<div id="gallery-carousel-<?php echo $module->id ?>" class="carousel slide">
			<div class="carousel-inner">
				<?php foreach ($list as $k => $lista): ?>
				<div class="item<?php if($k==0): ?> active<?php endif; ?>">
					<?php 
					$link = explode("v=", $lista->link);
					?>
					<?php echo '<object width="'.$largura.'" height="'.$altura.'"><param name="movie" value="http://www.youtube.com/v/'.$link[1].'"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$link[1].'" type="application/x-shockwave-flash" allowfullscreen="true" width="'.$largura.'" height="'.$altura.'"></embed></object>'; ?>
					<div class="galleria-info">
						<div class="galleria-info-text">
						    <div class="galleria-info-title">
						    	<<?php echo $params->get('header_tag')?>><a href="<?php echo $lista->link ?>"><?php echo $lista->titulo ?></a></<?php echo $params->get('header_tag')?>>
						    </div>
						    <div class="galleria-info-description"><?php echo $lista->descricao; ?></div>
						    <div data-index="<?php echo $k ?>" class="rights"><?php //echo $lista->image_caption; ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<a data-slide="prev" href="#gallery-carousel-<?php echo $module->id ?>" class="left carousel-control"><i class="icon-angle-left"></i><span class="hide">Mover foto esquerda</span></a>
			<!-- separador para fins de acessibilidade <--><span class="hide">&nbsp;</span></--><!-- fim separador para fins de acessibilidade -->
			<a data-slide="next" href="#gallery-carousel-<?php echo $module->id ?>" class="right carousel-control"><i class="icon-angle-right"></i><span class="hide">Mover foto esquerda</span></a>
		</div>
		<div class="galeria-thumbs hide">
			<ul>
				<?php reset($list); ?>
				<?php foreach ($list as $k => $lista): 
				$link = explode("v=", $lista->link);
				?>
				<li class="galeria-image galeria-video">
					<a href="#0<?php echo $k ?>"><img src="http://img.youtube.com/vi/<?php echo $link[1]; ?>/0.jpg" alt="Img navegação."></a>
				</li>
				<?php endforeach; ?>			
			</ul>
		</div>
	</div>
	<?php if ($params->get('mostrar_leia_mais') == 1): ?>
		<div class="footer">
			<a href="<?php echo $params->get('link_leia_mais'); ?>" class="link">
				<?php echo $params->get('text_leia_mais'); ?>			
			</a>	
		</div>
	<?php endif; ?>
