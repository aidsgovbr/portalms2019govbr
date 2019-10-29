<?php
/**
 * @package		ACL Manager for Joomla
 * @copyright 	Copyright (c) 2011-2017 Sander Potjer
 * @license 	GNU General Public License version 3 or later
 * @link        https://www.aclmanager.net
 */

// No direct access.
defined('_JEXEC') or die;

// Initialise variable
$user =	JFactory::getUser($this->state->get('filter.user_id'));
?>

<?php if ($this->params->get('show_info',1)): ?>
<div class="well">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_NAME'); ?></legend>
		<img class="fieldseticon" src="components/com_aclmanager/assets/images/user.png"/>
		<ul class="adminformlist">
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_NAME'); ?></label>
				<span class="value link">
				<?php if ((JFactory::getUser()->authorise('core.manage', 'com_users')) && (JFactory::getUser()->authorise('core.edit', 'com_users'))):?>
					<a href="<?php echo JRoute::_('index.php?option=com_users&task=user.edit&id='.$user->id.'&aclmanager=user'); ?>"><?php echo($user->name)?></a>
				<?php else:?>
					<?php echo($user->name)?>
				<?php endif;?>
				</span>
			</li>
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_USERNAME'); ?></label>
				<span class="value"><?php echo($user->username);?></span>
			</li>
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_EMAIL'); ?></label>
				<span class="value"><?php echo($user->email);?></span>
			</li>
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_REGISTRATION'); ?></label>
				<span class="value"><?php echo($user->registerDate);?></span>
			</li>
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_LAST_VISIT'); ?></label>
				<span class="value"><?php echo($user->lastvisitDate);?></span>
			</li>
			<li>
				<label><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_USER_ID'); ?></label>
				<span class="value"><?php echo($user->id);?></span>
			</li>
		</ul>
	</fieldset>
</div>
<?php endif; ?>

<?php if ($this->params->get('show_assigned',1)): ?>
<div class="well">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_ASSIGNED_USERGROUPS'); ?></legend>
		<a class="new-button" href="<?php echo JRoute::_('index.php?option=com_users&task=group.add')?>"><?php echo JText::_('COM_ACLMANAGER_HOME_NEW_USERGROUP'); ?></a>
		<table class="adminlist sidebar" id="groups">
			<thead>
				<tr>
					<th class="left"><?php echo JText::_('COM_USERS_GROUP_FIELD_TITLE_LABEL'); ?></th>
					<th width="15%"><?php echo JText::_('JGLOBAL_FIELD_ID_LABEL'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2" class="dataTables_empty"></td>
				</tr>
			</tbody>
		</table>
		<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function($) {
				$('#groups').dataTable( {
					"bServerSide": true,
					"pagingType": "simple",
					"bSort": false,
					"sDom": 'frtlip',
					"bInfo": false,
					"aoColumnDefs": [{ "sClass": "center", "aTargets":[1]}],
					"sAjaxSource": "index.php?option=com_aclmanager&view=home&format=json&type=group&user=<?php echo($this->state->get('filter.user_id'));?>",
					"oLanguage": {
					    "sSearch": "<?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>",
					    "sLengthMenu": "<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?> _MENU_",
					    "oPaginate": {
						    "sNext": "<?php echo JText::_('JNEXT'); ?>",
						    "sPrevious": "<?php echo JText::_('JPREVIOUS'); ?>"
						  }
					  }
				} );
			} );
		</script>
	</fieldset>
</div>
<?php endif; ?>

<?php if ($this->params->get('show_legend',1)): ?>
<div class="well">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_ACLMANAGER_SIDEBAR_LEGEND',1); ?></legend>
		<ul>
			<li class="rule">
				<span class="icon allowed"></span>
				<span class="legend hasTip" title="<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_ALLOWED_TITLE'); ?>::<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_ALLOWED_DESC'); ?>">
					<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_ALLOWED'); ?>
				</span>
			</li>
			<li class="rule">
				<span class="icon denied"></span>
				<span class="legend hasTip" title="<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_DENIED_TITLE'); ?>::<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_DENIED_DESC'); ?>">
					<?php echo JText::_('COM_ACLMANAGER_SIDEBAR_DENIED'); ?>
				</span>
			</li>
		</ul>
	</fieldset>
</div>
<?php endif; ?>


<div class="clr"> </div>