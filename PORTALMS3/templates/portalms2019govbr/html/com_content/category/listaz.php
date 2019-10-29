<?php
/**
 * @package		
 * @subpackage	
 * @copyright	
 * @license		
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
require __DIR__.'/_helper.php';

?>
<!-- <div class="category-list<?php echo $this->pageclass_sfx;?>">
 -->
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class="documentFirstHeading">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h>
	<?php else : ?>
	<h1 class="documentFirstHeading">	
		<?php echo $this->category->title; ?>
	</h1>
	<?php endif; ?>

	<?php if($this->params->get('page_subheading')): ?>
	 <h2 class="secondaryHeading"><?php echo $this->escape($this->params->get('page_subheading')); ?></h2>
	<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<div class="subtitle">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
			<?php TemplateContentCategoryHelper::displayCategoryImage( $this->category->getParams()->get('image') ); ?>
		<?php endif; ?>
		<?php if ($this->params->get('show_description') && $this->category->description) : ?>
			<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
		<?php endif; ?>		
	</div>
	<?php endif; ?>

	
	<?php echo $this->loadTemplate('articles'); ?>
	
<!-- </div> -->