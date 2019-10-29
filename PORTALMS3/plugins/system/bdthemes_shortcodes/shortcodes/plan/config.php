<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_plan_config extends Su_Data {
    static $plans = array();
    static $count_plans = 0;

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
      // plan
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN'),
            'type'     => 'wrap',
            'group'    => 'extra box',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN_DESC'),
            'icon'     => 'table',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'plan' ),
            'atts'     => array(
                'name' => array(
                    'default' => 'Standard',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC')
                ),
                'price' => array(
                    'default' => '19.99',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE_DESC'),
                    'child'   => array(
                        'old_price' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OLD_PRICE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OLD_PRICE_DESC')
                        ),
                        'before' => array(
                            'default' => '$',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_PRICE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_PRICE_DESC')
                        ),
                        'after' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_PRICE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_PRICE_DESC')
                        )
                    )
                ),
                'period' => array(
                    'default' => 'per month',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERIOD'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERIOD_DESC')
                ),
                'featured' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FEATURED'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FEATURED_DESC')
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_color' => array(
                            'type'    => 'color',
                            'default' => '#333333',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'btn_url' => array(
                    'default' => '#',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'child'   => array(
                        'btn_target' => array(
                                'type'    => 'select',
                                'default' => 'self',
                                'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TARGET'),
                                'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                                'values'  => array(
                                'self'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            )
                        )
                    )
                ),
                'btn_text' => array(
                    'default' => 'Sign up now',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC')
                ),
                'btn_color' => array(
                    'type'    => 'color',
                    'default' => '#ffffff',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child'   => array(
                        'btn_background' => array(
                            'type'    => 'color',
                            'default' => '#4FC1E9',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        ),
                        'btn_background_hover' => array(
                            'type'    => 'color',
                            'default' => '#1AA0D1',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND_DESC')
                        )
                    )
                ),
                'badge' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_DESC'),
                    'child'   => array(
                        'badge_background' => array(
                            'type'    => 'color',
                            'default' => '#999999',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_BACKGROUND_DESC')
                        )
                    )
                ),
                'color' => array(
                    'type'    => 'color',
                    'default' => '#444444',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                    'child'   => array(
                        'background' => array(
                            'type'    => 'color',
                            'default' => '#FFFFFF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN_BACKGROUND_DESC')
                        )
                    )
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'content' => sprintf( "<ul>\n<li>%s</li>\n<li>%s</li>\n<li>%s</li>\n</ul>", 'Option 1', 'Option 2', 'Option 3' )
        );
    }

}
