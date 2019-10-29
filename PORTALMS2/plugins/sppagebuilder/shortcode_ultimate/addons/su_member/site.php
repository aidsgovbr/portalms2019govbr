<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_member extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix       = su_cmpt();
		
		$color        = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#333333';
		$photo        = (isset($this->addon->settings->photo) && $this->addon->settings->photo) ? $this->addon->settings->photo : JURI::root().'plugins/system/bdthemes_shortcodes/images/sample/member.svg';
		$name         = (isset($this->addon->settings->name) && $this->addon->settings->name) ? $this->addon->settings->name : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DEFAULT');
		$role         = (isset($this->addon->settings->role) && $this->addon->settings->role) ? $this->addon->settings->role : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DEFAULT');
		$icon_1_color = (isset($this->addon->settings->icon_1_color) && $this->addon->settings->icon_1_color) ? $this->addon->settings->icon_1_color : '#444444';
		$icon_2_color = (isset($this->addon->settings->icon_2_color) && $this->addon->settings->icon_2_color) ? $this->addon->settings->icon_2_color : '#444444';
		$icon_3_color = (isset($this->addon->settings->icon_3_color) && $this->addon->settings->icon_3_color) ? $this->addon->settings->icon_3_color : '#444444';
		$icon_4_color = (isset($this->addon->settings->icon_4_color) && $this->addon->settings->icon_4_color) ? $this->addon->settings->icon_4_color : '#444444';
		$icon_5_color = (isset($this->addon->settings->icon_5_color) && $this->addon->settings->icon_5_color) ? $this->addon->settings->icon_5_color : '#444444';
		$icon_6_color = (isset($this->addon->settings->icon_6_color) && $this->addon->settings->icon_6_color) ? $this->addon->settings->icon_6_color : '#444444';
		$icon_1       = (isset($this->addon->settings->icon_1) && $this->addon->settings->icon_1) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_1)) : '';
		$icon_2       = (isset($this->addon->settings->icon_2) && $this->addon->settings->icon_2) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_2)) : '';
		$icon_3       = (isset($this->addon->settings->icon_3) && $this->addon->settings->icon_3) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_3)) : '';
		$icon_4       = (isset($this->addon->settings->icon_4) && $this->addon->settings->icon_4) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_4)) : '';
		$icon_5       = (isset($this->addon->settings->icon_5) && $this->addon->settings->icon_5) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_5)) : '';
		$icon_6       = (isset($this->addon->settings->icon_6) && $this->addon->settings->icon_6) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_6)) : '';
		$content      = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'member]' : '';
		
		$style        = $this->addon->settings->style;
		$shadow       = $this->addon->settings->shadow;
		$text_align   = $this->addon->settings->text_align;
		$icon_1_title = $this->addon->settings->icon_1_title;
		$icon_2_title = $this->addon->settings->icon_2_title;
		$icon_3_title = $this->addon->settings->icon_3_title;
		$icon_4_title = $this->addon->settings->icon_4_title;
		$icon_5_title = $this->addon->settings->icon_5_title;
		$icon_6_title = $this->addon->settings->icon_6_title;
		$icon_1_url   = $this->addon->settings->icon_1_url;
		$icon_2_url   = $this->addon->settings->icon_2_url;
		$icon_3_url   = $this->addon->settings->icon_3_url;
		$icon_4_url   = $this->addon->settings->icon_4_url;
		$icon_5_url   = $this->addon->settings->icon_5_url;
		$icon_6_url   = $this->addon->settings->icon_6_url;
		$url          = $this->addon->settings->url;
		$class        = $this->addon->settings->class;

		// Output
		$output  = '<div class="bdt-addon bdt-addon-member ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'member style="'.$style.'" background="inherit" color="'.$color.'" border="0px solid #cccccc" shadow="'.$shadow.'" text_align="'.$text_align.'" photo="'.$photo.'" name="'.$name.'" role="'.$role.'" icon_1="'.$icon_1.'" icon_1_color="'.$icon_1_color.'" icon_1_title="'.$icon_1_title.'" icon_1_url="'.$icon_1_url.'" icon_2="'.$icon_2.'" icon_2_color="'.$icon_2_color.'" icon_2_title="'.$icon_2_title.'" icon_2_url="'.$icon_2_url.'" icon_3="'.$icon_3.'" icon_3_color="'.$icon_3_color.'" icon_3_title="'.$icon_3_title.'" icon_3_url="'.$icon_3_url.'" icon_4="'.$icon_4.'" icon_4_color="'.$icon_4_color.'" icon_4_title="'.$icon_4_title.'" icon_4_url="'.$icon_4_url.'" icon_5="'.$icon_5.'" icon_5_color="#444444" icon_5_title="'.$icon_5_title.'" icon_5_url="'.$icon_5_url.'" icon_6="'.$icon_6.'" icon_6_color="#444444" icon_6_title="'.$icon_6_title.'" icon_6_url="'.$icon_6_url.'" url="'.$url.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$style = 'margin-bottom: 0;';
		$css = '';

		if($style) {
			$css .= $addon_id . ' .su-member {';
			$css .= $style;
			$css .= '}';
		}

		return $css;
	}
}
