<?php
   /**
    * Sufixo de Classe do Módulo: column col-md-4  tile tile-default
    * @package     Joomla.Site
    * @subpackage  mod_chamadas
    *
    * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
	*
	* 	SET /modules/mod_chamadas/modelos/manual/manual.php	$default = 4;
	*
    */
   
   defined('_JEXEC') or die;
   ?>
<div class="row">
   <div class="row-content">
      <?php foreach ($lista_chamadas as $key => $lista): ?>
      <div class="column col-md-6 " data-panel="">
         <div class="tile foto-sobreposta-grande foto-sobreposta" id="">
            <div class="nitf-basic-tile tile-content">
               <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
               <p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
               <?php endif; ?>
               </p>
               <h2 class="banner"><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
               <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
               <?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
               <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
               <img src="<?php echo $lista->image_url ?>" width="564" height="468" class="<?php echo $lista->image_align ?>" alt="<?php echo $lista->image_alt ?>" title="<?php echo $lista->title ?>" />
               </a>          <?php endif; ?>	    
               <div class="visualClear">
                  <!-- -->
               </div>
            </div>
         </div>
      </div>
      <div class="column col-md-6" data-panel="">
         <div class="tile tile-default" id="">
            <div class="nitf-basic-tile tile-content">
               <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
               <p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
               <?php endif; ?>
               </p>
               <h2><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
               <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
               <div class="visualClear">
                  <!-- -->
               </div>
            </div>
         </div>
         <div class="tile tile-default" id="">
            <div class="nitf-basic-tile tile-content">
               <p class="tile-subtitle"> <?php echo $lista->chapeu; ?>
               </p>
               <h2><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
               <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
               <div class="visualClear">
                  <!-- -->
               </div>
            </div>
         </div>
         <div class="tile tile-default" id="">
            <div class="nitf-basic-tile tile-content">
               <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
               <p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
               <?php endif; ?>
               </p>
               <h2><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
               <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
               <div class="visualClear">
                  <!-- -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endforeach; ?>
</div>
<pre><?php print_r($lista_chamadas); ?></pre>
