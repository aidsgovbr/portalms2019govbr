<?php
    // Prepare compatibility mode prefix
    $prefix                  = su_cmpt();
    
    $field['animation']      = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
    $classes                 = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
    
    $field['image']          = ( $field['image'] == 1 ) ? 'yes' : 'no' ;
    $field['highlight_year'] = ( $field['highlight_year'] == 1 ) ? 'yes' : 'no' ;
    $field['read_more']      = ( $field['read_more'] == 1 ) ? 'yes' : 'no' ;
    $field['intro_text']     = ( $field['intro_text'] == 1 ) ? 'yes' : 'no' ;
    $field['date']           = ( $field['date'] == 1 ) ? 'yes' : 'no' ;
    $field['time']           = ( $field['time'] == 1 ) ? 'yes' : 'no' ;
    $field['title']          = ( $field['title'] == 1 ) ? 'yes' : 'no' ;
    $field['link_title']     = ( $field['link_title'] == 1 ) ? 'yes' : 'no' ;
    
    $source                  = (isset($field['source'])) ? $field['source'] : '';
    $j_category              = rtrim(implode(',', $field['j_category']), ',');
    $k2_category             = rtrim(implode(',', $field['k2_category']), ',');

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
  <?php echo su_do_shortcode('['.$prefix.'timeline source="'.$source.'" limit="'.$field['limit'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" image="'.$field['image'].'" highlight_year="'.$field['highlight_year'].'" read_more="'.$field['read_more'].'" intro_text="'.$field['intro_text'].'" date="'.$field['date'].'" time="'.$field['time'].'" title="'.$field['title'].'" link_title="'.$field['link_title'].'" before_text="'.$field['before_text'].'" after_text="'.$field['after_text'].'"]'); ?>
</div>