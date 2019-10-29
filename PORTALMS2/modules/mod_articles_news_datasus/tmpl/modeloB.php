<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news_datasus
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$ini = $params->get('artigoinicial');
$item_heading = $params->get('item_heading', 'h4');
// definindo valor do span
$span = 12 / $params->get('count');
?>
<div class="row-fluid <?php echo $params->get('moduleclass_sfx'); ?>">
	<?php
	for ($i = $ini, $n = count($list); $i < $n; $i ++) :
	$item = $list[$i];
	?>
	<div class="span<?php echo $span; ?>">

		<?php if ($params->get('item_title')) : ?>
			<div class="outstanding-header">
				<h2 class="outstanding-title">
					<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
						<?php if ($params->get('field_title') == "title"){ ?>
							<?php echo $item->title; ?>
						<?php }else{
							if ($item->xreference == "") {
								echo $item->title;
							} else {
								echo $item->xreference;
							}
						} ?>
					</a>
				</h2>
			</div>
		<?php endif; ?>

	<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
	endif; ?>

	<?php echo $item->beforeDisplayContent; ?>

	<?php echo $item->introtext; ?>

	<?php if (isset($item->link) && $item->readmore != 0 && $params->get('exibe_leia_mais')) :
	echo '<a class="readmore modelob pull-right" title="'.$item->title.'" href="'.$item->link.'">'.$params->get('readmoretext').'</a>';
	endif; ?>

<?php

if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>

<span class="article-separator">&#160;</span>

<?php endif; ?>
</div>
<?php endfor; ?>
</div>