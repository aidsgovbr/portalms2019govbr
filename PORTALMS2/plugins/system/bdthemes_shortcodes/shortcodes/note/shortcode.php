<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_note extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
       
    public static function note($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => '1',
            'type'          => 'info',
            'icon'          => 'no',
            'radius'        => '3px',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'note');

        $id = uniqid('sunote_');

        if ($atts['radius']) {
            $css = '#'.$id.'.su-note { -webkit-border-radius:' . $atts['radius'] . ';border-radius:' . $atts['radius'] . ';}';
            suAsset::addString('css', $css);
        }
        
        $note_icon = ($atts['icon'] === 'yes') ? ' su-note-icon' : '';

        suAsset::addFile('css', 'note.css', __FUNCTION__);

        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-note' . su_ecssc($atts) . ' su-note-style'.$atts['style'].' su-note-'.$atts['type'].''.$note_icon.'">
            <div class="su-note-inner su-clearfix">' . su_do_shortcode($content) . '</div>
        </div>';
    }
}
