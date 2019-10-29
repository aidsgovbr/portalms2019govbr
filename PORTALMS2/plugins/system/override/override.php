<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Override
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Joomla Override plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.Override
 * @since       3.0.3
 */
class PlgSystemOverride extends JPlugin
{
    public function __construct(&$subject, $config = array()) {
        parent::__construct($subject, $config);
    }

    public function onAfterRoute()
    {
        if (!defined('DS'))
        {
            define('DS', DIRECTORY_SEPARATOR);
        }
        // Get the application.
        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        $input = $app->input;
        $jinput = JFactory::getApplication()->input;
        $layout = $jinput->get('layout');
        //override para apresentar novo layout no item
        // jimport( 'joomla.application.component.model' );
        if ( $layout = 'padraogoverno01pblog') {
            $file	= JPath::clean(JPATH_BASE . DS . 'components' . DS . 'com_content' . DS . 'views' . DS . 'category' . DS . 'view_ms.html.php');
            if (file_exists($file)) {
                require_once $file;
            }
        }

        //LISTAGENS DE VIEWS ARTIGOS/DESTAQUES
        if('com_content' == JRequest::getCMD('option') && $app->isAdmin()) {
            // altera a view de artigos admin
            $file   = JPath::clean(JPATH_BASE . DS . 'components' . DS . 'com_content' . DS . 'views' . DS . 'articles' . DS . 'view_ms.html.php');
            if (file_exists($file))
            {
                require_once $file;
            }

            // altera a view de artigos em destaque admin
            $file   = JPath::clean(JPATH_BASE . DS . 'components' . DS . 'com_content' . DS . 'views' . DS . 'featured' . DS . 'view_ms.html.php');
            if (file_exists($file))
            {
                require_once $file;
            }
        }

        //LISTAGENS DE VIEWS CATEGORIAS
        if('com_categories' == JRequest::getCMD('option') && $app->isAdmin()){

            // Verifico se o nivel de acesso é permitido para esse usuario.
            if (in_array($this->params->get('acesslevel'), $user->getAuthorisedViewLevels())) {

                // PERMISSÃO PARA ACESSAR CATEGORIAS
                if (!((count($user->getAuthorisedCategories('com_content', 'core.edit.state'))) > 0)){
                    $app->redirect('index.php?option=com_content&view=articles', JText::_('JERROR_ALERTNOAUTHOR'), 'Error', true, false);
                }
            }

           // override da controler de categoria. Para função de sub menus
            $file   = JPath::clean(JPATH_BASE . DS . 'components' . DS . 'com_categories' . DS . 'controllerms.php');
            if (file_exists($file) && JRequest::getCMD('layout') != 'edit')
            {
                require_once $file;
            }

            // override da listagem de categoria
            $file   = JPath::clean(JPATH_BASE . DS . 'components' . DS . 'com_categories' . DS . 'views' . DS . 'categories' . DS . 'view_ms.html.php');
            if (file_exists($file))
            {
                require_once $file;
            }
        }

    }
}
