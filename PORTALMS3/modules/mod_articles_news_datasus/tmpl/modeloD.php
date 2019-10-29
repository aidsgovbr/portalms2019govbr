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

$lista = array_chunk($list, 3);
foreach ($lista as $key => $value) {
	echo '<div class="row-fluid '.$params->get('moduleclass_sfx').'">';
	foreach ($value as $key => $item) { ?>
	<div class="span4">

		<!-- imagem -->
		<?php
		$imagem = json_decode($item->images);
		if ($imagem->image_intro) {
			echo '<img src="'.$imagem->image_intro.'" alt="'.$imagem->image_intro_alt.'" title="'.$imagem->image_intro_alt.'" />';
		}
		?>
		<!-- fim imagem -->
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
		<div>
			<?php echo ($item->metadesc) ? $item->metadesc : $item->introtext; ?>
		</div>



		<?php if (isset($item->link) && $item->readmore != 0 && $params->get('exibe_leia_mais')) :
		echo '<a class="readmore modelob pull-right" title="'.$item->title.'" href="'.$item->link.'">'.$params->get('readmoretext').'</a>';
		endif; ?>

</div>
	<?php
		
	}
	echo "</div>";
}
?>
