<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flipbook_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK'),
            'type'  => 'single',
            'badge' => 'UPDATE',
            'group' => 'media',
            'atts'  => array(
                'type' => array(
                    'name'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE'),
                    'type'   => 'select',
                    'values' => array(
                        'thumbnail' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMBNAIL'),
                        'link'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK'),
                        'frame'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FRAME'),
                    ),
                    'default' => 'frame',
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE_DESC'),
                ),
                'src' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_SOURCE_DESC'),
                    'type'    => 'upload',
                    'default' => '',
                ),
                'thumbnail' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_THUMBNAIL_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_THUMBNAIL_SOURCE_DESC'),
                    'type'    => 'upload',
                    'default' => '',
                    'child'   => array(
                        'title' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                        ),
                    ),
                ),
                'tags' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAGS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_TAGS_DESC'),
                    'default' => '',
                ),
                'webgl' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEBGL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_WEBGL_DESC'),
                    'type'    => 'bool',
                    'default' => 'no',
                ),
                'background' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'type'    => 'color',
                    'default' => '#777777',
                ),
                'height' => array(
                    'type'    => 'slider',
                    'min'     => 100,
                    'max'     => 1600,
                    'step'    => 10,
                    'default' => 750,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
                ),
                'duration' => array(
                    'type'    => 'slider',
                    'min'     => 400,
                    'max'     => 1200,
                    'step'    => 10,
                    'default' => 800,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION_DESC')
                ),
                'downloadable' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOADABLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_DOWNLOADABLE_DESC'),
                    'type'    => 'bool',
                    'default' => 'yes',
                    'child'   => array(
                        'sound' => array(
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_SOUND_DESC'),
                            'type'    => 'bool',
                            'default' => 'yes',
                        ),
                        'mouse_scroll' => array(
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MOUSE_SCROLL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_MOUSE_SCROLL'),
                            'type'    => 'bool',
                            'default' => 'no',
                        ),
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
            ),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_DESC'),
            'icon' => 'file-pdf-o'
        );
    }

}
