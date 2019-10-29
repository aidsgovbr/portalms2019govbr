<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tooltip_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP'),
            'type'  => 'wrap',
            'group' => 'other',
            'atts'  => array(
            	'style' => array(
            	    'type'   => 'select',
            	    'values' => array(
            	        'light'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
            	        'dark'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
            	        'yellow'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YELLOW'),
            	        'green'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GREEN'),
            	        'red'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RED'),
            	        'blue'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLUE'),
            	        'youtube'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE'),
            	        'tipsy'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIPSY'),
            	        'bootstrap' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOOTSTRAP'),
            	        'jtools'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JTOOLS'),
            	        'tipped'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIPPED'),
            	        'cluetip'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLUETIP'),
            	    ),
            	    'default' => 'yellow',
            	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
            	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
            	),
                'title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                ),
                'text' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP_TEXT_DESC')
                ),
                'size' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC'),
                    'child'		=> array(
                    	'behavior' => array(
                            'type'   => 'select',
                            'values' => array(
                                'hover'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER'),
                                'click'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK'),
                                'always' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALWAYS')
                            ),
                            'default' => 'hover',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEHAVIOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEHAVIOR_DESC')   
                        ),
                        'position' => array(
                    	    'default' => 'top',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TT_POSITION'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TT_POSITION_DESC')   
                    	)
                    )
                ),
                'shadow' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP_SHADOW_DESC'),
                    'child'		=> array(
                    	'rounded' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'no',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROUND'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP_ROUND_DESC')
                    	),
                    	'close' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'no',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_DESC')
                    	)
                    )
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOOLTIP_DESC'),
            'content' => '[%prefix_button] Hover me to open tooltip [/%prefix_button]',
            'icon'    => 'comment-o'
        );
    }

}
