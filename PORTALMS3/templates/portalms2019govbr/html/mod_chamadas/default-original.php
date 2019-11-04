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


<?php if ($params->get('titulo_alternativo')): ?>
	<h2 class="page-header"><?php echo $params->get('titulo_alternativo')?></h2>
<?php endif; ?>

<?php if ($params->get('link_saiba_mais')): ?>
	<div>
		<a href="<?php echo $params->get('link_saiba_mais')?>">
			<?php if ($params->get('texto_saiba_mais')): ?>
				<?php echo $params->get('texto_saiba_mais')?>
			<?php else: ?>
				<?php echo JText::_('COM_CONTENT_FEED_READMORE'); ?>
			<?php endif;?>
		</a>
	</div>
<?php endif; ?>

	<?php foreach ($lista_chamadas as $lista): ?>

	<?php if ($params->get('exibir_imagem')): ?>  

 						<div class="image-container">
	                        <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
	                            <img src="<?php echo $lista->image_url ?>" alt="<?php echo $lista->image_alt ?>" />
	                        </a>
	                    </div>
			<?php endif; ?>


		<?php if ($params->get('exibir_title')): ?>
				<<?php echo $params->get('header_tag')?> <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
					<a href="<?php echo $link ?>" <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
						<?php echo $lista->title ?>
					</a>
				</<?php echo $params->get('header_tag')?>>
		<?php endif; ?>
		<?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
			<div>
				<div>
					<a href="<?php echo $link ?>">
						<p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
					</a>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($params->get('exibir_introtext') && $lista->introtext): ?>
			<?php if ($params->get('limitar_caractere')): ?>
				<?php
					$tam_texto = strlen($lista->introtext);
					if($tam_texto > $params->get('limite_caractere')){
						//Busca o total de caractere até a última palavra antes do limete.
						$limite_palavra = strrpos(substr(strip_tags($lista->introtext), 0, $params->get('limite_caractere')), " ");
						$texto = trim(substr(strip_tags($lista->introtext), 0, $limite_palavra)).'...';
					}
				?>
					<p><?php echo $texto; ?></p>
			<?php else: ?>
					<p class="tile-description"><?php echo strip_tags($lista->introtext, '<b><i><strong><u><b>') ?></p>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
    