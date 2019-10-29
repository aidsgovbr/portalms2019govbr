<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_like extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function social_like( $atts, $content = null ) {
        $atts = su_shortcode_atts(array(
            'button'           => 'google',
            'button_animation' => 'to_left',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'sc_social_like');

        $id     = uniqid('sl');
        $url    = JURI::current();
        $plugin = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params = new JRegistry($plugin->params);
        $lang   = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);

        
        suAsset::addFile('css', 'social-like.css', __FUNCTION__);

        $return = "<div".su_scroll_reveal($atts)." class='social-like ". $atts['button_animation'].' '. su_ecssc($atts) ."'>";
        
        if($atts['button'] == 'facebook') {
            $return .= "<div class='sl_facebook sl_button'>";
            $return .= "<div class='sl_icon'><i class='fa fa-facebook'></i></div>";
            $return .= "<div class='sl_slide'>";
            $return .= "<p>".JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK')."</p>";
            $return .= "</div>  ";
            $return .= "<script type='text/javascript'>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = '//connect.facebook.net/en_US/all.js#xfbml=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk')); </script>";      
            $return .= "<div class='fb-like' data-width='80' data-height='20' data-colorscheme='light' data-layout='button_count' data-action='like' data-show-faces='false' data-send='false'></div></div>";
        }

        if($atts['button'] == 'linkedin') {
            $return .= "<div class='sl_linkedin sl_button'>";
            $return .= "<div class='sl_icon'><i class='fa fa-linkedin'></i></div>";
            $return .= "<div class='sl_slide'>";
            $return .= "<p>".JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKEDIN')."</p>";
            $return .= "</div>";
            $return .= "<script type='IN/Share' data-counter='right'></script>";
            $return .= "<script src='//platform.linkedin.com/in.js' type='text/javascript'>lang: en_US</script>";
            $return .= "</div>";
        }

        if($atts['button'] == 'google') {
            $return .= "<div class='sl_google sl_button'>";
            $return .= "<div class='sl_icon'><i class='fa fa-google-plus'></i></div>";
            $return .= "<div class='sl_slide'>";
            $return .= "<p>".JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE')."</p>";
            $return .= "</div>";
            $return .= "<div class='g-plusone' data-size='medium'></div>";
            $return .= "<script type='text/javascript'>";
            $return .= "(function() {var po = document.createElement('script');po.type = 'text/javascript';po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();";
            $return .= "</script></div>";
        }

        if($atts['button'] == 'twitter') {
            $return .= "<div class='sl_twitter sl_button'>";
            $return .= "<div class='sl_icon'><i class='fa fa-twitter'></i></div>";
            $return .= "<div class='sl_slide'>";
            $return .= "<p>".JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER')."</p>";
            $return .= "</div>";
            $return .= "<a href='https://twitter.com/share' class='twitter-share-button'>Tweet</a>";
            $return .= "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
            $return .= "<script type='text/javascript' src='//platform.twitter.com/widgets.js'></script>";
            $return .= "</div> ";
        }

        if($atts['button'] == 'vk') {
            if ($params->get('vkontakte_id')) {
                $return .= "<div class='sl_vk sl_button'>";
                    $return .= "<div class='sl_slide'>";
                    $return .= "<p>".JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_VK')."</p>";
                    $return .= "</div>";
                    $return .= '<script type="text/javascript" src="//vk.com/js/api/openapi.js?101"></script>';
                    $return .= '<script type="text/javascript">VK.init({apiId:'.$params->get('vkontakte_id').', onlyWidgets: true});</script>';
                    $return .= '<div id="vk'.$id.'" class="sl_vk_holder"></div>';
                    $return .= '<script type="text/javascript">VK.Widgets.Like("vk'.$id.'", {type: "button", height: 22, pageUrl:\''.$url.'\'});</script>'; 
                    $return .= "<div class='sl_icon'><i class='fa fa-vk'></i></div>";
                $return .= '</div>';
            } else {
                $return .= su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_VK_ERROR'), 'warning');
            }
        }    

        $return .= "</div>";
        return $return;
    }
}
