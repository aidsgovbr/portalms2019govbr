<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_user_content extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function user_content( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array(
                'message'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_MESSAGE'),
                'color'         => '#ffcc00',
                'login_text'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN'),
                'login_url'     => JRoute::_('index.php?option=com_users&view=login'),
                'scroll_reveal' => '',
                'class'         => ''
            ), $atts, 'user_content' );

        $user = JFactory::getUser();

        if ($user->guest) {

            suAsset::addFile('css', 'user_content.css', __FUNCTION__);

            $login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';
            return '<div'.su_scroll_reveal($atts).' class="su-user_content' . su_ecssc( $atts ) . '" style="background-color:' . su_color::lighten($atts['color']) . ';border-color:' .su_color::darken( $atts['color'], '10%') . ';color:' .su_color::darken( $atts['color'], '40%') . '">' . str_replace( '%login%', $login, su_scattr( $atts['message'] ) ) . '</div>';
        }
        else return su_do_shortcode( $content );
    }
}
