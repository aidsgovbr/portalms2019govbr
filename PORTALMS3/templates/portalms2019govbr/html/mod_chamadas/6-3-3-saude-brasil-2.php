<?php
   /**
    * @package     Joomla.Site
    * @subpackage  mod_chamadas
    *
    * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
    */
   
   
   defined('_JEXEC') or die;
   $lista_chamadas_counter = count($lista_chamadas);
   $document = JFactory::getDocument();
   
   ?>
<section class="mosaico">
   <div class="container">
      <div class="row">
         
            <?php
               foreach ($lista_chamadas as $key => $value){
               	if ($key == 0) { ?>
            <div class="column col-md-6" data-panel="one">
            <div class="item-mosaico mosaico-secundario saude-brasil">
               <div class="chamada-mosaico">
                  <?php if ($params->get('exibir_title')): ?>			
                  <a href="<?php echo $link ?>" <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
                  <?php echo $value->title ?>
                  </a>
                  <?php endif; ?>
                  <div class="saude-brasil">
                     <p class="tile-description"><?php echo strip_tags($value->introtext); ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php } elseif ($key == 1) { ?>
         <div class="column col-md-3" data-panel="two">
            <div class="item-mosaico mosaico-secundario saude-brasil">
               <div class="chamada-mosaico">
                  <?php if ($params->get('exibir_title')): ?>			
                  <a href="<?php echo $link ?>" <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
                  <?php echo $value->title ?>
                  </a>
                  <?php endif; ?>
                  <div class="saude-brasil">
                     <p class="tile-description"><?php echo strip_tags($value->introtext); ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php } elseif ($key > 0 && $key < 4) { ?>
         <div class="column col-md-3" data-panel="three">
            <div class="item-mosaico mosaico-secundario saude-brasil">
               <div class="chamada-mosaico">
                  <?php if ($params->get('exibir_title')): ?>			
                  <a href="<?php echo $link ?>" <?php if ($params->get('header_class')): echo 'class="'.$params->get('header_class').'"'; endif; ?>>
                  <?php echo $value->title ?>
                  </a>
                  <?php endif; ?>
                  <div class="saude-brasil">
                     <p class="tile-description"><?php echo strip_tags($value->introtext); ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            }
            }
            ?>
      </div>
   </div>
 <?php if (! empty($link_saiba_mais) ): ?>
         <div class="botoes-centro">
            <a id="btn" href="<?php echo $link_saiba_mais; ?>" class="saude-brasil">
            <?php if ($params->get('texto_saiba_mais')): ?>
            <?php echo $params->get('texto_saiba_mais')?>
            <?php else: ?>
            VER TODAS
            <?php endif;?>
            </a>	
         </div>
         <?php endif; ?>
</section>
<!-- NOTICIAS END -->