<?php
  // Prepare compatibility mode prefix
  $prefix              = su_cmpt();
  $field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
  $classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
  
  $field['arrows']     = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
  $field['pagination'] = ( $field['pagination'] == 1 ) ? 'yes' : 'no' ;
  $field['autoplay']   = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
  $field['autoheight'] = ( $field['autoheight'] == 1 ) ? 'yes' : 'no' ;
  $field['hoverpause'] = ( $field['hoverpause'] == 1 ) ? 'yes' : 'no' ;
  $field['lazyload']   = ( $field['lazyload'] == 1 ) ? 'yes' : 'no' ;
  $field['loop']       = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
?>

<?php $content_slider_return = array(); ?>
<?php $content_slider_return[] = '['.$prefix.'content_slider style="'.$field['style'].'" transitionin="'.$field['transitionin'].'" transitionout="'.$field['transitionout'].'" margin="'.$field['margin'].'" arrows="'.$field['arrows'].'" arrow_position="'.$field['arrow_position'].'" pagination="'.$field['pagination'].'" autoplay="'.$field['autoplay'].'" autoheight="'.$field['autoheight'].'" hoverpause="'.$field['hoverpause'].'" lazyload="'.$field['lazyload'].'" loop="'.$field['loop'].'" speed="'.$field['speed'].'" delay="'.$field['delay'].'"]'; ?>

<?php foreach ($field['content_slide'] as $key => $item): ?>
	<?php $content_slider_return[] = '['.$prefix.'content_slide]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'content_slide]'; ?>
<?php endforeach ?>

<?php $content_slider_return[] = '[/'.$prefix.'content_slider]'; ?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode(implode("\n", $content_slider_return)); ?>
</div>
