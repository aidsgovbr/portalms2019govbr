<?php

/**
 * BDThemes Shortcode Ultimate 
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Shortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 * Special thanks to Vladimir Anokhin who permit us to make this plugin like his shortcode ultimate wordpress plugin.
 */

// No direct access.
defined('_JEXEC') or die;

// Import Joomla core library
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
jimport('joomla.plugin.plugin');

define('BDT_SU_ROOT', dirname(__FILE__));
define('BDT_SU_CONFIG', dirname(__FILE__).'/config');
define('BDT_SU_HELPER', BDT_SU_ROOT.'/helper/');
define('BDT_SU_DATA', JPATH_SITE.'/media/bdthemes/');

$lang = JFactory::getLanguage(); 
$lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);

$su_app = JFactory::getApplication();
if ($su_app->isAdmin()) { 
    define('BDT_SITE_URL', JURI::root());
} else {
    define('BDT_SITE_URL', JUri::base(true).'/');
}
define('BDT_SU_URI', BDT_SITE_URL.'plugins/system/bdthemes_shortcodes');
define('BDT_SU_IMG', BDT_SU_URI.'/images/');

require_once BDT_SU_ROOT.'/helper/assets.php';
require_once BDT_SU_ROOT.'/config/inc/tools.php';
require_once BDT_SU_ROOT.'/config/inc/wp_override.php';
require_once BDT_SU_ROOT.'/helper/shortcodes.php';

class plgSystemBdthemes_Shortcodes extends JPlugin {

    var $document = NULL;
    var $baseurl = NULL;

    public function __construct(&$subject, $config) {
        parent::__construct($subject, $config);
    }

    /**
     * [onAfterRoute description]
     * @return [type] [description]
     */
    public function onAfterRoute() {

		$app               = JFactory::getApplication();
		$doc               = JFactory::getDocument();
		$current_tmpl      = $app->getTemplate();
		$current_conf_tmpl = suAsset::currentTmpl();
        JHtml::_('jquery.framework');

        // Adding shortcodes on after route 
        require_once BDT_SU_ROOT.'/helper/addshortcodes.php';    

        // Loading common css/js assets 
        $doc->addScript(BDT_SU_URI . '/js/shortcode-ultimate.js');
        $doc->addStyleSheet(BDT_SU_URI . '/css/shortcode-ultimate.css');

        // Font awesome loading by dynamic location as you need
        if ($app->isAdmin()) {
            if ($this->params->get('font-awesome-admin')=='local') {
                $doc->addStyleSheet( BDT_SU_URI . '/css/font-awesome.min.css');
            }
            elseif ($this->params->get('font-awesome-admin')=='cdn') {
                $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            }
            if ($this->params->get('shortcode_intro', 1) ) {
                $doc->addScript(BDT_SU_URI . '/js/intro.min.js');
                $doc->addStyleSheet(BDT_SU_URI . '/css/intro.min.css');
            }        
        }
        else {
            if ($this->params->get('font-awesome')=='local') {
                $doc->addStyleSheet( BDT_SU_URI . '/css/font-awesome.min.css');
            }
            elseif ($this->params->get('font-awesome')=='cdn') {
                $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            }
        }
        // if found any shortcode.css in template directory.
        $csu_css = JPATH_THEMES.DIRECTORY_SEPARATOR.$current_tmpl.'/css/shortcodes.css';
        if (file_exists($csu_css)) {
            JFactory::getDocument()->addStyleSheet(JUri::root().'templates/'.$current_tmpl.'/css/shortcodes.css');
        }

        // RTL css file for RTL supported language styling
        $lang = JFactory::getLanguage();
        if ($lang->isRTL()) {
            JFactory::getDocument()->addStyleSheet(BDT_SU_URI . '/css/rtl.css');
        }

        //all shortcode register here
        register_shortcodes();
    }

    /**
     * Settings Parameter register
     * @param  [type] $form [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function onContentPrepareForm($form, $data) {
        JForm::addFormPath(BDT_SU_ROOT.'/params');
    }
}