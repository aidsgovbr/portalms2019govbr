<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="outstanding-header" style="width: 100%;">
	<h2 class="outstanding-title" style="text-align: left;">Redes e Programas</h2>
</div>

<ul class="thumbnails thumbnails-left no-margin-bottom">
	<?php foreach ($list as $i => $item) : ?>
		<li class="span6 marginb30 <?php echo (($i % 2) == 0 ) ? "spanleft0" : ""; ?>">
			<?php
			$link = $item->link;

			switch ($params->get('target', 3))
			{
				case 1:
					// Open in a new window
					echo '<a class="" href="'
					. $link
					. '" target="_blank" rel="'
					. $params->get('follow', 'nofollow')
					. '">'
					. htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8')
					. '</a>';
					break;

				case 2:
					// Open in a popup window
					echo "<a class=\"\" href=\"#\" onclick=\"window.open('" . $link . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\">" .
						htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
					break;

				default:
					// Open in parent window
					echo '<a class="preto" href="'
					. $link
					. '" rel="'
					. $params->get('follow', 'nofollow')
					. '">'
						. '<strong>'
							. htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8')
						. '</strong>'
					. '<br />'
							. nl2br($item->description)
					. '</a>';
					break;
			}
			if ($params->get('hits', 0))
			{
				echo '(' . $item->hits . ' ' . JText::_('MOD_WEBLINKS_HITS') . ')';
			}
			?>
		</li>
	<?php
	endforeach;
	?>
</ul>

<div class="outstanding-footer">
	<a href="<?php echo $params->get("url"); ?>" class="outstanding-link">
		<span class="text"><?php echo $params->get('maistexto') ?></span>
		<span class="icon-box">
			<i class="icon-angle-right icon-light"><span class="hide">&nbsp;</span></i>
		</span>
	</a>
</div>
