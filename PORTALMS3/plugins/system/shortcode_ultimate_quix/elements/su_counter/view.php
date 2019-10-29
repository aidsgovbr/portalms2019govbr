<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$border = '';
	$icon   = '';

	if (strpos($field['icon'], 'icon:') !== false) {
		$icon = $field['icon'];
	} elseif (strpos($field['icon'], 'fa fa-') !== false) {
		$icon = trim(str_replace('fa fa-', '', $field['icon']));
		$icon = 'icon: '. $icon;
	}

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$field['separator'] = ( $field['separator'] == 1 ) ? 'yes' : 'no' ;

	$padding = $field['padding'];

	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'counter count_start="'.$field['count_start'].'" count_end="'.$field['count_end'].'" counter_speed="'.$field['counter_speed'].'" separator="'.$field['separator'].'" prefix="'.$field['prefix'].'" suffix="'.$field['suffix'].'" align="'.$field['align'].'" icon="'.$icon.'" icon_color="'.$field['icon_color'].'" icon_size="'.$field['icon_size'].'" count_color="'.$field['count_color'].'" count_size="'.$field['count_size'].'" text_color="'.$field['text_color'].'" text_size="'.$field['text_size'].'" background="'.$field['background'].'" padding="'.$css_padding.'" border="'.$border.'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'counter]'); ?>
</div>
