<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel_slide extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

  
    public static function panel_slide($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'image'      => 'plugins/system/bdthemes_shortcodes/images/no-image.jpg',
            'title'      => 'Panel Slide Title',
            'url'        => '#',
            'link_title' => 'Order Now',
            'target'     => '_blank',
            'background' => '#4fc1e9',
            'class'      => ''
                ), $atts, 'panel_slide');
        
        $id         = uniqid('sups_');
        $classes    = ['su-panel-slide', 'swiper-slide', 'uk-transition-toggle', su_ecssc($atts)];
        $css        = [];
        $output     = [];

        $background = ($atts['background']) ? 'background:' . $atts['background'] . ';' : '';

        if ($background) 
            $css[] = '#'.$id.' .su-panel-slide {'.$background.'}';

        if ($atts['image'] != '') {
            $multi_image = array();
            $multi_image = explode(',',$atts['image'], 2);
            $slide_image = '<img src="' . image_media($multi_image[0]) . '" alt="'.$atts['title'].'" />';

           if(isset($multi_image[1]) )
            $slide_image .= '<img src="' . image_media($multi_image[1]) . '" alt="'.$atts['title'].'"  />';
        }
        
        $output[] = '<div id="'.$id.'" class="'.su_acssc($classes).'" style="'.$background.'">';
            $output[] = '<div class="su-pnls-thumb">';
                $output[] = $slide_image;
            $output[] = '</div>';
            
            $output[] = '<div class="su-pnls-desc">';

                if ( $atts['url'] != '' ) {
                    $output[] = '<a href="'.$atts['url'].'" target="'.$atts['target'].'" class="su-link">'.$atts['link_title'].' <i class="fa fa-arrow-right"></i></a>';
                }
                if ( $atts['title'] != '' ) {
                    $output[] = '<h2 class="su-slide-title">'.$atts['title'].'</h2>';
                }

                if ( $content != '' ) {                 
                    $output[] = '<div>'.su_do_shortcode($content).'</div>';
                }

            $output[] = '</div>';

        $output[] = '</div>';


        suAsset::addString('css', implode("\n", $css));

        return implode("\n", $output);
    }
}
