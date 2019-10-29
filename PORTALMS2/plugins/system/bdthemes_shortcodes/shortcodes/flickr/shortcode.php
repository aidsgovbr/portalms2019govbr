<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flickr extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function flickr($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => '95572727@N00',
            'limit'         => '9',
            'lightbox'      => 'no',
            'radius'        => '0px',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'flickr');

        $rounded = ($atts['radius']) ? 'border-radius: ' . $atts['radius'] . ';' : '';

        $style = 'style="' . $rounded . '"';

        $image = ($atts['lightbox'] == 'yes') ? '<a class="su-lightbox" data-mfp-type="image" href="{{image_b}}" title="{{title}}"' . $style . '> ' : '';
        $image .= '<img ' . $style . ' src="{{image_s}}" alt="{{title}}" />';
        $image .= ($atts['lightbox'] == 'yes') ? '</a> ' : '';

        $unique_id = uniqid("flickr_");

        if ($atts['lightbox'] == 'yes') {
            $atts['class'] .= ' su-flickr-lightbox';
            suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js');
            suAsset::addFile('js', 'flickr-lightbox.js', __FUNCTION__);
        }
        suAsset::addFile('css', 'flickr.css', __FUNCTION__);
        suAsset::addFile('js', 'flickr.js', __FUNCTION__);

        $return = "<ul id='".$unique_id."'".su_scroll_reveal($atts)." class='flickrfeed".su_ecssc($atts)."'></ul> <div class='clear'></div>";

        echo "<script type='text/javascript'> 
              jQuery(document).ready(function() {
                      jQuery('#".$unique_id."').jflickrfeed({ 
                        limit: " . $atts['limit'] . ", qstrings: { 
                          id: '" . $atts['id'] . "'}, 
                          itemTemplate: '<li>" . addslashes($image) . "</li>' });
                    });
              </script> ";
   
        return $return;
    }
}
