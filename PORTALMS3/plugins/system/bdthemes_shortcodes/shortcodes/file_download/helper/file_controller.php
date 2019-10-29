<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_FileManager {

    function __construct() {
        
    }

    public static function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * 
     * @param string $file - File path
     * @return object data - object of file information
     */
    public static function readFile($file) {
        $myfile = fopen($file, "a+") or die("Unable to open file!");
        $jdata = fgets($myfile);
        fclose($myfile);
        return json_decode($jdata);
    }

    /**
     * 
     * @param string $file - path of file
     * @param object $data - data that need to write
     */
    public static function writeFile($file, $data) {
        if (is_object($data) || is_array($data)) {
            $myfile = fopen($file, "w") or die("Unable to open file!");
            fwrite($myfile, json_encode($data));
            fclose($myfile);
            return true;
        } else {
            $myfile = fopen($file, "w") or die("Unable to open file!");
            fwrite($myfile, "");
            fclose($myfile);
            return false;
        }
    }

    /**
     * delete all files and folders in directory including it
     * @params {string} $dirPath path to directory
     */
    public static function deleteDir($dir) {
        //detect PHP verson
        $v = phpversion();
        $vs = explode(".", $v);
        if (($vs[0] == 5 && $vs[1] >= 2) || $vs[0] > 5) {
            self::deleteDirBelow($dir);
        }
        //delete all files and folders
        if (is_dir($dir) || file_exists($dir)) {
            $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            if (is_dir($dir)) {
                rmdir($dir);
            } else {
                unlink($dir);
            }
        }
    }

    /**
     * delete all files and folders in directory including it for PHP verson below 5.2
     * @params {string} $dirPath path to directory
     */
    public static function deleteDirBelow($dirPath) {
        //delete file if $dirPath is directory
        if (!is_dir($dirPath)) {
            if (file_exists($dirPath)) {
                unlink($dirPath);
                return;
            }
        }
        //delete all file in directory
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDirBelow($file);
            } else {
                unlink($file);
            }
        }
        if (is_dir($dirPath)) {
            rmdir($dirPath);
        }
    }

    /*     * ****************
     * database
     */

    public static function getFileInfo($id, $name = null, $params = array()) {
        $dbname = '#__shortcode_file_download';

        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
                ->select('*')
                ->from($dbname)
                ->where('id = "' . $db->escape(substr($id, 0,30)).'"');
        $db->setQuery($query);
        $result = $db->loadObject();
        if (!$result) {
            $data = new stdClass();
            $data->id = $id;
            $data->liked = 0;
            $data->see = 0;
            $data->downloaded = 0;
            $data->name = $name;
            $data->liked_ip = json_encode(array());
            if($params){
                $data->params = json_encode($params);
            }
            $db->insertObject($dbname, $data);
            $result = $data;
        }
        return $result;
    }

    public static function updateFileInfo($data) {
        $dbname = '#__shortcode_file_download';
        $db = JFactory::getDbo();
        $db->updateObject($dbname, $data, array('id'));        
    }

}
