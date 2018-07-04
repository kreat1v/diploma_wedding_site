<?php

namespace App\Entity;

use App\Entity\User;

class Comments extends Base
{
	private $userModel;

	private function getUser()
	{
		if (empty($this->userModel)) {
			$this->userModel = new User($this->conn);
		}

		return $this->userModel;
	}

	public function getTableName()
	{
		return 'comments';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value)) {
				throw new \Exception(__('form.field'));
			}
		}
	}

	public function getFields()
	{
		return [
			'id',
			'id_users',
			'id_stories',
			'date',
			'messages',
			'active'
		];
	}

	public function comments($filter = [], $section = [])
	{
		$comments = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$where = [];
		$strWhere = '';
		if (!empty($filter)) {
			foreach ($filter as $fieldName => $value) {
				if (!in_array($fieldName, $this->getFields())) {
					continue;
				}

				$value = $this->conn->escape($value);
				$where[] = "$comments.$fieldName = $value";
			}

			if (!empty($where)) {
				$strWhere = ' AND ' . implode(' AND ', $where);
			}
		}

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$sql = "SELECT $comments.*, $fieldsUser.*
				FROM $comments
				JOIN $fieldsUser ON $comments.id_users = $fieldsUser.id
				WHERE 1 $strWhere
				ORDER BY $comments.date DESC
				$strLimit";
		return $this->conn->query($sql);
	}

	// public function getComments($where, $id)
	// {
	// 	$fieldsComments = $this->getTableName();
	// 	$fieldsUser = $this->getUser()->getTableName();
	//
	// 	if (empty($id)) {
	// 		return null;
	// 	}
	//
	// 	$sql = "SELECT $fieldsComments.*, $fieldsUser.firstName, $fieldsUser.secondName, $fieldsUser.email
	// 			FROM $fieldsComments
	// 			JOIN $fieldsUser ON $fieldsComments.id_user = $fieldsUser.id
	// 			WHERE $fieldsComments.$where = $id
	// 			ORDER BY $fieldsComments.rating	 DESC";
	// 	return $this->conn->query($sql);
	// }
	//
	// public function getSection($limit, $limitStart, $where = null, $sort = null)
	// {
	// 	if (isset($where)) {
	// 		$this->conn->escape($where);
	// 		$strWhere = " WHERE id_user = $where ";
	// 	}
	//
	// 	if (isset($sort)) {
	// 		$this->conn->escape($sort);
	// 		$orderBy = " ORDER BY $sort DESC ";
	// 	}
	//
	// 	$sql = 'SELECT * FROM ' . $this->getTableName() . $strWhere . $orderBy . ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
	//
	// 	return $this->conn->query($sql);
	// }
}
