<?php
/**
 * @package               
 * @subpackage	
 * @copyright        
 * @license          
 */

// No direct access.
defined('_JEXEC') or die;

//inclusao de cabecalho
header('Content-Type: text/html; charset=utf-8');

if(!@isset($this->params))
{
	$app = JFactory::getApplication();
	$this->params = $app->getTemplate(true)->params;
}

$menuitem   = $app->getMenu()->getActive();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br" dir="ltr"> <!--<![endif]-->
<head>    
<!-- CSS -->
    <!--[if lt IE 9]><script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css">
    <link rel="stylesheet" href="https://idangero.us/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- CSS -->        
</head>
<body>
    <a class="hide" id="topo" href="#accessibility">Ir direto para menu de acessibilidade.</a>
    <noscript>
      <div class="error minor-font">
        Seu navegador de internet está sem suporte à JavaScript. Por esse motivo algumas funcionalidades do site podem não estar acessíveis.
      </div>
    </noscript>
    <!--[if lt IE 7]><center><strong>Atenção, a versão de seu navegador não é compatível com este sítio. Atualize seu navegador.</strong></center><![endif]-->
    <jdoc:include type="modules" name="barra-do-governo" />
    <div class="layout">
    	<header>
           <div class="container"> 
                <div class="row-fluid accessibility-language-actions-container">                         
                    <div class="span6 accessibility-container">
                        <ul id="accessibility">
                            <li>
                                <a accesskey="1" href="#content" id="link-conteudo">
                                    Ir para o conte&uacute;do
                                    <span>1</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="2" href="#navigation" id="link-navegacao">
                                    Ir para o menu
                                    <span>2</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="3" href="#portal-searchbox" id="link-buscar">
                                    Ir para a busca
                                    <span>3</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="4" href="#footer" id="link-rodape">
                                    Ir para o rodap&eacute;
                                    <span>4</span>
                                </a>

                            </li>
                        </ul>                       
                    </div>
                    <!-- fim div.span6 -->
                    <div class="span6 language-and-actions-container">
                    </div>
                    <!-- fim div.span6 -->    
                </div>
                <!-- fim .row-fluid -->
                <div class="row-fluid">
                    <div id="logo" class="span8<?php if($this->params->get('classe_nome_principal', '') != '') echo ' '.$this->params->get('classe_nome_principal'); ?>">
                        <a href="<?php echo JURI::root(); ?>" title="<?php echo $this->params->get('nome_principal', 'Nome principal'); ?>">
                            <span class="portal-title-1"><?php echo $this->params->get('denominacao', ''); ?></span>
                            <h1 class="portal-title corto"><?php echo $this->params->get('nome_principal', 'Nome principal'); ?></h1>
                            <span class="portal-description"><?php echo $this->params->get('subordinacao', ''); ?></span>
                        </a>
                    </div>
                    <!-- fim .span8 -->
                    <div class="span4">
                    </div>
                    <!-- fim .span4 -->
                </div>
                <!-- fim .row-fluid -->
            </div>
            <!-- fim div.container -->
            <div class="sobre">
                <div class="container">
                </div>
                <!-- .container -->
            </div>
            <!-- fim .sobre -->   
    	</header>
    	<main>
    		<div class="container">
               	<div class="row-fluid">
                    <div id="navigation" class="span3">
                        <a href="#" class="visible-phone visible-tablet mainmenu-toggle btn"><i class="icon-list"></i>&nbsp;Menu</a>
                        <section id="navigation-section">                           
                            <span class="hide">Início do menu principal</span>
                            <span class="hide">Fim do menu principal</span>
                        </section>                  
                    </div>
                    <div id="content" class="internas">
                    	<section id="content-section">                          
                            <span class="hide">Início do conteúdo da página</span>
                            <div class="row-fluid">
                            	<h1 class="documentFirstHeading">
                            		Erro <?php echo $this->error->getCode(); ?>
                            	</h1>
								<div class="subtitle">
									<h2><?php echo $this->error->getMessage(); ?></h2>
                                    <p>Pedimos desculpas pelo inconveniente, mas a página que você estava tentando acessar não existe neste endereço.</p><p>
                                    Se você está certo que o endereço informado está correto mas está encontrando um erro, por favor entre em <a href="http://mec.cube.callsp.inf.br/auto-atendimento/navegacao-informacoes/#/MjMtc2U=">contato</a>.</p><p>Obrigado.</p>									
								</div>
								<br />
								<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>									
								<ol>
									<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
								</ol>
								<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>

								<ul>
									<li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
                                    <li><a href="<?php echo $this->baseurl; ?>/index.php/mapa-do-site" title="Mapa do site">Mapa do site</a></li>
                                    <li><a href="<?php echo $this->baseurl; ?>/index.php/busca" title="Busca">Busca</a></li>
								</ul>
								<br />
								<div class="subtitle">
									<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
								</div>
								<br />
								<h3>Informações técnicas</h3>
								<div id="techinfo" class="error">
									<p><?php echo htmlspecialchars($this->error->getMessage()); ?></p>
									<p>
										<?php if ($this->debug) :
											echo $this->renderBacktrace();
										endif; ?>
									</p>
								</div>
                            </div>
                        </section>
					</div>
               	</div>    			
    		</div>
    	</main>
        <footer>
            <div class="footer-atalhos">
                <div class="container">
                    <div class="pull-right voltar-ao-topo"><a href="#portal-siteactions"><i class="icon-chevron-up"></i>&nbsp;Voltar para o topo</a></div>
                </div>
            </div>
            <div class="container container-menus">
                <div id="footer" class="row footer-menus">
                    <span class="hide">Início da navegação de rodapé</span>
                    <span class="hide">Fim da navegação de rodapé</span>                    
                </div>
                <!-- fim .row -->
            </div>
            <!-- fim .container -->
            <div class="footer-logos">
                <div class="container">
                    <?php if( $this->params->get('rodape_acesso_informacao', 1) == 1 ): ?>
                        <a href="http://www.acessoainformacao.gov.br/" class="logo-acesso pull-left"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/acesso-a-informacao.png" alt="Acesso a Informação"></a>
                    <?php endif; ?>
                    <?php if( $this->params->get('rodape_logo_brasil', 1) == 1 ): ?>
                        <!-- separador para fins de acessibilidade --><span class="hide">&nbsp;</span><!-- fim separador para fins de acessibilidade -->                    
                        <a href="http://www.brasil.gov.br/" class="brasil pull-right"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/brasil.png" alt="Brasil - Governo Federal"></a>
                    <?php endif; ?>
                </div>              
            </div>
            <div class="footer-ferramenta">
                <div class="container">
                    <?php echo $this->params->get('mensagem_final_ferramenta', '<p>Interface preparada para desenvolvimento com o CMS <a href="http://www.joomla.org">Joomla</a></p>'); ?>                            
                </div>              
            </div>
            <div class="footer-atalhos visible-phone">
                <div class="container">
                    <span class="hide">Fim do conteúdo da página</span>
                    <div class="pull-right voltar-ao-topo"><a href="#portal-siteactions"><i class="icon-chevron-up"></i>&nbsp;Voltar para o topo</a></div>
                </div>
            </div>
        </footer> 
    </div>
    <!-- scripts principais do template --> 
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
        </script><noscript>&nbsp;<!-- item para fins de acessibilidade --></noscript>
    <?php endif; ?>
</body>
</html>