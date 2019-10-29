<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( BDT_SU_ROOT .DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.'file_download'.DIRECTORY_SEPARATOR.'helper'.DIRECTORY_SEPARATOR.'file_controller.php');

class Su_Shortcode_file_download extends Su_Shortcodes {
    function __construct() {
        parent::__construct();
    }
    public static function file_download($atts = null, $content = null) {
        $atts = su_shortcode_atts(
            array(
            'id'                      => '',
            'url'                     => '',
            'custom_title'            => '',
            'save_as'                 => '',
            'show_title'              => 'yes',
            'color'                   => '#999999',
            'background'              => '#f9f9f9',
            'radius'                  => '3px',
            'padding'                 => '25px',
            'margin'                  => '0',
            'icon'                    => 'icon: download',
            'show_count'              => 'yes',
            'show_download_count'     => 'yes',
            'show_like_count'         => 'yes',
            'resumable'               => 'yes',
            'download_speed'          => 500,
            'show_file_size'          => 'yes',
            'button_text'             => 'Download Now',
            'button_color'            => '#f5f5f5',
            'button_hover_color'      => '#ffffff',
            'button_background'       => '#ff6a56',
            'button_hover_background' => '#ff543d',
            'button_class'            => '',
            'scroll_reveal'           => '',
            'class'                   => ''
                ), $atts, 'file_download');

        $uniqid = uniqid('sufd_');
        $css[]  = '';
        $js[]   = '';
        $output = array();
        $lang   = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);



        $id = $atts['id'] ? $atts['id'] : md5($atts['url']) ;
		$id = substr($id, 0,30);
        //get saved data
        $sdata = Su_FileManager::getFileInfo($id, $atts['url']);
        
        $file = JPATH_SITE.DIRECTORY_SEPARATOR.$atts['url'];
        $file_title = $atts["custom_title"] ? $atts["custom_title"] : basename($atts['url']);

        $ldata = json_decode($sdata->liked_ip);
        if(!$ldata || !is_array($ldata)){
            $ldata = array();
        }
        $ip = Su_FileManager::getIp();
        $liked = 0;
        if(in_array($ip, $ldata)){
            $liked = 1;
        }

        if (strpos($atts['icon'], '/') !== false) {
            $atts['icon'] = '<img src="' . image_media($atts['icon']) . '" alt="" width="' . $atts['size'] . '" height="' . $atts['size'] . '" />';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $atts['icon'] = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $atts['icon'] = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
        }


        $liked_style = $liked ? 'su-fd-like' : '' ;
        $liked = (int) $sdata->liked;
        $downloaded = (int) $sdata->downloaded;


        $button_class = $atts["button_class"] ? $atts['button_class'] : '';

        

        // internal javascript
        $js[] = 'jQuery(document).ready(function() {
            jQuery("#like'.$id.'").click(function() {
                jQuery.ajax({
                    method: "POST",
                    url: "'.JRoute::_('index.php?option=com_bdthemes_shortcodes&view=like').'",
                    data: {id: "'.$id.'"},
                    dataType: "json"
                })
                .done(function(data) {
                    if (data) {
                        var nlike = data.nlike;
                        jQuery("#nlike'.$id.'").html(nlike);
                        if (data.like == 1) {
                            jQuery("#like'.$id.'").addClass("su-fd-like");
                        } else {
                            jQuery("#like'.$id.'").removeClass("su-fd-like");
                        }
                    }
                })
            });
        });';
        
        // CSS prepare
        $css[] = '#'.$uniqid.' {color: '.$atts['color'].';background: '.$atts['background'].';padding: '.$atts['padding'].';margin: '.$atts['margin'].';border-radius: '.$atts['radius'].';}';
            
        if (!$button_class) {
            $css[] = '#'.$uniqid.' .su-download-btn {color: '.$atts['button_color'].';background: '.$atts['button_background'].';}';
            $css[] = '#'.$uniqid.' .su-download-btn:hover {color: '.$atts['button_hover_color'].';background: '.$atts['button_hover_background'].';}';
        }


        // Asset added
        suAsset::addFile('css', 'file_download.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));
        suAsset::addString('js', implode("\n", $js));

        // Output HTML 
        if ($atts['url'] && file_exists($file)) {
           
            $output[] = 
                '<div'.su_scroll_reveal($atts).' id="'.$uniqid.'" class="su-download' . su_ecssc($atts) . '">

                <input type="hidden" name="id" value="'. $id.'" />

                <a class="su-download-btn '.$button_class.'"  href="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=download&amp;id='.$id).'" >'
                    .$atts['icon'].' '.$atts['button_text']
                .'</a>';

            $output[] = ($atts['show_title'] == 'yes') ? '<h4 class="su-file-name"><b>'.JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_NAME').' </b>'. $file_title.'</h4>' : '';

            @$sdata->see = $sdata->see ? $sdata->see : 0;

            $sdata->see += 1;
            $params = new stdClass();
            $params->download_speed = $atts["download_speed"];
            $params->save_as = rawurlencode($atts["save_as"]);
            $params->resumable = $atts["resumable"];        
            $sdata->params = json_encode($params);
            Su_FileManager::updateFileInfo($sdata);
            
            $output[] = '<div class="su-download-counter">';
            $output[] = ($atts['show_count'] == 'yes') ? '<span class="see"><i class="fa fa-eye"></i>'. $sdata->see .'</span>' : '';
            $output[] = ($atts['show_download_count'] == 'yes') ? '<span class="downloaded"><i class="fa fa-download"></i>'. $downloaded .'</span>' : '';
            $output[] = ($atts['show_like_count'] == 'yes') ? '<span class="like"><span class="su-dwn-like '.$liked_style.'" id="like'.$id.'" ><i class="fa fa-thumbs-up"></i></span><span class="like-number" id="nlike'.$id.'">'. $liked .'</span></span>' : '';
            $output[] = ($atts['show_file_size'] == 'yes') ? '<span class="like"><i class="fa fa-folder"></i>'. self::human_filesize(filesize($file),2) .'</span>' : '';
            $output[] = '</div>' . su_do_shortcode($content) . '</div>';
            
            return implode("\n", $output);
        }
        else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DOWNLOAD_ERROR'), 'warning');
        }       

    }
    public static function human_filesize($bytes, $decimals = 2) {
      $sz = array();
      $sz[0] = 'B';
      $sz[1] = 'KB';
      $sz[2] = 'MB';
      $sz[3] = 'GB';
      $sz[4] = 'TB';
      $sz[5] = 'PB';
      $factor = floor((strlen($bytes) - 1) / 3);
      if($factor == 0){
          return $bytes.'B';
      }
      return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }
}
