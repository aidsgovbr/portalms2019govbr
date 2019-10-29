<?php

/**
 * BDThemes Shortcodes Component
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

defined('_JEXEC') or die;

require_once BDT_SU_CONFIG . '/inc/tools.php';

function item_single($atts = null) {

	$atts = su_shortcode_atts(array(
		'source'                => (isset($_REQUEST["source"]))?$_REQUEST["source"]:null,
		'id'                    => (isset($_REQUEST["id"]))?$_REQUEST["id"]:null,
		'include_article_image' => (isset($_REQUEST["include_article_image"]))?$_REQUEST["include_article_image"]:null,
		'popup_category' 		=> (isset($_REQUEST["popup_category"]))?$_REQUEST["popup_category"]:null,
		'popup_date' 			=> (isset($_REQUEST["popup_date"]))?$_REQUEST["popup_date"]:null,
		'popup_image'           => (isset($_REQUEST["popup_image"]))?$_REQUEST["popup_image"]:null,
		'popup_detail_button'   => (isset($_REQUEST["popup_detail_button"]))?$_REQUEST["popup_detail_button"]:null
	    ), $atts);
	
	$data = new bdthemes_shortcodesHelperItem();

	if ($atts['source'] === 'k2') {
		$slides = $data->getDataK2($_REQUEST["id"]);   
	} elseif( $atts['source'] === 'article') {
		$slides = $data->getData($_REQUEST["id"]);
	} else {
		$slides ='';
	}

	$return = array();

	foreach ((array) $slides as $slide) {
		$category   = ($atts['popup_category'] === 'yes') ? '<div class="cpb-category">' . $slide['category'] . '</div>' : '';
		$date       = ($atts['popup_date'] === 'yes') ? '<div class="cpb-date">' . JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')) . '</div>' : '';
		$textImg    = ($atts['include_article_image'] === 'yes') ? su_all_images(@$slide['fulltext']) : null;
		$alignClass = ($atts['popup_image'] === 'yes') ? 'cbp-l-inline-right' : '';
		
	    $return[] = '
	        <div class="su-sc-single-item">
				<div class="cbp-l-project-title">'.$slide['title'].'</div>
				<div class="cbp-l-project-subtitle">'.$category.$date.'</div>';


					if ($atts['popup_image'] === 'yes') {
		                if ($textImg != null) {
		                    $return[] ='
		                        <div class="cbp-slider">
		                            <ul class="cbp-slider-wrap">
		                                <li class="cbp-slider-item"><img src="'.image_media($slide['image']).'" alt="'.$slide['title'].'"></li>';
		                                foreach ($textImg as $img) {
		                                    $return[] = '<li class="cbp-slider-item"><img src="'.image_media($img).'" alt="'.$slide['title'].'"></li>';
		                                }
		                        $return[] ='</ul>
		                    </div>';
		                } 
		                else {
		                    $return[] ='<img src="'.image_media($slide['image']).'" alt="'.$slide['title'].'">';
		                }
		            }


				 $return[] ='<div class="cbp-l-project-container">
							     <div class="cbp-project-desc">
							         <div class="cbp-l-project-desc-title"><span>'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_PD').'</span></div>
							         <div class="cbp-l-project-desc-text">
											'.su_do_shortcode($slide['introtext']).'
							         </div>';


				$return[] ='	         <br>
							         <div class="cbp-l-project-social-wrapper">
							             <iframe src="http://www.facebook.com/plugins/like.php?href='.JUri::root().$slide['link'].'&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" height="25"></iframe>
							         </div>
							         
							         <div class="cbp-l-project-social-wrapper">
							             <iframe src="https://platform.twitter.com/widgets/tweet_button.html?url='.JUri::root().$slide['link'].'&text=Check%20out%20this%20site" height="25" title="Twitter Tweet Button" style="border: 0; overflow: hidden;"></iframe>
							         </div>
							         
							         <div class="cbp-l-project-social-wrapper" style="width: 71px">
							             <iframe src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url='.JUri::root().$slide['link'].'" allowtransparency="true" frameborder="0" scrolling="no" title="+1" height="25" style="border: 0; overflow: hidden;"></iframe>
							         </div>';
				if ($atts['popup_detail_button'] === 'yes') {
					$return[] ='	<a href="'.$slide['link'].'" class="cbp-l-project-details-visit">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_VIEWDETAILS').'</a>';
				}
							         

		$return[] ='		<hr class="su-horizontal-line"><br><br><br>         
					    </div>
					</div>';

	    $return[] = '</div>';
	}

	return implode('', $return);

}

echo item_single();


die();

?>

