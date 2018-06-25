<?php

namespace App\Entity;

class CallsUser extends Base
{
	private $user;

	private function getUser()
	{
		if (empty($this->user)) {
			$this->user = new User($this->conn);
		}

		return $this->user;
	}

	public function getTableName()
	{
		return 'calls_user';
	}

	public function checkFields($data) {
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
			'date',
			'active'
		];
	}

	public function calls($active = 1, $section = [])
	{
		$fieldsCallsUser = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$sql = "SELECT $fieldsCallsUser.*, $fieldsUser.*
				FROM $fieldsCallsUser
				JOIN $fieldsUser ON $fieldsCallsUser.id_users = $fieldsUser.id
				WHERE $fieldsCallsUser.active = $active
				ORDER BY $fieldsCallsUser.id DESC
				$strLimit";
		return $this->conn->query($sql);
	}
}
