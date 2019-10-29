<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$ffborder           = '';

	if( $field['ffborder'] == 1 ){
		$ffborder .= ($field['ffborder_width']) ? $field['ffborder_width'] : '';
		$ffborder .= ($field['ffborder_style']) ? ' '.$field['ffborder_style'] : '';
		$ffborder .= ($field['ffborder_color']) ? ' '.$field['ffborder_color'] : '';
	}

	$border = '';

	if( $field['border'] == 1 ){
		$border .= ($field['border_width']) ? $field['border_width'] : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$ffpadding = $field['ffpadding'];

	$css_ffpadding = '';
	$css_ffpadding .= ( isset( $ffpadding['top'] ) AND $ffpadding['top'] ) ? $ffpadding['top'] . '' : '0';
	$css_ffpadding .= ( isset( $ffpadding['right'] ) AND $ffpadding['right'] ) ? ' ' . $ffpadding['right'] . '' : ' 0';
	$css_ffpadding .= ( isset( $ffpadding['bottom'] ) AND $ffpadding['bottom'] ) ? ' ' . $ffpadding['bottom'] . '' : ' 0';
	$css_ffpadding .= ( isset( $ffpadding['left'] ) AND $ffpadding['left'] ) ? ' ' . $ffpadding['left'] . '' : ' 0';
	
	$padding = $field['padding'];

	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'flip_box animation_style="'.$field['animation_style'].'"]['.$prefix.'flip_front background="'.$field['ffbackground'].'" color="'.$field['ffcolor'].'" border="'.$ffborder.'" shadow="'.$field['ffshadow'].'" text_align="'.$field['fftext_align'].'" padding="'.$css_ffpadding.'" radius="'.$field['ffradius'].'"]'.su_clean_shortcodes($field['ffcontent']).'[/'.$prefix.'flip_front]
	'.$prefix.'[flip_back background="'.$field['background'].'" color="'.$field['color'].'" border="'.$border.'" shadow="'.$field['shadow'].'" text_align="'.$field['text_align'].'" padding="'.$css_padding.'" radius="'.$field['radius'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'flip_back][/'.$prefix.'flip_box]'); ?>
</div>
