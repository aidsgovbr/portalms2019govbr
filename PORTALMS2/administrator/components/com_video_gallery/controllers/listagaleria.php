<?php
/**
 * @version     1.0.0
 * @package     com_video_gallery
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Listagaleria controller class.
 */
class Video_galleryControllerListagaleria extends JControllerForm
{

    function __construct() {
        $this->view_list = 'gallerylistas';
        parent::__construct();
    }

}