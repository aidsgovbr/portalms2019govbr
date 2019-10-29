<?php
/**
 * @version     1.0.0
 * @package     com_importador_ms
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_importador_ms', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_importador_ms/assets/js/form.js');


?>
</style>
<script type="text/javascript">
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
            jQuery('#form-importar').submit(function(event) {
                
            });

            
			jQuery('input:hidden.categoria_antiga').each(function(){
				var name = jQuery(this).attr('name');
				if(name.indexOf('categoria_antigahidden')){
					jQuery('#jform_categoria_antiga option[value="' + jQuery(this).val() + '"]').attr('selected',true);
				}
			});
					jQuery("#jform_categoria_antiga").trigger("liszt:updated");
			jQuery('input:hidden.categoria_nova').each(function(){
				var name = jQuery(this).attr('name');
				if(name.indexOf('categoria_novahidden')){
					jQuery('#jform_categoria_nova option[value="' + jQuery(this).val() + '"]').attr('selected', 'selected');
				}
			});
					jQuery("#jform_categoria_nova").trigger("liszt:updated");
        });
    });

</script>

<div class="importar-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-importar" action="<?php echo JRoute::_('index.php?option=com_importador_ms&task=importar.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
	</div>
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('categoria_antiga'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('categoria_antiga'); ?></div>
	</div>
	<?php foreach((array)$this->item->categoria_antiga as $value): ?>
		<?php if(!is_array($value)): ?>
			<input type="hidden" class="categoria_antiga" name="jform[categoria_antigahidden][<?php echo $value; ?>]" value="<?php echo $value; ?>" />';
		<?php endif; ?>
	<?php endforeach; ?>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('categoria_nova'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('categoria_nova'); ?></div>
	</div>
	<?php foreach((array)$this->item->categoria_nova as $value): ?>
		<?php if(!is_array($value)): ?>
			<input type="hidden" class="categoria_nova" name="jform[categoria_novahidden][<?php echo $value; ?>]" value="<?php echo $value; ?>" />';
		<?php endif; ?>
	<?php endforeach; ?>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_importador_ms&task=importarform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_importador_ms" />
        <input type="hidden" name="task" value="importarform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
