<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_timeline extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function timeline($atts = null, $content = null) {
       $atts = su_shortcode_atts(array(
          'source'         => '',
          'limit'          => 20,
          'image'          => 'yes',
          'title'          => 'yes',
          'link_title'     => 'yes',
          'intro_text'     => 'yes',
          'date'           => 'yes',
          'time'           => 'yes',
          'read_more'      => 'no',
          'order'          => 'created',
          'order_by'       => 'desc',
          'highlight_year' => 'yes',
          'icon_bg'        => '',
          'before_text'    => '',
          'after_text'     => '',
          'scroll_reveal'  => '',
          'class'          => ''
          ), $atts, 'timeline');

        $slides = (array) Su_Tools::get_slides($atts);

        $return = '';

        if ($atts['before_text']) {
            $return .= '<div class="su-timeline-before-text"><span>'.$atts['before_text'].'</span></div>';
        }

        $date = date('Y');

        $return .= '<div'.su_scroll_reveal($atts).' class="su-timeline animated ' . su_ecssc($atts) . '">';
        if (count($slides)) {
            $limit = 1;
            foreach ($slides as $slide) {

                $title = $slide['title'];
                $icon = $title ? explode('|| fa-', $title) : array();
                if (count($icon) == 2){
                    $title = trim($icon[0]);
                    $icon = '<i class="fa fa-'.trim($icon[1]).'"></i>';
                } else {
                    $title = $slide['title'];
                    $icon = '<i class="fa fa-circle"></i>';
                }
                $has_icon = '';
                if (isset($icon[1])) {
                  $has_icon = 'has-ta-icon';
                }
                $icon_bg = ($atts['icon_bg']) ? 'style="background-color:'.$atts['icon_bg'].';"' : '';

                    if ($date != JHTML::_('date', $slide['created'], "Y") && $atts['highlight_year'] == 'yes') {
                        $return .= '<div class="su-timeline-row su-timeline-has-year">'."\n";
                        $date = JHTML::_('date', $slide['created'], "Y");
                        $return .= '<div class="su-timeline-year"><span>'."\n";
                        $return .= $date . "\n";
                        $return .= '</span></div>'."\n";
                    } else {
                       $return .= '<div class="su-timeline-row">'."\n";
                    }

                    $return .= '<div class="su-timeline-icon '.$has_icon.'"><div class="bg-primary" '.$icon_bg.'>'.$icon.'</div></div>';
                    $return .= '<div class="su-timeline-time">';

                    if ($atts['date'] == 'yes') {
                        $return .= '<small>'.JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')).'</small>';
                    }

                    if ($atts['time'] == 'yes') {
                        $return .= JHTML::_('date', $slide['created'], "g:i A");
                    }

                    $return .= '</div>';


                    $return .= '<div class="su-timeline-content">'."\n";
                        $return .= '<div class="su-timeline-content-body">'."\n";
                            if ($atts['title'] === 'yes' and isset($slide['title'])) {
                                $return .=  '<h3 class="su-timeline-item-title">';
                                    if ($atts['link_title'] === 'yes') { $return .=  '<a href="'. $slide['link'].'">'; }
                                        $return .= $title;
                                    if ($atts['link_title'] === 'yes') { $return .=  '</a>'; }
                                $return .= '</h3>';
                            }
                            if ($slide['image'] and $atts['image'] === 'yes') {
                                    $return .=  '<div class="su-timeline-item-image"><img src="'. image_media($slide['image']).'" alt="" /></div>';
                            }
                            if ($atts['intro_text'] === 'yes' and isset($slide['introtext'])) {
                                $return .=  '<div class="su-timeline-item-text">'.su_do_shortcode($slide['introtext']).'</div>';
                            }
                            if ($atts['read_more'] === 'yes') {
                                $return .=  '<a class="su-timeline-readmore readon" href="'. $slide['link'].'">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE').'</a>';
                            }
                        $return .= '</div>'."\n";
                    $return .= '</div>'."\n";
                $return .= '</div>'."\n";
              if ($limit++ == $atts['limit']) break;
            }
        $return .= '</div>';

        if ($atts['after_text']) {
            $return .= '<div class="su-timeline-after-text"><span>'.$atts['after_text'].'</span></div>';
        }
        suAsset::addFile('css', 'timeline.css', __FUNCTION__);
        suAsset::addFile('js', 'timeline.js', __FUNCTION__);
        }
        else {
          $return .= su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_NOT_WORK'), 'warning');
        }

      return $return;
    }
}
