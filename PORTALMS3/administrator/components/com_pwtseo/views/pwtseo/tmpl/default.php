<?php
/**
 * @package    Pwtseo
 *
 * @author     Perfect Web Team <extensions@perfectwebteam.com>
 * @copyright  Copyright (C) 2016 - 2018 Perfect Web Team. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://extensions.perfectwebteam.com
 */

use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

// Load PWT CSS
HTMLHelper::_('stylesheet', 'com_pwtseo/pwtseo.css', array('relative' => true, 'version' => 'auto'));
?>

<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <div class="pwt-component-section">

        <div class="pwt-section pwt-section--border-bottom">
            <div class="pwt-flag-object">
                <div class="pwt-flag-object__aside">
					<?php echo JHtml::_('image', 'com_pwtseo/PWT-seo.png', 'PWT Image', array('width' => 160), true); ?>
                </div>
                <div class="pwt-flag-object__body">
                    <p class="pwt-heading">
						<?php echo JText::_('COM_PWTSEO_ABOUT_PWTSEO_HEADER'); ?>
                    </p>
                    <p>
						<?php echo JText::_('COM_PWTSEO_ABOUT_PWTSEO_DESCRIPTION'); ?>
                    </p>
                    <p>
                        <a href="https://extensions.perfectwebteam.com/pwt-seo"
                           target="_blank">
							<?php echo JText::_('COM_PWTSEO_ABOUT_PWTSEO_WEBSITE'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="pwt-section">
            <div>
                <a class="pwt-button pwt-button--primary"
                   href="<?php echo JUri::Base(); ?>index.php?option=com_plugins&view=plugins&filter[search]=PWT+SEO">
					<?php echo JText::_('COM_PWTSEO_ABOUT_PLUGIN_SETTINGS'); ?>
                </a>
                -
                <a class="pwt-button pwt-button--primary"
                   target="_blank"
                   href="https://extensions.perfectwebteam.com/pwt-seo/documentation">
					<?php echo JText::_('COM_PWTSEO_DOCUMENTATION_LINK'); ?>
                </a>
            </div>
        </div>

        <div class="pwt-section pwt-section--border-top">
            <p>
                <strong>
					<?php echo JText::_('COM_PWTSEO_SEF_ENABLED_LABEL'); ?>
                </strong>
				<?php echo JFactory::getConfig()->get('sef', 0) === '1' ? JText::_('JYES') : JText::_('JNO') ?>
            </p>

            <?php if ($this->bHasSitemap !== null) : ?>
                <p>
                    <strong>
			            <?php echo JText::_('COM_PWTSEO_HAS_SITEMAP_LABEL'); ?>
                    </strong>
		            <?php echo $this->bHasSitemap === true ? JText::_('JYES') : JText::_('JNO') ?>
                </p>
            <?php endif; ?>

			<?php if ($this->aSitemaps !== null): ?>
                <div class="">
                    <p>
                        <strong>
							<?php echo JText::_('COM_PWTSEO_GOOGLE_SITEMAPS_LABEL'); ?>
                        </strong>
                    </p>
					<?php if (!$this->aSitemaps): ?>
                        <span class="error">
                            <?php echo JText::_('JNO'); ?>
                        </span>
					<?php endif; ?>
                </div>

				<?php if (is_array($this->aSitemaps) && count($this->aSitemaps) > 0): ?>
                    <div class="">
						<?php foreach ($this->aSitemaps as $oSitemap): ?>
                            <div class="pwt-flag-object">
                                <div class="pwt-flag-object__aside">
									<?php echo $oSitemap->path; ?>
                                </div>
                                <div class="pwt-flag-object__body">
                                    <div>
										<?php echo JText::sprintf('COM_PWTSEO_SITEMAP_WARNINGS_LABEL', $oSitemap->warnings); ?>
                                    </div>
                                    <div>
										<?php echo JText::sprintf('COM_PWTSEO_SITEMAP_ERRORS_LABEL', $oSitemap->errors); ?>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
			<?php endif; ?>
        </div>
    </div>
</div>
