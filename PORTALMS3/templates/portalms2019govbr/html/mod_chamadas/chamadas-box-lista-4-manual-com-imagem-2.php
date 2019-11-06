<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_chamadas
 *
 * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<section class="chamada-box">
	<div class="container">
		<div class="row">


			<?php foreach ($lista_chamadas as $key => $lista): ?>
			<?php //foreach ($lista_chamadas as $lista): ?>
			
			<div class="<?php echo $params->get('header_class') ?>  " data-panel="">
			    <div class="tile tile-default">
			    	<?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
	                    <div class="image-container">
	                        <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
	                            <img src="<?php echo $lista->image_url ?>" alt="<?php echo $lista->image_alt ?>" />
	                        </a>
	                    </div>
	                <?php endif; ?>		
			  
			        <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
						<p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
					<?php endif; ?>
					<?php if ($params->get('exibir_title')): ?>			
						<h2 class="chamada-box"><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>	
					<?php endif; ?>

			                <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
			    </div>
	        
			</div>
	    <?php endforeach; ?>
	    
		<?php if (! empty($link_saiba_mais) ): ?>
		<div class="botoes-centro">
			<a href="<?php echo $link_saiba_mais; ?>" class="btn-padrao">
				<?php if ($params->get('texto_saiba_mais')): ?>
					<?php echo $params->get('texto_saiba_mais')?>
				<?php else: ?>
					Mais Notícias
				<?php endif;?>
			</a>	
		</div>
		<?php endif; ?>

	
		</div>
	</div>
</section>
<!-- NOTICIAS END -->