<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flipbook extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function flipbook($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('dfb'),
            'title'         => '',
            'type'          => 'frame', // thumbnail, link, frame
            'src'           => 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf',
            'thumbnail'     => 'plugins/system/bdthemes_shortcodes/images/pdf-thumb.svg',
            'tags'          => '',
            'webgl'         => 'no',
            'background'    => '#777777',
            'height'        => 750,
            'duration'      => 800,
            'downloadable'  => 'yes',
            'sound'         => 'yes',
            'mouse_scroll'  => 'no',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'flipbook');


        $output       = array();
        $script       = array();
        $lang         = JFactory::getLanguage();
        $lang         = ($lang->isRTL()) ? 'RTL' : 'LTR';
        $webgl        = ($atts['webgl'] === 'yes') ? 'true' : 'false';
        $downloadable = ($atts['downloadable'] === 'yes') ? 'true' : 'false';
        $sound        = ($atts['sound'] === 'yes') ? 'true' : 'false';
        $mouse_scroll = ($atts['mouse_scroll'] === 'yes') ? 'true' : 'false';
        
        $flipBookGV = '
            var dFlipLocation = "'.BDT_SU_URI.'/shortcodes/flipbook/";
        ';

        if ($atts['type'] == 'frame') {
            $script[] = '
                jQuery(document).ready(function ($) {
                    var pdf = "'.image_media($atts['src']).'";
                    var options = {
                        hard: "cover",
                        webgl: '.$webgl.',
                        height: '.$atts['height'].', 
                        duration: '.$atts['duration'].', 
                        soundEnable: '.$sound.',
                        scrollWheel: '.$mouse_scroll.',
                        backgroundColor: "'.$atts['background'].'",
                        direction: DFLIP.DIRECTION.'.$lang.',
                        enableDownload: '.$downloadable.',
                        text: {
                            toggleSound: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOGGLE_SOUND').'",
                            toggleThumbnails: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOGGLE_THUMBNAILS').'",
                            toggleOutline: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOGGLE_OUTLINE').'",
                            previousPage: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREVIOUS_PAGE').'",
                            nextPage: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEXT_PAGE').'",
                            toggleFullscreen: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOGGLE_FULLSCREEN').'",
                            zoomIn: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_IN').'",
                            zoomOut: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_OUT').'",
                            toggleHelp: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOGGLE_HELP').'",
                            
                            singlePageMode: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_PAGE_MODE').'",
                            doublePageMode: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_PAGE_MODE').'",
                            downloadPDFFile: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOAD_PDF_FILE').'",
                            gotoFirstPage: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GO_TO_FIRST_PAGE').'",
                            gotoLastPage: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GO_TO_LAST_PAGE').'",
                            
                            share: "'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHARE').'"
                        },
                    };
                    var flipBook = $("#'.$atts['id'].'Container").flipBook(pdf, options);
                });
            ';
        } else {
            $script[] = '
                jQuery(document).ready(function ($) {
                    var option_'.$atts['id'].'Container = {
                        webgl: '.$webgl.',
                        height: '.$atts['height'].', 
                        duration: '.$atts['duration'].', 
                        soundEnable: '.$sound.',
                        scrollWheel: '.$mouse_scroll.',
                        backgroundColor: "'.$atts['background'].'",
                        direction: DFLIP.DIRECTION.'.$lang.',
                        enableDownload: '.$downloadable.'
                    };
                });
            ';
        }

        suAsset::addString('js', $flipBookGV);

        suAsset::addFile('css', 'dflip.css', __FUNCTION__);
        suAsset::addFile('css', 'flipbook.css', __FUNCTION__);
        suAsset::addFile('css', 'themify-icons.css', __FUNCTION__);
        suAsset::addFile('js', 'dflip.min.js', __FUNCTION__);

        if ($atts['type'] == 'thumbnail') {
            $output[] = '<div id="'.$atts['id'].'"'.su_scroll_reveal($atts).' class="su-flipbook '. su_ecssc($atts). '">';
                $output[] = '<div class="_df_thumb" id="'.$atts['id'].'Container" tags="'.$atts['tags'].'" source="'.image_media($atts['src']).'" thumb="'.image_media($atts['thumbnail']).'">'.$atts['title'].'</div >';
            $output[] = '</div>';
        } elseif ($atts['type'] == 'link') {
            $have_content = ($content) ? su_do_shortcode($content) : $atts['title'];
            $output[] = '<a class="_df_custom '. su_ecssc($atts). '" source="'.image_media($atts['src']).'" id="'.$atts['id'].'Container">'. $have_content .'</a>';
        } elseif ($atts['type'] == 'frame') {
            $output[] = '<div id="'.$atts['id'].'"'.su_scroll_reveal($atts).' class="su-flipbook '. su_ecssc($atts). '">';
                $output[] = '<div id="'.$atts['id'].'Container"></div>';
            $output[] = '</div>';
        } else {
            $output[] = su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_ERROR'), 'warning');
        }

        $output[] = '<script type="text/javascript">' . implode("\n",$script) . '</script>';

        return implode("\n", $output);
    }
}
