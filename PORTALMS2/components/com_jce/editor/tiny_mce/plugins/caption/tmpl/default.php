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

defined('WF_EDITOR') or die('RESTRICTED');

$plugin = WFEditorPlugin::getInstance();
$tabs 	= WFTabs::getInstance();
?>
<form action="#">
    <!-- Render Tabs -->
    <?php $tabs->render();?>
    <!-- Token -->
    <input type="hidden" id="token" name="<?php echo WFToken::getToken();?>" value="1" />
</form>
<div id="preview">
    <fieldset>
        <legend>
            <?php echo WFText::_('WF_LABEL_PREVIEW');?>
        </legend>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td style="vertical-align:top;">
                <div style="overflow:auto;height:140px;">
                    <span id="caption">
                        <img id="caption_image" src="<?php echo $plugin->image('sample.jpg', 'plugins');?>" width="150" height="112" style="border:0 none;" alt="Preview" />
                        <span id="caption_text"></span>
                    </span>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                </div>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="actionPanel">
    <button class="button" id="insert">
        <?php echo WFText::_('WF_LABEL_INSERT')?>
    </button>
    <button class="button" id="help">
        <?php echo WFText::_('WF_LABEL_HELP')?>
    </button>
    <button class="button" id="cancel">
        <?php echo WFText::_('WF_LABEL_CANCEL')?>
    </button>
</div>