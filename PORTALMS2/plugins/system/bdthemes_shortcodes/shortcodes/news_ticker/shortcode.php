<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_news_ticker extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function news_ticker($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'            => 'default',
            'source'           => '',
            'limit'            => 12,
            'show_label'       => 'yes',
            'label'            => 'LATEST NEWS',
            'color'            => '',
            'background'       => '',
            'title_color'      => '',
            'navigation'       => 'yes',
            'intro_text'       => 'yes',
            'intro_text_limit' => 200,
            'order'            => 'created',
            'order_by'         => 'desc',
            'transition'       => 'fade', // slide-h, slide-v, fade, 
            'autoplay'         => 'yes',
            'delay'            => 4, // in second format
            'target'           => 'self',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'news_ticker');

        $slides           = (array) Su_Tools::get_slides($atts);
        $id               = uniqid('sunt');
        $intro_text       = '';
        $title            = '';    
        $return           = array();
        $atts['delay']    = $atts['delay'] * 1000;
        $atts['autoplay'] = ($atts['autoplay'] === 'yes') ? 'true' : 'false';
        $nav_class        = ($atts['navigation'] === 'yes') ? ' has-navigation' : '';
        $classes          = array('su-news-ticker', $nav_class, su_ecssc($atts));

        
        if (count($slides)) {

            $return[] = '<div '.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '" id="' . $id . '">';
                if ($atts['label'] and $atts['show_label'] === 'yes') {
                    $return[] = '<div class="bn-label"><h2>'.$atts['label'].'</h2><span></span></div>';
                }
                $return[] = '<ul>';
                    $limit = 1;
                    foreach ((array) $slides as $slide) { 
                        
                        // Title condition 
                        if($slide['title'])
                            $title = stripslashes($slide['title']);                


                        $return[] = '<li class="su-nt-item">';
                        $return[] =  '<a href="'.JRoute::_($slide['link']).'" target="_'.$atts['target'].'">' . $title ;

                        if ($atts['intro_text'] === 'yes' and isset($slide['introtext'])) {

                            $intro_text = $slide['introtext'];

                            if ($atts['intro_text_limit']) {
                                $intro_text = su_char_limit($intro_text, $atts['intro_text_limit']);
                            }

                            $return[] =  ' : <span class="su-nt-intro-text">'.stripslashes($intro_text).'</span>';
                        }

                        $return[] =  '</a>';
                        $return[] =  '</li>';

                        if ($limit++ == $atts['limit']) break;
                    }
                $return[] =  '</ul>';

                if ($atts['navigation']==='yes') {
                    $return[] =  '<div class="bn-navi"><span class="nt-arrow-left"></span><span class="nt-arrow-right"></span></div>';
                }
            
            $return[] = '</div>';

            $js = '
                jQuery(document).ready(function($) {
                    "use strict"
                    jQuery("#'.$id.'").breakingNews({
                        effect      : "'.$atts['transition'].'",
                        autoplay    : '.$atts['autoplay'].',
                        timer       : '.$atts['delay'].'
                    });

                });
            ';


            suAsset::addFile('css', 'breakingNews.css', __FUNCTION__);
            suAsset::addFile('js', 'breakingNews.js', __FUNCTION__);
            
            suAsset::addString('js', $js);

            return implode('', $return);
        }
        else{
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWS_TICKER_ERROR'), 'warning');
        }
    }   
}
