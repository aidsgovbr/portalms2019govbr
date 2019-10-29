<?php

/**
 * @version     1.0.0
 * @package     com_importador_ms
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// No direct access
defined('_JEXEC') or die;

/**
 * importar Table class
 */
class Importador_msTableimportar extends JTable {
    public function __construct(&$db) {
        parent::__construct('#__importador_ms_importar', 'id', $db);
    }

    public function bind($array, $ignore = '') {

        // array_id é usuario
        if ($array['id'] == 0){
            $array['created_by'] = JFactory::getUser()->id;
        }

        $input = JFactory::getApplication()->input;
        $task = $input->getString('task', '');

        if (($task == 'save' || $task == 'apply') && (!JFactory::getUser()->authorise('core.edit.state','com_importador_ms') && $array['state'] == 1)) {
            $array['state'] = 0;
        }

        if(isset($array['categoria_antiga'])){
            if(is_array($array['categoria_antiga'])){
                $array['categoria_antiga'] = implode(',',$array['categoria_antiga']);
            }
            else if(strrpos($array['categoria_antiga'], ',') != false){
                $array['categoria_antiga'] = explode(',',$array['categoria_antiga']);
            }
            else if(empty($array['categoria_antiga'])) {
                $array['categoria_antiga'] = '';
            }
        }

        if ($task == 'save' || $task == 'apply' || $task == 'save2new' || $task == 'save2copy') {

            // Parameters to be passed to the database driver.
            $option = array();

            $option['driver']   = 'mysql';

            // $option['host']     = '172.25.61.112';
            // $option['user']     = 'portalsaude';
            // $option['password'] = '#ps12062013@';
            // $option['database'] = 'dbportalsaude';
            // $option['prefix']   = 'psms_';

            $option['host']     = '172.25.61.111';
            $option['user']     = 'portalsaude';
            $option['password'] = 'PRD#g4y5z9';
            $option['database'] = 'dbportalsaude';
            $option['prefix']   = 'psms_';

            // Initialiase variables.
            $db    = JDatabaseDriver::getInstance($option);
            $query = $db->getQuery(true);

            //verificação de importação por data.
            if ($array['change_import'] == 1) {
            $query->select('a.*')
            ->from($db->quoteName('#__content') . ' AS a')
            ->where($db->quoteName('a.state') . ' = ' . $db->quote('1'))
            ->where($db->quoteName('a.created') . ' >= ' . $db->quote($array['data_inicial']))
            ->where($db->quoteName('a.catid') . ' = ' . $db->quote($array['categoria_antiga']))
            ->order($db->quoteName('a.ordering') . ' ASC');
            } else{
            // Create the base select statement.
            $query->select('a.*')
            ->from($db->quoteName('#__content') . ' AS a')
            ->where($db->quoteName('a.state') . ' = ' . $db->quote('1'))
            ->where($db->quoteName('a.catid') . ' = ' . $db->quote($array['categoria_antiga']))
            ->order($db->quoteName('a.ordering') . ' ASC');
            }

            // Set the query and load the result.
            $db->setQuery($query);
            $result = $db->loadObjectList();

            // Check for a database error.
            if ($db->getErrorNum())
            {
                JError::raiseWarning(500, $db->getErrorMsg());
                return null;
            }

            $db1    = JFactory::getDbo();

            //verifica se a categoria está vazia
            if (empty($result)) {
                JError::raiseWarning(500, 'A Categoria não importou nada por estar vazia');
                return null;
            }

            for ($i=0; $i < count($result); $i++) {

                //Buscando e comparando se já existe um artigo com o mesmo apelido
                // Initialiase variables.
                // $db2    = JFactory::getDbo();

                // $db    = $this->getDbo();
                // $query = $db2->getQuery(true);

                // Create the base select statement.
                // $query->select('alias')
                    // ->from($db2->quoteName('#__content'))
                    // ->where($db2->quoteName('alias') . ' = ' . $db->quote($result[$i]->alias));

                // Set the query and load the result.
                // $db->setQuery($query);
                // $result2 = $db2->loadObjectList();
                // if ($result2) {
                    // inclui uma hash no final do alias
                    // $result[$i]->alias .= '-'. hash('md5', rand(), true);
                // }

                // Check for a database error.
                // if ($db2->getErrorNum())
                // {
                //     JError::raiseWarning(500, $db2->getErrorMsg());

                //     return null;
                // }

                //fim da query de comparação e geração de alias


                // echo $result[$i]->title.'<br>';
                // Initialiase variables.

                // $db = $this->getDbo();
                $query = $db1->getQuery(true);

                // Create the base insert statement.
                $query->insert($db1->quoteName('#__content'))
                ->columns(array($db1->quoteName('id'),
                    $db1->quoteName('title'),
                    $db1->quoteName('alias'),
                    $db1->quoteName('introtext'),
                    $db1->quoteName('fulltext'),
                    $db1->quoteName('state'),
                    $db1->quoteName('catid'),
                    $db1->quoteName('created'),
                    $db1->quoteName('created_by'),
                    $db1->quoteName('created_by_alias'),
                    $db1->quoteName('modified'),
                    $db1->quoteName('modified_by'),
                    $db1->quoteName('publish_up'),
                    $db1->quoteName('images'),
                    $db1->quoteName('urls'),
                    $db1->quoteName('attribs'),
                    $db1->quoteName('ordering'),
                    $db1->quoteName('metakey'),
                    $db1->quoteName('access'),
                    $db1->quoteName('hits'),
                    $db1->quoteName('featured'),
                    $db1->quoteName('language'),
                    $db1->quoteName('xreference')))
                ->values(array($db1->quote($result[$i]->id) . ', '
                    .$db1->quote($result[$i]->title) . ', '
                    . $db1->quote($result[$i]->alias) . ', '
                    . $db1->quote($result[$i]->introtext) . ', '
                    . $db1->quote($result[$i]->fulltext) . ', '
                    . $db1->quote('1') . ', '
                    . $db1->quote($array['categoria_nova']) . ', '
                    . $db1->quote($result[$i]->created) . ', '
                    . $db1->quote($array['created_by']) . ', '
                    . $db1->quote('') . ', '
                    . $db1->quote($result[$i]->modified) . ', '
                    . $db1->quote($array['created_by']) . ', '
                    . $db1->quote($result[$i]->publish_up) . ', '
                    . $db1->quote($result[$i]->images) . ', '
                    . $db1->quote($result[$i]->urls) . ', '
                    . $db1->quote($result[$i]->attribs) . ', '
                    . $db1->quote($result[$i]->ordering) . ', '
                    . $db1->quote($result[$i]->metakey) . ', '
                    . $db1->quote('1') . ', '
                    . $db1->quote('0') . ', '
                    . $db1->quote('0') . ', '
                    . $db1->quote('*') . ', '
                    . $db1->quote($result[$i]->chapeu)));
                // Set the query and execute the insert.
                $db1->setQuery($query);
                $db1->execute();
            }
            // fim do for
        } // fim do save ou aplly

		//Support for multiple SQL field: categoria_nova
        if(isset($array['categoria_nova'])){
            if(is_array($array['categoria_nova'])){
                $array['categoria_nova'] = implode(',',$array['categoria_nova']);
            }
            else if(strrpos($array['categoria_nova'], ',') != false){
                $array['categoria_nova'] = explode(',',$array['categoria_nova']);
            }
            else if(empty($array['categoria_nova'])) {
                $array['categoria_nova'] = '';
            }
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

        if (!JFactory::getUser()->authorise('core.admin', 'com_importador_ms.importar.' . $array['id'])) {
            $actions = JFactory::getACL()->getActions('com_importador_ms', 'importar');
            $default_actions = JFactory::getACL()->getAssetRules('com_importador_ms.importar.' . $array['id'])->getData();
            $array_jaccess = array();
            foreach ($actions as $action) {
                $array_jaccess[$action->name] = $default_actions[$action->name];
            }
            $array['rules'] = $this->JAccessRulestoArray($array_jaccess);
        }

        //Bind the rules for ACL where supported.
        if (isset($array['rules']) && is_array($array['rules'])) {
            $this->setRules($array['rules']);
        }
        // return true;
        return parent::bind($array, $ignore);
    }

    /**
     * This function convert an array of JAccessRule objects into an rules array.
     * @param type $jaccessrules an arrao of JAccessRule objects.
     */
    private function JAccessRulestoArray($jaccessrules) {
        $rules = array();
        foreach ($jaccessrules as $action => $jaccess) {
            $actions = array();
            foreach ($jaccess->getData() as $group => $allow) {
                $actions[$group] = ((bool) $allow);
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
        return 'com_importador_ms.importar.' . (int) $this->$k;
    }

    /**
     * Returns the parent asset's id. If you have a tree structure, retrieve the parent's id using the external key field
     *
     * @see JTable::_getAssetParentId
     */
    protected function _getAssetParentId(JTable $table = null, $id = null) {
        // We will retrieve the parent-asset from the Asset-table
        $assetParent = JTable::getInstance('Asset');
        // Default: if no asset-parent can be found we take the global asset
        $assetParentId = $assetParent->getRootId();
        // The item has the component as asset-parent
        $assetParent->loadByName('com_importador_ms');
        // Return the found asset-parent-id
        if ($assetParent->id) {
            $assetParentId = $assetParent->id;
        }
        return $assetParentId;
    }

    public function delete($pk = null) {
        $this->load($pk);
        $result = parent::delete($pk);
        if ($result) {


        }
        return $result;
    }

}
