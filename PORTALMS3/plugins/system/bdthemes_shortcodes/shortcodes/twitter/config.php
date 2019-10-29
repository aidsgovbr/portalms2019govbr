<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_twitter_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_DESC'),
            'type'  => 'single',
            'badge' => 'UPDATE',
            'group' => 'content',
            'icon'  => 'twitter',
            'atts'  => array(
                // 'style' => array(
                //     'type'    => 'select',
                //     'default' => 'default',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                //     'values'  => array(
                //         'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                //         'dark'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                //         'light'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
                //     )
                // ),
                'source' => array(
                    'type' => 'select',
                    'values' => array(
                        'user'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SU'),
                        'search'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SS')
                    ),
                    'default' => 'arrow-default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SOURCE_DESC'),
                    'child'   => array(
                        'search' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SK_DESC')
                        )
                    )
                ),
                'transitionin' => array(
                    'type'    => 'select',
                    'values'  => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
                    'default' => 'fadeIn',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN_DESC'),
                    'child'   => array(
                        'transitionout' => array(
                            'type'    => 'select',
                            'values'  => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
                            'default' => 'fadeOut',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT_DESC')
                        )
                    )
                ),
                // 'twitter_id' => array(
                //     'default' => '',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_ID'),
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_ID_DESC'),
                //     'child'   => array(
                //         'consumer_key' => array(
                //             'default' => '',
                //             'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONSUMER_KEY'),
                //             'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONSUMER_KEY_DESC')
                //         ),
                //         'consumer_secret' => array(
                //             'default' => '',
                //             'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONSUMER_SECRET'),
                //             'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONSUMER_SECRET_DESC')
                //         ),
                //         'access_token' => array(
                //             'default' => '',
                //             'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACCESS_TOKEN'),
                //             'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACCESS_TOKEN_DESC')
                //         )
                //     )
                // ),
                'font_size' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_SIZE_DESC')
                ),
                'profile_image' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_PI'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_PI_DESC'),
                    'child'   => array(
                        'date' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC')
                        )                      
                    )
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 3,
                    'max'     => 15,
                    'step'    => 1,
                    'default' => 5,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                ),
                'arrows' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    'child'   => array(
                        // 'arrow_position' => array(
                        //     'type' => 'select',
                        //     'values' => array(
                        //         'arrow-default'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        //         'arrow-top-left'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                        //         'arrow-top-right'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
                        //         'arrow-bottom-left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
                        //         'arrow-bottom-right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT')
                        //     ),
                        //     'default' => 'arrow-default',
                        //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION'),
                        //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION_DESC')
                        // ),
                        'pagination' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC')
                        ),
                        'autoplay' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                        )
                    )
                ),
                
                'speed' => array(
                    'type'    => 'slider',
                    'min'     => 0.1,
                    'max'     => 15,
                    'step'    => 0.2,
                    'default' => 0.6,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED_DESC'),
                    'child'   => array(
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 10,
                            'step'    => 1,
                            'default' => 4,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                        ),
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        ),
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
