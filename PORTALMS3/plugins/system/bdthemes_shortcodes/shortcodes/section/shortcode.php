<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_section extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function section($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                    => uniqid('sus'),
            'background'            => '',
            'background_color'      => '',
            'background_position'   => '',
            'background_repeat'     => '',
            'background_attachment' => '',
            'background_size'       => '',
            'background_overlay'    => '',
            'background_image'      => '',
            'overlay_opacity'       => '0.4',
            'parallax'              => 'no',
            'parallax_transition'   => 'no',
            'speed'                 => '5',
            'max_width'             => '',
            'force_fullwidth'       => 'no',
            'margin'                => '',
            'padding'               => '',
            'border'                => '',
            'color'                 => '',
            'text_align'            => '',
            'text_shadow'           => '',
            'url'                   => '',
            'target'                => 'self',
            'video_url'             => '',
            'video_loop'            => 'yes',
            'video_muted'           => 'yes',
            'video_ratio'           => '1.77',
            'video_autoplay'        => 'yes',
            'video_overlay'         => '',
            'scroll_reveal'         => '',
            'class'                 => ''
        ), $atts, 'section');

        $id                       = $atts['id'];
        $css[]                    = '';
        $classes                  = array('su-section', su_ecssc($atts));
        $return                   = array();
        $video                    = '';
        $lang                     = JFactory::getLanguage();
        $custom_url               = '';        
        $rtl_check                = ($lang->isRTL()) ? 1 : 0;
        $atts['background_color'] = ($atts['background']) ? $atts['background'] : $atts['background_color'];
        $background_size          = ($atts['background_size']) ? 'background-size:' . $atts['background_size'] . ';' : '';
        $background_position      = ($atts['background_position']) ? 'background-position:' . $atts['background_position'] . ';' : '';
        $background_repeat        = ($atts['background_repeat']) ? 'background-repeat:' . $atts['background_repeat'] . ';' : '';
        $background_color         = ($atts['background_color']) ? 'background-color:' . $atts['background_color'] . ';' : '';
        $background_attachment    = ($atts['background_attachment']) ? 'background-attachment:' . $atts['background_attachment'] . ';' : '';     
        $background_overlay       = ($atts['background_overlay']) ? 'background-image: url(\''.image_media($atts['background_overlay']).'\');' : '';        
        $background_image         = ($atts['background_image']) ? 'background-image: url(\''.image_media($atts['background_image']).'\');' : $background_color;
        $overlay_opacity          = ($atts['overlay_opacity']) ? 'opacity:' . $atts['overlay_opacity'] . ';' : '';
        $color                    = ($atts['color']) ? 'color:' . $atts['color'] . ';' : '';
        $text_align               = ($atts['text_align']) ? 'text-align:' . $atts['text_align'].';' : '';
        $text_shadow              = ($atts['text_shadow']) ? ' -webkit-text-shadow:' . $atts['text_shadow'] . '; text-shadow:' . $atts['text_shadow'].';' : '';
        $border                   = ($atts['border']) ? 'border-top:' . $atts['border'] . '; border-bottom:' . $atts['border'] . ';' : '';
        $margin                   = ($atts['margin']) ? 'margin:' . $atts['margin'] . ';' : '';
        $padding                  = ($atts['padding']) ? 'padding:' . $atts['padding'] . ';' : '';        
        $force_fullwidth          = ($atts['force_fullwidth'] === 'yes') ? 'su-section-forcefullwidth' : '';
        $loop                     = ($atts['video_loop'] === 'yes') ? 'true' : 'false';
        $muted                    = ($atts['video_muted'] === 'yes') ? 'true' : 'false';
        $autoplay                 = ($atts['video_autoplay'] === 'yes') ? 'true' : 'false';

        if ($atts['parallax'] === 'yes') {
            $classes[] = 'su-section-parallax';
        }
        if ($atts['parallax_transition'] === 'yes') {
            $classes[] = 'su-sp-transition';
        }
        
        if (is_numeric($atts['max_width'])) {
            $max_width         = ($atts['max_width']) ? 'max-width:' . $atts['max_width'].'px;' : '';
        } else {
            $max_width         = ($atts['max_width']) ? 'max-width:' . $atts['max_width'].';' : '';
        }
        
        if ($atts['video_url']) {
            if (preg_match('"\.mp4$"', $atts['video_url'])) {
                $video = ' data-mp4="'.image_media($atts['video_url']).'"';
            }
            elseif (preg_match('"\.webm$"', $atts['video_url'])) {
                $video = ' data-webm="'.image_media($atts['video_url']).'"';
            }
            elseif (preg_match('"\.flv$"', $atts['video_url'])) {
                $video = ' data-flv="'.image_media($atts['video_url']).'"';
            }
            elseif (preg_match('"(?:watch\?v=|be\.com\/v\/)(.{8,})"', $atts['video_url'])) {

                preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $atts['video_url'], $yurl);
                $video = ' data-youtube="'.$yurl[0].'"';
            }
            elseif (preg_match('"(vimeo\.com?\/[^\s]*)"', $atts['video_url'])) {
                preg_match('~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['video_url'], $vurl);
                $video = ' data-vimeo="'.$vurl[1].'"';
            }
            suAsset::addFile('js', 'modernizr.video.js');
            suAsset::addFile('js', 'swfobject.js');
            suAsset::addFile('js', 'video_background.js');
        }
        
        //$fallback_image = ($atts['image']) ? ' data-fallback_image="'.image_media($atts['image']).'"' : '';

        if ($atts['background_image'] && $atts['parallax'] === 'yes') {
            $classes[] = 'su-section-parallax';
        }
        if ($atts['url']) {
            $classes[] = 'su-section-clickable';
            $custom_url       = ($atts['url'] !='') ? ' data-url="'.$atts['url'].'" data-target="'. $atts['target'].'" ' : '';
        }



        $css[] = '#'.$id.' .su-section {'.$background_image.$background_size.$background_position.$background_repeat.$background_attachment.$border.$margin.$color.'}';
        $css[] = '#'.$id.' .su-section-overlay {'.$background_overlay.$overlay_opacity.'}';
        $css[] = '#'.$id.' .su-section-content {'.$color.$max_width.$text_align.$text_shadow.$padding.'}';



        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'section.css', __FUNCTION__);
        suAsset::addFile('js', 'section.js', __FUNCTION__);

        
        if ($atts['force_fullwidth'] === 'yes') {
            $return[] = '<div class="su-section-forcefullwidth">';
        }
            $return[] = '<div id="'. $id .'"'.su_scroll_reveal($atts).' class="su-section-wrapper" data-id="'. $id .'" data-rtl="'.$rtl_check.'">';
                $return[] = '<div class="' . su_acssc($classes) . '" '.$custom_url.' data-speed="' . $atts['speed'] . '">';
                    $return[] = '<div class="su-section-content su-content-wrap">';
                        $return[] = su_do_shortcode($content);
                    $return[] = '</div>';
                    if ($atts['background_overlay']) {
                        $return[] = '<div class="su-section-overlay"></div>';
                    }
                    if ($atts['video_url']) {
                        $return[] = '<div class="su-section-video" id="svb_'. $id .'" data-id="svb_'. $id .'" data-loop="'. $loop.'" data-muted="'. $muted.'" data-autoplay="'. $autoplay.'" data-ratio="'. $atts['video_ratio'].'" data-overlay="'. $atts['video_overlay'].'" data-swfpath="' . BDT_SU_URI . '/other/video.swf"'. $video.'></div>';
                    }
                $return[] = '</div>';
            $return[] = '</div>';

        if ($atts['force_fullwidth'] === 'yes') {
            $return[] = '</div>';
        }


        return implode('', $return);
    }
}
