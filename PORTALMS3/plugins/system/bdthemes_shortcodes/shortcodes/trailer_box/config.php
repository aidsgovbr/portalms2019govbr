<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_trailer_box_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
     
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_DESC'),
            'type'    => 'wrap',
            'group'   => 'content',
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT'),
            'icon'    => 'picture-o',
            'atts'    => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S1'),
                        '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S2'),
                        '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S3'),
                        '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S4'),
                        '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S5'),
                        '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S6'),
                        '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S7'),
                        '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S8'),
                        '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S9'),
                        '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S10'),
                        '11' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S11'),
                        '12' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S12'),
                        '13' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S13'),
                        '14' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S14'),
                        '15' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S15'),
                        '16' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S16'),
                        '17' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S17'),
                        '18' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S18'),
                        '19' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S19'),
                        '20' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S20'),
                        '21' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S21'),
                        '22' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S22'),
                        '23' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S23'),
                        '24' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S24'),
                        '25' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S25')                    ),
                    'default' => '1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'image' => array(
                    'type'    => 'upload',
                    'default' => BDT_SU_URI.'/images/no-image.jpg',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_IMG'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_IMG_DESC'),
                ),
                'color' => array(
                    'type'    => 'color',
                    'default' => '#FFFFFF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT_COLOR'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT_COLOR_DESC'),
                    'child'     => array(
                        'background' => array(
                            'type'    => 'color',
                            'default' => '#000000',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_COLOR_DESC')
                        )
                    )
                ),
                'title' => array(
                    'default' => 'Trailer Box Title',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_DESC'),
                    'child'     => array(
                        'title_color' => array(
                            'type'    => 'color',
                            'default' => '#FFFFFF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_COLOR_DESC')
                        ),
                        'title_size' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_SIZE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_SIZE_DESC')
                        )
                    )
                ),
                'align' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'left'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'child' => array(
                        'radius' => array(
                            'default' => '0px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRAILER_BOX_RADIUS_DESC')
                        )
                    )
                ),
                'url' => array(
                    'values'  => array( ),
                    'default' => '#',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'child'     => array(
                        'target' => array(
                            'type'   => 'select',
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
