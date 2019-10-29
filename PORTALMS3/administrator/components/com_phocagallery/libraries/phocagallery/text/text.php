<?php
/*
 * @package Joomla
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
use Joomla\String\StringHelper;

class PhocaGalleryText
{
	public static function wordDelete($string,$length,$end = '...') {
		if (StringHelper::strlen($string) < $length || StringHelper::strlen($string) == $length) {
			return $string;
		} else {
			return StringHelper::substr($string, 0, $length) . $end;
		}
	}
	
	public static function wordDeleteWhole($string,$length,$end = '...') {
		if (StringHelper::strlen($string) < $length || StringHelper::strlen($string) == $length) {
			return $string;
		} else {
			preg_match('/(.{' . $length . '}.*?)\b/', $string, $matches);
			return rtrim($matches[1]) . $end;
		}
	}

	
	public static function strTrimAll($input) {
		$output	= '';
	    $input	= trim($input);
	    for($i=0;$i<strlen($input);$i++) {
	        if(substr($input, $i, 1) != " ") {
	            $output .= trim(substr($input, $i, 1));
	        } else {
	            $output .= " ";
	        }
	    }
	    return $output;
	}
	
	public static function getAliasName($name) {
		
		$paramsC		= JComponentHelper::getParams( 'com_phocagallery' );
		$alias_iconv	= $paramsC->get( 'alias_iconv', 0 );
		
		$iconv = 0;
		if ($alias_iconv == 1) {
			if (function_exists('iconv')) {
				$name = preg_replace('~[^\\pL0-9_.]+~u', '-', $name);
				$name = trim($name, "-");
				$name = iconv("utf-8", "us-ascii//TRANSLIT", $name);
				$name = strtolower($name);
				$name = preg_replace('~[^-a-z0-9_.]+~', '', $name);
				$iconv = 1;
			} else {
				$iconv = 0;
			}
		}
		
		if ($iconv == 0) {
			$name = JFilterOutput::stringURLSafe($name);
		}
		
		if(trim(str_replace('-','',$name)) == '') {
			JFactory::getDate()->format("Y-m-d-H-i-s");
		}
		return $name;
	}
}
?>