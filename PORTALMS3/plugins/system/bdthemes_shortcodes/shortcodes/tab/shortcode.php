<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tab extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function tab($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_TITLE'),
            'disabled' => 'no',
            'icon'     => '',
            'anchor'   => '',
            'url'      => '',
            'target'   => '',
            'class'    => ''
            ), $atts, 'tab');


        if (strpos($atts['icon'], '/') !== false) {
            $atts['icon'] = '<img src="' . image_media($atts['icon']) . '" alt="" width="' . $atts['size'] . '" height="' . $atts['size'] . '" />';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $atts['icon'] = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $atts['icon'] = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
        }

        $x = Su_Shortcode_tabs::$tab_count;
        Su_Shortcode_tabs::$tabs[$x] = array(
            'icon'     => $atts['icon'],
            'title'    => $atts['title'],
            'content'  => has_child_shortcode($content, 't'),
            'disabled' => ( $atts['disabled'] === 'yes' ) ? ' su-tabs-disabled' : '',
            'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace(' ', '', trim(sanitize_text_field($atts['anchor']))) . '"' : '',
            'url'      => ($atts['url']) ? ' data-url="' . $atts['url'] . '"' : '',
            'target'   => ($atts['target']) ? ' data-target="' . $atts['target'] . '"' : '',
            'class'    => $atts['class']
        );
        Su_Shortcode_tabs::$tab_count++;
        
        if (@$_REQUEST["action"] == 'su_generator_preview' & $x == -1) {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_NOT_PREVIEW'), 'warning');
        }
    }
}
