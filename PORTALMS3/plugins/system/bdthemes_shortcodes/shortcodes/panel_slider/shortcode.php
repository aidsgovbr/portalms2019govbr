<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel_slider extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function panel_slider($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'large'         => '3',
            'medium'        => '2',
            'small'         => '1',
            'gutter'        => 'collapse',
            'navigation'    => 'yes',
            'pagination'    => 'no',
            'autoplay'      => 'yes',
            'loop'          => 'yes',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'panel_slider');

        $id             = uniqid('supnls_');
        $classes        = ['su-panel-slider', su_ecssc($atts)];
        $output         = [];
        
        if ($atts['gutter']     == 'large') { $gutter = 50; }
        elseif ($atts['gutter'] == 'medium') { $gutter = 25;}
        elseif ($atts['gutter'] == 'small') { $gutter = 10;}
        elseif ($atts['gutter'] == 'collapse') { $gutter = 0;}

        $autoplay = ($atts['autoplay'] =='yes') ? 5000 : 'false';
        $loop     = ($atts['loop'] =='yes') ? 'true' : 'false';
        $large    = $atts['large'];
        $medium   = $atts['medium'];
        $small    = $atts['small'];
        
        $output[] = '<div id ="'.$id.'" class="'.su_acssc($classes).'" '.su_scroll_reveal($atts).'>';
    
            $output[] = '<div class="swiper-container">';
                $output[] = '<div class="swiper-wrapper">';
                         $output[] = su_do_shortcode($content);
                $output[] = '</div>';
            $output[] = '</div>';

            /* Add Pagination */
            if ( $atts['pagination'] == 'yes' ) {
                $output[] = '<div class="swiper-pagination"></div>';
            }
            
            /* Add Arrows */
            if ( $atts['navigation'] == 'yes' ) {
                $output[] = '<div class="swiper-button-next swiper-button-white"></div><div class="swiper-button-prev swiper-button-white"></div>';
            }

        $output[] ='</div>';

        /* Initialize Swiper */
        $output[] = "<script>
             jQuery(document).ready(function ($) {
                var swiper = new Swiper('#$id .swiper-container', {
                    pagination: '#$id .swiper-pagination',
                    paginationClickable: true,
                    nextButton: '#$id .swiper-button-next',
                    prevButton: '#$id .swiper-button-prev',
                    autoplay: $autoplay,
                    loop: $loop,
                    autoplayDisableOnInteraction: false,
                    slidesPerView: $large,
                    spaceBetween: $gutter,
                    breakpoints: {
                        1024: {
                            slidesPerView: $large,
                            spaceBetween: $gutter
                        },
                        768: {
                            slidesPerView: $medium,
                            spaceBetween: $gutter
                        },
                        640: {
                            slidesPerView: $small,
                            spaceBetween: $gutter
                        }
                    }
                });
            });
        </script>";

        suAsset::addFile('css', 'panel_slider.css', __FUNCTION__);
        suAsset::addFile('css', 'swiper.min.css');
        suAsset::addFile('js', 'swiper.jquery.min.js');

        return implode("\n", $output);
    }    
}
