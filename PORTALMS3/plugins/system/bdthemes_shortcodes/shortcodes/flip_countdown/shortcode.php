<?php 
/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flip_countdown extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function flip_countdown($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'datetime'      => '2020-03-27T00:00:00', // example: 2020-05-01T00:00:00
            'count_size'    => 'default',  // default, medium, small, large
            'count_color'   => 'dark',  // dark, light
            'text'          => 'dark', // dark, light
            'time_name'     => 'yes',  // yes, no
            'prefix'        => '',
            'suffix'        => '',
            'layout'        => 'horizontal', // horizontal, vertical
            'align'         => 'left', // left, right, center
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'flip_countdown');

        $id = uniqid('sufcd_');
        $output       = [];
        $tick_class   = ['tick'];
        $classes      = array('su-countdown');
        $classes[]      = ($atts['align']!='') ? 'su-align-'.$atts['align'] : '';
        $classes[]      = ($atts['text']!='') ? 'su-text-'.$atts['text'] : '';
        $classes[]      = ($atts['layout']!='') ? 'su-layout-'.$atts['layout'] : '';
        
        $tick_class[] = ($atts['count_size']) ? 'tick-'.$atts['count_size'] : 'tick-default';
        $tick_class[] = ($atts['count_color']) ? 'tick-'.$atts['count_color'] : '';

        $settings ='
            <script>
                "use strict";
                function '.$id.'Init(tick) {
                    var nextYear = "'.$atts['datetime'].'";
                    var counter = Tick.count.down(nextYear);
                    counter.onupdate = function(value) {
                        tick.value = value;
                    };
                }
            </script>
        ';

        $output[] = '<div class="'.su_acssc($classes).'">';
            $output[] = '<div class="">';

                if($atts['datetime']!='') {
                    if ($atts['prefix'] != '') {
                        $output[] ='<div><h3 class="su_prefix-text">'.$atts['prefix'].'</h3></div>';
                    }

                    $output[] ='<div class="'.su_acssc($tick_class).'" data-did-init="'.$id.'Init">';
                        $output[] ='<div data-layout="'.$atts['layout'].' '.$atts['align'].'" data-repeat="true"
                                        data-transform="rotate( 
                                            transform( plural(day, days), input() ), 
                                            transform( plural(hour, hours), input() ),
                                            transform( plural(minute, minutes), input() ),
                                            transform( plural(second, seconds), input() )
                                         ) -> map( keys( label, value ) )">';

                            $output[] ='<div class="tick-group">';
                                $output[] = ($atts['time_name'] == 'yes') ? '<div data-key="label" data-view="text"></div>' : '';

                                $output[] ='<div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                                    <span data-view="flip"></span>';
                                $output[] ='</div>';
                            $output[] ='</div>';
                        $output[] ='</div>';
                    $output[] ='</div>';

                    if ($atts['suffix'] != '') {
                        $output[] ='<div><h3 class="su_suffix-text">'.$atts['suffix'].'</h3></div>';
                    }

                    $output[] = $settings;
                    
                }
                else {
                    $output[] = '<strong>You did not enter any date of custom date.</strong>';
                }
            $output[] ='</div>';
        $output[] ='</div>';

        suAsset::addFile('css', 'tick.css');
        suAsset::addFile('css', 'flip-countdown.css', __FUNCTION__);
        suAsset::addFile('js', 'tick.js');

        return implode("\n", $output);
    }
}
