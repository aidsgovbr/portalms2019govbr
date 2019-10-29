<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$icon_background    = ($field['icon_background']) ? $field['icon_background'] : 'transparent';

	$border = '';
	$icon   = '';

	if (strpos($field['icon'], 'icon:') !== false) {
		$icon = $field['icon'];
	} elseif (strpos($field['icon'], 'fa fa-') !== false) {
		$icon = trim(str_replace('fa fa-', '', $field['icon']));
		$icon = 'icon: '. $icon;
	} else {
		$icon = $field['icon'];
	}

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$field['connector'] = ( $field['connector'] == 1 ) ? 'yes' : 'no' ;
	$field['target']    = ( $field['target'] == 1 ) ? 'blank' : 'self' ;

	$padding     = $field['icon_padding'];
	
	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
	$content     = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'icon_list_item]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'icon_list_item title="'.$field['title'].'" title_color="'.$field['title_color'].'" title_size="'.$field['title_size'].'" icon="'.$icon.'" icon_color="'.$field['icon_color'].'" icon_background="'.$icon_background.'" icon_size="'.$field['icon_size'].'" icon_animation="'.$field['icon_animation'].'" icon_border="'.$border.'" icon_shadow="'.$field['icon_shadow'].'" icon_padding="'.$css_padding.'" icon_radius="'.$field['icon_radius'].'" icon_align="'.$field['icon_align'].'" icon_gap="'.$field['icon_gap'].'" color="'.$field['color'].'" connector="'.$field['connector'].'" target="'.$field['target'].'" url="'.$field['url'].'" linkto="'.$field['linkto'].'"]'.$content); ?>
</div>