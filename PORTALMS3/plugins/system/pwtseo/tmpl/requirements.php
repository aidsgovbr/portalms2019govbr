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
?>

<div class="pseo-result-wrapper">
    <h2 class="pseo-heading">
        <?php echo JText::_('PLG_SYSTEM_PWTSEO_LABELS_SEO_SCORE_LABEL') ?>:
    </h2>
    <p>
        <?php echo JText::_('PLG_SYSTEM_PWTSEO_LABELS_SEO_SCORE_DESC') ?>
    </p>
    <div class="pseo-score">
        <test-keyword-in-title
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-keyword-in-title>
        <test-page-title
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-page-title>
        <test-page-title-length
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-page-title-length>
        <test-keyword-in-meta
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-keyword-in-meta>
        <test-keyword-in-url
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-keyword-in-url>
        <test-keyword-not-used
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-keyword-not-used>
        <test-body-has-images
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-body-has-images>
        <test-body-has-heading
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-body-has-heading>
        <test-body-has-paragraph-first
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-body-has-paragraph-first>
        <test-body-keyword-density
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-body-keyword-density>
        <test-body-length
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-body-length>
        <test-robots-reachable
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-robots-reachable>
    </div>
</div>


<div class="pseo-result-wrapper">
    <h2 class="pseo-heading"><?php echo JText::_('PLG_SYSTEM_PWTSEO_LABELS_RESULTING_PAGE_LABEL') ?>:</h2>
    <p><?php echo JText::_('PLG_SYSTEM_PWTSEO_LABELS_RESULTING_PAGE_DESC') ?></p>
    <div class="score-0" v-if="page.error">
        <div class="pseo-score__content">
            {{ page.error }}
        </div>
    </div>
    <div class="pseo-score" v-else>

        <test-result-body-has-images
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-result-body-has-images>
        <test-result-body-keyword-density
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-result-body-keyword-density>
        <test-result-article-title-unique
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-result-article-title-unique>
        <test-result-page-metadesc-unique
                :local-config="localConfig"
                :plugin-config="pluginConfig"
                :page="page"
                v-on:score-change="calculateTotalScore"></test-result-page-metadesc-unique>

    </div>
</div>
