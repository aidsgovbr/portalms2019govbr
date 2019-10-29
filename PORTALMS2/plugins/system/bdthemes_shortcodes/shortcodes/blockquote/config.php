<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_blockquote_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
      // blockquote
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLOCKQUOTE'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLOCKQUOTE_DESC'),
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, maiores esse temporibus accusantium quas soluta quis sed rerum. Sapiente, culpa fugit sit est laboriosam odit.',
            'icon'    => 'quote-left',
            'type'    => 'wrap',
            'group'   => 'box',
            'atts'  => array(
                'font' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        1         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        2         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        3         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_STYLE_DESC')
                ),
                'cite' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITE_DESC'),
                    'child'   => array(
                        'url' => array(
                            'values'  => array( ),
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'align' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                ),
                'pull' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PULLQUOTE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PULLQUOTE_DESC'),
                    'child' => array(
                        'italic' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC_DESC')
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
