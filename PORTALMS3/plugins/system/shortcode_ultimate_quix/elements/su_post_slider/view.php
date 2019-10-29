<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$limit              = (isset($field['limit']) && $field['limit']) ? $field['limit'] : '5';
	$intro_text_limit   = (isset($field['intro_text_limit']) && $field['intro_text_limit']) ? $field['intro_text_limit'] : '200';
	$delay              = (isset($field['delay']) && $field['delay']) ? $field['delay'] : '4';
	$speed              = (isset($field['speed']) && $field['speed']) ? $field['speed'] : '0.35';
	
	$title              = ( $field['title'] == 1 ) ? 'yes' : 'no';
	$title_link         = ( $field['title_link'] == 1 ) ? 'yes' : 'no';
	$intro_text         = ( $field['intro_text'] == 1 ) ? 'yes' : 'no';
	$category           = ( $field['category'] == 1 ) ? 'yes' : 'no';
	$date               = ( $field['date'] == 1 ) ? 'yes' : 'no';
	$arrows             = ( $field['arrows'] == 1 ) ? 'yes' : 'no';
	$pagination         = ( $field['pagination'] == 1 ) ? 'yes' : 'no';
	$autoplay           = ( $field['autoplay'] == 1 ) ? 'yes' : 'no';
	$hoverpause         = ( $field['hoverpause'] == 1 ) ? 'yes' : 'no';
	$lazyload           = ( $field['lazyload'] == 1 ) ? 'yes' : 'no';
	$loop               = ( $field['loop'] == 1 ) ? 'yes' : 'no';
	
	$style              = $field['style'];
	$order              = $field['order'];
	$order_by           = $field['order_by'];
	
	$j_category         = rtrim(implode(',', $field['j_category']), ',');
	$k2_category        = rtrim(implode(',', $field['k2_category']), ',');


    if ( $field['source_type'] == 'category' ) {
        $source = 'category: '.$j_category;
    } elseif ( $field['source_type'] == 'k2-category' ) {
        $source = 'k2-category: '.$k2_category;
    }
    
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'post_slider style="'.$style.'" source="'.$source.'" limit="'.$limit.'" order="'.$order.'" order_by="'.$order_by.'" title="'.$title.'" title_link="'.$title_link.'" intro_text="'.$intro_text.'" intro_text_limit="'.$intro_text_limit.'" category="'.$category.'" date="'.$date.'" arrows="'.$arrows.'" pagination="'.$pagination.'" autoplay="'.$autoplay.'" hoverpause="'.$hoverpause.'" lazyload="'.$lazyload.'" loop="'.$loop.'" delay="'.$delay.'" speed="'.$speed.'"]'); ?>
</div>