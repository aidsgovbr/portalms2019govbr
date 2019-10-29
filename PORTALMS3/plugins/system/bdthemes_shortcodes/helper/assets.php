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
 
 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class suAsset {

	protected static $asset = array();
	
	function __construct() {
	}

	/**
	 * It's add your js/css file which you want to include in your shortcode
	 * @param  string $type      File type css/js
	 * @param  string $file      File name which you want to include
	 * @param  string $shortcode From which shortcode you want to grab
	 */
	public static function addFile($type, $file, $shortcode=NULL) {
		return self::filePath($type, $file, $shortcode);
	}

	/**
	 * Detect core shortcode url
	 * @param  string $shortcode From which shortcode you want to grab 
	 */
	public static function coreURI($shortcode) {
		$corePath = BDT_SU_URI.'/shortcodes/'.$shortcode;
		return $corePath;
	}

	/**
	 * Detect current template name based on config
	 */

	public static function currentTmpl() {
		$app          = JFactory::getApplication();
		$current_tmpl = $app->getTemplate();
		$plugin       = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
		$params       = new JRegistry($plugin->params);
		$current_tmpl = ($params->get('tmpl_shortcode') != null) ? $params->get('tmpl_shortcode') : $current_tmpl;
		return $current_tmpl;
	}

	/**
	 * Detect template url
	 * @param  string $shortcode From which shortcode you want to grab 
	 */
	public static function tmplURI($shortcode) {
		$current_tmpl = self::currentTmpl();
		$tmplPath     = JURI::root().'templates/'.$current_tmpl.'/html/plg_bdthemes_shortcodes/shortcodes/'.$shortcode;
		return $tmplPath;
	}

	/**
	 * Detect core shortcode path
	 * @param  string $shortcode From which shortcode you want to grab 
	 */
	public static function corePath($shortcode) {
		$corePath = BDT_SU_ROOT.DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.$shortcode;
		return $corePath;
	}

	/**
	 * Detect Template path
	 * @param  string $shortcode From which shortcode you want to grab 
	 */
	public static function tmplPath($shortcode) {
		$current_tmpl = self::currentTmpl();
		$tmplPath = JPATH_ROOT.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$current_tmpl.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'plg_bdthemes_shortcodes'.DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.$shortcode;
		return $tmplPath;
	}

	/**
	 * It's automatically search shortcode files and add them as per needs
	 * @param  string $type      File type css/js
	 * @param  string $file      File name which you want to include
	 * @param  string $shortcode From which shortcode you want to grab
	 */
	public static function filePath($type, $file, $shortcode) {
		$tmplFile = self::tmplPath($shortcode).DIRECTORY_SEPARATOR.$type.DIRECTORY_SEPARATOR.$file;
		$coreFile = self::corePath($shortcode).DIRECTORY_SEPARATOR.$type.DIRECTORY_SEPARATOR.$file;
		$commonFile = BDT_SU_ROOT.DIRECTORY_SEPARATOR.$type.DIRECTORY_SEPARATOR.$file;
		if (file_exists($tmplFile)) {
			$assetFile = self::tmplURI($shortcode);
		} elseif (file_exists($coreFile)) {
			$assetFile = self::coreURI($shortcode);
		} elseif (file_exists($commonFile)) {
			$assetFile = BDT_SU_URI;
		}

		if (isset($assetFile)) {
			if ($type==='css') {
				$cssFile = $assetFile.'/css/'.$file;
				if (@self::$asset['css'][$file]) {
				    return;
				}
				if (@$_REQUEST["action"] == 'su_generator_preview') {
					self::$asset['css'][$file] = 1;
					echo '<link rel="stylesheet" href="'.$cssFile.'" type="text/css" />';
        			return;
				} 
				else {
					self::$asset['css'][$file] = 1;
					JFactory::getDocument()->addStyleSheet($cssFile);
					return;
				}
			} 
			elseif ($type==='js') {
				$jsFile = $assetFile.'/js/'.$file;
				if (@self::$asset['js'][$file]) {
				    return;
				}
				if (@$_REQUEST["action"] == 'su_generator_preview') {
					self::$asset['js'][$file] = 1;
					echo '<script src="'.$jsFile.'" type="text/javascript"></script>';
					return;
				} 
				else {
					self::$asset['js'][$file] = 1;
					JFactory::getDocument()->addScript($jsFile);
					return;
				}
			}
		}
	}


	/**
	 * It's add your internal css/js content into head tag
	 * @param  string $type      File type css/js
	 * @param  string $string internal css/js content which you want to add head tag
	 */
	public static function addString($type, $string) {
		if ($type === 'css' && $string != '') {
			$style = $string;
			$css_dcheck = md5($style);
			if (@self::$asset['css'][$css_dcheck]) {
			    return;
			}
			if (@$_REQUEST["action"] == 'su_generator_preview') {
				self::$asset['css'][$css_dcheck] = 1;
				$css_output = '<style type="text/css">'.$style.'</style>';
		        echo $css_output;
    			return;
			} else {
				self::$asset['css'][$css_dcheck] = 1;
				JFactory::getDocument()->addStyleDeclaration($style);
			}
		} elseif ($type === 'js' && $string != '') {
			$script = $string;
			$js_dcheck = md5($script);
			if (@self::$asset['js'][$js_dcheck]) {
			    return;
			}
			if (@$_REQUEST["action"] == 'su_generator_preview') {
				self::$asset['js'][$js_dcheck] = 1;
				echo '<script type="text/javascript">'.$script.'</script>';
				return;
			} else {
				self::$asset['js'][$js_dcheck] = 1;
				JFactory::getDocument()->addScriptDeclaration($script);
			}
		}
		return;
	}
}