<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_box extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function box($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'       => 'default',
            'title'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_TITLE_DEFAULT'),
            'title_color' => '#FFFFFF',
            'box_color'   => '#333333',
            'color'       => null, 
            'radius'      => '',
            'scroll_reveal' => '',
            'class'       => ''
        ), $atts, 'box');

        // Initioal Variables
        $id = uniqid('su_box_');
        $radius ='';
        $css = array();


        // Color Manage
        if ($atts['color'] !== null)
            $atts['box_color'] = $atts['color'];

        // Radius Manage
        if ($atts['radius']) {
            $radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;' : '';
        }

        // Get Css in $css variable
        $css[] = '#'.$id.'{'.$radius.'border-color:' . $atts['box_color']. ';} #'.$id.' .su-box-title { background-color:' . $atts['box_color'] . ';color:' . $atts['title_color'] . ';}';

        
        // Add CSS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'box.css', __FUNCTION__);

        // Output HTML
        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-box su-box-style-' . $atts['style'] . su_ecssc($atts) . '">
                    <div class="su-box-title">'. su_scattr($atts['title']) . '
                    </div>
                    <div class="su-box-content su-clearfix">' . has_child_shortcode($content, 'b').'</div>
                </div>';
        return $return;
    }

}
