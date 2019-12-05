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
<div class="row">
   <div class="tile tile-default">
      <?php foreach ($lista_chamadas as $key => $lista): ?>

       <?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
          <a href="<?php echo $lista->link ?>"><img src="<?php echo $lista->image_url ?>" width="" height="" class="" alt="<?php echo $lista->image_alt ?>" title="<?php echo $lista->title ?>" /> </a>
		 <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
         <p class="tile-subtitle-frontpage"><?php echo $lista->chapeu ?></p>
         <?php endif; ?>
         <?php if ($params->get('exibir_title')): ?>			
         <h2 class="chamada-box-frontpage"><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
         <?php endif; ?>
            <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">    
            </a>

         <?php endif; ?>		
         
         <p class="data-noticia"><?php echo strip_tags($lista->introtext); ?></p>
      </div>
      <?php endforeach; ?>
   </div>
