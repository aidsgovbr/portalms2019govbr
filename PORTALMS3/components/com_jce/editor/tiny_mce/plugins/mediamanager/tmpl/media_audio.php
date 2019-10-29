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

defined( '_JEXEC' ) or die('RESTRICTED');
?>
<fieldset class="media_option audio"><legend><?php echo WFText::_('WF_MEDIAMANAGER_AUDIO_OPTIONS');?></legend>			
	<table border="0" cellpadding="4" cellspacing="0">
		<tr>
			<td>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><input type="checkbox" class="checkbox" id="audio_autoplay" /></td>
					<td><label for="audio_autoplay"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_AUTOPLAY');?></label></td>
				</tr>
			</table>
			</td>
	
			<td>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><input type="checkbox" class="checkbox" id="audio_controls" checked="checked" /></td>
					<td><label for="audio_controls"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_CONTROLS');?></label></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><input type="checkbox" class="checkbox" id="audio_loop" /></td>
					<td><label for="audio_loop"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_LOOP');?></label></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td><label for="audio_preload"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_PRELOAD');?></label></td>
			<td><select id="audio_preload">
				<option value=""><?php echo WFText::_('WF_OPTION_AUTO');?></option>
				<option value="none"><?php echo WFText::_('WF_OPTION_NONE');?></option>
				<option value="metadata"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_METADATA');?></option>
			</select></td>
		</tr>
		<tr>
			<td><label for="audio_source"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_SOURCE');?></label></td>
			<td><input type="text" name="audio_source[]" class="active"
				onclick="MediaManagerDialog.setSourceFocus(this);" /></td>
		</tr>
		<tr>
			<td><label for="audio_source"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_SOURCE');?></label></td>
			<td><input type="text" name="audio_source[]"
				onclick="MediaManagerDialog.setSourceFocus(this);" /></td>
		</tr>
		<tr>
			<td><label for="audio_source"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_SOURCE');?></label></td>
			<td><input type="text" name="audio_source[]"
				onclick="MediaManagerDialog.setSourceFocus(this);" /></td>
		</tr>
		<tr>
			<td><label for="audio_fallback"><?php echo WFText::_('WF_MEDIAMANAGER_LABEL_FALLBACK');?></label></td>
			<td><input type="text" id="audio_fallback"
				onclick="MediaManagerDialog.setSourceFocus(this);" /> (mp3)</td>
		</tr>
	</table>
</fieldset>