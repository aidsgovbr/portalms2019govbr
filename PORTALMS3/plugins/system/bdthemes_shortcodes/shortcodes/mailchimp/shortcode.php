<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_mailchimp extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function mailchimp($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'api_key'     => '',
            'email_list'  => '',
            'before_text' => '',
            'after_text'  => '',
            'button_text' => '',
            'css'         => ''
        ), $atts, 'su_mailchimp');

        $id = uniqid('sutm');

        $plugin     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params     = new JRegistry($plugin->params);

        $mailchimp_api = ( $params->get('mailchimp_key') ) ? $params->get('mailchimp_key') : $atts['api_key'];

        if ( isset ( $_POST['su_mc_email'] ) ) {

            if ( ! empty ( $mailchimp_api ) ) {

                if ( ! class_exists( 'MCAPI' ) ) {
                    include_once( dirname(__FILE__) . '/MCAPI.class.php' );
                }

                $api_key = $mailchimp_api;

                $mcapi = new MCAPI( $api_key );

                $merge_vars = Array (
                    'EMAIL' => $_POST['su_mc_email']
                );

                $list_id = $atts['email_list'];

                if ( $mcapi->listSubscribe( $list_id, $_POST['su_mc_email'], $merge_vars ) ) {
                    // It worked!
                    $msg = su_do_shortcode('[note type="success"]'. JText::_( 'PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_SUCCESS_MSG') . '[/note]');

                }
                else {
                    // An error ocurred, return error message
                    $msg = su_do_shortcode('[note type="danger"]'. JText::_( 'PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_ERROR_MSG') . '&nbsp; ' . $mcapi->errorMessage .'[/note]');
                    //$msg = '<span class="mailchimp-error"><b>' . JText::_( 'PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_ERROR_MSG') . '</b>&nbsp; ' . $mcapi->errorMessage . '</span>';
                }
            }
        }

        if ( empty( $mailchimp_api ) ) {
            echo '<div class="su-newsletter">';
            echo '<p>' . JText::_( 'PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_LIST_MISS' ) . '</p>';
            echo '  </div><!-- end newsletter-signup -->';
            return;
        }

        $output[] = '<div class="su-newsletter-wrapper">';

        // GET INTRO TEXT
        if ( ! empty( $atts['before_text'] ) ) {
            $output[] = '<p>' . $atts['before_text'] . '</p>';
        }

        $button_text = ! empty( $atts['button_text'] ) ? $atts['button_text'] : JText::_( "PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_BUTTON_TEXT" );

        $output[] = '      <form method="post" class="su-newsletter" data-url="' . JURI::base(). '" name="newsletter_form">';
        $output[] = '          <input type="text" name="su_mc_email" class="su-newsletter-email su-newsletter-field" value="" placeholder="' . JText::_( "PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_PLACEHOLDER_MAILL" ) . '" />';
        $output[] = '          <input type="hidden" name="su_list_class" class="su-lid" value="' . $atts['email_list'] . '" />';

        $output[] = '          <div class="su-newsletter-button"><input type="submit" name="submit" class="su-newsletter-submit btn su-newsletter-field" value="' . $button_text . '" /></div>';
        $output[] = '      </form>';

        if ( isset ( $msg ) ) {
            $output[] = '<span class="su_mailchimp_result su-newsletter-result">' . $msg . '</span>';
        }
        else {
            $output[] = '      <span class="su_mailchimp_result  su-newsletter-result"></span>';
        }

        // GET INTRO TEXT
        if ( ! empty( $atts['after_text'] ) ) {
            $output[] = '<p>' . $atts['after_text'] . '</p>';
        }

        $output[] = '  </div><!-- end newsletter-signup -->';

        // Css Adding in Head
        suAsset::addFile('css', 'mailchimp.css', __FUNCTION__);
                
        return implode("\n", $output);
    } 
}
