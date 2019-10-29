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

/**
 * arquivos Table class
 */
class Arquivos_msTablearquivos extends JTable {

    /**
     * Constructor
     *
     * @param JDatabase A database connector object
     */
    public function __construct(&$db) {
        parent::__construct('#__arquivos_ms_files', 'id', $db);
    }

    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param array   Named array
     * @return  null|string null is operation was satisfactory, otherwise returns an error
     * @see   JTable:bind
     * @since 1.5
     */
    public function bind($array, $ignore = '') {


        //Support for file field: nome_arquivo
        if(isset($_FILES['jform']['name']['nome_arquivo'])):
          jimport('joomla.filesystem.file');
          jimport('joomla.filesystem.file');
          $file = $_FILES['jform'];

          //Check if the server found any error.
          $fileError = $file['error']['nome_arquivo'];
          $message = '';
          if($fileError > 0 && $fileError != 4) {
            switch ($fileError) :
              case 1:
                $message = JText::_( 'File size exceeds allowed by the server');
                break;
              case 2:
                $message = JText::_( 'File size exceeds allowed by the html form');
                break;
              case 3:
                $message = JText::_( 'Partial upload error');
                break;
            endswitch;
            if($message != '') :
              return Error::raiseError(500,$message);
            endif;
          }
          else if($fileError == 4){
            if(isset($array['nome_arquivo_hidden'])):;
              $array['nome_arquivo'] = $array['nome_arquivo_hidden'];
            endif;
          }
          else{

            //Check for filesize
            $fileSize = $file['size']['nome_arquivo'];
            $fileSize = $fileSize / 1024;
            // if($fileSize > 10485760):
            //   return JError::raiseError(500, 'File bigger than 10MB' );
            // endif;

            // //Check for filetype
            // $okMIMETypes = 'jpg,png,doc,docx';
            // $validMIMEArray = explode(",",$okMIMETypes);
            // $fileMime = $file['type']['nome_arquivo'];
            // if(!in_array($fileMime,$validMIMEArray)):
            //   return JError::raiseError(500,'This filetype is not allowed');
            // endif;

            //Replace any special characters in the filename
            $filename = explode('.',$file['name']['nome_arquivo']);
            $filename[0] = preg_replace("/[^A-Za-z0-9]/i", "-", $filename[0]);
            // criando variáveis para pastas
            setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
            date_default_timezone_set('America/Sao_Paulo');

            $ano = strftime("%Y");
            $mes = strftime("%B");
            $mesnum = strftime("%m");
            $mes = ($mesnum == '03')? 'marco': $mes;
            $dia = strftime("%d");
            // $ano = date('Y');
            // $mes = date('F');
            // $dia = date('d');
            // pegando a extensão pra criar a pasta
            $tipo_arquivo = array_reverse($filename);
            $tipo_arquivo = $tipo_arquivo[0];
            $tipo_de_arquivo = $tipo_arquivo;
            //criando variáveis de verificação de tamanho e tipo de arquivo
            $fileType = $file['type']['nome_arquivo'];
            //consultando se existe extensão cadastrada
            // Initialiase variables.
            $db    = JFactory::getDbo();
            $query = $db->getQuery(true);

            // Create the base select statement.
            $query->select('a.*')
              ->from($db->quoteName('#__arquivos_ms_tipo') . ' AS a')
              ->where($db->quoteName('a.state') . ' = ' . $db->quote('1'))
              ->where($db->quoteName('a.tipo_de_arquivo') . ' = ' . $db->quote($tipo_arquivo))
              ->order($db->quoteName('a.ordering') . ' ASC');

            // Set the query and load the result.
            $db->setQuery($query);
            $result = $db->loadObjectList();
            // var_dump($result)
            // echo $fileSize;
            // die;

            // Check for a database error.
            if ($db->getErrorNum())
            {
              JError::raiseWarning(500, $db->getErrorMsg());

              return false;
            }
            //verifica tipo de arquivo
              if (!$result) {
                return JError::raiseError(500,'This filetype is not allowed');
              }
            foreach ($result as $key => $value) {
              //verifica tamanho do arquivo permitido

              if ($fileSize > $value->tamanho_permitido) {
                return JError::raiseError(500, 'File bigger than 10MB' );
              }

            }

            //Add Timestamp MD5 to avoid overwriting
            $filename = /*md5(time()) . '-' .*/ implode('.',$filename);
            $uploadPath = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$tipo_arquivo.DIRECTORY_SEPARATOR.$ano.DIRECTORY_SEPARATOR.$mes.DIRECTORY_SEPARATOR.$dia.DIRECTORY_SEPARATOR.$filename;
            // $uploadPath = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$file['type'].DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('F').date('d').$filename;
            $fileTemp = $file['tmp_name']['nome_arquivo'];

            if(!JFile::exists($uploadPath)):

              if (!JFile::upload($fileTemp, $uploadPath)):

                return JError::raiseError(500,'Error moving file');

              endif;

            endif;
            $array['nome_arquivo'] = $filename;
            $array['tipo_de_arquivo'] = $tipo_de_arquivo;
            $array['dt_criacao'] = date("Y-m-d H:i:s");
          }

        endif;
    $input = JFactory::getApplication()->input;
    $task = $input->getString('task', '');
    if(($task == 'save' || $task == 'apply') && (!JFactory::getUser()->authorise('core.edit.state','com_arquivos_ms') && $array['state'] == 1)){
      $array['state'] = 0;
    }

        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string) $registry;
        }

        if (isset($array['metadata']) && is_array($array['metadata'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['metadata']);
            $array['metadata'] = (string) $registry;
        }
        if(!JFactory::getUser()->authorise('core.admin', 'com_arquivos_ms.arquivos.'.$array['id'])){
            $actions = JFactory::getACL()->getActions('com_arquivos_ms','arquivos');
            $default_actions = JFactory::getACL()->getAssetRules('com_arquivos_ms.arquivos.'.$array['id'])->getData();
            $array_jaccess = array();
            foreach($actions as $action){
                $array_jaccess[$action->name] = $default_actions[$action->name];
            }
            $array['rules'] = $this->JAccessRulestoArray($array_jaccess);
        }
        //Bind the rules for ACL where supported.
    if (isset($array['rules']) && is_array($array['rules'])) {
      $this->setRules($array['rules']);
    }

        return parent::bind($array, $ignore);
    }

    /**
     * This function convert an array of JAccessRule objects into an rules array.
     * @param type $jaccessrules an arrao of JAccessRule objects.
     */
    private function JAccessRulestoArray($jaccessrules){
        $rules = array();
        foreach($jaccessrules as $action => $jaccess){
            $actions = array();
            foreach($jaccess->getData() as $group => $allow){
                $actions[$group] = ((bool)$allow);
            }
            $rules[$action] = $actions;
        }
        return $rules;
    }

    /**
     * Overloaded check function
     */
    public function check() {

        //If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder();
        }

        return parent::check();
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkin rows that it can after adjustments are made.
     *
     * @param    mixed    An optional array of primary key values to update.  If not
     *                    set the instance property value is used.
     * @param    integer The publishing state. eg. [0 = unpublished, 1 = published]
     * @param    integer The user id of the user performing the operation.
     * @return    boolean    True on success.
     * @since    1.0.4
     */
    public function publish($pks = null, $state = 1, $userId = 0) {
        // Initialise variables.
        $k = $this->_tbl_key;

        // Sanitize input.
        JArrayHelper::toInteger($pks);
        $userId = (int) $userId;
        $state = (int) $state;

        // If there are no primary keys set check to see if the instance key is set.
        if (empty($pks)) {
            if ($this->$k) {
                $pks = array($this->$k);
            }
            // Nothing to set publishing state on, return false.
            else {
                $this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
                return false;
            }
        }

        // Build the WHERE clause for the primary keys.
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);

        // Determine if there is checkin support for the table.
        if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
            $checkin = '';
        } else {
            $checkin = ' AND (checked_out = 0 OR checked_out = ' . (int) $userId . ')';
        }

        // Update the publishing state for rows with the given primary keys.
        $this->_db->setQuery(
                'UPDATE `' . $this->_tbl . '`' .
                ' SET `state` = ' . (int) $state .
                ' WHERE (' . $where . ')' .
                $checkin
        );
        $this->_db->query();

        // Check for a database error.
        if ($this->_db->getErrorNum()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // If checkin is supported and all rows were adjusted, check them in.
        if ($checkin && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin each row.
            foreach ($pks as $pk) {
                $this->checkin($pk);
            }
        }

        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }

        $this->setError('');
        return true;
    }

    /**
      * Define a namespaced asset name for inclusion in the #__assets table
      * @return string The asset name
      *
      * @see JTable::_getAssetName
    */
    protected function _getAssetName() {
        $k = $this->_tbl_key;
        return 'com_arquivos_ms.arquivos.' . (int) $this->$k;
    }

    /**
      * Returns the parrent asset's id. If you have a tree structure, retrieve the parent's id using the external key field
      *
      * @see JTable::_getAssetParentId
    */
    protected function _getAssetParentId($table = null, $id = null){
        // We will retrieve the parent-asset from the Asset-table
        $assetParent = JTable::getInstance('Asset');
        // Default: if no asset-parent can be found we take the global asset
        $assetParentId = $assetParent->getRootId();
        // The item has the component as asset-parent
        $assetParent->loadByName('com_arquivos_ms');
        // Return the found asset-parent-id
        if ($assetParent->id){
            $assetParentId=$assetParent->id;
        }
        return $assetParentId;
    }



}
