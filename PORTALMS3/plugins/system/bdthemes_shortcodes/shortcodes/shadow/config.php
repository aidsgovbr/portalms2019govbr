<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_shadow_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
            'type'     => 'wrap',
            'group'    => 'extra other',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_HEADING_DESC'),
            'icon'     => 'moon-o',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'shadow' ),
            'content'  => '[panel]<img src="http://lorempixel.com/g/800/300/" alt="" />[/panel]',
            'atts'     => array(
                'style' => array(
                    'type'    => 'select',
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'values'   => array(
                        'default'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'left'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_CORNER'),
                        'right'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_CORNER'),
                        'horizontal' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL'),
                        'vertical'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL'),
                        'bottom'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM'),
                        'simple'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE')
                    )
                ),
                'inline' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE_DESC')
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
