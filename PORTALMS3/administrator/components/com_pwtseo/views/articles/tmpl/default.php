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

$user      = JFactory::getUser();
$userId    = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

JHtml::_('stylesheet', 'com_pwtseo/pwtseo.css', array('version' => 'auto', 'relative' => true));

JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

?>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<form action="<?php echo JRoute::_('index.php?option=com_pwtseo&view=articles'); ?>" method="post" name="adminForm"
      id="adminForm">
    <div id="j-main-container" class="span10">
		<?php
		echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));?>
		<?php if (empty($this->items)) : ?>
            <div class="alert alert-no-items">
				<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
            </div>
		<?php else : ?>
            <table class="table table-striped" id="bannerList">
                <thead>
                <tr>
                    <th width="1%" class="center">
						<?php echo JHtml::_('grid.checkall'); ?>
                    </th>
                    <th width="1%" class="nowrap center">
		                <?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'article.state', $listDirn, $listOrder); ?>
                    </th>
                    <th width="60%">
						<?php echo JHtml::_('searchtools.sort', 'COM_PWTSEO_HEADING_TITLE', 'article.title', $listDirn, $listOrder); ?>
                    </th>
                    <th width="17%">
		                <?php echo JHtml::_('searchtools.sort', 'COM_PWTSEO_HEADING_FOCUSWORD', 'seo.focus_word', $listDirn, $listOrder); ?>
                    </th>
                    <th width="5%" class="nowrap hidden-phone">
						<?php echo JHtml::_('searchtools.sort', 'COM_PWTSEO_HEADING_SCORE', 'seo.pwtseo_score', $listDirn, $listOrder); ?>
                    </th>
                    <th width="17%">
						<?php echo JHtml::_('searchtools.sort', 'COM_PWTSEO_HEADING_PUBLISH_UP', 'article.publish_up', $listDirn, $listOrder); ?>
                    </th>

                    <th width="2%" class="nowrap hidden-phone">
						<?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'article.id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="7">
						<?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
                </tfoot>
                <tbody>
				<?php foreach ($this->items as $i => $item) :
					$ordering = ($listOrder == 'ordering');
					$canEdit = $user->authorise('core.edit', 'com_content');
					$canCheckin = $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
					$return = base64_encode('index.php?option=com_pwtseo&view=articles');
                    $scoreClass = $item->pwtseo_score < 40 ? 0 : ($item->pwtseo_score < 75 ? 1 : 2);
					?>
                    <tr>
                        <td class="center">
							<?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td>
	                        <?php echo JHtml::_('jgrid.published', $item->state, $i, 'articles.', false, 'cb', $item->publish_up, $item->publish_down); ?>
                        </td>
                        <td class="nowrap has-context">
                            <div class="pull-left">
								<?php if ($item->checked_out) : ?>
									<?php echo JHtml::_('jgrid.checkedout', $i, '', $item->checked_out_time); ?>
								<?php endif; ?>
								<?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_content&task=article.edit&id=' . (int) $item->id . '&return=' . $return); ?>">
										<?php echo $this->escape($item->title); ?></a>
								<?php else : ?>
									<?php echo $this->escape($item->title); ?>
								<?php endif; ?>
                                <span class="small break-word">
									<?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($item->alias)); ?>
								</span>
                                <div class="small">
	                                <?php echo $this->escape($item->cat_title); ?>
                                </div>
                            </div>
                        </td>
                        <td>
		                    <?php echo $this->escape($item->focus_word); ?>
                        </td>
                        <td class="">
							<?php if ($item->pwtseo_score): ?>
                                <span class="seoscore seoscore-<?php echo $scoreClass ?>"
                                <?php if ($item->flag_outdated): ?> title="<?php echo JText::_('COM_PWTSEO_FLAGS_OUTDATED_LABEL') ?>" <?php endif; ?>>
		                            <?php echo $item->pwtseo_score ?>
                                </span>
                                <?php if ($item->flag_outdated): ?>
                                    *
                                    <?php endif; ?>
							<?php endif; ?>
                        </td>
                        <td>
							<?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC4')); ?>
                        </td>
                        <td class="hidden-phone">
							<?php echo $item->id; ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>
            <?php if ($user->authorise('core.edit', 'com_content')) : ?>
                <?php echo JHtml::_(
                    'bootstrap.renderModal',
                    'collapseModal',
                    array(
                        'title'  => JText::_('COM_PWTSEO_BATCH_OPTIONS'),
                        'footer' => $this->loadTemplate('batch_footer'),
                    ),
                    $this->loadTemplate('batch_body')
                ); ?>
            <?php endif; ?>
		<?php endif; ?>
    </div>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>
