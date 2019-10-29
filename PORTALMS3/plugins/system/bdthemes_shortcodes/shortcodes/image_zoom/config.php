<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_image_zoom_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_ZOOM'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_ZOOM_DESC'),
            'type'     => 'single',
            'group'    => 'extra content',
            'icon'     => 'image',
            'atts' => array( 
                'image' => array(
                    'type'    => 'upload',
                    'default' => 'http://lorempixel.com/400/300/food/',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
                ), 
                'type' => array(
                    'type'    => 'select',
                    'default' => 'inner',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE_DESC'),
                    'values'  => array(
                        'inner'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INNER'),
                        'standard'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STANDARD'),
                        'follow'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLLOW')
                    )
                ), 
                'smooth_move' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMOOTH_MOVE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMOOTH_MOVE_DESC')
                ), 
                'preload' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRELOAD'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRELOAD_DESC')
                ), 
                'zoom_size' => array(
                    'default' => '400,400',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_SIZE_DESC')
                ), 
                'offset' => array(
                    'default' => '10,0',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET_DESC')
                ), 
                'position' => array(
                    'type'    => 'select',
                    'default' => 'right',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                    'values'  => array(
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT')
                    )
                ), 
                'description' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_DESC')
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 10,
                    'max'     => 1600,
                    'step'    => 10,
                    'default' => 0,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
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
