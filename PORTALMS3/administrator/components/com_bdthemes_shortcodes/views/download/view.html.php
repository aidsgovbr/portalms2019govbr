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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class Bdthemes_shortcodesViewDownload extends JMasterViewSU {

    /**
     * the main disply function
     */
    public function display($tpl = null) {

        $jinput = JFactory::getApplication()->input;
        /*
         * download file
         */
        if ( ($jinput->get->get('id', -1) != -1) ||  ($jinput->post->get('download', -1) != -1)) {
            require_once( BDT_SU_ROOT . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . 'file_download' . DIRECTORY_SEPARATOR . 'helper' . DIRECTORY_SEPARATOR . 'download.php');
        }
        exit;
    }

}
