<?php
/**
 * @package   	JCE
 * @copyright 	Copyright (c) 2009-2013 Ryan Demmer. All rights reserved.
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   	GNU/GPL 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * JCE is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * 
 * Based on JImage library from Joomla.Platform 11.3
 */
defined('_JEXEC') or die;

require_once(dirname(__FILE__) . '/imagick/filter.php');

/**
 * Class to manipulate an image.
 */
class WFImageImagick {

    /**
     * @var    resource  The image resource handle.
     * @since  11.3
     */
    protected $handle;

    /**
     * @var    string  The source image path.
     * @since  11.3
     */
    protected $path = null;
    
    protected $type;

    /**
     * Class constructor.
     *
     * @param   mixed  $source  Either a file path for a source image or a GD resource handler for an image.
     *
     * @since   11.3
     * @throws  RuntimeException
     */
    public function __construct($source = null) {
        // Verify that GD support for PHP is available.
        if (!extension_loaded('Imagick')) {
            throw new RuntimeException('The Imagick extension for PHP is not available.');
        }

        // If the source input is a resource, set it as the image handle.
        if (is_resource($source) && (get_resource_type($source) == 'imagick')) {
            $this->handle = &$source;
        } elseif (!empty($source) && is_string($source)) {
            // If the source input is not empty, assume it is a path and populate the image handle.
            $this->loadFile($source);
        }
    }

    /**
     * Method to apply a filter to the image by type.  Two examples are: grayscale and sketchy.
     *
     * @param   string  $type     The name of the image filter to apply.
     * @param   array   $options  An array of options for the filter.
     *
     * @return  JImage
     *
     * @since   11.3
     * @see     JImageFilter
     * @throws  LogicException
     * @throws  RuntimeException
     */
    public function filter($type, array $options = array()) {
        // Get the image filter instance.
        $filter = $this->getFilterInstance($type);

        // Execute the image filter.
        $filter->execute($options);
    }

    /**
     * Method to get the height of the image in pixels.
     *
     * @return  integer
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function getHeight() {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        return $this->handle->getImageHeight();
    }

    /**
     * Method to get the width of the image in pixels.
     *
     * @return  integer
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function getWidth() {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        return $this->handle->getImageWidth();
    }

    /**
     * Method to return the path
     *
     * @return	string
     *
     * @since	11.3
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Method to determine whether or not an image has been loaded into the object.
     *
     * @return  bool
     *
     * @since   11.3
     */
    public function isLoaded() {
        // Make sure the resource handle is valid.
        if (!is_object($this->handle) || ($this->handle instanceof Imagick === false)) {
            return false;
        }

        return true;
    }

    /**
     * Method to load a file into the JImage object as the resource.
     *
     * @param   string  $path  The filesystem path to load as an image.
     *
     * @return  void
     *
     * @since   11.3
     * @throws  InvalidArgumentException
     * @throws  RuntimeException
     */
    public function loadFile($path) {
        // Make sure the file exists.
        if (!file_exists($path)) {
            throw new InvalidArgumentException('The image file does not exist.');
        }

        $this->handle = new Imagick($path);

        // Set the filesystem path to the source image.
        $this->path = $path;
        
        // set type
        $this->setType(exif_imagetype($path));
    }

    /**
     * Method to load a file into the JImage object as the resource.
     *
     * @param   string  $path  The filesystem path to load as an image.
     *
     * @return  void
     *
     * @since   11.3
     * @throws  InvalidArgumentException
     * @throws  RuntimeException
     */
    public function loadString($string) {
        $this->handle = new Imagick();

        if ($this->isLoaded()) {
            $this->handle->readImageBlob($string);
        } else {
            $this->destroy();
            throw new RuntimeException('Attempting to load an image of unsupported type.');
        }
    }

    private function watermarkText($options) {
        if (is_file($options->font_style)) {
            $watermark = new ImagickDraw;
            $watermark->setFontSize((int) $options->font_size);

            $options->font_color = '#' . preg_replace('#[^a-z0-9]+#i', '', $options->font_color);
            
            if ($options->opacity > 1) {
                $options->opacity = $options->opacity / 100;
            }
            
            switch ($options->position) {
                default:
                case 'center':
                    $watermark->setGravity(Imagick::GRAVITY_CENTER);
                    break;
                case 'top-left':
                    $watermark->setGravity(Imagick::GRAVITY_NORTHEAST);

                    break;
                case 'top-right':
                    $watermark->setGravity(Imagick::GRAVITY_NORTHEAST);

                    break;
                case 'center-left':
                    $watermark->setGravity(Imagick::GRAVITY_WEST);

                    break;
                case 'center-right':
                    $watermark->setGravity(Imagick::GRAVITY_EAST);

                    break;
                case 'top-center':
                    $watermark->setGravity(Imagick::GRAVITY_NORTH);

                    break;
                case 'bottom-center':
                    $watermark->setGravity(Imagick::GRAVITY_SOUTH);
                    break;
                case 'bottom-left':
                    $watermark->setGravity(Imagick::GRAVITY_SOUTHWEST);

                    break;
                case 'bottom-right':
                    $watermark->setGravity(Imagick::GRAVITY_SOUTHEAST);

                    break;
            }

            $watermark->setFillColor($options->font_color);
            $watermark->setFillOpacity((float) $options->opacity);
            $watermark->setFont($options->font_style);

            $this->handle->annotateImage($watermark, (int) $options->margin, (int) $options->margin, 0, $options->text);
        }
    }

    public function watermark($options) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        if ($options->opacity > 1) {
            $options->opacity = $options->opacity / 100;
        }

        if ($options->type == 'text') {
            if (isset($options->text)) {
                $this->watermarkText($options);
            }
        } else {
            if (isset($options->image)) {
                $watermark = new Imagick($options->image);

                $width = $this->getWidth();
                $height = $this->getHeight();

                $mw = $watermark->getImageWidth();
                $mh = $watermark->getImageHeight();

                switch ($options->position) {
                    default:
                    case 'center':
                        $x = floor(($width - $mw) / 2);
                        $y = floor(($height - $mh) / 2);
                        break;
                    case 'top-left':
                        $x = $options->margin;
                        $y = floor($mh / 2) + $options->margin;
                        break;
                    case 'top-right':
                        $x = $width - $mw - $options->margin;
                        $y = floor($mh / 2) + $options->margin;
                        break;
                    case 'center-left':
                        $x = 0 + $options->margin;
                        $y = floor(($height - $mh) / 2);

                        break;
                    case 'center-right':
                        $x = $width - $mw - $options->margin;
                        $y = floor(($height - $mh) / 2);

                        break;
                    case 'top-center':
                        $x = floor(($width - $mw) / 2);
                        $y = floor($mh / 2) + $options->margin;
                        break;
                    case 'bottom-center':
                        $x = floor(($width - $mw) / 2);
                        $y = $height - $mh - $options->margin;
                        break;
                    case 'bottom-left':
                        $x = 0 + $options->margin;
                        $y = $height - $mh - $options->margin;
                        break;
                    case 'bottom-right':
                        $x = $width - $mw - $options->margin;
                        $y = $height - $mh - $options->margin;
                        break;
                }
                
                if ($watermark->getImageFormat() == 'PNG') {                    
                    $watermark->evaluateImage(Imagick::EVALUATE_MULTIPLY, (float) $options->opacity, Imagick::CHANNEL_ALPHA);
                } else {
                    $watermark->setImageOpacity((float) $options->opacity);
                }
                $this->handle->compositeImage($watermark, imagick::COMPOSITE_OVER, $x, $y);
            }
        }

        return $this;
    }

    /**
     * Method to resize the current image.
     *
     * @param   mixed    $width        The width of the resized image in pixels or a percentage.
     * @param   mixed    $height       The height of the resized image in pixels or a percentage.
     * @param   bool     $createNew    If true the current image will be cloned, resized and returned; else
     * the current image will be resized and returned.
     * @param   integer  $scaleMethod  Which method to use for scaling
     *
     * @return  JImage
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function resize($width, $height, $createNew = false) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        // If we are resizing to a new image, create a new Imagick object.
        if ($createNew) {
            $this->handle = $this->handle->clone();
        }

        return $this->handle->resizeImage($width, $height, imagick::FILTER_LANCZOS, 1);
    }

    /**
     * Method to crop the current image.
     *
     * @param   mixed    $width      The width of the image section to crop in pixels or a percentage.
     * @param   mixed    $height     The height of the image section to crop in pixels or a percentage.
     * @param   integer  $left       The number of pixels from the left to start cropping.
     * @param   integer  $top        The number of pixels from the top to start cropping.
     * @param   bool     $createNew  If true the current image will be cloned, cropped and returned; else
     *                               the current image will be cropped and returned.
     *
     * @return  JImage
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function crop($width, $height, $left, $top, $createNew = false) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        // If we are cropping to a new image, create a new JImage object.
        if ($createNew) {
            $this->handle = $this->handle->clone();
            // @codeCoverageIgnoreEnd
        }

        // Create the new truecolor image handle.
        $this->handle->cropImage($width, $height, $left, $top);
    }

    /**
     * Method to rotate the current image.
     *
     * @param   mixed    $angle       The angle of rotation for the image
     * @param   integer  $background  The background color to use when areas are added due to rotation
     * @param   bool     $createNew   If true the current image will be cloned, rotated and returned; else
     * the current image will be rotated and returned.
     *
     * @return  JImage
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function rotate($angle, $background = -1, $createNew = false) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        if ($createNew) {
            $this->handle = $this->handle->clone();
        }

        $this->handle->rotateImage($background, $angle);
    }
    
    /**
     * Method to rotate the current image.
     *
     * @param   mixed    $angle       The angle of rotation for the image
     * @param   integer  $background  The background color to use when areas are added due to rotation
     * @param   bool     $createNew   If true the current image will be cloned, rotated and returned; else
     * the current image will be rotated and returned.
     *
     * @return  JImage
     *
     * @since   11.3
     * @throws  LogicException
     */
    public function flip($mode, $createNew = false) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        if ($createNew) {
            $this->handle = $this->handle->clone();
        }
        
        switch ((int) $mode) {

            case IMAGE_FLIP_HORIZONTAL:
                $this->handle->flopImage();
                break;

            case IMAGE_FLIP_VERTICAL:
                $this->handle->flipImage();
                break;

            case IMAGE_FLIP_BOTH:
                $this->handle->flipImage();
                $this->handle->flopImage();
                break;
        }
    }

    /**
     * Method to write the current image out to a file.
     *
     * @param   string   $path     The filesystem path to save the image.
     * @param   integer  $type     The image type to save the file as.
     * @param   array    $options  The image type options to use in saving the file.
     *
     * @return  void
     *
     * @see     http://www.php.net/manual/image.constants.php
     * @since   11.3
     * @throws  LogicException
     */
    public function toFile($path, $type = 'jpeg', array $options = array()) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded.');
        }

        $this->handle->setImageFormat($type);

        switch ($type) {
            case 'png':
                $this->handle->setImageCompression(imagick::COMPRESSION_ZIP);
                
                $quality    = (array_key_exists('quality', $options)) ? $options['quality'] : 0;
                
                // get as value from 0-9
                if ($quality) {
                    // png compression is a value from 0 (none) to 9 (max)
                    $quality = 100 - $quality;
                    // convert to value between 0 - 9
                    $quality = min(floor($quality / 10), 9);
                }
                
                $this->handle->setImageCompressionQuality($quality);
                break;

            case 'jpeg':
            case 'jpg':
                $this->handle->setImageCompression(Imagick::COMPRESSION_JPEG);
                $this->handle->setImageCompressionQuality((array_key_exists('quality', $options)) ? $options['quality'] : 100);
        }
        $result = $this->handle->writeImage($path);
        $this->destroy();
        
        return $result;
    }

    /**
     * Method to write the current image out to a file.
     *
     * @param   string   $path     The filesystem path to save the image.
     * @param   integer  $type     The image type to save the file as.
     * @param   array    $options  The image type options to use in saving the file.
     *
     * @return  void
     *
     * @see     http://www.php.net/manual/image.constants.php
     * @since   11.3
     * @throws  LogicException
     */
    public function toString($type = 'jpeg', array $options = array()) {
        // Make sure the resource handle is valid.
        if (!$this->isLoaded()) {
            throw new LogicException('No valid image was loaded');
        }

        $this->handle->setImageFormat($type);

        switch ($type) {
            case IMAGETYPE_PNG:
                $this->handle->setImageCompression(imagick::COMPRESSION_ZIP);
                $quality    = (array_key_exists('quality', $options)) ? $options['quality'] : 0;
                
                // get as value from 0-9
                if ($quality) {
                    // png compression is a value from 0 (none) to 9 (max)
                    $quality = 100 - $quality;
                    // convert to value between 0 - 9
                    $quality = min(floor($quality / 10), 9);
                }
                
                $this->handle->setImageCompressionQuality($quality);
                break;

            case IMAGETYPE_JPEG:
            default:
                $this->handle->setImageCompression(Imagick::COMPRESSION_JPEG);
                $this->handle->setImageCompressionQuality((array_key_exists('quality', $options)) ? $options['quality'] : 100);
        }

        print $this->handle->getImageBlob();

        $this->destroy();
    }

    /**
     * Method to get an image filter instance of a specified type.
     *
     * @param   string  $type  The image filter type to get.
     *
     * @return  JImageFilter
     *
     * @since   11.3
     * @throws  RuntimeException
     */
    protected function getFilterInstance($type) {
        // Sanitize the filter type.
        $type = strtolower(preg_replace('#[^A-Z0-9_]#i', '', $type));

        // load the filter
        require_once(dirname(__FILE__) . '/imagick/filters/' . $type . '.php');

        // Verify that the filter type exists.
        $className = 'WFImageImagickFilter' . ucfirst($type);

        if (!class_exists($className)) {
            throw new RuntimeException('The ' . ucfirst($type) . ' image filter is not available.');
        }

        // Instantiate the filter object.
        $instance = new $className($this->handle);

        // Verify that the filter type is valid.
        if (!($instance instanceof WFImageImagickFilter)) {
            throw new RuntimeException('The ' . ucfirst($type) . ' image filter is not valid.');
        }

        return $instance;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }

    public function destroy() {
        $this->handle->clear();
        $this->handle->destroy();
    }

}