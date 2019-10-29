<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['vertical']  = ( $field['vertical'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php 
		$accordion_return   = array();
		$accordion_return[] = '['.$prefix.'accordion]';
		foreach($field['items'] as $key => $item):

			$item['open']   = ( $item['open'] == 1 ) ? 'yes' : 'no' ;

			$accordion_return[] = '['.$prefix.'spoiler style="'.$item['style'].'" icon="'.$item['icon'].'" align="'.$item['align'].'" title="'.$item['title'].'" open="'.$item['open'].'" anchor="'.$item['anchor'].'"]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'spoiler]';
		endforeach;
		$accordion_return[] = '[/'.$prefix.'accordion]';
		echo su_do_shortcode(implode("\n", $accordion_return));
	?>
</div>