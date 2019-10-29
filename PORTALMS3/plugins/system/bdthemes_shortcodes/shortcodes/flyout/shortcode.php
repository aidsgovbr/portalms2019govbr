<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flyout extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function flyout($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'             => uniqid('fout'),
            'style'          => 'shadow',
            'dimension'      => '250x250',
            'position'       => 'bottom-left',
            'transition_in'  => 'fadeIn',
            'transition_out' => 'fadeOut',
            'show_close'     => 'yes',
            'close_style'    => 'circle-1',
            'timeout'        => '',
            'offset'         => '0, 0',
            'adblock_notice' => 'no',
            'class'          => ''
        ), $atts, 'flyout');
        

        $script = $css = array();
        $close_html ='';

        $classes = array('su-flyout', 'animated', $atts['transition_in'], 'dim-'. $atts['dimension'], $atts['position'], $atts['style'], su_ecssc($atts));

        if ($atts['show_close'] === 'yes') {
            $close_html = '<a id="'. $atts['id'] .'_cb" href="javascript:void(0)" class="su-fo-close '.$atts['close_style'].'"></a>';
        }


        $script[] = 'jQuery(document).ready(function($) {';

        $script[] = ' 
            $("#'.$atts['id'].'_cb").click(function() {
                $(this).parent().addClass("'.$atts['transition_out'].'");
                $(this).parent().removeClass("'.$atts['transition_in'].'");
                setTimeout(function (){
                     $("#'.$atts['id'].'").hide();
                }, 1000);
            });';

        $script[] = '});';

        $css[] = '#'.$atts['id'].' {transform: translate('.$atts['offset'].');}';
        

        suAsset::addString('css', implode('', $css));
        suAsset::addFile('css', 'flyout.css', __FUNCTION__);
        suAsset::addFile('css', 'animate.css');
        
        suAsset::addString('js', implode('', $script));

        if ($atts['adblock_notice'] == 'yes') {
            suAsset::addFile('js', 'fuckadblock.js', __FUNCTION__);           
            suAsset::addFile('js', 'flyout.js', __FUNCTION__);
        }

        $return[] = '
        <div id="'. $atts['id'] .'" class="'. su_acssc($classes).'">
            '.$close_html.'
            <div class="su-flyout-content">' 
                . su_do_shortcode($content) . 
            '</div>
        </div>';
        


        return implode("\n", $return);
    }

}
