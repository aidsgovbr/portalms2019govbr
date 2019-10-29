<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_joint_button extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix             = su_cmpt();
		
		$left_btn_text      = (isset($this->addon->settings->left_btn_text) && $this->addon->settings->left_btn_text) ? $this->addon->settings->left_btn_text : 'Get Support';
		$right_btn_text     = (isset($this->addon->settings->right_btn_text) && $this->addon->settings->right_btn_text) ? $this->addon->settings->right_btn_text : 'Get Support';
		$middle_txt         = (isset($this->addon->settings->middle_txt) && $this->addon->settings->middle_txt) ? $this->addon->settings->middle_txt : 'Or';
		$width              = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '450px';
		
		$class              = $this->addon->settings->class;
		$left_btn_url       = $this->addon->settings->left_btn_url;
		$left_btn_target    = $this->addon->settings->left_btn_target;
		$left_btn_bg        = $this->addon->settings->left_btn_bg;
		$left_btn_hover_bg  = $this->addon->settings->left_btn_hover_bg;
		$left_btn_color     = $this->addon->settings->left_btn_color;
		$left_btn_icon      = trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->left_btn_icon));
		$right_btn_url      = $this->addon->settings->right_btn_url;
		$right_btn_target   = $this->addon->settings->right_btn_target;
		$right_btn_bg       = $this->addon->settings->right_btn_bg;
		$right_btn_hover_bg = $this->addon->settings->right_btn_hover_bg;
		$right_btn_color    = $this->addon->settings->right_btn_color;
		$right_btn_icon     = trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->right_btn_icon));
		$align              = $this->addon->settings->align;
		$radius             = $this->addon->settings->radius;

		// Output
		$output = '<div class="bdt-addon bdt-addon-joint-button ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'joint_button left_btn_text="'.$left_btn_text.'" left_btn_url="'.$left_btn_url.'" left_btn_target="'.$left_btn_target.'" left_btn_bg="'.$left_btn_bg.'" left_btn_hover_bg="'.$left_btn_hover_bg.'" left_btn_color="'.$left_btn_color.'" left_btn_icon="'.$left_btn_icon.'" middle_txt="'.$middle_txt.'" right_btn_text="'.$right_btn_text.'" right_btn_url="'.$right_btn_url.'" right_btn_target="'.$right_btn_target.'" right_btn_bg="'.$right_btn_bg.'" right_btn_hover_bg="'.$right_btn_hover_bg.'" right_btn_color="'.$right_btn_color.'" right_btn_icon="'.$right_btn_icon.'" width="'.$width.'" align="'.$align.'" radius="'.$radius.'"]');
		$output .= '</div>';

		return $output;
	}
}
