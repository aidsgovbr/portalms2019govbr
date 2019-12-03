<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2016 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('resticted access');


class SppagebuilderAddonArticles extends SppagebuilderAddons{

	public function render(){
		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$style = (isset($this->addon->settings->style) && $this->addon->settings->style) ? $this->addon->settings->style : 'panel-default';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';

		// Addon options
		$resource 		= (isset($this->addon->settings->resource) && $this->addon->settings->resource) ? $this->addon->settings->resource : 'article';
		$catid 			= (isset($this->addon->settings->catid) && $this->addon->settings->catid) ? $this->addon->settings->catid : 0;
		$tagids 		= (isset($this->addon->settings->tagids) && $this->addon->settings->tagids) ? $this->addon->settings->tagids : array();
		$k2catid 		= (isset($this->addon->settings->k2catid) && $this->addon->settings->k2catid) ? $this->addon->settings->k2catid : 0;
		$include_subcat = (isset($this->addon->settings->include_subcat)) ? $this->addon->settings->include_subcat : 1;
		$post_type 		= (isset($this->addon->settings->post_type) && $this->addon->settings->post_type) ? $this->addon->settings->post_type : '';
		$ordering 		= (isset($this->addon->settings->ordering) && $this->addon->settings->ordering) ? $this->addon->settings->ordering : 'latest';
		$limit 			= (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : 3;
		$columns 		= (isset($this->addon->settings->columns) && $this->addon->settings->columns) ? $this->addon->settings->columns : 3;
		$show_intro 	= (isset($this->addon->settings->show_intro)) ? $this->addon->settings->show_intro : 1;
		$intro_limit 	= (isset($this->addon->settings->intro_limit) && $this->addon->settings->intro_limit) ? $this->addon->settings->intro_limit : 200;
		$hide_thumbnail = (isset($this->addon->settings->hide_thumbnail)) ? $this->addon->settings->hide_thumbnail : 0;
		$show_author 	= (isset($this->addon->settings->show_author)) ? $this->addon->settings->show_author : 1;
		$show_category 	= (isset($this->addon->settings->show_category)) ? $this->addon->settings->show_category : 1;
		$show_date 		= (isset($this->addon->settings->show_date)) ? $this->addon->settings->show_date : 1;
		$show_readmore 	= (isset($this->addon->settings->show_readmore)) ? $this->addon->settings->show_readmore : 1;
		$readmore_text 	= (isset($this->addon->settings->readmore_text) && $this->addon->settings->readmore_text) ? $this->addon->settings->readmore_text : 'Read More';
		$link_articles 	= (isset($this->addon->settings->link_articles)) ? $this->addon->settings->link_articles : 0;
		$link_catid 	= (isset($this->addon->settings->link_catid)) ? $this->addon->settings->link_catid : 0;
		$link_k2catid 	= (isset($this->addon->settings->link_k2catid)) ? $this->addon->settings->link_k2catid : 0;

		$all_articles_btn_text   = (isset($this->addon->settings->all_articles_btn_text) && $this->addon->settings->all_articles_btn_text) ? $this->addon->settings->all_articles_btn_text : 'See all posts';
		$all_articles_btn_class  = (isset($this->addon->settings->all_articles_btn_size) && $this->addon->settings->all_articles_btn_size) ? ' sppb-btn-' . $this->addon->settings->all_articles_btn_size : '';
		$all_articles_btn_class .= (isset($this->addon->settings->all_articles_btn_type) && $this->addon->settings->all_articles_btn_type) ? ' sppb-btn-' . $this->addon->settings->all_articles_btn_type : ' sppb-btn-default';
		$all_articles_btn_class .= (isset($this->addon->settings->all_articles_btn_shape) && $this->addon->settings->all_articles_btn_shape) ? ' sppb-btn-' . $this->addon->settings->all_articles_btn_shape: ' sppb-btn-rounded';
		$all_articles_btn_class .= (isset($this->addon->settings->all_articles_btn_appearance) && $this->addon->settings->all_articles_btn_appearance) ? ' sppb-btn-' . $this->addon->settings->all_articles_btn_appearance : '';
		$all_articles_btn_class .= (isset($this->addon->settings->all_articles_btn_block) && $this->addon->settings->all_articles_btn_block) ? ' ' . $this->addon->settings->all_articles_btn_block : '';
		$all_articles_btn_icon   = (isset($this->addon->settings->all_articles_btn_icon) && $this->addon->settings->all_articles_btn_icon) ? $this->addon->settings->all_articles_btn_icon : '';
		$all_articles_btn_icon_position = (isset($this->addon->settings->all_articles_btn_icon_position) && $this->addon->settings->all_articles_btn_icon_position) ? $this->addon->settings->all_articles_btn_icon_position: 'left';

		$output   = '';
		//include k2 helper
		$k2helper 		= JPATH_ROOT . '/components/com_sppagebuilder/helpers/k2.php';
		$article_helper = JPATH_ROOT . '/components/com_sppagebuilder/helpers/articles.php';
		$isk2installed  = self::isComponentInstalled('com_k2');

		if ($resource == 'k2') {
			if ($isk2installed == 0) {
				$output .= '<p class="alert alert-danger">' . JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_ERORR_K2_NOTINSTALLED') . '</p>';
				return $output;
			} elseif(!file_exists($k2helper)) {
				$output .= '<p class="alert alert-danger">' . JText::_('COM_SPPAGEBUILDER_ADDON_K2_HELPER_FILE_MISSING') . '</p>';
				return $output;
			} else {
				require_once $k2helper;
			}
			$items = SppagebuilderHelperK2::getItems($limit, $ordering, $k2catid, $include_subcat);
		} else {
			require_once $article_helper;
			$items = SppagebuilderHelperArticles::getArticles($limit, $ordering, $catid, $include_subcat, $post_type, $tagids);
		}

		if (!count($items)) {
			$output .= '<p class="alert alert-warning">' . JText::_('COM_SPPAGEBUILDER_NO_ITEMS_FOUND') . '</p>';
			return $output;
		}

		if(count((array) $items)) {
			$output  .= '<div class="sppb-addon sppb-addon-articles ' . $class . '">';

			if($title) {
				$output .= '<'.$heading_selector.' class="sppb-addon-title">' . $title . '</'.$heading_selector.'>';
			}

			$output .= '<div class="sppb-addon-content">';
			$output	.= '<div class="sppb-row">';

			foreach ($items as $key => $item) {
				$output .= '<div class="sppb-col-sm-'. round(12/$columns) .'">';
				$output .= '<div class="sppb-addon-article">';

				if(!$hide_thumbnail) {
					$image = '';
					if ($resource == 'k2') {
						if(isset($item->image_medium) && $item->image_medium){
							$image = $item->image_medium;
						} elseif(isset($item->image_large) && $item->image_large){
							$image = $item->image_medium;
						}
					} else {
						$image = $item->image_thumbnail;
					}

					if($resource != 'k2' && $item->post_format=='gallery') {
						if(count((array) $item->imagegallery->images)) {
							$output .= '<div class="sppb-carousel sppb-slide" data-sppb-ride="sppb-carousel">';
							$output .= '<div class="sppb-carousel-inner">';
							foreach ($item->imagegallery->images as $gallery_item) {
								if (isset($gallery_item['thumbnail']) && $gallery_item['thumbnail']) {
									$output .= '<div class="sppb-item">';
									$output .= '<img src="'. $gallery_item['thumbnail'] .'" alt="">';
									$output .= '</div>';
								} elseif (isset($gallery_item['full']) && $gallery_item['full']) {
									$output .= '<div class="sppb-item">';
									$output .= '<img src="'. $gallery_item['full'] .'" alt="">';
									$output .= '</div>';
								}
							}
							$output	.= '</div>';

							$output	.= '<a class="left sppb-carousel-control" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>';
							$output	.= '<a class="right sppb-carousel-control" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';

							$output .= '</div>';

						} elseif ( isset($item->image_thumbnail) && $item->image_thumbnail ) {
							$output .= '<a href="'. $item->link .'" itemprop="url"><img class="sppb-img-responsive" src="'. $item->image_thumbnail .'" alt="'. $item->title .'" itemprop="thumbnailUrl"></a>';
						}
					} elseif( $resource != 'k2' &&  $item->post_format == 'video' && isset($item->video_src) && $item->video_src ) {
						$output .= '<div class="entry-video embed-responsive embed-responsive-16by9">';
							$output .= '<object class="embed-responsive-item" style="width:100%;height:100%;" data="' . $item->video_src . '">';
								$output .= '<param name="movie" value="'. $item->video_src .'">';
								$output .= '<param name="wmode" value="transparent" />';
								$output .= '<param name="allowFullScreen" value="true">';
								$output .= '<param name="allowScriptAccess" value="always"></param>';
								$output .= '<embed src="'. $item->video_src .'" type="application/x-shockwave-flash" allowscriptaccess="always"></embed>';
							$output .= '</object>';
						$output .= '</div>';
					} elseif($resource != 'k2' && $item->post_format == 'audio' && isset($item->audio_embed) && $item->audio_embed) {
						$output .= '<div class="entry-audio embed-responsive embed-responsive-16by9">';
							$output .= $item->audio_embed;
						$output .= '</div>';
					} elseif($resource != 'k2' && $item->post_format == 'link' && isset($item->link_url) && $item->link_url) {
						$output .= '<div class="entry-link">';
							$output .= '<a target="_blank" href="' . $item->link_url .'"><h4>' . $item->link_title .'</h4></a>';
						$output .= '</div>';
					} else {
						if(isset($image) && $image) {
							$output .= '<a href="'. $item->link .'" itemprop="url" class="post-thumb"><img class="sppb-img-responsive" src="'. $image .'" alt="'. $item->title .'" itemprop="thumbnailUrl"></a>';
						}
					}
				}

				$output .= '<h3><a href="'. $item->link .'" itemprop="url">' . $item->title . '</a></h3>';

				if($show_author || $show_category || $show_date) {
					$output .= '<div class="sppb-article-meta">';
               if($show_author) {
						$author = ( $item->created_by_alias ?  $item->created_by_alias :  $item->username);
						$output .= '<span class="sppb-meta-author" itemprop="name">' . $author . '</span>';
               }
               
					if($show_date) {
						$output .= '<span class="sppb-meta-date" itemprop="datePublished"><i class="fa fa-clock-o"></i> ' . Jhtml::_('date', $item->publish_up, 'DATE_FORMAT_LC3') . '</span>';
					}

					if($show_category) {
						if ($resource == 'k2') {
	    					$item->catUrl = urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($item->catid.':'.urlencode($item->category_alias))));
		    			} else {
		    				$item->catUrl = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug));
		    			}
						$output .= '<span class="sppb-meta-category"><a href="'. $item->catUrl .'" itemprop="genre">' . $item->category . '</a></span>';
					}

				

					$output .= '</div>';
				}

				if($show_intro) {
					$output .= '<div class="sppb-article-introtext">'. substr($item->introtext, 0, $intro_limit) .'...</div>';
				}

				if($show_readmore) {
					$output .= '<a class="sppb-readmore" href="'. $item->link .'" itemprop="url">'. $readmore_text .'</a>';
				}

				$output .= '</div>';
				$output .= '</div>';
			}

			$output  .= '</div>';

			// See all link
			if($link_articles) {

				if($all_articles_btn_icon_position == 'left') {
					$all_articles_btn_text = ($all_articles_btn_icon) ? '<i class="fa ' . $all_articles_btn_icon . '"></i> ' . $all_articles_btn_text : $all_articles_btn_text;
				} else {
					$all_articles_btn_text = ($all_articles_btn_icon) ? $all_articles_btn_text . ' <i class="fa ' . $all_articles_btn_icon . '"></i>' : $all_articles_btn_text;
				}

				if ($resource == 'k2') {
					if(!empty($link_k2catid)){
						$output  .= '<a href="' . urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($link_k2catid))) . '" " id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
					}
				} else{
					if(!empty($link_catid)){
						$output  .= '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($link_catid)) . '" id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
					}
				}

			}

			$output  .= '</div>';
			$output  .= '</div>';
		}

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' .$this->addon->id;
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new JLayoutFile('addon.css.button', $layout_path);

		$options = new stdClass;
		$options->button_type = (isset($this->addon->settings->all_articles_btn_type) && $this->addon->settings->all_articles_btn_type) ? $this->addon->settings->all_articles_btn_type : '';
		$options->button_appearance = (isset($this->addon->settings->all_articles_btn_appearance) && $this->addon->settings->all_articles_btn_appearance) ? $this->addon->settings->all_articles_btn_appearance : '';
		$options->button_color = (isset($this->addon->settings->all_articles_btn_color) && $this->addon->settings->all_articles_btn_color) ? $this->addon->settings->all_articles_btn_color : '';
		$options->button_color_hover = (isset($this->addon->settings->all_articles_btn_color_hover) && $this->addon->settings->all_articles_btn_color_hover) ? $this->addon->settings->all_articles_btn_color_hover : '';
		$options->button_background_color = (isset($this->addon->settings->all_articles_btn_background_color) && $this->addon->settings->all_articles_btn_background_color) ? $this->addon->settings->all_articles_btn_background_color : '';
		$options->button_background_color_hover = (isset($this->addon->settings->all_articles_btn_background_color_hover) && $this->addon->settings->all_articles_btn_background_color_hover) ? $this->addon->settings->all_articles_btn_background_color_hover : '';
		$options->button_fontstyle = (isset($this->addon->settings->all_articles_btn_fontstyle) && $this->addon->settings->all_articles_btn_fontstyle) ? $this->addon->settings->all_articles_btn_fontstyle : '';
		$options->button_letterspace = (isset($this->addon->settings->all_articles_btn_letterspace) && $this->addon->settings->all_articles_btn_letterspace) ? $this->addon->settings->all_articles_btn_letterspace : '';

		return $css_path->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . $this->addon->id));
	}

	static function isComponentInstalled($component_name){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select( 'a.enabled' );
		$query->from($db->quoteName('#__extensions', 'a'));
		$query->where($db->quoteName('a.name')." = ".$db->quote($component_name));
		$db->setQuery($query);
		$is_enabled = $db->loadResult();
		return $is_enabled;
	}

}