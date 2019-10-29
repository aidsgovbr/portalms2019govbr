<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_super_tabs_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_TABS'),
            'type'  => 'wrap',
            'group' => 'box',
            'badge' => 'BETA',
            'atts'  => array(
                'style' => array(
                    'type'    => 'select',
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC') ),
                    'values'  => array(
                        'default'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'flat'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT'),
                        'flatbox'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLATBOX'),
                        'round'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROUND'),
                        'outline'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OUTLINE'),
                        'underline' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNDERLINE'),
                    ),
                    'child'       => array(
                        'style_color' => array(
                            'type'    => 'color',
                            'default' => '#4FC1E9',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_COLOR_DESC')
                        )
                    )
                ),
                'animation' => array(
                    'type'    => 'select',
                    'default' => 'fade',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
                    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC') ),
                    'values'  => array(
                        'glueHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLUEHOR'),
                        'glueVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLUEVER'),
                        'foldHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDHOR'),
                        'foldVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDVER'),
                        'foldFromHor' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDFROMHOR'),
                        'foldFromVer' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDFROMVER'),
                        'roomHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROOMHOR'),
                        'roomVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROOMVER'),
                        'flitHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLITHOR'),
                        'flitVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLITVER'),
                        'hinge'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HINGE'),
                        'roll'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLL'),
                        'moveHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MOVEHOR'),
                        'moveVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MOVEVER'),
                        'fade'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADE'),
                        'fadeHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADEHOR'),
                        'fadeVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADEVER'),
                        'scaleInHor'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEINHOR'),
                        'scaleInVer'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEINVER'),
                        'scaleOutHor' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEOUTHOR'),
                        'scaleOutVer' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEOUTVER'),
                        'scalePulse'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEPULSE'),
                        'scaleWave'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALEWAVE'),
                        'roEdgeHor'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROEDGEHOR'),
                        'roEdgeVer'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROEDGEVER'),
                        'newspaper'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWSPAPER'),
                        'pushFromHor' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PUSHFROMHOR'),
                        'pushFromVer' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PUSHFROMVER'),
                        'slide'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDE'),
                        'fall'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FALL'),
                        'pulseShort'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PULSESHORT'),
                        'roSoft'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROSOFT'),
                        'roDeal'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RODEAL'),
                        'wheelHor'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHEELHOR'),
                        'wheelVer'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHEELVER'),
                        'snakeHor'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SNAKEHOR'),
                        'snakeVer'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SNAKEVER'),
                        'shuffle'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHUFFLE'),
                        'browseLeft'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BROWSELEFT'),
                        'browseRight' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BROWSERIGHT'),
                        'slideBehind' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDEBEHIND'),
                        'vacuumHor'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VACUUMHOR'),
                        'vacuumVer'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VACUUMVER'),
                        'scaleSoft'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALESOFT'),
                        'snapHor'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SNAPHOR'),
                        'snapVer'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SNAPVER'),
                        'letInHor'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LETINHOR'),
                        'letInVer'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LETINVER'),
                        'stickHor'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STICKHOR'),
                        'stickVer'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STICKVER'),
                        'growthHor'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GROWTHHOR'),
                        'growthVer'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GROWTHVER'),
                        'soEdgeHor'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOEDGEHOR'),
                        'soEdgeVer'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOEDGEVER'),
                        'shake'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHAKE'),
                        'tinHor'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TINHOR'),
                        'tinVer'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TINVER'),
                    ),
                ),
                'active' => array(
                    'type'    => 'number',
                    'min'     => 1,
                    'max'     => 25,
                    'step'    => 1,
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB_DESC')
                ),
                'align' => array(
                    'type'    => 'select',
                    'default' => 'center',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_TAB_ALIGN_DESC'),
                    'values'  => array(
                        'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'justify' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JUSTIFY'),
                    ),
                    'child'		=> array(
                        'vertical' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_DESC')
                        ),
                    	'position' => array(
                    	    'type'    => 'select',
                    	    'default' => 'top',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_TAB_POSITION_DESC'),
                            'values'  => array(
                                'top'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
                                'bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM'),
                            ),
                    	),
                    )
                ),                
                'speed' => array(
                    'type'    => 'slider',
                    'min'     => 200,
                    'max'     => 1600,
                    'step'    => 50,
                    'default' => 800,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_TAB_SPEED_DESC')
                ),
                'deeplink' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEEPLINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEEPLINK_DESC')
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
            'content' => sprintf ('%s',"[%prefix_super_tab title=\"Title 1\"]Content 1[/%prefix_super_tab]\n[%prefix_super_tab title=\"Title 2\"]Content 2[/%prefix_super_tab]\n[%prefix_super_tab title=\"Title 3\"]Content 3[/%prefix_super_tab]"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_TABS_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
