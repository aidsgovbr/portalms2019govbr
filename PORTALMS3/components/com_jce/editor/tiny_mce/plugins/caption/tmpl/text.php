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

defined('_JEXEC') or die('RESTRICTED');
?>
<table summary="caption text" width="100%">
    <tr>
        <td>
        <label for="text">
            <?php echo WFText::_('WF_LABEL_TEXT');?>
        </label>
        </td>
        <td colspan="3">
        <input type="text" id="text" onkeyup="CaptionDialog.updateText(this.value);" />
        </td>
    </tr>
    <tr>
        <td>
        <label for="text_position" class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_POSITION_DESC');?>">
            <?php echo WFText::_('WF_LABEL_POSITION');?>
        </label>
        </td>
        <td>
        <select id="text_position" onchange="CaptionDialog.updateCaption();" >
            <option value="bottom">
                <?php echo WFText::_('WF_OPTION_BOTTOM');?>
            </option>
            <option value="top">
                <?php echo WFText::_('WF_OPTION_TOP');?>
            </option>
        </select>
        </td>
        <td>
        <label for="text_align" class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_ALIGN_DESC');?>">
            <?php echo WFText::_('WF_LABEL_ALIGN');?>
        </label>
        </td>
        <td>
        <select id="text_align" onchange="CaptionDialog.updateCaption();" >
            <option value="">
                <?php echo WFText::_('WF_OPTION_NOT_SET');?>
            </option>
            <option value="left">
                <?php echo WFText::_('WF_OPTION_LEFT');?>
            </option>
            <option value="center">
                <?php echo WFText::_('WF_OPTION_CENTER');?>
            </option>
            <option value="right">
                <?php echo WFText::_('WF_OPTION_RIGHT');?>
            </option>
            <option value="justified">
                <?php echo WFText::_('WF_OPTION_JUSTIFIED');?>
            </option>
        </select>
        </td>
    </tr>
    <tr>
        <td>
        <label for="text_color" class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_COLOR_DESC');?>">
            <?php echo WFText::_('WF_LABEL_COLOR');?>
        </label>
        </td>
        <td>
        	<input id="text_color" class="color" type="text" value="" size="9" onchange="CaptionDialog.updateCaption();" />
        </td>
        <td>
                <label for="text_bgcolor" class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_BGCOLOR_DESC');?>">
                    <?php echo WFText::_('WF_LABEL_BACKGROUND');?>
                </label>
                </td>
                <td>
                <input id="text_bgcolor" class="color" type="text" value="" size="9" onchange="CaptionDialog.updateCaption();" />
                </td>
    </tr>
    <tr>
        <td colspan="4">
        <fieldset>
            <legend>
                <label class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_PADDING_DESC');?>">
                    <?php echo WFText::_('WF_CAPTION_PADDING');?>
                </label>
            </legend>
            <table summary="text padding" width="100%">
                <tr>
                    <td>
                    <label for="text_padding_top">
                        <?php echo WFText::_('WF_OPTION_TOP');?>
                    </label>
                    <input type="text" id="text_padding_top" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_padding');" />
                    <label for="text_padding_right">
                        <?php echo WFText::_('WF_OPTION_RIGHT');?>
                    </label>
                    <input type="text" id="text_padding_right" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_padding');" />
                    <label for="text_padding_bottom">
                        <?php echo WFText::_('WF_OPTION_BOTTOM');?>
                    </label>
                    <input type="text" id="text_padding_bottom" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_padding');" />
                    <label for="text_padding_left">
                        <?php echo WFText::_('WF_OPTION_LEFT');?>
                    </label>
                    <input type="text" id="text_padding_left" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_padding');" />
                    <input type="checkbox" class="checkbox" id="text_padding_check" onclick="CaptionDialog.setSpacing('text_padding');" />
                    <label>
                        <?php echo WFText::_('WF_LABEL_EQUAL');?>
                    </label>
                    </td>
                </tr>
            </table>
        </fieldset>
        </td>
    </tr>
    <tr>
        <td colspan="4">
        <fieldset>
            <legend>
                <label class="hastip" title="<?php echo WFText::_('WF_CAPTION_TEXT_MARGIN_DESC');?>">
                    <?php echo WFText::_('WF_LABEL_MARGIN');?>
                </label>
            </legend>
            <table summary="text margin" width="100%">
                <tr>
                    <td>
                    <label for="text_margin_top">
                        <?php echo WFText::_('WF_OPTION_TOP');?>
                    </label>
                    <input type="text" id="text_margin_top" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_margin');" />
                    <label for="text_margin_right">
                        <?php echo WFText::_('WF_OPTION_RIGHT');?>
                    </label>
                    <input type="text" id="text_margin_right" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_margin');" />
                    <label for="text_margin_bottom">
                        <?php echo WFText::_('WF_OPTION_BOTTOM');?>
                    </label>
                    <input type="text" id="text_margin_bottom" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_margin');" />
                    <label for="text_margin_left">
                        <?php echo WFText::_('WF_OPTION_LEFT');?>
                    </label>
                    <input type="text" id="text_margin_left" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('text_margin');" />
                    <input type="checkbox" class="checkbox" id="text_margin_check" onclick="CaptionDialog.setSpacing('text_margin');" />
                    <label>
                        <?php echo WFText::_('WF_LABEL_EQUAL');?>
                    </label>
                    </td>
                </tr>
            </table>
        </fieldset>
        </td>
    </tr>
    <tr>
        <td colspan="4">
        <fieldset>
            <legend>
                <label>
                    <?php echo WFText::_('WF_CAPTION_CLASSES');?>
                </label>
            </legend>
            <table summary="text classes" width="100%">
                <tr>
                    <td width="20%">
                    <label for="classlist" class="hastip" title="<?php echo WFText::_('WF_LABEL_CLASS_LIST_DESC');?>">
                        <?php echo WFText::_('WF_LABEL_CLASS_LIST');?>
                    </label>
                    </td>
                    <td colspan="3">
                    <select id="text_classlist" onchange="CaptionDialog.setClasses('text_classes', this.value);">
                        <option value="">
                            <?php echo WFText::_('WF_OPTION_NOT_SET');?>
                        </option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                    <label for="text_classes" class="hastip" title="<?php echo WFText::_('WF_LABEL_CLASSES_DESC');?>">
                        <?php echo WFText::_('WF_LABEL_CLASSES');?>
                    </label>
                    </td>
                    <td colspan="3">
                    <input id="text_classes" type="text" value="" />
                    </td>
                </tr>
            </table>
        </fieldset>
        </td>
    </tr>
</table>