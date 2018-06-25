<?php

namespace App\Entity;

class MessagesUser extends Base
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
		return 'messages_user';
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
			'message',
			'date',
			'active'
		];
	}

	public function messages($active = 1, $section = [])
	{
		$fieldsMessagesUser = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$sql = "SELECT $fieldsMessagesUser.*, $fieldsUser.*
				FROM $fieldsMessagesUser
				JOIN $fieldsUser ON $fieldsMessagesUser.id_users = $fieldsUser.id
				WHERE $fieldsMessagesUser.active = $active
				GROUP BY $fieldsMessagesUser.id_users
				ORDER BY $fieldsMessagesUser.id DESC
				$strLimit";
		return $this->conn->query($sql);
	}
}
