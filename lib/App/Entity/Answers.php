<?php

namespace App\Entity;

class Answers extends Base
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
		return 'answers';
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
			'id_comments',
			'date',
			'messages'
		];
	}

	public function answers($filter = [])
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

		$sql = "SELECT $comments.*, $fieldsUser.firstName, $fieldsUser.secondName, $fieldsUser.email
				FROM $comments
				JOIN $fieldsUser ON $comments.id_users = $fieldsUser.id
				WHERE 1 $strWhere
				ORDER BY $comments.date DESC";
		return $this->conn->query($sql);
	}

}
