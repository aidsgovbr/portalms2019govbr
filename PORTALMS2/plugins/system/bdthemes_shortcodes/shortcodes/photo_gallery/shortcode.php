<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_photo_gallery extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }

    public static function photo_gallery($atts = null, $content = null) {
      $atts = su_shortcode_atts(array(
            'style'          => 1,
            'source'         => '',
            'limit'          => 20,
            'width'          => 320,
            'height'         => 240,
            'thumb_resize'   => 'yes',
            'large'          => 4,
            'medium'         => 3,
            'small'          => 1,
            'horizontal_gap' => 10,
            'vertical_gap'   => 10,
            'quality'        => 95,
            'effect'         => '',
            'order'          => 'created',
            'order_by'       => 'desc',
            'scroll_reveal'  => '',
            'class'          => ''
        ), $atts, 'photo_gallery');
        
        $id                 = uniqid('supg');
        $return             = array();
        $slides             = (array) Su_Tools::get_slides($atts);
        $lightbox_effect    = ($atts['effect']) ? 'data-mfp-effect="' . $atts['effect'] . '"' : '';
        $thumb_resize_check = ($atts['thumb_resize'] === 'yes') ? true : false;

        if (count($slides)) {

            $return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-photo-gallery su-photo-gallery-style-'.$atts['style'].'' . su_ecssc($atts) . '" 
                data-pgid="' . $id . '" data-large="'.$atts['large'].'" data-medium="'.$atts['medium'].'" data-small="'.$atts['small'].'"
                data-horizontal_gap="'.intval($atts['horizontal_gap']).'" data-vertical_gap="'.intval($atts['vertical_gap']).'" >';

                $return[] = '<div id="' . $id . '_container" class="cbp-l-grid-gallery">';
                    $limit = 1;
                    foreach ($slides as $slide) {

                        if ($slide['image']) {
                            $image = su_image_resize($slide['image'], $atts['width'], $atts['height'], $thumb_resize_check, $atts['quality']);

                            $return[] = '<div class="su-photo-gallery-slide cbp-item">';
                                $return[] = '<div class="su-pg-item">';
                                    if ($slide['link']) {
                                        $return[] = '<div class="su-photo-gallery-links">
                                        <a class="su-lightbox-item" '.$lightbox_effect.' href="'. image_media($slide['image']) .'" title="'. strip_tags($slide['title']).'"><i class="fa fa-search"></i></a>
                                        </div>';
                                    }
                                    $return[] = '<img src="' . image_media($image['url']) . '" alt="' . esc_attr($slide['title']) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />';
                                $return[] = '</div>';
                            $return[] = '</div>';
                        }
                        if ($limit++ == $atts['limit']) break;
                    } 
                    $return[] = '<div class="su-clear"></div>';
                $return[] = '</div>';
            $return[] = '</div>';

          	suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js'); 

            suAsset::addFile('css', 'cubeportfolio.min.css');
            suAsset::addFile('js', 'cubeportfolio.min.js');

            suAsset::addFile('css', 'photo_gallery.css', __FUNCTION__);
            suAsset::addFile('js', 'photo_gallery.js', __FUNCTION__);
        }
        else {
            $return[] = su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_GALLERY_NOT_WORK'), 'warning');
        }

        return implode("\n", $return);
    }

}
