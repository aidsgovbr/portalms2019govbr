<?php
/*
 * @package		Accordion Plant Light
 * @author		http://www.j-plant.com
 * @copyright	Copyright (C) 2010 J-Plant. All rights reserved.
 * @license		GNU/GPL v. 3.0
 *
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
defined('_JEXEC') or die('Restricted access');

$nameClass = !empty($params['name']) ? ' jp-' . $params['name'] : '';
$cssClass = !empty($params['cssClass']) ? ' ' . $params['cssClass'] : '';
$width = isset($params['width']) ? $params['width'] : 'auto';
$width = JPlantCSSHelper::getSizeValue($width);
?>

<ul class="jp-accordion ui-accordion ui-widget ui-helper-reset ui-accordion-icons<?php echo $nameClass . $cssClass; ?>" id="<?php echo $id; ?>" style="width:<?php echo $width; ?>">
	<?php
		foreach ($items as $item):
			$itemActive = !empty($item['active']);
	?>
	<li class="jp-accordion-item">
		<h3 class="ui-accordion-header ui-helper-reset <?php if ($itemActive):?>ui-state-active ui-corner-top<?php else: ?>ui-state-default ui-corner-all<?php endif; ?>"><a href="#"><?php echo $item['title']; ?></a></h3>
    	<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom<?php if ($itemActive):?> ui-accordion-content-active<?php endif; ?>"><?php echo $item['text']; ?></div>
	</li>
	<?php
		endforeach;
	?>
</ul>