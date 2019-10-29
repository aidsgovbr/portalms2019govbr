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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_importador_ms/assets/css/importador_ms.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {

	js('input:hidden.categoria_antiga').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('categoria_antigahidden')){
			js('#jform_categoria_antiga option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_categoria_antiga").trigger("liszt:updated");
	js('input:hidden.categoria_nova').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('categoria_novahidden')){
			js('#jform_categoria_nova option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_categoria_nova").trigger("liszt:updated");
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'importar.cancel') {
            Joomla.submitform(task, document.getElementById('importar-form'));
        }
        else {

            if (task != 'importar.cancel' && document.formvalidator.isValid(document.id('importar-form'))) {

                Joomla.submitform(task, document.getElementById('importar-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_importador_ms&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="importar-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_IMPORTADOR_MS_TITLE_IMPORTAR', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

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

			<?php
				foreach((array)$this->item->categoria_antiga as $value):
					if(!is_array($value)):
						echo '<input type="hidden" class="categoria_antiga" name="jform[categoria_antigahidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('categoria_nova'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('categoria_nova'); ?></div>
			</div>

			<?php
				foreach((array)$this->item->categoria_nova as $value):
					if(!is_array($value)):
						echo '<input type="hidden" class="categoria_nova" name="jform[categoria_novahidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('change_import'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('change_import'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('data_inicial'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('data_inicial'); ?></div>
			</div>

                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>



        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>