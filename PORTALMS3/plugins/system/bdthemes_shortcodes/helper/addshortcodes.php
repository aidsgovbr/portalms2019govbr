<?php

/**
 * BDThemes Shortcode Ultimate
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 * Special thanks to Vladimir Anokhin who permit us to make this plugin like his shortcode ultimate wordpress plugin.
 */

// No direct access.
defined('_JEXEC') or die;

require_once BDT_SU_CONFIG.DIRECTORY_SEPARATOR.'data.php';
require_once BDT_SU_ROOT.DIRECTORY_SEPARATOR.'helper'.DIRECTORY_SEPARATOR.'assets.php';
require_once BDT_SU_ROOT.DIRECTORY_SEPARATOR.'helper'.DIRECTORY_SEPARATOR.'color.php';

class Su_Shortcodes {

    protected static $modules = array();
    protected static $mods = array();

    function __construct() {}
}


/**
 *  Register shortcodes
 *  @filename Generating shortcode file path for include shortcode file
 *  @shortcode_tag Generating shortcode tag for use in class
 *  @shortcode_class Making class name for call the shortcode
 *  @su_add_shortcode() Registering shortcode
 */

function register_shortcodes() {

    // Prepare compatibility mode prefix
    $prefix = su_cmpt();

    // Template shortcode verible
    $current_tmpl = suAsset::currentTmpl();

    $get_tmpl_shortcode = JPATH_ROOT.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$current_tmpl;


    foreach ( (array) Su_Data::shortcodes() as $id => $data ) {

        $template_shortcode = $get_tmpl_shortcode.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'plg_bdthemes_shortcodes'.DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'shortcode.php';
        $core_shortcode = BDT_SU_ROOT.DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'shortcode.php';
        if (file_exists($template_shortcode)) {
            require_once $template_shortcode;
        } elseif (file_exists($core_shortcode) ) {
           require_once $core_shortcode;
        }

        if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
        elseif ( is_callable( array( 'Su_Shortcode_'.$id, $id ) ) ) $func = array( 'Su_Shortcode_'.$id, $id );
        elseif ( is_callable( array( 'Su_Shortcode_'.$id, 'su_' . $id ) ) ) $func = array( 'Su_Shortcode_'.$id, 'su_' . $id );
        else continue;

        // Register shortcode
        su_add_shortcode( $prefix . $id, $func );
    }
}