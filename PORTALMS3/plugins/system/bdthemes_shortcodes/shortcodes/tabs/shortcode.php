<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tabs extends Su_Shortcodes {

    static $tabs = array();
    static $tab_count = -1;

    function __construct() {
        parent::__construct();
    }   

    public static function tabs($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'active'        => 1,
            'vertical'      => 'no',
            'align'         => 'left',
            'style'         => 'default',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'tabs');

        if(self::$tab_count = -1){
            self::$tab_count = 0;
        }

        su_do_shortcode($content);
        $return = '';
        $tabs = $panes = array();
        if ( is_array( self::$tabs ) ) {
            if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
            foreach ( self::$tabs as $tab ) {
                $tabs[] = '<span class="' . su_ecssc($tab) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'].'>' . su_scattr($tab['icon']) . su_scattr($tab['title']) . '</span>';
                $panes[] = '<div class="su-tabs-pane su-clearfix' . su_ecssc($tab) . '">' . $tab['content'] . '</div>';
            }
            $atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' su-tabs-vertical' : '';
            $return = '<div'.su_scroll_reveal($atts).' class="su-tabs  su-tabs-align-'.$atts['align'].' su-tabs-style-' . $atts['style'] . $atts['vertical'] . su_ecssc($atts) . '" data-active="' . (string) $atts['active'] . '"><div class="su-tabs-nav">' . implode('', $tabs) . '</div><div class="su-tabs-panes">' . implode("\n", $panes) . '</div></div>';
        }

        self::$tabs = array();
        self::$tab_count = 0;
        suAsset::addFile('css', 'tabs.css', __FUNCTION__);
        suAsset::addFile('js', 'tabs.js', __FUNCTION__);
        return $return;
    }
}
