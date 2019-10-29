<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class MDownloader extends Downloader {

    var $_id = 0;

    public function __construct($id, $to_download, $download_mode = self::DOWNLOAD_FILE) {
        parent::__construct($to_download, $download_mode);
        $this->_id = $id;
    }

    public function download() {
        $exit = false;

        if ($this->_auto_exit == true) {
            $this->_auto_exit = false;
            $exit = true;
        }
        parent::download();
        $id = $this->_id;
        $sdata = Su_FileManager::getFileInfo($id);
        $sdata->downloaded += 1;
        Su_FileManager::updateFileInfo($sdata);
        if ($exit) {
            $this->_auto_exit = true;
            exit;
        }
    }

}
