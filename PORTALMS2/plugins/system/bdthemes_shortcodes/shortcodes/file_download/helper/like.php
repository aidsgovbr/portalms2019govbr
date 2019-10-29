<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( 'file_controller.php' );

$ip = Su_FileManager::getIp();
$jinput = JFactory::getApplication()->input;

$id =  $jinput->getString('id') ;
if ($id) {
    $return = new stdClass();
    $sdata = Su_FileManager::getFileInfo($id);
    $ldata = json_decode($sdata->liked_ip);
    
    if (in_array($ip, $ldata)) {
        $ldata = array_delete($ldata, $ip);
         $return->like = 0;
    } else {
        $ldata[] = $ip;
         $return->like = 1;
    }
    $ldata = array_unique($ldata);
    $ldata = array_values($ldata);
    $sdata->liked_ip = json_encode($ldata);
    //get saved data
    $sdata->liked = count($ldata);
    Su_FileManager::updateFileInfo($sdata);
    $return->nlike = $sdata->liked;
    echo json_encode($return);
}

function array_delete($array, $element) {
    return array_diff($array, [$element]);
}
