﻿<?php
   /**
    * Sufixo de Classe do Módulo: column col-md-4  tile tile-default
    * @package     Joomla.Site
    * @subpackage  mod_chamadas
    *
    * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
    */
   
   defined('_JEXEC') or die;
   ?>
<div class="row">
   <div class="tile tile-default ">
      <?php foreach ($lista_chamadas as $key => $lista): ?>
      <div class="nitf-basic-tile tile-content column col-md-4">
         <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
         <p class="tile-subtitle"><?php echo $lista->chapeu ?></p>
         <?php endif; ?>
         <?php if ($params->get('exibir_title')): ?>			
         <h2 class="chamada-box"><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo $lista->title ?></a></h2>
         <?php endif; ?>
         <p class="tile-description"><?php echo strip_tags($lista->introtext); ?></p>
         <div class="<?php echo $params->get('header_class') ?>basic-tile" data-panel="">
            <?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
            <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
  
            </a>
         </div>
         <?php endif; ?>		
      </div>
      <?php endforeach; ?>
   </div>
</div>
</div>
<pre><?php print_r($lista_chamadas); ?></pre>