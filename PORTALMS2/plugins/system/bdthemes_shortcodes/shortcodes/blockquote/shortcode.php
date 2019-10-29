<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_blockquote extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function blockquote($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'font' => 'default',
            'cite'  => false,
            'url'   => false,
            'align' => 'default',
            'pull' => 'no',
            'italic' => 'no',
            'scroll_reveal' => '',
            'class' => ''
                ), $atts, 'blockquote');

        $cite_link = ( $atts['url'] && $atts['cite']) ? '<a href="' . $atts['url'] . '" target="_blank">' . $atts['cite'] . '</a>' : $atts['cite'];
        $cite = ( $atts['cite']) ? '<span class="su-blockquote-cite">' . $cite_link . '</span>' : '';
        $classes = array('su-blockquote', 'su-blockquote-align-' . $atts['align'], 'su-blockquote-font-' . $atts['font'], su_ecssc($atts));
        $classes[] = ( $atts['cite']) ? 'su-blockquote-has-cite' : '';
        $classes[] = ( $atts['pull'] === 'yes') ? 'su-blockquote-pull' : '';
        $classes[] = ( $atts['italic'] === 'yes') ? 'su-blockquote-italic' : '';

        suAsset::addFile('css', 'blockquote.css', __FUNCTION__);

        return '<div class="' .su_acssc($classes). '"'.su_scroll_reveal($atts).'><div class="su-blockquote-inner su-clearfix">' .su_do_shortcode($content). '</div> '. su_scattr($cite) .' </div>';
    }
}
