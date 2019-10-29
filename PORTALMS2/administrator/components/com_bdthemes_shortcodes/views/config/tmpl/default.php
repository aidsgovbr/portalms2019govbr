<?php

/**
 * BDThemes Shortcodes Component
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet(BDT_SU_URI . '/css/generator.css');
$doc->addStyleSheet(BDT_SU_URI . '/css/simpleslider.css');
$doc->addStyleSheet(BDT_SU_URI . '/css/farbtastic-rtl.min.css');
$doc->addStyleSheet(BDT_SU_URI . '/css/farbtastic.css');
$doc->addStyleSheet(BDT_SU_URI . '/css/linea.css');


JHtml::_('bootstrap.framework');
JHtml::_('jquery.ui', array('core', 'sortable'));
$doc->addScript(BDT_SU_URI . '/js/simpleslider.js');
$doc->addScript(BDT_SU_URI . '/js/farbtastic.js');
$doc->addScript(BDT_SU_URI . '/js/generator.js');
JHtml::_('behavior.modal');


$doc->addScriptDeclaration('
    function appendHtml(targetC, htmldata) {
    var theDiv = document.getElementById(targetC);
    theDiv.innerHTML = theDiv.innerHTML + htmldata;
}

    function jInsertFieldValue(value,id) {
    if(id == "su-generator-attr-source"){
 
     var old_id = document.getElementById(id).value;
            if (old_id != "none") {
                document.getElementById(id).value = document.getElementById(id).value + ","  + value;
            }else{
            var theDiv = document.getElementById("su-generator-attr-image").innerHTML ="";
            document.getElementById(id).value = "media: "  + value;
            }
             value1 =  \'<span data-id="\' + value + \'" title="\' + this.title + \'"><img src="'.JUri::root().'\' + value + \'" alt=""/><i class="fa fa-times"></i></span>\';
             appendHtml( "su-generator-attr-image",value1);
             console.log(value1);
	    jQuery("#"+id).trigger(\'keyup\');
           
        } else {
            var old_id = document.getElementById(id).value;
            if (old_id != id) {
                document.getElementById(id).value = value;
            }
	    jQuery("#"+id).trigger(\'keyup\');
            }
        }
');

$doc->addScriptDeclaration('
    var ajaxurl      = "' . ('index.php?option=com_bdthemes_shortcodes&view=config&layout=ajax_config&e_name='.$_REQUEST['e_name']) . '"; 
    var ajaxurl_prev = "' . ('index.php?option=com_bdthemes_shortcodes&view=config&layout=ajax_config&layout=preview') . '"; 
');
?>

<div id="su-generator-wrap" style="display:block">
    <div id="su-generator">
        <div id="su-generator-header">
            <div class="su-search-wrapper">
                <a href="http://goo.gl/BCVIN6" target="_blank" title="<?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEED_HELP_DESC') ?>" class="su-help-link"><?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEED_HELP') ?></a>            
                <a href="<?php echo JUri::base().'index.php?option=com_bdthemes_shortcodes&view=config&layout=generate_html&tmpl=component' ?>" target="_blank" style="right: 85px" title="<?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEATSHEET_DESC') ?>" class="su-help-link"><?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEATSHEET') ?></a>
                <input type="text" name="su_generator_search" id="su-generator-search" value="" placeholder="<?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEARCH_DESC') ?>" />
                <span class="su-search-hints"><?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEARCH_HINTS'); ?></span>
            </div>
            <div id="su-generator-filter">
                <strong><?php echo JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_DESC') ?></strong>
                <?php
                foreach ((array) Su_Data::groups() as $group => $label)
                    echo '<a href="#" data-filter="' . $group . '">' . $label . '</a>';
                ?>
            </div>
            <div id="su-generator-choices" class="su-generator-clearfix">
                <?php
                // Choices loop
                foreach ((array) Su_Data::shortcodes() as $name => $shortcode) {
                    $icon = ( isset($shortcode['icon']) ) ? $shortcode['icon'] : 'puzzle-piece';
                    $badge = (isset($shortcode['badge'])) ? '<strong class="sug-badge badge-'.strtolower($shortcode['badge']).'">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODE_'.$shortcode['badge']).'</strong>' : '';
                    $shortcode['name'] = ( isset($shortcode['name']) ) ? $shortcode['name'] : $name;
                    $visible = isset($shortcode['visible']) ? $shortcode['visible'] : true;
                    if ($visible==true) {
                        echo '<span data-name="' . $shortcode['name'] . '" data-shortcode="' . $name . '" title="' . ( $shortcode['desc'] ) . '" data-desc="' . ( $shortcode['desc'] ) . '" data-group="' . $shortcode['group'] . '">' . Su_Tools::icon($icon) . $shortcode['name'] .$badge . '</span>' . "\n";
                    }
                }
                ?>
            </div>
        </div>
        <input type="hidden" name="su-generator-selected" id="su-generator-selected" value="" />
        <input type="hidden" name="su-generator-url" id="su-generator-url" value="" />
        <input type="hidden" name="su-compatibility-mode-prefix" id="su-compatibility-mode-prefix" value="<?php echo su_compatibility_mode_prefix(); ?>" />
        <div id="su-generator-settings"></div>
        <div id="su-generator-result" style="display:none"></div>
    </div>
</div>