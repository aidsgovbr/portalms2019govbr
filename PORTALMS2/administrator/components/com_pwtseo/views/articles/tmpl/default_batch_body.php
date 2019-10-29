<?php
/**
 * @package    Pwtseo
 *
 * @author     Perfect Web Team <extensions@perfectwebteam.com>
 * @copyright  Copyright (C) 2016 - 2018 Perfect Web Team. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://extensions.perfectwebteam.com
 */

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'plg_system_pwtseo/pwtseo.css', array('version' => 'auto', 'relative' => true));
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="control-group span6">
			<div class="controls">
				<label id="batch-language-lbl" for="batch-language-id" class="modalTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_PWTSEO_BATCH_SET_METADESC_LABEL', 'COM_PWTSEO_BATCH_SET_METADESC_DESC'); ?>">
					<?php echo JText::_('COM_PWTSEO_BATCH_SET_METADESC_LABEL'); ?>
				</label>
				<textarea
					name="batch[metadesc]"
					class="inputbox"
					id="batch-metadesc"></textarea>
				
			</div>
			<div class="controls">
				<label id="jform_enabled-lbl" for="jform_enabled" class="modalTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_PWTSEO_BATCH_OVERRIDE_METADESC_LABEL', 'COM_PWTSEO_BATCH_OVERRIDE_METADESC_DESC'); ?>">
					<?php echo JText::_('COM_PWTSEO_BATCH_OVERRIDE_METADESC_LABEL'); ?>
				</label>
				<select id="batch-override_metadesc" name="batch[override_metadesc]" class="chzn-color-state" size="1">
					<option value="1"><?php echo JText::_('JYES') ?></option>
					<option value="0" selected="selected"><?php echo JText::_('JNO') ?></option>
				</select>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function () {
		var $sDescription = jQuery('#batch-metadesc');

		if ($sDescription.length) {
			$sDescription.after('<span class="js-pwtseo-metadescription-counter-amount">' + $sDescription.val().length + '</span>');
			$sDescription.on('keyup', function () {
				document.getElementsByClassName('js-pwtseo-metadescription-counter-amount')[0].innerHTML = this.value.length;
			});
		}
	});
</script>