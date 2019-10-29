<?php

defined('_JEXEC') or die;

class plgSppagebuilderShortcode_ultimateInstallerScript
{
    public function install($parent)
    {
        JFactory::getDBO()->setQuery("UPDATE `#__extensions` SET `enabled` = 1 WHERE `type` = 'plugin' AND `folder` = 'sppagebuilder' AND `element` = 'shortcode_ultimate'")->execute();
    }

    public function uninstall($parent) {}

    public function update($parent) {}

    public function preflight($type, $parent) {}

    public function postflight($type, $parent) {}
}
