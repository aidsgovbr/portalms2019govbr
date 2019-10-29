<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_table_config extends Su_Data {



    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_TABLE'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_TABLE_DESC'),
            'type'     => 'wrap',
            'group'    => 'extra box',
            'icon'     => 'table',
            'atts'     => array(                        
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
                    ),
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
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
            'content' => sprintf('%s',"[%prefix_plan name='Plan 1' price='10' before='$' period='weekly' background='#fafafa' color='#500707' border='#faf675' shadow='none' icon='icon: camera' icon_color='#333333' icon_size='48' btn_target='self' btn_background='#999999' btn_color='#ffffff']\n<ul>\n<li>Option 1</li>\n<li>Option 2</li>\n<li>Option 3</li>\n</ul>\n[/%prefix_plan]\n[%prefix_plan name='Plan 2' price='19' before='$' period='monthly' featured='yes' background='#fafafa' color='#500707' border='#faf675' shadow='none' icon='icon: camera' icon_color='#333333' icon_size='48' btn_target='self' btn_background='#999999' btn_color='#ffffff']\n<ul>\n<li>Option 1</li>\n<li>Option 2</li>\n<li>Option 3</li>\n</ul>\n[/%prefix_plan]\n[%prefix_plan name='Plan 3' price='29' before='$' period='yearly' background='#fafafa' color='#500707' border='#faf675' shadow='none' icon='icon: camera' icon_color='#333333' icon_size='48' btn_target='self' btn_background='#999999' btn_color='#ffffff']\n<ul>\n<li>Option 1</li>\n<li>Option 2</li>\n<li>Option 3</li>\n</ul>\n[/%prefix_plan]")
        );
    }

}
