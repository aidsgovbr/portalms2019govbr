<?php

/**
 * @version     1.0.0
 * @package     com_importador_ms
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports a value from an external table
 */
class JFormFieldForeignKey extends JFormField {

    /**
     * The form field type.
     *
     * @var     string
     * @since   1.6
     */
    protected $type = 'foreignkey';
    private $input_type;
    private $table;
    private $key_field;
    private $value_field;

    /**
     * Method to get the field input markup.
     *
     * @return  string  The field input markup.
     * @since   1.6
     */
    protected function getInput() {

        //Assign field properties.
        //Type of input the field shows
        $this->input_type = $this->getAttribute('input_type');

        //Database Table
        $this->table = $this->getAttribute('table');

        //The field that the field will save on the database
        $this->key_field = $this->getAttribute('key_field');

        //The column that the field shows in the input
        $this->value_field = $this->getAttribute('value_field');
        // Initialize variables.
        $html = '';

        // Parameters to be passed to the database driver.
        $option_psms = array();
        $option_psms['driver']   = 'mysql';

        // $option_psms['host']     = '172.25.61.112';
        // $option_psms['user']     = 'portalsaude';
        // $option_psms['password'] = '#ps12062013@';
        // $option_psms['database'] = 'dbportalsaude';
        // $option_psms['prefix']   = 'psms_';



        $option_psms['host']     = '172.25.61.111';
        $option_psms['user']     = 'portalsaude';
        $option_psms['password'] = 'PRD#g4y5z9';
        $option_psms['database'] = 'dbportalsaude';
        $option_psms['prefix']   = 'psms_';

        //Load all the field options
        $db = JDatabaseDriver::getInstance( $option_psms );
        // var_dump($db); die;
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query->select('a.*')
        ->from($db->quoteName('#__categories') . ' AS a')
        ->where($db->quoteName('a.published') . ' = ' . $db->quote('1'))
        ->where($db->quoteName('a.extension') . ' = ' . $db->quote('com_content'));

        // Set the query and load the result.
        $db->setQuery($query);
        $results = $db->loadObjectList();

        $input_options = 'class="' . $this->getAttribute('class') . '"';

        //Depends of the type of input, the field will show a type or another
        switch ($this->input_type) {
            case 'list':
            default:
            $options = array();

                //Iterate through all the results
            foreach ($results as $result) {
                $options[] = JHtml::_('select.option', $result->id, $result->id.' - '.$result->title);
            }

            $value = $this->value;

                //If the value is a string -> Only one result
            if (is_string($value)) {
                $value = array($value);
                } else if (is_object($value)) { //If the value is an object, let's get its properties.
                $value = get_object_vars($value);
            }

                //If the select is multiple
            if ($this->multiple) {
                $input_options.= 'multiple="multiple"';
            } else {
                $input_options.= 'multiple="multiple"';
                    // array_unshift($options, JHtml::_('select.option', '', ''));
            }

            $html = JHtml::_('select.genericlist', $options, $this->name, $input_options, 'value', 'text', $value, $this->id);
            break;
        }
        return $html;
    }

    /**
     * Wrapper method for getting attributes from the form element
     * @param string $attr_name Attribute name
     * @param mixed  $default Optional value to return if attribute not found
     * @return mixed The value of the attribute if it exists, null otherwise
     */
    public function getAttribute($attr_name, $default = null) {
        if (!empty($this->element[$attr_name])) {
            return $this->element[$attr_name];
        } else {
            return $default;
        }
    }

}
