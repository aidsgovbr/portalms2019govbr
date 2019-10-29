<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_youtube_advanced_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_ADVANCED'),
            'type'  => 'single',
            'group' => 'media',
            'atts'  => array(
                'url' => array(
                    'values'  => array( ),
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_URL_DESC')
                ),
                'playlist' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYLIST'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYLIST_DESC')
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
                'controls' => array(
                    'type'   => 'select',
                    'values' => array(
                        'no'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_NO'),
                        'yes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_YES'),
                        'alt' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_ALT')
                    ),
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_DESC'),
                    'child'		=> array(
                    	'autohide' => array(
                    	    'type'   => 'select',
                    	    'values' => array(
                    	        'no'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_NO'),
                    	        'yes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_YES'),
                    	        'alt' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_ALT')
                    	    ),
                    	    'default' => 'alt',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_DESC')
                    	)
                    )
                ),
                'showinfo' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWINFO'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWINFO_DESC'),
                    'child'		=> array(
                    	'responsive' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'yes',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC'),
                    	),
                    	'autoplay' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'no',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                    	)
                    )
                ),
                
                'loop' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC'),
                    'child'		=> array(
                    	'rel' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'yes',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REL'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REL_DESC')
                    	),
                    	'fs' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'yes',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FS'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FS_DESC')
                    	)
                    )
                ),
                'modestbranding' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => 'modestbranding',
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODESTBRANDING_DESC'),
                    'child'		=> array(
                    	'theme' => array(
                    	    'type'   => 'select',
                    	    'values' => array(
                    	        'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                    	        'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
                    	    ),
                    	    'default' => 'dark',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME_DESC')
                    	)
                    )
                ),
                'wmode' => array(
                    'default' => '',
                    'name'    => JText::_('WMode'),
                    'desc'    => JText::_('Here you can specify wmode value for the embed URL. <br> Example values: <b%value>transparent</b>, <b%value>opaque</b>')
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
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_ADVANCED_DESC'),
            'icon' => 'youtube-play'
        );
    }

}
