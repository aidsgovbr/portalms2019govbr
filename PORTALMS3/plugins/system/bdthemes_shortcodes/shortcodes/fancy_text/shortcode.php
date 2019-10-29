<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_fancy_text extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function fancy_text($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'type'          => '1',
            'tags'          => 'Hello, Text',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'fancy_tags');

        // Inistial Variables
        $id = uniqid("ft_");
        $tags = array();
        $tag = '';

        // class manage
        $classes = array('su-fancy-text', 'su-fteffect'.$atts['type'], su_ecssc($atts));

        // Fancy Text interchangeable tag spliting 
        if($atts['tags']) {
            $tags = explode(',', $atts['tags']);
            foreach ($tags as $word) {
                $tag .='<b>'.$word.'</b>';
            }
            $tag = str_replace('<b>'.$tags['0'].'</b>', '<b class="is-visible">'.$tags['0'].'</b>' , $tag);
        }

        // Manage class for different type of Fancy Text
        if ($atts['type'] == 1 or $atts['type'] == 2 or $atts['type'] == 4 or $atts['type'] == 5)
            $classes[] = 'su-ft-letters';
        
        // Add css file in head
        suAsset::addFile('css', 'fancy_text.css', __FUNCTION__);

        // Add javascript file in head
        suAsset::addFile('js', 'fancy_text.js', __FUNCTION__);

        // HTML Ourput
        $return = "
            <span".su_scroll_reveal($atts)." id='".$id."' class='".su_acssc($classes). "'>
                <span class='su-ft-wrap'>
                    ".$tag."
                </span>
            </span>";
   
        return $return;
    }
}
