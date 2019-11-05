<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_chamadas
 * <?php print_r ($lista_chamadas); ?> 
 * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<!-- NOTICIAS -->
<section class="mosaico">
	<div class="container">
		<div class="row">
			<?php foreach ($lista_chamadas as $lista): ?>

				<div class="col-md-4">
					<div class="item-mosaico">
						<?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
	                        <img src="<?php echo $lista->image_url ?>" class="foto-destaques" alt="<?php echo $lista->image_alt ?>" />
		                <?php endif; ?>
						<div class="chamada-mosaico">
							<?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
								<span class="chapeu-mosaico"><?php echo $lista->chapeu ?></span>
							<?php endif; ?>
							<?php if ($params->get('exibir_title')): ?>			
								<a href="<?php echo $lista->link?>" class="titulo-mosaico">
									<?php echo $lista->title ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<pre><?php print_r($lista_chamadas); ?></pre>
</section>