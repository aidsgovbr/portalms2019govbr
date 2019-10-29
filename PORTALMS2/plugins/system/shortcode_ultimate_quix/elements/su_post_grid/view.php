<?php
    // Prepare compatibility mode prefix
    $prefix                         = su_cmpt();
    
    $field['animation']             = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
    $classes                        = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
    
    $field['show_more']             = ( $field['show_more'] == 1 ) ? 'yes' : 'no' ;
    $field['show_search']           = ( $field['show_search'] == 1 ) ? 'yes' : 'no' ;
    $field['filter']                = ( $field['filter'] == 1 ) ? 'yes' : 'no' ;
    $field['filter_deeplink']       = ( $field['filter_deeplink'] == 1 ) ? 'yes' : 'no' ;
    $field['filter_counter']        = ( $field['filter_counter'] == 1 ) ? 'yes' : 'no' ;
    $field['category']              = ( $field['category'] == 1 ) ? 'yes' : 'no' ;
    $field['date']                  = ( $field['date'] == 1 ) ? 'yes' : 'no' ;
    $field['include_article_image'] = ( $field['include_article_image'] == 1 ) ? 'yes' : 'no' ;
    $field['show_thumb']            = ( $field['show_thumb'] == 1 ) ? 'yes' : 'no' ;
    
    $source                         = (isset($field['source'])) ? $field['source'] : '';
    $j_category                     = rtrim(implode(',', $field['j_category']), ',');
    $k2_category                    = rtrim(implode(',', $field['k2_category']), ',');

    if (!isset($field['source'])) {
        if ( $field['source_type'] == 'category' ) {
            $source = 'category: '.$j_category;
        }
        elseif ( $field['source_type'] == 'k2-category' ) {
            $source = 'k2-category: '.$k2_category;
        }
    }
  
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'post_grid source="'.$source.'" layout="'.$field['layout'].'" limit="'.$field['limit'].'" show_more="'.$field['show_more'].'" show_more_item="'.$field['show_more_item'].'" show_more_action="'.$field['show_more_action'].'" show_search="'.$field['show_search'].'" intro_text_limit="'.$field['intro_text_limit'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" loading_animation="'.$field['loading_animation'].'" filter_animation="'.$field['filter_animation'].'" caption_style="'.$field['caption_style'].'" horizontal_gap="'.$field['horizontal_gap'].'" vertical_gap="'.$field['vertical_gap'].'" filter="'.$field['filter'].'" filter_style="'.$field['filter_style'].'" filter_align="'.$field['filter_align'].'" filter_deeplink="'.$field['filter_deeplink'].'" filter_counter="'.$field['filter_counter'].'" category="'.$field['category'].'" date="'.$field['date'].'" include_article_image="'.$field['include_article_image'].'" show_thumb="'.$field['show_thumb'].'" thumb_width="'.$field['thumb_width'].'" thumb_height="'.$field['thumb_height'].'" small="'.$field['small'].'" medium="'.$field['medium'].'" large="'.$field['large'].'"]'); ?>
</div>