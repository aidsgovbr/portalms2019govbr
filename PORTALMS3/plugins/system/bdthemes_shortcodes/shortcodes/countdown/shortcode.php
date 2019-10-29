<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_countdown extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function countdown($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
			'count_date'    => '2020/12/25',
			'count_time'    => '',
			'count_size'    => '32',
			'count_color'   => '',
			'background'    => '',
			'text_align'    => 'default',
			'text_size'     => '14',
			'text_color'    => '#666666',
			'align'         => 'left',
			'padding'       => '',
			'margin'        => '',
			'border'        => '',
			'radius'        => '',
			'divider'       => 'none',
			'divider_color' => 'rgba(100,100,100,.1)',
            'scroll_reveal' => '',
			'class'         => ''
        ), $atts, 'countdown');       

        $id    = uniqid('countdown_');
        $css[] = '';
        $js[]  = '';
        $lang  = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);


        $divider_style = '';
        if ($atts['divider'] == 'colon') {
            $divider_style = '#'.$id.' .su-countdown-content .su-cd-timer > span:after { font-size: '.round($atts['count_size']/2).'px;line-height: '.round($atts['count_size']/2).'px; color: '.$atts['divider_color'].';}';
        }
        if ($atts['divider'] == 'vertical_line' || $atts['divider'] == 'horizontal_line') {
            $divider_style = '#'.$id.' .su-countdown-content .su-cd-timer > span:after {background-color: '.$atts['divider_color'].';}';
        }
        else {
            $divider_style = '#'.$id.' .su-countdown-content .su-cd-timer > span:after { font-size: '.$atts['count_size'].'px;line-height: '.$atts['count_size'].'px; color: '.$atts['divider_color'].';}';
        }

        if ($atts['margin'] or $atts['padding'] or $atts['radius'] or $atts['border'] or $atts['background']) {
            $margin     = ($atts['margin']) ? 'margin: '.$atts['margin'].';' : '';
            $padding    = ($atts['padding']) ? 'padding: '.$atts['padding'].';' : '';
            $radius     = ($atts['radius']) ? 'border-radius: '.$atts['radius'].';' : '';
            $border     = ($atts['border']) ? 'border: '.$atts['border'].';' : '';
            $background = ($atts['background']) ? 'background-color: '.$atts['background'].';' : '';
            $css[]      = '#'.$id.' {'.$margin.$padding.$radius.$border.$background.'}';
        }
        $count_color = ($atts['count_color']) ? 'color: '.$atts['count_color'].';' : '';

        $css[] = '#'.$id.'  .su-cd-timer > span span[class*="text"] { color: '.$atts['text_color'].'; font-size: '.$atts['text_size'].'px; }
			      #'.$id.'  .su-cd-timer span > span { font-size: '.$atts['count_size'].'px; line-height: '.$atts['count_size'].'px; '. $count_color .'}
			     '.$divider_style.'
        ';

        $message   ='';
        $countdown = $atts['count_date'];
        $countdown .=  ($atts['count_time']) ? ' '. $atts['count_time'] : '';

        if (isset($content)) {
            $msgtext = trim(su_do_shortcode($content));
            $message = '.on("finish.countdown", function(event) {
                                $(this).parent().addClass("disabled");
                                $(this).parent().replaceWith($("#'.$id.' .su-cdem"));
                                $("#'.$id.' .su-cdem").fadeIn();
                            })';            
        }

        $js[] = '
            jQuery(document).ready(function ($) { 
               $("#'.$id.' .su-cd-timer").countdown("'.$countdown.'").on("update.countdown", function(event) {
                   var $this = $(this).html(event.strftime(
                       "<span class=\'su-cd-day\'><span class=\'su-cd-day-data\'>%-D</span> <span class=\'su-cd-day-text\'>'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_DAY").'</span></span> "
                     + "<span class=\'su-cd-hour\'><span class=\'su-cd-hour-data\'>%H</span> <span class=\'su-cd-hour-text\'>'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_HOUR").'</span></span> "
                     + "<span class=\'su-cd-minute\'><span class=\'su-cd-minute-data\'>%M</span> <span class=\'su-cd-minute-text\'>'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_MIN").'</span></span> "
                     + "<span class=\'su-cd-second\'><span class=\'su-cd-second-data\'>%S</span> <span class=\'su-cd-second-text\'>'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_SEC").'</span></span>"));
                })'.$message.';
            });
        ';

        suAsset::addFile('css', 'countdown.css', __FUNCTION__);  
        suAsset::addFile('js', 'jquery.countdown.js', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));
        suAsset::addString('js', implode("\n", $js));

        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-countdown-wrapper clearfix su-countdown-'.$atts['align'].' su-cd-divider-'. $atts['divider'].' '. su_ecssc($atts) . ' su-countdown-text-'.$atts['text_align'].'">
            <div class="su-countdown-content">               
                <div class="su-cd-timer"></div>';
                if (isset($content)) {
                    $return .= '<div class="su-cdem">'.$content.'</div>';
                }

        $return .= '</div>
            </div>';

        return $return;
    }
}
