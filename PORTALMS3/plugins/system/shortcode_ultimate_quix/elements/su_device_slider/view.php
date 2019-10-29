<?php
	// Prepare compatibility mode prefix
	$prefix              = su_cmpt();
	$field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['lightbox']   = ( $field['lightbox'] == 1 ) ? 'yes' : 'no' ;
	$field['arrows']     = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
	$field['pagination'] = ( $field['pagination'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']   = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
	$field['autoheight'] = ( $field['autoheight'] == 1 ) ? 'yes' : 'no' ;
	$field['hoverpause'] = ( $field['hoverpause'] == 1 ) ? 'yes' : 'no' ;
	$field['lazyload']   = ( $field['lazyload'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']       = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
	
	$source              = (isset($field['source'])) ? $field['source'] : '';
	$j_category          = rtrim(implode(',', $field['j_category']), ',');
	$k2_category         = rtrim(implode(',', $field['k2_category']), ',');

	if (!isset($field['source'])) {
		if ( $field['source_type'] == 'category' ) {
		  $source = 'category: '.$j_category;
		}
		elseif ( $field['source_type'] == 'k2-category' ) {
		  $source = 'k2-category: '.$k2_category;
		}
		elseif ( $field['source_type'] == 'directory' ) {
		  $source = 'directory: '.$field['dir_path'];
		}
		elseif ( $field['source_type'] == 'media' ) {
		  $source = 'media: '.$field['med_library'];
		}
	}

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'device_slider source="'.$source.'" limit="'.$field['limit'].'" device="'.$field['device'].'" lightbox="'.$field['lightbox'].'" arrows="'.$field['arrows'].'" pagination="'.$field['pagination'].'" autoplay="'.$field['autoplay'].'" autoheight="'.$field['autoheight'].'" hoverpause="'.$field['hoverpause'].'" lazyload="'.$field['lazyload'].'" loop="'.$field['loop'].'" speed="'.$field['speed'].'" delay="'.$field['delay'].'"]'); ?>
</div>