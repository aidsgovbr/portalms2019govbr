<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

// Create some shortcuts.
$params		= &$this->item->params;
$n			= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
<?php if (empty($this->items)) : ?>
<?php if ($this->params->get('show_no_articles', 1)) : ?>

<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
<?php endif; ?>
<?php else : ?>
<div id="viewlet-below-content-title">
    <div class="documentByLine" id="plone-document-byline">  
      
      <span class="documentModified">
        <span>última modificação</span>
        <?php echo JHtml::_('date', $this->items[0]->modified, 'd/m/y'); ?> <?php echo JHtml::_('date', $this->items[0]->modified, 'H\hi'); ?>
      </span>
    </div>
</div>

<div class="content-core">

  <?php foreach ($this->items as $i => $article):
			$images = json_decode($article->images);			
			?>
  <article class="tileItem visualIEFloatFix tile-collective-nitf-content">
    <div class="tileContent">
      <div class="tileImage"> <a href="https://www.gov.br/pt-br/noticias/trabalho-e-previdencia/2019/10/nova-previdencia-deve-atrair-investidores-gerar-renda-e-empregos"> <img src="https://www.gov.br/pt-br/noticias/trabalho-e-previdencia/2019/10/nova-previdencia-deve-atrair-investidores-gerar-renda-e-empregos/secretario-especial-de-previdencia-e-trabalho-rogerio-marinho-fala-com-a-imprensa-em-brasilia-df.jfif/@@images/836b7443-11fb-4d1d-910e-d0eb0ff85349.jpeg" alt="Nova Previdência deve atrair investidores, gerar renda e empregos" title="Nova Previdência deve atrair investidores, gerar renda e empregos" height="72" width="128" class="tileImage"> </a> </div>
      <span class="subtitle"><?php echo trim($article->xreference); ?></span>
      <h2 class="tileHeadline"><a class"summary url" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid)); ?>"><?php echo $article->title ?></a></h2>
      <div class="tileBody"> 
      	<div class="description">
			<?php echo TemplateContentCategoryHelper::getArticleIntro( $article ); ?>
         </div> 
      </div>
    </div>
    <span class="documentByLine">
    <span class="hiddenStructure"> publicado </span> 
    <span class="summary-view-icon"> 
    <i class="icon-day"></i> <?php echo JHtml::_('date', $article->publish_up, 'd/m/y'); ?>  </span>
    <span class="summary-view-icon"> <i class="icon-hour"></i> <?php echo JHtml::_('date', $article->publish_up, 'H\hi'); ?> </span>
    <span class="summary-view-icon"> <i class="icon-news"></i> <?php echo  $article->category_title;  ?>  </span>
    <div class="visualClear"><!-- --></div>
    </span> </article>
  <?php endforeach; ?>
</div>
<?php // Add pagination links ?>
<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
<div id="pagination">
  <?php if ($this->params->def('show_pagination_results', 1)) : ?>
  <?php echo $this->pagination->getPagesCounter(); ?>
  <?php endif; ?>
  <?php echo $this->pagination->getPagesLinks(); ?> </div>
<?php endif; ?>
<?php endif; ?>
