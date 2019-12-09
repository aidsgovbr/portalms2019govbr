<?php 
   /**
    * package
    * subpackage
    * copyright
    * license
    */
   
   // No direct access.
   defined('_JEXEC') or die;
   
   // Getting framwork from template
   $app             = JFactory::getApplication();
   $doc             = JFactory::getDocument();
   $user            = JFactory::getUser();
   
   $this->language  = $doc->language;
   $this->direction = $doc->direction;
   
   // Getting params from template
   $params = $app->getTemplate(true)->params;
   
   // Detecting Active Variables
   $option   = $app->input->getCmd('option', '');
   $view     = $app->input->getCmd('view', '');
   $layout   = $app->input->getCmd('layout', '');
   $task     = $app->input->getCmd('task', '');
   $itemid   = $app->input->getCmd('Itemid', '');
   $message  =  $app->getMessageQueue();
   
   // Head information
   $sitename = $app->get('sitename','');
   $metaDesc = $app->get('MetaDesc','');
   $metaKey = $app->get('MetaKeys','');
   
   $preffix = '';
   if($menuitem   = $app->getMenu()->getActive()){
   // Menu
   $pageclass  = $menuitem->params->get( 'pageclass_sfx' ); 
   $preffix    = current(explode(' ',$pageclass));
   }
   // Type page
   $frontpage = $menuitem->home;
   $article = ($option == 'com_content' && $view == 'article');
   $com_blankcomponent = ($option == 'com_blankcomponent');
   ?>
<!doctype html>
<html lang="pt-br">
   <head>
      <?php if($frontpage != '1') : ?>
      <jdoc:include type="head"/>
      <?php else: ?>
      <title><?php echo $sitename; ?></title>
      <meta charset="utf-8">
      <meta name="keywords" content="<?php echo $metaKey; ?>" />
      <?php endif; ?>
      <meta name="description" content="<?php echo $metaDesc; ?>" />
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicon.png" />
      <!-- JS -->
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>--> 
      <!--<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.js"></script>--> 
      <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/script-portal.js"></script>
      <!--<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
      <!--<script type="text/javascript" src="https://idangero.us/swiper/dist/js/swiper.min.js"></script>-->
      <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/owl-carousel.2.3.0.min.js"></script>
      <!-- JS -->
      <!-- CSS -->
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css">
      <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">-->
     <!-- <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/owlcarousel.min.css">
      
      <!--<link rel="stylesheet" href="https://idangero.us/swiper/dist/css/swiper.min.css">-->
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!-- CSS -->
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
                           <div class="LSBox">
                              <input name="searchword" id="mod-search-searchword" maxlength="200" class="inputbox search-query searchField" type="search" size="20" placeholder="O que você procura?">
                              <button onclick="this.form.searchword.focus();" class="searchButton" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                              <input type="hidden" name="task" value="search">
                              <input type="hidden" name="option" value="com_search">
                        </form>
                        </div>
                     </div>
                  </div>
                  <!-- HEADER --> 
                  <!-- <div class="search-wrapper"> --> 
                  <!-- Submenu Links Destaque/Serviços --> 
                  <!-- <jdoc:include type="modules" name="top-menu" />--> 
                  <!--      </div>--> 
                  <!-- MENU PRINCIPAL -->
                  <div class="box-menu">
                     <div class="container">
                        <div class="row">
                           <!-- Menu Principal -->
                           <jdoc:include type="modules" name="menu-principal-interno" />
                        </div>
                        <!-- row -->
                        <div class="row">
                           <!-- Redes Sociais Menu Principal -->
                           <jdoc:include type="modules" name="redes-sociais-menu-principal" />
                        </div>
                     </div>
                  </div>
               </div>
               <!-- CONTAINER --> 
            </nav>
            <!-- BOX BUSCA -->
            <jdoc:include type="modules" name="modal-busca" />
            <!-- AREA DE DESTAQUE -->
            <?php if ($menuitem->home) : ?>
            <jdoc:include type="modules" name="super-banner" />
            <?php endif; ?>
         </header>
         <!-- HEADER END -->
         <?php if($message):  ?>
         <div class="row-fluid">
            <jdoc:include type="message" />
         </div>
         <?php endif; ?>
         <!--  verifica se a pagina é a inicial-->
         <?php if ($menuitem->home) : ?>
         <jdoc:include type="modules" name="pagina-inicial" style="container" headerLevel="2" />
         <!-- verifica se a pagina é interna -->
         <?php else: ?>
         <div class="container">
            <!-- rastro de navegacao -->
            <jdoc:include type="modules" name="rastro-navegacao" />
            <jdoc:include type="module" name="breadcrumbs" title="Rastro de navegação" />
         </div>
         
         
         <!-- <div id="wrapper" class="container">
            <div class="conteudo-interna"> -->
                <div class="body-wrapper">
        <div class="body-innerwrapper">
        
        
               <?php   $posicao_topo = $preffix. '-topo';
                  $posicao_rodape = $preffix. '-rodape';
                  $posicao_direita = $preffix. '-direita'; ?>
               <?php if($menuitem->component == "com_blankcomponent" &&  $menuitem->params->get("menu_text")):?>		
               <h1 class="documentFirstHeading">
                  <?php if($menuitem->params->get("menu-anchor_title")) : ?>
                  <?php echo $menuitem->params->get("menu-anchor_title"); ?>
                  <?php else :?>
                  <?php echo $menuitem->title; ?>
                  <?php endif; ?>
               </h1>
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

               <?php endif; ?>
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