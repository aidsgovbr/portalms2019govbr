<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_section_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'content' => 'Section content',
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SECTION'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SECTION_DESC'),
            'group'   => 'extra box',
            'type'    => 'wrap',
            'icon'    => 'arrows-alt',
            'atts'    => array(
                'background_image' => array(
                    'type'    => 'upload',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_DESC' ),
                    'child'     => array(
                        'background_color' => array(
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        ),
                    	'color' => array(
                    	    'type'    => 'color',
                    	    'default' => '#333333',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC')
                    	)
                    )
                ),
                'parallax' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARALLAX'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARALLAX_DESC'),
                    'child'     => array(
                        'parallax_transition' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARALLAX_TRANSITION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARALLAX_TRANSITION_DESC')
                        ),
                        'speed' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 12,
                            'step'    => 1,
                            'default' => 10,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED_DESC')
                        )
                    )
                ),
                'background_position' => array(
                    'type'    => 'select',
                    'default' => 'center top',
                    'values'  => array(
                        'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        'left top'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_TOP'),
                        'left center'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_CENTER'),
                        'left bottom'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BOTTOM'),
                        'right top'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_TOP'),
                        'right center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_CENTER'),
                        'right bottom'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BOTTOM'),
                        'center top'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_TOP'),
                        'center center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_CENTER'),
                        'center bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_BOTTOM')
                    ),
                    'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_POSITION'),
                    'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_POSITION_DESC'),
                    'child' => array(
                        'background_repeat' => array(
                            'type'    => 'select',
                            'default' => 'repeat',
                            'values'  => array(
                                'repeat'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REPEAT'),
                                'repeat-x'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REPEAT_X'),
                                'repeat-y'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REPEAT_Y'),
                                'no-repeat' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_REPEAT')
                            ),
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_REPEAT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_REPEAT_DESC')
                        ),
                        'background_attachment' => array(
                            'type'    => 'select',
                            'default' => 'fixed',
                            'values'  => array(
                                'scroll' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL'),
                                'fixed'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FIXED')
                            ),
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_ATTACHMENT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_ATTACHMENT_DESC')
                        ),
                        'background_size' => array(
                            'type'    => 'select',
                            'default' => 'cover',
                            'values'  => array(
                                'auto'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTO'),
                                'cover'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COVER'),
                                'contain' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTAIN')
                            ),
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_SIZE_DESC')
                        ),
                    )
                ),
                'background_overlay' => array(
                    'type'    => 'upload',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_OVERLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_OVERLAY_DESC' ),
                    'child'     => array(
                        'overlay_opacity' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 1,
                            'step'    => 0.1,
                            'default' => 0.2,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OVERLAY_OPACITY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OVERLAY_OPACITY_DESC')
                        )
                    )
                ),
                'max_width' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    'default' => '90%',
                    'child'   => array(
                        'force_fullwidth' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORCE_FULLWIDTH'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORCE_FULLWIDTH_DESC')
                        )
                    )
                ),
                'margin' => array(
                    'default' => '0px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC'),
                    'child'		=> array(
                    	'padding' => array(
                    	    'default' => '30px 0px',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')
                    	),
                    	'text_align' => array(
                    	    'type'    => 'select',
                    	    'default' => 'inherit',
                    	    'values'  => array(
                                'inherit' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INHERIT'),
                                'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                                'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    	    ),
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                    	)
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #cccccc',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'text_shadow' => array(
                    'type'    => 'shadow',
                    'default' => '0 0px 0px #ffffff',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                ),
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'child'     => array(
                        'target' => array(
                            'type' => 'select',
                            'values' => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                        )
                    )
                ),
                'video_url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SECTION_VIDEO_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SECTION_VIDEO_URL_DESC'),
                    'child'     => array(
                        'video_ratio' => array(
                            'default' => 1.77,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_RATIO'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_RATIO_DESC')
                        )
                    )
                ),
                'video_loop' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_LOOP'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_LOOP_DESC'),
                    'child'     => array(
                        'video_muted' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_MUTED'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_MUTED_DESC')
                        ),
                        'video_autoplay' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                        ),
                        'video_overlay' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_OVERLAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_OVERLAY_DESC')
                        )
                    )
                ),
                'scroll_reveal' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            )
        );
    }

}
