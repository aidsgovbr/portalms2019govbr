<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_spoiler extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
   
    public static function spoiler($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER_TITLE_DEFAULT'),
            'open'          => 'no',
            'style'         => 'default',
            'icon'          => 'plus',
            'align'         => 'left',
            'anchor'        => '',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'spoiler');

        $atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace(' ', '', trim(sanitize_text_field($atts['anchor']))) . '"' : '';
        if ($atts['open'] !== 'yes')
            $atts['class'] .= ' su-spoiler-closed';
        else 
            $atts['class'] .= ' su-spoiler-open';

        suAsset::addFile('css', 'spoiler.css', __FUNCTION__);
        suAsset::addFile('js', 'spoiler.js', __FUNCTION__);   

        return '<div'.su_scroll_reveal($atts).' class="su-spoiler su-spoiler-style-' . $atts['style'] . ' su-spoiler-icon-' . $atts['icon'] . su_ecssc($atts) . ' su-spoiler-' . $atts['align'] . '"' . $atts['anchor'] . ' ><div class="su-spoiler-title"><h3><span class="su-spoiler-icon"></span>' . su_scattr($atts['title']) . '</h3></div><div class="su-spoiler-content su-clearfix">' . has_child_shortcode($content, 's') . '</div></div>';
    }
}
