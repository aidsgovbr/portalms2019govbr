<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class su_color {

    private static function lib_lighten($args) {
        list($color, $delta) = self::colorArgs($args);

        $hsl = self::toHSL($color);
        $hsl[3] = self::clamp($hsl[3] + $delta, 100);
        return self::toRGB($hsl);
    }

    private static function lib_darken($args) {
        list($color, $delta) = self::colorArgs($args);

        $hsl = self::toHSL($color);
        $hsl[3] = self::clamp($hsl[3] - $delta, 100);
        return self::toRGB($hsl);
    }

    private static function colorArgs($args) {
        if ($args[0] != 'list' || count($args[2]) < 2) {
            return array(array('color', 0, 0, 0));
        }
        list($color, $delta) = $args[2];
        if ($color[0] != 'color')
            $color = array('color', 0, 0, 0);

        $delta = floatval($delta[1]);

        return array($color, $delta);
    }

    private static function toHSL($color) {
        if ($color[0] == 'hsl') return $color;

        $r = $color[1] / 255;
        $g = $color[2] / 255;
        $b = $color[3] / 255;

        $min = min($r, $g, $b);
        $max = max($r, $g, $b);

        $L = ($min + $max) / 2;
        if ($min == $max) {
            $S = $H = 0;
        } else {
            if ($L < 0.5)
                $S = ($max - $min)/($max + $min);
            else
                $S = ($max - $min)/(2.0 - $max - $min);

            if ($r == $max) $H = ($g - $b)/($max - $min);
            elseif ($g == $max) $H = 2.0 + ($b - $r)/($max - $min);
            elseif ($b == $max) $H = 4.0 + ($r - $g)/($max - $min);

        }

        $out = array('hsl',
            ($H < 0 ? $H + 6 : $H)*60,
            $S*100,
            $L*100,
        );

        if (count($color) > 4) $out[] = $color[4]; // copy alpha
        return $out;
    }

    private static function toRGB_helper($comp, $temp1, $temp2) {
        if ($comp < 0) $comp += 1.0;
        elseif ($comp > 1) $comp -= 1.0;

        if (6 * $comp < 1) return $temp1 + ($temp2 - $temp1) * 6 * $comp;
        if (2 * $comp < 1) return $temp2;
        if (3 * $comp < 2) return $temp1 + ($temp2 - $temp1)*((2/3) - $comp) * 6;

        return $temp1;
    }

    public static function toRGB($color) {
        if ($color == 'color') return $color;

        $H = $color[1] / 360;
        $S = $color[2] / 100;
        $L = $color[3] / 100;

        if ($S == 0) {
            $r = $g = $b = $L;
        } else {
            $temp2 = $L < 0.5 ?
                $L*(1.0 + $S) :
                $L + $S - $L * $S;

            $temp1 = 2.0 * $L - $temp2;

            $r = self::toRGB_helper($H + 1/3, $temp1, $temp2);
            $g = self::toRGB_helper($H, $temp1, $temp2);
            $b = self::toRGB_helper($H - 1/3, $temp1, $temp2);
        }

        $out = array('color', round($r*255), round($g*255), round($b*255));
        if (count($color) > 4) $out[] = $color[4]; // copy alpha
        return $out;
    }

    public static function clamp($v, $max = 1, $min = 0) {
        return min($max, max($min, $v));
    }

    public static function rgbaToHex($color) {
        if ($color[0] != 'color')
            throw new exception("color expected for rgbahex");

        return sprintf("#%02x%02x%02x",
            $color[1],$color[2], $color[3]);
    }

    public static function _hexToRgb($hexStr, $returnAsString = false, $seperator = ',') {
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
        $rgbArray = array();
        $rgbArray[] = 'color';
        if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
            $colorVal = hexdec($hexStr);
            $rgbArray[] = 0xFF & ($colorVal >> 0x10);
            $rgbArray[] = 0xFF & ($colorVal >> 0x8);
            $rgbArray[] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray[] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray[] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray[] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false; //Invalid hex color code
        }

        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
    }

    public static function _inverseHex($color) {
        
        $prependHash = FALSE;

        IF(STRPOS($color,'#')!==FALSE) {
            $prependHash = TRUE;
            $color       = STR_REPLACE('#',NULL,$color);
        }

        SWITCH($len=STRLEN($color)) {
            case 3:
                $color=PREG_REPLACE("/(.)(.)(.)/","\\1\\1\\2\\2\\3\\3",$color);
            case 6:
                break;
            default:
                TRIGGER_ERROR("Invalid hex length ($len). Must be (3) or (6)", E_USER_ERROR);
        }

        IF(!PREG_MATCH('/[a-f0-9]{6}/i',$color)) {
          $color = HTMLENTITIES($color);
          TRIGGER_ERROR( "Invalid hex string #$color", E_USER_ERROR );
        }

        $r = DECHEX(255-HEXDEC(SUBSTR($color,0,2)));
        $r = (STRLEN($r)>1)?$r:'0'.$r;
        $g = DECHEX(255-HEXDEC(SUBSTR($color,2,2)));
        $g = (STRLEN($g)>1)?$g:'0'.$g;
        $b = DECHEX(255-HEXDEC(SUBSTR($color,4,2)));
        $b = (STRLEN($b)>1)?$b:'0'.$b;

        return ($prependHash?'#':NULL).$r.$g.$b;
    }




    // static method for color change

    public static function hexToRgb($hexStr, $returnAsString = false, $seperator = ','){
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr);
        $rgbArray = array();

        if (strlen($hexStr) == 6){
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3){
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false;
        }

        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray;
    }

    public static function rgba($hex, $opacity){
        return 'rgba(' . self::hexToRgb($hex, true) . ','.$opacity.')';
    }

    public static function lighten($color, $pc = '5%'){
        $pc = str_replace('%', '', $pc);
        $args = array('list', ',', array(self::_hexToRgb($color), array('%', $pc)));
        $rgb = array_slice(self::lib_lighten($args), 1);

        return self::rgbaToHex(self::lib_lighten($args));
    }

    public static function darken($color, $pc = '5%'){
        $pc = str_replace('%', '', $pc);
        $args = array('list', ',', array(self::_hexToRgb($color), array('%', $pc)));
        $rgb = array_slice(self::lib_darken($args), 1);

        return self::rgbaToHex(self::lib_darken($args));
    }

    public static function inverse($color){
        $color = self::_inverseHex($color);
        $args = self::_hexToRgb($color);
        return self::rgbaToHex($args);
    }
}