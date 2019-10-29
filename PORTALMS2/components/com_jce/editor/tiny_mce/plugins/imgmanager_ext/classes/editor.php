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
defined('_JEXEC') or die('RESTRICTED');

class WFImageEditor extends JObject {

    protected $prefer_imagick = false;
    
    protected $ftp = false;
    
    protected $edit = true;
    
    /**
     * @access	protected
     */
    public function __construct($config = array()) {
        // set properties
        $this->setProperties($config);
    }

    public function watermark($src, $options) {
        require_once (dirname(__FILE__) . '/image/image.php');

        if (isset($options['image'])) {
            $options['image'] = JPATH_SITE . '/' . $options['image'];
        }
        
        if (isset($options['font_style'])) {
            $options['font_style'] = JPATH_SITE . '/' . $options['font_style'];
        }

        $image = new WFImage($src, $this->get('prefer_imagick', true));

        if ($image->watermark($options)) {
            if ($this->get('ftp', 0)) {
                @JFile::write($src, $image->toString($ext));
            } else {
                @$image->toFile($src);
            }
        }

        unset($image);
        
        return $src;
    }

    public function resize($src, $dest = null, $width, $height, $quality, $sx = null, $sy = null, $sw = null, $sh = null) {
        jimport('joomla.filesystem.folder');
        jimport('joomla.filesystem.file');

        require_once (dirname(__FILE__) . '/image/image.php');

        if (!isset($dest) || $dest == '') {
            $dest = $src;
        }

        $ext = strtolower(JFile::getExt($src));
        $src = @JFile::read($src);
        
        if ($src) {
            $image = new WFImage(null, $this->get('prefer_imagick', true));
            $image->loadString($src);
            // set type
            $image->setType($ext);

            // cropped thumbnail
            if ((isset($sx) || isset($sy)) && isset($sw) && isset($sh)) {
                $image->crop($sw, $sh, $sx, $sy);
            }
            // resize
            $image->resize($width, $height);

            switch ($ext) {
                case 'jpg' :
                case 'jpeg' :
                    $quality = intval($quality);
                    if ($this->get('ftp', 0)) {
                        @JFile::write($dest, $image->toString($ext, array('quality' => $quality)));
                    } else {
                        $image->toFile($dest, $ext, array('quality' => $quality));
                    }
                    break;
                default :
                    if ($this->get('ftp', 0)) {
                        @JFile::write($dest, $image->toString($ext, array('quality' => $quality)));
                    } else {
                        $image->toFile($dest, $ext, array('quality' => $quality));
                    }
                    break;
            }

            unset($image);
            unset($result);
        }

        if (file_exists($dest)) {
            @JPath::setPermissions($dest);
            return $dest;
        }

        return false;
    }

}
