<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flip_countdown_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
      // flip_countdown
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_COUNTDOWN'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_COUNTDOWN_DESC'),
            'type'  => 'single',
            'group' => 'box',
            'badge' => 'BETA',
            'icon'  => 'sort-numeric-desc',
            'atts'  => array(
                'datetime' => array(
                    'default' => '2020-05-01T00:00:00',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATETIME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATETIME_DESC'),
                ),
                'count_size' => array(
                    'type'    => 'select',
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_SIZE_DESC'),
                    'values'  => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'small'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL'),
                        'medium'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                        'large'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                    ),
                    'child'   => array(
                        'count_color' => array(
                            'type'    => 'select',
                            'default' => 'dark',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_COLOR_DESC'),
                            'values'  => array(
                                'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                                'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                            ),
                        ),
                        'text' => array(
                            'type'    => 'select',
                            'default' => 'dark',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TEXT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TEXT_DESC'),
                            'values'  => array(
                                'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                                'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                            ),
                        ),
                    )
                ),
                'time_name' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TIME_NAME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TIME_NAME_DESC'),
                ),
                'prefix' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX_DESC'),
                    'child'   => array(
                        'suffix' => array(
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX_DESC')
                        )
                    )
                ),
                'layout' => array(
                    'type'    => 'select',
                    'default' => 'horizontal',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_LAYOUT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_LAYOUT_DESC'),
                    'values'  => array(
                        'vertical'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_VERTICAL'),
                        'horizontal' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL'),
                    ),
                ),
                'align' => array(
                    'type'    => 'select',
                    'default' => 'left',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'values'  => array(
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                    ),
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
