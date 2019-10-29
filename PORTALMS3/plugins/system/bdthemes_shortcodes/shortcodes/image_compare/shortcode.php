<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_image_compare extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function image_compare($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'before_image'  => '',
            'after_image'   => '',
            'orientation'   => '',
            'slide_on'      => 'click',
            'before_text'   => 'Original',
            'after_text'    => 'Modified',
            'width'         => '640',
            'height'        => '380',
            'border'        => 'yes',
            'arrows'        => 'yes',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'image_compare');

        // Unique Id 
        $id = uniqid("suic");
        $border = '';
        $arrows = '';
        

        if (image_media($atts['before_image']) && image_media($atts['after_image'])) {

            $border = ($atts['border'] !== "yes") ? ' data-split-border="false"': '';
            $arrows = ($atts['arrows'] !== "yes") ? ' data-arrows="false"': '';
            $slide_on = ($atts['slide_on'] == 'click') ? ' data-slide-on="click"': 'data-slide-on="hover"';

            $orientation = ($atts['orientation']) ? ' data-direction="'.$atts['orientation'].'"': '';

            $css[] = '#'.$id.' .twentytwenty-before-label:before {content: "'. $atts['before_text'] .'"}';
            $css[] = '#'.$id.' .twentytwenty-after-label:before {content: "'. $atts['after_text'] .'"}';


            // OUtput Structure in  here
            $return = '
            <div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-image-compare '.su_ecssc($atts).'"
                '.$orientation.$border.$arrows.$slide_on.'
                data-width="'.$atts['width'].'"
                data-height="'.$atts['height'].'"
                >
                <div class="image-after" style="background-image: url('.image_media($atts['after_image']).') !important" data-alt="'.$atts['after_text'].'"></div>
                <div class="image-before" style="background-image: url('.image_media($atts['before_image']).') !important" data-alt="'.$atts['before_text'].'"></div>
            </div>';



            suAsset::addString('css', implode("\n", $css));

            // Css Adding in Head
            suAsset::addFile('css', 'image_compare.css', __FUNCTION__);

            // JavaScipt additon in Head
            suAsset::addFile('js', 'beforeafter.js', __FUNCTION__);

        } 
        else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_COMPARE_INF'), 'warning');
        }

        return $return;
    }
}
