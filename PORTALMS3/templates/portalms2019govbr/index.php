﻿<?php 
   /**
    * @package
    * @subpackage
    * @copyright
    * @license
    */
   
   // No direct access.
   defined('_JEXEC') or die;
   
   $doc = JFactory::getDocument();
   $app = JFactory::getApplication();
   
   $message  =  $app->getMessageQueue();
   $pageclass = "";
   $preffix = "";
   $option = $app->input->getCmd('option', '');
   $view = $app->input->getCmd('view', '');
   $com_blankcomponent = ($option  == 'com_blankcomponen' ? true : false);
   
   if(!empty($app->getMenu()->getActive())){
   $menuitem   = $app->getMenu()->getActive();
   $pageclass  = $menuitem->params->get( 'pageclass_sfx' ); 
   $preffix    = current(explode(' ',$pageclass));  
   }
   
   $helix_path = JPATH_PLUGINS . '/system/helixultimate/core/helixultimate.php';
   if (file_exists($helix_path)) {
    require_once($helix_path);
    $theme = new helixUltimate;
   } else {
    die('Install and activate <a target="_blank" href="https://www.joomshaper.com/helix">Helix Ultimate Framework</a>.');
   }
   ?>
<!doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="canonical" href="<?php echo JUri::current(); ?>">
      <?php
         $theme->head();
         
         $theme->add_css('font-awesome.min.css,bootstrap.min.css,owlcarousel.min.css,style.css,jquery-ui.css,all.css');						
         $theme->add_js('jquery.sticky.js, main.js,owl-carousel.2.3.0.min.js,script-portal.js,jquery-ui.js,swiper.min.js');
         
         
         //Before Head
         if ($before_head = $this->params->get('before_head'))
         {
             echo $before_head . "\n";
         }
         ?>
   </head>
   <body class="<?php echo $pageclass ; ?> ">
      <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
         <ul id="menu-barra-temp" style="list-style:none;">
            <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"> <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a> </li>
         </ul>
      </div>
      <jdoc:include type="modules" name="barra-do-governo" />
      <div id="interna">
         <!-- TOPO -->
         <header class="topo">
            <nav class="menu-principal">
               <div class="container">
                  <div class="header-wrapper">
                     <!-- MENU & BUSCA --> 
                     <!-- icones -->
                     <div class="header-icons"> <a class="ico-navegacao">Navegação</a> </div>
                     <!-- Logo 
                        <jdoc:include type="modules" name="logo" />-->
                     <div id="logo" class="span8<?php if($this->params->get('classe_nome_principal', '') != '') echo ' '.$this->params->get('classe_nome_principal'); ?>">
                        <a href="<?php echo JURI::root(); ?>" title="<?php echo $this->params->get('nome_principal', 'Nome principal'); ?>">
                           <?php if( $this->params->get('emblema', '') != '' ): ?>
                           <img src="<?php echo JURI::root(); ?><?php echo $this->params->get('emblema', ''); ?>" alt="<?php echo $this->params->get('nome_principal', 'Nome principal'); ?>" />
                           <?php endif; ?>
                           <span class="portal-title-1"><?php echo $this->params->get('denominacao', ''); ?></span>
                           <h1 class="portal-title corto"><?php echo $this->params->get('nome_principal', 'Nome principal'); ?></h1>
                           <!-- <span class="portal-description"><?php //echo $this->params->get('subordinacao', ''); ?></span> --> 
                        </a>
                     </div>
                     <!-- Acessibilidade 
                        <jdoc:include type="modules" name="acessibilidade" />-->
                     <div class="header-accessibility">
                        <ul>
                           <li id="siteaction-contraste"> <a href="#" accesskey="6" class="toggle-contraste">Alto Contraste</a> </li>
                           <li id="siteaction-vlibras"> <a href="http://www.vlibras.gov.br/" accesskey="">VLibras</a> </li>
                        </ul>
                     </div>
                     <!-- Search -->
                     <div id="portal-searchbox">
                        <form action="<?php echo $this->baseurl; ?>/busca" method="post" class="form-inline search-form">
                           <input name="searchword" id="mod-search-searchword" maxlength="200" class="inputbox search-query searchField" type="search" size="20" placeholder="O que você procura?">
                           <button onclick="this.form.searchword.focus();" class="searchButton" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                           <input type="hidden" name="task" value="search">
                           <input type="hidden" name="option" value="com_search">
                        </form>
                     </div>
                  </div>
               </div>
               <div class="box-menu">
                  <div class="container">
                     <div class="row">
                        <jdoc:include type="modules" name="menu-principal-interno" />
                     </div>
                     <div class="row">
                        <jdoc:include type="modules" name="redes-sociais-menu-principal" />
                     </div>
                  </div>
               </div>
            </nav>
            <jdoc:include type="modules" name="modal-busca" />
            <?php if (@$menuitem->home) : ?>
            <jdoc:include type="modules" name="super-banner" />
            <?php endif; ?>
         </header>
         <?php if($message):  ?>
         <div class="row-fluid">
            <jdoc:include type="message" />
         </div>
         <?php endif; ?>
         <?php if (empty($menuitem->home)) : ?>
         <div class="container">
            <!-- rastro de navegacao -->
            <jdoc:include type="modules" name="rastro-navegacao" />
            <jdoc:include type="module" name="breadcrumbs" title="Rastro de navegação" />
         </div>
         <?php endif; ?>
         <?php
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $lang = JFactory::getLanguage();
            if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
                echo '<div class="conteudo-interna">';
                echo '<div class="body-wrapper">';
                echo '<div class="body-innerwrapper">';
            }
            else {
                echo '<div id="wrapper" class="container">';
                echo '<div class="conteudo-interna">';
            }
            ?>
         <?php 
            $posicao_topo = $preffix. '-topo';
                     $posicao_rodape = $preffix. '-rodape';
                     $posicao_direita = $preffix. '-direita'; ?>
         <?php if(!empty($menuitem)) : ?> 
         <?php if($menuitem->component == "com_blankcomponent" &&  $menuitem->params->get("menu_text")):?>		
         <h1 class="documentFirstHeading">
            <?php if($menuitem->params->get("menu-anchor_title")) : ?>
            <?php echo $menuitem->params->get("menu-anchor_title"); ?>
            <?php else :?>
            <?php echo $menuitem->title; ?>
            <?php endif; ?>
         </h1>
         <?php endif; ?>
         <?php endif; ?>
         <?php if($this->countModules($posicao_topo) || $this->countModules("internas-topo")): ?>
         <div class="row-fluid">
            <jdoc:include type="modules" name="internas-topo" headerLevel="2" style="container" />
            <jdoc:include type="modules" name="<?php echo $posicao_topo ?>" headerLevel="2" style="container" />
         </div>
         <?php endif; ?>
         <?php if($this->countModules($posicao_direita) || $this->countModules("internas-direita")): ?>
         <div class="row-fluid">
            <div class="span9">
               <?php if($com_blankcomponent): ?>
               <jdoc:include type="modules" name="pagina-interna-capa" style="container" headerLevel="2" />
               <jdoc:include type="modules" name="pagina-interna-capa-<?php echo $preffix ?>" style="container" headerLevel="2" />
               <?php else: ?>
               <jdoc:include type="component" />
               <?php endif; ?>
            </div>
         </div>
         <?php else: ?>
         <div class="row-fluid">
            <?php if($com_blankcomponent): ?>
            <jdoc:include type="modules" name="pagina-interna-capa" style="container" headerLevel="2" />
            <jdoc:include type="modules" name="pagina-interna-capa-<?php echo $preffix ?>" style="container" headerLevel="2" />
            <?php else: ?>
            <jdoc:include type="component" />
            <?php endif; ?>
         </div>
         <?php endif; ?>
         <?php if($this->countModules($posicao_rodape) || $this->countModules("internas-rodape")): ?>
         <div class="row-fluid">
            <jdoc:include type="modules" name="<?php echo $posicao_rodape ?>" headerLevel="2" style="container" />
            <jdoc:include type="modules" name="internas-rodape" headerLevel="2" style="container" />
         </div>
         <?php endif; ?>
      </div>
      </div>
      </div>
      <!-- FINAL CONTEUDO --> 
      <!--<jdoc:include type="modules" name="voltar-topo" />-->
      <div id="viewlet-below-content">
         <div class="voltar-topo"> <a href="#interna">Voltar ao topo</a> </div>
         <div class="texto-copyright"> </div>
      </div>
      <!-- FINAL CONTEUDO END --> 
      <!-- FOOTER -->
      <section class="footer">
         <div class="container">
            <div class="box-menu">
               <div class="col-md-12">
                  <!-- Redes Sociais Rodapé-->
                  <jdoc:include type="modules" name="rodape-redes-sociais" />
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row">
                           <!-- Menu Rodapé -->
                           <jdoc:include type="modules" name="menu-rodape" />
                        </div>
                     </div>
                  </div>
                  <!-- row --> 
               </div>
            </div>
            <!-- Rodapé -->
            <div class="redes-e-logos">
               <jdoc:include type="modules" name="rodape" />
               <div id="footer-brasil">
                  <div id="wrapper-footer-brasil"><a class="logo-acesso-footer" href="http://www.acessoainformacao.gov.br/" alt="Acesso à informação" title="Acesso à informação"></a><a class="logo-governo-federal" href="http://www.brasil.gov.br/" alt="Governo Federal" title="Governo Federal"></a></div>
               </div>
            </div>
         </div>
      </section>
      <!-- FOOTER END -->
      </div>
      <!-- PRINCIPAL --> 
      <!-- JS --> 
      <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
      <noscript>
         Javascript de carregamento do Framework Bootstrap
      </noscript>
      <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.cookie.js"></script>
      <noscript>
         Javascript de carregamento do Framework jQuery
      </noscript>
      <?php if($view == 'article'): //chamada do Flickr somente nas paginas internas ?>
      <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/imageflickr.js" type="text/javascript"></script>
      <noscript>
         <!-- item para exibição dos efeitos da galeria do FLICKR -->
      </noscript>
      <?php endif; ?>
      <?php if($this->params->get('google_analytics_id', '') != ''): ?>
      <script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', '<?php echo $this->params->get('google_analytics_id', ''); ?>']);
         _gaq.push(['_trackPageview']);
         <?php if($this->params->get('google_analytics_domain_name', '') != ''): ?>
         _gaq.push(['_setDomainName', '<?php echo $this->params->get('google_analytics_domain_name', ''); ?>']);
         <?php endif; ?>
         <?php if($this->params->get('google_analytics_allow_linker', '') == 1): ?>
         _gaq.push(['_setAllowLinker', true]);
         <?php endif; ?>
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
      </script>
      <noscript>
         &nbsp;<!-- item para fins de acessibilidade -->
      </noscript>
      <?php endif; ?>
      <!-- debug -->
      <jdoc:include type="modules" name="debug" />
      <script>
         jQuery(document).ready(function(){	
             var swiperDados = new Swiper('.participacao-social', {
         		slidesPerView: 4,
         		pagination: {
         			el: '.navegacao-participacao',
         			clickable: true,
         		},
         		navigation: {
         			nextEl: '.proximo-participacao',
         			prevEl: '.anterior-participacao',
         		},
             });
         
             var swiper = new Swiper('.swiper-agenda', {
         		slidesPerView: 3,
         		spaceBetween: 30,
         		slidesPerGroup: 3,
         		loop: true,
         		loopFillGroupWithBlank: true,
         		pagination: {
         			el: '.navegacao-agenda',
         			clickable: true,
         		},
         		navigation: {
         			nextEl: '.proximo-agenda',
         			prevEl: '.anterior-agenda',
         		},
             });
         
          	//jQuery( function() {
         	//	jQuery( "#datepicker" ).datepicker();
         	//});
             
             var $dp = jQuery( "#datepicker" );  
             $dp.datepicker().hide();
             jQuery("#abre-calendario").click(function(event){        
                 event.preventDefault();
                 if ($dp.is(':hidden')) {
                     $dp.show();
                 }else{
                     $dp.hide();
                 }
             }); 
         }); 
         
      </script> 
      <script defer src="//barra.brasil.gov.br/barra_2.0.js" type="text/javascript"></script> 
      <!-- JS -->
   </body>
</html>