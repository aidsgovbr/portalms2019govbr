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

<!-- <div class="span12 outstanding-header" style="width: 100%;">
	<h2 class="outstanding-title" style="text-align: left;">Secretarias</h2>
</div> -->
<ul class="thumbnails thumbnails-left no-margin-bottom <?php echo $moduleclass_sfx; ?>">
<?php
$coluna = array_chunk($list, 3);
foreach ($coluna as $key => $lista) {
	foreach ($lista as $i => $item) { ?>
		<li class="span4 <?php echo ($i == 0) ? "spanleft0" : ""; ?>">
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
					echo '<a class="" href="'
					. $link
					. '" rel="'
					. $params->get('follow', 'nofollow')
					. '">'
					. '<div class="secretarias-thumb">'
						. '<div class="secretarias">'
							. nl2br($item->description)
						. '</div>'
						. '<h3>'
							. htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8')
						. '</h3>'
					. '</div>'
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
	}
}
?>
</ul>