<?php
   /**
    * Sufixo de Classe do Módulo: column col-md-12 tile-default  destaquehome
    * @package     Joomla.Site
    * @subpackage  mod_chamadas
    *
    * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
    */
   
   defined('_JEXEC') or die;
   ?>
<div class="row linha-destaquehome">
   <div class="column col-md-12" data-panel="">
      <?php foreach ($lista_chamadas as $key => $lista): ?>
      <div class="tile">
         <div class="nitf-basic-tile tile-content2">
            <?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
            <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
            <img class="destaquehome" src="<?php echo $lista->image_url ?>" alt="<?php echo $lista->image_alt ?>" />
            </a>
         </div>
         <?php endif; ?>	
         <div class="visualClear">
            <!-- -->
         </div>
         <div class="linha-destaquehome-content">
            <?php if ($params->get('exibir_title')): ?>			
            <h1><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h1>
            <?php endif; ?>
            <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
            <div class="<?php echo $params->get('header_class') ?>  " data-panel="">
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<pre><?php print_r($lista_chamadas); ?></pre>