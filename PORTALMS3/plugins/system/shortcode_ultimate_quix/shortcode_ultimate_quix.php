<?php

defined('_JEXEC') or die;

class plgSystemShortcode_ultimate_quix extends JPlugin {
	
	protected $autoloadLanguage = true;

    public function __construct($subject, $config) {
        
        // register your elements path
        $shortcode_element_path = JPATH_SITE . '/plugins/system/shortcode_ultimate_quix';
        // register assets loading url
        $shortcode_element_url = JUri::root() . '/plugins/system/shortcode_ultimate_quix';

        if ( file_exists( JPATH_SITE . "/libraries/quix/app/bootstrap.php" ) and file_exists( JPATH_SITE . "/plugins/system/bdthemes_shortcodes/bdthemes_shortcodes.php" ) ) {
        	jimport( 'quix.app.bootstrap' );
            jimport( 'quix.app.init' );
            quix()->getElementsBag()->fill( $shortcode_element_path . "/elements", $shortcode_element_url . "/elements" );
        }        
        parent::__construct($subject, $config);
        
    }
}
