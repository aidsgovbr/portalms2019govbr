<?php
  // Prepare compatibility mode prefix
  $prefix                = su_cmpt();
  
  $field['pl_animation'] = ( isset( $field['pl_animation'] ) ) ? $field['pl_animation'] : '';
  $classes               = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['pl_animation']}" => $field['pl_animation']]);
  
  $style_color           = (isset($field['style_color']) && $field['style_color']) ? $field['style_color'] : '#4FC1E9';
  $active                = (isset($field['active']) && $field['active']) ? $field['active'] : '1';
  $speed                 = (isset($field['speed']) && $field['speed']) ? $field['speed'] : '800';
  
  $vertical              = ( $field['vertical'] == 1 ) ? 'yes' : 'no';
  $deeplink              = ( $field['deeplink'] == 1 ) ? 'yes' : 'no';
  
  $style                 = $field['style'];
  $animation             = $field['animation'];
  $align                 = $field['align'];
  $position              = $field['position'];
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <?php 
    $tabs_return = array();
    $tabs_return[] = '['.$prefix.'super_tabs style="'.$style.'" style_color="'.$style_color.'" animation="'.$animation.'" active="'.$active.'" align="'.$align.'" vertical="'.$vertical.'" position="'.$position.'" speed="'.$speed.'" deeplink="'.$deeplink.'" ]';

    foreach($field['tab'] as $key => $item):

      $title = (isset($item['title']) && $item['title']) ? $item['title'] : 'Default';
      $icon  = (isset($item['icon']) && $item['icon']) ? trim(str_replace('fa fa-', '', 'icon:'.$item['icon'])) : '';

      $tabs_return[] = '['.$prefix.'super_tab title="'.$item['title'].'" icon="'.$icon.'"]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'super_tab]';

    endforeach;

    $tabs_return[] = '[/'.$prefix.'super_tabs]';
    echo su_do_shortcode(implode("\n", $tabs_return));
  ?>
</div>
