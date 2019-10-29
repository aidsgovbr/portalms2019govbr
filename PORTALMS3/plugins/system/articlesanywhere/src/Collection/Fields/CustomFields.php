<?php
/**
 * @package         Articles Anywhere
 * @version         7.5.1
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2018 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere\Collection\Fields;

use RegularLabs\Library\DB as RL_DB;
use RegularLabs\Plugin\System\ArticlesAnywhere\Collection\DB;
use RegularLabs\Plugin\System\ArticlesAnywhere\CurrentArticle;

defined('_JEXEC') or die;

class CustomFields extends Fields
{
	var $fields;

	public function getAvailableFields()
	{
		if ( ! is_null($this->fields))
		{
			return $this->fields;
		}

		if ( ! RL_DB::tableExists($this->config->getTableFields(false)))
		{
			return [];
		}

		$query = $this->db->getQuery(true)
			->select($this->config->get('fields_id'))
			->select($this->config->get('fields_name'))
			->from($this->config->getTableFields())
			->where($this->db->quoteName('context') . ' = ' . $this->db->quote($this->config->getContext()))
			->where($this->config->get('fields_state') . ' = 1');

		$this->fields = DB::getResults($query, 'loadAssocList', ['id', 'name']);

		return $this->fields;
	}

	public function getFieldValue($key, $value)
	{
		$current_value = $this->getFieldValueByKey($key);

		return $this->getValue($key, $value, $current_value);
	}

	public function getFieldValueByKey($key, $item_id = 0)
	{
		$custom_fields = $this->getAvailableFields();
		$field_id      = array_search($key, $custom_fields);

		return $this->getFieldValueFromDatabase($field_id, $item_id);
	}

	public function getFieldByKey($key, $item_id = 0)
	{
		$custom_fields = $this->getAvailableFields();
		$field_id      = array_search($key, $custom_fields);

		return $this->getFieldFromDatabase(
			$field_id,
			$item_id
		);
	}

	protected function getFieldValueFromDatabase($field_id, $item_id)
	{
		if ( ! RL_DB::tableExists($this->config->getTableFieldsValues(false)))
		{
			return false;
		}

		if (empty($field_id))
		{
			return false;
		}

		$query = $this->db->getQuery(true)
			->select($this->db->quoteName('type'))
			->from($this->config->getTableFields())
			->where($this->db->quoteName('id') . ' = ' . (int) $field_id);
		$this->db->setQuery($query);

		$type = DB::getResults($query, 'loadResult');

		$method = in_array($type, [
			'checkboxes', 'list', 'imagelist', 'usergrouplist',
		], $type) ? 'loadColumn' : 'loadResult';

		return $this->getFieldValuesFromDatabase(
			$field_id,
			$item_id,
			$method
		);
	}

	protected function getFieldFromDatabase($field_id, $item_id, $field_selects = [], $value_selects = [])
	{
		if ( ! RL_DB::tableExists($this->config->getTableFieldsValues(false)))
		{
			return false;
		}

		if (empty($field_id))
		{
			return false;
		}

		$query = $this->db->getQuery(true)
			->select(
				[
					$this->db->quoteName('id'),
					$this->config->get('fields_label', 'label'),
					$this->config->get('fields_type', 'type'),
					$this->config->get('fields_params', 'params'),
					$this->config->get('fields_default', 'default'),
				])
			->from($this->config->getTableFields('fields'))
			->where($this->db->quoteName('id') . ' = ' . (int) $field_id);
		$this->db->setQuery($query);
		$field = DB::getResults($query, 'loadObject');

		$values = $this->getFieldValuesFromDatabase(
			$field_id,
			$item_id
		);

		if (empty($values))
		{
			$field->value = $field->default;

			return [$field];
		}

		$fields = [];

		foreach ($values as $value)
		{
			$field->value = $value;
			$fields[]     = clone $field;
		}

		return $fields;
	}

	protected function getFieldValuesFromDatabase($field_id, $item_id, $query_method = 'loadColumn')
	{
		if ( ! RL_DB::tableExists($this->config->getTableFieldsValues(false)))
		{
			return false;
		}

		if (empty($field_id))
		{
			return false;
		}

		$item_id = $item_id ?: CurrentArticle::get('id', $this->config->getComponentName());

		$query = $this->db->getQuery(true)
			->select($this->config->get('fields_values_value', 'value'))
			->from($this->config->getTableFieldsValues('values'))
			->where($this->config->get('fields_values_id') . ' = ' . (int) $field_id)
			->where($this->config->get('fields_values_item_id') . ' = ' . (int) $item_id);
		$this->db->setQuery($query);

		return DB::getResults($query, $query_method);
	}
}
