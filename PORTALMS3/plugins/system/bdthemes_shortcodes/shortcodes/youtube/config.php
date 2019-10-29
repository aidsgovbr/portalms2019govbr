<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );


class Su_Shortcode_youtube_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }

    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE'),
            'type'  => 'single',
            'group' => 'media',
            'atts'  => array(
                'url' => array(
                    'values'  => array( ),
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_URL_DESC')
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 200,
                    'max'     => 1600,
                    'step'    => 20,
                    'default' => 600,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_WIDTH_DESC'),
                    'child'		=> array(
                    	'height' => array(
                    	    'type'    => 'slider',
                    	    'min'     => 200,
                    	    'max'     => 1600,
                    	    'step'    => 20,
                    	    'default' => 400,
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_HEIGHT_DESC')
                    	)
                    )
                ),
                'responsive' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC'),
                    'child'		=> array(
                    	'autoplay' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'no',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
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
            ),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_DESC'),
            'icon' => 'youtube-play'
        );
    }

}
