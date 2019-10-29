<?php
/**
 * @version     1.0.0
 * @package     com_arquivos_ms
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Fábio <fabio.nery@saude.gov.br> - http://www.saude.gov.br
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Arquivos controller class.
 */
class Arquivos_msControllerArquivos extends JControllerForm
{

    function __construct() {
        $this->view_list = 'arquivoss';
        parent::__construct();
    }

}