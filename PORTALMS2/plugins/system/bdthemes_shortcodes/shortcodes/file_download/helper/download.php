<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

$jinput = JFactory::getApplication()->input;
if ($jinput->getString('id') || $jinput->getString('download')) {

    require_once('file_controller.php');
    require_once('downloader.class.php');
    require_once('mdownloader.php');
    //get saved data
    $id = $jinput->getString('id')  ;
    $id = substr($id, 0, 30);

    $sdata = Su_FileManager::getFileInfo($id);
    if(!$sdata->name){
        exit;
    }
    $params  = json_decode($sdata->params);
    $file    = $sdata->name;
    $arrName = explode('/', $sdata->name);
    $save_as = $arrName[sizeof($arrName) - 1];

    if(@$params->save_as){
       $save_as = $params->save_as;
    }
    if(@$params->resumable == 'yes'){
        $resumable = true;
    } else {
        $resumable = false;
    }

    $speed = @$params->download_speed ? $params->download_speed : 5;

    $mode = Downloader::DOWNLOAD_FILE;

    $record = 0;
    // Start Download
    $downloader = new MDownloader($id, $file, $mode);
    $downloader = $downloader->resumable($resumable);
    $downloader = $downloader->speedLimit($speed);
    $downloader = $downloader->setDownloadName($save_as);
    $downloader = $downloader->autoExit(true);
    $downloader = $downloader->recordDownloaded($record);

    $downloader->download();
} else {
    echo 'File Doesn\'t Exists!';
}
