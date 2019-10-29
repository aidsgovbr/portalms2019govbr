<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_faq_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ_DESC'),
            'icon'  => 'suitcase',
            'type'  => 'single',
            'group' => 'gallery',
            'atts'  => array(
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC'),
                    'child'   => array(
                        'limit' => array(
                            'type'    => 'slider',
                            'min'     => 5,
                            'max'     => 100,
                            'step'    => 1,
                            'default' => 12,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                        )
                    )
                ),
                'order' => array(
                        'type'     => 'select',
                        'values'   => array(
                        'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
                        'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
                     ),
                     'default' => 'created',
                     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                     'child'   => array(
                             'order_by' => array(
                                        'type'   => 'select',
                                        'values' => array(
                                        'asc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                                     ),
                                     'default' => 'desc',
                                     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
                                     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
                             )
                     )
                ),
                'loading_animation' => array(
                    'type'       => 'select',
                    'values'     => array(
                        'default' => 'Default',
                        'fadeIn' => 'Fade In',
                        'lazyLoading' => 'LazyLoading',
                        'fadeInToTop' => 'Fade In To Top',
                        'sequentially' => 'Sequentially',
                        'bottomToTop' => 'Bottom To Top'
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION_DESC'),
                    'child'   => array(
                        'filter_animation' => array(
                            'type'       => 'select',
                            'values'     => array(
                                'fadeOut' => 'Fade Out',
                                'quicksand' => 'Quicksand',
                                'boxShadow' => 'Box Shadow',
                                'bounceLeft' => 'Bounce Left',
                                'bounceTop' => 'Bounce Top',
                                'bounceBottom' => 'Bounce Bottom',
                                'moveLeft' => 'Move Left',
                                'slideLeft' => 'Slide Left',
                                'fadeOutTop' => 'Fade Out Top',
                                'sequentially' => 'Sequentially',
                                'skew' => 'Skew',
                                'slideDelay' => 'Slide Delay',
                                '3dflip' => '3d Flip',
                                'rotateSides' => 'Rotate Sides',
                                'flipOutDelay' => 'Flip Out Delay',
                                'flipOut' => 'Flip Out',
                                'unfold' => 'Unfold',
                                'foldLeft' => 'Fold Left',
                                'scaleDown' => 'Scale Down',
                                'scaleSides' => 'Scale Sides',
                                'frontRow' => 'Front Row',
                                'flipBottom' => 'Flip Bottom',
                                'rotateRoom' => 'Rotate Room'
                            ),
                            'default' => 'rotateSides',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION_DESC')
                        )
                    )
                ),
                'link_to_article' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TO_ARTILE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TO_ARTILE_DESC'),
                    'child'   => array(
                        'target' => array(
                            'type' => 'select',
                            'values' => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
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
