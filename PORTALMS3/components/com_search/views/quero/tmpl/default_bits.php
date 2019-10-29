<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<dl class="search-results<?php echo $this->pageclass_sfx; ?>" id="bits">
    <h2>Pesquisa à Base de Dados do BITS</h2>
<?php foreach ($this->results as $result) : ?>
	<dt class="result-title">
		<?php //echo $this->pagination->limitstart + $result->count.'. ';?>
		<?php if ($result->href) :?>
			<a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
				<?php echo $this->escape($result->title);?>
			</a>
		<?php else:?>
			<?php echo $this->escape($result->title);?>
		<?php endif; ?>
	</dt>
    
	<dd class="result-text">
		<?php echo $result->text; ?>
	</dd>
	</br>
<?php endforeach; ?>
<a class="vtodos" href="#"><i class="icon-chevron-right"></i> visualizar Todos</a>
</br>
<hr>
</dl>

<div class="pagination">
	<?php //echo $this->pagination->getPagesLinks(); ?>    
</div>
