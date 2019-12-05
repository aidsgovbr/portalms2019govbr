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

<section class="mosaico">
	<div class="container">
		<div class="row">
			<?php foreach ($lista_chamadas as $key => $lista): ?>
			<?php //foreach ($lista_chamadas as $lista): ?>

				<div class="col-md-3">

						<div class="chamada-mosaico">
							<?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
								<span class="tile-subtitle"><?php echo $lista->chapeu ?></span>
							<?php endif; ?>
							<?php if ($params->get('exibir_title')): ?>			
								<h2 class="frontpage"><a href="<?php echo $link ?>" <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
									<?php echo $lista->title ?>
								</a></h2>                       
							<?php endif; ?>
						</div>
<p class="data-noticia"><?php echo strip_tags($lista->introtext); ?></p>
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
