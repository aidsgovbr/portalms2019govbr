<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_contact_form extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function contact_form( $atts = null, $content = null ) {
        $atts = su_shortcode_atts(array(
            'style'              => 'default',
            'email'              => '',
            'name'               => 'yes',
            'subject'            => 'yes',
            'submit_button_text' => '',
            'label'              => 'yes',
            'textarea_height'    => 120,
            'reset'              => 'no',
            'margin'             => '',
            'captcha'            => 'no',
            'scroll_reveal'      => '',
            'class'              => ''
        ), $atts, 'contact_form');

        $id            = uniqid('sucf');
        $config        = JFactory::getConfig();
        $margin        = ($atts['margin'] != '') ? 'margin: '. $atts['margin'] : ' margin: 0 0 25px 0';
        $output        = array();
        $fields        = "";
        $lang          = JFactory::getLanguage();
        $app           = JFactory::getApplication();
        $error         = false;
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);

        if ($atts['captcha'] == 'yes') {
            //google recaptcha check
             $captcha = JCaptcha::getInstance('recaptcha');
             $html = $captcha->display(null, 'gr'.$id, 'required');
        }

        if ($atts['name']=='yes' && $atts['subject']=='yes') {
            $fields .= 'name-email-subject';
        } elseif ($atts['name']=='yes') {
           $fields .= 'name-email';
        }  elseif ($atts['subject']=='yes') {
           $fields .= 'email-subject';
        } else {
            $fields .= 'email';
        }
        $jinput = JFactory::getApplication()->input;

        if ($jinput->post->getString('email') != null) {
            $name     = ($jinput->post->getString('name')) ? $jinput->post->getString('name') : 'Unknown';
            $email    = JStringPunycode::emailToPunycode($jinput->post->getString('email'));
            $subject  = ($jinput->post->getString('subject',"") != "") ? $jinput->post->getString('subject') : $config->get( 'fromname' );
            $message  = stripslashes($jinput->post->getString('message'));
            $sitename = $app->get('sitename');
            $sitemail = $config->get( 'mailfrom' );
            $email_to = ($atts['email']) ? $atts['email'] :  $sitemail;
            
            if (!$email) {
                $error = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VALID_EMAIL');
            } elseif (!$message) {
                $error = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VALID_MESSAGE');
            }

            $captcha_enabled = JPluginHelper::isEnabled('captcha', 'recaptcha');

            if ($atts['captcha'] == 'yes' && $captcha_enabled) {
                JPluginHelper::importPlugin('captcha');
                $dispatcher = JDispatcher::getInstance();
                $grr = $dispatcher->trigger('onCheckAnswer',$jinput->post->getString('g-recaptcha-response'));
                if(!$grr[0]){
                    $error = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORM_VALID_RECAPTCHA');
                }
            }

            $fullmsg  = "<html><body style='background-color: #f5f5f5; padding: 35px;'>";
            $fullmsg .= "<div style='max-width: 768px; margin: 0 auto; background-color: #fff; padding: 35px;'>";
            $fullmsg .= nl2br($message);
            $fullmsg .= "<br><br>";
            $fullmsg .= $name . "<br>";
            $fullmsg .= $email;
            $fullmsg .= "</div>";
            $fullmsg .= "</body></html>";

            if ($error != true) {
                $mail = JFactory::getMailer();
                $mail->addRecipient($email_to);
                $mail->addReplyTo($email, $name);
                $mail->setSender(array($sitemail, $name));
                $mail->setSubject($sitename . ': ' . $subject);
                $mail->isHTML(true);
                $mail->setBody($fullmsg);
                $sent = $mail->Send();

                if ($sent !== true) {
                   $output[] = $app->enqueueMessage($error . $sent->__toString(), 'warning');
                } else {
                    $output[] = $app->enqueueMessage(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORM_SUCCESS'), 'message');
                    $output[] = $app->redirect(JRoute::_('index.php'));
                }
            } else {
                $output[] = $app->enqueueMessage($error, 'warning');
            }
        }

        suAsset::addFile('css', 'contact_form.css', __FUNCTION__);
        JHtml::_('behavior.keepalive');
        JHtml::_('behavior.formvalidator');


        $output[] = '
        <div'.su_scroll_reveal($atts).' class="su-contact-form '.$fields . su_ecssc($atts) . '" style="'.$margin.'" id="'.$id.'">
            <div class="su-form-wrapper">                                
                <div class="su-form">
                    <form name="contact_us_form" class="form-horizontal form-validate" action="' .JRoute::_('index.php'). '" method="post">
                        <div class="su-form-fields">
                            ';
                            if($atts['name']=='yes'){
                            $output[] ='
                                <div class="su-cf-group">
                                    ';
                                    $output[] =' 
                                    <div class="su-input-box">';
                                    if ($atts['label']=='yes') { $output[] ='<label for="name'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME') .'</label>';}                    
                                        $output[] ='<input type="text" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_NAME') .'" class="form-control cf-name required" name="name" id="name'.$id.'" />
                                    </div>
                                </div>';
                            }
                            $output[] ='
                            <div class="su-cf-group">
                                ';
                                                   
                                $output[] ='                             
                                <div class="su-input-box">';
                                if ($atts['label']=='yes') {$output[] ='<label for="email'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL') .'</label>';} 

                                    $output[] = '<input type="email" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_EMAIL') .'"  class="form-control cf-email required validate-email" name="email" id="email'.$id.'" />
                                </div>
                            </div>';
                            if($atts['subject']=='yes'){
                            $output[] ='
                                <div class="su-cf-group">
                                    ';
                                    $output[] =' 
                                    
                                    <div class="su-input-box">';
                                    if ($atts['label']=='yes') {$output[] ='<label for="subject'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT') .'</label>';}                    
                                        $output[] = '<input type="text" placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_SUBJECT') .'"  class="form-control cf-subject" name="subject" id="subject'.$id.'">
                                    </div>
                                </div>';
                        }
                        $output[] ='
                        </div>
                        <div class="su-cf-message-wrapper">
                            <div class="su-cf-message-content">';
                                $output[] ='                
                                <div class="su-input-box">';
                                if ($atts['label']=='yes') {$output[] ='<label for="message'.$id.'" class="su-form-label">'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_MESSAGE') .'</label>';}                    
                                    $output[] ='<textarea placeholder="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PH_MESSAGE') .'"  class="form-control cf-message required" name="message" style="height: '.$atts['textarea_height'].'px;" id="message'.$id.'"></textarea>
                                </div>
                            </div>';

                            if ($atts['captcha'] == 'yes') {
                                $output[] = '
                                <div class="su-cf-captcha-wrapper">
                                    '.$html. ' 
                                </div>';
                            }

                            $output[] ='<div class="su-cf-submit-wrapper">
                                <div class=" submit-button">';
                                    if ($atts['submit_button_text']) {
                                        $output[] ='<input name="contact_us_submit" class="btn btn-primary" type="submit" value="'. $atts['submit_button_text'] .'" />';}   
                                    else { 
                                        $output[] ='<input name="contact_us_submit" class="btn btn-primary" type="submit" value="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SEND') .'" />';}                 
                                   
                                    if($atts['reset']=='yes'){
                                        $output[] ='<input name="contact_us_reset" class="btn btn-warning" type="reset" value="'. JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET') .'" />';
                                    }
                                    $output[] = '<input type="hidden" name="return" value="' .JRoute::_('index.php'). '" />';
                                    $output[] = JHtml::_('form.token');
                                    $output[] ='
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>';

        return implode('', $output);
    }
}