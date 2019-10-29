<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flyout_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLYOUT'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLYOUT_DESC'),
            'content' => 'Flyout content',
            'type'    => 'wrap',
            'group'   => 'content',
            'badge'   => 'NEW',
            'icon'    => 'paper-plane-o',
            'atts'  => array(
                'style' => array(
                    'type'    => 'select',
                    'default' => 'shadow',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'values'  => array(
                        'shadow'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                        'border'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                        'transparent' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSPARENT')
                    )
                ),
                'dimension' => array(
                    'type'   => 'select',
                    'values' => array(
                        '234x60'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_23460'),
                        '468x60'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_46860'),
                        '728x90'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_72890'),
                        '120x240' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_120240'),
                        '120x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_120600'),
                        '160x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_160600'),
                        '300x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_300600'),
                        '88x31'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_8831'),
                        '300x250' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_300250'),
                        '336x280' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_336280'),
                        '125x125' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_125125'),
                        '200x200' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_200200'),
                        '250x250' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_250250')
                    ),
                    'default' => '250x250',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_DESC'),
                    'child'   => array(
                        'position' => array(
                            'type'    => 'select',
                            'default' => 'bottom-left',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                            'values'  => array(
                                'top-left'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                                'top-middle'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_MIDDLE'),
                                'top-right'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
                                'bottom-left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
                                'bottom-middle' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_MIDDLE'),
                                'bottom-right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT'),
                                'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                            )
                        )
                    )
                ),
                'offset' => array(
                    'default' => '0px, 0px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET_DESC')
                ),
                'transition_in' => array(
                    'type'    => 'select',
                    'values'  => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
                    'default' => 'fadeIn',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN_DESC'),
                    'child'   => array(
                        'transition_out' => array(
                            'type'    => 'select',
                            'values'  => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
                            'default' => 'fadeOut',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT_DESC')
                        )
                    )
                ),
                'show_close' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_CLOSE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_CLOSE_DESC'),
                    'child'   => array(
                        'close_style' => array(
                            'type'    => 'select',
                            'default' => 'circle-1',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BTN_STYLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BTN_STYLE_DESC'),
                            'values'  => array(
                                'circle-1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CIRCLE_1'),
                                'circle-2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CIRCLE_2'),
                                'labeled'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LABELED'),
                                'text'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT')
                            )
                        )
                    )
                ),
                'adblock_notice' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADBLOCK_NOTICE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADBLOCK_NOTICE_DESC')
                ),
                // 'timeout' => array(
                //     'default' => '',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMEOUT'),
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMEOUT_DESC'),
                // ),
                // 'delay' => array(
                //     'default' => '2000',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLYOUT_DELAY_DESC'),
                // ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            )
        );
    }

}
