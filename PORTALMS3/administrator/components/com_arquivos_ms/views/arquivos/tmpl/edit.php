<?php
/**
 * @version     1.0.0
 * @package     com_arquivos_ms
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Fábio <fabio.nery@saude.gov.br> - http://www.saude.gov.br
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
$document->addStyleSheet('components/com_arquivos_ms/assets/css/arquivos_ms.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function(){

    });

    Joomla.submitbutton = function(task)
    {
        if(task == 'arquivos.cancel'){
            Joomla.submitform(task, document.getElementById('arquivos-form'));
        }
        else{

				js = jQuery.noConflict();
				if(js('#jform_nome_arquivo').val() != ''){
					js('#jform_nome_arquivo_hidden').val(js('#jform_nome_arquivo').val());
				}
				if (js('#jform_nome_arquivo').val() == '' && js('#jform_nome_arquivo_hidden').val() == '') {
					alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
					return;
				}
            if (task != 'arquivos.cancel' && document.formvalidator.isValid(document.id('arquivos-form'))) {

                Joomla.submitform(task, document.getElementById('arquivos-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_arquivos_ms&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="arquivos-form" class="form-validate">
    <div class="row-fluid">
        <div class="span10 form-horizontal">
            <fieldset class="adminform">

                			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('nome_arquivo'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('nome_arquivo'); ?></div>
			</div>
				<?php
				// editando a pasta correta para visualização
				setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
				date_default_timezone_set('America/Sao_Paulo');

				$ano = strftime("%Y", strtotime($this->item->dt_criacao));
				$mes = strftime("%B", strtotime($this->item->dt_criacao));
				$mesnum = strftime("%m", strtotime($this->item->dt_criacao));
            	$mes = ($mesnum == '03')? 'marco': $mes;
				$dia = strftime("%d", strtotime($this->item->dt_criacao));
				$tipo = $this->item->tipo_de_arquivo;

				?>
				<?php if (!empty($this->item->nome_arquivo)) : ?>
						<a href="<?php echo JRoute::_(JUri::root() . 'images' . DIRECTORY_SEPARATOR . $tipo . DIRECTORY_SEPARATOR . $ano .DIRECTORY_SEPARATOR . $mes . DIRECTORY_SEPARATOR . $dia . DIRECTORY_SEPARATOR . $this->item->nome_arquivo, false);?> " target="_blank">[Ver Arquivo]</a>
				<?php endif; ?>
				<input type="hidden" name="jform[nome_arquivo]" id="jform_nome_arquivo_hidden" value="<?php echo $this->item->nome_arquivo ?>" />
				<input type="hidden" name="jform[dt_criacao]" id="jform_dt_criacao_hidden" value="<?php echo $this->item->dt_criacao ?>" />
				<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('tipo_de_arquivo'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('tipo_de_arquivo'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label">Caminho do arquivo</div>
				<div class="controls"><?php echo 'images/'.$tipo.'/'.$ano.'/'.$mes.'/'.$dia.'/'.$this->item->nome_arquivo; ?></div>
			</div>


            </fieldset>
        </div>



        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>