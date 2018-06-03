<?php

namespace App\Entity;

abstract class Base
{
	/** @var \App\Core\DB\IConnection */
	protected $conn;

	/**
	 * @return mixed
	 */
	abstract public function getTableName();

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	abstract public function checkFields($data);

	/**
	 * @return mixed
	 */
	abstract public function getFields();

	/**
	 * Base constructor.
	 *
	 * @param \App\Core\DB\IConnection $connection
	 */
	public function __construct(\App\Core\DB\IConnection $connection)
	{
		$this->conn = $connection;
	}

	/**
	 * @param array $filter
	 *
	 * @return mixed
	 */
	public function list($filter = [], $section = [], $sort = false)
	{
		$fields = $this->getFields();
		$where = [];
		$strWhere = '';

		foreach ($filter as $fieldName => $value) {
			if (!in_array($fieldName, $fields)) {
				continue;
			}

			$value = $this->conn->escape($value);
			$where[] = "$fieldName = $value";
		}

		if (!empty($where)) {
			$strWhere = ' AND ' . implode(' AND ', $where);
		}

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$strSort = '';
		if ($sort) {
			$strSort = ' ORDER BY ' . $sort . ' DESC';
		}

		$sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE 1 ' . $strWhere . $strSort . $strLimit;
		return $this->conn->query($sql);
	}

	// public function selectiveList(string $id, $where = 'id_category', $set = [])
	// {
	// 	if (empty($id)) {
	// 		return null;
	// 	}
	//
	// 	$str = '';
	// 	if (in_array('order', $set)) {
	// 		$str .= 'ORDER BY ' . $set['order'] . ' DESC ';
	// 	}
	// 	if (in_array('limit', $set)) {
	// 		$str .= 'LIMIT ' . $set['limit'];
	// 	}
	// 	if (in_array('offset', $set)) {
	// 		$str .= ' OFFSET ' . $set['offset'];
	// 	}
	//
	// 	$sql = 'SELECT * FROM ' .  $this->getTableName() . ' WHERE ' . $where . ' IN ('. $id .') ' . $str;
	// 	return $this->conn->query($sql);
	// }

	/**
	 * Получаем данные из БД.
	 *
	 * @param $where
	 * @param $value
	 *
	 * @return null
	 */
	public function getBy($where, $value)
	{
		$sql = 'SELECT * FROM ' .  $this->getTableName() . ' WHERE ' . $where . ' = ' . $this->conn->escape($value) . ' LIMIT 1';
		$result = $this->conn->query($sql);

		return isset($result[0]) ? $result[0] : null;
	}

	/**
	 * @param $data
	 * @param null $id
	 *
	 * @return mixed
	 */
	public function save($data, $id = null)
	{
		$this->checkFields($data);

		$fields = $this->getFields();

		$values = [];
		foreach ($data as $key => $val) {
			if (!in_array($key, $fields)) {
				unset($data[$key]);
				continue;
			}

			$this->conn->escape($val);
			if ($id > 0) {
				$values[] = "$key = ?";
			} else {
				$values[] = $val;
			}
		}

		$cols = implode(',', array_keys($data));

		if ($id > 0) {
			$values = implode(',', $values);
			$data[] = $id;
			$sql = "UPDATE " . $this->getTableName() . " SET $values WHERE id = ?";
		} else {
			$vals = rtrim(str_repeat('?,', count($data)), ',');
			$sql = "INSERT INTO " . $this->getTableName() . " ($cols) VALUES ($vals)";
		}

		return $this->conn->query($sql, array_values($data));
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function delete($id)
	{
		$id = intval($id);
		$sql = 'DELETE FROM ' .  $this->getTableName() . ' WHERE id = ' . $this->conn->escape($id);
		return $this->conn->query($sql);
	}
}
