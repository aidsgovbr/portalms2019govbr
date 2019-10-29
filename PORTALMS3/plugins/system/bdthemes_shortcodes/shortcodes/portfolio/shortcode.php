<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_portfolio extends Su_Shortcodes {

	function __construct() {
		parent::__construct();
	}
        
        public static function portfolio($atts = null, $content = null) {
		$atts = su_shortcode_atts(array(
			'source'                => '',
			'layout'                => 'grid',
			'style'                 => 1,
			'limit'                 => 12,
			'show_more'             => 'no',
			'show_more_item'        => 4,
			'show_more_action'      => 'click', // click, auto
			'order'                 => 'created',
			'order_by'              => 'desc',
			'loading_animation'     => 'default',
			'filter_animation'      => 'rotateSides',
			'horizontal_gap'        => 10,
			'vertical_gap'          => 10,
			'filter'                => 'yes',
			'show_link'             => 'yes',
			'show_zoom'             => 'yes',
			'filter_style'          => 1,
			'filter_deeplink'       => 'no',
			'filter_align'          => 'left',
			'filter_counter'        => 'no',
			'page_deeplink'         => 'no',
			'include_article_image' => 'no',
			'large'                 => 4,
			'medium'                => 3,
			'small'                 => 1,
			'thumb_resize'          => 'yes',
			'thumb_width'           => 640,
			'thumb_height'          => 480,
			'scroll_reveal'         => '',
			'class'                 => ''
		), $atts, 'portfolio');
		$slides          = (array) Su_Tools::get_slides($atts);
		$id              = uniqid('sup');
		$intro_text      = '';
		$title           = '';    
		$return          = array();
		$filter_deeplink = ($atts['filter_deeplink'] === 'yes') ? 'true' : 'false';
		$filter_align    = ($atts['filter_align']) ? 'su-portfolio-filter-align-'.$atts['filter_align'] : '';
		$filter_counter  = '';
		$lang            = JFactory::getLanguage(); 
		$lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);
		$zoom_link_icon = '';

		if ($atts['layout'] === 'mosaic') {
			$layout = ' data-layout="mosaic"';
		} elseif ($atts['layout'] === 'masonry') {
			$layout = ' data-layout="grid"';
		} elseif ($atts['layout'] === 'slider') {
			$layout = ' data-layout="slider"';
		} else {
			$layout = ' data-layout="grid"';
		}
		if ($atts['filter_counter'] == 'yes') {
			
			if ($atts['filter_style'] == 1 or $atts['filter_style'] == 3 or $atts['filter_style'] == 8 ) {
				$filter_counter = ' (<div class="cbp-filter-counter"></div>)';
			} else {
				$filter_counter = '<div class="cbp-filter-counter"></div>';
			}
		}
		if (preg_match('/k2-category/', $atts['source'])) {
			$source = 'k2';
		} else {
			$source = 'article';
		}
		$no_zoom_link = ($atts['show_zoom'] != 'yes' and $atts['show_link'] != 'yes') ? ' sup-no-zoom-link' : '';

		if (count($slides)) {            
			suAsset::addFile('css', 'cubeportfolio.min.css');
			suAsset::addFile('js', 'cubeportfolio.min.js');
			$return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-portfolio '.su_ecssc($atts). $filter_align .$no_zoom_link.'" data-scid="' . $id . '"'.$layout.' data-loading_animation="'.$atts['loading_animation'].'" data-filter_animation="'.$atts['filter_animation'].'" data-horizontal_gap="'.intval($atts['horizontal_gap']).'" data-vertical_gap="'.intval($atts['vertical_gap']).'" data-large="'.$atts['large'].'" data-medium="'.$atts['medium'].'" data-small="'.$atts['small'].'" data-filter_deeplink="'.$filter_deeplink.'" data-loadmoreaction="'.$atts['show_more_action'].'" >';

					if ($atts['filter'] !== 'no' and ($atts['layout'] != 'slider')) {
						
						if ($atts['filter_style'] == 1) {
							$filter_style = 'su-filter-style1';
						} elseif ($atts['filter_style'] == 2) {
							$filter_style = 'cbp-l-filters-button';
						} elseif ($atts['filter_style'] == 3) {
							$filter_style = 'cbp-l-filters-alignLeft';
						} elseif ($atts['filter_style'] == 4) {
							$filter_style = 'cbp-l-filters-alignCenter';
						} elseif ($atts['filter_style'] == 5) {
							$filter_style = 'cbp-l-filters-alignRight';
						} elseif ($atts['filter_style'] == 6) {
							$filter_style = 'cbp-l-filters-buttonCenter';
						} elseif ($atts['filter_style'] == 7) {
							$filter_style = 'cbp-l-filters-work';
						} elseif ($atts['filter_style'] == 8) {
							$filter_style = 'cbp-l-filters-list';
						} elseif ($atts['filter_style'] == 9) {
							$filter_style = 'cbp-l-filters-text new_filter';
						}
						$return[] = '<div id="' . $id . '_filter" class="'.$filter_style.'">
								<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
									'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_ITEMS').$filter_counter.'
								</div>';
								$category = array();
                                                                if ($atts['show_more']==='yes'){
                                                                    $cats = Su_Tools::getSlidesCats($atts);
                                                                   
                                                                    foreach ((array)$cats as $cat) {
                                                                             if($cat->count == 0) continue;
                                                                            $category[] = $cat;
                                                                            $return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($cat->category_title).'">'.$cat->category_title.$filter_counter.'</div>';
                                                                    } 
                                                                }else{
                                                                    foreach ((array) $slides as $slide) {
									if (in_array($slide['category'], $category) ) {
										continue;
									}
									$category[] = $slide['category'];
									$return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($slide['category']).'">'.$slide['category'].$filter_counter.'</div>';
                                                                    } 
                                                                }
							$return[] ='
						</div>';
					}

			$return[] = '<div id="' . $id . '_container" class="cbp su-portfolio-style'.$atts['style'].'">';

			$limit = 1;
			foreach ((array) $slides as $slide) {

				// Title condition 
				if($slide['title'])
					$title = stripslashes($slide['title']);                

				$category = su_title_class($slide['category']);
				$item_link = JRoute::_($slide['link']);

				if ($atts['show_zoom']==='yes' or $atts['show_link']==='yes') {
					$zoom_link_icon = '<div class="sup-link-wrap">';
					if ($atts['show_zoom']==='yes') {
						$zoom_link_icon .= '<a href="'.image_media($slide['image']).'" class="su-lightbox-item sup-zoom" title="'. $title .'"></a>';
					}
					if ($atts['show_link']==='yes') {
						$zoom_link_icon .= '<a href="'.$item_link.'" class="sup-link" title="'. $title .'"></a>';
					}
					$zoom_link_icon .= '</div>';
				}

				if ($atts['style'] === '3') {
					$return[] = '<div class="cbp-item '.$category.'">
						<div class="cbp-caption">
							<div class="sup-img-wrap">';
								$return[] = su_portfolio_image($atts, $slide);
						$return[] = '</div>
						<div class="cbp-caption-activeWrap">
							<div class="sup-desc-wrap">
								<div class="sup-desc-inner">
									<div class="sup-meta-wrap">
										<a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
										<div class="sup-meta">'.$slide['category'].'</div>
									</div>';
									$return[] = $zoom_link_icon;
								$return[] = '</div>
							</div>
						</div>
						</div>
					</div>';
				}
				elseif ($atts['style'] === '9' || $atts['style'] === '10') {                  
					$return[] = '<div class="cbp-item '.$category.'">
							<div class="sup-img-wrap">';
								$return[] = su_portfolio_image($atts, $slide);
								$return[] = $zoom_link_icon;
						$return[] = '</div>
						<div class="sup-desc-wrap">
							<a href="'.$item_link.'" class="sup-title" rel="nofollow"><h4>'. $title .'</h4></a>
							<div class="sup-meta">'.$slide['category'].'</div>
						</div>
					</div>';
				}
				elseif ($atts['style'] === '4' || $atts['style'] === '5' || $atts['style'] === '7') {
					$return[] = '<div class="cbp-item '.$category.'">
						<div class="cbp-caption">
							<div class="sup-img-wrap">';
								$return[] = su_portfolio_image($atts, $slide);
						$return[] = '</div>
						<div class="cbp-caption-activeWrap">
							<div class="sup-desc-wrap">
								<div class="sup-desc-inner">';
									$return[] = $zoom_link_icon;
			
									$return[] = '<div class="sup-meta-wrap">
										<a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
										<div class="sup-meta">'.$slide['category'].'</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>';
				}
				else {                	
					$return[] = '<div class="cbp-item '.$category.'">
						<div class="cbp-caption">
							<div class="sup-img-wrap">';
								$return[] = su_portfolio_image($atts, $slide);
						$return[] = '</div>

							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignCenter">
									<div class="cbp-l-caption-body">';
										$return[] = $zoom_link_icon;
									$return[] = ' </div>
								</div>
							</div>
						</div>
						<div class="sup-meta-wrap">
							<a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
							<div class="sup-meta">'.$slide['category'].'</div>
						</div>
					</div>';
				}

				if ($limit++ == $atts['limit']) break;
			}
			$return[] = '</div><div class="clearfix"></div>';

			if ($atts['show_more']==='yes' and ($atts['layout'] != 'slider')) {
				$return[] ='<div id="' . $id . '_btn" class="cbp-l-loadMore-button">
								<a data-id="'.$id.'" href="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=portfolio&amp;layout=default').'" class="cbp-l-loadMore-link" rel="nofollow">
									<span class="cbp-l-loadMore-defaultText">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE').'</span>
									<span class="cbp-l-loadMore-loadingText">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING').'</span>
									<span class="cbp-l-loadMore-noMoreLoading">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_MORE_ITEMS').'</span>
								</a>
								<script type="text/javascript">
								   var tdata = tdata || [];
									tdata["'.$id.'"] = '.  json_encode($atts).';
									tdata["'.$id.'"]["offset"] ='.$atts["limit"].'  
								</script>
							</div>';
				
				suAsset::addFile('js', 'cbploadmore.js');
			} 
			$return[] = '</div>';

			suAsset::addFile('css', 'magnific-popup.css');
			suAsset::addFile('js', 'magnific-popup.js');

			suAsset::addFile('css', 'portfolio.css', __FUNCTION__);
			suAsset::addFile('js', 'portfolio.js', __FUNCTION__);
			return implode('', $return);
		}
		else
			return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ERROR'), 'warning');
	}   
}