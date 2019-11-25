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
<div class="container">
   <div class="row">
      <div class="foto-sobreposta-pequena tile-default">
         <?php
            foreach ($lista_chamadas as $key => $value){
            	// var_dump($value->image_url); die;
            	if ($key == 0) { ?>
         <div class="column col-md-6" data-panel="one">
            <div class="tile foto-sobreposta-pequena foto-sobreposta">
               <div class="nitf-basic-tile tile-content">
                  <p class="subtitle">
                     <?php echo $value->chapeu; ?>
                  </p>
                  <h2 class="chamada-box"><a href="<?php echo $value->link; ?>" title="<?php echo $value->title ?>"><?php echo $value->title ?></a></h2>
                  <div id="chamadas-teste-1">
                     <img src="<?php echo ($value->image_url) ? $value->image_url : "" ?>" alt="<?php echo $value->title ?>" title="<?php echo $value->title ?>" />
                  </div>
                  <?php if ($params->get('texto_saiba_mais')): ?>
                  <div class="botoes-centro">
                     <a href="<?php echo $link_saiba_mais; ?>" class="btn-padrao">
                     <?php if ($params->get('texto_saiba_mais')): ?>
                     <?php echo $params->get('texto_saiba_mais')?>
                     <?php endif;?>
                     </a>	
                  </div>
                  <?php endif;?>
               </div>
            </div>
         </div>
         <?php } elseif ($key == 1) { ?>
         <div class="column col-md-3" data-panel="two">
            <div class="tile foto-sobreposta-pequena foto-sobreposta">
               <div class="nitf-basic-tile tile-content">
                  <p class="subtitle">
                     <?php echo $value->chapeu; ?>
                  </p>
                  <div id="chamadas-teste-1">
                     <img src="<?php echo ($value->image_url) ? $value->image_url : "" ?>" alt="<?php echo $value->title ?>" title="<?php echo $value->title ?>" />
                  </div>
                  <h2 class="chamada-box"><a href="<?php echo $value->link; ?>" title="<?php echo $value->title ?>"><?php echo $value->title ?></a></h2>
               </div>
            </div>
         </div>
         <?php } elseif ($key > 0 && $key < 4) { ?>
         <div class="column col-md-3" data-panel="three">
            <div class="tile foto-sobreposta-pequena foto-sobreposta">
               <div class="nitf-basic-tile tile-content">
                  <p class="subtitle">
                     <?php echo $value->chapeu; ?>
                  </p>
                  <div id="chamadas-teste-1">
                     <img src="<?php echo ($value->image_url) ? $value->image_url : "" ?>" alt="<?php echo $value->title ?>" title="<?php echo $value->title ?>" />
                  </div>
                  <h2 class="chamada-box"><a href="<?php echo $value->link; ?>" title="<?php echo $value->title ?>"><?php echo $value->title ?></a></h2>
                  <?php } else{ ?>
               </div>
            </div>
         </div>
         <?php 
            }
            }
            ?>
      </div>
   </div>
</div>
</div>   
<pre><?php print_r($lista_chamadas); ?></pre>