<?php
  // Prepare compatibility mode prefix
  $prefix                = su_cmpt();
  $field['animation']    = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
  $classes               = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
  
  $field['image']        = ( $field['image'] == 1 ) ? 'yes' : 'no' ;
  $field['thumb_resize'] = ( $field['thumb_resize'] == 1 ) ? 'yes' : 'no' ;
  $field['title']        = ( $field['title'] == 1 ) ? 'yes' : 'no' ;
  $field['title_link']   = ( $field['title_link'] == 1 ) ? 'yes' : 'no' ;
  $field['intro_text']   = ( $field['intro_text'] == 1 ) ? 'yes' : 'no' ;
  $field['category']     = ( $field['category'] == 1 ) ? 'yes' : 'no' ;
  $field['date']         = ( $field['date'] == 1 ) ? 'yes' : 'no' ;
  $field['arrows']       = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
  $field['pagination']   = ( $field['pagination'] == 1 ) ? 'yes' : 'no' ;
  $field['autoplay']     = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
  $field['hoverpause']   = ( $field['hoverpause'] == 1 ) ? 'yes' : 'no' ;
  $field['lazyload']     = ( $field['lazyload'] == 1 ) ? 'yes' : 'no' ;
  $field['loop']         = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
  
  $source                = (isset($field['source'])) ? $field['source'] : '';
  $j_category            = rtrim(implode(',', $field['j_category']), ',');
  $k2_category           = rtrim(implode(',', $field['k2_category']), ',');

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
  }
?>



<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
    <?php echo su_do_shortcode('['.$prefix.'carousel style="'.$field['style'].'" source="'.$source.'" limit="'.$field['limit'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" items="'.$field['items'].'" medium="'.$field['medium'].'" small="'.$field['small'].'" image="'.$field['image'].'" image_height="'.$field['image_height'].'" image_width="'.$field['image_width'].'" thumb_resize="'.$field['thumb_resize'].'" title="'.$field['title'].'" title_link="'.$field['title_link'].'" title_limit="'.$field['title_limit'].'" intro_text="'.$field['intro_text'].'" intro_text_limit="'.$field['intro_text_limit'].'" category="'.$field['category'].'" date="'.$field['date'].'" color="'.$field['color'].'" background="'.$field['background'].'" title_color="'.$field['title_color'].'" margin="'.$field['margin'].'" arrows="'.$field['arrows'].'" arrow_position="'.$field['arrow_position'].'" pagination="'.$field['pagination'].'" autoplay="'.$field['autoplay'].'" hoverpause="'.$field['hoverpause'].'" lazyload="'.$field['lazyload'].'" loop="'.$field['loop'].'" delay="'.$field['delay'].'" speed="'.$field['speed'].'"]');
    ?>
</div>