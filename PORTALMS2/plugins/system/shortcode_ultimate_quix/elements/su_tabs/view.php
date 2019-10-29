<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['vertical']  = ( $field['vertical'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php 
		$tabs_return = array();
		$tabs_return[] = '['.$prefix.'tabs style="'.$field['style'].'" active="'.$field['active'].'" align="'.$field['align'].'" vertical="'.$field['vertical'].'"]';
		foreach($field['tab'] as $key => $item):

			$icon = '';
			if (strpos($item['icon'], 'icon:') !== false) {
				$icon = $item['icon'];
			} elseif (strpos($item['icon'], 'fa fa-') !== false) {
				$icon = trim(str_replace('fa fa-', '', $item['icon']));
				$icon = 'icon: '. $icon;
			}

			$tabs_return[] = '['.$prefix.'tab title="'.$item['title'].'" icon="'.$icon.'"]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'tab]';
		endforeach;
		$tabs_return[] = '[/'.$prefix.'tabs]';
		echo su_do_shortcode(implode("\n", $tabs_return));
	?>
</div>