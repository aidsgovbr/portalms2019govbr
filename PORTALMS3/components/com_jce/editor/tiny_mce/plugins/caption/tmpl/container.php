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
<table summary="caption container" width="100%">
    <tr>
        <td>
        <label for="align" class="hastip" title="<?php echo WFText::_('WF_CAPTION_ALIGN_DESC');?>">
            <?php echo WFText::_('WF_LABEL_ALIGN');?>
        </label>
        </td>
        <td>
        <select id="align" onchange="CaptionDialog.updateCaption();" >
            <option value="">
                <?php echo WFText::_('WF_OPTION_NOT_SET');?>
            </option>
            <option value="left">
                <?php echo WFText::_('WF_OPTION_ALIGN_LEFT');?>
            </option>
            <option value="right">
                <?php echo WFText::_('WF_OPTION_ALIGN_RIGHT');?>
            </option>
            <option value="top">
                <?php echo WFText::_('WF_OPTION_ALIGN_TOP');?>
            </option>
            <option value="middle">
                <?php echo WFText::_('WF_OPTION_ALIGN_MIDDLE');?>
            </option>
            <option value="bottom">
                <?php echo WFText::_('WF_OPTION_ALIGN_BOTTOM');?>
            </option>
        </select>
        </td>
        <td>
        <table>
            <tr>
                <td>
                <label for="bgcolor" class="hastip" title="<?php echo WFText::_('WF_CAPTION_BGCOLOR_DESC');?>">
                    <?php echo WFText::_('WF_LABEL_BACKGROUND');?>
                </label>
                </td>
                <td>
                <input id="bgcolor" type="text" value="" size="9" onchange="CaptionDialog.updateCaption();" class="color" />
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
        <fieldset>
            <legend>
                <label class="hastip" title="<?php echo WFText::_('WF_CAPTION_PADDING_DESC');?>">
                    <?php echo WFText::_('WF_CAPTION_PADDING');?>
                </label>
            </legend>
            <table summary="container padding" width="100%">
                <tr>
                    <td>
                    <label for="padding_top">
                        <?php echo WFText::_('WF_OPTION_TOP');?>
                    </label>
                    <input type="text" id="padding_top" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('padding');" />
                    <label for="padding_right">
                        <?php echo WFText::_('WF_OPTION_RIGHT');?>
                    </label>
                    <input type="text" id="padding_right" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('padding');" />
                    <label for="padding_bottom">
                        <?php echo WFText::_('WF_OPTION_BOTTOM');?>
                    </label>
                    <input type="text" id="padding_bottom" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('padding');" />
                    <label for="padding_left">
                        <?php echo WFText::_('WF_OPTION_LEFT');?>
                    </label>
                    <input type="text" id="padding_left" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('padding');" />
                    <input type="checkbox" class="checkbox" id="padding_check" onclick="CaptionDialog.setSpacing('padding');" />
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
                <label class="hastip" title="<?php echo WFText::_('WF_CAPTION_MARGIN_DESC');?>">
                    <?php echo WFText::_('WF_LABEL_MARGIN');?>
                </label>
            </legend>
            <table summary="container margin" width="100%">
                <tr>
                    <td>
                    <label for="margin_top">
                        <?php echo WFText::_('WF_OPTION_TOP');?>
                    </label>
                    <input type="text" id="margin_top" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('margin');" />
                    <label for="margin_right">
                        <?php echo WFText::_('WF_OPTION_RIGHT');?>
                    </label>
                    <input type="text" id="margin_right" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('margin');" />
                    <label for="margin_bottom">
                        <?php echo WFText::_('WF_OPTION_BOTTOM');?>
                    </label>
                    <input type="text" id="margin_bottom" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('margin');" />
                    <label for="margin_left">
                        <?php echo WFText::_('WF_OPTION_LEFT');?>
                    </label>
                    <input type="text" id="margin_left" value="" size="3" maxlength="3" onchange="CaptionDialog.setSpacing('margin');" />
                    <input type="checkbox" class="checkbox" id="margin_check" onclick="CaptionDialog.setSpacing('margin');" />
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
                <input type="checkbox" class="radio" id="border" onclick="CaptionDialog.setBorder();"/>
                <?php echo WFText::_('WF_LABEL_BORDER');?>
            </legend>
            <table summary="container border">
                <tr>
                    <td>
                    <label for="border_width" class="hastip" title="<?php echo WFText::_('WF_CAPTION_BORDER_STYLE_DESC');?>">
                        <?php echo WFText::_('Width');?>
                    </label>
                    <select id="border_width" onchange="CaptionDialog.updateCaption();" class="editable">
                        <option value="inherit">
                            <?php echo WFText::_('WF_OPTION_NOT_SET');?>
                        </option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="thin">
                            <?php echo WFText::_('WF_OPTION_BORDER_THIN');?>
                        </option>
                        <option value="medium">
                            <?php echo WFText::_('WF_OPTION_BORDER_MEDIUM');?>
                        </option>
                        <option value="thick">
                            <?php echo WFText::_('WF_OPTION_BORDER_THICK');?>
                        </option>
                    </select>
                    </td>
                    <td>
                    <label for="border_style" class="hastip" title="<?php echo WFText::_('WF_CAPTION_BORDER_STYLE_DESC');?>">
                        <?php echo WFText::_('WF_LABEL_STYLE');?>
                    </label>
                    <select id="border_style" onchange="CaptionDialog.updateCaption();">
                        <option value="inherit">
                            <?php echo WFText::_('WF_OPTION_NOT_SET');?>
                        </option>
                        <option value="none">
                            <?php echo WFText::_('WF_OPTION_BORDER_NONE');?>
                        </option>
                        <option value="solid">
                            <?php echo WFText::_('WF_OPTION_BORDER_SOLID');?>
                        </option>
                        <option value="dashed">
                            <?php echo WFText::_('WF_OPTION_BORDER_DASHED');?>
                        </option>
                        <option value="dotted">
                            <?php echo WFText::_('WF_OPTION_BORDER_DOTTED');?>
                        </option>
                        <option value="double">
                            <?php echo WFText::_('WF_OPTION_BORDER_DOUBLE');?>
                        </option>
                        <option value="groove">
                            <?php echo WFText::_('WF_OPTION_BORDER_GROOVE');?>
                        </option>
                        <option value="inset">
                            <?php echo WFText::_('WF_OPTION_BORDER_INSET');?>
                        </option>
                        <option value="outset">
                            <?php echo WFText::_('WF_OPTION_BORDER_OUTSET');?>
                        </option>
                        <option value="ridge">
                            <?php echo WFText::_('WF_OPTION_BORDER_RIDGE');?>
                        </option>
                    </select>
                    </td>
                    <td>
                            <label for="border_color" class="hastip" title="<?php echo WFText::_('WF_CAPTION_BORDER_COLOR_DESC');?>">
                                <?php echo WFText::_('WF_LABEL_COLOR');?>
                            </label>
                            </td>
                            <td>
                            <input id="border_color" type="text" value="" size="9" class="color" onchange="CaptionDialog.updateCaption();" />
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
            <table summary="container classes" width="100%">
                <tr>
                    <td style="width:20%;">
                    <label for="classlist" class="hastip" title="<?php echo WFText::_('WF_LABEL_CLASS_LIST_DESC');?>">
                        <?php echo WFText::_('WF_LABEL_CLASS_LIST');?>
                    </label>
                    </td>
                    <td colspan="3">
                    <select id="classlist" onchange="CaptionDialog.setClasses('classes', this.value);">
                        <option value="">
                            <?php echo WFText::_('WF_OPTION_NOT_SET');?>
                        </option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%;">
                    <label for="classes" class="hastip" title="<?php echo WFText::_('WF_LABEL_CLASSES_DESC');?>">
                        <?php echo WFText::_('WF_LABEL_CLASSES');?>
                    </label>
                    </td>
                    <td colspan="3">
                    <input id="classes" type="text" value="" />
                    </td>
                </tr>
            </table>
        </fieldset>
        </td>
    </tr>
</table>