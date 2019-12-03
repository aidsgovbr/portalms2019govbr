<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

//no direct accees
defined ('_JEXEC') or die ('Restricted access');
	

class SppagebuilderAddoncontentslider extends SppagebuilderAddons {
	

	public function render() {
		$settings = $this->addon->settings;
		//print_r($settings); // print all settings value

		$resource = ( isset($settings->resource)) ? $settings->resource : 'article';
		$catid = ( isset($settings->catid)) ? $settings->catid : '';
		$k2catid = ( isset($settings->k2catid)) ? $settings->k2catid : '';
		$limit = ( isset($settings->limit)) ? $settings->limit : 4;
		$orderby = ( isset($settings->orderby)) ? $settings->orderby : 'latest';
		$show_category = ( isset($settings->show_category)) ? $settings->show_category : 1;
		$show_date = ( isset($settings->show_date)) ? $settings->show_date : 1;
		$show_author = ( isset($settings->show_date)) ? $settings->show_date : 1;
		$intro_limit = ( isset($settings->intro_limit)) ? $settings->intro_limit : 200;
		$class = ( isset($settings->class) && $settings->class) ? ' ' . $settings->class : '';

		require_once JPATH_COMPONENT . '/helpers/articles.php';
		
		$items = SppagebuilderHelperArticles::getArticles($limit, $orderby, $catid);
		$html = '';

		if(count($items > 0)){
			$html .= '<div id="featured-slider-'.$this->addon->id.'" class="owl-carousel ts-featured-slider ts-overlay-article '.$class.'">';

			foreach($items as $item){
				$item->cat_link = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catid . ':' . urlencode($item->category_alias)));

				$cat_html = $author_html = $date_html = '';

				if($show_category){
					$cat_html = '<span class="sppb-meta-category"><a class="post-cat" href="'.$item->cat_link.'">'.$item->category.'</a></span>';
				}
				
				if($show_date){
					$date_html = '<li><i class="fa fa-clock-o"></i>' . Jhtml::_('date', $item->created, 'DATE_FORMAT_LC3') . '</li>';
				}
				
				if($show_author){
					$author_html = '<li class="author">
						'.$item->username.'	
					</li>';
				}
				
				$html .= '
				<div class="item" style="background-image:url('.$item->image_thumbnail.')">
					'.$cat_html.'
					<div class="post-overlay-content">
						<div class="post-content">
							<h3 class="post-title lg">
								<a href="'.$item->link.'">'.$item->title.'</a>
							</h3>
							<ul class="post-meta-info">
								'.$author_html . $date_html .'
								<li class="active">
									<i class="icon-fire"></i>
									'.$item->hits.'
								</li>
							</ul>
						</div>
					</div>
				</div>
				';
			}

			$html .= '</div>';
		}
		return $html;
	}

	public function js(){
		$settings = $this->addon->settings;
		$autoplay = ( isset($settings->autoplay)) ? $settings->autoplay : 'true';
		$rtl = ( isset($settings->rtl)) ? $settings->rtl : 'false';
		$pagination = ( isset($settings->pagination)) ? $settings->pagination : 'true';
		$navigation = ( isset($settings->navigation)) ? $settings->navigation : 'true';

		$js = "
		jQuery( document ).ready(function( $ ) {
			if ($('#featured-slider-".$this->addon->id."').length > 0) {
				$('#featured-slider-".$this->addon->id."').owlCarousel({
					loop: true,
					rtl: ".$rtl.",
					items: 1,
					dots: ".$pagination.",
					nav: ".$navigation.",
					autoplayTimeout: 5000,
					autoplay: true,
					autoplayHoverPause: true,
            	mouseDrag: false,
            	touchDrag:false,
					animateOut: 'slideOutLeft',
					navText: [\"<i class='fa fa-angle-left'></i>\", \"<i class='fa fa-angle-right'></i>\"],
					responsiveClass: true
				});
			}
		});
		";

		return $js;
	}

    public function css() {
        $addon_id = '#featured-slider-' . $this->addon->id;
        $settings = $this->addon->settings;
        $css = '';
        $title = (isset($settings->title)) ? $settings->title : '';

        $title_style = (isset($settings->title_margin_top) && $settings->title_margin_top ) ? 'margin-top:' . (int) $settings->title_margin_top . 'px;' : '';
        $title_style .= (isset($settings->title_margin_bottom) && $settings->title_margin_bottom ) ? 'margin-bottom:' . (int) $settings->title_margin_bottom . 'px;' : '';
        $title_style .= (isset($settings->title_fontsize) && $settings->title_fontsize ) ? 'font-size:' . $settings->title_fontsize . 'px;line-height:' . $settings->title_fontsize . 'px;' : '';
        $title_style .= (isset($settings->title_fontweight) && $settings->title_fontweight ) ? 'font-weight:' . $settings->title_fontweight . ';' : '';
        $title_style .= (isset($settings->title_text_color) && $settings->title_text_color ) ? 'color:' . $settings->title_text_color . ';' : '';

        if ($title_style && $title) {
            $css .= $addon_id . ' .ts-addon-title {';
            $css .= $title_style;
            $css .= '}';
        }
        return $css;
    }
}
