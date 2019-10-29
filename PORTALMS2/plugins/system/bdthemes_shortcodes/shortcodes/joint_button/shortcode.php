<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_joint_button extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function joint_button($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                 => '',
            'left_btn_text'      => 'Get Support',
            'left_btn_bg'        => '',
            'left_btn_hover_bg'  => '',
            'left_btn_color'     => '',
            'left_btn_url'       => '',
            'left_btn_target'    => 'blank',
            'left_btn_icon'      => '',
            'middle_txt'         => 'Or',
            'right_btn_text'     => 'View Details',
            'right_btn_bg'       => '',
            'right_btn_hover_bg' => '',
            'right_btn_color'    => '',
            'right_btn_url'      => '',
            'right_btn_target'   => 'blank',
            'right_btn_icon'     => '',
            'width'              => '450px',
            'align'              => 'center',
            'radius'             => '',
            'scroll_reveal'      => '',
            'class'              => ''
        ), $atts, 'joint_button');

        // Initioal Variables
        $id  = uniqid('sujbtn_');
        $css = array();

        // Prepare button classes
        $classes = array('su-joint-btn', $atts['class']);

        $css[] = ($atts['width']) ? '#'.$id.'.su-joint-btn { width: '.$atts['width'].'; }' : '';
        $css[] = ($atts['radius']) ? '#'.$id.' .joint-btn { border-radius: '.$atts['radius'].'; }' : '';
        $css[] = ($atts['left_btn_bg']) ? '#'.$id.' .joint-btn-left { background: '.$atts['left_btn_bg'].'; }' : '';
        $css[] = ($atts['left_btn_hover_bg']) ? '#'.$id.' .joint-btn-left:hover { background: '.$atts['left_btn_hover_bg'].'; }' : '';
        $css[] = ($atts['left_btn_color']) ? '#'.$id.' .joint-btn-left { color: '.$atts['left_btn_color'].'; }' : '';
        $css[] = ($atts['right_btn_bg']) ? '#'.$id.' .joint-btn-right { background: '.$atts['right_btn_bg'].'; }' : '';
        $css[] = ($atts['right_btn_hover_bg']) ? '#'.$id.' .joint-btn-right:hover { background: '.$atts['right_btn_hover_bg'].'; }' : '';
        $css[] = ($atts['right_btn_color']) ? '#'.$id.' .joint-btn-right { color: '.$atts['right_btn_color'].'; }' : '';
        if ($atts['align'] =='right') {
            $css[] = '#'.$id.'.su-joint-btn { float: right; }';
        } elseif ($atts['align'] =='left') {
            $css[] = '#'.$id.'.su-joint-btn { float: left; }';
        } elseif ($atts['align'] =='center') {
            $css[] = '#'.$id.'.su-joint-btn { margin-left: auto; margin-right: auto; }';
        }

        $left_btn_icon = $right_btn_icon = '';

        if (strpos($atts['left_btn_icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $left_btn_icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['left_btn_icon'])) . '"></i>';
        }

        elseif (strpos($atts['left_btn_icon'], 'icon:') !== false) {
            $left_btn_icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['left_btn_icon'])) . '"></i>';
        }

        elseif (strpos($atts['left_btn_icon'], 'icon:') !== false) {
            $left_btn_icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['left_btn_icon'])) . '"></i>';
        }

        elseif (strpos($atts['left_btn_icon'], '/') !== false) {
            $left_btn_icon = '<img src="' . image_media($atts['left_btn_icon']) . '" alt="" />';
        }


        if (strpos($atts['right_btn_icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $right_btn_icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['right_btn_icon'])) . '"></i>';
        }

        elseif (strpos($atts['right_btn_icon'], 'icon:') !== false) {
            $right_btn_icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['right_btn_icon'])) . '"></i>';
        }

        elseif (strpos($atts['right_btn_icon'], '/') !== false) {
            $right_btn_icon = '<img src="' . image_media($atts['right_btn_icon']) . '" alt="" />';
        }

        // put css in head  
        suAsset::addFile('css', 'joint-button.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        return '<div id="'.$id.'" class="'.su_acssc($classes).'">
                  <a class="joint-btn joint-btn-left" href="'.$atts['left_btn_url'].'" target="_'.$atts['left_btn_target'].'">'.$left_btn_icon.$atts['left_btn_text'].'</a>
                  <span>'.$atts['middle_txt'].'</span>
                  <a class="joint-btn joint-btn-right" href="'.$atts['right_btn_url'].'" target="_'.$atts['right_btn_target'].'">'.$atts['right_btn_text'].$right_btn_icon.'</a>
                </div>';
    } 
}
