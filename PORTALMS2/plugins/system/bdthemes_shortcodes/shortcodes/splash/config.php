<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_splash_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'content'  => 'Splash screen content',
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPLASH'),
            'type'     => 'wrap',
            'group'    => 'other',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPLASH_DESC'),
            'icon'     => 'bullhorn',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'splash' ),
            'atts'     => array(
                'style' => array(
                    'type'    => 'select',
                    'default' => 'dark',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'values'  => array(
                        'dark'               => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                        'dark-boxed'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK_BOXED'),
                        'light'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                        'light-boxed'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED'),
                        'blue-boxed'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLUE_BOXED'),
                        'light-boxed-blue'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_BLUE'),
                        'light-boxed-green'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_GREEN'),
                        'light-boxed-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_ORANGE'),
                        'maintenance'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAINTENANCE')
                    ),
                    'child' => array(
                        'padding' => array(
                            'default' => '45px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
                        )
                    )
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 100,
                    'max'     => 1600,
                    'step'    => 20,
                    'default' => 480,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    'child'		=> array(
                    	'opacity' => array(
                    	    'type'    => 'slider',
                    	    'min'     => 0,
                    	    'max'     => 100,
                    	    'step'    => 5,
                    	    'default' => 80,
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPACITY'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPACITY_DESC')
                    	)
                    )
                ),
                'url' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'default' => 'http://www.bdthemes.com',
                    'child'		=> array(
                    	'onclick' => array(
                    	    'type'    => 'select',
                    	    'default' => 'close-bg',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK_DESC'),
                    	    'values'  => array(
                    	        'none'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NONE'),
                    	        'close'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE'),
                    	        'close-bg' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BG'),
                    	        'url'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL')
                    	    )
                    	)
                    )
                ),
                'delay' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 120,
                    'step'    => 1,
                    'default' => 0,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                ),
                'close' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_DESC'),
                    'child'		=> array(
                    	'esc' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'yes',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ESC'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ESC_DESC')
                    	    
                    	)
                    )
                ),
                'class' => array(
                    'default' => '',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            )
        );
    }

}
