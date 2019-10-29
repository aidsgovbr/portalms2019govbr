<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_thumb_gallery extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }

    public static function thumb_gallery($atts = null, $content = null) {
      $atts = su_shortcode_atts(array(
            'style'          => 1,
            'source'         => '',
            'limit'          => 20,
            'width'          => 850,
            'height'         => 478,
            'quality'        => 90,
            'order'          => 'created',
            'order_by'       => 'desc',
            'caption'        => 'yes',
            'read_more'      => 'yes',
            'zoom_type'      => 'no', // no, lightbox, image_zoom
            'scroll_reveal'  => '',
            'class'          => ''
          ), $atts, 'thumb_gallery');
        
        $id         = uniqid('sutg');
        $slides     = (array) Su_Tools::get_slides($atts);
        $title      = ''; 
        $intro_text = '';
        $return     = array();
        $lightbox = ($atts['zoom_type'] == 'lightbox') ? 'su-thumb-gallery-lightbox' : '';
        $classes = array('su-thumb-gallery', 'su-thumb-gallery-style-'.$atts['style'], $lightbox, su_ecssc($atts));

        if ($atts['style'] === "2" or $atts['style'] === "3") {
            $thumb_width = $thumb_height = 68;
        }
        elseif ($atts['style'] === "4") {
            $thumb_width  = 80;
            $thumb_height = 50;
        }elseif ($atts['style'] === "5") {
            $thumb_width  = 125;
            $thumb_height = 90;
        }
        else {
            $thumb_width  = 80;
            $thumb_height = 60;
        }

        if (count($slides)) {

            $return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="'. su_acssc($classes) . '" data-pgid="' . $id . '">';

                $return[] = '<div id="' . $id . '_container" class="cbp su-thumb-gallery-container">';
                    $limit = 1;
                    foreach ($slides as $slide) {

                        // Title condition 
                        if($slide['title'])
                            $title = stripslashes($slide['title']);                

                        $category = su_title_class(@$slide['category']);
                        $item_link = JRoute::_($slide['link']);

                        if ($slide['image']) {
                            $image = su_image_resize($slide['image'], $atts['width'], $atts['height'], true, $atts['quality']);

                            $return[] = '<div class="cbp-item">';
                                $return[] = '<div class="su-tg-item">';
                                    if ($atts['caption'] === 'yes') {
                                        $return[] = '<div class="su-tg-caption">';
                                            $return[] = '<h3>'.$title.'</h3>';
                                            if (@$slide['introtext'] != null) {
                                                $return[] = '<p>'.su_strip_all_tags($slide['introtext']).'</p>';
                                            }
                                            if ($atts['read_more'] === 'yes') {
                                                $return[] = '<a href="'.$slide['link'].'" class="su-tg-dbtn"><i class="fa fa-chevron-right"></i></a>';
                                            }
                                        $return[] = '</div>';
                                    }

                                    if ($atts['zoom_type'] == 'image_zoom') {
                                        
                                        $return[] = su_do_shortcode('[image_zoom image="' . image_media($image['url']) . '" large_image="' . image_media($slide['image']) . '" type="standard" zoom_size="640,480"]');
                                    } else {
                                        if ($atts['zoom_type'] == 'lightbox') {                           
                                            $return[] = '<a href="' . image_media($slide['image']) . '" class="su-tg-lbi"><i class="fa fa-arrows-alt"></i></a>';
                                        }
                                        $return[] = '<img src="' . image_media($image['url']) . '" alt="' . esc_attr($slide['title']) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />';
                                        
                                    }



                                $return[] = '</div>';
                            $return[] = '</div>';
                        }
                        if ($limit++ == $atts['limit']) break;
                    } 
                    $return[] = '<div class="su-clear"></div>';
                $return[] = '</div>';


                $return[] = '<div class="su-pagination" id="' . $id . '_tg_slider">';
                    foreach ($slides as $slide) {
                        if ($slide['image']) {
                            $image = su_image_resize($slide['image'], $thumb_width, $thumb_height, true, $atts['quality']);

                            $return[] = '<div class="cbp-pagination-item">';
                                    $return[] = '<img src="' . image_media($image['url']) . '" alt="' . esc_attr($slide['title']) . '" />';
                            $return[] = '</div>';
                        }
                    }
                $return[] = '</div>';


            $return[] = '</div>';


            if ($atts['zoom_type'] == 'lightbox') {  
                suAsset::addFile('css', 'magnific-popup.css');
                suAsset::addFile('js', 'magnific-popup.js');
                suAsset::addFile('js', 'thumb-lightbox.js', __FUNCTION__);
            }
 
            suAsset::addFile('css', 'cubeportfolio.min.css');
            suAsset::addFile('css', 'thumb_gallery.css', __FUNCTION__);

            suAsset::addFile('js', 'cubeportfolio.min.js');
            suAsset::addFile('js', 'thumb-gallery.js', __FUNCTION__);
        }
        else {
            $return[] = su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_GALLERY_NOT_WORK'), 'warning');
        }
        return implode("\n", $return);
    }

}
