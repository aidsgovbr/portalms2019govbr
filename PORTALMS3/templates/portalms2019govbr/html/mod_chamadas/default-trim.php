<?php
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
   <div class="tile tile-default-trim">
      <?php foreach ($lista_chamadas as $key => $lista): ?>
      <div class="nitf-basic-tile tile-content column col-md-4">
         <?php if ($params->get('chapeu') && ($lista->chapeu)): ?>
         <p class="tile-subtitle"><?php echo trim(substr(strip_tags($lista->chapeu), 0, 35 )); ?>
</p> 
         <?php endif; ?>
         <?php if ($params->get('exibir_title')): ?>			
         <h2 class="chamada-box"><a href="<?php echo $lista->link; ?>" title="<?php echo $lista->title ?>"><?php echo trim(substr(strip_tags($lista->title), 0, 80 )); ?></a></h2>
         <?php endif; ?>
         
         <p class="tile-description"><?php echo trim(substr(strip_tags($lista->introtext), 0, 200 )); ?></p>
         <div class="<?php echo $params->get('header_class') ?>basic-tile" data-panel="">
            <?php if ($params->get('exibir_imagem') && !empty($lista->image_url)): ?>
            <a href="<?php echo $lista->link ?>" title="<?php echo $lista->title ?>">
            <img src="<?php echo $lista->image_url ?>" width="370" height="246" class="<?php echo $lista->image_align ?>" alt="<?php echo $lista->image_alt ?>" title="<?php echo $lista->title ?>" />
            </a>
         </div>
         <?php endif; ?>		
      </div>
      <?php endforeach; ?>
   </div>
</div>
</div>
