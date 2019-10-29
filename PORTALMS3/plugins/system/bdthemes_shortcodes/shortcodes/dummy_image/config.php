<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dummy_image_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_IMAGE'),
            'type'  => 'single',
            'group' => 'content',
            'atts'  => array(
                'theme' => array(
                    'type'   => 'select',
                    'values' => array(
                        'any'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANY'),
                        'abstract'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ABSTRACT'),
                        'animals'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMALS'),
                        'business'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUSINESS'),
                        'cats'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATS'),
                        'city'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY'),
                        'food'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOOD'),
                        'nightlife' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NIGHT_LIFE'),
                        'fashion'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FASHION'),
                        'people'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PEOPLE'),
                        'nature'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NATURE'),
                        'sports'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPORTS'),
                        'technics'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TECHNICS'),
                        'transport' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSPORT')
                    ),
                    'default' => 'any',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME_DESC')
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 10,
                    'max'     => 1600,
                    'step'    => 10,
                    'default' => 500,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    'child'   => array(
                        'height' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 1600,
                            'step'    => 10,
                            'default' => 300,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
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
            ),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_IMAGE_DESC'),
            'icon' => 'picture-o'
        );
    }

}
