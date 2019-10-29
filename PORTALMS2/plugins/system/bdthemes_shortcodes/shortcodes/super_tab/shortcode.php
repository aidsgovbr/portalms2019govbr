<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_super_tab extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function super_tab($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_TITLE'),
            'icon'  => '',
            'class' => ''
            ), $atts, 'super_tab');

        if (strpos($atts['icon'], '/') !== false) {
            $atts['icon'] = '<img src="' . image_media($atts['icon']) . '" alt="" /> ';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $atts['icon'] = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i> ';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $atts['icon'] = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i> ';
        }

        $output[] = '<div id="'.strtolower(su_title_class($atts['title'])).'" class="su-super-tabs-panes">';
        $output[] = '<div class="rt01pagitem"><span>' . su_scattr($atts['icon']) . su_scattr($atts['title']) .'</span></div>';
        $output[] = '<div class="su-super-tabs-pane' . su_ecssc($atts) . '">' . has_child_shortcode($content, 's') . '</div>';
        $output[] = '</div>';

        return implode("\n", $output);
        
        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_NOT_PREVIEW'), 'warning');
        }
    }
}
