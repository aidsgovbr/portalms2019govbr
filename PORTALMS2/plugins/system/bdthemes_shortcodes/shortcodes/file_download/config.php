<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_file_download_config extends Su_Data {
    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DOWNLOAD'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DOWNLOAD_DESC'),
            'type'  => 'single',
            'group' => 'extra content media',
            'icon'  => 'download',
            'atts'     => array(
                'id' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ID'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ID_DESC')
                ),
                'url' => array(
                    'type'    => 'upload',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DESC'),
                ),
                'show_title' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TITLE_DESC'),
                    'child'   => array(
                        'custom_title' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_TITLE_DESC')
                        ),
                        'save_as' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SAVE_AS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SAVE_AS_DESC')
                        )                        
                    )
                ),
                'color' => array(
                    'type'    => 'color',
                    'default' => '#999999',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child'  => array(
                        'background' => array(
                            'type'    => 'color',
                            'default' => '#f9f9f9',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        )
                    )
                ),
                'radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                    'child'   => array(
                        'padding' => array(
                            'default' => '25px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
                        ),
                        'margin' => array(
                            'default' => '0',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')
                        )
                    )
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'show_count' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_COUNT'),
                    'desc'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_COUNT_DESC'),
                    'child'   => array(
                        'show_like_count' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LIKE_COUNT'),
                            'desc'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LIKE_COUNT_DESC')
                        ),
                        'show_download_count' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_DOWNLOAD_COUNT'),
                            'desc'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_DOWNLOAD_COUNT_DESC')
                        ),
                        'show_file_size' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILE_SIZE'),
                            'desc'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILE_SIZE_DESC')
                        )
                    )
                ),
                'resumable' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESUMABLE'),
                    'desc'    => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESUMABLE_DESC'),
                    'child'   => array(                        
                        'download_speed' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 10000,
                            'step'    => 10,
                            'default' => 500,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOAD_SPEED'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOAD_SPEED_DESC')
                        )  
                    )
                ),
                'button_text' => array(
                    'default' => 'Download Now',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_TEXT_DESC'),
                    'child'   => array(
                        'button_color' => array(
                            'type'    => 'color',
                            'default' => '#f5f5f5',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_COLOR_DESC')
                        ),
                        'button_hover_color' => array(
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_HOVER_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_HOVER_COLOR_DESC')
                        )
                    )
                ),
                'button_background' => array(
                    'type'    => 'color',
                    'default' => '#ff6a56',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND_DESC'),
                    'child'   => array(
                        'button_hover_background' => array(
                            'type'    => 'color',
                            'default' => '#ff543d',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND_DESC')
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
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC'),
                    'child'   => array(
                        'button_class' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS_DESC')
                        )
                    )
                )
            )
        );
    }

}
