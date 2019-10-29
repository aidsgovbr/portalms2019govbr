<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_post_block extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function post_block($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'source'                => '',
            'limit'                 => 12,
            'order'                 => 'created',
            'order_by'              => 'desc',
            'category'              => 'yes',
            'date'                  => 'yes',
            'show_intro_text'      => 'yes',
            'intro_text_limit'      => 105,
            'show_meta'            => 'yes',
            'show_title'            => 'yes',
            'show_thumb'            => 'yes',
            'thumb_resize'          => 'yes',
            'thumb_width'           => 640,
            'thumb_height'          => 480,
            'scroll_reveal'         => '',
            'class'                 => ''
        ), $atts, 'post_block');

        $slides                  = (array) Su_Tools::get_slides($atts);
        $id                      = uniqid('supg_');
        $intro_text              = '';
        $title                   = '';    
        $return                  = array();
        $filter_counter          = '';
        $show_desc              = $atts['show_intro_text'] === 'yes' ? 'show-desc' : 'hide-desc';
        $show_meta              = $atts['show_meta'] === 'yes' ? 'show-meta' : 'hide-meta';
        $show_title				= $atts['show_title'] === 'yes' ? 'show-title' : 'hide-title';
        $show_thumb				= $atts['show_thumb'] === 'yes' ? 'show-thumb' : 'hide-thumb';
        $lang                    = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);

        $thumb_resize_check =  true;

        if (count($slides)) {

            $return[] = '<div id="' . $id . '" class="su-post-block '.su_ecssc($atts) .' '.su_ecssc($atts) .'"'.su_scroll_reveal($atts).'>';

            $limit = 1;
            foreach ((array) $slides as $slide) {
                
                $thumb_url = su_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);  
                
                // Title condition 
                if($slide['title'] && ($show_title == 'show-title'))
                    $title = stripslashes($slide['title']);                

                $category = su_title_class($slide['category']);

                $date = ($atts['date'] === 'yes') ? '<span class="post-block-date">' . JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')) . '</span>' : '';
                $show_category = ($atts['category'] === 'yes') ? '<span class="cpb-category">' . $slide['category'] . '</span>' : '';

                if (isset($slide['introtext']) && ($show_desc == 'show-desc')) {
                    if ($atts['intro_text_limit'] != 0) {
                        $intro_text = '<div class="post-block-desc">'.su_char_limit($slide['introtext'], $atts['intro_text_limit']).'</div>';
                    }
                }


                $return[] = '
                <div class="su-post-block-item '.$category.' '. $show_thumb .' '. $show_meta .'">';

                    if (isset($thumb_url['url']) and $atts['show_thumb'] === 'yes') {
                        $return[] = '
                        <div class="supb-img-wrap">
                        	<a href="'.$slide['link'].'" title="" class="supb-thumb">
                        		<img src="'. image_media($thumb_url['url']) .'" alt="'. $title .'">
                        	</a>
                        </div>';
                    } $return[] = '       

                    <div class="supb-desc">
                        <h4><a href="'.$slide['link'].'" class="uk-link-reset" title="'. $title .'">'. $title .'</a></h4>';

	                    if ($atts['show_meta'] === 'yes') {
	                        $return[] = '
	                        <div class="supb-meta">
	                            '.$date .'
	                            '.$show_category.'
	                        </div>';
	                    } $return[] = ' 

                        '.$intro_text.'
                    </div>
                </div>';


                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '</div><div class="clearfix"></div>';
           
            suAsset::addFile('css', 'post_block.css', __FUNCTION__);

            return implode('', $return);
        }
        else{
            return alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_BLOCK_ERROR'), 'warning');
        }
    }   
}
