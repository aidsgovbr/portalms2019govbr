<?php
/**
 * @package		
 * @subpackage	
 * @copyright	
 * @license		
 */

// no direct access
defined('_JEXEC') or die;
?>
<div id="portal-breadcrumbs" class="<?php echo $moduleclass_sfx; ?>">
<?php if ($params->get('showHere', 1))
	{
		echo '<span id="breadcrumbs-you-are-here" class="showHere">' .JText::_('MOD_BREADCRUMBS_HERE').'</span>';
	}

	// Get rid of duplicated entries on trail including home page when using multilanguage
	for ($i = 0; $i < $count; $i ++)
	{
		if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i-1]->link) && $list[$i]->link == $list[$i-1]->link)
		{
			unset($list[$i]);
		}
	}

	// Find last and penultimate items in breadcrumbs list
	end($list);
	$last_item_key = key($list);
	prev($list);
	$penult_item_key = key($list);

	//echo '<a href="index.php" class="pathway" title="Pagina Inicial"><span class="rastro-inicial"></span></a>';
	//echo '<span class="rastro-separador"></span>';

	// Generate the trail
	foreach ($list as $key=>$item) :
	// Make a link if not the last item in the breadcrumbs
	$show_last = $params->get('showLast', 1);
	
	if ($show_last && $key == 0){
		echo '<span id="breadcrumbs-home" ><a href="' . $item->link . '"  class="pathway" title="'.$item->name.'">'.$item->name . '</a></span> <span class="separator breadcrumbSeparator">'.$separator.'</span>';
	}else if ($key != $last_item_key){
		// Render all but last item - along with separator
		if (!empty($item->link))
		{
			echo '<span id="breadcrumbs-'.$key.'"> <a href="' . $item->link . '"  class="pathway" title="'.$item->name.'">' . $item->name . '</a></span>';
		}
		else
		{
			echo '<span>' . $item->name . '</span>';
		}

		if (($key != $penult_item_key) || $show_last)
		{
			echo ' <span class="separator breadcrumbSeparator">'.$separator.'</span> ';
			echo ' <span class="rastro-separador"></span> ';
		}

	}
	elseif ($show_last && $key > 0)
	{
		// Render last item if reqd.
		echo '<span id="breadcrumbs-current">' . $item->name . '</span>';
	}else
	{
		//echo '<a href="' . $item->link . '" class="pathway">' . $item->name . '</a>';
	}
	endforeach; ?>
</div>
