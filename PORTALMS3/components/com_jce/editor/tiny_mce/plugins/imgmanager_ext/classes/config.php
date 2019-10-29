<?php

/**
 * @package   	JCE
 * @copyright 	Copyright (c) 2009-2013 Ryan Demmer. All rights reserved.
 * @license   	GNU/GPL 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * JCE is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class WFImgmanager_extPluginConfig
{
	public static function getConfig(&$settings)
	{
		require_once(dirname(__FILE__) . '/imgmanager.php');
                
                // set plugin
                JRequest::setVar('plugin', 'imgmanager_ext');
                
                $plugin = new WFImageManagerExtendedPlugin();          

                if ($plugin->getParam('inline_upload', $plugin->getParam('dragdrop_upload', 1, 0), 0)) {
                    
                    // backwards compatability
                    if (method_exists($plugin, 'getFileTypes')) {                      
                        $types = $plugin->getFileTypes();
                    } else {
                        $settings['imgmanager_ext_dragdrop_upload'] = true;
                        $types = $plugin->getBrowser()->getFileSystem()->get('filetypes');
                    }

                    $settings['imgmanager_ext_upload'] = json_encode(array(
                        'max_size'  => $plugin->getParam('max_size', 1024),
                        'filetypes' => $types
                    ));
                }
	}
}
?>