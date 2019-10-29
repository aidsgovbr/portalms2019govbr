<?php
/**
 * @package         Modules Anywhere
 * @version         7.3.2
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

use RegularLabs\Library\Document as RL_Document;
use RegularLabs\Library\Language as RL_Language;
use RegularLabs\Library\Parameters as RL_Parameters;
use RegularLabs\Library\StringHelper as RL_String;

$user = JFactory::getUser();
if ($user->get('guest')
	|| (
		!$user->authorise('core.edit', 'com_content')
		&& !$user->authorise('core.edit.own', 'com_content')
		&& !$user->authorise('core.create', 'com_content')
	)
)
{
	JError::raiseError(403, JText::_("ALERTNOTAUTH"));
}

$params = RL_Parameters::getInstance()->getPluginParams('modulesanywhere');

if (JFactory::getApplication()->isSite())
{
	if (!$params->enable_frontend)
	{
		JError::raiseError(403, JText::_("ALERTNOTAUTH"));
	}
}

$class = new PlgButtonModulesAnywherePopup;
$class->render($params);

class PlgButtonModulesAnywherePopup
{
	public function render(&$params)
	{

		$app = JFactory::getApplication();

		// load the admin language file
		RL_Language::load('plg_system_regularlabs');
		RL_Language::load('plg_editors-xtd_modulesanywhere');
		RL_Language::load('plg_system_modulesanywhere');
		RL_Language::load('com_modules', JPATH_ADMINISTRATOR);

		RL_Document::style('regularlabs/popup.min.css');
		RL_Document::style('regularlabs/style.min.css');

		// Initialize some variables
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$option = 'modulesanywhere';

		$filter_order     = $app->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'm.position', 'string');
		$filter_order_Dir = $app->getUserStateFromRequest($option . 'filter_order_Dir', 'filter_order_Dir', '', 'string');
		$filter_state     = $app->getUserStateFromRequest($option . 'filter_state', 'filter_state', '', 'string');
		$filter_position  = $app->getUserStateFromRequest($option . 'filter_position', 'filter_position', '', 'string');
		$filter_type      = $app->getUserStateFromRequest($option . 'filter_type', 'filter_type', '', 'string');
		$filter_search    = $app->getUserStateFromRequest($option . 'filter_search', 'filter_search', '', 'string');
		$filter_search    = RL_String::strtolower($filter_search);

		$limit      = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'int');
		$limitstart = $app->getUserStateFromRequest('modulesanywhere_limitstart', 'limitstart', 0, 'int');

		$where[] = 'm.client_id = 0';

		// used by filter
		if ($filter_position)
		{
			if ($filter_position == 'none')
			{
				$where[] = 'm.position = ""';
			}
			else
			{
				$where[] = 'm.position = ' . $db->quote($filter_position);
			}
		}
		if ($filter_type)
		{
			$where[] = 'm.module = ' . $db->quote($filter_type);
		}
		if ($filter_search)
		{
			$where[] = 'LOWER( m.title ) LIKE ' . $db->quote('%' . $db->escape($filter_search, true) . '%', false);
		}
		if ($filter_state != '')
		{
			$where[] = 'm.published = ' . $filter_state;
		}

		$where = implode(' AND ', $where);

		if ($filter_order == 'm.ordering')
		{
			$orderby = 'm.position, m.ordering ' . $filter_order_Dir;
		}
		else
		{
			$orderby = $filter_order . ' ' . $filter_order_Dir . ', m.ordering ASC';
		}

		// get the total number of records
		$query->clear()
			->select('COUNT(DISTINCT m.id)')
			->from('#__modules AS m')
			->join('LEFT', '#__users AS u ON u.id = m.checked_out')
			->join('LEFT', '#__viewlevels AS g ON g.id = m.access')
			->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id')
			->where($where);
		$db->setQuery($query);
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);

		$query->clear()
			->select('m.*, u.name AS editor, g.title AS groupname, MIN( mm.menuid ) AS pages')
			->from('#__modules AS m')
			->join('LEFT', '#__users AS u ON u.id = m.checked_out')
			->join('LEFT', '#__viewlevels AS g ON g.id = m.access')
			->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id')
			->where($where)
			->group('m.id')
			->order($orderby);
		$db->setQuery($query, $pageNav->limitstart, $pageNav->limit);
		$rows = $db->loadObjectList();
		if ($db->getErrorNum())
		{
			echo $db->stderr();

			return false;
		}

		// get list of Positions for dropdown filter
		$query->clear()
			->select('m.position AS value, m.position AS text')
			->from('#__modules as m')
			->where('m.client_id = 0')
			->where('m.position != ""')
			->group('m.position')
			->order('m.position');
		$db->setQuery($query);
		$positions = $db->loadObjectList();
		array_unshift($positions, $options[] = JHtml::_('select.option', 'none', ':: ' . JText::_('JNONE') . ' ::'));
		array_unshift($positions, JHtml::_('select.option', '', JText::_('COM_MODULES_OPTION_SELECT_POSITION')));
		$lists['position'] = JHtml::_('select.genericlist', $positions, 'filter_position', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', $filter_position);

		// get list of Types for dropdown filter
		$query->clear()
			->select('e.element AS value, e.name AS text')
			->from('#__extensions as e')
			->where('e.client_id = 0')
			->where('type = ' . $db->quote('module'))
			->join('LEFT', '#__modules as m ON m.module = e.element AND m.client_id = e.client_id')
			->where('m.module IS NOT NULL')
			->group('e.element, e.name');
		$db->setQuery($query);
		$types = $db->loadObjectList();

		foreach ($types as $i => $type)
		{
			$extension = $type->value;
			$source    = JPATH_SITE . '/modules/' . $extension;
			RL_Language::load($extension . '.sys', JPATH_SITE)
			|| RL_Language::load($extension . '.sys', $source);
			$types[$i]->text = JText::_($type->text);
		}
		JArrayHelper::sortObjects($types, 'text', 1, true, JFactory::getLanguage()->getLocale());
		array_unshift($types, JHtml::_('select.option', '', JText::_('COM_MODULES_OPTION_SELECT_MODULE')));
		$lists['type'] = JHtml::_('select.genericlist', $types, 'filter_type', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', $filter_type);

		// state filter
		$states         = [];
		$states[]       = JHtml::_('select.option', '', JText::_('JOPTION_SELECT_PUBLISHED'));
		$states[]       = JHtml::_('select.option', '1', JText::_('JPUBLISHED'));
		$states[]       = JHtml::_('select.option', '0', JText::_('JUNPUBLISHED'));
		$states[]       = JHtml::_('select.option', '-2', JText::_('JTRASHED'));
		$lists['state'] = JHtml::_('select.genericlist', $states, 'filter_state', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', $filter_state);

		// table ordering
		$lists['order_Dir'] = $filter_order_Dir;
		$lists['order']     = $filter_order;

		// search filter
		$lists['filter_search'] = $filter_search;

		$this->outputHTML($params, $rows, $pageNav, $lists);
	}

	function outputHTML(&$params, &$rows, &$page, &$lists)
	{
		$tag    = explode(',', $params->module_tag);
		$tag    = trim($tag['0']);
		$postag = explode(',', $params->modulepos_tag);
		$postag = trim($postag['0']);

		// Tag character start and end
		list($tag_start, $tag_end) = explode('.', $params->tag_characters);

		JHtml::_('behavior.tooltip');
		JHtml::_('formbehavior.chosen', 'select');

		?>
		<div class="header">
			<h1 class="page-title">
				<span class="icon-reglab icon-modulesanywhere"></span>
				<?php echo JText::_('INSERT_MODULE'); ?>
			</h1>
		</div>

		<?php if (JFactory::getApplication()->isAdmin() && JFactory::getUser()->authorise('core.admin', 1)) : ?>
		<div class="subhead">
			<div class="container-fluid">
				<div class="btn-toolbar" id="toolbar">
					<div class="btn-wrapper" id="toolbar-options">
						<button
								onclick="window.open('index.php?option=com_plugins&filter_folder=system&filter_search=<?php echo JText::_('MODULES_ANYWHERE') ?>');"
								class="btn btn-small">
							<span class="icon-options"></span> <?php echo JText::_('JOPTIONS') ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

		<div style="margin-bottom: 20px"></div>

		<div class="container-fluid container-main">
			<form action="" method="post" name="adminForm" id="adminForm">
				<div class="alert alert-info">
					<?php echo RL_String::html_entity_decoder(JText::_('MA_CLICK_ON_ONE_OF_THE_MODULES_LINKS')); ?>
				</div>

				<div class="row-fluid form-vertical">
					<div class="span12 well">
						<?php if ($params->override_style && (count(explode(',', $params->styles)) > 1 || $params->styles != $params->style)) : ?>
							<div class="control-group">
								<label id="style-lbl" for="style"
								       class="control-label"><?php echo JText::_('MA_MODULE_STYLE'); ?></label>

								<div class="controls">
									<?php
									$style = JFactory::getApplication()->input->get('style');
									if (!$style)
									{
										$style = $params->style;
									}

									?>
									<select name="style" id="style" class="inputbox">
										<?php foreach (explode(',', $params->styles) as $s) : ?>
											<option <?php echo ($s == $style) ? 'selected="selected"' : ''; ?>
													value="<?php echo $s; ?>"><?php echo $s; ?><?php echo ($s == $params->style) ? ' *' : ''; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						<?php endif; ?>
						<div class="control-group">
							<label id="showtitle-lbl" for="showtitle-field" class="control-label" rel="tooltip"
							       title="<?php echo JText::_('COM_MODULES_FIELD_SHOWTITLE_DESC'); ?>">
								<?php echo JText::_('COM_MODULES_FIELD_SHOWTITLE_LABEL'); ?>
							</label>

							<div class="controls">
								<fieldset id="showtitle" class="radio btn-group">
									<input type="radio" id="showtitle0" name="showtitle" value="" <?php echo $params->showtitle === '' ? 'checked="checked"' : ''; ?>>
									<label for="showtitle0"><?php echo JText::_('JDEFAULT'); ?></label>
									<input type="radio" id="showtitle1" name="showtitle" value="false" <?php echo $params->showtitle === '0' ? 'checked="checked"' : ''; ?>>
									<label for="showtitle1"><?php echo JText::_('JNO'); ?></label>
									<input type="radio" id="showtitle2" name="showtitle" value="true" <?php echo $params->showtitle === '1' ? 'checked="checked"' : ''; ?>>
									<label for="showtitle2"><?php echo JText::_('JYES'); ?></label>
								</fieldset>
							</div>
						</div>
					</div>
				</div>

				<div id="filter-bar" class="btn-toolbar">
					<div class="filter-search btn-group pull-left">
						<label for="filter_search"
						       class="element-invisible"><?php echo JText::_('COM_BANNERS_SEARCH_IN_TITLE'); ?></label>
						<input type="text" name="filter_search" id="filter_search"
						       placeholder="<?php echo JText::_('COM_MODULES_MODULES_FILTER_SEARCH_DESC'); ?>"
						       value="<?php echo $lists['filter_search']; ?>"
						       title="<?php echo JText::_('COM_MODULES_MODULES_FILTER_SEARCH_DESC'); ?>">
					</div>
					<div class="btn-group pull-left hidden-phone">
						<button class="btn btn-default" type="submit" rel="tooltip"
						        title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
							<span class="icon-search"></span></button>
						<button class="btn btn-default" type="button" rel="tooltip"
						        title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"
						        onclick="document.id('filter_search').value='';this.form.submit();">
							<span class="icon-remove"></span></button>
					</div>

					<div class="btn-group pull-right hidden-phone">
						<?php echo $lists['type']; ?>
					</div>
					<div class="btn-group pull-right hidden-phone">
						<?php echo $lists['position']; ?>
					</div>
					<div class="btn-group pull-right hidden-phone">
						<?php echo $lists['state']; ?>
					</div>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th width="1%" class="nowrap">
								<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'm.id', @$lists['order_Dir'], @$lists['order']); ?>
							</th>
							<th width="1%" class="nowrap center">
								<?php echo JHtml::_('grid.sort', 'JSTATUS', 'm.published', @$lists['order_Dir'], @$lists['order']); ?>
							</th>
							<th class="title">
								<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'm.title', @$lists['order_Dir'], @$lists['order']); ?>
							</th>
							<th width="15%" class="nowrap">
								<?php echo JHtml::_('grid.sort', 'COM_MODULES_HEADING_POSITION', 'm.position', @$lists['order_Dir'], @$lists['order']); ?>
							</th>
							<th width="10%" class="nowrap hidden-phone">
								<?php echo JHtml::_('grid.sort', 'COM_MODULES_HEADING_MODULE', 'm.module', @$lists['order_Dir'], @$lists['order']); ?>
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="8">
								<?php echo $page->getListFooter(); ?>
							</td>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$k = 0;
						for ($i = 0, $n = count($rows); $i < $n; $i++)
						{
							$row =& $rows[$i];
							?>
							<tr class="<?php echo "row$k"; ?>">
								<td class="center">
									<?php
									echo '<button class="btn btn-default" rel="tooltip" title="<strong>' . JText::_('MA_USE_ID_IN_TAG') . '</strong><br>'
										. $tag_start . $tag . ' ' . $row->id . $tag_end
										. '" onclick="modulesanywhere_jInsertEditorText( \'' . $row->id . '\' );return false;">'
										. $row->id
										. '</button>';
									?>
								</td>
								<td class="center">
									<?php echo JHtml::_('jgrid.published', $row->published, $row->id, 'modules.', 0, 'cb', $row->publish_up, $row->publish_down); ?>
								</td>
								<td>
									<?php
									echo '<button class="btn btn-default" rel="tooltip" title="<strong>' . JText::_('MA_USE_TITLE_IN_TAG') . '</strong><br>'
										. $tag_start . $tag . ' ' . htmlspecialchars($row->title) . $tag_end
										. '" onclick="modulesanywhere_jInsertEditorText( \'' . addslashes(htmlspecialchars($row->title)) . '\' );return false;">'
										. htmlspecialchars($row->title)
										. '</button>';
									?>
									<?php if (!empty($row->note)) : ?>
										<p class="smallsub">
											<?php echo JText::sprintf('JGLOBAL_LIST_NOTE', htmlspecialchars($row->note)); ?></p>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row->position) : ?>
										<?php
										echo '<button class="btn btn-default" rel="tooltip" title="<strong>' . JText::_('MA_USE_MODULE_POSITION_TAG') . '</strong><br>'
											. $tag_start . $postag . ' ' . $row->position . $tag_end
											. '" onclick="modulesanywhere_jInsertEditorText( \'' . $row->position . '\', 1 );return false;">'
											. $row->position
											. '</button>';
										?>
									<?php else : ?>
										<span class="label">
											<?php echo JText::_('JNONE'); ?>
										</span>
									<?php endif; ?>
								</td>
								<td class="hidden-phone">
									<?php echo $row->module ? $row->module : JText::_('User'); ?>
								</td>
							</tr>
							<?php
							$k = 1 - $k;
						}
						?>
					</tbody>
				</table>
				<input type="hidden" name="name"
				       value="<?php echo JFactory::getApplication()->input->getString('name', 'text'); ?>">
				<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>">
				<input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>">
			</form>
		</div>
		<?php
		// Tag character start and end
		list($tag_start, $tag_end) = explode('.', $params->tag_characters);
		?>
		<script type="text/javascript">
			function modulesanywhere_jInsertEditorText(id, modulepos) {
				(function($) {
					var t_start = '<?php echo addslashes($tag_start); ?>';
					var t_end   = '<?php echo addslashes($tag_end); ?>';

					if (modulepos) {
						str = t_start + '<?php echo $postag; ?> ' + id + t_end;
					} else {
						attribs = [];

						<?php if ($params->override_style && (count(explode(',', $params->styles)) > 1 || $params->styles != $params->style)) : ?>
						var style = $('select[name="style"]').val();
						if (style && style != '<?php echo $params->style; ?>') {
							attribs.push('style="' + style + '"');
						}
						<?php endif; ?>

						if ($('input[name="showtitle"]:checked').val()) {
							attribs.push('showtitle="' + $('input[name="showtitle"]:checked').val() + '"');
						}

						if (attribs.length) {
							attribs = 'module="' + id + '" ' + attribs.join(' ');
						} else {
							attribs = id;
						}

						str = t_start + '<?php echo $tag; ?> ' + attribs + t_end;
					}

					window.parent.jInsertEditorText(str, '<?php echo JFactory::getApplication()->input->getString('name', 'text'); ?>');
					window.parent.SqueezeBox.close();
				})(jQuery);
			}
		</script>
		<?php
	}
}
