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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_importador_ms', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_importador_ms');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_importador_ms')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_IMPORTADOR_MS_FORM_LBL_IMPORTAR_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_IMPORTADOR_MS_FORM_LBL_IMPORTAR_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_IMPORTADOR_MS_FORM_LBL_IMPORTAR_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_IMPORTADOR_MS_FORM_LBL_IMPORTAR_CATEGORIA_ANTIGA'); ?></th>
			<td><?php echo $this->item->categoria_antiga; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_IMPORTADOR_MS_FORM_LBL_IMPORTAR_CATEGORIA_NOVA'); ?></th>
			<td><?php echo $this->item->categoria_nova; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_importador_ms&task=importar.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_IMPORTADOR_MS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_importador_ms')):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_importador_ms&task=importar.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_IMPORTADOR_MS_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_IMPORTADOR_MS_ITEM_NOT_LOADED');
endif;
?>
