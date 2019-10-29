<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$field['pagination']  = ( $field['pagination'] == 1 ) ? 'yes' : 'no' ;
	$field['arrows']      = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']    = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
	$field['center_zoom'] = ( $field['center_zoom'] == 1 ) ? 'yes' : 'no' ;
	$field['hoverpause']  = ( $field['hoverpause'] == 1 ) ? 'yes' : 'no' ;
	$field['lazyload']    = ( $field['lazyload'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']        = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;

	$border = '';

	if( $field['border'] == 1 ){
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$padding = $field['padding'];

	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';

?>

<?php $custom_carousel_return = array(); ?>

<?php $custom_carousel_return[] = '['.$prefix.'custom_carousel style="'.$field['style'].'" margin="'.$field['margin'].'" padding="'.$css_padding.'" border="'.$border.'" background="'.$field['background'].'" color="'.$field['color'].'" pagination="'.$field['pagination'].'" arrows="'.$field['arrows'].'" autoplay="'.$field['autoplay'].'" center_zoom="'.$field['center_zoom'].'" hoverpause="'.$field['hoverpause'].'" lazyload="'.$field['lazyload'].'" loop="'.$field['loop'].'" speed="'.$field['speed'].'" delay="'.$field['delay'].'" small="'.$field['small'].'" medium="'.$field['medium'].'" large="'.$field['large'].'"]'; ?>

<?php foreach($field['carousel_item'] as $key => $item): ?>
	<?php $custom_carousel_return[] = '['.$prefix.'carousel_item]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'carousel_item]'; ?>
<?php endforeach; ?>


<?php $custom_carousel_return[] = '[/'.$prefix.'custom_carousel]'; ?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode(implode("\n", $custom_carousel_return)); ?>
</div>