<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$icon = '';
	if (strpos($field['icon'], 'icon:') !== false) {
		$icon = $field['icon'];
	} elseif (strpos($field['icon'], 'fa fa-') !== false) {
		$icon = trim(str_replace('fa fa-', '', $field['icon']));
		$icon = 'icon: '. $icon;
	}

	$field['show_title']          = ( $field['show_title'] == 1 ) ? 'yes' : 'no' ;
	$field['show_count']          = ( $field['show_count'] == 1 ) ? 'yes' : 'no' ;
	$field['show_like_count']     = ( $field['show_like_count'] == 1 ) ? 'yes' : 'no' ;
	$field['show_download_count'] = ( $field['show_download_count'] == 1 ) ? 'yes' : 'no' ;
	$field['show_file_size']      = ( $field['show_file_size'] == 1 ) ? 'yes' : 'no' ;
	$field['resumable']           = ( $field['resumable'] == 1 ) ? 'yes' : 'no' ;

	$padding     = $field['padding'];
	
	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
	$margin      = $field['margin'];
	
	$css_margin  = '';
	$css_margin  .= ( isset( $margin['top'] ) AND $margin['top'] ) ? $margin['top'] . '' : '0';
	$css_margin  .= ( isset( $margin['right'] ) AND $margin['right'] ) ? ' ' . $margin['right'] . '' : ' 0';
	$css_margin  .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? ' ' . $margin['bottom'] . '' : ' 0';
	$css_margin  .= ( isset( $margin['left'] ) AND $margin['left'] ) ? ' ' . $margin['left'] . '' : ' 0';
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'file_download id="'.$field['id'].'" url="'.$field['url'].'" show_title="'.$field['show_title'].'" custom_title="'.$field['custom_title'].'" save_as="'.$field['save_as'].'" color="'.$field['color'].'" background="'.$field['background'].'" radius="'.$field['radius'].'" padding="'.$css_padding.'" margin="'.$css_margin.'" icon="'.$icon.'" show_count="'.$field['show_count'].'" show_like_count="'.$field['show_like_count'].'" show_download_count="'.$field['show_download_count'].'" show_file_size="'.$field['show_file_size'].'" resumable="'.$field['resumable'].'" download_speed="'.$field['download_speed'].'" button_text="'.$field['button_text'].'" button_color="'.$field['button_color'].'" button_hover_color="'.$field['button_hover_color'].'" button_background="'.$field['button_background'].'" button_hover_background="'.$field['button_hover_background'].'"  button_class="'.$field['button_class'].'"]'); ?>
</div>
