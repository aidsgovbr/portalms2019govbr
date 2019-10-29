<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$padding            = $field['padding'];
	
	$css_padding        = '';
	$css_padding        .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding        .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding        .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding        .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
	$margin             = $field['margin'];
	
	$css_margin         = '';
	$css_margin         .= ( isset( $margin['top'] ) AND $margin['top'] ) ? $margin['top'] . '' : '0';
	$css_margin         .= ( isset( $margin['right'] ) AND $margin['right'] ) ? ' ' . $margin['right'] . '' : ' 0';
	$css_margin         .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? ' ' . $margin['bottom'] . '' : ' 0';
	$css_margin         .= ( isset( $margin['left'] ) AND $margin['left'] ) ? ' ' . $margin['left'] . '' : ' 0';
	
	$content            = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'button]' : '' ;

	$icon = trim(str_replace('fa fa-', 'icon: ', $field['icon']));

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'button style="'.$field['style'].'" url="'.$field['url'].' target="'.$field['target'].'" color="'.$field['color'].'" background="'.$field['background'].'" background_hover="'.$field['background_hover'].'" size="'.$field['size'].'" wide="'.$field['wide'].'" center="'.$field['center'].'" radius="'.$field['radius'].'" icon="'.$icon.'" icon_color="'.$field['icon_color'].'" desc="'.$field['desc'].'" onclick="'.$field['onclick'].'" padding="'.$css_padding.'" margin="'.$css_margin.'"]'.$content); ?>
</div>