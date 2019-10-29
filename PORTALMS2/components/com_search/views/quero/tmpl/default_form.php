<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">
	<div class="row-fluid">
		<div class="span10">
			<div class="row-fluid">

				<h2 class="titulo-home">Quero Saber</h2>
				<input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
				<button name="Search" onclick="this.form.submit()" class="acao-busca" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>">Buscar</button>
				<input type="hidden" name="task" value="quero" />
				<div class="clearfix"></div>

				<?php

				if (array_key_exists("destaque", $this->results)) {
					$destaque = $this->results['destaque'];
					if ($this->error == null && count($destaque) > 0){
						echo $this->loadTemplate('destaques');
					}else{
						echo $this->loadTemplate('error');
					}
				}

				// if ($this->error == null && count($this->results) > 0){
				// 	echo $this->loadTemplate('bits');
				// }else{
				// 	echo $this->loadTemplate('error');
				// }

				if (array_key_exists("noticias", $this->results)) {
					$noticias = $this->results['noticias'];
					if ($this->error == null && count($noticias) > 0){
						echo $this->loadTemplate('noticias');
					}else{
						echo $this->loadTemplate('error');
					}
				}

				if (array_key_exists("outros", $this->results)) {
					$outros   = $this->results['outros'];
					if ($this->error == null && count($outros) > 0){
						echo $this->loadTemplate('outros');
					}else{
						echo $this->loadTemplate('error');
					}
				}
				?>
			</div>
		</div>


		<div class="span2">

			<?php if ($this->params->get('search_areas', 1)) : ?>
			<fieldset class="only">
				<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
				<?php foreach ($this->searchareas['search'] as $val => $txt) :
				$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
				?>
				<label for="area-<?php echo $val;?>" class="checkbox area-<?php echo $val;?>">
					<input type="checkbox" checked="checked" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> >
					<?php echo JText::_($txt); ?>
				</label>
			<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>

	<?php if ($this->total > 0) : ?>
	<p class="counter">
		<?php //var_dump($this->pagination); echo $this->pagination->getPagesCounter(); ?>
	</p>
<?php endif; ?>
<!-- Fim SPAN3 -->
</div>
</div>

</form>



